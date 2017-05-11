<?php
$wp_customize->add_section( 'tbe_branding', array(
 'title'        => __( 'Logo & Branding', 'the-basics-of-everything' ),
 'description'	 => __('Upload logo and change styling around it','the-basics-of-everything'),
'priority'     => 35,
) );

 /* Retina Logo */
 $wp_customize->add_setting( 'tbe_retina_logo', array(
  'type'                  => 'theme_mod',
  'capability'            => 'edit_theme_options',
  'sanitize_callback'     => 'tbe_sanitize_image_callback',
 ) );
 $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'tbe_retina_logo', array(
  'label' 		   => __('Logo Retina Version','the-basics-of-everything'),
  'section' 		 => 'tbe_branding',
  'settings'     => 'tbe_retina_logo',
 ) ) );

 // Setting for footer text.
 $wp_customize->add_setting(
   'tbe_maximum_logo_height', array(
     'default'              => apply_filters( 'theme_mod_maximum_logo_height', '' ),
     'sanitize_callback'    => 'tbe_sanitize_number_absint',
     'transport'            => 'postMessage',
 ) );
 // Control for footer text
 $wp_customize->add_control( 'tbe_maximum_logo_height', array(
   'type'        => 'number',
   'section'     => 'tbe_branding',
   'label'       => 'Maximum Logo Height',
   'description' => 'Enter height in "px"',
 ) );
?>
