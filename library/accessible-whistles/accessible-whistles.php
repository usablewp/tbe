<?php
/**
 * File for working with Justin Tadlock's "Whistles" plugin filters, actions and classes
 *
 * @package Accessible Whistles
 * @since 0.1.0
 * @author Naresh Devineni <nareshdevineni@usablewp.com>
 * @copyright  Copyright (c) 2017, Naresh Devineni
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

// Include necessary classes
get_template_part( "library/accessible-whistles/class-tbe-accessible-whistles-and-accordions" );
get_template_part( "library/accessible-whistles/class-tbe-accessible-whistles-and-tabs" );
get_template_part( "library/accessible-whistles/class-tbe-accessible-whistles-and-toggles" );
get_template_part( "library/accessible-whistles/class-tbe-accessible-whistles-and-plain" );
get_template_part( "library/accessible-whistles/class-tbe-accessible-whistles-and-plain-2c" );

add_filter( 'whistles_object', 'tbe_accessible_whistles_setup', 10, 2 );
add_filter( 'whistles_allowed_types', 'tbe_accessible_whistles_allowed_types', 10, 1 );


/**
 * Adds "Plain" type to the "$allowed_types" array to display plain whistles with out any
 * interative functionality such as tabs.
 *
 * @since  0.1.0
 * @access public
 * @return array
 */
function tbe_accessible_whistles_allowed_types( $allowed_types ) {
    $allowed_types['plain'] = __( 'Plain', 'the-basics-of-everything' );
    $allowed_types['plain-2c'] = __( 'Plain - Two Columns', 'the-basics-of-everything' );
    return $allowed_types;
}

 /**
  * Overwrites "whistles_object" of "Whistles plugin" to add custom markup so that markup
  * is in format that custom script is expecting it to be
  *
  * @since  0.1.0
  * @access public
  * @return object
  */
function tbe_accessible_whistles_setup( $null, $args ) {

  $type = $args['type'];

  /* Accordion. */
	if ( 'accordion' === $type )
		$whistles_object = new Tbe_Accessible_Whistles_And_Accordions( $args );

	/* Toggle. */
	elseif ( 'toggle' === $type )
		$whistles_object = new Tbe_Accessible_Whistles_And_Toggles( $args );

	/* Tabs. */
	elseif ( 'tabs' === $type )
		$whistles_object = new Tbe_Accessible_Whistles_And_Tabs( $args );

  /* Plain - two columns */
  elseif ( 'plain-2c' === $type )
    $whistles_object = new Tbe_Accessible_Whistles_And_Plain_2c ( $args );

  /* Plain */
  else
    $whistles_object = new Tbe_Accessible_Whistles_And_Plain ( $args );

  return $whistles_object;

}


?>
