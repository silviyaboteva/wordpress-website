
jQuery(document).ready(function($) {

	"use strict";

	// Homepage Slider
	// Homepage Slider
	$(window).load(function() {
		$('body.home .flexslider').flexslider({
			slideshow: false,
			controlNav: false,
			animation: "slide",
			easing: "swing",
			animationSpeed: 750,
			smoothHeight: false,
			animationLoop: false,
			prevText: '<i class="fa fa-chevron-left"></i>',
			nextText: '<i class="fa fa-chevron-right"></i>'
		});
	});


	// Mobile Menu
	$('#nav').slicknav({
		prependTo: 'body',
		label: '',
		allowParentLinks: 'true',
		closedSymbol: '<i class="fa fa-caret-down"></i>',
		openedSymbol: '<i class="fa fa-caret-up"></i>'
	});



	//Contact form input style 
	$('.wpcf7-form-control').removeClass('wpcf7-form-control').addClass('corporate-portfolio-form-control');
	$('.wpcf7-submit').removeClass('corporate-portfolio-form-control');
});
