<?php
/**
 * ----------------------------------------------------------------------------------------
 * Custom colors panel
 * ----------------------------------------------------------------------------------------
 */
$wp_customize->add_panel( 'tbe_custom_colors', array(
	'priority'         => 10,
	'title'            => __( 'Colors', 'the-basics-of-everything' ),
	'order'            => 2
) );

/**
 * ----------------------------------------------------------------------------------------
 * Sections
 * ----------------------------------------------------------------------------------------
 */

// General colors
$wp_customize->add_section( 'tbe_general_colors', array(
   	'title'          => __( 'General Colors', 'the-basics-of-everything' ),
   	'priority'       => 36,
    'panel'          => 'tbe_custom_colors'
) );

// Navigation colors section
$wp_customize->add_section( 'tbe_navigation_colors', array(
   	'title'          => __( 'Navigation Colors', 'the-basics-of-everything' ),
   	'priority'       => 36,
    'panel'          => 'tbe_custom_colors'
) );

// Menu dropdown colors section
$wp_customize->add_section( 'tbe_menu_dropdown_colors', array(
   	'title'          => __( 'Menu Dropdown Colors', 'the-basics-of-everything' ),
   	'priority'       => 36,
    'panel'          => 'tbe_custom_colors'
) );

// Table colors section
$wp_customize->add_section( 'tbe_table_colors', array(
   	'title'          => __( 'Table Colors', 'the-basics-of-everything' ),
   	'priority'       => 36,
    'panel'          => 'tbe_custom_colors'
) );

/**
 * ----------------------------------------------------------------------------------------
 * Settings & Controls - General colors
 * ----------------------------------------------------------------------------------------
 */

// Setting for heading text color.
$wp_customize->add_setting(
  'tbe_heading_text_color',
  array(
    'default'              => apply_filters( 'theme_mod_heading_text_color', '' ),
    'sanitize_callback'    => 'sanitize_hex_color_no_hash',
    'sanitize_js_callback' => 'maybe_hash_hex_color',
    'transport'            => 'postMessage',
  )
);
// Control for heading text color.
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'tbe_heading_text_color',
    array(
      'label'    		=> esc_html__( 'Heading text color', 'the-basics-of-everything' ),
      'description'	=> esc_html__( 'h2,h3,h4,h5,h6 and links inside them', 'the-basics-of-everything' ),
      'section'  		=> 'tbe_general_colors',
      'settings' 		=> 'tbe_heading_text_color',
      'priority' 		=> 10,
    )
  )
);

// Setting for body text color.
$wp_customize->add_setting(
  'tbe_body_text_color',
  array(
    'default'              => apply_filters( 'theme_mod_body_text_color', '' ),
    'sanitize_callback'    => 'sanitize_hex_color_no_hash',
    'sanitize_js_callback' => 'maybe_hash_hex_color',
    'transport'            => 'postMessage',
  )
);
// Control for body text color.
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'tbe_body_text_color',
    array(
      'label'    		=> esc_html__( 'Body text color', 'the-basics-of-everything' ),
      'description'	=> esc_html__( 'Applied as color to p, label, input elements, whistles content and other text elements', 'the-basics-of-everything' ),
      'section'  		=> 'tbe_general_colors',
      'settings' 		=> 'tbe_body_text_color',
      'priority' 		=> 10,
    )
  )
);

// Add a new setting for primary color.
$wp_customize->add_setting(
  'tbe_color_primary',
  array(
    'default'              => apply_filters( 'theme_mod_color_primary', '' ),
    'sanitize_callback'    => 'sanitize_hex_color_no_hash',
    'sanitize_js_callback' => 'maybe_hash_hex_color',
    'transport'            => 'postMessage',
  )
);
// Add a control for primary color.
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'tbe_color_primary',
    array(
      'label'    		=> esc_html__( 'Primary Color', 'the-basics-of-everything' ),
      'description'	=> esc_html__( 'Applied to general links, button background', 'the-basics-of-everything' ),
      'section'  		=> 'tbe_general_colors',
      'settings' 		=> 'tbe_color_primary',
      'priority' 		=> 10,
    )
  )
);

// Setting for Button hover background.
$wp_customize->add_setting(
  'tbe_button_hover_background',
  array(
    'default'              => apply_filters( 'theme_mod_button_hover_color', '' ),
    'sanitize_callback'    => 'sanitize_hex_color_no_hash',
    'sanitize_js_callback' => 'maybe_hash_hex_color',
  )
);
// Control for Button hover background.
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'tbe_button_hover_background',
    array(
      'label'    		=> esc_html__( 'Button Hover Background Color', 'the-basics-of-everything' ),
      'description'	=> esc_html__( 'Background color of a button when we hover on it', 'the-basics-of-everything' ),
      'section'  		=> 'tbe_general_colors',
      'settings' 		=> 'tbe_button_hover_background',
      'priority' 		=> 10,
    )
  )
);

// Setting for box background color.
$wp_customize->add_setting(
  'tbe_box_background_color',
  array(
    'default'              => apply_filters( 'theme_mod_box_background_color', '' ),
    'sanitize_callback'    => 'sanitize_hex_color_no_hash',
    'sanitize_js_callback' => 'maybe_hash_hex_color',
    'transport'            => 'postMessage',
  )
);
// Control for box background color.
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'tbe_box_background_color',
    array(
      'label'    		=> esc_html__( 'Background color of various boxes', 'the-basics-of-everything' ),
      'description'	=> esc_html__( 'Applied as background color to whistle content, some widgets and single post content', 'the-basics-of-everything' ),
      'section'  		=> 'tbe_general_colors',
      'settings' 		=> 'tbe_box_background_color',
      'priority' 		=> 10,
    )
  )
);

// Setting for navigation text color.
$wp_customize->add_setting(
  'tbe_border_color',
  array(
    'default'              => apply_filters( 'theme_mod_border_color', '' ),
    'sanitize_callback'    => 'sanitize_hex_color_no_hash',
    'sanitize_js_callback' => 'maybe_hash_hex_color',
  )
);
// Control for navigation background color.
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'tbe_border_color',
    array(
      'label'    		=> esc_html__( 'Border color for site elements', 'the-basics-of-everything' ),
      'description'	=> esc_html__( 'Applied as border color to site elements that have a border color', 'the-basics-of-everything' ),
      'section'  		=> 'tbe_general_colors',
      'settings' 		=> 'tbe_border_color',
      'priority' 		=> 10,
    )
  )
);

// Setting for navigation text color.
$wp_customize->add_setting(
  'tbe_small_information_color',
  array(
    'default'              => apply_filters( 'theme_mod_small_information_color', '' ),
    'sanitize_callback'    => 'sanitize_hex_color_no_hash',
    'sanitize_js_callback' => 'maybe_hash_hex_color',
    'transport'            => 'postMessage',
  )
);
// Control for navigation background color.
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'tbe_small_information_color',
    array(
      'label'    		=> esc_html__( 'Small information color', 'the-basics-of-everything' ),
      'description'	=> esc_html__( 'Applied as color to checkout fields description, empty cart message and so on', 'the-basics-of-everything' ),
      'section'  		=> 'tbe_general_colors',
      'settings' 		=> 'tbe_small_information_color',
      'priority' 		=> 10,
    )
  )
);

/**
 * ----------------------------------------------------------------------------------------
 * Settings & Controls - Navigation colors
 * ----------------------------------------------------------------------------------------
 */

// Setting for navigation background color.
$wp_customize->add_setting(
  'tbe_navigation_background_color',
  array(
    'default'              => apply_filters( 'theme_mod_navigation_background_color', '' ),
    'sanitize_callback'    => 'sanitize_hex_color_no_hash',
    'sanitize_js_callback' => 'maybe_hash_hex_color',
    'transport'            => 'postMessage',
  )
);
// Control for navigation background color.
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'tbe_navigation_background_color',
    array(
      'label'    		=> esc_html__( 'Navigation Background Color', 'the-basics-of-everything' ),
      'description'	=> esc_html__( 'Applied as background color to main header, off canvas menu and footer', 'the-basics-of-everything' ),
      'section'  		=> 'tbe_navigation_colors',
      'settings' 		=> 'tbe_navigation_background_color',
      'priority' 		=> 10,
    )
  )
);

// Setting for navigation text color.
$wp_customize->add_setting(
  'tbe_navigation_text_color',
  array(
    'default'              => apply_filters( 'theme_mod_navigation_text_color', '' ),
    'sanitize_callback'    => 'sanitize_hex_color_no_hash',
    'sanitize_js_callback' => 'maybe_hash_hex_color',
    'transport'            => 'postMessage',
  )
);
// Control for navigation background color.
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'tbe_navigation_text_color',
    array(
      'label'    		=> esc_html__( 'Navigation Text Color', 'the-basics-of-everything' ),
      'description'	=> esc_html__( 'Applied as text color to main header, off canvas menu, whistles and footer', 'the-basics-of-everything' ),
      'section'  		=> 'tbe_navigation_colors',
      'settings' 		=> 'tbe_navigation_text_color',
      'priority' 		=> 10,
    )
  )
);

// Setting for navigation background color.
$wp_customize->add_setting(
  'tbe_navigation_text_color_on_hover',
  array(
    'default'              => apply_filters( 'theme_mod_navigation_text_color_on_hover', '' ),
    'sanitize_callback'    => 'sanitize_hex_color_no_hash',
    'sanitize_js_callback' => 'maybe_hash_hex_color',
  )
);
// Control for navigation background color.
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'tbe_navigation_text_color_on_hover',
    array(
      'label'    		=> esc_html__( 'Navigation Text Color on hover', 'the-basics-of-everything' ),
      'description'	=> esc_html__( 'Applied as text color to menus, buttons on hover', 'the-basics-of-everything' ),
      'section'  		=> 'tbe_navigation_colors',
      'settings' 		=> 'tbe_navigation_text_color_on_hover',
      'priority' 		=> 10,
    )
  )
);

/**
 * ----------------------------------------------------------------------------------------
 * Settings & Controls - Menu dropdown colors
 * ----------------------------------------------------------------------------------------
 */

 // Setting for primary menu dropdown background color.
 $wp_customize->add_setting(
   'tbe_menu_dropdown_background_color',
   array(
     'default'              => apply_filters( 'theme_mod_menu_dropdown_background_color', '' ),
     'sanitize_callback'    => 'sanitize_hex_color_no_hash',
     'sanitize_js_callback' => 'maybe_hash_hex_color',
     'transport'            => 'postMessage',
   )
 );
 // Control for primary menu dropdown background color.
 $wp_customize->add_control(
   new WP_Customize_Color_Control(
     $wp_customize,
     'tbe_menu_dropdown_background_color',
     array(
       'label'    		=> esc_html__( 'Header Menu Dropdown Background Color', 'the-basics-of-everything' ),
       'description'	=> esc_html__( 'Applied to primary menu dropdown', 'the-basics-of-everything' ),
       'section'  		=> 'tbe_menu_dropdown_colors',
       'settings' 		=> 'tbe_menu_dropdown_background_color',
       'priority' 		=> 10,
     )
   )
 );

 // Setting for primary menu dropdown link color.
 $wp_customize->add_setting(
   'tbe_menu_dropdown_link_color',
   array(
     'default'              => apply_filters( 'theme_mod_menu_dropdown_link_color', '' ),
     'sanitize_callback'    => 'sanitize_hex_color_no_hash',
     'sanitize_js_callback' => 'maybe_hash_hex_color',
     'transport'            => 'postMessage',
   )
 );
 // Control for primary menu dropdown link color.
 $wp_customize->add_control(
   new WP_Customize_Color_Control(
     $wp_customize,
     'tbe_menu_dropdown_link_color',
     array(
       'label'    		=> esc_html__( 'Header Menu Dropdown Link Color', 'the-basics-of-everything' ),
       'description'	=> esc_html__( 'Applied to links inside dropdown', 'the-basics-of-everything' ),
       'section'  		=> 'tbe_menu_dropdown_colors',
       'settings' 		=> 'tbe_menu_dropdown_link_color',
       'priority' 		=> 10,
     )
   )
 );

 // Setting for primary menu dropdown link color on hover.
 $wp_customize->add_setting(
   'tbe_menu_dropdown_link_color_on_hover',
   array(
     'default'              => apply_filters( 'theme_mod_menu_dropdown_link_color_on_hover', '' ),
     'sanitize_callback'    => 'sanitize_hex_color_no_hash',
     'sanitize_js_callback' => 'maybe_hash_hex_color',
   )
 );
 // Control for primary menu dropdown link color on hover.
 $wp_customize->add_control(
   new WP_Customize_Color_Control(
     $wp_customize,
     'tbe_menu_dropdown_link_color_on_hover',
     array(
       'label'    		=> esc_html__( 'Header Menu Dropdown Link Hover Color', 'the-basics-of-everything' ),
       'description'	=> esc_html__( 'Applied to links inside dropdown', 'the-basics-of-everything' ),
       'section'  		=> 'tbe_menu_dropdown_colors',
       'settings' 		=> 'tbe_menu_dropdown_link_color_on_hover',
       'priority' 		=> 10,
     )
   )
 );

 // Setting for primary menu dropdown link background color on hover.
 $wp_customize->add_setting(
   'tbe_menu_dropdown_link_background_color_on_hover',
   array(
     'default'              => apply_filters( 'theme_mod_menu_dropdown_link_background_color_on_hover', '' ),
     'sanitize_callback'    => 'sanitize_hex_color_no_hash',
     'sanitize_js_callback' => 'maybe_hash_hex_color',
   )
 );
 // Control for primary menu dropdown link background color on hover.
 $wp_customize->add_control(
   new WP_Customize_Color_Control(
     $wp_customize,
     'tbe_menu_dropdown_link_background_color_on_hover',
     array(
       'label'    		=> esc_html__( 'Header Menu Dropdown Link Hover Background Color', 'the-basics-of-everything' ),
       'description'	=> esc_html__( 'Applied to links inside dropdown', 'the-basics-of-everything' ),
       'section'  		=> 'tbe_menu_dropdown_colors',
       'settings' 		=> 'tbe_menu_dropdown_link_background_color_on_hover',
       'priority' 		=> 10,
     )
   )
 );

 // Setting for off-canvas sub-menu background color.
 $wp_customize->add_setting(
   'tbe_offcanvas_submenu_background_color',
   array(
     'default'              => apply_filters( 'theme_mod_offcanvas_submenu_background_color', '' ),
     'sanitize_callback'    => 'sanitize_hex_color_no_hash',
     'sanitize_js_callback' => 'maybe_hash_hex_color',
     'transport'            => 'postMessage',
   )
 );
 // Control for off-canvas sub-menu background color.
 $wp_customize->add_control(
   new WP_Customize_Color_Control(
     $wp_customize,
     'tbe_offcanvas_submenu_background_color',
     array(
       'label'    		=> esc_html__( 'Off-Canvas Submenu Background Color', 'the-basics-of-everything' ),
       'description'	=> esc_html__( 'Applied as background color to links inside off-canvas sub-menu', 'the-basics-of-everything' ),
       'section'  		=> 'tbe_menu_dropdown_colors',
       'settings' 		=> 'tbe_offcanvas_submenu_background_color',
       'priority' 		=> 10,
     )
   )
 );

/**
 * ----------------------------------------------------------------------------------------
 * Settings & Controls - Table colors
 * ----------------------------------------------------------------------------------------
 */
// Setting for table header background color.
$wp_customize->add_setting(
  'tbe_table_header_background_color',
  array(
    'default'              => apply_filters( 'theme_mod_table_header_background_color', '' ),
    'sanitize_callback'    => 'sanitize_hex_color_no_hash',
    'sanitize_js_callback' => 'maybe_hash_hex_color',
    'transport'            => 'postMessage',
  )
);
// Control for table header background color.
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'tbe_table_header_background_color',
    array(
      'label'    		=> esc_html__( 'Table header background color', 'the-basics-of-everything' ),
      'description'	=> esc_html__( 'Applied as background color to table header', 'the-basics-of-everything' ),
      'section'  		=> 'tbe_table_colors',
      'settings' 		=> 'tbe_table_header_background_color',
      'priority' 		=> 10,
    )
  )
);

// Setting for table header text color.
$wp_customize->add_setting(
  'tbe_table_header_text_color',
  array(
    'default'              => apply_filters( 'theme_mod_table_header_text_color', '' ),
    'sanitize_callback'    => 'sanitize_hex_color_no_hash',
    'sanitize_js_callback' => 'maybe_hash_hex_color',
    'transport'            => 'postMessage',
  )
);
// Control for table header text color.
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'tbe_table_header_text_color',
    array(
      'label'    		=> esc_html__( 'Table header text color', 'the-basics-of-everything' ),
      'description'	=> esc_html__( 'Applied as text color to table header', 'the-basics-of-everything' ),
      'section'  		=> 'tbe_table_colors',
      'settings' 		=> 'tbe_table_header_text_color',
      'priority' 		=> 10,
    )
  )
);

// Setting for table body background color.
$wp_customize->add_setting(
  'tbe_table_body_background_color',
  array(
    'default'              => apply_filters( 'theme_mod_table_body_background_color', '' ),
    'sanitize_callback'    => 'sanitize_hex_color_no_hash',
    'sanitize_js_callback' => 'maybe_hash_hex_color',
    'transport'            => 'postMessage',
  )
);
// Control for table body background color.
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'tbe_table_body_background_color',
    array(
      'label'    		=> esc_html__( 'Table body background color', 'the-basics-of-everything' ),
      'description'	=> esc_html__( 'Applied as background color to table body', 'the-basics-of-everything' ),
      'section'  		=> 'tbe_table_colors',
      'settings' 		=> 'tbe_table_body_background_color',
      'priority' 		=> 10,
    )
  )
);

// Setting for table body text color.
$wp_customize->add_setting(
  'tbe_table_body_text_color',
  array(
    'default'              => apply_filters( 'theme_mod_table_body_text_color', '' ),
    'sanitize_callback'    => 'sanitize_hex_color_no_hash',
    'sanitize_js_callback' => 'maybe_hash_hex_color',
    'transport'            => 'postMessage',
  )
);
// Control for table body background color.
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'tbe_table_body_text_color',
    array(
      'label'    		=> esc_html__( 'Table body text color', 'the-basics-of-everything' ),
      'description'	=> esc_html__( 'Applied as text color to table body', 'the-basics-of-everything' ),
      'section'  		=> 'tbe_table_colors',
      'settings' 		=> 'tbe_table_body_text_color',
      'priority' 		=> 10,
    )
  )
);

// Setting for table content border color.
$wp_customize->add_setting(
  'tbe_table_content_border_color',
  array(
    'default'              => apply_filters( 'theme_mod_table_content_border_color', '' ),
    'sanitize_callback'    => 'sanitize_hex_color_no_hash',
    'sanitize_js_callback' => 'maybe_hash_hex_color',
    'transport'            => 'postMessage',
  )
);
// Control for table content border color.
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'tbe_table_content_border_color',
    array(
      'label'    		=> esc_html__( 'Table content border color', 'the-basics-of-everything' ),
      'description'	=> esc_html__( 'Applied as color to table content border', 'the-basics-of-everything' ),
      'section'  		=> 'tbe_table_colors',
      'settings' 		=> 'tbe_table_content_border_color',
      'priority' 		=> 10,
    )
  )
);
?>
