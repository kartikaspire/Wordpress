<?php
function getstates_function(){
		
	$posts = get_posts(array(
		'posts_per_page'    => -1,
		'post_type'         => 'news'
	));

if( $posts ):
    $html = '';
	$html .= '<ul>';        
    foreach( $posts as $post ): 
        
        setup_postdata( $post );
        
       $html .= '<li>'.$post->post_title.'</li>';
   endforeach;
    
    $html .='</ul>';
    
    wp_reset_postdata();
	return $html;
endif;
}
//create function to register shortcode
function register_shortcodes(){
   add_shortcode('getstate', 'getstates_function' );
}
// hook register function into wordpress init
add_action( 'init', 'register_shortcodes');
?>
