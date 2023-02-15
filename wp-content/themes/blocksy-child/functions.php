<?php
include('includes/left-sidebar-short-code.php');
add_action( 'wp_enqueue_scripts', 'blocksy_child_enqueue_styles' );
function blocksy_child_enqueue_styles() {
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

function get_state_list_from_api()
{
    register_rest_route('blocksy-child/v1', 'stateListApi', [
        'methods'  => WP_REST_SERVER::READABLE,
        'callback' => 'state_list_results'
    ]);
}
 
function state_list_results($data)
{
 
    $results = [];
 
    // proceed to database query
    
        array_push($results, [
            'school_name' => "School1",
            'address' => "Odisha",
			'state_code' => 'OD',
        ],
		[
            'school_name' => "School2",
            'address' => 'Karnataka',
			'state_code' => 'KA',
        ],
		[
            'school_name' => "School3",
            'address' => 'Delhi',
			'state_code' => 'DH',
        ]);
    
 
    wp_reset_postdata();
 
    return $results;
}
 
add_action('rest_api_init', 'get_state_list_from_api');

add_action('init','wp_register_param');
function wp_register_param() { 
    global $wp; 
    $wp->add_query_var('state');
	$wp->add_query_var('zipcode');
}


add_action('admin_menu', 'register_adminvav_menu');


function register_adminvav_menu() {
	$hook_suffix = add_options_page('Custom Settings', 'Custom Settings', 'manage_options', 'custom-setting-menu', 'custom_setting_nav_form_fields', 2);
}

function custom_setting_nav_form_fields() {
?>

<div class="wrap">
			<h1><?php echo get_admin_page_title() ?></h1>
			<form method="post" action="options.php" enctype="multipart/form-data">
				<?php
					settings_fields( 'admin_menu_settings' );
					do_settings_sections( 'admin_form_form_fields' );
				?>
				<?php
				submit_button();
				?>
			</form>
		</div>
<?php
}

add_action( 'admin_init',  'admin_menu_settings_fields' );
function admin_menu_settings_fields(){

	
	$page_slug = 'admin_form_form_fields';
	$option_group = 'admin_menu_settings';

	// 1. create section
	add_settings_section(
		'admin_menu_section_id', // section ID
		'', // title (optional)
		'', // callback function to display the section (optional)
		$page_slug
	);

	// register fields
	register_setting( $option_group, 'custom_setting_checkbox', 'admin_field_checkbox' );
	register_setting( $option_group, 'site_url_field', '' );
	register_setting( $option_group, "logo", "handle_logo_upload" ); 
	register_setting( $option_group, 'site_name_field', '' );
	

	// add fields
	

	add_settings_field(
		'site_url_field',
		'Site Url',
		'url_field',
		$page_slug,
		'admin_menu_section_id',
		array(
			'label_for' => 'site_url_field',
			'class' => 'hello',
			'name' => 'site_url_field' 
		)
	);
	
	add_settings_field(
		'site_name_field',
		'Site Name',
		'site_name_field',
		$page_slug,
		'admin_menu_section_id',
		array(
			'label_for' => 'site_name_field',
			'class' => 'site_name_field',
			'name' => 'site_name_field'
		)
	);
	
	add_settings_field(
		'custom_logo_field',
		'Logo',
		'admin_form_logo',
		$page_slug,
		'admin_menu_section_id'
	);
	
	add_settings_field(
		'custom_setting_checkbox',
		'Use Custom Settings',
		'admin_form_checkbox',
		$page_slug,
		'admin_menu_section_id'
	);

}

function url_field( $args ){
	printf(
		'<input type="text" id="%s" name="%s" value="%s" />',
		$args[ 'name' ],
		$args[ 'name' ],
		get_option($args[ 'name' ])
	);
}

function site_name_field($args) {
	printf(
		'<input type="text" id="%s" name="%s" value="%s" />',
		$args[ 'name' ],
		$args[ 'name' ],
		get_option($args[ 'name' ])
	);
}

function admin_form_logo($args) {
	?>
	<input type="file" name="logo" />
	<?php echo get_option('logo'); ?>
	<?php
}

function admin_form_checkbox( $args ) {
	$value = get_option( 'custom_setting_checkbox' );
	?>
		<label>
			<input type="checkbox" name="custom_setting_checkbox" <?php checked( $value, 'yes' ) ?> /> Yes
		</label>
	<?php
}

function admin_field_checkbox( $value ) {
	return 'on' === $value ? 'yes' : 'no';
}

function handle_logo_upload( $value ) {
	if(!empty($_FILES["demo-file"]["tmp_name"]))
    {           
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
        $urls = wp_handle_upload($_FILES["logo"], array('test_form' => false));
        $temp = $urls['url'];
        return $temp;
    }       
    return $value;
}
