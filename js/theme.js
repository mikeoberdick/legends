jQuery(document).ready(function() {

//Automatically generate filler content height to ensure footer is on bottom of the page
	jQuery('#js-heightControl').css('height', jQuery(window).height() - jQuery('html').height() +'px');

//Active Class for header links
	var url = window.location.pathname;
	url = url.substring(0, url.length - 1); //remove the trailing slash
	// Only works if the href value is exactly equal to the page slug
	jQuery('#main-menu li a[href="'+ url +'"]').parent().addClass('active');
});

//Disable the 'products' link in footer menu
jQuery('#menu-footer-menu li a').first().removeAttr("href").css("cursor","default");

jQuery("a:contains('®')").html(function(_, html) {
   return html.replace(/(®)/g, '<sup>®</sup>');
});