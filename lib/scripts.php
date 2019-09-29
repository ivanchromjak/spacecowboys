<?php
/**
 * Enqueue scripts and stylesheets
 */

function sc_scripts() {
  wp_enqueue_style('sc_google_fonts', 'https://fonts.googleapis.com/css?family=Merriweather:300,400i|Montserrat:400,700&display=swap', false);
  wp_enqueue_style('sc_main', get_template_directory_uri() . '/assets/css/main.css', false);

  wp_register_script('sc_scripts' ,get_template_directory_uri() . '/assets/js/main.js', false, '2a3e700c4c6e3d70a95b00241a845695', false);

  wp_enqueue_script('jquery');
  wp_enqueue_script('sc_scripts');
}

add_action('wp_enqueue_scripts', 'sc_scripts', 100);