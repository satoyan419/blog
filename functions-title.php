<?php
  function title() {
    $site_name = 'satoyan419.com';
    if ( is_home() || is_front_page() ) {
      // トップページ
      echo $site_name;
    } elseif ( is_404() ) {
      // 404ページ
      echo 'ページが見つかりません | ' . $site_name;
    } elseif ( is_single() ) {
      // 投稿ページ
      echo get_the_title() . ' | ' . $site_name;
    }
  }
?>