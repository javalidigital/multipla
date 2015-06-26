// JavaScript Document
jQuery(document).ready(function($) {
	'use strict';
	jQuery(window).load(function() {	
		jQuery('.portfolio_listing[id^="folio-"]').each( function() { 	
			var $div = jQuery(this);
			var key = $div.data('key');
			var settingObj = window['folio_port_'+key];	
			/* Featured portfolio caraousel Starts */
			$("#folio-"+settingObj.id+"").owlCarousel({
				autoPlay: 3000,
				
				items : 5,
				/*itemsDesktop : [1199,4],
				itemsDesktopSmall : [979,3],*/
				 itemsCustom : [
								[0, 1],
								[390, settingObj.width_390 ],
								[768, settingObj.width_768],
								[980, settingObj.width_980],
								[1400, settingObj.width_1400]
								],
				
				mouseDrag  : settingObj.mouse_drag === 'true'? true: false,
				stopOnHover: settingObj.stop_on_hover === 'true'? true: false,
				pagination : false,
				navigation : settingObj.navigation === 'true'? true: false,
				navigationText : ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
			});
			/* Featured portfolio caraousel Ends */
		});
	});
});