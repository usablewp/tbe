<?php
/**
 * Handles the custom styles feature for the theme.
 *
 * @package    The Basics of everything
 * @copyright  Copyright (c) 2013 - 2016, Justin Tadlock <justin@justintadlock.com>
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/**
 * Handles custom theme style options via the WordPress theme customizer.
 *
 * @since  0.1.0
 * @access public
 */
final class Tbe_Custom_Styles {

	/**
	 * Holds the instance of this class.
	 *
	 * @since  0.1.0
	 * @access private
	 * @var    object
	 */
	private static $instance;

	/**
	 * Sets up the Custom Options feature.
	 *
	 * @since  0.1.0
	 * @access public
	 * @return void
	 */
	public function __construct() {

		// Output CSS into <head>.
		add_action( 'wp_head', array( $this, 'wp_head_callback' ) );
		add_action( 'embed_head', array( $this, 'wp_head_callback' ), 25 );

		// Filter the default maximum height value
		add_filter( 'theme_mod_maximum_logo_height', array( $this, 'maximum_logo_height_default' ), 95 );

		// Filter the default colors late.
		add_filter( 'theme_mod_heading_text_color', array( $this, 'heading_text_color_default' ), 95 );
		add_filter( 'theme_mod_body_text_color', array( $this, 'body_text_color_default' ), 95 );
		add_filter( 'theme_mod_color_primary', array( $this, 'color_primary_default' ), 95 );
		add_filter( 'theme_mod_button_hover_color', array( $this, 'button_hover_background_color_default' ), 95 );
		add_filter( 'theme_mod_box_background_color', array( $this, 'box_background_color_default' ), 95 );
		add_filter( 'theme_mod_border_color', array( $this, 'border_color_default' ), 95 );
		add_filter( 'theme_mod_small_information_color', array( $this, 'small_information_color_default' ), 95 );

		add_filter( 'theme_mod_navigation_background_color', array( $this, 'navigation_background_color_default' ), 95 );
		add_filter( 'theme_mod_navigation_text_color', array( $this, 'navigation_text_color_default' ), 95 );
		add_filter( 'theme_mod_navigation_text_color_on_hover', array( $this, 'navigation_text_color_on_hover_default' ), 95 );

		add_filter( 'theme_mod_menu_dropdown_background_color', array( $this, 'menu_dropdown_background_color_default' ), 95 );
		add_filter( 'theme_mod_menu_dropdown_link_color', array( $this, 'menu_dropdown_link_color_default' ), 95 );
		add_filter( 'theme_mod_menu_dropdown_link_color_on_hover', array( $this, 'menu_dropdown_link_color_on_hover_default' ), 95 );
		add_filter( 'theme_mod_menu_dropdown_link_background_color_on_hover', array( $this, 'menu_dropdown_link_background_color_on_hover_default' ), 95 );
		add_filter( 'theme_mod_offcanvas_submenu_background_color', array( $this, 'offcanvas_submenu_background_color_default' ), 95 );

		add_filter( 'theme_mod_table_header_background_color', array( $this, 'table_header_background_color_default' ), 95 );
		add_filter( 'theme_mod_table_header_text_color', array( $this, 'table_header_text_color_default' ), 95 );
		add_filter( 'theme_mod_table_body_background_color', array( $this, 'table_body_background_color_default' ), 95 );
		add_filter( 'theme_mod_table_body_text_color', array( $this, 'table_body_text_color_default' ), 95 );
		add_filter( 'theme_mod_table_content_border_color', array( $this, 'table_content_border_color_default' ), 95 );


		// Delete the cached data for this feature.
		add_action( 'update_option_theme_mods_' . get_stylesheet(), array( $this, 'cache_delete' ) );

		// Visual editor colors.
		add_action( 'wp_ajax_tbe_editor_styles',         array( $this, 'editor_styles_callback' ) );
		add_action( 'wp_ajax_no_priv_tbe_editor_styles', array( $this, 'editor_styles_callback' ) );
}

	/**
	 * Returns a default maximum logo height value if there is none set.  We use this instead of setting a default
	 * so that child themes can overwrite the default early.
	 *
	 * @since  0.1.0
	 * @access public
	 * @param  number  $height
	 * @return number
	 */
	public function maximum_logo_height_default( $height ) {
		return $height ? $height : 48;
	}

	/**
	 * Returns a default heading text color if there is none set.  We use this instead of setting a default
	 * so that child themes can overwrite the default early.
	 *
	 * @since  0.1.0
	 * @access public
	 * @param  string  $hex
	 * @return string
	 */
	public function heading_text_color_default( $hex ) {
		return $hex ? $hex : '000000';
	}

	/**
	 * Returns a default body text color if there is none set.  We use this instead of setting a default
	 * so that child themes can overwrite the default early.
	 *
	 * @since  0.1.0
	 * @access public
	 * @param  string  $hex
	 * @return string
	 */
	public function body_text_color_default( $hex ) {
		return $hex ? $hex : '000000';
	}

	/**
	 * Returns a default primary color if there is none set.  We use this instead of setting a default
	 * so that child themes can overwrite the default early.
	 *
	 * @since  0.1.0
	 * @access public
	 * @param  string  $hex
	 * @return string
	 */
	public function color_primary_default( $hex ) {
		return $hex ? $hex : '526d3b';
	}

	/**
	 * Returns a default button hover color if there is none set.  We use this instead of setting a default
	 * so that child themes can overwrite the default early.
	 *
	 * @since  0.1.0
	 * @access public
	 * @param  string  $hex
	 * @return string
	 */
	public function button_hover_background_color_default( $hex ) {
		return $hex ? $hex : '597a3d';
	}

	/**
	 * Returns a default navigation background color if there is none set.  We use this instead of setting a default
	 * so that child themes can overwrite the default early.
	 *
	 * @since  0.1.0
	 * @access public
	 * @param  string  $hex
	 * @return string
	 */
	public function navigation_background_color_default( $hex ) {
		return $hex ? $hex : '898a7c';
	}

	/**
	 * Returns a default navigation text color if there is none set.  We use this instead of setting a default
	 * so that child themes can overwrite the default early.
	 *
	 * @since  0.1.0
	 * @access public
	 * @param  string  $hex
	 * @return string
	 */
	public function navigation_text_color_default( $hex ) {
		return $hex ? $hex : 'fff';
	}

	/**
	 * Returns a default navigation text color if there is none set.  We use this instead of setting a default
	 * so that child themes can overwrite the default early.
	 *
	 * @since  0.1.0
	 * @access public
	 * @param  string  $hex
	 * @return string
	 */
	public function navigation_text_color_on_hover_default( $hex ) {
		return $hex ? $hex : 'eeee22';
	}

	/**
	 * Returns a default box background color if there is none set.  We use this instead of setting a default
	 * so that child themes can overwrite the default early.
	 *
	 * @since  0.1.0
	 * @access public
	 * @param  string  $hex
	 * @return string
	 */
	public function box_background_color_default( $hex ) {
		return $hex ? $hex : 'fff';
	}

	/**
	 * Returns a default border color if there is none set.  We use this instead of setting a default
	 * so that child themes can overwrite the default early.
	 *
	 * @since  0.1.0
	 * @access public
	 * @param  string  $hex
	 * @return string
	 */
	public function border_color_default( $hex ) {
		return $hex ? $hex : 'ccc';
	}

	/**
	 * Returns a default small information color if there is none set.  We use this instead of setting a default
	 * so that child themes can overwrite the default early.
	 *
	 * @since  0.1.0
	 * @access public
	 * @param  string  $hex
	 * @return string
	 */
	public function small_information_color_default( $hex ) {
		return $hex ? $hex : '666';
	}

	/**
	 * Returns a default menu dropdown background color if there is none set.  We use this instead of setting a default
	 * so that child themes can overwrite the default early.
	 *
	 * @since  0.1.0
	 * @access public
	 * @param  string  $hex
	 * @return string
	 */
	public function menu_dropdown_background_color_default( $hex ) {
		return $hex ? $hex : 'fff';
	}

	/**
	 * Returns a default menu dropdown link color if there is none set.  We use this instead of setting a default
	 * so that child themes can overwrite the default early.
	 *
	 * @since  0.1.0
	 * @access public
	 * @param  string  $hex
	 * @return string
	 */
	public function menu_dropdown_link_color_default( $hex ) {
		return $hex ? $hex : '222';
	}

	/**
	 * Returns a default menu dropdown link color on hover if there is none set.  We use this instead of setting a default
	 * so that child themes can overwrite the default early.
	 *
	 * @since  0.1.0
	 * @access public
	 * @param  string  $hex
	 * @return string
	 */
	public function menu_dropdown_link_color_on_hover_default( $hex ) {
		return $hex ? $hex : '222';
	}

	/**
	 * Returns a default menu dropdown link background color on hover if there is none set.  We use this instead of setting a default
	 * so that child themes can overwrite the default early.
	 *
	 * @since  0.1.0
	 * @access public
	 * @param  string  $hex
	 * @return string
	 */
	public function menu_dropdown_link_background_color_on_hover_default( $hex ) {
		return $hex ? $hex : 'dadada';
	}

	/**
	 * Returns a default off-canvas sub-menu background color on hover if there is none set.  We use this instead of setting a default
	 * so that child themes can overwrite the default early.
	 *
	 * @since  0.1.0
	 * @access public
	 * @param  string  $hex
	 * @return string
	 */
	public function offcanvas_submenu_background_color_default( $hex ) {
		return $hex ? $hex : '52534b';
	}


	/**
	 * Returns a default table header background color if there is none set.  We use this instead of setting a default
	 * so that child themes can overwrite the default early.
	 *
	 * @since  0.1.0
	 * @access public
	 * @param  string  $hex
	 * @return string
	 */
	public function table_header_background_color_default( $hex ) {
		return $hex ? $hex : 'f5f5f5';
	}

	/**
	 * Returns a default table header text color if there is none set.  We use this instead of setting a default
	 * so that child themes can overwrite the default early.
	 *
	 * @since  0.1.0
	 * @access public
	 * @param  string  $hex
	 * @return string
	 */
	public function table_header_text_color_default( $hex ) {
		return $hex ? $hex : '666';
	}

	/**
	 * Returns a default table body background color if there is none set.  We use this instead of setting a default
	 * so that child themes can overwrite the default early.
	 *
	 * @since  0.1.0
	 * @access public
	 * @param  string  $hex
	 * @return string
	 */
	public function table_body_background_color_default( $hex ) {
		return $hex ? $hex : 'fff';
	}

	/**
	 * Returns a default table body text color if there is none set.  We use this instead of setting a default
	 * so that child themes can overwrite the default early.
	 *
	 * @since  0.1.0
	 * @access public
	 * @param  string  $hex
	 * @return string
	 */
	public function table_body_text_color_default( $hex ) {
		return $hex ? $hex : '666';
	}

	/**
	 * Returns a default table content background color if there is none set.  We use this instead of setting a default
	 * so that child themes can overwrite the default early.
	 *
	 * @since  0.1.0
	 * @access public
	 * @param  string  $hex
	 * @return string
	 */
	public function table_content_border_color_default( $hex ) {
		return $hex ? $hex : 'eee';
	}

	/**
	 * Callback for 'wp_head' that outputs the CSS for this feature.
	 *
	 * @since  0.1.0
	 * @access public
	 * @return void
	 */
	public function wp_head_callback() {

		$stylesheet = get_stylesheet();

		// Get the cached style.
		$style = wp_cache_get( "{$stylesheet}_custom_styles" );

		// If the style is available, output it and return.
		if ( ! empty( $style ) ) {
			echo $style;
			return;
		}

		$style = $this->get_primary_styles();

		// Put the final style output together.
		$style = "\n" . '<style type="text/css" id="custom-styles">' . trim( $style ) . '</style>' . "\n";

		// Cache the style, so we don't have to process this on each page load.
		wp_cache_set( "{$stylesheet}_custom_styles", $style );

		// Output the custom style.
		echo $style;
	}

	/**
	 * Ajax callback for outputting the primary styles for the WordPress visual editor.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function editor_styles_callback() {

		header( 'Content-type: text/css' );

		echo $this->get_primary_styles();

		die();
	}

	/**
	 * Formats the primary styles for output.
	 *
	 * @since  0.1.0
	 * @access public
	 * @return string
	 */
	public function get_primary_styles() {

		$style = '';

		// Get options from customizer
		$tbe_maximum_logo_height													= get_theme_mod( 'tbe_maximum_logo_height', '' );

		$tbe_heading_text_color														= get_theme_mod( 'tbe_heading_text_color', '' );
		$tbe_body_text_color															= get_theme_mod( 'tbe_body_text_color', '' );
		$tbe_primary_color																= get_theme_mod( 'tbe_color_primary', '' );
		$tbe_button_hover_background											= get_theme_mod( 'tbe_button_hover_background', '' );
		$tbe_box_background_color													= get_theme_mod( 'tbe_box_background_color', '' );
		$tbe_border_color																	= get_theme_mod( 'tbe_border_color', '' );
		$tbe_small_information_color											= get_theme_mod( 'tbe_small_information_color', '' );

		$tbe_navigation_background_color									= get_theme_mod( 'tbe_navigation_background_color', '' );
		$tbe_navigation_text_color												= get_theme_mod( 'tbe_navigation_text_color', '' );
		$tbe_navigation_text_color_on_hover								= get_theme_mod( 'tbe_navigation_text_color_on_hover', '' );

		$tbe_menu_dropdown_background_color								= get_theme_mod( 'tbe_menu_dropdown_background_color', '' );
		$tbe_menu_dropdown_link_color											= get_theme_mod( 'tbe_menu_dropdown_link_color', '' );
		$tbe_menu_dropdown_link_color_on_hover						= get_theme_mod( 'tbe_menu_dropdown_link_color_on_hover', '' );
		$tbe_menu_dropdown_link_background_color_on_hover = get_theme_mod( 'tbe_menu_dropdown_link_background_color_on_hover', '' );
		$tbe_offcanvas_submenu_background_color 					= get_theme_mod( 'tbe_offcanvas_submenu_background_color', '' );

		$tbe_table_header_background_color								= get_theme_mod( 'tbe_table_header_background_color' );
		$tbe_table_header_text_color											= get_theme_mod( 'tbe_table_header_text_color' );
		$tbe_table_body_background_color									= get_theme_mod( 'tbe_table_body_background_color' );
		$tbe_table_body_text_color												= get_theme_mod( 'tbe_table_body_text_color' );
		$tbe_table_content_border_color										= get_theme_mod( 'tbe_table_content_border_color' );


		//Maximum Logo height
		$style .= ".logo a img
				{ max-height:{$tbe_maximum_logo_height}px; }";

		// Body text color
		$style .= "body,
		p,
		.custom-modern .testimonial-content blockquote p,
		.wpcf7 .wpcf7-form label,
		.widget_edd_cart_widget .edd-cart-meta,
		.tabs-nav li.tabs-selected a,
		input[type='text'],
		input[type='email'],
		input[type='url'],
		input[type='tel'],
		input[type='number'],
		input[type='range'],
		input[type='date'],
		input[type='file'],
		input[type='password'],
		textarea,
		select
				{ color:#{$tbe_body_text_color}; }";

		// Heading text color
		$style .= "h2, h2 a, h3, h3 a, h4, h4 a, h5, h5 a, h6, h6 a
				{ color:#{$tbe_heading_text_color}; }";


		// Primary color as text color
 		$style .= "a,a:hover,a:focus,
		.edd-cart-added-alert,
		.single-post blockquote p,
		.required-message
				{ color: #{$tbe_primary_color}; } ";

		// Primary color as border color
		$style .= ".edd_price_options.edd_multi_mode
				{ border:1px solid #{$tbe_primary_color}; }";

		// Button background color
		$style .= "#sb-site input[type='submit'],
		.wpcf7-submit,
		#site-container .edd-submit,
		.edd-meta .categories a,
		.edd_checkout a,
		.page-navigation li a,
		.comment-nav a,
		.slick-arrow,
		.a11yAccordion-light .a11yAccordionItemHeader,
		.a11yAccordion-light .a11yAccordionHideArea.visiblea11yAccordionItem a,
		.tabs-nav li a,
		.collapsible-heading
				{ background-color: #{$tbe_primary_color}; }  ";


	  // Button hover background color
		$style .= "#sb-site input[type='submit']:hover,#sb-site input[type='submit']:focus,
		.wpcf7-submit:hover, .wpcf7-submit:focus,
		#site-container .edd-submit:hover, #site-container .edd-submit:focus,
		.edd-meta .categories a:hover,.edd-meta .categories a:focus,
		.edd_checkout a:hover, .edd_checkout a:focus,
		.page-navigation li a:hover, .page-navigation li a:focus,
		.comment-nav a:hover, .comment-nav a:focus,
		.slick-arrow:hover, .slick-arrow:focus,
		.tabs-nav li a:hover, .tabs-nav li a:focus
				{ background-color:#{$tbe_button_hover_background}; }";

		// box background color
		$style .= ".a11yAccordion-light .a11yAccordionHideArea.visiblea11yAccordionItem,
		.tabs-container .tabs-body,
		.collapsible-content,
		.widget_edd_cart_widget,
		.wpcf7 .wpcf7-type-1-container .wpcf7-type-1,
		.related-article-container,
		.tabs-nav li.tabs-selected a,
		#edd_checkout_wrap,
		#edd_login_form,
		#edd_register_form,
		#edd_profile_editor_form,
		.edd-logged-in,
		.edd-failed-transaction .article-content,
		#comments,
		.edd_price_options.edd_multi_mode,
		.format-icon,
		.single-post .the-content,
		.archive-article-content,
		.page-link-next-prev,
		.gform_confirmation_message,
		.gform_wrapper .gf-style-bb input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), textarea
				{ background-color:#{$tbe_box_background_color}; }";

		// Border color
		$style .= "img,
		#comments h3,
		.comment-author-wrap,
		.logged-in-as a:hover, .logged-in-as a:focus,
		.widget_edd_cart_widget,
		input[type='text'],
		input[type='email'],
		input[type='url'],
		input[type='tel'],
		input[type='number'],
		input[type='range'],
		input[type='date'],
		input[type='file'],
		input[type='password'],
		textarea,
		.wpcf7 .wpcf7-form input[type='text'],
		.wpcf7 .wpcf7-form input[type='email'],
		.wpcf7 .wpcf7-form input[type='url'],
		.wpcf7 .wpcf7-form input[type='tel'],
		.wpcf7 .wpcf7-form input[type='number'],
		.wpcf7 .wpcf7-form input[type='range'],
		.wpcf7 .wpcf7-form input[type='date'],
		.wpcf7 .wpcf7-form input[type='file'],
		.wpcf7 .wpcf7-form textarea,
		.wpcf7 .wpcf7-type-1-container .wpcf7-type-1,
		.wpcf7 .wpcf7-type-1-container .border-to-the-right input,
		.widget_edd_cart_widget .edd-cart-meta,
		#edd_checkout_wrap,
		#edd_login_form,
		#edd_register_form,
		#edd_profile_editor_form,
		.edd-failed-transaction .article-content,
		#edd_purchase_receipt, #edd_purchase_receipt_products, #edd_user_history,
		.edd_price_options.edd_multi_mode li,
		.edd-remove-from-cart:hover, .edd-remove-from-cart:focus,
		#main-content .tablepress,
		.dynamic-content article .read-more:hover, .dynamic-content article .read-more:focus,
		.single-post .article-header-meta .meta-author a:hover, .single-post .article-header-meta .meta-author a:focus,
		.single-post blockquote:before,
		.format-icon,
		.next-previous-articles > div:first-child,
		.archive .topic, .search .topic,
		.edd-logged-in,
		#respond,
		#edd_profile_editor_form .edd-select,
		.gform_confirmation_message,
		.gform_wrapper .gf-style-bb input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file])
				{ border-color:#{$tbe_border_color} }";

		// Small messages and information color
		$style .= ".no-comments-message, .comments-closed,
		.edd_empty_cart,
		.edd-logged-in,
		.edd-failed-transaction .article-content p,
		.dynamic-content article .archive-article-content .article-date,
		#edd_checkout_form_wrap span.edd-description,
		.edd-cart-number-of-items,
		.gform_confirmation_message
				{ color: #{$tbe_small_information_color} }";

		// Navigation background color
		$style .= "#off-canvas,
		.logo-with-menu-icon .header-content,
		.logo-with-menu,
		#footer
				{ background-color:#{$tbe_navigation_background_color}; }";


		// Navigation text color
		$style .= "#menu-primary .menu > li > a,
		#sb-site input[type='submit'],
		#off-canvas a,
		#menu-social a,
		.a11yAccordion-light .a11yAccordionItemHeader,
		.a11yAccordion-light .a11yAccordionItemHeader a,
		.a11yAccordion-light .a11yAccordionHideArea.visiblea11yAccordionItem,
		.a11yAccordion-light .a11yAccordionHideArea.visiblea11yAccordionItem a,
		.collapsible-heading-toggle:hover,.collapsible-heading-toggle:focus,
		.tabs-nav li a,
		.collapsible-heading-toggle,
		#main-header .logo a,
		.site-tagline,
		.menu-icon-and-cart a,
		.menu-and-cart a,
		#footer .menu a,
		#footer p,
		.wpcf7 .wpcf7-validation-errors,
		.wpcf7 .wpcf7-mail-sent-ng,
		#site-container .edd-submit,
		.edd_go_to_checkout,
		.edd_checkout a,
		.edd-meta .categories a,
		#fly-out-sidebar .menu a,
		.page-navigation li a,
		.comment-nav a,
		.flyout-section-title,
		.slick-arrow
				{ color:#{$tbe_navigation_text_color}; }";

		// Navigation text color on hover
		$style .= "#menu-primary .menu > li:hover > a, #menu-primary .menu > li:focus > a,
		#sb-site input[type='submit']:hover, #sb-site input[type='submit']:focus,
		#off-canvas a:hover, #off-canvas a:focus,
		#menu-social a:hover, #menu-social a:focus,
		#main-header .logo a:hover, #main-header .logo a:focus,
		.menu-icon-and-cart a:hover, .menu-icon-and-cart a:focus,
		.menu-and-cart a:hover, .menu-and-cart a:focus,
		#footer .menu a:hover, #footer .menu a:focus,
		#site-container .edd-submit:hover, #site-container .edd-submit:focus,
		.edd_go_to_checkout:hover, .edd_go_to_checkout:focus,
		.edd_checkout a:hover, .edd_checkout a:focus,
		.edd-meta .categories a:hover, .edd-meta .categories a:focus,
		#fly-out-sidebar .menu a:hover, #fly-out-sidebar .menu a:focus,
		.page-navigation li a:hover, .page-navigation li a:focus,
		.comment-nav a:hover, .comment-nav a:focus,
		.slick-arrow:hover, .slick-arrow:focus
				{ color:#{$tbe_navigation_text_color_on_hover}; }";


		// Dropdown Colors
		$style .= ".menu li ul
				{ background-color:#{$tbe_menu_dropdown_background_color}; }";

		$style .= ".menu li ul a
				{ color:#{$tbe_menu_dropdown_link_color}; }";

		$style .= ".menu li ul a:hover, .menu li ul a:focus
				{
					color:#{$tbe_menu_dropdown_link_color_on_hover};
					background-color:#{$tbe_menu_dropdown_link_background_color_on_hover};
				}";

		$style .= "#off-canvas .sub-menu
				{
					background-color:#{$tbe_offcanvas_submenu_background_color};
				}";

		// Table colors

		// Table header background color and text color
		$style .= "table thead th,
		table tfoot th,
		#main-content tfoot th,
		#main-content thead th,
		#edd_checkout_cart thead th,
		#edd_checkout_cart tfoot th,
		#edd_purchase_receipt thead th,
		#edd_purchase_receipt_products thead th,
		#edd_user_history thead th
				{
		  		background-color:#{$tbe_table_header_background_color};
		  		color:#{$tbe_table_header_text_color};
					border-color:#{$tbe_table_content_border_color};
				}";

		// Table Body background color, text color, border-color
		$style .= "table tbody td,
		#main-content tbody td,
		#edd_purchase_receipt tbody td,
		#edd_checkout_cart tbody td,
		#edd_purchase_receipt_products tbody td,
		#edd_user_history tbody td
				{
		  		background-color:#{$tbe_table_body_background_color};
		  		color:#{$tbe_table_body_text_color};
					border-color:#{$tbe_table_content_border_color};
				}";

		return str_replace( array( "\r", "\n", "\t" ), '', $style );
	}

	/**
	 * Deletes the cached style CSS that's output into the header.
	 *
	 * @since  0.1.0
	 * @access public
	 * @return void
	 */
	public function cache_delete() {
		wp_cache_delete( get_stylesheet() . '_custom_styles' );
	}

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		if ( ! self::$instance )
			self::$instance = new self;

		return self::$instance;
	}
}

Tbe_Custom_Styles::get_instance();
