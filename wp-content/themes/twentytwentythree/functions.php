<?php
/**
 * Twenty Twenty-Two functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Two
 * @since Twenty Twenty-Two 1.0
 */
include('custom-shortcodes.php');

/* Custom Post Type Start */
function create_posttype() {
	register_post_type( 'news',
	// CPT Options
		array(
		  'labels' => array(
		   'name' => __( 'News' ),
		   'singular_name' => __( 'News' )
		  ),
		  'public' => true,
		  'has_archive' => false,
		  'rewrite' => array('slug' => 'news'),
		)
	);
}

add_action( 'init', 'create_posttype' );


function aspire_theme_assets() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
}

add_action( 'wp_enqueue_scripts', 'aspire_theme_assets' );