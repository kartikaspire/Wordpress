<?php
function states_function(){
		
	$posts = get_posts(array(
		'posts_per_page'    => -1,
		'post_type'         => 'states'
	));

if( $posts ):
    $html = '';
	$html .= '<ul>';        
    foreach( $posts as $post ):
	$state_code = get_field('state_code', $post->ID);
	$state = get_field('state', $post->ID);
	$status = get_field('status', $post->ID);
	if ($status == 1) {
		$status = "Enabled";
	} else {
		$status = "Disabled";
	}
        setup_postdata( $post );
        
       $html .= '<li>'.$state.' (State code='.$state_code.', Status='.$status.')</li>';
   endforeach;
    
    $html .='</ul>';
    
    wp_reset_postdata();
	return $html;
endif;
}
//create function to register shortcode
function register_shortcodes(){
   add_shortcode('getstate', 'states_function' );
}
// hook register function into wordpress init
add_action( 'init', 'register_shortcodes');
?>
