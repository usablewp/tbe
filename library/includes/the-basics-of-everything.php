<?php
/**
 * Register Menus, Sidebars, comments template, other theme utility functions
 *
 * @package    The Basics of Everything
 * @author     Naresh Devineni <nareshdevineni@usablewp.com>
 * @copyright  Copyright (c) 2016, Naresh Devineni
 * @link       http://usablewp.com/themes/the-basics-of-everything
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

// Register custom navigation menus
add_action( 'init', 'tbe_custom_menus', 5 );

// Register custom sizes
add_action( 'init', 'tbe_register_image_sizes', 5 );


// Below Line will let wordpress to render shortcodes in sidebars as well.
add_filter( 'widget_text', 'do_shortcode' );

// Register sidebars
add_action( 'widgets_init', 'tbe_register_sidebars', 5 );

// Removes [WordPress] string from email subject
add_filter( 'wp_mail_from_name', 'tbe_new_mail_from_name' );

// Add more buttons to the content Editor
add_filter("mce_buttons_3", "tbe_add_more_content_markup_buttons");

// Add placeholders to comments form ( Not in use )
//add_filter( 'comment_form_default_fields', 'tbe_comment_placeholders' );

// Set custom excerpt length ( Not in use )
// add_filter( 'excerpt_length', 'tbe_custom_excerpt_length' );

// Add excerpt to pages
add_action( 'init', 'tbe_add_excerpts_to_pages' );

// Better wp_link_pages by velvet blues
add_filter('wp_link_pages_args','tbe_add_next_and_number');

// Add brower names to the body tag
add_filter( 'body_class','tbe_browser_body_class' );

// Redirect user to home after logout
add_action('wp_logout', 'logout_redirect_home');

/**
 * Helper function for getting the script/style `.min` suffix for minified files.
 *
 * @since  0.1.0
 * @copyright   Copyright (c) 2013 - 2016, Justin Tadlock
 * @access public
 * @return string
 */
function tbe_get_min_suffix() {
	return defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
}

/**
 * Registers custom navigation menus.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function tbe_custom_menus() {
  register_nav_menus( array(
    'primary'   	=> __( 'Primary', 'the-basics-of-everything' ),
    'mobile'   		=> __( 'Mobile', 'the-basics-of-everything' ),
    'social'   		=> __( 'Social', 'the-basics-of-everything' ),
    'footer-links' 		=> __( 'Footer Links', 'the-basics-of-everything' ),
  ) );
}

/**
 * Registers custom image sizes.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function tbe_register_image_sizes() {
  add_image_size( 'square', 400, 400,true );
  add_image_size( 'original-thumb', 400 );
  add_image_size( 'small-rectangle', 400,240,true );
  add_image_size( 'smaller-rectangle', 100,60,true );
  add_image_size( 'large-rectangle', 600,360,true );
  add_image_size( 'home-double-thumb', 700 );
}

/**
 * Function for setting the content width of a theme.  This does not check if a content width has been set; it
 * simply overwrites whatever the content width is.
 *
 * @since  0.1.0
 * @access public
 * @param  int    $width
 * @return void
 */
function tbe_set_content_width( $width = '' ) {
	$GLOBALS['content_width'] = absint( $width );
}

/**
 * Register custom sidebars for theme
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function tbe_register_sidebars() {

  // Register Home Page Main Content
  register_sidebar(
    array(
      'id' 			      => 'home-page-main-content',
      'name' 			    => __( 'Home Page Main Content','the-basics-of-everything' ),
      'description' 	=> __( 'Widgets Placed here will appear in the main section of home page', 'the-basics-of-everything' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' 	=> '</div>',
      'before_title' 	=> '<h2 class="content-section-title">',
      'after_title'	  => '</h2>'
    )
  );

  // Register Internal Page Main Content
  register_sidebar(
    array(
      'id' 			      => 'internal-page-below-main-content',
      'name' 			    => __( 'Internal Page Below Main Content','the-basics-of-everything' ),
      'description' 	=> __( 'Widgets Placed here will appear below the main section of internal page', 'the-basics-of-everything' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' 	=> '</div>',
      'before_title' 	=> '<h3 class="content-section-title">',
      'after_title'	  => '</h3>'
    )
  );

  // Register Download Sidebar
  register_sidebar(
    array(
      'id' 			      => 'download',
      'name' 			    => __( 'Sidebar Below Single Product Download','the-basics-of-everything' ),
      'description' 	=> __( 'Widgets Placed here will appear below the main section of single product page', 'the-basics-of-everything' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' 	=> '</div>',
      'before_title' 	=> '<h3 class="content-section-title">',
      'after_title'	  => '</h3>'
    )
  );

  // Register Mobile fly out box sidebar
  register_sidebar(
    array(
      'id' 			      => 'fly-out-sidebar',
      'name' 			    => __( 'Mobile fly out box sidebar', 'the-basics-of-everything' ),
      'description' 	=> __( 'Widgets Placed here will appear when menu icon is clicked', 'the-basics-of-everything' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' 	=> '</div>',
      'before_title' 	=> '<h3 class="flyout-section-title">',
      'after_title'	  => '</h3>'
    )
  );

  // Register below single post content Sidebar
  register_sidebar(
    array(
      'id' 			      => 'below-single-post-content',
      'name' 			    => __( 'Sidebar below the single post content','the-basics-of-everything' ),
      'description' 	=> __( 'Widgets Placed here will appear below the main section of single post page', 'the-basics-of-everything' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' 	=> '</div>',
      'before_title' 	=> '<h3 class="content-section-title">',
      'after_title'	  => '</h3>'
    )
  );

  // Register below single post content Sidebar
  register_sidebar(
    array(
      'id' 			      => 'below-archive-content',
      'name' 			    => __( 'Sidebar below the archive post content','the-basics-of-everything' ),
      'description' 	=> __( 'Widgets Placed here will appear below the main section of archive pages', 'the-basics-of-everything' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' 	=> '</div>',
      'before_title' 	=> '<h3 class="content-section-title">',
      'after_title'	  => '</h3>'
    )
  );

  // Register Download Sidebar
  register_sidebar(
    array(
      'id' 			      => 'error',
      'name' 			    => __( 'Sidebar below error 404 page content','the-basics-of-everything' ),
      'description' 	=> __( 'Widgets Placed here will appear below the main section of error 404 page', 'the-basics-of-everything' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' 	=> '</div>',
      'before_title' 	=> '<h2 class="content-section-title">',
      'after_title'	  => '</h2>'
    )
  );
}

/**
 * Removes [WordPress] string from email subject and replaces it with site name
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function tbe_new_mail_from_name( $old ) {
 return get_bloginfo( 'name' );
}

/**
 * Adds font-size, font-select, sub-script, super-script, del and hr buttons to the content editor
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function tbe_add_more_content_markup_buttons( $buttons ) {
  $buttons[] = 'hr';
  $buttons[] = 'del';
  $buttons[] = 'sub';
  $buttons[] = 'sup';
  $buttons[] = 'fontselect';
  $buttons[] = 'fontsizeselect';
  $buttons[] = 'cleanup';
  $buttons[] = 'styleselect';
  return $buttons;
}

/**
 * Change default fields, add placeholder and change type attributes.
 *
 * @param  array $fields
 * @author: Toscho (http://wordpress.stackexchange.com/users/73/toscho)
 * @since 0.1.0
 * @return array
 */
function tbe_comment_placeholders( $fields )
{
    $fields['author'] = str_replace(
        '<input',
        '<input placeholder="'
        /* Replace 'theme_text_domain' with your theme’s text domain.
         * I use _x() here to make your translators life easier. :)
         * See http://codex.wordpress.org/Function_Reference/_x
         */
            . _x(
                'Name *',
                'comment form placeholder',
                'the-basics-of-everything'
                )
            . '"',
        $fields['author']
    );
    $fields['email'] = str_replace(
        '<input id="email" name="email" type="text"',
        /* We use a proper type attribute to make use of the browser’s
         * validation, and to get the matching keyboard on smartphones.
         */
        '<input type="email" placeholder="Email *"  id="email" name="email"',
        $fields['email']
    );
    $fields['url'] = str_replace(
        '<input id="url" name="url" type="text"',
        // Again: a better 'type' attribute value.
        '<input placeholder="Website Url" id="url" name="url" type="url"',
        $fields['url']
    );
    return $fields;
}

/**
 * Adds a custom excerpt length.
 *
 * @since  0.1.0
 * @access public
 * @param  int     $length
 * @return int
 */
 function tbe_custom_excerpt_length( $length ) {
 	return 150;
 }

 /**
  * Add excerpt functionality to pages
  *
  * @since  0.1.0
  * @access public
  * @return void
  */
function tbe_add_excerpts_to_pages() {
  add_post_type_support( 'page', 'excerpt' );
}

/**
* Better wp_links_pages by velvetblues
*
* @return  	string		previous 1 2 3 next
* @author:  velvetblues
* @since 0.1.0
* @source:  http://www.velvetblues.com/web-development-blog/wordpress-number-next-previous-links-wp_link_pages/trackback/
*/

function tbe_add_next_and_number($args){
    if($args['next_or_number'] == 'next_and_number'){
        global $page, $numpages, $multipage, $more, $pagenow;
        $args['next_or_number'] = 'number';
        $prev = '';
        $next = '';
        if ( $multipage ) {
            if ( $more ) {
                $i = $page - 1;
                if ( $i && $more ) {
                    $prev .= _wp_link_page($i);
                    $prev .= $args['link_before']. $args['previouspagelink'] . $args['link_after'] . '</a>';
                }
                $i = $page + 1;
                if ( $i <= $numpages && $more ) {
                    $next .= _wp_link_page($i);
                    $next .= $args['link_before']. $args['nextpagelink'] . $args['link_after'] . '</a>';
                }
            }
        }
        $args['before'] = $args['before'].$prev;
        $args['after'] = $next.$args['after'];
    }
    return $args;
}

/**
 * Detect and Display browsers as classnames on body tag
 * @since  0.1.0
 * @access public
 * @return string containing class names
 * @author wpbeginner
 */
function tbe_browser_body_class( $classes ) {
  global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
  if( $is_lynx ) $classes[] = 'lynx';
  elseif( $is_gecko ) $classes[] = 'gecko';
  elseif( $is_opera ) $classes[] = 'opera';
  elseif( $is_NS4 ) $classes[] = 'ns4';
  elseif( $is_safari ) $classes[] = 'safari';
  elseif( $is_chrome ) $classes[] = 'chrome';
  elseif( $is_IE ) {
          $classes[] = 'ie';
          if( preg_match( '/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version ) )
          $classes[] = 'ie' . $browser_version[1];
  } else $classes[] = 'unknown';
  if( $is_iphone ) $classes[] = 'iphone';
  if ( stristr( $_SERVER['HTTP_USER_AGENT'], "mac" ) ) {
           $classes[] = 'osx';
     } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'], "linux") ) {
           $classes[] = 'linux';
     } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'], "windows") ) {
           $classes[] = 'windows';
     }
  return $classes;
}

/**
 * Redirect user to home page after logout
 * @since  0.1.0
 * @access public
 * @return null
 */
function logout_redirect_home(){
	wp_safe_redirect(home_url());
	exit;
}

/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own tbe_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 * @author: Twenty Twelve, default wordpress theme
 * @access public
 * @since 0.1.0
 */
function tbe_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'the-basics-of-everything' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'the-basics-of-everything' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div class="comment-wrap">
			<div class="comment-avatar">
				<?php echo get_avatar( $comment, 75 ); ?>
			</div>
			<div class="comment-body">
				<div class="comment-author-wrap vcard">
					<div class="comment-author" itemprop="creator">
						<?php
							$author = get_comment_author_link();
							echo $author;
						?>
					</div>
					<time class="comment-time">
						<?php
							printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s at %2$s', 'the-basics-of-everything' ), get_comment_date(), get_comment_time() )
							);
						?>
					</time>
				</div>
				<!-- end of comment author wrap -->
				<div class="comment-content" itemprop="commentText" itemprop="commentText">
						<?php if ( '0' == $comment->comment_approved ) : ?>
							<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'the-basics-of-everything' ); ?></p>
						<?php endif; ?>
						<p><?php comment_text(); ?></p>
						<div class="reply">
						  	<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'the-basics-of-everything' ), 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
						</div>
						<!-- .reply -->
				</div>
				 <!-- end of comment comment content -->
			</div>
			<!-- end of comment body -->
		</div>
	<?php
		break;
	endswitch; // end comment_type check
}

/**
 * Display navigation to the next/previous set of posts.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function tbe_paging_nav() { ?>
  <ul class="page-navigation">
    <?php
      if ( get_next_posts_link() ) : ?>
      <li class="previous">
        <?php next_posts_link( '<span aria-hidden="true" class="icon-arrow-left"></span><span class="older-posts">' . __( 'Older Posts', 'the-basics-of-everything' ) . '</span>' ); ?>
      </li>
      <?php endif;
     ?>
    <?php
      if ( get_previous_posts_link() ) : ?>
      <li class="next">
        <?php previous_posts_link( '<span class="newer-posts">' . __( 'Newer Posts', 'the-basics-of-everything' ) . '</span><span aria-hidden="true" class="icon-arrow-right"></span>' ); ?>
      </li>
      <?php endif;
     ?>
  </ul> <?php
}

/**
* Customized wp_link_pages
* @return string previous 1 0f 3 next
* @author: Craig Pearson
* @author-url : http://wordpress.stackexchange.com/users/17295/craig-pearson
* @source : http://wordpress.stackexchange.com/questions/144179/post-pagination-modifications-wp-link-pages
*/
function tbe_wp_link_pages(){
	global $page, $pages;
	$page_class = "";
	if ( $page === count($pages) ){
		$page_class = "last-page";
	}
	if ( $page !== count($pages) && 1 !== $page ){
		$page_class = "middle-page";
	}

	$before  = '<div class="page-link-next-prev page-number-' . $page .' '. $page_class . '">';
	$before .= '<span class="page-count-info">' . sprintf( __( 'Page: %1$d of %2$d', 'the-basics-of-everything' ), $page, count( $pages ) ) . '</span>';
	$previouspagelink = '<span aria-hidden="true" class="icon-arrow-left"></span><span class="previous-page">' . __( 'Previous Page', 'the-basics-of-everything' ) . '</span>';

	$nextpagelink = '<span class="next-page">' . __( 'Next Page', 'the-basics-of-everything' ) . '</span><span aria-hidden="true" class="icon-arrow-right"></span>';

	if ( tbe_is_paginated_post() ){
		// This shows the Previous link
		wp_link_pages( array(
			'before' 			=> $before,
			'after' 			=> '</div>',
			'previouspagelink' 	=> $previouspagelink,
			'nextpagelink' 		=> $nextpagelink,
			'next_or_number' 	=> 'next'
		) );
	}
}

/**
 * Is post paginated ?
 * Determines whether or not the current post is a paginated post.
 * @author    Tom Mcfarlin
 * @return    boolean    True if the post is paginated; false, otherwise.
 * @package   includes
 * @since     1.0.0
 */
function tbe_is_paginated_post() {

	global $multipage;
	return 0 !== $multipage;

} // end tbe_is_paginated_post

/**
 * Check Image
 * @since   0.1.0
 * @author  David Chandra
 * @link    https://shellcreeper.com/how-to-sanitize-image-upload/
 */
function tbe_sanitize_image( $input ){

    /* default output */
    $output = '';

    /* check file type */
    $filetype = wp_check_filetype( $input );
    $mime_type = $filetype['type'];

    /* only mime type "image" allowed */
    if ( strpos( $mime_type, 'image' ) !== false ){
        $output = $input;
    }

    return $output;
}

function tbe_sanitize_image_callback( $input ){
    return esc_url_raw( tbe_sanitize_image( $input ) );
}

/**
 * Callback function for adding editor styles.  Use along with the add_editor_style() function.
 *
 * @since       0.1.0
 * @author      Justin Tadlock <justin@justintadlock.com>
 * @copyright   Copyright (c), Justin Tadlock
 * @license     http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @return      array
 */
function tbe_get_editor_styles() {

	// Set up an array for the styles.
	$editor_styles = array();

	// Add the theme's editor styles.
	$editor_styles[] = tbe_get_parent_editor_stylesheet_uri();

	// If a child theme, add its editor styles.
	if ( is_child_theme() && $style = tbe_get_editor_stylesheet_uri() )
		$editor_styles[] = tbe_get_editor_stylesheet_uri();

	// Add the locale stylesheet.
	$editor_styles[] = get_locale_stylesheet_uri();

	// Uses Ajax to display custom theme styles added via the Theme Mods API.
	$editor_styles[] = add_query_arg( 'action', 'tbe_editor_styles', admin_url( 'admin-ajax.php' ) );

	// Return the styles.
	return $editor_styles;
}

/**
 * Returns the parent theme editor stylesheet URI.
 *
 * @since  0.1.0
 * @author      Justin Tadlock <justin@justintadlock.com>
 * @copyright   Copyright (c), Justin Tadlock
 * @access public
 * @return string
 */
function tbe_get_parent_editor_stylesheet_uri() {

	$style_uri = '';
	$suffix    = tbe_get_min_suffix();
	$dir       = trailingslashit( get_template_directory() );
	$uri       = trailingslashit( get_template_directory_uri() );

	if ( $suffix && file_exists( "{$dir}library/css/admin/editor-style{$suffix}.css" ) )
		$style_uri = "{$uri}library/css/admin/editor-style{$suffix}.css";

	else if ( file_exists( "{$dir}library/css/admin/editor-style.css" ) )
		$style_uri = "{$uri}library/css/admin/editor-style.css";

	return $style_uri;
}

/**
 * Returns the active theme editor stylesheet URI.
 *
 * @since  0.1.0
 * @author      Justin Tadlock <justin@justintadlock.com>
 * @copyright   Copyright (c), Justin Tadlock
 * @access public
 * @return string
 */
function tbe_get_editor_stylesheet_uri() {

	$style_uri = '';
	$suffix    = tbe_get_min_suffix();
	$dir       = trailingslashit( get_stylesheet_directory() );
	$uri       = trailingslashit( get_stylesheet_directory_uri() );

	if ( $suffix && file_exists( "{$dir}library/css/admin/editor-style{$suffix}.css" ) )
		$style_uri = "{$uri}library/css/admin/editor-style{$suffix}.css";

	else if ( file_exists( "{$dir}library/css/admin/editor-style.css" ) )
		$style_uri = "{$uri}library/css/admin/editor-style.css";

	return $style_uri;
}

?>
