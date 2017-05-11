<?php
/**
 * header.php
 *
 * The header for the theme.
 */
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
  <head>
    <!-- Meta Tags  -->
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <!-- Important header tags -->
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <!--[if lt IE 9]>
    <script src="<?php echo FRAMEWORK_JS_VENDOR_URI.'/respond.js' ;?>"></script>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <?php // Load comment reply script. ?>
    <?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>

    <?php // Detecting Retina Devices ?>
    <?php
    if ( isset( $_COOKIE['retina'] ) ) :
       $retina = false;
     $ratio = $_COOKIE['retina'];
     if ( $ratio >= 2 ) :
       $retina = true;
     endif;
    else :
    ?>
      <script type="text/javascript">
       var retina = 'retina='+ window.devicePixelRatio +';'+ retina;
       document.cookie = retina;
       document.location.reload(true);
      </script>
    <?php endif; ?>
    <?php wp_head(); ?>
  </head>
<!-- end of Main Header -->
  <body <?php body_class(); ?> id="site-container">
    <ul class="screen-reader-text"><!-- For Screen Reader -->
      <li><a href="#main-content"><?php _e( 'Skip to main content', 'the-basics-of-everything' ); ?></a></li>
      <li><a href="#footer"><?php _e( 'skip to footer','the-basics-of-everything' ); ?></a></li>
    </ul>
    <?php
      // Load fly out sidebar
      get_template_part( "parts/fly-out-sidebar" );
    ?>
    <div id="sb-site" class="page-wrapper" canvas="container">
      <?php
        // Load main header part
        $header_type = get_theme_mod( 'tbe_header_type', "logo-with-menu-icon" );
        get_template_part( "parts/headers/{$header_type}");
      ?>
