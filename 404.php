<?php
/**
 * 404.php
 *
 * The template for displaying 404 pages (Not Found).
 */
?>

<?php get_header(); ?>
	<div id="main-content" class="content-404">
		<article <?php post_class('page-article'); ?>>
			<div class="container">
				<div class="row">
					<div class="article-content-container col-sm-12">
						<h2><?php _e( 'Error 404 - Nothing Found', 'the-basics-of-everything' ); ?></h2>
						<p><?php _e( 'It looks like nothing was found here.', 'the-basics-of-everything' ); ?></p>
					</div>
				</div>
			</div>
		</article>
		<?php get_sidebar( 'error' ); ?>
	</div> <!-- End of content-404 -->
<?php get_footer(); ?>
