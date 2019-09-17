<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package materialwp
 */

get_header(); ?>

<!-- sekcja Top slider -->
<div class="top-slider">
	<?php
		$posts = get_posts(array(
		'include' => 84,
		'post_type' => 'any',
		'numberposts' => 1,
		'suppress_filters' => false,
		));
		
	echo apply_filters('the_content', $posts[0]->post_content);
	?>
</div>

<!-- sekcja Trzy kluczowe cechy -->
<div class="three-features gray-bg">
	<div class="container section-padding">
	    <?php
		$posts = get_posts(array(
		'include' => 109,
		'post_type' => 'any',
		'numberposts' => 1,
		'suppress_filters' => false,
		));
		
		echo apply_filters('the_content', $posts[0]->post_content);
		?>
	</div>
</div>

<!-- sekcja Lista ostatnich wpisów -->
<div class="list-recent-entries lightest-bg">
	<div class="container section-padding">
	    <?php
		$posts = get_posts(array(
		'include' => 139,
		'post_type' => 'any',
		'numberposts' => 1,
		'suppress_filters' => false,
		));
		
		echo apply_filters('the_content', $posts[0]->post_content);
		?>
	</div>
</div>


<?php get_footer(); ?>
