<?php
/**
 * Axiom America functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Axiom_America
 */

if ( ! function_exists( 'axiom_america_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function axiom_america_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Axiom America, use a find and replace
	 * to change 'axiom-america' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'axiom-america', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for theme logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 50,
		'width'       => 162,
		'flex-height' => false,
		'flex-width'  => true,
		'header-text' => 'site-title'
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.

	// Register Bootstrap Navigation Walker
	require_once('wp_bootstrap_navwalker.php');

	register_nav_menus( array(
        'primary' => esc_html__( 'Primary', 'axiom-america' ),
	) );

	/*
	 * Enable support for Post formats.
	 *
	 * @link https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'gallery',
	 	'link',
		'image',
		'quote',
		'status',
		'video',
		'audio',
		'chat')
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	// add_theme_support( 'custom-background', apply_filters( 'axiom_america_custom_background_args', array(
		// 'default-color' => 'ffffff',
		// 'default-image' => '',
	// ) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'axiom_america_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function axiom_america_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'axiom_america_content_width', 677 );
}
add_action( 'after_setup_theme', 'axiom_america_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function axiom_america_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'axiom-america' ),
		'id'            => 'sidebar-page',
		'description'   => esc_html__( 'Add widgets here.', 'axiom-america' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s panel panel-default">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title panel-heading">',
		'after_title'   => '</div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Left Footer', 'axiom-america' ),
		'id'            => 'sidebar-footer-left',
		'description'   => esc_html__( 'Add widgets here.', 'axiom-america' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s panel panel-default">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title panel-heading">',
		'after_title'   => '</div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Center Footer', 'axiom-america' ),
		'id'            => 'sidebar-footer-center',
		'description'   => esc_html__( 'Add widgets here.', 'axiom-america' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s panel panel-default">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title panel-heading">',
		'after_title'   => '</div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Right Footer', 'axiom-america' ),
		'id'            => 'sidebar-footer-right',
		'description'   => esc_html__( 'Add widgets here.', 'axiom-america' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s panel panel-default">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title panel-heading">',
		'after_title'   => '</div>',
	) );
}
add_action( 'widgets_init', 'axiom_america_widgets_init' );

/**
 * Recommend the Kirki plugin
 */
require get_template_directory() . '/inc/include-kirki.php';

/**
 * Load the Kirki class
 */
require get_template_directory() . '/inc/class-axiom-america-kirki.php';

/**
 * Load the Kirki Fallback class
 */
require get_template_directory() . '/inc/kirki-fallback.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Enqueue scripts and styles.
 */
function axiom_america_scripts() {
	wp_enqueue_style( 'axiomamerica-source-sans-pro-css', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,700,700i,900,900i' );
	wp_enqueue_style( 'fontawesome-css', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
	axiom_america_color_schemes();
	//wp_enqueue_style( 'axiom-america-style', get_stylesheet_uri() );

	//wp_enqueue_script( 'axiom-america-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'axiom-america-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'axiom-america-js-functions', get_template_directory_uri() . '/js/axiomamerica.min.js', array('jquery'), '4.7.3' );

	wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array(), '337', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'axiom_america_scripts' );

/**
 * Implement the Custom Header feature.
 */
// require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom template sections for this theme.
 */
require get_template_directory() . '/inc/jumbotron-front.php';
require get_template_directory() . '/inc/site-navigation.php';
require get_template_directory() . '/inc/quote-front.php';
require get_template_directory() . '/inc/about-front.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
