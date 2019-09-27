<?php global $processpress; ?>
<div id="mobile" class="uk-modal-full menu-modal" data-uk-modal>

    <div class="uk-modal-dialog uk-background-primary uk-light">
        <button class="uk-modal-close-full uk-close-large uk-background-primary" type="button" data-uk-close></button>

        <div data-uk-height-viewport>

          <div class="uk-container uk-container-small">

            <?php
              if (has_nav_menu('mobile_navigation')) :
                wp_nav_menu(array('theme_location' => 'mobile_navigation', 'menu_class' => 'uk-nav-primary uk-nav-center first', 'depth' => 1));
              endif;
            ?>

            <?php if ($processpress['nav_user_menu'] == 1) { ?>
              <ul class="uk-nav-primary uk-nav-center">
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
                      <li><?php add_modal_login_link(); ?></li>
                    <?php } else { ?>
                      <li><a href="<?php echo $login_redirect; ?>"><?php _e('Login', 'processpress' ); ?></a></li>
                    <?php } ?>
                  <?php } elseif (is_user_logged_in()) { ?>
                    <?php if (!$processpress['prevent_admin_access']) { ?>
                      <li>
                        <a href="<?php echo site_url('wp-admin/'); ?>"><?php _e('Admin', 'processpress' ); ?></a>
                      </li>
                     <?php } ?>
                    <li>
                      <a href="<?php echo get_permalink($processpress['user_profile_page']); ?>"><?php _e('Profile', 'processpress' ); ?></a>
                    </li>
                    <li>
                      <a href="<?php echo wp_logout_url( home_url() ); ?>"><?php _e('Logout', 'processpress' ); ?></a>
                    </li>
                  <?php } ?>
              </ul>
            <?php } ?>

          </div>

        </div>

    </div>
</div>
