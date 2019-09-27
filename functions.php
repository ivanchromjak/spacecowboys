<?php
/**
 * Includes
 */

require_once locate_template('/lib/utils.php');           // Utility functions
require_once locate_template('/lib/init.php');            // Initial theme setup and constants
require_once locate_template('/lib/wrapper.php');         // Theme wrapper class
require_once locate_template('/lib/titles.php');          // Page titles
require_once locate_template('/lib/nav.php');             // Custom nav modifications
require_once locate_template('/lib/scripts.php');         // Scripts and stylesheets
require_once locate_template('/lib/functions.php');       // Custom functions


if ( class_exists('acf') ) {

	/**
	 * Create JSON save point
	 */
  add_filter('acf/settings/save_json', 'sc_acf_json_save_point');

  function sc_acf_json_save_point( $path ) {
    $path = plugin_dir_path( __FILE__ ) . 'lib/acf-json/';
    return $path;
  }

  /**
   * Create JSON load point
   */
  add_filter('acf/settings/load_json', 'sc_acf_json_load_point');

  /**
   * Function to create JSON load point
   */
  function sc_acf_json_load_point( $paths ) {
  $paths[] = plugin_dir_path( __FILE__ ) . 'lib/acf-json/';
  return $paths;
  }

}

/**
 * Add ACF options page
 */
if( function_exists('acf_add_options_page') ) {

	$parent = acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'sc-options',
		'capability'	=> 'edit_posts',
		'icon_url' 		=> 'dashicons-admin-settings',
	));
	
}
