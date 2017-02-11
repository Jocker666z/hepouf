<?php

if ( ! function_exists( 'hepouf_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function hepouf_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /lang/ directory
	 * If you're building a theme based on aThemes, use a find and replace
	 * to change 'athemes' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'hepouf', get_template_directory() . '/lang' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	/**
	 * Add post formats
	 */
	add_theme_support( 'post-formats', array( 'video','status','link' ) );
	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'main' => __( 'Main Menu', 'hepouf' ),
	) );
}
endif; // hepouf_setup
add_action( 'after_setup_theme', 'hepouf_setup' );

/**
 * Register widgets
 */
function hepouf_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Top Sidebar', 'hepouf' ),
		'id'            => 'top-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
    register_sidebar( array(
		'name'          => __( 'Bottom Sidebar', 'athemes' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 1', 'athemes' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 2', 'athemes' ),
		'id'            => 'sidebar-4',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 3', 'athemes' ),
		'id'            => 'sidebar-5',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );
}
add_action( 'widgets_init', 'hepouf_widgets_init' );

/**
 * Count the number of footer sidebars to enable dynamic classes for the footer
 */
function hepouf_footer_sidebar_class() {
	$count = 0;

	if ( is_active_sidebar( 'sidebar-3' ) )
		$count++;

	if ( is_active_sidebar( 'sidebar-4' ) )
		$count++;

	if ( is_active_sidebar( 'sidebar-5' ) )
		$count++;

	$class = '';

	switch ( $count ) {
		case '1':
			$class = 'site-extra extra-one';
			break;
		case '2':
			$class = 'site-extra extra-two';
			break;
		case '3':
			$class = 'site-extra extra-three';
			break;
	}

	if ( $class )
		echo 'class="' . $class . '"';
}

/**
 * Enqueue scripts and styles
 */
function enqueue_scripts() {
	wp_enqueue_style( 'glyphs', get_template_directory_uri() . '/css/glyphs.css' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );
    wp_register_style( 'responsive', get_template_directory_uri() . '/css/responsive.css' );
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'responsive' );

	wp_enqueue_script( 'superfish', get_template_directory_uri() . '/js/superfish.js', array( 'jquery' ) );
	wp_enqueue_script( 'supersubs', get_template_directory_uri() . '/js/supersubs.js', array( 'jquery' ) );
	wp_enqueue_script( 'settings', get_template_directory_uri() . '/js/settings.js', array( 'jquery' ) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Add custom widgets
 */
require get_template_directory() . '/inc/custom-widgets.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';