<?php if ( __FILE__ == $_SERVER['SCRIPT_FILENAME'] ) { exit; }

//hide core updates notification in the dashboard

$wp_plusOptions = get_option( 'wp_plus_settings' );

if(isset($wp_plusOptions['wp_plus_chk_showNag']) && $wp_plusOptions['wp_plus_chk_showNag'] == 1){

} else {

	function wp_plus_admin_update_nag() {
		if( current_user_can('manage_options') ) {
		} else {
			remove_action( 'admin_notices', 'update_nag', 3 ); //update notice at the top of the screen
			remove_filter( 'update_footer', 'core_update_footer' ); //update notice in the footer
		}
	}
	add_action('admin_menu','wp_plus_admin_update_nag');

}


?>