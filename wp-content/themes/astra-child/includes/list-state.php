<?php
function list_state($posts){
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
}
?>
