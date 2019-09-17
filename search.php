<?php
/**
 * The template for displaying search results pages.
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

	<section id="primary" class="col-md-8 col-lg-8">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Wyniki wyszukiwania: %s', 'materialwp' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'content', 'search' );
				?>

			<?php endwhile; ?>

			<?php materialwp_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
