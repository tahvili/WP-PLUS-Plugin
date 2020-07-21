<?php if ( __FILE__ == $_SERVER['SCRIPT_FILENAME'] ) { exit; }

// Add Welcome Widget

function wp_plus_welcome_widget() {
	
	$wp_plusName = get_bloginfo('name');

	wp_add_dashboard_widget(
                 'welcome-to-wp_plus',										// Widget slug.
                 $wp_plusName,        										// Title.
                 'wp_plus_welcome_widget_function' // Display function.
        );
}
add_action( 'wp_dashboard_setup', 'wp_plus_welcome_widget' );

// Widget Content

function wp_plus_welcome_widget_function() {
	
	global $wp_plusVer;
	$wordpressVer = get_bloginfo('version');
	$wp_plusName = get_bloginfo('name');
	$wp_plusUrl = get_bloginfo('url');
	$themeInfo = wp_get_theme();

	// Memory and server stats

	$memLimit = (int) ini_get('memory_limit');
	$memUsage= function_exists('memory_get_peak_usage') ? round(memory_get_peak_usage(TRUE) / 1024 / 1024, 2) : 0;			
	if ( !empty($memUsage) && !empty($memLimit) ) {
		$memPercent = round ($memUsage / $memLimit * 100, 0);
	}		

	$server_ip_address = (!empty($_SERVER[ 'SERVER_ADDR' ]) ? $_SERVER[ 'SERVER_ADDR' ] : "");
	if ($server_ip_address == "") { // Added for IP Address in IIS
		$server_ip_address = (!empty($_SERVER[ 'LOCAL_ADDR' ]) ? $_SERVER[ 'LOCAL_ADDR' ] : "");
	}
	$hostName = gethostname();
	$phpVersion = PHP_VERSION;
	$osBits = (PHP_INT_SIZE * 8);

	
	echo "	
	<p class='about-description'>
		<ul>
			<li><i class='wp_plus-wordpress'></i><strong>" . __( 'WordPress', 'wp_plus-admin-theme' ) . "</strong><br/>" . $wordpressVer . "</li>
			<li><i class='wp_plus-wp_plus'></i><strong>" . __( 'wp_plus', 'wp_plus-admin-theme' ) . "</strong><br/>" . $wp_plusVer . "</li>
			<li><i class='wp_plus-palette'></i><strong>" . $themeInfo->get( 'Name' ) . "</strong><br/>" . $themeInfo->get( 'Version' ) . "</li>
			<li><i class='wp_plus-terminal'></i><strong>" . __( 'Server IP', 'wp_plus-admin-theme' ) . "</strong><br/>" . $server_ip_address . "</li>
			<li><i class='wp_plus-php'></i><strong>" . __( 'PHP', 'wp_plus-admin-theme' ) . "</strong><br/>" . $phpVersion . "</li>
			<li><i class='wp_plus-cubes'></i><strong>" . __( 'Memory Usage', 'wp_plus-admin-theme' ) . "</strong><br/>" . $memUsage . " / " . $memLimit . "MB (" . $memPercent . "%)</li>
		</ul>
	</p>
	";
}
 ?>