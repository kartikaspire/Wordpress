<?php
include('list-state.php');
function states_function(){
		
	$posts = get_posts(array(
		'posts_per_page'    => -1,
		'post_type'         => 'states'
	));

if( $posts ):
    echo list_state($posts);
endif;
}
//create function to register shortcode
function register_shortcodes(){
   add_shortcode('getstate', 'states_function' );
}
// hook register function into wordpress init
add_action( 'init', 'register_shortcodes');
?>
