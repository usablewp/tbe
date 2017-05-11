<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>">
			<div>
				<?php $format = get_post_format(); ?>
				<?php get_template_part( 'content/content', $format ); ?>
			</div>
		</article>
	<?php endwhile; ?>
	<?php tbe_paging_nav(); ?>
<?php else : ?>
	<?php get_template_part( 'content/content', 'none' ); ?>
<?php endif; ?>
