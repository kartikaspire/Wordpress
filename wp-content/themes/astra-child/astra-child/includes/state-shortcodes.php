<?php
include('list-state.php');
function states_function(){
		
	$posts = get_posts(array(
		'posts_per_page'    => -1,
		'post_type'         => 'states'
	));

if( $posts ):
    //echo list_state($posts);
	$stateList = [];
	foreach( $posts as $post ){
		$stateList[] = [
			'state_code' => get_field('state_code', $post->ID),
			'status' => get_field('status', $post->ID),
			'state' => get_field('state', $post->ID),
		];
	}
	
	
endif;
	global $post;
	$slug = $post->post_name;
	ob_start(); 
	require get_stylesheet_directory() . '/views/state-list.php';
	$stateList = ob_get_contents();
	ob_end_clean();
	wp_reset_postdata();
	
	return $stateList;
}
//create function to register shortcode
function register_shortcodes(){
   add_shortcode('getstate', 'states_function' );
}
// hook register function into wordpress init
add_action( 'init', 'register_shortcodes');

