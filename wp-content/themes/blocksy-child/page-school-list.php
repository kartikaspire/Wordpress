<?php
echo get_header();?>
<?php if (is_active_sidebar( 'left-sidebar')) : ?>
    <div id="secondary" class="widget-area" role="complementary">
    <?php dynamic_sidebar( 'left-sidebar' ); ?>
    </div>
	<?php //echo do_shortcode("[state_form_shortcode]"); ?>
<?php endif; ?>
<?php
$newstate = $_GET['state'];
$zipcode = $_GET['zipcode'];

if ($newstate) {
	
$request = wp_remote_get('http://localhost:8012/wordpress/state-list.json');

if( is_wp_error( $request ) ) {
	return false; // Bail early
}

$body = wp_remote_retrieve_body( $request );

$data = json_decode($body, true);


if(!empty($data)) {
	echo '<div class="row-state">';
	echo '<h3>State Page Tiltle</h3>';
	foreach($data as $state) {
		if ($newstate == $state['address']) {
			
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

echo get_footer();