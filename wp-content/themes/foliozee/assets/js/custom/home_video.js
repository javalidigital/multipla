// JavaScript Document
jQuery(document).ready(function($) {
	'use strict';
	jQuery(window).load(function() {	
		jQuery(".button_holder a[rel^='prettyPhoto']").each( function() { 	
			var $div = jQuery(this);
			var key = $div.data('key');
			var settingObj = window['folio_video_'+key];	
			$( "#video-"+settingObj.id+"" ).prettyPhoto({
				  social_tools: false,
				  slideshow: 4000, /* false OR interval time in ms */
				  opacity: 0.80, /* Value between 0 and 1 */
				  show_title: true, /* true/false */
				  allow_resize: true, /* Resize the photos bigger than viewport. true/false */
			});		
		});
	});
});