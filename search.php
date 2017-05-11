<?php
/**
 * search.php
 *
 * The template for displaying search results.
 */
?>

<?php get_header(); ?>
	<div id="main-content" role="main">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<header class="archive-page-header">
						<p class="topic"><?php _e( 'Search results for', 'the-basics-of-everything' ); ?></p>
						<h2 class="archive-title"><?php echo get_search_query(); ?></h2>
					</header>
					<div class="dynamic-content">
							<?php get_template_part('loop'); ?>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- end main-content -->
<?php //get_sidebar(); ?>
<?php get_footer(); ?>
