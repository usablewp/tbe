<?php
/**
 * archive.php
 *
 * The template for displaying archive pages.
 * 
 */
?>
<?php get_header(); ?>
<div id="main-content" role="main">
	<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
		<?php if( function_exists('bcn_display') ) bcn_display(); ?>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<header class="archive-page-header">
					<p class="topic"><?php _e( 'Archive', 'the-basics-of-everything' ); ?></p>
					<h2 class="archive-title">
            <?php
      				if ( is_day() ) {
      					printf( __( 'Daily %s', 'the-basics-of-everything' ), get_the_date() );
      				} elseif ( is_month() ) {
      					printf( __( 'Monthly %s', 'the-basics-of-everything' ), get_the_date( _x( 'F Y', 'Monthly archives date format', 'the-basics-of-everything' ) ) );
      				} elseif ( is_year() ) {
      					printf( __( 'Yearly %s', 'the-basics-of-everything' ), get_the_date( _x( 'Y', 'Yearly archives date format', 'the-basics-of-everything' ) ) );
      				}
      			?>
          </h2>
				</header>
				<div class="dynamic-content">
						<?php get_template_part('loop'); ?>
						<?php get_sidebar( 'below-archive-content' ); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
