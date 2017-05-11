<?php
/* Page.php
* The template for displaying all pages.
*/
?>
<?php get_header(); ?>
<div id="main-content" role="main">
  <div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
    <?php if( function_exists('bcn_display') ) bcn_display(); ?>
  </div>
  <?php while( have_posts() ): the_post(); ?>
    <article <?php post_class('page-article'); ?>>
      <div class="container">
        <div class="row">
          <div class="article-content-container col-sm-12">
            <h2><?php the_title(); ?></h2>
            <div class="article-content">
              <?php
              // If the post has a thumbnail and it's not password protected
					    // then display the thumbnail
					    if ( has_post_thumbnail() && ! post_password_required() ) : ?>
						      <figure class="entry-thumbnail"><?php the_post_thumbnail( 'full' ); ?></figure>
					    <?php endif; ?>
              <?php the_content(); ?>
            </div>
          </div>
        </div>
      </div>
    </article>
    <?php get_sidebar( 'internal-page-below-main-content' ); ?>
  <?php endwhile; ?>
</div>
<?php get_footer(); ?>
