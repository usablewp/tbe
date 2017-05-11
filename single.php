<?php
/**
 * single.php
 *
 * The template for displaying single posts.
 */
?>

<?php get_header(); ?>
	<div id="main-content" role="main">
		<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
			<?php if( function_exists('bcn_display') ) bcn_display(); ?>
		</div>
		<?php while( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('post-article'); ?>>
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<?php get_template_part( 'content/content', get_post_format() ); ?>
							<?php //
								if ( ! shortcode_exists( 'fbcomments' ) ){
									comments_template();
								}
							?>
						</div>
					</div>
				</div>
			</article>
		<?php endwhile; ?>
	</div> <!-- end main-content -->
<?php get_footer(); ?>
