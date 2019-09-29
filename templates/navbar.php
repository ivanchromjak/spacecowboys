<nav id="navbar" class="uk-navbar-container uk-light uk-navbar-transparent">
  <div class="uk-container">
    <div data-uk-navbar>
      <div class="uk-navbar-left">
        <a class="uk-navbar-item uk-logo" href="<?php echo home_url(); ?>">
          <?php if (get_field('logo', 'option')) { ?>
            <img src="<?php the_field('logo', 'option'); ?>" alt="<?php bloginfo('name'); ?>">
          <?php } else { ?>
            <?php bloginfo('name'); ?>
          <?php } ?>
        </a>
      </div>
      <div class="uk-navbar-right">
        <?php
          if (has_nav_menu('primary_navigation')) :
            wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'uk-navbar-nav uk-visible@m'));
          endif;
        ?>
        <a class="uk-navbar-toggle uk-hidden@m" data-uk-toggle="target: #mobile">
          <span>Menu</span>
        </a>
      </div>
    </div>
  </div>
</nav>
