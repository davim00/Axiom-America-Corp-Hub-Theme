<?php
/**
 * Enqueue scripts and styles.
 */
function aa_theme_scripts() {
  // Include the Axiom corporate fonts Source Sans and Source Code
	wp_enqueue_style('gfonts', '//fonts.googleapis.com/css?family=Source+Code+Pro|Source+Sans+Pro:300,300i,400,400i,700,700i,900,900i');
  // Include Fontawesome
  wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css');

  // Serve up some jQuery
  // wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', array('jquery'), '1.12.4', true );
  // Bootstrap JS
	wp_enqueue_script( 'bootstrap-js', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), '3.3.7', true );
}
add_action( 'wp_enqueue_scripts', 'aa_theme_scripts' );
