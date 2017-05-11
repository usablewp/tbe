<?php

/*---------------------------------------------------------------------*/
/*------------------ Register and Enqueue scripts ---------------------*/
/*---------------------------------------------------------------------*/

function tbe_enqueue_scripts(){

	// Register Vendor Scripts

	$suffix = tbe_get_min_suffix();

	// modernizr, hoverintent, superfish, match-height, scrollto, fitvid, owl-carousel
	wp_register_script( 'a11y-accordion', TBE_LIBRARY_JS_VENDOR_URI . 'a11y-accordion.js', 'jquery', '0.1.0', true );
	wp_register_script( 'accessible-tabs', TBE_LIBRARY_JS_VENDOR_URI . 'accessible-tabs.js', 'jquery', '0.1.0', true );
	wp_register_script( 'accessible-toggles', TBE_LIBRARY_JS_VENDOR_URI . 'accessible-toggles.js', 'jquery', '0.1.0', true );

	// Enqueue Vendor Scripts
  wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'vendor', TBE_LIBRARY_JS_VENDOR_URI . 'vendor.js', 'jquery', '1.0.0', true );

	// Enqueue Main Script
	$main_script_uri = TBE_LIBRARY_JS_URI . 'main.js';
	// If a '.min' version of the parent theme main.js file exists, use it.
	if ( file_exists( TBE_LIBRARY_JS_DIR . "main{$suffix}.js" ) ){
			$main_script_uri = TBE_LIBRARY_JS_URI . "main{$suffix}.js";
	}
	wp_enqueue_script( 'main', $main_script_uri, 'jquery', '0.1.0', true );
}
add_action( 'wp_enqueue_scripts', 'tbe_enqueue_scripts' );

/*---------------------------------------------------------------------*/
/*------------------ Register and Enqueue styles ----------------------*/
/*---------------------------------------------------------------------*/
function tbe_enqueue_styles(){

	$suffix = tbe_get_min_suffix();

	// Enqueue Fonts
	wp_enqueue_style( 'tbe-fonts', '//fonts.googleapis.com/css?family=Droid+Sans:400,700|Droid+Serif:400,400i,700' );

	// Enqueue Styles

	// Get the parent theme stylesheet.
	$stylesheet_uri = TBE_THEME_URI . 'style.css';

	// If a '.min' version of the parent theme stylesheet exists, use it.
	if ( $suffix && file_exists( TBE_THEME_DIR . "style{$suffix}.css" ) )
		$stylesheet_uri = TBE_THEME_URI . "style{$suffix}.css";

	wp_enqueue_style( 'main-style', $stylesheet_uri, array(), '0.1.0', 'all' ); // main style.css

}
add_action( 'wp_enqueue_scripts', 'tbe_enqueue_styles' );

/*---------------------------------------------------------------------*/
/*---------- Enqueue admin widget scripts on admin side ----------*/
/*---------------------------------------------------------------------*/
function tbe_admin_enqueue_scripts() {

	// Enqueue admin scripts
	wp_enqueue_script(
    'handlebars', TBE_LIBRARY_JS_ADMIN_URI . 'handlebars-v4.0.5.js', false, '1.0.0'
  );

	// Enqueue Native media uploaded dependencies
	wp_enqueue_media();

	wp_enqueue_script(
    'widgets-media-uploader', TBE_LIBRARY_JS_ADMIN_URI . 'widgets-media-uploader.js',
    array( 'jquery'), '1.0.0'
  );

	// Enqueue javascript for widgets
	wp_enqueue_script(
    'advanced-widgets', TBE_LIBRARY_JS_ADMIN_URI . 'admin-widgets.js',
    array( 'jquery', 'underscore', 'backbone' ), '1.0.0.'
  );

	// Enqueue admin Styles
	wp_enqueue_style( 'widget-styles', TBE_LIBRARY_CSS_ADMIN_URI . 'widgets.css');

}
add_action( 'admin_enqueue_scripts', 'tbe_admin_enqueue_scripts', 1 );
