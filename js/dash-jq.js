jQuery(document).ready(function () {

    jQuery(window).scroll(function () {
        if (jQuery(this).scrollTop() > 100) {
            jQuery(".scrollup").fadeIn();
        } else {
            jQuery(".scrollup").fadeOut();
        }
    });

   jQuery(".scrollup").click(function () {
        jQuery("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

});

jQuery(document).ready(function(){
   if (jQuery("#dashboard-widgets-wrap div").hasClass("postbox-container")) {
   }
   else {
       jQuery(".wrap").wrap("<div class=\'k-all-wrap\'></div>");
   }
});


jQuery(document).ready(function(){

jQuery( "li" ).remove( ".wp-menu-separator" );



jQuery( "#screen-options-wrap" ).removeClass( "hidden" );
jQuery( "#contextual-help-wrap" ).removeClass( "hidden" );


if(jQuery(window).width() >= 782){
 jQuery( "li" ).removeClass( "wp-not-current-submenu" ).addClass( "wp-has-current-submenu" );
}

if(jQuery(window).width() <= 782){
 jQuery( "li" ).removeClass( "menu-icon-dashboard" );
  jQuery( "li" ).removeClass( "menu-top-last" ).addClass( "menu-icon-post" );
    jQuery( "li" ).removeClass( "wp-first-item" ).addClass( "open-if-no-js" );
}
 
    
        jQuery("#wpadminbar").wrap("<div class=\'admin_cover col-lg-12\'></div>");
        jQuery("#adminmenuwrap").wrap("<div class=\'admin_menu_cover col-lg-12\'></div>");
        
        jQuery("#wpbody").wrap("<div class=\'container-fluid page-body-wrapper\'></div>");
        
        jQuery('body').attr("onload", "kiuloader()");
      
        
        jQuery("<div class=\"k-nav-item k-active dashboard-opener\">DASHBOARD</div>").insertBefore("#menu-dashboard");
        
        jQuery("<div class=\"k-nav-item blogging-opener\">ELEMENTS</div>").insertAfter("#menu-dashboard");
        
        jQuery("<div class=\"k-nav-item design-opener\">DESIGN</div>").insertAfter("#menu-comments");
        
        jQuery("<div class=\"k-nav-item setting-opener\">SETTING</div>").insertAfter("#menu-plugins");
        
        jQuery("<div class=\"k-nav-item other-opener\">OTHERS</div>").insertAfter("#menu-settings");
        
        jQuery("<div class=\"close-opener\"></div>").insertBefore("#collapse-menu");
        
        jQuery("<div id=\'kiuloader\'></div>").insertBefore("#wpwrap");
        
        

var hideElement = jQuery("#screen-options-wrap");
        hideElement.hide();
        
var hideElement = jQuery("#contextual-help-wrap");
        hideElement.hide();

var click1 = jQuery(".dashboard-opener").nextUntil(".blogging-opener");
var click2 = jQuery(".blogging-opener").nextUntil(".design-opener");
var click3 = jQuery(".design-opener").nextUntil(".setting-opener");
var click4 = jQuery(".setting-opener").nextUntil(".other-opener");
var click5 = jQuery(".other-opener").nextUntil(".close-opener");


jQuery(click1).wrapAll("<div class=\'menu-sub-box dashboard-menu\'></div>");
jQuery(click2).wrapAll("<div class=\'menu-sub-box blogging-menu\'></div>");
jQuery(click3).wrapAll("<div class=\'menu-sub-box design-menu\'></div>");
jQuery(click4).wrapAll("<div class=\'menu-sub-box setting-menu\'></div>");
jQuery(click5).wrapAll("<div class=\'menu-sub-box other-menu\'></div>");


jQuery("#adminmenu .k-nav-item").each(function(index) {
jQuery(this).next(".menu-sub-box").andSelf().wrapAll("<li class=\'nav-item mega-menu\' />")
	});

                                     

jQuery( "li" ).remove( "#collapse-menu" );



});