<?php
/**
 * Enqueue scripts and stylesheets
 */

$options = get_option( 'processpress' );

function roots_scripts() {
  wp_enqueue_style('roots_main', get_template_directory_uri() . '/assets/css/main.css', false, '9a2dd99b82ca338b034e8730b94139d2');

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  wp_register_script('roots_scripts'        ,get_template_directory_uri() . '/assets/js/main.js', false, '2a3e700c4c6e3d70a95b00241a845695', false);
  wp_register_script('fastlivefilter'       ,get_template_directory_uri() . '/assets/js/jquery.fastLiveFilter.js');

  wp_enqueue_script('jquery');
  wp_enqueue_script('roots_scripts');

  if(is_page_template('template-procedures.php'))
    wp_enqueue_script('fastlivefilter');
}

function login_scripts() {
  wp_enqueue_style( 'login_css', get_template_directory_uri() . '/assets/css/login.css' );
}

function papc_reorder_scripts() {

  global $pagenow;

  if( $pagenow == 'edit.php') {
      if ( !isset($_GET['post_type']) || 'post' == $_GET['post_type'] ) {
          wp_register_style('pressapps_order-admin-styles', get_template_directory_uri() . '/assets/css/reorder.css');
          wp_register_script('pressapps_order-update-order', get_template_directory_uri() . '/assets/js/order-posts.js');
          wp_enqueue_script('jquery-ui-sortable');
          wp_enqueue_script('pressapps_order-update-order');
          wp_enqueue_style('pressapps_order-admin-styles');
      }
  } elseif( $pagenow == 'edit-tags.php' ) {
      if ( isset($_GET['taxonomy']) && 'category' == $_GET['taxonomy'] ) {
          wp_register_style('pressapps_order-admin-styles', get_template_directory_uri() . '/assets/css/reorder.css');
          wp_register_script('pressapps_order-update-order', get_template_directory_uri() . '/assets/js/order-taxonomies.js');
          wp_enqueue_script('jquery-ui-sortable');
          wp_enqueue_script('pressapps_order-update-order');
          wp_enqueue_style('pressapps_order-admin-styles');
      }
  }
}
add_action('wp_enqueue_scripts', 'roots_scripts', 100);
add_action('login_enqueue_scripts', 'login_scripts', 1);
if ($options['reorder']) {
  add_action('admin_enqueue_scripts', 'papc_reorder_scripts');
}

$options = get_option( 'processpress' );

function roots_google_analytics() {
  $options = get_option( 'processpress' );
  ?>
<script>
  (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
  function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
  e=o.createElement(i);r=o.getElementsByTagName(i)[0];
  e.src='//www.google-analytics.com/analytics.js';
  r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
  ga('create','<?php echo $options['analytics']; ?>');ga('send','pageview');
</script>

<?php }
if ($options['analytics'] && !current_user_can('manage_options')) {
  add_action('wp_footer', 'roots_google_analytics', 20);
}
