<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title><?php title(); ?></title>
  <meta name="description" content="<?php description(); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
<?php if ( is_single() ): ?>
  <meta name="twitter:card" content="summary_large_image">
  <meta property="og:url" content="<?php the_permalink(); ?>">
  <meta property="og:type" content="article">
  <meta property="og:title" content="<?php title(); ?>">
  <meta property="og:description" content="<?php description(); ?>">
  <meta property="og:image" content="<?php the_post_thumbnail_url(); ?>">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
<?php endif; ?>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@500&display=swap">
  <?php wp_head(); ?>
  <!-- Twitter universal website tag code -->
  <script>
  !function(e,t,n,s,u,a){e.twq||(s=e.twq=function(){s.exe?s.exe.apply(s,arguments):s.queue.push(arguments);
  },s.version='1.1',s.queue=[],u=t.createElement(n),u.async=!0,u.src='//static.ads-twitter.com/uwt.js',
  a=t.getElementsByTagName(n)[0],a.parentNode.insertBefore(u,a))}(window,document,'script');
  // Insert Twitter Pixel ID and Standard Event data below
  twq('init','o7e71');
  twq('track','PageView');
  </script>
  <!-- End Twitter universal website tag code -->
</head>
<body>
  <?php wp_body_open(); ?>
  <?php get_template_part( 'inc/svg' ); ?>
  <header class="header" role="banner">
    <div class="header__inner">
      <div class="header__branding">
<?php if ( is_front_page() || is_home() ): ?>
        <h1 class="header__title">satoyan419.com</h1>
<?php else: ?>
        <p class="header__title"><a href="<?php echo esc_url( home_url() ); ?>">satoyan419.com</a></p>
<?php endif; ?>
      </div>
<?php /* ?>
      <nav class="header-menu" role="navigation" aria-label="メインメニュー">
        <button id="menu-button" class="header-menu__button" aria-controls="menu-list" aria-expanded="false">
          <span></span>
          <span></span>
          <span></span>
        </button>
        <div id="menu-panel" class="header-menu__panel">
          <ul class="header-menu__list">
            <li><a href="zzz">xxx</a></li>
            <li><a href="zzz">xxx</a></li>
          </ul>
        </div>
      </nav>
<?php */ ?>
    </div>
  </header>