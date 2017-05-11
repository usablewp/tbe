<?php
/**
 * Custom "Image at right" template file for "Feature a page widget" plugin
 *
 * See: http://wordpress.org/extend/plugins/feature-a-page-widget/faq/
 *
 * Note: Feature a Page Widget provides a variety of filters and options that may alter the output of the_title, the_excerpt, and the_post_thumbnail in this template.
 */
?>

<article class="fpw-image-at-right fpw-container">
	<div class="fpw-featured-image">
		<a href="<?php the_permalink(); ?>">
				<?php $full = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'home-double-thumb' ); ?>
				<img src="<?php echo $full[0]; ?>" alt="" />
		</a>
	</div>
	<div class="fpw-page-content">
		<h3 class="fpw-page-title"><?php the_title(); ?></h3>
		<div class="fpw-page-excerpt">
			<?php the_excerpt(); ?>
		</div>
	</div>
</article>
