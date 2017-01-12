					<?php get_template_part( 'parts/content', 'join' ); ?>

					<footer class="footer" role="contentinfo">
						<div id="inner-footer" class="row">
							<div class="large-12 medium-12 columns text-center">
								<nav role="navigation">
		    						<?php joints_footer_links(); ?>
		    					</nav>
		    				</div>
							<div class="large-12 medium-12 columns">
								<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Site built by <a href="#">Hemi</a> | <a href="#">Sitemap</a></p>
							</div>
						</div> <!-- end #inner-footer -->
					</footer> <!-- end .footer -->
				</div>  <!-- end .main-content -->
			</div> <!-- end .off-canvas-wrapper-inner -->
		</div> <!-- end .off-canvas-wrapper -->
		<?php wp_footer(); ?>
	</body>
</html> <!-- end page -->