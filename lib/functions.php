<?php

/*-----------------------------------------------------------------------------------*/
/* Option Favicon */
/*-----------------------------------------------------------------------------------*/

function pa_favicon() {
  global $processpress;
  if( $processpress['favicon']['url']) {
      echo '<link rel="shortcut icon" href="' . $processpress['favicon']['url'] . '">';
  }
}


/*-----------------------------------------------------------------------------------*/
/* Titles */
/*-----------------------------------------------------------------------------------*/

function pa_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	return $title;
}
add_filter( 'wp_title', 'pa_wp_title', 10, 2 );



/*-----------------------------------------------------------------------------------*/
/* Dynamic Options Styles */
/*-----------------------------------------------------------------------------------*/

function genCss($options) {

	global $processpress;
	$options = get_option( 'processpress' );

	$theme_options_styles = '<style id="processpress-custom-css">';

	// navbar background color
	$navbar_bg_color = $processpress['navbar_background'];
	if ($navbar_bg_color && !is_page_template('template-home.php')) {
		$theme_options_styles .= '
		.uk-navbar-container:not(.uk-navbar-transparent) {
		  background: ' . $navbar_bg_color . ';
		}';
	}

	// links /btn / form color
	$links_color = $processpress['links_color'];
	if ($links_color) {

    $theme_options_styles .='a, .uk-card-default .uk-card-title, .entry-step .uk-article-title {color:' . $processpress['links_color']['regular'] . ';}';
    $theme_options_styles .='a:hover {color:' . $processpress['links_color']['hover'] . ';}';

    $theme_options_styles .='.uk-button-primary, .step-count {background-color:' . $processpress['links_color']['regular'] . ';}';

    $theme_options_styles .='.uk-progress::-webkit-progress-value {background-color:' . $processpress['links_color']['regular'] . ';}';
    $theme_options_styles .='.uk-progress::-moz-progress-bar {background-color:' . $processpress['links_color']['regular'] . ';}';
    $theme_options_styles .='.uk-progress::-ms-fill {background-color:' . $processpress['links_color']['regular'] . ';}';

    $theme_options_styles .='.uk-button-primary:hover {background-color:' . $processpress['links_color']['hover'] . ';}';

    $theme_options_styles .='.read-btn, .uk-input:focus, .uk-select:focus, .uk-textarea:focus, .uk-search-default .uk-search-input:focus {border-color:' . $processpress['links_color']['regular'] . ';}';
    $theme_options_styles .='.read-btn:hover {border-color:' . $processpress['links_color']['hover'] . ';}';

	}

	// custom css
	$custom_css = $processpress['custom_css'];
	if ($custom_css) {
		$theme_options_styles .= '
		' . $processpress['custom_css'] . '
		';
	}

  $theme_options_styles .= "</style>";
  echo $theme_options_styles;
}

add_action('wp_head','genCss');



/**
 * Include the TGM_Plugin_Activation class.
 */
require_once locate_template('/lib/class-tgm-plugin-activation.php');          // TGM Plugin

add_action( 'tgmpa_register', 'spacecowboys_register_required_plugins' );

function spacecowboys_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		array(
			'name'               => 'Advanced Custom Fields PRO', // The plugin name.
			'slug'               => 'advanced-custom-fields-pro', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/lib/plugins/advanced-custom-fields-pro.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
		),

		array(
			'name'               => 'Advanced Custom Fields: Icon Picker', // The plugin name.
			'slug'               => 'acf-icon-picker', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/lib/plugins/acf-icon-picker.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
		),

	);

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'id'           => 'spacecowboys',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );

}
