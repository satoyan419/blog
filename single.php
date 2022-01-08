<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="body">
  <main role="main" class="main">
    <article class="main-entry" itemscope itemtype="https://schema.org/BlogPosting">
      <header class="main-entry__header">
        <h1 class="main-entry__title" itemprop="headline"><?php the_title(); ?></h1>
        <div class="main-entry__meta main-entry__meta--single">
          <dl class="main-entry__date">
            <dt><svg role="img" aria-labelledby="title-calendar"><title id="title-calendar">投稿日</title><use href="#ico-calendar"></use></svg></dt>
            <dd><time itemprop="datePublished" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y年n月j日'); ?></time></dd>
<?php
  if ( get_field( 'update' ) ):
    $date = new DateTime( get_field( 'update' ) );
?>
            <dt><svg role="img" aria-labelledby="title-update"><title id="title-update">更新日</title><use href="#ico-update"></use></svg></dt>
            <dd><time itemprop="dateModified" datetime="<?php the_field( 'update' ); ?>"><?php echo $date->format('Y年n月j日') ?></time></dd>
<?php endif; ?>
          </dl>
          <dl class="main-entry__author">
            <dt><svg role="img" aria-labelledby="title-author"><title id="title-author">著者</title><use href="#ico-author"></use></svg></dt>
            <dd itemprop="author" itemscope itemtype="https://schema.org/Person">
              <span itemprop="name">庄司 諭史</span>
              <link itemprop="url" href="https://satoyan419.com/">
              <link itemprop="sameAs" href="https://twitter.com/satoyan419">
            </dd>
          </dl>
<?php
  $tags = get_the_tags();
  if ( $tags ):
?>
          <dl class="main-entry__tag">
            <dt><svg role="img" aria-labelledby="title-tag"><title id="title-tag">タグ</title><use href="#ico-tag"></use></svg></dt>
<?php
  foreach ( $tags as $tag ):
?>
            <dd><a href="<?php echo get_tag_link( $tag->term_id ); ?>"><?php echo $tag->name; ?></a></dd>
<?php
  endforeach;
?>
          </dl>
<?php
  endif;
?>
        </div>
        <figure class="main-entry__thumbnail">
          <?php the_post_thumbnail( 'full', array( 'itemprop' => "image" ) ); ?>
        </figure>
        <meta itemprop="description" content="ディスクリプションが入ります。">
      </header>
      <section class="main-entry__body">
        <?php the_content(); ?>
      </section>
    </article>
  </main>
  <?php get_sidebar(); ?>
</div>
<!-- /.body -->
<nav class="main-breadcrumb" role="navigation" aria-label="現在位置">
  <ol class="main-breadcrumb__list" itemscope itemtype="https://schema.org/BreadcrumbList">
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <a itemprop="item" href="<?php echo esc_url( home_url( '/' ) ); ?>"><span itemprop="name">Home</span></a>
      <meta itemprop="position" content="1">
    </li>
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" aria-current="location">
      <span itemprop="name"><?php the_title(); ?></span>
      <meta itemprop="position" content="2">
    </li>
  </ol>
</nav>
<?php endwhile; ?>
<?php get_footer(); ?>