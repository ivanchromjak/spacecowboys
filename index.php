<?php if (!have_posts()) : ?>
  <h1>
    <?php _e('Sorry, no results were found.', 'processpress'); ?>
  </h1>
<?php endif; ?>

<?php
$posts_per_page = intval(get_query_var('posts_per_page'));
$paged = intval(get_query_var('paged'));

if(empty($paged) || $paged == 0) {
  $i = 0;
} else {
  $i = $paged - 1;
}

$i  = $i * $posts_per_page;
?>

<?php while (have_posts()) : the_post(); ?>
  <article class="post-<?php the_ID(); ?> post hentry<?php echo $read; ?> entry-step uk-article uk-position-relative">
    <header>
      <h2 class="uk-article-title uk-margin-medium-bottom">
        <?php if (is_archive('post')) { ?>
          <?php $position = $wp_query->current_post + $i +1; ?>
          <span class="step-count uk-margin-small-right"><?php echo $position; ?></span>
        <?php } ?>
        <?php the_title(); ?>
      </h2>
      <?php
        if ( $processpress['step_read'] && is_archive('post') ) {
            step_read();
        }
      ?>
    </header>
    <?php if ( has_post_thumbnail() ) { ?>
      <div class="featured-img uk-margin-medium-bottom">
        <?php the_post_thumbnail(); ?>
      </div>
    <?php } ?>
    <div class="entry-content step-content">
      <?php the_content(); ?>
    </div>
    <hr class="uk-margin-large-top">
  </article>

<?php endwhile; ?>

<?php if ($wp_query->max_num_pages > 1) : ?>
  <nav class="post-nav">
    <ul class="pager">
      <li class="previous"><?php next_posts_link(__('&larr; Older', 'processpress')); ?></li>
      <li class="next"><?php previous_posts_link(__('Newer &rarr;', 'processpress')); ?></li>
    </ul>
  </nav>
<?php endif; ?>
