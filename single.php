<?php
/**
 * The template for displaying all single posts.
 *
 * @package materialwp
 */

get_header(); ?>

<header class="entry-header">
	<?php $src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), array(5000,1000), false, ''); ?>
	<div class="entry-img" style="background: url(<?php echo $src[0]; ?>);">
		<div class="dark-image-overlay">
		</div>
		<!-- tytuł strony -->
		<div class="container">
			<div class="entry-title">
				<?php the_title('<h1 class="entry-title-header">','</h1>');?>
			</div>
		</div>
	</div>
</header>

<div class="container section-padding">
	<div class="row">

	<div id="primary" class="col-md-8 col-lg-8">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php materialwp_post_nav(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
