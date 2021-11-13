const { src, dest, watch, series, parallel } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const sortMediaQueries = require('postcss-sort-media-queries');
const browserSync = require('browser-sync').create();
const connectSSI = require('connect-ssi');
const reload = browserSync.reload;


// ----------------------------------------
//  Compile Sass Files
// ----------------------------------------

const sassFiles = ['./scss/**/*.scss'];
const sassOption = {outputStyle: 'expanded', linefeed: 'lf'};
const autoprefixerOption = {cascade: false};
const sortMediaQueriesOption = {sort: 'mobile-first'};

function compileSass() {
  return src(sassFiles)
    .pipe(sass(sassOption).on("error", sass.logError))
    .pipe(postcss([
      autoprefixer(autoprefixerOption),
      sortMediaQueries(sortMediaQueriesOption)
    ]))
    .pipe(dest('./css/'));
}
function watchSassFiles() {
  watch(sassFiles, compileSass);
}


// ----------------------------------------
//  Start BrowserSync
// ----------------------------------------
function initialize(done) {
  const htmlFiles = ['**/*.html'];
  const cssFiles = ['**/*.css'];
  const jsFiles = ['**/*.js'];
  browserSync.init({
    server: {
      baseDir: "./",
      middleware: [
        connectSSI({
          baseDir: __dirname,
          ext: '.html'
        })
      ]
    }
  });
  watch(htmlFiles).on('change', reload);
  watch(cssFiles).on('change', reload);
  watch(jsFiles).on('change', reload);
  done();
}


exports.default = series(initialize, watchSassFiles);