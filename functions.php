<?php
/**
 * materialwp functions and definitions
 *
 * @package materialwp
 */

if ( ! function_exists( 'materialwp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function materialwp_setup() {

	/**
	* Set the content width based on the theme's design and stylesheet.
	*/
	if ( ! isset( $content_width ) ) {
		$content_width = 640; /* pixels */
	}

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on materialwp, use a find and replace
	 * to change 'materialwp' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'materialwp', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	//Suport for WordPress 4.1+ to display titles
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'materialwp' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	// add_theme_support( 'post-formats', array(
	// 	'aside', 'image', 'video', 'quote', 'link',
	// ) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'materialwp_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // materialwp_setup
add_action( 'after_setup_theme', 'materialwp_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function materialwp_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'materialwp' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget-sidebar %2$s"><div class="widget-panel">',
		'after_widget'  => '</div></aside>',
		'before_title'  => ' <div class="widget-panel-heading"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 1', 'materialwp' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="footer-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 2', 'materialwp' ),
		'id'            => 'footer-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="footer-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 3', 'materialwp' ),
		'id'            => 'footer-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="footer-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'materialwp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function materialwp_scripts() {
	wp_enqueue_style( 'mwp-bootstrap-styles', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.4', 'all' );

	wp_enqueue_style( 'mwp-material-styles', get_template_directory_uri() . '/css/material-fullpalette.min.css', array(), '', 'all' );

	wp_enqueue_style( 'mwp-ripples-styles', get_template_directory_uri() . '/css/ripples.min.css', array(), '', 'all' );

	wp_enqueue_style( 'materialwp-style', get_stylesheet_uri() );

	wp_enqueue_style( 'custom', get_template_directory_uri() . '/css/custom.css', array(), '', 'all' );

	wp_enqueue_script( 'mwp-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.4', true );

	wp_enqueue_script( 'mwp-ripples-js', get_template_directory_uri() . '/js/ripples.min.js', array('jquery'), '', true );

	wp_enqueue_script( 'mwp-material-js', get_template_directory_uri() . '/js/material.min.js', array('jquery'), '', true );

	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), '', true );
	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'materialwp_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
//require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Adds a Walker class for the Bootstrap Navbar.
 */
require get_template_directory() . '/inc/bootstrap-walker.php';

/**
 * Comments Callback.
 */
require get_template_directory() . '/inc/comments-callback.php';

function new_excerpt_more($more) {
	global $post;
	return '<div><a class="fw-btn fw-btn-1 fw-btn-black" href="'.get_permalink($post->ID).'"><span>Czytaj całość</span></a></div>';
}

add_filter('excerpt_more', 'new_excerpt_more');
