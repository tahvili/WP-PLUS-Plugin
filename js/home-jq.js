
jQuery(document).ready(function(){

        jQuery("#wpadminbar").wrap("<div class=\'admin_cover\'></div>");
        jQuery("#adminmenuwrap").wrap("<div class=\'admin_menu_cover\'></div>");

jQuery("<script>var str = document.getElementById(\"wp-admin-bar-my-account\").innerHTML; var res = str.replace(\"s=16\", \"s=64\"); document.getElementById(\"wp-admin-bar-my-account\").innerHTML = res;</script>").insertAfter(".admin_cover");

jQuery("<script>var str = document.getElementById(\"wp-admin-bar-my-account\").innerHTML; var res = str.replace(\"s=26\", \"s=64\"); document.getElementById(\"wp-admin-bar-my-account\").innerHTML = res;</script>").insertAfter(".admin_cover");


});




