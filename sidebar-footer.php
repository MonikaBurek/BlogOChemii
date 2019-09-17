<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package materialwp
 */


?>

<div class="footer-widgets-wrapper">
	<div class="footer-widgets-wrapper-inner">
		<div class="col-xs-12 col-md-4 footer-widget">
			<?php dynamic_sidebar( 'footer-1' ); ?>
		</div>
		<div class="col-xs-12 col-md-4 footer-widget">
			<?php dynamic_sidebar( 'footer-2' ); ?>
		</div>
		<div class="col-xs-12 col-md-4 footer-widget">
			<?php dynamic_sidebar( 'footer-3' ); ?>
		</div>
	</div>
</div>

