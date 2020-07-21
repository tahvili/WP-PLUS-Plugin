
<?php if ( __FILE__ == $_SERVER['SCRIPT_FILENAME'] ) { exit; }

if ( is_admin() ) {
	add_action('admin_head', 'colourSchemeCSS');
} else {
	add_action('wp_before_admin_bar_render', 'colourSchemeCSS');
}

add_action('login_head', 'colourSchemeCSS');


function colourSchemeCSS() {


include('bright.php');


/// Define custom colours

$wp_plusColourSettings = get_option( 'wp_plusColourSettings' );
$wp_plusPrimary = $wp_plusColourSettings['wp_plus_primary_colour'];
$wp_plusSecondary = $wp_plusColourSettings['wp_plus_secondary_colour'];
$wp_plusMenuBack = $wp_plusColourSettings['wp_plus_menu_back_colour'];
$wp_plusMenuColour = $wp_plusColourSettings['wp_plus_menu_colour'];
$wp_plusBack = $wp_plusColourSettings['wp_plus_back_colour'];

// Check darkness of custom colours

if ( $wp_plusMenuColour ) {
  $menulink = $wp_plusMenuColour;
} else {
  $menulink = "#464de4";
}

if ( $wp_plusBack ) {
  $back = $wp_plusBack;
} else {
  $back = "#eff3f5";
}


if ( $wp_plusPrimary ) {
  $pri = $wp_plusPrimary;
} else {
  $pri = "#464de4";
  $priNew = $pri;
}

if ( $wp_plusSecondary ) {
  $sec = $wp_plusSecondary;
} else {
  $sec = "#464de4";
  $secNew = $sec;
}

if ( $wp_plusMenuBack ) {
  $menu = $wp_plusMenuBack;
} else {
  $menu = "#f2f2f9";
  $menuNew = $menu;
}





$pri_sec = bright( $pri, 60);
$pri_third = bright( $pri, -40);
$pri_fourth = bright( $menu, -7);

// LessPHP

require "lessc.inc.php";
$less = new lessc;
$less->setFormatter("compressed");

$less->setVariables(array(

  "menulink"  => $menulink,
  "pri_sec"      => $pri_sec,
  "pri_third"      => $pri_third,
  "pri_fourth"   => $pri_fourth,
  "pri"       => $pri,
  "back"      => $back,
  "sec"       => $sec,
  "menu"      => $menu
));

echo '<style type="text/css" media="screen">';
echo $less->compile('

::-moz-selection{background:transparent;color:@menulink;}
::selection{background:transparent;color:@menulink;}

::-webkit-scrollbar{height:6px;width:6px;background:#eff3f5;}
::-webkit-scrollbar-thumb{background:@pri;-moz-border-radius:10px;border-radius:10px;}

body.wp-admin {
    background-color: @back !important;
}
.wp-admin .page-body-wrapper {
    min-height: calc(100vh - 70px);
    background: transparent !important;
    padding-left: 0;
    padding-right: 0;
}

.page-body-wrapper {
    min-height: calc(100vh - 70px);
    background: @back;
    padding-left: 0;
    padding-right: 0;
}




#kiuloader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 150px;
  height: 150px;
  margin: -75px 0 0 -75px;
  border: 5px solid #e9eef0;
  border-radius: 50%;
  border-top: 5px solid @pri;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

.auth.theme-two .auto-form-wrapper form .form-group .submit-btn {
    background: @pri;border:0px solid @pri;
}

.wp-submenu li a:hover {background:@pri_fourth !important;}
.wp-menu-name:hover {background:@pri_fourth !important;}
    
.wrap .button:hover {
    background: @pri_third !important;
}

.k-active {background: linear-gradient(30deg, @pri, @pri_sec);
    color: #fff;}
    
.k-active:hover {background: linear-gradient(30deg, @pri, @pri_sec);
    color: #fff !important;}
    
.scrollup { color: @pri; }
#adminmenu div.wp-menu-image:before { color: @pri;  }
.wp-has-submenu .wp-menu-name{  color: @menulink;  }
.wrap .button {background: @pri !important;}
a:hover {color:@sec !important;text-decoration:none;}

#wpadminbar .ab-top-menu>li.hover>.ab-item,#wpadminbar.nojq .quicklinks .ab-top-menu>li>.ab-item:focus,#wpadminbar:not(.mobile) .ab-top-menu>li:hover>.ab-item,#wpadminbar:not(.mobile) .ab-top-menu>li>.ab-item:focus{color:@menulink !important;}#wpadminbar:not(.mobile)>#wp-toolbar a:focus span.ab-label,#wpadminbar:not(.mobile)>#wp-toolbar li:hover span.ab-label,#wpadminbar>#wp-toolbar li.hover span.ab-label{color:@menulink !important;}

#wpadminbar .quicklinks .ab-sub-wrapper .menupop.hover>a,#wpadminbar .quicklinks .menupop ul li a:focus,#wpadminbar .quicklinks .menupop ul li a:focus strong,#wpadminbar .quicklinks .menupop ul li a:hover,#wpadminbar .quicklinks .menupop ul li a:hover strong,#wpadminbar .quicklinks .menupop.hover ul li a:focus,#wpadminbar .quicklinks .menupop.hover ul li a:hover,#wpadminbar .quicklinks .menupop.hover ul li div[tabindex]:focus,#wpadminbar .quicklinks .menupop.hover ul li div[tabindex]:hover,#wpadminbar li #adminbarsearch.adminbar-focused:before,#wpadminbar li .ab-item:focus .ab-icon:before,#wpadminbar li .ab-item:focus:before,#wpadminbar li a:focus .ab-icon:before,#wpadminbar li.hover .ab-icon:before,#wpadminbar li.hover .ab-item:before,#wpadminbar li:hover #adminbarsearch:before,#wpadminbar li:hover .ab-icon:before,#wpadminbar li:hover .ab-item:before,#wpadminbar.nojs .quicklinks .menupop:hover ul li a:focus,#wpadminbar.nojs .quicklinks .menupop:hover ul li a:hover{color:@menulink !important;}#wpadminbar.mobile .quicklinks .ab-icon:before,#wpadminbar.mobile .quicklinks .ab-item:before{color:@menulink !important;}#wpadminbar.mobile .quicklinks .hover .ab-icon:before,#wpadminbar.mobile .quicklinks .hover .ab-item:before{color:@menulink !important;}


.js .postbox .handlediv:focus .toggle-indicator:before {
    box-shadow: 0 0 0 1px @pri !important;
}


body.wp-core-ui input[type=text]:hover, body.wp-core-ui input[type=text]:target, body.wp-core-ui input[type=text]:target, body.wp-core-ui input[type=text]:focus, body.wp-core-ui input[type=search]:hover, body.wp-core-ui input[type=search]:target, body.wp-core-ui input[type=search]:target, body.wp-core-ui input[type=search]:focus, body.wp-core-ui input[type=tel]:hover, body.wp-core-ui input[type=tel]:target, body.wp-core-ui input[type=tel]:target, body.wp-core-ui input[type=tel]:focus, body.wp-core-ui input[type=time]:hover, body.wp-core-ui input[type=time]:target, body.wp-core-ui input[type=time]:target, body.wp-core-ui input[type=time]:focus, body.wp-core-ui input[type=url]:hover, body.wp-core-ui input[type=url]:target, body.wp-core-ui input[type=url]:target, body.wp-core-ui input[type=url]:focus, body.wp-core-ui input[type=week]:hover, body.wp-core-ui input[type=week]:target, body.wp-core-ui input[type=week]:target, body.wp-core-ui input[type=week]:focus, body.wp-core-ui input[type=password]:hover, body.wp-core-ui input[type=password]:target, body.wp-core-ui input[type=password]:target, body.wp-core-ui input[type=password]:focus, body.wp-core-ui input[type=color]:hover, body.wp-core-ui input[type=color]:target, body.wp-core-ui input[type=color]:target, body.wp-core-ui input[type=color]:focus, body.wp-core-ui input[type=date]:hover, body.wp-core-ui input[type=date]:target, body.wp-core-ui input[type=date]:target, body.wp-core-ui input[type=date]:focus, body.wp-core-ui input[type=datetime]:hover, body.wp-core-ui input[type=datetime]:target, body.wp-core-ui input[type=datetime]:target, body.wp-core-ui input[type=datetime]:focus, body.wp-core-ui input[type=datetime-local]:hover, body.wp-core-ui input[type=datetime-local]:target, body.wp-core-ui input[type=datetime-local]:target, body.wp-core-ui input[type=datetime-local]:focus, body.wp-core-ui input[type=email]:hover, body.wp-core-ui input[type=email]:target, body.wp-core-ui input[type=email]:target, body.wp-core-ui input[type=email]:focus, body.wp-core-ui input[type=month]:hover, body.wp-core-ui input[type=month]:target, body.wp-core-ui input[type=month]:target, body.wp-core-ui input[type=month]:focus, body.wp-core-ui input[type=number]:hover, body.wp-core-ui input[type=number]:target, body.wp-core-ui input[type=number]:target, body.wp-core-ui input[type=number]:focus, body.wp-core-ui select:hover, body.wp-core-ui select:target, body.wp-core-ui select:target, body.wp-core-ui select:focus, body.wp-core-ui textarea:hover, body.wp-core-ui textarea:target, body.wp-core-ui textarea:target, body.wp-core-ui textarea:focus {
    border-color: @pri !important;
}


body.wp-admin .theme-browser .theme.active .theme-name, body.wp-admin .theme-browser .theme.add-new-theme a:hover:after, body.wp-admin .theme-browser .theme.add-new-theme a:focus:after {
    background: @pri !important;
}

body.wp-admin input[type=checkbox]:checked:before {
    color: @pri !important;
}

body.wp-admin .contextual-help-tabs .active {
    border-color: @pri !important;
}

.plugin-update-tr.active td, .plugins .active th.check-column {
    border-left: 4px solid @pri;
}
.theme-actions {background: @pri !important;}

body.wp-admin input[type=radio]:checked:before {
    background: @pri !important;
}

.theme-browser .theme.add-new-theme:hover span:after {
    color: @pri !important;}

.theme-actions .button{background: #fff !important;color:@menulink !important;    font-weight: 200 !important;}

.wp-core-ui .button-primary {
    background: @pri !important;
    border-color: @pri !important;
    box-shadow: 0 0px 0 #006799 !important;
    color: #fff;
    text-decoration: none;
    text-shadow: unset !important;    font-weight: 200 !important;
}
#adminmenu li.current a .awaiting-mod {
    background-color: @pri !important;
    color: #fff;
}

input[type=text]:focus, input[type=search]:focus, input[type=radio]:focus, input[type=tel]:focus, input[type=time]:focus, input[type=url]:focus, input[type=week]:focus, input[type=password]:focus, input[type=checkbox]:focus, input[type=color]:focus, input[type=date]:focus, input[type=datetime]:focus, input[type=datetime-local]:focus, input[type=email]:focus, input[type=month]:focus, input[type=number]:focus, select:focus, textarea:focus {
    border-color: @pri !important;
    box-shadow: 0 0 2px rgba(0, 0, 0,.8) !important;
}
#adminmenu .current div.wp-menu-image:before, #adminmenu .wp-has-current-submenu div.wp-menu-image:before, #adminmenu a.current:hover div.wp-menu-image:before, #adminmenu a.wp-has-current-submenu:hover div.wp-menu-image:before, #adminmenu li.wp-has-current-submenu a:focus div.wp-menu-image:before, #adminmenu li.wp-has-current-submenu.opensub div.wp-menu-image:before, #adminmenu li.wp-has-current-submenu:hover div.wp-menu-image:before {
    color: @pri;
}

#adminmenu li a:focus div.wp-menu-image:before, #adminmenu li.opensub div.wp-menu-image:before, #adminmenu li:hover div.wp-menu-image:before {
    color: @pri;
}
.wp-has-submenu .wp-menu-name{font-weight: 600;
    text-align: left;color: @menulink !important;
    padding-bottom: 15px;padding: 10px 10px !important;
    width:90%;margin-left:5% !important;margin-right:5% !important;margin-top:8% !important;margin-bottom:2px !important;border-bottom:1px solid rgba(213, 220, 236, 0.6);
}
   
    
 .wp-menu-name{font-weight: 600;
    text-align: left;
    color: @menulink;
    padding-bottom: 15px;padding: 10px 10px !important;
    border-bottom: 0px solid rgba(213, 220, 236, 0.6);width:90%;margin-left:5% !important;margin-right:5% !important;margin-top:5% !important;margin-bottom:2px !important;}
    
    
.wp-not-current-submenu .wp-menu-name{
    color: unset;
}
 

#adminmenu {background: transparent;}
.wp-submenu {background: @menu !important;border-radius:10px;}
.wp-submenu:hover {background: @menu !important;border-radius:10px;}

 #adminmenu li.menu-top:hover,#adminmenu li.opensub>a.menu-top,#adminmenu li>a.menu-top:focus{background-color:transparent;}

 .nav-item:hover .k-nav-item {background-color:@menu;}
 .menu-sub-box {background: @menu;}
 .nav-item:hover .k-nav-item:after {color: @menu;}
 #adminmenuback {background: @pri_fourth !important;}
  
');

echo '</style>';

} ?>
