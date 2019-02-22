<?php
/**
 * Mudra functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mudra
 */

// Set theme version
define( 'MUDRA_VERSION', '1.0.1' );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function mudra_setup() {

	// Make theme available for translation.
	load_theme_textdomain( 'mudra' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// Gutenberg Support.
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'mudra-featured-image', 640, 320, true );

	add_image_size( 'mudra-related-image', 350, 196, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 760;

	// This theme uses wp_nav_menu() in three locations.
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'mudra' ),
		'header' => __( 'Header Menu', 'mudra' ),
		'footer' => __( 'Footer Menu', 'mudra' ),
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

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'mudra_custom_background_args', array(
		'default-color' => '#ffffff',
		'default-image' => '',
	) ) );

}
add_action( 'after_setup_theme', 'mudra_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function mudra_content_width() {

	$content_width = $GLOBALS['content_width'];

	/**
	 * Filter Mudra content width of the theme.
	 *
	 * @param int $content_width Content width in pixels.
	 */
	$GLOBALS['content_width'] = apply_filters( 'mudra_content_width', $content_width );

}
add_action( 'template_redirect', 'mudra_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mudra_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'mudra' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your blog sidebar.', 'mudra' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Header Advertisement', 'mudra' ),
		'id'            => 'header-ad',
		'description'   => __( 'Add advertisement widget here.', 'mudra' ),
		'before_widget' => '<div id="%1$s" class="header-ad %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'mudra' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here.', 'mudra' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'mudra' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here.', 'mudra' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'mudra' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here.', 'mudra' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'mudra_widgets_init' );

/**
 * Custom fonts.
 */
require get_parent_theme_file_path( '/inc/mudra-fonts.php' );

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Custom tags for this theme.
 */
require get_parent_theme_file_path( '/inc/theme-tags.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * Mudra customizer CSS generator
 */
require get_parent_theme_file_path( '/inc/theme-styles.php' );

/**
 * Enqueue scripts and styles.
 */
function mudra_scripts () {

	// Load jquery if it isn't
	wp_enqueue_script( 'jquery' );

	// SuperFish Scripts
	wp_enqueue_script( 'superfish', get_template_directory_uri() . '/assets/js/superfish.min.js', array(), '1.7.10', true );
	wp_enqueue_script( 'hoverIntent' );

	// SlickNav
	wp_enqueue_script( 'slicknav', get_template_directory_uri() . '/assets/js/jquery.slicknav.min.js', array(), '1.0.10', true );

	// Custom Mudra Scripts
	wp_enqueue_script( 'mudra-script', get_template_directory_uri() . '/assets/js/mudra.js', array(), MUDRA_VERSION, true );
	if ( true == get_theme_mod( 'sticky_header_nav', true ) ) :
		wp_enqueue_script( 'mudra-sticky', get_template_directory_uri() . '/assets/js/sticky.js', array(), MUDRA_VERSION, true );
	endif;

	// Modernizr
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr.min.js', array(), '2.6.2', true );

	// HTML5 Shiv
	wp_enqueue_script( 'html5shiv', get_template_directory_uri() . '/assets/js/html5shiv.min.js', array(), '3.7.3', true );

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'mudra-fonts', mudra_fonts_url(), array(), null );

	// Enqueue theme style sheet.
	wp_enqueue_style( 'mudra-style', get_stylesheet_uri(), array(), MUDRA_VERSION );

	// Font Awesome
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.7.0' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'mudra_scripts' );
