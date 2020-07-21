<?php if ( __FILE__ == $_SERVER['SCRIPT_FILENAME'] ) { exit; }

add_action( 'admin_menu', 'wp_plus_add_admin_menu' );
add_action( 'admin_init', 'wp_plus_settings_init' );

function wp_plus_add_admin_menu(  ) { 

	add_submenu_page( 
		'options-general.php', 
		__( 'WP PLUS SETTINGS', 'wp_plus-admin-theme' ), 
		__( 'Admin Template', 'wp_plus-admin-theme' ), 
		'manage_options', 
		'wpplus', 
		'wp_plus_options_page' 
	);

}

function wp_plus_settings_init(  ) { 

	register_setting( 'wp_plusGeneralSettings', 'wp_plus_settings' );

	add_settings_section(
		'wp_plus_wp_plusGeneralSettings_section', 
		__( '', 'wp_plus-admin-theme' ), 
		'wp_plusGeneralCallback', 
		'wp_plusGeneralSettings'
	);

	add_settings_field( 
		'wp_plus_chk_abLinks', 
		__( 'Show <strong>Adminbar</strong> links?', 'wp_plus-admin-theme' ), 
		'wp_plus_chk_abLinks_render', 
		'wp_plusGeneralSettings', 
		'wp_plus_wp_plusGeneralSettings_section' 
	);



	add_settings_field( 
		'wp_plus_chk_dashBoxes', 
		__( 'Show all other <strong>Dashboard metaboxes</strong>?', 'wp_plus-admin-theme' ), 
		'wp_plus_chk_dashBoxes_render', 
		'wp_plusGeneralSettings', 
		'wp_plus_wp_plusGeneralSettings_section' 
	);


	add_settings_field( 
		'wp_plus_chk_showNag', 
		__( 'Show <strong>WordPress Update</strong> notices.', 'wp_plus-admin-theme' ), 
		'wp_plus_chk_showNag_render', 
		'wp_plusGeneralSettings', 
		'wp_plus_wp_plusGeneralSettings_section' 
	);


	// Custom Logo

	register_setting( 'wp_plusLogoSettings', 'wp_plusLogoSettings' );

	add_settings_section(
		'wp_plus_wp_plusLogoSettings_section', 
		__( '', 'wp_plus-admin-theme' ), 
		'wp_plusLogoCallback', 
		'wp_plusLogoSettings'
	);

	add_settings_field( 
		'wp_plus_new_logo', 
		__( 'Custom logo', 'wp_plus-admin-theme' ), 
		'wp_plus_new_logo_render', 
		'wp_plusLogoSettings', 
		'wp_plus_wp_plusLogoSettings_section' 
	);


	add_settings_field( 
		'wp_plus_new_logo_sqr', 
		__( 'Custom Icon (square)', 'wp_plus-admin-theme' ), 
		'wp_plus_new_logo_sqr_render', 
		'wp_plusLogoSettings', 
		'wp_plus_wp_plusLogoSettings_section' 
	);
	
	add_settings_field( 
		'wp_plus_new_back', 
		__( 'Admin page background', 'wp_plus-admin-theme' ), 
		'wp_plus_new_back_render', 
		'wp_plusLogoSettings', 
		'wp_plus_wp_plusLogoSettings_section' 
	);
	
	add_settings_field( 
		'wp_plus_new_admin_back', 
		__( 'Login page background', 'wp_plus-admin-theme' ), 
		'wp_plus_new_admin_back_render', 
		'wp_plusLogoSettings', 
		'wp_plus_wp_plusLogoSettings_section' 
	);
	
	add_settings_field( 
		'wp_plus_new_login_text', 
		__( 'Custom Login Intro', 'wp_plus-admin-theme' ), 
		'wp_plus_new_login_text_render', 
		'wp_plusLogoSettings', 
		'wp_plus_wp_plusLogoSettings_section' 
	);
	
	add_settings_field( 
		'wp_plus_new_login_sub_text', 
		__( 'Custom Login Sub Intro', 'wp_plus-admin-theme' ), 
		'wp_plus_new_login_sub_text_render', 
		'wp_plusLogoSettings', 
		'wp_plus_wp_plusLogoSettings_section' 
	);
	
	add_settings_field( 
		'wp_plus_login_logo', 
		__( 'Hide logo on login page?', 'wp_plus-admin-theme' ), 
		'wp_plus_login_logo_render', 
		'wp_plusLogoSettings', 
		'wp_plus_wp_plusLogoSettings_section' 
	);
	
	add_settings_field( 
		'wp_plus_login_text', 
		__( 'Hide custom login text and sub text on login page?', 'wp_plus-admin-theme' ), 
		'wp_plus_login_text_render', 
		'wp_plusLogoSettings', 
		'wp_plus_wp_plusLogoSettings_section' 
	);
	


	// Colour Scheme

	register_setting( 'wp_plusColourSettings', 'wp_plusColourSettings' );

	add_settings_section(
		'wp_plus_wp_plusColourSettings_section', 
		__( '', 'wp_plus-admin-theme' ), 
		'wp_plusColourCallback', 
		'wp_plusColourSettings'
	);

	add_settings_field( 
		'wp_plus_primary_colour', 
		__( 'Primary Color', 'wp_plus-admin-theme' ), 
		'wp_plus_primary_colour_render', 
		'wp_plusColourSettings', 
		'wp_plus_wp_plusColourSettings_section' 
	);

	add_settings_field( 
		'wp_plus_secondary_colour', 
		__( 'Link Text Color', 'wp_plus-admin-theme' ), 
		'wp_plus_secondary_colour_render', 
		'wp_plusColourSettings', 
		'wp_plus_wp_plusColourSettings_section' 
	);
	
	add_settings_field( 
		'wp_plus_menu_colour', 
		__( 'Menu Link Text Color', 'wp_plus-admin-theme' ), 
		'wp_plus_menu_colour_render', 
		'wp_plusColourSettings', 
		'wp_plus_wp_plusColourSettings_section' 
	);

	add_settings_field( 
		'wp_plus_menu_back_colour', 
		__( 'Menu Background Color', 'wp_plus-admin-theme' ), 
		'wp_plus_menu_back_colour_render', 
		'wp_plusColourSettings', 
		'wp_plus_wp_plusColourSettings_section' 
	);
	
	add_settings_field( 
		'wp_plus_back_colour', 
		__( 'Background Color', 'wp_plus-admin-theme' ), 
		'wp_plus_back_colour_render', 
		'wp_plusColourSettings', 
		'wp_plus_wp_plusColourSettings_section' 
	);

}


function wp_plus_chk_abLinks_render(  ) { 

	$options = get_option( 'wp_plus_settings' );
	if ( isset ( $options['wp_plus_chk_abLinks'] ) ) { $wp_plusABLinks = $options['wp_plus_chk_abLinks'];
	} else { 
		$wp_plusABLinks = 0; 
	};
	?>
	<input type='checkbox' name='wp_plus_settings[wp_plus_chk_abLinks]' <?php checked( $wp_plusABLinks, 1 ); ?> value='1'>
	<?php

}


function wp_plus_chk_pluginSupport_render(  ) { 

	$options = get_option( 'wp_plus_settings' );
	if ( isset ( $options['wp_plus_chk_pluginSupport'] ) ) { $wp_plusPluginSupport = $options['wp_plus_chk_pluginSupport']; 
	} else { 
		$wp_plusPluginSupport = 0; 
	};
	?>
	<input type='checkbox' name='wp_plus_settings[wp_plus_chk_pluginSupport]' <?php checked( $wp_plusPluginSupport, 1 ); ?> value='1'>
	<?php

}

function wp_plus_chk_dashBoxes_render(  ) { 

	$options = get_option( 'wp_plus_settings' );
	if ( isset ( $options['wp_plus_chk_dashBoxes'] ) ) { $wp_plusDashBoxes = $options['wp_plus_chk_dashBoxes']; 
	} else { 
		$wp_plusDashBoxes = 0; 
	};
	?>
	<input type='checkbox' name='wp_plus_settings[wp_plus_chk_dashBoxes]' <?php checked( $wp_plusDashBoxes, 1 ); ?> value='1'>
	<?php

}


function wp_plus_login_text_render(  ) { 

	$options = get_option( 'wp_plusLogoSettings' );
	if ( isset ( $options['wp_plus_login_text'] ) ) { $wp_plusHideLoginText = $options['wp_plus_login_text']; 
	} else { 
		$wp_plusHideLoginText = 0; 
	};
	?>
		<b>Hide custom text and sub text on login page?      </b> <input type='checkbox' name='wp_plusLogoSettings[wp_plus_login_text]' <?php checked( $wp_plusHideLoginText, 1 ); ?> value='1'>
	
	<?php

}

function wp_plus_login_logo_render(  ) { 

	$options = get_option( 'wp_plusLogoSettings' );
	if ( isset ( $options['wp_plus_login_logo'] ) ) { $wp_plusShowLoginLogo = $options['wp_plus_login_logo']; 
	} else { 
		$wp_plusShowLoginLogo = 0; 
	};
	?><br>
	<b>Hide logo on login page?	     </b> <input type='checkbox' name='wp_plusLogoSettings[wp_plus_login_logo]' <?php checked( $wp_plusShowLoginLogo, 1 ); ?> value='1'>
	
	<?php

}

function wp_plus_new_login_text_render(  ) { 

$options = get_option( 'wp_plusLogoSettings' );
	if ( isset ( $options['wp_plus_new_login_text'] ) ) { 
		$wp_plus_new_login_text = $options['wp_plus_new_login_text']; 
	} else { 
		$wp_plus_new_login_text = 'Hello! let\'s get started'; 
	};
	?>
<center><b>Custom Login Intro</b><br><br>
	<input type="text" name="wp_plusLogoSettings[wp_plus_new_login_text]" value="<?php echo $wp_plus_new_login_text; ?>"></center>
	
	<?php
}


function wp_plus_new_login_sub_text_render(  ) { 

$options = get_option( 'wp_plusLogoSettings' );
	if ( isset ( $options['wp_plus_new_login_sub_text'] ) ) { 
		$wp_plus_new_login_sub_text = $options['wp_plus_new_login_sub_text']; 
	} else { 
		$wp_plus_new_login_sub_text = 'Enter your details below.'; 
	};
	?>
<center><b>Custom Login Sub Intro</b><br><br>
	<input type="text" name="wp_plusLogoSettings[wp_plus_new_login_sub_text]" value="<?php echo $wp_plus_new_login_sub_text; ?>"></center>
	
	<?php
}


function wp_plus_chk_showNag_render(  ) { 

	$options = get_option( 'wp_plus_settings' );
	if ( isset ( $options['wp_plus_chk_showNag'] ) ) { $wp_plusShowNag = $options['wp_plus_chk_showNag']; 
	} else { 
		$wp_plusShowNag = 0; 
	};
	?>
	<input type='checkbox' name='wp_plus_settings[wp_plus_chk_showNag]' <?php checked( $wp_plusShowNag, 1 ); ?> value='1'>
	<?php

}


function wp_plus_new_back_render(  ) { 

	$options = get_option( 'wp_plusLogoSettings' );
	if ( isset ( $options['wp_plus_new_back'] ) ) { 
		$wp_plusNewBack = $options['wp_plus_new_back']; 
	} else { 
		$wp_plusNewBack = 'https://kiuloper.com/wp_plus/images/background.png'; 
	};
	?>
<center><b>Admin page background</b><br><br>
	<input class="wp_plusNewBackUrl" id="" type="text" name="wp_plusLogoSettings[wp_plus_new_back]" value="<?php echo $wp_plusNewBack; ?>" style="margin-bottom:10px; clear:right; display: none;">
	<a href="#" class="button wp_plusNewLogoUpload"><?php _e( 'Upload background', 'wp_plus-admin-theme' ); ?></a>
	<a href="#" class="button wp_plusNewLogoClear"><?php _e( 'Remove background', 'wp_plus-admin-theme' ); ?></a><br><br>
	<img class="wp_plusOptionsLogo wp_plus_new_back" src="<?php echo $wp_plusNewBack; ?>" /></center>
	<?php echo wp_get_attachment_url( get_option( 'media_selector_attachment_id' ) ); ?>
	<?php

}

function wp_plus_new_admin_back_render(  ) { 

	$options = get_option( 'wp_plusLogoSettings' );
	if ( isset ( $options['wp_plus_new_admin_back'] ) ) { 
		$wp_plusNewAdminBack = $options['wp_plus_new_admin_back']; 
	} else { 
		$wp_plusNewAdminBack = 'https://kiuloper.com/wp_plus/images/login-back.png'; 
	};
	?>
<center><b>Login page background</b><br><br>
	<input class="wp_plusNewAdminBackUrl" id="" type="text" name="wp_plusLogoSettings[wp_plus_new_admin_back]" value="<?php echo $wp_plusNewAdminBack; ?>" style="margin-bottom:10px; clear:right; display: none;">
	<a href="#" class="button wp_plusNewLogoUpload"><?php _e( 'Upload background', 'wp_plus-admin-theme' ); ?></a>
	<a href="#" class="button wp_plusNewLogoClear"><?php _e( 'Remove background', 'wp_plus-admin-theme' ); ?></a><br><br>
	<img class="wp_plusOptionsLogo wp_plus_new_admin_back" src="<?php echo $wp_plusNewAdminBack; ?>" /></center>
	<?php echo wp_get_attachment_url( get_option( 'media_selector_attachment_id' ) ); ?>
	<?php

}


function wp_plus_new_logo_render(  ) { 

	$options = get_option( 'wp_plusLogoSettings' );
	if ( isset ( $options['wp_plus_new_logo'] ) ) { 
		$wp_plusNewLogo = $options['wp_plus_new_logo']; 
	} else { 
		$wp_plusNewLogo = 'https://kiuloper.com/wp_plus/images/wp-plus-logo.png'; 
	};
	?>
	<input class="wp_plusNewLogoUrl" id="" type="text" name="wp_plusLogoSettings[wp_plus_new_logo]" value="<?php echo $wp_plusNewLogo; ?>" style="margin-bottom:10px; clear:right; display: none;">
	<center><b>Custom logo</b><br><br>optimal size is 190px by 30px<br><br>
	<a href="#" class="button wp_plusNewLogoUpload"><?php _e( 'Upload logo', 'wp_plus-admin-theme' ); ?></a>
	<a href="#" class="button wp_plusNewLogoClear"><?php _e( 'Remove logo', 'wp_plus-admin-theme' ); ?></a><br><br>
	<img class="wp_plusOptionsLogo wp_plus_new_logo" src="<?php echo $wp_plusNewLogo; ?>" /></center>
	<?php echo wp_get_attachment_url( get_option( 'media_selector_attachment_id' ) ); ?>
	<?php

}

function wp_plus_new_logo_sqr_render(  ) { 

	$options = get_option( 'wp_plusLogoSettings' );
	if ( isset ( $options['wp_plus_new_logo_sqr'] ) ) { 
		$wp_plusNewLogoSqr = $options['wp_plus_new_logo_sqr']; 
	} else { 
		$wp_plusNewLogoSqr = 'https://kiuloper.com/wp_plus/images/wp-plus.png'; 
	};
	?>
 <center><b>Custom Icon (square)</b><br><br>
	<input class="wp_plusNewLogoUrl" id="" type="text" name="wp_plusLogoSettings[wp_plus_new_logo_sqr]" value="<?php echo $wp_plusNewLogoSqr; ?>" style="margin-bottom:10px; clear:right; display: none;">
	<a href="#" class="button wp_plusNewLogoUpload"><?php _e( 'Upload logo', 'wp_plus-admin-theme' ); ?></a>
	<a href="#" class="button wp_plusNewLogoClear"><?php _e( 'Remove logo', 'wp_plus-admin-theme' ); ?></a><br><br>
	<img class="wp_plusOptionsLogo wp_plus_new_logo" src="<?php echo $wp_plusNewLogoSqr; ?>" /></center>
	<?php echo wp_get_attachment_url( get_option( 'media_selector_attachment_id' ) ); ?>
	<?php

}

// Colour Pickers

function wp_plus_primary_colour_render() {

	$options = get_option( 'wp_plusColourSettings' );
	if ( isset ( $options['wp_plus_primary_colour'] ) && ( $options['wp_plus_primary_colour'] !== '' ) ) { 
		$wp_plusPrimaryColour = $options['wp_plus_primary_colour']; 
	} else { 
		$wp_plusPrimaryColour = '#464de4'; 
	};
	?>

	<input type="text" class="colourPicker" name="wp_plusColourSettings[wp_plus_primary_colour]" id='colourPicker1' value="<?php echo $wp_plusPrimaryColour; ?>" />

	<?php
}

function wp_plus_secondary_colour_render() {

	$options = get_option( 'wp_plusColourSettings' );
	if ( isset ( $options['wp_plus_secondary_colour'] ) && ( $options['wp_plus_secondary_colour'] !== '' ) ) { 
		$wp_plusSecondaryColour = $options['wp_plus_secondary_colour']; 
	} else { 
		$wp_plusSecondaryColour = '#464de4'; 
	};
	?>

	<input type="text" class="colourPicker" name="wp_plusColourSettings[wp_plus_secondary_colour]" id='colourPicker2' value="<?php echo $wp_plusSecondaryColour; ?>" />

	<?php
}

function wp_plus_menu_colour_render() {

	$options = get_option( 'wp_plusColourSettings' );
	if ( isset ( $options['wp_plus_menu_colour'] ) && ( $options['wp_plus_menu_colour'] !== '' ) ) { 
		$wp_plusMenuColour = $options['wp_plus_menu_colour']; 
	} else { 
		$wp_plusMenuColour = '#464de4'; 
	};
	?>

	<input type="text" class="colourPicker" name="wp_plusColourSettings[wp_plus_menu_colour]" id='colourPicker3' value="<?php echo $wp_plusMenuColour; ?>" />

	<?php
}

function wp_plus_menu_back_colour_render() {

	$options = get_option( 'wp_plusColourSettings' );
	if ( isset ( $options['wp_plus_menu_back_colour'] ) && ( $options['wp_plus_menu_back_colour'] !== '' ) ) { 
		$wp_plusMenuBackColour = $options['wp_plus_menu_back_colour']; 
	} else { 
		$wp_plusMenuBackColour = '#f2f2f9'; 
	};
	?>

	<input type="text" class="colourPicker" name="wp_plusColourSettings[wp_plus_menu_back_colour]" id='colourPicker3' value="<?php echo $wp_plusMenuBackColour; ?>" />

	<?php
}

function wp_plus_back_colour_render() {

	$options = get_option( 'wp_plusColourSettings' );
	if ( isset ( $options['wp_plus_back_colour'] ) && ( $options['wp_plus_back_colour'] !== '' ) ) { 
		$wp_plusBackColour = $options['wp_plus_back_colour']; 
	} else { 
		$wp_plusBackColour = '#eff3f5'; 
	};
	?>

	<input type="text" class="colourPicker" name="wp_plusColourSettings[wp_plus_back_colour]" id='colourPicker4' value="<?php echo $wp_plusBackColour; ?>" />

	<?php
}

function wp_plusGeneralCallback(  ) { 
	echo __( 'General changes to your admin area.', 'wp_plus-admin-theme' );
}

function wp_plusLogoCallback(  ) { 
	echo __( 'Advanced customization for your login and admin area. <style>.form-table th {display:none;} .form-table th{width:100% !important;} input[type=text] {width:100%;} .wp-core-ui .button, .wp-core-ui .button-secondary {padding-bottom: 27px;}</style>', 'wp_plus-admin-theme' );
}

function wp_plusColourCallback(  ) { 
	echo __( 'Color selection for login and admin area. <style>.form-table td {
    width: 140px;
    float: right;text-align:right;</style>', 'wp_plus-admin-theme' );
}


function wp_plus_options_page(  ) { 	?>

<style>
.form-table th {
    width: unset !important;
}
.mini-kiu-wrap {width:100%;max-width:420px;background: #fff;
    margin-top: 50px;
    margin-bottom: 50px;
    border: 1px solid #d5dcec !important;
    padding: 3%;
    border-radius: 10px;text-align:left;}
    </style>
    
    
	<center><div class="mini-kiu-wrap">

    <h2 style="padding: 10px 10px 5px 10px !important;
    line-height: 29px;
    background: #f7f7f7;font-size:20px;text-align:center;font-weight:bold;
    border-radius: 10px;"><?php _e( 'WP PLUS SETTINGS', 'wp_plus-admin-theme' ); ?></h2>
    <?php //settings_errors(); ?>

    <?php $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'generalSettings'; ?>
     
    <h2 class="nav-tab-wrapper">
        <a href="?page=wpplus&tab=1" class="nav-tab <?php echo $active_tab == '1' ? 'nav-tab-active' : ''; ?>"><?php _e( 'STEP 1', 'wp_plus-admin-theme' ); ?></a>
        
        <a href="?page=wpplus&tab=2" class="nav-tab <?php echo $active_tab == '2' ? 'nav-tab-active' : ''; ?>"><?php _e( 'STEP 2', 'wp_plus-admin-theme' ); ?></a>
        
        <a href="?page=wpplus&tab=3" class="nav-tab <?php echo $active_tab == '3' ? 'nav-tab-active' : ''; ?>"><?php _e( 'STEP 3', 'wp_plus-admin-theme' ); ?></a>
    </h2>
    <br>

		<form action='options.php' method='post' class='wp_plusSettingsPage'>
	 
	    <?php 

        if( $active_tab == '1' ) {
          settings_fields( 'wp_plusGeneralSettings' );
          do_settings_sections( 'wp_plusGeneralSettings' );
          submit_button();
        } elseif ( $active_tab == '2' ) {
          settings_fields( 'wp_plusLogoSettings' );
          do_settings_sections( 'wp_plusLogoSettings' );
          submit_button();
        } elseif ( $active_tab == '3' ) {
          settings_fields( 'wp_plusColourSettings' );
          do_settings_sections( 'wp_plusColourSettings' );
					submit_button();
        } else {
          settings_fields( 'wp_plusGeneralSettings' );
          do_settings_sections( 'wp_plusGeneralSettings' );
        	submit_button();
        }
         
        //submit_button();

	    ?>
             
		</form>
	</div></center>

	<?php

}

?>