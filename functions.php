<?php
/**
 * Axiom America functions and definitions.
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
	 * Enable support for custom logo.
	 */
		add_theme_support( 'custom-logo', array(
			'height'      => 60,
			'width'       => 250,
			'flex-width'  => true,
		) );

		function axiomamerica_custom_logo() {
			// Try to retrieve the Custom Logo
			$output = '';
			if (function_exists('get_custom_logo'))
					$output = get_custom_logo();

			// Nothing in the output: Custom Logo is not supported, or there is no selected logo
			// In both cases we display the site's name
			if (empty($output))
					$output = '<a class="navbar-brand" href="' . esc_url( home_url( '/' ) ) . '">' . get_bloginfo( 'name' ) . '</a>';

			echo $output;
			}

			// Change custom logo classes to play nice with Bootstrap
			add_filter('get_custom_logo','change_logo_class');

			function change_logo_class($html) {
				$html = str_replace('class="custom-logo-link"', 'class="navbar-brand"', $html);
				return $html;
			}

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 644, 400, true ); // default Featured Image dimensions (cropped)

    // additional image sizes
    // delete the next line if you do not need additional image sizes
    // add_image_size( 'category-thumb', 300, 9999 ); // 300 pixels wide (and unlimited height)

	// This theme uses wp_nav_menu() in one location.

	// Register Bootstrap Navigation Walker
	require_once('wp_bootstrap_navwalker.php');

	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'axiom-america' ),
	) );

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

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'axiom_america_custom_background_args', array(
		'default-color' => '787878',
		'default-image' => '',
	) ) );
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
	$GLOBALS['content_width'] = apply_filters( 'axiom_america_content_width', 640 );
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
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'axiom-america' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'axiom_america_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function axiom_america_scripts() {
	wp_enqueue_style( 'axiom-america-style', get_stylesheet_uri() );

	wp_enqueue_style( 'fontawesom-style', '//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' );

	wp_enqueue_script( 'axiom-america-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'axiom-america-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', array(), '1.12.4', true );

	wp_enqueue_script( 'bootstrap-js', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array(), '3.3.7', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'axiom_america_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Kirki Customizer installation prompt.
 */
require_once get_template_directory() . '/inc/include-kirki.php';

/**
 * Load Kirki custom class script.
 */
require_once get_template_directory() . '/inc/axiomamerica-kirki.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Additional template parts.
 */
get_template_part('inc/jumbotron');
get_template_part('inc/site-menu');
get_template_part('inc/featured-posts');
