<?php

//* Child's theme name
define( 'Child_Theme_Name', __( 'Master 2021', 'twentytwentyone-child' ) );


//* Enqueue custom CSS
function enqueue_custom_styles() {

	// dequeue the Twenty Twenty-one parent style
	wp_dequeue_style( 'twenty-twenty-one-style' );

	// Theme stylesheet
	wp_enqueue_style( 'master-style', get_stylesheet_uri() );
}

add_action( 'wp_enqueue_scripts', 'enqueue_custom_styles', 99 );


// Enqueue Custom JS
function enqueue_custom_script() {

	wp_register_script('jquery-script',get_theme_file_uri(). '/assets/js/jquery-3.7.0.min.js');
	wp_enqueue_script('jquery-script');

	wp_register_script('custom-script',get_theme_file_uri(). '/assets/js/custom.js');
	wp_enqueue_script('custom-script');
}
add_action( 'wp_enqueue_scripts', 'enqueue_custom_script', 99 );


// ACF Save Json //

add_filter('acf/settings/save_json', 'my_acf_json_save_point');

function my_acf_json_save_point( $path ) {

	// update path
	$path = get_stylesheet_directory() . '/acf-json';

	// return
	return $path;
}


// Define Ajax

add_action('wp_head','define_ajaxurl');

function define_ajaxurl() {
	?>
		<script type="text/javascript">
			var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
		</script>
	<?php
}

add_editor_style( 'css/main.css');