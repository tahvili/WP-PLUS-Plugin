<?php 
if ( __FILE__ == $_SERVER['SCRIPT_FILENAME'] ) { exit; }

/// Global scripts

function wp_plus_global_load_style() {

	if ( is_admin_bar_showing() ) {

		wp_register_style( 'wp_plus-admin-icons', plugins_url( 'wp_plus-admin-theme/icons/style.css' ) );
		wp_enqueue_style( 'wp_plus-admin-icons' );

		wp_register_style( 'wp_plus-adminBar-style', plugins_url( 'wp_plus-admin-theme/css/adminBar.css' ) );
		wp_enqueue_style( 'wp_plus-adminBar-style' );
		
		wp_register_script( 'homejq', plugins_url( '/js/home-jq.js', __FILE__ ) );
	    wp_enqueue_script( 'homejq' );


		wp_register_script( 'calls', plugins_url( '/js/calls.js', __FILE__ ) );
		wp_enqueue_script( 'calls' );

	}

}

add_action( 'wp_head', 'wp_plus_global_load_style', 99 );



/// Admin scripts

function wp_plus_admin_load_style() {

    wp_register_style( 'wp_plus-bootstrap-style', plugins_url( 'wp_plus-admin-theme/css/bootstrap.min.css' ) );
		wp_enqueue_style( 'wp_plus-bootstrap-style' );
		
    wp_register_script( 'dashjq', plugins_url( '/js/dash-jq.js', __FILE__ ) );
	wp_enqueue_script( 'dashjq' );
    
    wp_register_script( 'calls', plugins_url( '/js/calls.js', __FILE__ ) );
	wp_enqueue_script( 'calls' );
		
	wp_register_style( 'wp_plus-admin-style', plugins_url( 'wp_plus-admin-theme/css/wp_plus.css' ) );
	wp_enqueue_style( 'wp_plus-admin-style' );
	
	

	//wp_register_style( 'irisCss', plugins_url( '/css/iris.min.css', __FILE__ ) );
	//wp_enqueue_style( 'irisCss' );

	//wp_enqueue_script("jquery-effects-core");
	//wp_enqueue_script('jquery-ui-core');

	//wp_register_script( 'irisJs', plugins_url( '/js/iris.js', __FILE__ ) );
	//wp_enqueue_script( 'irisJs' );

	wp_enqueue_style( 'wp-color-picker');
	wp_enqueue_script( 'wp-color-picker');


	if(function_exists( 'wp_enqueue_media' )){
    wp_enqueue_media();
	} else {
    wp_enqueue_style('thickbox');
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
	}

}
add_action( 'admin_enqueue_scripts', 'wp_plus_admin_load_style', 99 );


/// Login scripts

function wp_plus_login_load_style() {


    wp_register_style( 'wp_plus-bootstrap-style', plugins_url( 'wp_plus-admin-theme/css/bootstrap.min.css' ) );
		wp_enqueue_style( 'wp_plus-bootstrap-style' );

	wp_register_style( 'wp_plus-admin-icons', plugins_url( 'wp_plus-admin-theme/icons/style.css' ) );
	wp_enqueue_style( 'wp_plus-admin-icons' );

	wp_register_style( 'wp_plus-login-style', plugins_url( 'wp_plus-admin-theme/css/login.css' ) );
	wp_enqueue_style( 'wp_plus-login-style' );
	
	wp_register_script( 'calls', plugins_url( '/js/query.min.js', __FILE__ ) );
	wp_enqueue_script( 'calls' );
    
    
	wp_register_script( 'login', plugins_url( '/js/login.js', __FILE__ ) );
	wp_enqueue_script( 'login' );
    
}
add_action( 'login_enqueue_scripts', 'wp_plus_login_load_style' );


/// i18n

function wp_plus_i18n_setup() {
  $locale = apply_filters( 'plugin_locale', get_locale(), 'wp_plus-admin-theme' );
  load_textdomain( 'wp_plus-admin-theme', WP_LANG_DIR . "/wp_plus-admin-theme-$locale.mo" );
	load_plugin_textdomain( 'wp_plus-admin-theme', false, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );
}
add_action( 'plugins_loaded', 'wp_plus_i18n_setup' );

?>
