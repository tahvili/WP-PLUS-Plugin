<?php if ( __FILE__ == $_SERVER['SCRIPT_FILENAME'] ) { exit; }

// Custom Footer

$wp_plusOptions = get_option( 'wp_plus_settings' );


	function wp_plus_admin_footer_admin () {
		echo '<a href="https://kiuloper.com/" class="DeveloperLink" target="_blank">kiuloper</a> | everything a website needs
	
	 <div class="scrollup"></div>
		
		<script>
var kiuloadercode;

function kiuloader() {
    kiuloadercode = setTimeout(kiushowpage, 000);
}

function kiushowpage() {
  document.getElementById("kiuloader").style.display = "none";
  document.getElementById("wpwrap").style.display = "block";
}

	
		var str = document.getElementById("wp-admin-bar-my-account").innerHTML; 
    var res = str.replace("s=16", "s=64");
    document.getElementById("wp-admin-bar-my-account").innerHTML = res;
    document.getElementById("menu-dashboard").classList.add("wp-has-current-submenu");
    
    var str = document.getElementById("wp-admin-bar-my-account").innerHTML; 
    var res = str.replace("s=26", "s=64");
    document.getElementById("wp-admin-bar-my-account").innerHTML = res;
    document.getElementById("menu-dashboard").classList.add("wp-has-current-submenu");
    
    
		</script>
		
		

';
	}
	add_filter('admin_footer_text', 'wp_plus_admin_footer_admin');




?>