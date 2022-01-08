<?php get_header(); ?>
<div class="body">
  <main role="main" class="main main--archive">
<?php
  if ( have_posts() ):
    while( have_posts() ): the_post();
?>
    <article class="main-card">
      <a class="main-card__link" href="<?php the_permalink(); ?>">
        <figure class="main-card__thumbnail">
          <img src="<?php the_post_thumbnail_url(); ?>" alt="" width="600" height="315">
        </figure>
        <div class="main-card__body">
          <h2 class="main-card__title"><?php the_title(); ?></h2>
          <div class="main-card__meta">
            <dl class="main-card__date">
              <dt><svg role="img" aria-labelledby="title-calendar"><title id="title-calendar">投稿日</title><use href="#ico-calendar"></use></svg></dt>
              <dd><time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y年n月d日'); ?></time></dd>
            </dl>
          </div>
        </div>
      </a>
    </article>
<?php
    endwhile;
  endif;
?>
  </main>
  <?php get_sidebar(); ?>
</div>
<!-- .content -->
<?php get_footer(); ?>