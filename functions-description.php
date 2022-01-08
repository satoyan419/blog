<?php
  function description() {
    if ( is_home() || is_front_page() ) {
      echo 'Webサイト制作に関するトピックを紹介するサイト';
    } elseif ( is_single() ) {
      // 投稿ページ
      echo get_field( 'description' );
    }
  }
?>