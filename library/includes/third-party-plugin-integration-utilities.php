<?php
/**
 * Actions and filters for modifying look and feel of third party plugins from wordpress plugin repository.
 *
 * @package    The Basics of Everything
 * @author     Naresh Devineni <nareshdevineni@usablewp.com>
 * @copyright  Copyright (c) 2016, Naresh Devineni
 * @link       http://usablewp.com/themes/the-basics-of-everything
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

// Checks if "Whistles" plugin exists, if it exists, loads custom whistles functionality and add theme support
add_action( 'after_setup_theme', 'tbe_load_custom_whistles_functionality', 6 );

// add theme support for "Featured on" plugin
add_action( 'after_setup_theme', 'tbe_add_theme_support_for_featured_on_plugin', 6 );

// Deregister scripts and styles of plugins that are supported by theme
add_action( 'wp_enqueue_scripts', 'tbe_remove_theme_supported_plugins_scripts_and_styles' );

// Hide ellipsis in "Read More..." link of "Feature a page widget plugin"
add_filter( 'fpw_read_more_ellipsis', '__return_null' );

// Remove default widget templates that comes with "Feature a page widget" plugin
add_filter( 'fpw_widget_templates', 'tbe_remove_fpw_widget_template' );

// Add custom widget templates with "Feature a page widget" plugin widget
add_filter( 'fpw_widget_templates', 'tbe_add_fpw_widget_template' );

// Add download post type to "Feature a page" plugin
add_filter( 'fpw_post_types', 'tbe_add_post_type_to_feature' );

// TGM Activation plugin
require_once $tbe_dir . 'library/includes/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'tbe_register_required_plugins' );

/**
 * Checks if "Whistles" plugin exists, if it exists, loads custom whistles functionality
 * Adds theme support for 'whistles'
 *
 * @since  0.1.0
 * @access public
 * @return void
 * @plugin Whistles
 */
function tbe_load_custom_whistles_functionality() {

  // Custom scripts and styles for "Whistles" plugin
  add_theme_support( 'whistles', array( 'scripts' => true, 'styles' => true ) );

  if( class_exists( 'Whistles_Load' ) ) {
		get_template_part( "library/accessible-whistles/accessible-whistles" );
	}
}

/**
 * Adds theme support for "Feature on" plugin and loads css styles from theme instead of plugin.
 *
 * @since  0.1.0
 * @access public
 * @return void
 * @plugin Featured on
 */
function tbe_add_theme_support_for_featured_on_plugin() {
  // Custom styles for "Featured on" plugin
  add_theme_support( 'featured-on', array( 'styles' => true ) );
}

/**
 * Function for removing "Feature a page widget" plugin styles because theme supports them
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function tbe_remove_theme_supported_plugins_scripts_and_styles() {

    // Dequeue Feature a page plugin's stylesheet
    wp_dequeue_style( 'fpw_styles_css' );
}

/**
 * Function for removing default widget templates that comes with "Feature a page widget" plugin
 *
 * default templates are: big, banner, wrapped
 * @since  0.1.0
 * @access public
 * @param $templates array	slug => label pairs of templates
 * @return modified $templates array
 */
function tbe_remove_fpw_widget_template( $templates ) {

  // Remove Big Template
  unset( $templates['big'] );

  // Remove Banner Template
  unset( $templates['banner'] );

  // Remove Wrapped template
  unset( $templates['wrapped'] );

  // Return modified templates array
  return $templates;
}

/**
 * Function for adding custom widget templates to "Feature a page widget" plugin
 *
 * @since  0.1.0
 * @access public
 * @param $templates array	slug => label pairs of templates
 * @return modified templates array
 */
function tbe_add_fpw_widget_template( $templates ){

  // Add "image-on-left" custom template to templates array
  $templates['image-at-left'] = __( 'Image at left', 'the-basics-of-everything' );

  // Add "image-on-left" custom template to templates array
  $templates['image-at-right'] = __( 'Image at Right', 'the-basics-of-everything' );

  // Add "image-at-center" custom template to templates array
  $templates['image-at-center'] = __( 'Image at center', 'the-basics-of-everything' );

  // Add "image-full-width" custom template to templates array
  $templates['image-full-width'] = __( 'Image full width', 'the-basics-of-everything' );

  // Return modified templates array
	return $templates;
}

/**
 * add a post type that can be featured in the Feature a Page Widget
 * Any post types added via this filter automatically have support added for excerpts and featured images
 * @param	$post_types	array	array of post_type slugs that can be featured with the widget
 */
function tbe_add_post_type_to_feature( $post_types ) {
	$post_types[] = 'download';
	return $post_types;
}

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function tbe_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// Easy Digital Downloads
		array(
			'name'      => 'Easy Digital Downloads',
			'slug'      => 'easy-digital-downloads',
			'required'  => true,
		),

    // Whistles
		array(
			'name'      => 'Whistles',
			'slug'      => 'whistles',
			'required'  => true,
		),

    // Feature a page
		array(
			'name'      => 'Feature a Page Widget',
			'slug'      => 'feature-a-page-widget',
			'required'  => false,
		),

    // Strong Testimonials
		array(
			'name'      => 'Strong Testimonials',
			'slug'      => 'strong-testimonials',
			'required'  => false,
		),

    // Contact Form 7
		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => true,
		),

    // BAW Login/Logout menu
		array(
			'name'      => 'BAW Login/Logout menu',
			'slug'      => 'baw-login-logout-menu',
			'required'  => false,
		),

    // BAW Login/Logout menu
		array(
			'name'      => 'BAW Login/Logout menu',
			'slug'      => 'baw-login-logout-menu',
			'required'  => false,
		),

    // Beaver Builder Plugin (Lite Version)
		array(
			'name'      => 'Beaver Builder Plugin (Lite Version)',
			'slug'      => 'beaver-builder-lite-version',
			'required'  => false,
		),

    // Page Builder by SiteOrigin
		array(
			'name'      => 'Page Builder by SiteOrigin',
			'slug'      => 'siteorigin-panels',
			'required'  => false,
		),

    // SiteOrigin Widgets Bundle
		array(
			'name'      => 'SiteOrigin Widgets Bundle',
			'slug'      => 'so-widgets-bundle',
			'required'  => false,
		),

    // Breadcrumb NavXT
		array(
			'name'      => 'Breadcrumb NavXT',
			'slug'      => 'breadcrumb-navxt',
			'required'  => false,
		),

    // Nav Menu Roles
		array(
			'name'      => 'Nav Menu Roles',
			'slug'      => 'nav-menu-roles',
			'required'  => false,
		),

    // Social Pug
		array(
			'name'      => 'Social Pug',
			'slug'      => 'social-pug',
			'required'  => false,
		),

    // TablePress
		array(
			'name'      => 'TablePress',
			'slug'      => 'tablepress',
			'required'  => false,
		),

  );

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
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

function tbe_ocdi_import_files() {
  return array(
    array(
      'import_file_name'           => 'Demo Import 1',
      'import_file_url'            => 'http://www.your_domain.com/ocdi/demo-content.xml',
      'import_widget_file_url'     => 'http://www.your_domain.com/ocdi/widgets.json',
      'import_customizer_file_url' => 'http://www.your_domain.com/ocdi/customizer.dat',
      'import_redux'               => array(
        array(
          'file_url'    => 'http://www.your_domain.com/ocdi/redux.json',
          'option_name' => 'redux_option_name',
        ),
      ),
      'import_preview_image_url'   => 'http://www.your_domain.com/ocdi/preview_import_image1.jpg',
      'import_notice'              => __( 'After you import this demo, you will have to setup the slider separately.', 'the-basics-of-everything' ),
    ),
  );
}
add_filter( 'pt-ocdi/import_files', 'tbe_ocdi_import_files' );
