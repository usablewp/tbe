<?php
/*
Template Name: Home Page
*/
?>
<?php get_header(); ?>
		<div id="main-content" role="main">
			<?php if ( have_posts() ) : ?>
      	<?php while ( have_posts() ) : the_post(); ?>
          <div id="homepage-sections">
						<div class="home-page-intro">
							<div class="container">
								<div class="row">
									<div class="col-sm-7 intro-content">
										<?php the_content(); ?>
									</div>
									<div class="col-sm-5">
										<?php $full = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?>
										<img src="<?php echo $full[0]; ?>" alt="" />
									</div>
								</div>
							</div>
						</div>
						<?php get_sidebar( 'home-page-main-content' ); ?>
					</div>
      	<?php endwhile; ?>
      <?php else : ?>
      	<?php get_template_part( 'content', 'none' ); ?>
      <?php endif; ?>
		</div> <!-- end of main-content -->
<?php get_footer(); ?>
