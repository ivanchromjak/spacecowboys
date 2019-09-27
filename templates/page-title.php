<div class="uk-width-3-4@m">
  <h1 class="uk-heading-primary"><?php echo roots_title(); ?></h1>
  <?php
  if (is_archive()) {
    echo category_description();
  }
  ?>
  <?php
  if (!is_404() && is_page()) {
    global $post;
    $subtitle = get_post_meta( $post->ID, 'subtitle', true );
    if ( $subtitle ) {
      echo '<p>' . $subtitle . '</p>';
    }
  }
  ?>
</div>
