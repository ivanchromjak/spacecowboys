<div id="mobile" class="uk-modal-full menu-modal" data-uk-modal>
  <div class="uk-modal-dialog uk-background-secondary uk-light">
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
            <a class="uk-navbar-toggle uk-modal-close-full uk-padding-remove uk-background-secondary">
              <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px">
                  <path fill-rule="evenodd"  fill="rgb(255, 255, 255)" d="M2.150,0.905 L0.566,2.507 L3.428,5.405 L0.548,8.339 L2.132,9.941 L4.994,7.007 L7.874,9.941 L9.422,8.339 L6.578,5.405 L9.404,2.507 L7.856,0.905 L4.994,3.839 L2.150,0.905 Z"/>
                </svg>
                Close
              </span>
            </a>
          </div>
        </div>
      </div>
    </nav>
    <div data-uk-height-viewport>
      <div class="uk-container uk-container-small">
        <?php
          if (has_nav_menu('mobile_navigation')) :
            wp_nav_menu(array('theme_location' => 'mobile_navigation', 'menu_class' => 'uk-nav uk-nav-primary uk-nav-center uk-margin-medium-top first', 'depth' => 1));
          endif;
        ?>
      </div>
    </div>
  </div>
</div>
