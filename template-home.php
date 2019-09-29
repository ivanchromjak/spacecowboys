<?php
/*
Template Name: Home
*/
?>
<?php
if ( have_rows( 'about' ) ) :
	while ( have_rows( 'about' ) ) : the_row();
  ?>
    <div id="about" class="uk-section uk-section-muted uk-text-center">
      <div class="uk-container uk-container-xsmall">
        <h2 class="uk-text-uppercase"><?php the_sub_field('title'); ?></h2>
        <p class="subtitle"><?php the_sub_field('subtitle'); ?></p>
      </div>
      <div class="uk-container uk-container-boxes">
        <?php if( have_rows('boxes') ) { ?>
          <div class="uk-child-width-expand@m uk-grid-match uk-grid-boxes" data-uk-grid>
            <?php while( have_rows('boxes') ): the_row(); ?>
              <div>
                <div class="uk-card uk-card-default uk-card-body">
                  <div class="box-icon uk-background-primary uk-border-circle">
                    <span class="uk-position-center"><?php echo get_the_svg(get_sub_field('icon')); ?></span>
                  </div>
                  <h3 class="uk-card-title uk-text-uppercase"><?php the_sub_field('title'); ?></h3>
                  <p class="uk-margin-bottom"><?php the_sub_field('text'); ?></p>
                </div>
              </div>
            <?php endwhile; ?>
          </div>
        <?php } ?>
      </div>
    </div>
  <?php endwhile; ?>
<?php endif ?>


<?php get_template_part('templates/content', 'page'); ?>

