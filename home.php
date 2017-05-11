<?php
/**
 * home.php
 *
 * The main template file.
 */
 ?>

 <?php get_header(); ?>
 	<div id="main-content" class="blog-posts" role="main">
     <div class="container">
       <div class="row">
         <div class="article-content-container col-sm-12">
          <header class="archive-page-header">
 						<h2 class="archive-title"><?php _e( 'Blog','the-basics-of-everything' ); ?></h2>
 					</header>
          <div class="dynamic-content">
             <?php get_template_part( 'loop' ); ?>
             <?php get_sidebar( 'below-archive-content' ); ?>
          </div>
         </div>
       </div>
     </div>
 	</div>
 <?php get_footer(); ?>
