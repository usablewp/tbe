<?php
/**
 * tag.php
 *
 * The template for displaying tag pages.
 */
?>
<?php get_header(); ?>
<div id="main-content" role="main">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<header class="archive-page-header">
					<p class="topic"><?php _e( 'Tag', 'the-basics-of-everything' ); ?></p>
					<h2 class="archive-title"><?php single_tag_title( '', true ); ?></h2>
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
