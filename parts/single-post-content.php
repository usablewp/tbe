<?php
	// Getting article information
	$id 				= get_the_ID();
	$home_thumb 		= wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'home-thumb' );
	$full 				= wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'full' );
?>
<!-- Article content -->
	<?php if ( is_single() ): ?>
	<div class="entry-content">
		<?php tbe_wp_link_pages(); ?>
		<?php get_sidebar( 'above-single-post-main-content' ); ?>
		<?php if ( has_post_thumbnail() && ! post_password_required() && ! tbe_is_paginated_post() ) :  ?>
			<figure class="entry-thumbnail"><a href="<?php the_permalink(); ?>"><img src="<?php echo $full[0]; ?>" alt="" /></a></figure>
		<?php endif; ?>
		<div class="the-content">
			<?php the_content(); ?>
			<div class="article-topics">
				<div class="article-categories">
						<?php _e( 'Categories: ', 'the-basics-of-everything' ); ?><?php the_category( ', ' ); ?>
				</div>
				<div class="article-tags">
						<?php the_tags(); ?>
				</div>
			</div>
		</div>
		<?php tbe_wp_link_pages(); ?>
		<?php get_template_part( 'parts/next-previous-articles' ); ?>
		<?php get_sidebar( 'below-single-post-content' ); ?>
		<?php if( shortcode_exists( 'fbcomments' ) ): ?>
			<?php echo do_shortcode( '[fbcomments count="off" num="5" countmsg="Discussion" title="Discussion"]' ); ?>
		<?php endif; ?>
	</div> <!-- end entry-content -->
	<?php endif; ?>
