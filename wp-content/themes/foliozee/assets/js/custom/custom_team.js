// JavaScript Document
		  /* Team Slider with Carausel */
jQuery(document).ready(function($) {
	'use strict';

	jQuery(window).load(function() {	
		jQuery('.team_carousel[id^="carousel_"]').each( function() { 
		//alert('ok');	
			var $div = jQuery(this);
			var key = $div.data('key');
			var settingObj = window['folio_carousel_'+key];	

		  $("#carousel_"+settingObj.carouselId+"").flexslider({
			animation: "slide",
			controlNav: false,
			directionNav: settingObj.show_next_prev === 'true'? true : false,
			prevText: '<i class="fa fa-angle-left"></i>',
			nextText: '<i class="fa fa-angle-right"></i>',
			slideshow: true,
			itemWidth: 291,
			itemMargin: 2,
			minItems: 4, // use function to pull in initial value
			maxItems: 4, // use function to pull in initial value
			asNavFor: "#slider_"+settingObj.sliderId+""
		  });
		  
		  $("#slider_"+settingObj.sliderId+"").flexslider({
			animation: "slide",
			controlNav: false,
			directionNav: false,
			animationLoop: false,
			slideshow: false,
			sync: "#carousel_"+settingObj.carouselId+"",
			start: function(slider) {
						// stats_bar animation for team member
						$("#slider_"+settingObj.sliderId+" .flex-active-slide").find('.stats_bar').each(function() {
							var el = $(this);
							var percent = el.data('percent');
							el.animate({width: percent+'%'}, 1000);
						});
					},
			before: function(slider) {
						// stats_bar animation for team member
						$("#slider_"+settingObj.sliderId+" .flex-active-slide").find('.stats_bar').each(function() {
							var el = $(this);
							var percent = el.data('percent');
							el.animate({width: 0}, 0);
						});
					  
					},
			after: function(slider) {
						// stats_bar animation for team member
						$("#slider_"+settingObj.sliderId+" .flex-active-slide").find('.stats_bar').each(function() {
							var el = $(this);
							var percent = el.data('percent');
							el.animate({width: percent+'%'}, 1000);
						});
					}
		  });
		});
	});
});