const connectSSI = require('connect-ssi');

module.exports = {
  "files": ["**/*.html", "css/*.css", "js/*.js"],
  "server": true,
  "middleware": [
    connectSSI({
      baseDir: __dirname,
      ext: '.html'
    })
  ]
};