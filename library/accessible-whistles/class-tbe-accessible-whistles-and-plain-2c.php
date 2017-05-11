<?php
/**
 * Accessible_Whistles_And_Toggles class.  Extends the Whistles_And_Bells class to format the whistle posts into
 * a group of plain 2 columned divs.
 *
 * @package    Whistles
 * @subpackage Includes
 * @since      0.1.0
 * @author     Justin Tadlock <justin@justintadlock.com>
 * @copyright  Copyright (c) 2013, Justin Tadlock
 * @link       http://themehybrid.com/plugins/whistles
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
class Tbe_Accessible_Whistles_And_Plain_2c extends Whistles_And_Bells {

	/**
	 * Custom markup for the ouput of toggles.
	 *
	 * @since  0.1.0
	 * @access public
	 * @param  array   $whistles
	 * @return string
	 */
	public function set_markup( $whistles ) {

		/* Set up an empty string to return. */
		$output = '';

		/* If we have whistles, let's roll! */
		if ( !empty( $whistles ) ) {

			/* Open the toggle wrapper. */
			$output .= '<div class="accessible-whistles-plain two-column-whistles">';

      /* Loop through each of the whistles and format the output. */
			foreach ( $whistles as $whistle ) {

        $output .= '<div class="plain-whistle">';

				$output .= '<h3 class="whistle-title">' . $whistle['title'] . '</h3>';

				$output .= '<div class="whistle-content">' . $whistle['content'] . '</div>';

        $output .= '</div>';
			}

			/* Close the toggle wrapper. */
			$output .= '</div>';
		}

		/* Return the formatted output. */
		return $output;
	}
}

?>
