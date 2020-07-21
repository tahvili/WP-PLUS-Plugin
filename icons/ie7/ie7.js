/* To avoid CSS expressions while still supporting IE 7 and IE 6, use this script */
/* The script tag referencing this file must be placed before the ending body tag. */

/* Use conditional comments in order to target IE 7 and older:
	<!--[if lt IE 8]><!-->
	<script src="ie7/ie7.js"></script>
	<!--<![endif]-->
*/

(function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'wp_plus\'">' + entity + '</span>' + html;
	}
	var icons = {
		'wp_plus-tools': '&#xe909;',
		'wp_plus-comment': '&#xe90a;',
		'wp_plus-import_export': '&#xe90b;',
		'wp_plus-shopping_basket': '&#xe90c;',
		'wp_plus-person_pin': '&#xe90d;',
		'wp_plus-person_add': '&#xe90e;',
		'wp_plus-person': '&#xe90f;',
		'wp_plus-palette': '&#xe910;',
		'wp_plus-photo': '&#xe911;',
		'wp_plus-envelope': '&#xe912;',
		'wp_plus-cubes': '&#xe913;',
		'wp_plus-plug': '&#xe914;',
		'wp_plus-page': '&#xe915;',
		'wp_plus-feather': '&#xe916;',
		'wp_plus-settings': '&#xe917;',
		'wp_plus-wp_plus_full': '&#xe918;',
		'wp_plus-terminal': '&#xe907;',
		'wp_plus-code': '&#xe908;',
		'wp_plus-java': '&#xe901;',
		'wp_plus-javascript': '&#xe902;',
		'wp_plus-jquery': '&#xe903;',
		'wp_plus-mysql': '&#xe904;',
		'wp_plus-php': '&#xe905;',
		'wp_plus-edge': '&#xeadc;',
		'wp_plus-mito': '&#xa001;',
		'wp_plus-wp_plus': '&#xa002;',
		'wp_plus-css': '&#xe900;',
		'wp_plus-html': '&#xeadf;',
		'wp_plus-wordpress': '&#xeab6;',
		'wp_plus-magento': '&#xa003;',
		'wp_plus-pencil': '&#xe906;',
		'wp_plus-apple': '&#xeabf;',
		'wp_plus-windows': '&#xeac3;',
		'wp_plus-chrome': '&#xeae5;',
		'wp_plus-firefox': '&#xeae6;',
		'wp_plus-ie': '&#xeae7;',
		'wp_plus-opera': '&#xeae8;',
		'wp_plus-safari': '&#xeae9;',
		'0': 0
		},
		els = document.getElementsByTagName('*'),
		i, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		c = el.className;
		c = c.match(/wp_plus-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
}());
