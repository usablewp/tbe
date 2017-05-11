<?php
	// Getting article information
	$id 								= get_the_ID();
	$home_double_thumb 	= wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'home-double-thumb' );
	$full 							= wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'full' );
	$format 						= get_post_format();
?>
<header class="entry-header">
		<?php if ( is_single() ) : ?>
			<div class="article-header">
				<h2 class="article-title"><?php the_title(); ?> </h2>
				<div class="article-header-meta">
					<?php get_template_part( 'content/content', 'post-format-icon' ); ?>
					<div class="article-date"><time><?php echo esc_html( get_the_date() ); ?></time></div>
					<div class="the-author">
						<div class="meta-author">
					    <div class="author-avatar">
					      <?php echo get_avatar( get_the_author_meta( 'ID' ), 50 ); ?>
					    </div>
					    <?php
					      // Get the post author.
					      printf(
					        '<div class="meta-author"><a href="%1$s" rel="author"> By %2$s</a></div>',
					        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
					        get_the_author()
					      );
					    ?>
					  </div>
					</div>
				</div>
			</div>
		<?php else:
			// If the post has a thumbnail and it's not password protected
			// then display the thumbnail
			if ( has_post_thumbnail() && ! post_password_required() ) : ?>
				<figure class="entry-thumbnail"><a href="<?php the_permalink(); ?>"><img src="<?php echo $home_double_thumb[0]; ?>" alt="" /></a></figure>
			<?php endif; ?>
			<?php get_template_part( 'content/content', 'post-format-icon' ); ?>
			<div class="archive-article-content">
				<h3 class="article-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
				<div class="article-excerpt">
					<?php the_excerpt(); ?>
					<a href="<?php the_permalink(); ?>" class="read-more">
						<?php _e( 'Read More', 'the-basics-of-everything' ); ?>
					</a>
				</div>
				<date class="article-date"><?php echo esc_html( get_the_date() ); ?></date>
			</div>
		<?php endif; ?>
	</header> <!-- end entry-header -->
