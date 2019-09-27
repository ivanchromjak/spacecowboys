<?php global $processpress; ?>
<nav id="navbar" class="uk-navbar-container uk-light<?php echo ( !$processpress['fixed_nav'] ? ' uk-navbar-transparent' : '' ); ?>">
  <div class="uk-container">
    <div data-uk-navbar>
      <div class="uk-navbar-left">

        <a class="uk-navbar-item uk-logo" href="<?php echo home_url(); ?>">
          <?php if ($processpress['logo']['url']) { ?>
            <img src="<?php echo $processpress['logo']['url']; ?>" alt="<?php bloginfo('name'); ?>">
          <?php } else { ?>
            <?php bloginfo('name'); ?>
          <?php } ?>
        </a>

        <?php
          if (has_nav_menu('primary_navigation')) :
            wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'uk-navbar-nav uk-visible@m'));
          endif;
        ?>
      </div>

      <div class="uk-navbar-right">
        <?php if ($processpress['nav_user_menu'] == 1) { ?>
          <ul class="uk-navbar-nav uk-visible@m">
            <li>
              <?php
              global $modal_login_settings;
              if ($processpress['login_redirect'] == 2) {
                $login_redirect = wp_login_url(home_url());
              } elseif ($processpress['login_redirect'] == 3) {
                $login_redirect = wp_login_url(get_permalink());
              } else {
                $login_redirect = wp_login_url();
              }
              ?>
              <?php if (!is_user_logged_in()) { ?>
                <?php if(isset($modal_login_settings['add_to_user_menu'])) { ?>
                  <?php add_modal_login_link(); ?>
                <?php } else { ?>
                  <a href="<?php echo $login_redirect; ?>"><span class="uk-margin-small-right" data-uk-icon="user"></span> <?php _e('Login', 'processpress' ); ?></a>
                <?php } ?>
              <?php } elseif (is_user_logged_in()) { ?>
                <a href="#"><?php echo get_avatar( get_current_user_id(), '32', '', '', array('class' => 'uk-border-circle uk-margin-small-right') ); ?> <?php $current_user = wp_get_current_user(); echo $current_user->display_name ; ?></a>
                <div class="uk-navbar-dropdown">
                  <ul class="uk-nav uk-navbar-dropdown-nav">
                    <?php if (!$processpress['prevent_admin_access']) { ?>
                      <li>
                        <a href="<?php echo site_url('wp-admin/'); ?>"><span class="uk-margin-small-right" data-uk-icon="cog"></span><?php _e('Admin', 'processpress' ); ?></a>
                      </li>
                     <?php } ?>
                    <li>
                      <a href="<?php echo get_permalink($processpress['user_profile_page']); ?>"><span class="uk-margin-small-right" data-uk-icon="user"></span><?php _e('Profile', 'processpress' ); ?></a>
                    </li>
                    <li>
                      <a href="<?php echo wp_logout_url( home_url() ); ?>"><span class="uk-margin-small-right" data-uk-icon="sign-out"></span><?php _e('Logout', 'processpress' ); ?></a>
                    </li>
                  </ul>
                </div>
              <?php } ?>
            </li>
          </ul>
        <?php } ?>
        <a class="uk-navbar-toggle uk-hidden@m" data-uk-toggle="target: #mobile">
          <span data-uk-navbar-toggle-icon></span> <span class="uk-margin-small-left">Menu</span>
        </a>
      </div>

    </div>
  </div>
</nav>
