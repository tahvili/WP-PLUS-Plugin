<?php if ( __FILE__ == $_SERVER['SCRIPT_FILENAME'] ) { exit; }

function wp_plus_plugin_widget() {

	$wp_plusOptions = get_option( 'wp_plus_settings' );

	if(isset($wp_plusOptions['wp_plus_chk_pluginSupport']) && $wp_plusOptions['wp_plus_chk_pluginSupport'] == 1){
		$pluginCaps = 'edit_others_pages';
	} else {
		$pluginCaps = 'manage_options';
	}


	if (current_user_can( $pluginCaps )) {

		wp_add_dashboard_widget(
		 'wp_plus-plugin-support',
		 'Plugin Support',
		 'wp_plus_plugin_widget_function'
		);

	}

}

add_action( 'wp_dashboard_setup', 'wp_plus_plugin_widget' );

function wp_plus_plugin_widget_function() {

echo "<p class='about-description'>"; 

	$wp_plusOptions = get_option( 'wp_plus_settings' );
	$wp_plusSettingsLink = 'options-general.php?page=wp_plusSettings';

	if(isset($wp_plusOptions['wp_plus_chk_pluginSupport']) && $wp_plusOptions['wp_plus_chk_pluginSupport'] == 1){
		$visibleText = sprintf( __( '<p>Visible to <a href="%s"><strong>Editors</strong></a></p>', 'wp_plus-admin-theme' ), $wp_plusSettingsLink );
	} else {
		$visibleText = sprintf( __( '<p>Visible to <a href="%s"><strong>Administrators</strong></a></p>', 'wp_plus-admin-theme' ), $wp_plusSettingsLink );
	}

	echo $visibleText;

	echo "<ul>";

	if ( ! function_exists( 'get_plugins' ) ) {
		require_once ABSPATH . 'wp-admin/includes/plugin.php';
	}

	$allPlugins = get_plugins();
	$allPluginsKeys = array_keys($allPlugins);

	$Count = 0;
	foreach ($allPlugins as $pluginItem) {

		$pluginRootFile		= $allPluginsKeys[$Count];
		$pluginTitle			= $pluginItem['Title'];
		$pluginVersion		= $pluginItem['Version'];
		$pluginURI				= $pluginItem['PluginURI'];
		$pluginDomain			= $pluginItem['TextDomain'];
		$pluginStatus			= is_plugin_active($pluginRootFile) ? 'active' : 'inactive';

		if (($pluginStatus == "active") && ($pluginURI)) {
			echo "<li><a href='" . $pluginURI . "' target='_blank'>" . $pluginTitle . "</a></li>";
		}

	$Count++;
	}

	echo "</ul></p>";
}


?>