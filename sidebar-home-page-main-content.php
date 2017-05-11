<?php if ( is_active_sidebar( 'home-page-main-content' ) ) : ?>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
          <?php dynamic_sidebar( 'home-page-main-content' ); ?>
      </div>
    </div>
  </div>
<?php endif; ?>
