<?php

  // titleを設定する
  include( get_theme_file_path( '/functions-title.php' ) );


  // descriptionを設定する
  include( get_theme_file_path( '/functions-description.php' ) );


  // headタグ内の不要なコードを削除
  add_filter( 'emoji_svg_url', '__return_false' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'wp_print_styles', 'print_emoji_styles', 10 );
  remove_action( 'wp_head', 'rsd_link' );
  remove_action( 'wp_head', 'wlwmanifest_link' );
  remove_action( 'wp_head', 'wp_generator' );


  // styleとscriptを読み込む
  function add_styles_scripts() {
    wp_enqueue_style( 'luminous-style', get_theme_file_uri( '/css/luminous-basic.min.css' ), array(), filemtime( get_theme_file_path( '/css/luminous-basic.min.css' ) ) );
    wp_enqueue_style( 'main-style', get_theme_file_uri( '/css/style.css' ), array(), filemtime( get_theme_file_path( '/css/style.css' ) ) );
    wp_enqueue_style( 'hljs-style', get_theme_file_uri( '/css/atom-one-dark.min.css' ), array(), filemtime( get_theme_file_path( '/css/atom-one-dark.min.css' ) ) );
    wp_enqueue_script( 'luminous-script', get_theme_file_uri( '/js/luminous.min.js' ), array(), filemtime( get_theme_file_path( '/js/luminous.min.js' ) ) );
    wp_enqueue_script( 'main-script', get_theme_file_uri( '/js/main.js' ), array(), filemtime( get_theme_file_path( '/js/main.js' ) ) );
    wp_enqueue_script( 'hljs-script', get_theme_file_uri( '/js/highlight.min.js' ), array(), filemtime( get_theme_file_path( '/js/highlight.min.js' ) ) );
    wp_add_inline_script( 'hljs-script', 'hljs.highlightAll();' );
  }
  add_action( 'wp_enqueue_scripts', 'add_styles_scripts' );


  // scriptにdefer属性を付与する
  function add_defer( $tag, $handle ) {
    if ( !is_admin() && $handle === 'main-script' ) {
      return str_replace( ' src=', ' defer src=', $tag );
    }
    return $tag;
  }
  add_filter( 'script_loader_tag', 'add_defer', 10, 2 );


  // アイキャッチ画像の有効化
  add_theme_support( 'post-thumbnails' );


  // WordPressのデフォルトのファビコンを削除
  function delete_wp_favicon() {
    exit;
  }
  add_action( 'do_faviconico', 'delete_wp_favicon' );


  // 画像にluminous属性を追加
  function add_luminous_attribute_to_image( $content ) {
    $content = preg_replace_callback( '/<img([^>]*)>/', function( $matches ) {
      $match = rtrim ( $matches[1], '/' );
      if ( strpos( $match, 'data-luminous' ) === false ) {
        preg_match( '/src="([^"]*)"/', $match, $path );
        $match .= ' data-luminous="' . $path[1] . '"';
      }
      return '<img' . $match . '>';
    }, $content );
    return $content;
  }
  add_filter( 'the_content' , 'add_luminous_attribute_to_image' );


  // エディタ用のCSSを読み込み
  function add_editor_css() {
    wp_enqueue_style( 'theme-editor-style', get_theme_file_uri( '/css/editor-style.css' ) );
  }
  add_action( 'enqueue_block_editor_assets', 'add_editor_css' );





?>