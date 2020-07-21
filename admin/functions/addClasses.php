<?php if ( __FILE__ == $_SERVER['SCRIPT_FILENAME'] ) { exit; }

// Add role to body

function wp_plus_admin_body_role($classes) {

	//global $current_user;
	//$userRole = array_shift($current_user->roles);

	$classes .= 'wp_plus wp_plusAdmin';
	return $classes;

}
//add_filter('body_class','wp_plus_admin_body_role');
add_filter('admin_body_class', 'wp_plus_admin_body_role');


function wp_plus_front_body_class( $classes ) {

	
	if ( is_admin_bar_showing() ) {

		//global $current_user;
		//$userRole = array_shift($current_user->roles);
		
    $classes[] = 'wp_plus wp_plusFront';
    return $classes;

  } else {

    $classes[] = ' ';
    return $classes;

  }

}
add_filter('body_class', 'wp_plus_front_body_class');

?>