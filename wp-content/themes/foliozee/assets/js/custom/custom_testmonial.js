// JavaScript Document
jQuery(document).ready(function($) {
	'use strict';
	jQuery(window).load(function() {	
		jQuery('.owl-carousel[id^="test-"]').each( function() { 	
			var $div = jQuery(this);
			var key = $div.data('key');
			var settingObj = window['folio_test_'+key];	
		 $("#test-"+settingObj.id+"").owlCarousel({ 
			  autoPlay: 3000, //Set AutoPlay to 3 seconds
			  items : 1,
			  pagination : true,
			  paginationNumbers: false,
			  stopOnHover: true,
			  navigation: false,
			  transitionStyle : settingObj.transition,
			  itemsDesktop : false,
			  itemsDesktopSmall : false,
			  itemsTablet: false,
			  itemsMobile : false 
			}); 
		});
	});
});