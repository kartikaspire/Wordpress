<?php
function state_form_shortcode() {
   $posts = get_posts(array(
		'posts_per_page'    => -1,
		'post_type'         => 'states'
	));

	if( $posts ):
    //echo list_state($posts);
	$stateList = [];
	foreach( $posts as $post ){
		$stateList[] = [
			'state' => get_field('state', $post->ID),
			'state_code' => get_field('state_code', $post->ID),
		];
	}
	
	
endif;
	global $post;
	$slug = $post->post_name;
	ob_start(); 
	require get_stylesheet_directory() . '/views/state-list-form.php';
	$stateList = ob_get_contents();
	ob_end_clean();
	wp_reset_postdata();
	
	return $stateList;  
} 

function register_shortcodes(){
   add_shortcode('state_form_shortcode', 'state_form_shortcode' );
}
// hook register function into wordpress init
add_action( 'init', 'register_shortcodes');
//add_shortcode( 'state_form_shortcode', 'state_form_shortcode' );