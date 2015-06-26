// JavaScript Document

	/* Portfolio Nav javascript */
jQuery(document).ready(function($) {
	'use strict';

	jQuery(window).load(function() {	
		jQuery('.work_listing[id^="portfolio_grid_"]').each( function() { 

			var $div = jQuery(this);
			var key = $div.data('key');
			var settingObj = window['folio_portfolio_grid_'+key];	

		jQuery('.work_nav li a').click(function(){
			jQuery(this).parent('li').siblings().removeClass('current');
			jQuery(this).parent('li').addClass('current');
		});
var viewport_width = viewport();		
if( settingObj.colunms === 'three_columns' ){

		
	var column_width = 390;	
		//var column_width = viewport_width.width - 20;
		//console.log(viewport_width.width);
	
	/* Running Masanory 1st time */
	if(viewport_width.width >= 1200 ){
		console.log(column_width= 390);
		console.log(jQuery('.container').width());
		jQuery('.work_item').width(390);
		if(jQuery('.container').width() < 1170){
			
			column_width= 313;
			jQuery('.work_item').width(313);
		}
	}else if(viewport_width.width >=980 && viewport_width.width <= 1199 ){
		column_width= 313;
		jQuery('.work_item').width(313);
	}else if(viewport_width.width >=768 && viewport_width.width <= 979 ){
		column_width= 240;
		jQuery('.work_item').width(313);
	}else if(viewport_width.width <= 767 ){
		jQuery('.work_item').width('50%');
		column_width= jQuery('.work_item').width();
	}
	else if(viewport_width.width <= 480 ){
		column_width= 240;
		jQuery('.work_item').width(240);
	}

    /* Gallery Isotope Masonary */
    jQuery("#portfolio_grid_"+settingObj.id+"").isotope({
      itemSelector : '.isotope-item',
      masonry: {
        columnWidth: column_width
      },   
      animationEngine : 'jquery'
    });
    
    /**Running masonary everytime window resizes */
    jQuery(window).resize(function(){	
      viewport_width = viewport();
      console.log("viewport_width = "+viewport_width.width);
      if(viewport_width.width >= 1200 ){
        column_width= 390;
		jQuery('.work_item').width(390);
        /*if(jQuery('.container').width() < 1170){
          column_width= 313;
		  jQuery('.work_item').width(313);
        }*/
      }else if(viewport_width.width >=992 && viewport_width.width <= 1199 ){
        column_width= 313;
		jQuery('.work_item').width(313);
      }else if(viewport_width.width >=768 && viewport_width.width <= 991 ){
        column_width= 240;
		jQuery('.work_item').width(240);
      }else if(viewport_width.width <= 767 ){
		column_width= 390;
		jQuery('.work_item').width('100%');
		/*jQuery('.work_item').width('50%');
		column_width= jQuery('.work_item').width();*/
	  }
	  else if(viewport_width.width <= 480 ){
		column_width= 300;
		jQuery('.work_item').width('100%');
	  }
      console.log("column_width = " + column_width);
      
      /* Gallery Isotope Masonary */
      jQuery("#portfolio_grid_"+settingObj.id+"").isotope({
        itemSelector : '.isotope-item',
        masonry: {
          columnWidth: column_width
        }
      });
    });
	
		// filter items when filter link is clicked Masonary isotope
		jQuery("#filters_"+settingObj.filter+" a").click(function(){
			var selector = jQuery(this).attr('data-filter');
			jQuery("#portfolio_grid_"+settingObj.id+"").isotope({ filter: selector });
			return false;
		});

}else if( settingObj.colunms === 'four_columns' ){


/* Four (4) Columns Grid */
	var column_4_width = 292;	
		//var column_width = viewport_width.width - 20;
		//console.log(viewport_width.width);
	
	/* Running Masanory 1st time */
	if(viewport_width.width >= 1200 ){
		jQuery('.work_item_4_col.work_item').width(292);
		if(jQuery('.container').width() < 1170){
			
			column_4_width= 235;
			jQuery('.work_item_4_col.work_item').width(235);
		}
	}else if(viewport_width.width >=980 && viewport_width.width <= 1199 ){
		column_4_width= 235;
		jQuery('.work_item_4_col.work_item').width(235);
	}else if(viewport_width.width >=768 && viewport_width.width <= 979 ){
		column_4_width= 180;
		jQuery('.work_item_4_col.work_item').width(180);
	}else if(viewport_width.width <= 767 ){
		jQuery('.work_item_4_col.work_item').width('50%');
		column_4_width= jQuery('.work_item').width();
	}
	else if(viewport_width.width <= 480 ){
		column_4_width= 240;
		jQuery('.work_item_4_col.work_item').width(240);
	}

    /* Gallery Isotope Masonary */
    jQuery("#portfolio_grid_"+settingObj.id+"").isotope({
      itemSelector : '.isotope-item',
      masonry: {
        columnWidth: column_4_width
      },   
      animationEngine : 'jquery'
    });
    
    /**Running masonary everytime window resizes */
    jQuery(window).resize(function(){	
      viewport_width = viewport();
      console.log("viewport_width = "+viewport_width.width);
      if(viewport_width.width >= 1200 ){
        column_4_width= 292;
		jQuery('.work_item_4_col.work_item').width(292);
        /*if(jQuery('.container').width() < 1170){
          column_width= 313;
		  jQuery('.work_item').width(313);
        }*/
      }else if(viewport_width.width >=992 && viewport_width.width <= 1199 ){
        column_4_width= 235;
		jQuery('.work_item_4_col.work_item').width(235);
      }else if(viewport_width.width >=768 && viewport_width.width <= 991 ){
        column_4_width= 180;
		jQuery('.work_item_4_col.work_item').width(180);
      }else if(viewport_width.width <= 767 ){
		column_4_width= 292;
		jQuery('.work_item_4_col.work_item').width('100%');
		/*jQuery('.work_item').width('50%');
		column_width= jQuery('.work_item').width();*/
	  }
	  else if(viewport_width.width <= 480 ){
		column_4_width= 300;
		jQuery('.work_item_4_col.work_item').width('100%');
	  }
      console.log("column_4_width = " + column_4_width);
      
      /* Gallery Isotope Masonary */
      jQuery("#portfolio_grid_"+settingObj.id+"").isotope({
        itemSelector : '.isotope-item',
        masonry: {
          columnWidth: column_4_width
        }
      });
    });
	
		// filter items when filter link is clicked Masonary isotope
		jQuery("#filters_"+settingObj.filter+" a").click(function(){
			var selector = jQuery(this).attr('data-filter');
			jQuery("#portfolio_grid_"+settingObj.id+"").isotope({ filter: selector });
			return false;
		});

}//endif
		});
	});
});





function viewport(){
	var e = window, a = 'inner';
	if ( !( 'innerWidth' in window ) )
	{
	a = 'client';
	e = document.documentElement || document.body;
	}
	return { width : e[ a+'Width' ] , height : e[ a+'Height' ] };
}