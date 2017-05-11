<?php if ( is_active_sidebar( 'below-archive-content' ) ) : ?>
  <aside class="page-sidebar-area">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
            <?php dynamic_sidebar( 'below-archive-content' ); ?>
        </div>
      </div>
    </div>
  </aside>
<?php endif; ?>
