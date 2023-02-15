<?php
$newstate = get_query_var('state');
$zipcode = get_query_var('zipcode');
if ($newstate) {
	
$request = wp_remote_get(get_site_url().'/wp-json/blocksy-child/v1/stateListApi/');

if( is_wp_error( $request ) ) {
	return false; // Bail early
}

$body = wp_remote_retrieve_body( $request );

$data = json_decode($body, true);


if(!empty($data)) {
	echo '<div class="row-state">';
	echo '<h3>State Page Tiltle</h3>';
	foreach($data as $state) {
		if ($newstate == $state['state_code']) {
			
			echo '<div>';
				echo '<a href="' .get_site_url()."/".strtolower($state['school_name']). '">' . $state['school_name'] . '</a>';
				echo '<br/>';
				echo '<span>' . $state['address'] . '</span>';
			echo '</div>';
		}
	}
	echo '</div>';
}

} else {
	echo "List of values";
}
