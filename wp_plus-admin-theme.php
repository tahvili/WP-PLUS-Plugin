<?php
/**
 * Plugin Name: WP Plus Admin Theme
 * Plugin URI: https://kiuloper.com/wp-plus
 * Description: Wordpress Admin Theme, Bored of it? change it!
 * Author: kiuloper
 * Author URI: https://kiuloper.com/
 * Version: 1.0.1
 * Text Domain: wp_plus-admin-theme
 * Domain Path: /lang/
 * License: The Creative Commons Attribution 4.0
 *
 * 2018 wp_plus
 */ 

$wpplusVer = "1.0.1";

include ('scripts.php');
include ('login/wp_plus-login-screen.php');
include ('admin/dashboard.php');
include ('admin/adminBar.php');
include ('admin/options.php');
include ('admin/colour/colourScheme.php');
?>