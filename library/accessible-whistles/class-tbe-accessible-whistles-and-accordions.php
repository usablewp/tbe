<?php
/**
 * Whistles_And_Accordions class.  Extends the Whistles_And_Bells class to format the whistle posts into
 * a group of accordions.
 *
 * @package    Whistles
 * @subpackage Includes
 * @since      0.1.0
 * @author     Justin Tadlock <justin@justintadlock.com>
 * @copyright  Copyright (c) 2013, Justin Tadlock
 * @link       http://themehybrid.com/plugins/whistles
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
class Tbe_Accessible_Whistles_And_Accordions extends Whistles_And_Bells {

	/**
	 * Custom markup for the ouput of accordions.
	 *
	 * @since  0.1.0
	 * @access public
	 * @param  array   $whistles
	 * @return string
	 */
	public function set_markup( $whistles ) {

		wp_enqueue_script( 'a11y-accordion' );
		/* Set up an empty string to return. */
		$output = '';

		/* If we have whistles, let's roll! */
		if ( !empty( $whistles ) ) {

			/* Open the accordion wrapper. */
			$output .= '<ul class="a11yAccordion naive-accordion a11yAccordion-light">';

			/* Loop through each of the whistles and format the output. */
			foreach ( $whistles as $whistle ) {

				$output .= '<li class="a11yAccordionItem"><div class="a11yAccordionItemHeader">' . $whistle['title'] . '</div>';

				$output .= '<div class="a11yAccordionHideArea">' . $whistle['content'] . '</div></li>';
			}

			/* Close the accordion wrapper. */
			$output .= '</ul>';
		}

		/* Return the formatted output. */
		return $output;
	}
}

?>
