<?php
/**
 * footer.php
 *
 * The template for displaying the footer.
 */
?>
	<!-- FOOTER -->
	<footer id="footer">
		<div class="footer-content">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="copyright">
							<p><?php printf( __( 'All right reserved &copy; %s', 'the-basics-of-everything' ), date_i18n( 'Y' ) ); ?></p>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="footer-links">
							<?php
								wp_nav_menu( array(
									'theme_location' 	=> 'footer-links',
								) );
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer> <!-- end site-footer -->
</div><!-- End of Page Wrapper -->
	<?php wp_footer(); ?>
	</body>
</html>
