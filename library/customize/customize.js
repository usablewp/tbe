/**
 * Handles the customizer live preview settings.
 */

( function( $ ){
	/**
	 * Shows a live preview of changing the site title.
	 */
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {

			$( '#main-logo a' ).html( to );

		} ); // value.bind
	} ); // wp.customize

	/*
	 * Shows a live preview of changing the site description.
	 */
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {

			$( '.site-tagline' ).html( to );

		} ); // value.bind
	} ); // wp.customize

	// Maximum Logo Height.
	wp.customize( 'tbe_maximum_logo_height', function( value ) {
		value.bind( function( to ) {
			$( '.logo a img' )
			.css( 'max-height', to + 'px' );

		} ); // value.bind
	} ); // wp.customize

	// Body text color.
	wp.customize( 'tbe_body_text_color', function( value ) {
		value.bind( function( to ) {

			$( 'body, p, .custom-modern .testimonial-content blockquote p, .wpcf7 .wpcf7-form label, .widget_edd_cart_widget .edd-cart-meta, .tabs-nav li.tabs-selected a, input[type="text"], input[type="email"], input[type="url"], input[type="tel"], input[type="number"], input[type="range"], input[type="date"], input[type="file"], input[type="password"], textarea, select' )
			.not( '.copyright p' )
			.css( 'color', to );

		} ); // value.bind
	} ); // wp.customize

	// Heading text color.
	wp.customize( 'tbe_heading_text_color', function( value ) {
		value.bind( function( to ) {

			$( 'h2, h2 a, h3, h3 a, h4, h4 a, h5, h5 a, h6, h6 a' )
			.not( '.site-tagline, .whistle-title, .whistle-title a' )
			.css( 'color', to );

		} ); // value.bind
	} ); // wp.customize

	// Primary color of the theme.
	wp.customize( 'tbe_color_primary', function( value ) {
		value.bind( function( to ) {

			// Primary color as text color
			$( 'a,a:hover,a:focus, .edd-cart-added-alert, .single-post blockquote p, .required-message' )
			.not( '#main-header a, #site-container .edd-submit, .wpmslider-controls-direction a, #off-canvas nav a,.sb-close, .edd_checkout a,.widget.whistles a, .archive-article-content .article-title a, .page-navigation a,.footer-links a,.more-articles a, .comment-nav a' )
			.css( 'color', to );

			// Primary color as background color
			$( '#sb-site input[type="submit"], .wpcf7-submit, #site-container .edd-submit, .edd-meta .categories a, .edd_checkout a, .page-navigation li a, .comment-nav a, .slick-arrow, .a11yAccordion-light .a11yAccordionItemHeader, .a11yAccordion-light .a11yAccordionHideArea.visiblea11yAccordionItem a, .tabs-nav li a, .collapsible-heading' )
			.not( '.tabs-selected a' )
			.css( 'background-color', to );

			// Primary color as border-color
			$( '.edd_price_options.edd_multi_mode' ).css( 'border-color', to );
		} ); // value.bind
	} ); // wp.customize


	// Box background color.
	wp.customize( 'tbe_box_background_color', function( value ) {
		value.bind( function( to ) {

			$( '.a11yAccordion-light .a11yAccordionHideArea.visiblea11yAccordionItem, .tabs-container .tabs-body, .collapsible-content, .widget_edd_cart_widget, .wpcf7 .wpcf7-type-1-container .wpcf7-type-1, .related-article-container, .tabs-nav li.tabs-selected a, #edd_checkout_wrap, #edd_login_form, #edd_register_form, #edd_profile_editor_form, .edd-logged-in, .edd-failed-transaction .article-content, #comments, .edd_price_options.edd_multi_mode, .format-icon, .single-post .the-content, .archive-article-content, .page-link-next-prev, .gform_confirmation_message, .gform_wrapper .gf-style-bb input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), textarea' )
			.css( 'background-color', to );

		} ); // value.bind
	} ); // wp.customize

	// Small messages and information color
	wp.customize( 'tbe_small_information_color', function( value ) {
		value.bind( function( to ) {

			$( '.no-comments-message, .comments-closed, .edd_empty_cart, .edd-logged-in, .edd-failed-transaction .article-content p, .dynamic-content article .archive-article-content .article-date, #edd_checkout_form_wrap span.edd-description, .edd-cart-number-of-items, .gform_confirmation_message' )
			.css( 'color', to );

		} ); // value.bind
	} ); // wp.customize

	// Navigation background color.
	wp.customize( 'tbe_navigation_background_color', function( value ) {
		value.bind( function( to ) {

			$( '#off-canvas, .logo-with-menu-icon .header-content, .logo-with-menu, #footer' )
			.css( 'background-color', to );

		} ); // value.bind
	} ); // wp.customize

	// Navigation text color.
	wp.customize( 'tbe_navigation_text_color', function( value ) {
		value.bind( function( to ) {

			$( '#menu-primary .menu > li > a, #sb-site input[type="submit"], #off-canvas a, #menu-social a, .a11yAccordion-light .a11yAccordionItemHeader, .a11yAccordion-light .a11yAccordionItemHeader a, .a11yAccordion-light .a11yAccordionHideArea.visiblea11yAccordionItem, .a11yAccordion-light .a11yAccordionHideArea.visiblea11yAccordionItem a, .collapsible-heading-toggle:hover,.collapsible-heading-toggle:focus, .tabs-nav li a, .collapsible-heading-toggle, #main-header .logo a, .site-tagline, .menu-icon-and-cart a, .menu-and-cart a, #footer .menu a, #footer p, .wpcf7 .wpcf7-validation-errors, .wpcf7 .wpcf7-mail-sent-ng, #site-container .edd-submit, .edd_go_to_checkout, .edd_checkout a, .edd-meta .categories a, #fly-out-sidebar .menu a, .page-navigation li a, .comment-nav a, .flyout-section-title, .slick-arrow' )
			.not( '.tabs-selected a' )
			.css( 'color', to );

		} ); // value.bind
	} ); // wp.customize

	// Table header background color
	wp.customize( 'tbe_table_header_background_color', function( value ) {
		value.bind( function( to ) {

			$( 'table thead th, table tfoot th, #main-content tfoot th, #main-content thead th, #edd_checkout_cart thead th, #edd_checkout_cart tfoot th, #edd_purchase_receipt thead th, #edd_purchase_receipt_products thead th, #edd_user_history thead th' )
			.css( 'background-color', to );

		} ); // value.bind
	} ); // wp.customize

	// Menu dropdown colors

	// Menu dropdown background color
	wp.customize( 'tbe_menu_dropdown_background_color', function( value ) {
		value.bind( function( to ) {

			$( '.menu li ul' )
			.css( 'background-color', to );

		} ); // value.bind
	} ); // wp.customize

	// Menu dropdown link color
	wp.customize( 'tbe_menu_dropdown_link_color', function( value ) {
		value.bind( function( to ) {

			$( '.menu li ul a' )
			.css( 'color', to );

		} ); // value.bind
	} ); // wp.customize

	// off-canvas sub-menu background color
	wp.customize( 'tbe_offcanvas_submenu_background_color', function( value ) {
		value.bind( function( to ) {

			$( '#off-canvas .sub-menu' )
			.css( 'background-color', to );

		} ); // value.bind
	} ); // wp.customize

	// Table header text color
	wp.customize( 'tbe_table_header_text_color', function( value ) {
		value.bind( function( to ) {

			$( 'table thead th, table tfoot th, #main-content tfoot th, #main-content thead th, #edd_checkout_cart thead th, #edd_checkout_cart tfoot th, #edd_purchase_receipt thead th, #edd_purchase_receipt_products thead th, #edd_user_history thead th' )
			.css( 'color', to );

		} ); // value.bind
	} ); // wp.customize


	// Table body background color
	wp.customize( 'tbe_table_body_background_color', function( value ) {
		value.bind( function( to ) {

			$( 'table tbody td, #main-content tbody td, #edd_purchase_receipt tbody td, #edd_checkout_cart tbody td, #edd_purchase_receipt_products tbody td, #edd_user_history tbody td' )
			.css( 'background-color', to );

		} ); // value.bind
	} ); // wp.customize

	// Table body text color
	wp.customize( 'tbe_table_body_text_color', function( value ) {
		value.bind( function( to ) {

			$( 'table tbody td, #main-content tbody td, #edd_purchase_receipt tbody td, #edd_checkout_cart tbody td, #edd_purchase_receipt_products tbody td, #edd_user_history tbody td' )
			.css( 'color', to );

		} ); // value.bind
	} ); // wp.customize

	// Table border color
	wp.customize( 'tbe_table_content_border_color', function( value ) {
		value.bind( function( to ) {

			$( 'table thead th, table tfoot th, #main-content tfoot th, #main-content thead th, #edd_checkout_cart thead th, #edd_checkout_cart tfoot th, #edd_purchase_receipt thead th, #edd_purchase_receipt_products thead th, #edd_user_history thead th' )
			.css( 'border-color', to );

			$( 'table tbody td, #main-content tbody td, #edd_purchase_receipt tbody td, #edd_checkout_cart tbody td, #edd_purchase_receipt_products tbody td, #edd_user_history tbody td' )
			.css( 'border-color', to );

		} ); // value.bind
	} ); // wp.customize


	// Toggle Tagline Display.
	wp.customize( 'tbe_display_tagline', function( value ) {
		value.bind( function( to ) {

			if( ! to ){
				$( '.site-tagline' ).hide();
			} else{
				$( '.site-tagline' ).show();
			}

		} ); // value.bind
	} ); // wp.customize

} ( jQuery ) );
