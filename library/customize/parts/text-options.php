<?php
$wp_customize->add_panel( 'tbe_text_options', array(
	'priority'         => 100,
	'title'            => __( 'Site wide text', 'the-basics-of-everything' ),
	'description'      => __( 'Edit footer texts, read more text,comment texts, post pagination texts and archive pagination texts ', 'the-basics-of-everything' ),
	'order'            => 3
) );

/**
 * ----------------------------------------------------------------------------------------
 * 1.0 - Footer texts
 * ----------------------------------------------------------------------------------------
 */
$wp_customize->add_section( 'tbe_footer_texts', array(
   	'title'          => __( 'Footer texts', 'the-basics-of-everything' ),
   	'priority'       => 35,
   	'panel'			 		 => 'tbe_text_options'
) );
// Setting for footer text.
$wp_customize->add_setting(
  'tbe_copyright_text',
  array(
    'default'              => __( 'All rights reserved ', 'the-basics-of-everything' ),
    'sanitize_callback'    => 'sanitize_text_field',
    'transport'            => 'postMessage',
  )
);
// Control for footer text
$wp_customize->add_control( 'tbe_copyright_text', array(
  'type'        => 'text',
  'priority'    => 10,
  'section'     => 'tbe_footer_texts',
  'label'       => 'Copyright text',
  'description' => 'Default Text : All rights reserved',
) );

/**
 * ----------------------------------------------------------------------------------------
 * 2.0 - Archive texts
 * ----------------------------------------------------------------------------------------
 */
$wp_customize->add_section( 'tbe_archive_texts', array(
   	'title'           => __( 'Archive texts', 'the-basics-of-everything' ),
   	'priority'        => 35,
   	'panel'			      => 'tbe_text_options'
) );
// Setting for read more text.
$wp_customize->add_setting(
  'tbe_readmore_text',
  array(
    'default'              => __( 'Read More ', 'the-basics-of-everything' ),
    'sanitize_callback'    => 'sanitize_text_field',
    'transport'            => 'postMessage',
  )
);
// Control for read more text
$wp_customize->add_control( 'tbe_readmore_text', array(
  'type'        => 'text',
  'priority'    => 10,
  'section'     => 'tbe_archive_texts',
  'label'       => 'Read More',
  'description' => 'Archive article read more text',
) );

// Setting for older posts text.
$wp_customize->add_setting(
  'tbe_olderposts_text',
  array(
    'default'              => __( 'Older Posts', 'the-basics-of-everything' ),
    'sanitize_callback'    => 'sanitize_text_field',
    'transport'            => 'postMessage',
  )
);
// Control for older posts text
$wp_customize->add_control( 'tbe_olderposts_text', array(
  'type'        => 'text',
  'priority'    => 10,
  'section'     => 'tbe_archive_texts',
  'label'       => 'Older Posts',
  'description' => 'Archive page older posts pagination text',
) );

// Setting for newer posts text.
$wp_customize->add_setting(
  'tbe_newerposts_text',
  array(
    'default'              => __( 'Newer Posts', 'the-basics-of-everything' ),
    'sanitize_callback'    => 'sanitize_text_field',
    'transport'            => 'postMessage',
  )
);
// Control for newer posts text
$wp_customize->add_control( 'tbe_newerposts_text', array(
  'type'        => 'text',
  'priority'    => 10,
  'section'     => 'tbe_archive_texts',
  'label'       => 'Newer Posts',
  'description' => 'Archive page newer posts pagination text',
) );

// Setting for articles by text.
$wp_customize->add_setting(
  'tbe_articlesby_text',
  array(
    'default'              => __( 'Articles by', 'the-basics-of-everything' ),
    'sanitize_callback'    => 'sanitize_text_field',
    'transport'            => 'postMessage',
  )
);
// Control for articles by text
$wp_customize->add_control( 'tbe_articlesby_text', array(
  'type'        => 'text',
  'priority'    => 10,
  'section'     => 'tbe_archive_texts',
  'label'       => 'Articles by',
  'description' => 'Author archive heading text',
) );

// Setting for category text.
$wp_customize->add_setting(
  'tbe_category_text',
  array(
    'default'              => __( 'Topic', 'the-basics-of-everything' ),
    'sanitize_callback'    => 'sanitize_text_field',
    'transport'            => 'postMessage',
  )
);
// Control for category text
$wp_customize->add_control( 'tbe_category_text', array(
  'type'        => 'text',
  'priority'    => 10,
  'section'     => 'tbe_archive_texts',
  'label'       => 'Category text',
  'description' => 'Category archive heading text',
) );

// Setting for tag text.
$wp_customize->add_setting(
  'tbe_tag_text',
  array(
    'default'              => __( 'Topic', 'the-basics-of-everything' ),
    'sanitize_callback'    => 'sanitize_text_field',
    'transport'            => 'postMessage',
  )
);
// Control for tag text
$wp_customize->add_control( 'tbe_tag_text', array(
  'type'        => 'text',
  'priority'    => 10,
  'section'     => 'tbe_archive_texts',
  'label'       => 'Tag text',
  'description' => 'Tag archive heading text',
) );

/**
 * ----------------------------------------------------------------------------------------
 * 3.0 - Single post texts
 * ----------------------------------------------------------------------------------------
 */
$wp_customize->add_section( 'tbe_singlepost_texts', array(
   	'title'           => __( 'Single post texts', 'the-basics-of-everything' ),
   	'priority'        => 35,
   	'panel'			      => 'tbe_text_options'
) );

// Setting for page text.
$wp_customize->add_setting(
  'tbe_page_text',
  array(
    'default'              => __( 'Page text ', 'the-basics-of-everything' ),
    'sanitize_callback'    => 'sanitize_text_field',
  )
);
// Control for page text
$wp_customize->add_control( 'tbe_page_text', array(
  'type'        => 'text',
  'priority'    => 10,
  'section'     => 'tbe_singlepost_texts',
  'label'       => 'Page',
  'description' => 'Page text in "Page 1 of 3"',
) );

// Setting for read more text.
$wp_customize->add_setting(
  'tbe_nextpage_text',
  array(
    'default'              => __( 'Next Page ', 'the-basics-of-everything' ),
    'sanitize_callback'    => 'sanitize_text_field',
    //'transport'            => 'postMessage',
  )
);
// Control for read more text
$wp_customize->add_control( 'tbe_nextpage_text', array(
  'type'        => 'text',
  'priority'    => 10,
  'section'     => 'tbe_singlepost_texts',
  'label'       => 'Next Page',
  'description' => 'Single post pagination next page text',
) );

// Setting for read more text.
$wp_customize->add_setting(
  'tbe_previouspage_text',
  array(
    'default'              => __( 'Previous Page ', 'the-basics-of-everything' ),
    'sanitize_callback'    => 'sanitize_text_field',
    //'transport'            => 'postMessage',
  )
);
// Control for read more text
$wp_customize->add_control( 'tbe_previouspage_text', array(
  'type'        => 'text',
  'priority'    => 10,
  'section'     => 'tbe_singlepost_texts',
  'label'       => 'Previous Page',
  'description' => 'Single post pagination previous_image_link page text',
) );
