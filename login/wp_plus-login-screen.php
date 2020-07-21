<?php if ( __FILE__ == $_SERVER['SCRIPT_FILENAME'] ) { exit; }

function wp_plus_admin_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'wp_plus_admin_login_logo_url' );

function wp_plus_admin_login_logo_title() {
    return 'wp_plus';
}
add_filter( 'login_headertitle', 'wp_plus_admin_login_logo_title' ); 


?>