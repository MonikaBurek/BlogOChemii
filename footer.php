<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package materialwp
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

		<div class="footer-wigets">
			<div class="container">
				<div class="row">
					<?php get_sidebar('footer'); ?>
				</div><!-- .row -->
			</div><!-- .container -->
		</div>

		<div class="footer-bottom-row">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="site-info">
							Copyright 2019 &copy monikaburek.it
						</div><!-- .site-info -->
					</div> <!-- col-lg-12 -->
				</div><!-- .row -->
			</div><!-- .container -->
		</div>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
