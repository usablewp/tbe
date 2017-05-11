<?php
/**
 * ----------------------------------------------------------------------------------------
 * 1.0 - Main header Section
 * ----------------------------------------------------------------------------------------
 */
$wp_customize->add_section( 'tbe_header', array(
   	'title'          => __( 'Header Options', 'the-basics-of-everything' ),
   	'priority'       => 36,
) );

/* Display Tagline */
$wp_customize->add_setting( 'tbe_display_tagline', array(
  'default'			      => true,
  'sanitize_callback'	=> 'tbe_sanitize_checkbox',
  'transport'			    => 'postMessage'
) );
$wp_customize->add_control( 'tbe_display_tagline', array(
  'label' 			      => __('Display Tagline','the-basics-of-everything'),
  'section' 			    => 'tbe_header',
  'type'              => 'checkbox',
) );

/* Header Type */
$wp_customize->add_setting( 'tbe_header_type', array(
  'default'			      => 'logo-with-menu-icon',
  'sanitize_callback'	=> 'tbe_sanitize_select',
) );
$wp_customize->add_control( 'tbe_header_type', array(
  'label' 			      => __('Header Type','the-basics-of-everything'),
  'section' 			    => 'tbe_header',
  'type' 				      => 'select',
  'choices' => array(
    'logo-with-menu-icon' => 'Logo with menu icon',
    'logo-with-menu'     	  => 'logo with menu',
	),
) );
