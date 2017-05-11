<?php
/**
 * Accessible_Whistles_And_Tabs class.  Extends the Whistles_And_Bells class to format the whistle posts into
 * a group of tabs.
 *
 * @package    Whistles
 * @subpackage Includes
 * @since      0.1.0
 * @author     Justin Tadlock <justin@justintadlock.com>
 * @copyright  Copyright (c) 2013, Justin Tadlock
 * @link       http://themehybrid.com/plugins/whistles
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
class Tbe_Accessible_Whistles_And_Tabs extends Whistles_And_Bells {

	/**
	 * Custom markup for the ouput of tabs.
	 *
	 * @since  0.1.0
	 * @access public
	 * @param  array   $whistles
	 * @return string
	 */
	public function set_markup( $whistles ) {

		wp_enqueue_script( 'accessible-tabs' );

		/* Set up an empty string to return. */
		$output = '';

		/* If we have whistles, let's roll! */
		if ( !empty( $whistles ) ) {

			/* Generate random ID. */
			$rand = mt_rand();

			/* Open tabs wrapper. */
			$output .= '<div class="tabs-container accessible-whistles-tabs">';

			/* Open tabs nav. */
			$output .= '<ul class="tabs-links">';

			/* Loop through each whistle title and format it into a list item. */
			foreach ( $whistles as $whistle ) {

				$id = sanitize_html_class( 'whistle-' . $this->args['group'] . '-' . $whistle['id'] . '-' . $rand );

				$output .= '<li class="whistle-title"><a href="#' . $id . '">' . $whistle['title'] . '</a></li>';
			}

			/* Close tabs nav. */
			$output .= '</ul><!-- tabs-links -->';

			/* Open tabs content wrapper. */
			$output .= '<div class="tabs-content">';

			/* Loop through each whistle and format its content into a tab content block. */
			foreach ( $whistles as $whistle ) {

				$id = sanitize_html_class( 'whistle-' . $this->args['group'] . '-' . $whistle['id'] . '-' . $rand );

				$output .= '<div id="' . $id . '" class="whistle-content">' . $whistle['content'] . '</div>';
			}

			/* Close tabs and tabs content wrappers. */
			$output .= '</div><!-- End of Tabs content -->';
			$output .= '</div><!-- End of Tabs Container -->';
		}

		/* Return the formatted output. */
		return $output;
	}
}

?>
