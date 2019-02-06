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

//Transform all of the ® to be superscript in breadcrumbs
jQuery("a:contains('®')").html(function(_, html) {
   return html.replace(/(®)/g, '<sup>®</sup>');
});

//Disable the 'products' link in breadcrumbs
jQuery('#breadcrumbs a[href$="products/"]').removeAttr("href").css("cursor","default");

//Grab the background color for the product in order to apply to the table header
var color = jQuery('.where-to-buy button').attr("style");
jQuery('#feeding thead').attr("style", color);