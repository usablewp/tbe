<?php
/**
 * Add easy digital downloads related functions
 *
 * @package    The Basics of Everything
 * @author     Naresh Devineni <nareshdevineni@usablewp.com>
 * @copyright  Copyright (c) 2016, Naresh Devineni
 * @link       http://usablewp.com/themes/the-basics-of-everything
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */


// No purchase button below download content
remove_action( 'edd_after_download_content', 'edd_append_purchase_link' );
