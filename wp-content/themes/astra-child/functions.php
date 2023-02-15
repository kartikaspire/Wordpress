<?php
include('includes/state-shortcodes.php');
add_action( 'wp_enqueue_scripts', 'astra_child_enqueue_styles' );
function astra_child_enqueue_styles() {
	$parenthandle = 'parent-style';
	$theme        = wp_get_theme();
	wp_enqueue_style( $parenthandle,
		get_template_directory_uri() . '/style.css',
		array(),
		$theme->parent()->get( 'Version' )
	);
	wp_enqueue_style( 'child-style',
		get_stylesheet_uri(),
		array( $parenthandle ),
		$theme->get( 'Version' )
	);
}

function create_posttype() {
	register_post_type( 'states',
	// CPT Options
		array(
		  'labels' => array(
		   'name' => __( 'States' ),
		   'singular_name' => __( 'States' )
		  ),
		  'public' => true,
		  'has_archive' => false,
		  'rewrite' => array('slug' => 'states'),
		)
	);
}

add_action( 'init', 'create_posttype' );

function register_leftsidebar_widgets() {
    register_sidebar( array(
        'name' =>__( 'Front Left Sidebar', 'wpb'),
        'id' => 'left-sidebar',
        'description' => __( 'Appears on the static front page template', 'wpb' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
}
add_action( 'widgets_init', 'register_leftsidebar_widgets' );

