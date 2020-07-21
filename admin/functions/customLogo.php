<?php if ( __FILE__ == $_SERVER['SCRIPT_FILENAME'] ) { exit; }

add_action('init', 'clean_output_buffer');
function clean_output_buffer() {
  ob_start();
}

// Custom Logo

$wp_plusLogoSettings = get_option( 'wp_plusLogoSettings' );
$wp_plusNewLogo = $wp_plusLogoSettings['wp_plus_new_logo'];
$wp_plusNewLogoSqr = $wp_plusLogoSettings['wp_plus_new_logo_sqr']; 
$wp_plus_new_back = $wp_plusLogoSettings['wp_plus_new_back'];
$wp_plus_new_admin_back = $wp_plusLogoSettings['wp_plus_new_admin_back'];
$wp_plus_new_login_text = $wp_plusLogoSettings['wp_plus_new_login_text']; 
$wp_plus_new_login_sub_text = $wp_plusLogoSettings['wp_plus_new_login_sub_text']; 
$wp_plus_login_logo = $wp_plusLogoSettings['wp_plus_login_logo']; 
$wp_plus_login_text = $wp_plusLogoSettings['wp_plus_login_text']; 

$GLOBALS['wp_plusNewLogo'] = $wp_plusNewLogo;
$GLOBALS['wp_plusNewLogoSqr'] = $wp_plusNewLogoSqr;
$GLOBALS['wp_plus_back'] = $wp_plus_new_back;
$GLOBALS['wp_plus_login_back'] = $wp_plus_new_admin_back;
$GLOBALS['wp_plus_new_login_text'] = $wp_plus_new_login_text;
$GLOBALS['wp_plus_new_login_sub_text'] = $wp_plus_new_login_sub_text;
$GLOBALS['wp_plus_login_logo'] = $wp_plus_login_logo;
$GLOBALS['wp_plus_login_text'] = $wp_plus_login_text;


	add_action( 'admin_head', 'wp_plus_new_logo_admin', 90); 
	add_action( 'wp_head', 'wp_plus_new_logo_admin', 90); 
	add_action( 'login_head', 'wp_plus_new_logo_login', 90 ); 


// Custom Login


	add_action( 'login_head', 'wp_plus_new_info_login', 90 ); 




// Admin bar
function wp_plus_new_logo_admin() {

	echo "
	
	<link rel='icon' href='" . $GLOBALS['wp_plusNewLogoSqr'] . "'>
	
	<style type='text/css'>
	#wpadminbar #wp-admin-bar-wp-logo>.ab-item .ab-icon:before {
    content: url(" . $GLOBALS['wp_plusNewLogo'] . ") !important;width:185px !important;overflow:hidden;}

    
    body.wp-admin {
    background-image: url(" . $GLOBALS['wp_plus_back'] . ") !important;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: bottom center; 
    background-size: 100%;
}


	</style>
	
	";
	
	if ($GLOBALS['wp_plusNewLogo']=="none") {
	    echo "
	
	<style type='text/css'>
	#wpadminbar #wp-admin-bar-wp-logo>.ab-item .ab-icon {
    width: 0px !important;}
    </style>

	";
	}
}
	 

// Login screen
function wp_plus_new_logo_login() {
    
    echo "
    <style type='text/css'>
    
.page-body-wrapper {
    background-image: url(" . $GLOBALS['wp_plus_login_back']  . ") !important;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center left; 
    background-size: 100%;
}
    </style>
    ";
    
    if($GLOBALS['wp_plus_login_text']=="0") {

        	echo "
	<style type='text/css'>
	.mr-auto {display:block;}
	</style>
	";
    }
    
     if($GLOBALS['wp_plus_login_text']=="1") {
        
        	echo "
	<style type='text/css'>
	.mr-auto {display:none;}
	</style>
	";
    }
    
    
    if($GLOBALS['wp_plus_login_logo']=="1") {
       
        	echo "
	<style type='text/css'>
	#login h1 {
    display: none;
}
	</style>
	";
    }
    
     if($GLOBALS['wp_plus_login_logo']=="0") {
         
        	echo "
	<style type='text/css'>
	#login h1 {
    display: block;
}
	</style>
	";
    }
    
    

	echo "
	<link rel='icon' href='" . $GLOBALS['wp_plusNewLogoSqr'] . "'>
	
	<style type='text/css'>
.login h1 a {
    background-image: url(" . $GLOBALS['wp_plusNewLogoSqr'] . ") !important;
    background-image: none,url(" . $GLOBALS['wp_plusNewLogoSqr'] . ") !important;}
	</style>
	
	<script>
	jQuery(document).ready(function(){
	    
	  jQuery(\"<h3 class='mr-auto'>" . $GLOBALS['wp_plus_new_login_text'] . "</h3><p class='mb-5 mr-auto'>" . $GLOBALS['wp_plus_new_login_sub_text'] . "</p>\").insertBefore(\"#user_login\");
	  
	  jQuery(\"input\").wrap(\"<div class='form-group'></div>\");
        
        
        jQuery(\"input\").wrap(\"<div class='input-group'></div>\");
        
        jQuery(\"<div class='input-group-prepend'><span class='input-group-text'><i class='mdi mdi-account-outline'></i></span></div>\").insertBefore(\"#user_login\");

        jQuery(\"<div class='input-group-prepend'><span class='input-group-text'><i class='mdi mdi-lock-outline'></i></span></div>\").insertBefore(\"#user_pass\");
        
        
        jQuery( \"input\" ).removeClass( \"input\" ).addClass( \"form-control\" );
        
        jQuery(\"#user_login\").attr(\"placeholder\", \"Username or Email Address\");
    
        jQuery(\"#user_pass\").attr(\"placeholder\", \"Password\");
        
        
        jQuery( \"#wp-submit\" ).removeClass( \"button button-primary button-large form-control\" ).addClass( \"btn btn-primary submit-btn\" );
        
         jQuery( \"#rememberme\" ).removeClass( \"form-control\" );
	    
	});
	</script>
	";
}



?>