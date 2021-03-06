<?php if ( __FILE__ == $_SERVER['SCRIPT_FILENAME'] ) { exit; }

// Admin Bar links

$wp_plusOptions = get_option( 'wp_plus_settings' );

if(isset($wp_plusOptions['wp_plus_chk_abLinks']) && $wp_plusOptions['wp_plus_chk_abLinks'] == 1){

} else {

    function wp_plus_admin_bar_links() {
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu('updates');
        $wp_admin_bar->remove_menu('comments');
        $wp_admin_bar->remove_menu('new-content');
        $wp_admin_bar->remove_menu('vc_inline-admin-bar-link');
        $wp_admin_bar->remove_menu('revslider');
        $wp_admin_bar->remove_menu('customize');
        $wp_admin_bar->remove_menu('themes');
        $wp_admin_bar->remove_menu('widgets');
        $wp_admin_bar->remove_menu('menus');
        $wp_admin_bar->remove_menu('wpseo-menu');
        $wp_admin_bar->remove_menu('ngg-menu');
        $wp_admin_bar->remove_menu('w3tc');
        $wp_admin_bar->remove_menu('all-in-one-seo-pack');
        $wp_admin_bar->remove_menu('updraft_admin_node');
        $wp_admin_bar->remove_menu('customer-area');
        $wp_admin_bar->remove_menu('itsec_admin_bar_menu');
        $wp_admin_bar->remove_menu('maintenance_options');
        $wp_admin_bar->remove_menu('tribe-events');
        $wp_admin_bar->remove_menu('analytify');    
        $wp_admin_bar->remove_menu('cxssh-main-menu');
    }
    add_action( 'wp_before_admin_bar_render', 'wp_plus_admin_bar_links', 999 );

}

// Remove nodes

add_action( 'admin_bar_menu', 'wp_plus_remove_wp_logo_nodes', 999 );

function wp_plus_remove_wp_logo_nodes() 
{
    global $wp_admin_bar;   
    $wp_admin_bar->remove_node( 'about' );
    $wp_admin_bar->remove_node( 'wporg' );
    $wp_admin_bar->remove_node( 'documentation' );
    $wp_admin_bar->remove_node( 'support-forums' );
    $wp_admin_bar->remove_node( 'feedback' );
}

// Add wp_plus links

add_action('admin_bar_menu', 'wp_plus_wp_logo_links', 100);
function wp_plus_wp_logo_links($admin_bar){

    $admin_bar->add_menu( array(
        'id'    => 'wpLessons',
        'parent'=> 'wp-logo',
        'title' => __( 'WordPress Lessons', 'wp_plus-admin-theme' ),
        'href'  => 'https://codex.wordpress.org/WordPress_Lessons',
        'meta'  => array(
            'title' => __(''),          
            'class' => __(''), 
            'target' => __('_blank'),                        
        ),
    ));

    $admin_bar->add_menu( array(
        'id'    => 'wpGuide',
        'parent'=> 'wp-logo',
        'title' => __( 'WordPress User Guide', 'wp_plus-admin-theme' ),
        'href'  => 'http://easywpguide.com/wordpress-manual/',
        'meta'  => array(
            'title' => __(''),          
            'class' => __(''),            
            'target' => __('_blank'),                        
        ),
    ));

    $admin_bar->add_menu( array(
        'id'    => 'mitoSupport',
        'parent'=> 'wp-logo-external',
        'title' => __( 'WP Plus Support', 'wp_plus-admin-theme' ),
        'href'  => 'https://kiuloper.com/wp-plus',
        'meta'  => array(
            'title' => __(''),          
            'class' => __(''),            
            'target' => __('_blank'),                        
        ),
    ));

}

?>