<?php
/**
 * category.php
 *
 * The template for displaying category pages.
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
					<p class="topic"><?php _e( 'Category', 'the-basics-of-everything' ); ?></p>
					<h2 class="archive-title"><?php single_cat_title( '', true ); ?></h2>
					<?php
						// Show an optional category description.
						if ( category_description() ) {
								echo '<p class="category-description">' . category_description() . '</p>';
						}
					?>
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
