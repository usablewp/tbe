<?php if ( is_active_sidebar( 'internal-page-below-main-content' ) ) : ?>
  <div class="page-sidebar-area">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
            <?php dynamic_sidebar( 'internal-page-below-main-content' ); ?>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
