<?php
	$absolute_path = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
 	$wp_load = $absolute_path[0] . 'wp-load.php';
 	require_once($wp_load);

  /**
  Do stuff like connect to WP database and grab user set values
  */

	header("Content-type: text/css; charset: UTF-8");
  	header('Cache-control: must-revalidate');
global $fdata;
?>

/**       1- General                                                   **/
body {
    font-family: <?php echo $fdata['primary_font']==="false"?$fdata['primary_font']['font-family']:"'".$fdata['primary_font']['font-family']."'".', Arial, Helvetica, sans-serif';?>;
	<?php
    if($fdata['is_background_pattern']==true){
    ?>	
        background: url('<?php echo $fdata['background_pattern'];?>') repeat center center;
    <?php
    }
	if($fdata['is_background_color']==true){
	?>	
        background-color: <?php echo $fdata['background_color'];?>;
    <?php
    }
    ?>
}
body #sb-site{
	<?php
    if($fdata['is_background_pattern']==true){
    ?>	
        background: url('<?php echo $fdata['background_pattern'];?>') repeat center center;
    <?php
    }
	if($fdata['is_background_color']==true){
	?>	
        background-color: <?php echo $fdata['background_color'];?>;
    <?php
    }
    ?>
}
input, button, select, textarea{
	font-family: <?php echo $fdata['primary_font']==="false"?$fdata['primary_font']['font-family']:"'".$fdata['primary_font']['font-family']."'".', Arial, Helvetica, sans-serif';?>
}

h1, h2, h3, h4, h5, h6{
	font-family: <?php echo $fdata['secondary_font']==="false"?$fdata['secondary_font']['font-family']:"'".$fdata['secondary_font']['font-family']."'".', Arial, Helvetica, sans-serif';?>;
}
textarea, input[type="text"], input[type="password"], input[type="datetime"], input[type="datetime-local"], input[type="date"], input[type="month"], input[type="time"], input[type="week"], input[type="number"], input[type="email"], input[type="url"], input[type="search"], input[type="tel"], input[type="color"], .uneditable-input{
	font-family: <?php echo $fdata['primary_font']==="false"?$fdata['primary_font']['font-family']:"'".$fdata['primary_font']['font-family']."'".', Arial, Helvetica, sans-serif';?>;
}


/* preloaders starts */
#qLpercentage {
	font-size: <?php echo $fdata['fontsize_preloader'];?>px !important;
}
/* preloaders ends */

/********************* Global Elements Css ends ******************/
/*******************************************************************/
/* Curve ends */

	/* .zee_curve_container blockquote starts */
	blockquote.home_quote{
		font-family: <?php echo $fdata['secondary_font']==="false"?$fdata['secondary_font']['font-family']:"'".$fdata['secondary_font']['font-family']."'".', Arial, Helvetica, sans-serif';?>
	}
	/* .zee_curve_container blockquote ends */
			.testi_holder .testi_single .testi_text h3{
				font-family: <?php echo $fdata['primary_font']==="false"?$fdata['primary_font']['font-family']:"'".$fdata['primary_font']['font-family']."'".', Arial, Helvetica, sans-serif';?>;
			}
	/**		2.3- Statistics		**/
	
/**       3- Navigation Primary (Sticky Navigation)                   **/
/* menu-bar starts */

.menu-bar{
	background-color: rgba(<?php echo Redux_Helpers::hex2rgba($fdata['main_nav_background']);?>, <?php echo $fdata['main_nav_bk_opacity'];?>);
}
/* menu-bar starts from */

.menu-bar .logo{
	margin-top: <?php echo $fdata['margin_top_main_logo'].'px';?>;
}
		.menu-bar .main-nav .back_top a:hover{
			color: rgba(<?php echo Redux_Helpers::hex2rgba($fdata['main_menu_typo']['color']);?>, 1);
		}
.menu-bar .main-nav ul li a{
	color: rgba(<?php echo Redux_Helpers::hex2rgba($fdata['main_menu_typo']['color']);?>, 0.5);
		font-size: <?php echo $fdata['main_menu_typo']['font-size'];?>;
      <?php
	  if(isset($fdata['main_menu_typo']['font-style'])){
		?>
        font-style: <?php echo ($fdata['main_menu_typo']['font-style']!='')?$fdata['main_menu_typo']['font-style']:'normal';?>;
        font-weight: <?php echo $fdata['main_menu_typo']['font-weight']?>;
      <?php
	  }?>
		line-height: <?php echo $fdata['main_menu_typo']['line-height']?>;
}

	/* menu-bar Dropdown Starts */
	.menu-bar .main-nav  ul > li > ul {
	    background-color: rgba(<?php echo Redux_Helpers::hex2rgba($fdata['main_nav_background']);?>, <?php echo $fdata['main_nav_bk_opacity'];?>);
    }
	.menu-bar .main-nav  ul ul a:hover {
	  	color: <?php echo $fdata['main_menu_typo']['color'];?>;
	}
	/* menu-bar Dropdown Ends */
	
/* menu-bar ends */

/**       4- Header Navigations							          	  **/
/* header_nav_holder starts */

	/* header_toggle_menu */
		.header_toggle_menu .menu_small_btn{
			color: <?php echo $fdata['header_menu_typo']['color'];?>;
		}
/**       	4.1- Header Navigation 1							          **/
	/* .header-menu-2 starts */
    	.header-menu-1 .main-nav ul li a, .header-menu-3 .main-nav ul li a {
			color: rgba(<?php echo Redux_Helpers::hex2rgba($fdata['header_menu_typo']['color']);?>, 0.5);
		}
		.header-menu-2 .main-nav ul li a {
			color: rgba(<?php echo Redux_Helpers::hex2rgba($fdata['header_menu_typo']['color']);?>, 1);
		}
		.header-menu-2 .main-nav ul li a:hover, .header-menu-2 .main-nav ul li.current a{
			border-bottom: 2px solid <?php echo $fdata['header_menu_typo']['color'];?>;
		}
	/* .header-menu-2 ends */
	
	/* header-menu-1,2,3 menu-bar Dropdown Starts */
	.header-menu-1.menu-bar .main-nav li > a:hover,
	.header-menu-1.menu-bar .main-nav ul li:hover > a, .header-menu-1.menu-bar .main-nav ul li.current a ,
	.header-menu-2.menu-bar .main-nav li > a:hover,
	.header-menu-2.menu-bar .main-nav ul li:hover > a, .header-menu-2.menu-bar .main-nav ul li.current a {
		color: rgba(<?php echo Redux_Helpers::hex2rgba($fdata['header_menu_typo']['color']);?>, 1);
	}
	
	.header-menu-1.menu-bar .main-nav  ul > li > ul, .header-menu-2.menu-bar .main-nav  ul > li > ul {
		background: rgba(<?php echo Redux_Helpers::hex2rgba($fdata['header_menu_typo']['color']);?>,0.05);
	}
	
	.header-menu-1.menu-bar .main-nav  ul > li > ul li, .header-menu-2.menu-bar .main-nav  ul > li > ul li {
		border-bottom: 1px solid rgba(<?php echo Redux_Helpers::hex2rgba($fdata['header_menu_typo']['color']);?>, 0.1);
	}

	.header-menu-1.menu-bar .main-nav  ul > li > ul a,
	.header-menu-1.menu-bar .main-nav  ul > li > ul a:link,
	.header-menu-2.menu-bar .main-nav  ul > li > ul a,
	.header-menu-2.menu-bar .main-nav  ul > li > ul a:link,
	.header-menu-3.menu-bar .main-nav  ul > li > ul a,
	.header-menu-3.menu-bar .main-nav  ul > li > ul a:link  {
		color: rgba(<?php echo Redux_Helpers::hex2rgba($fdata['header_menu_typo']['color']);?>, 0.5);
            font-size: <?php echo $fdata['header_menu_typo']['font-size'];?>;
          <?php
          if(isset($fdata['header_menu_typo']['font-style'])){
            ?>
            font-style: <?php echo ($fdata['header_menu_typo']['font-style']!='')?$fdata['main_menu_typo']['font-style']:'normal';?>;
            font-weight: <?php echo $fdata['header_menu_typo']['font-weight']?>;
          <?php
          }?>
	}
	
	.header-menu-1.menu-bar .main-nav  ul > li > ul a:hover, 
	.header-menu-2.menu-bar .main-nav  ul > li > ul a:hover {
		background-color: rgba(<?php echo Redux_Helpers::hex2rgba($fdata['header_menu_typo']['color']);?>, 0.1);
		color: rgba(<?php echo Redux_Helpers::hex2rgba($fdata['header_menu_typo']['color']);?>, 1);
	}
	/* header-menu-1,2,3 menu-bar Dropdown Ends */


	
/* header_nav_holder starts */

/**			4.3- Header Navigation (Slidebar) 3			**/

.folio-slidebar .sb-slidebar{
	background-color: rgba(<?php echo Redux_Helpers::hex2rgba($fdata['slidebar_nav_background']);?>, <?php echo $fdata['slidebar_nav_bk_opacity'];?>);
}
/*.folio-slidebar .sb-slidebar .logo{
	margin-top: 0;
	padding: 24px 14px 24px 24px;
}*/
.sb-slidebar .main-nav ul li a{
   color: rgba(<?php echo Redux_Helpers::hex2rgba($fdata['slidebar_menu_typo']['color']);?>, 1);
		font-size: <?php echo $fdata['slidebar_menu_typo']['font-size'];?>;
      <?php
	  if(isset($fdata['slidebar_menu_typo']['font-style'])){
		?>
        font-style: <?php echo ($fdata['slidebar_menu_typo']['font-style']!='')?$fdata['slidebar_menu_typo']['font-style']:'normal';?>;
        font-weight: <?php echo $fdata['slidebar_menu_typo']['font-weight']?>;
      <?php
	  }?>
		line-height: <?php echo $fdata['slidebar_menu_typo']['line-height']?>;
}
/* .folio-slidebar ends */
	.section_container .hgroup h3{
		font-family: <?php echo $fdata['primary_font']==="false"?$fdata['primary_font']['font-family']:"'".$fdata['primary_font']['font-family']."'".', Arial, Helvetica, sans-serif';?>
	}
/* Section Homepage General CSS ends */

/**		7- About Section		**/
			.project .project_detail .project_text .hgroup h3{
				font-family: <?php echo $fdata['secondary_font']==="false"?$fdata['secondary_font']['font-family']:"'".$fdata['secondary_font']['font-family']."'".', Arial, Helvetica, sans-serif';?>
			}
		.project .project_detail .project_meta .meta_title{
			font-family: <?php echo $fdata['secondary_font']==="false"?$fdata['secondary_font']['font-family']:"'".$fdata['secondary_font']['font-family']."'".', Arial, Helvetica, sans-serif';?>
		}
/* Project Ends */

/**		14- Home Blog Section		**/
/* .hm_blog_post starts */
				.post .post_content .date_holder .date span{
					font-family: <?php echo $fdata['secondary_font']==="false"?$fdata['secondary_font']['font-family']:"'".$fdata['secondary_font']['font-family']."'".', Arial, Helvetica, sans-serif';?>
				}
/* .hm_blog_post ends */

/**		16- Footer Section (map included)		**/
/* Footer Starts*/

footer{
	background: <?php echo $fdata['footer_background'];?>;

	padding: <?php echo $fdata['footer_top_padding']>''?$fdata['footer_top_padding'].'px':'0';?> 0 <?php echo $fdata['footer_bottom_padding']>''?$fdata['footer_bottom_padding'].'px':'0';?> 0;
}
/* Footer Ends*/

/**      17- Content area inner Pages    							  **/
/* content_bar Styling Starts*/ /* Content_bar styling includes for both blog and inner pages */
.content_bar h1, .content_bar .h1, .content_bar h1 a, .content_bar .h1 a,  
.content_bar h2, .content_bar .h2, .content_bar h2 a, .content_bar .h2 a,
.content_bar h3, .content_bar .h3, .content_bar h3 a, .content_bar .h3 a,
.content_bar h4, .content_bar .h4, .content_bar h4 a, .content_bar .h4 a, 
.content_bar h5, .content_bar .h5, .content_bar h5 a, .content_bar .h5 a,
.content_bar h6, .content_bar .h6, .content_bar h6 a, .content_bar .h6 a{
	font-family: <?php echo $fdata['secondary_font']==="false"?$fdata['secondary_font']['font-family']:"'".$fdata['secondary_font']['font-family']."'".', Arial, Helvetica, sans-serif';?>
}
	.content_bar h1{
		color: <?php echo $fdata['h_1']['color'];?>;
		font-size: <?php echo $fdata['h_1']['font-size'];?>;
      <?php
	  if(isset($fdata['h_1']['font-style'])){
		?>
        font-style: <?php echo ($fdata['h_1']['font-style']!='')?$fdata['h_1']['font-style']:'normal';?>;
        font-weight: <?php echo $fdata['h_1']['font-weight']?>;
      <?php
	  }?>
		line-height: <?php echo $fdata['h_1']['line-height']?>;
	}
	.content_bar h2{
		color: <?php echo $fdata['h_2']['color'];?>;
		font-size: <?php echo $fdata['h_2']['font-size'];?>;
      <?php
	  if(isset($fdata['h_2']['font-style'])){
		?>
        font-style: <?php echo ($fdata['h_2']['font-style']!='')?$fdata['h_2']['font-style']:'normal';?>;
        font-weight: <?php echo $fdata['h_2']['font-weight']?>;
      <?php
	  }?>
		line-height: <?php echo $fdata['h_2']['line-height']?>;
	}
	.content_bar h3{
		color: <?php echo $fdata['h_3']['color'];?>;
		font-size: <?php echo $fdata['h_3']['font-size'];?>;
      <?php
	  if(isset($fdata['h_3']['font-style'])){
		?>
        font-style: <?php echo ($fdata['h_3']['font-style']!='')?$fdata['h_3']['font-style']:'normal';?>;
        font-weight: <?php echo $fdata['h_3']['font-weight']?>;
      <?php
	  }?>
		line-height: <?php echo $fdata['h_3']['line-height']?>;
	}
	.content_bar h4{
		color: <?php echo $fdata['h_4']['color'];?>;
		font-size: <?php echo $fdata['h_4']['font-size'];?>;
      <?php
	  if(isset($fdata['h_4']['font-style'])){
		?>
        font-style: <?php echo ($fdata['h_4']['font-style']!='')?$fdata['h_4']['font-style']:'normal';?>;
        font-weight: <?php echo $fdata['h_4']['font-weight']?>;
      <?php
	  }?>
		line-height: <?php echo $fdata['h_4']['line-height']?>;
	}
	.content_bar h5{
		color: <?php echo $fdata['h_5']['color'];?>;
		font-size: <?php echo $fdata['h_5']['font-size'];?>;
      <?php
	  if(isset($fdata['h_5']['font-style'])){
		?>
        font-style: <?php echo ($fdata['h_5']['font-style']!='')?$fdata['h_5']['font-style']:'normal';?>;
        font-weight: <?php echo $fdata['h_5']['font-weight']?>;
      <?php
	  }?>
		line-height: <?php echo $fdata['h_5']['line-height']?>;
	}
	.content_bar h6{
		color: <?php echo $fdata['h_6']['color'];?>;
		font-size: <?php echo $fdata['h_6']['font-size'];?>;
      <?php
	  if(isset($fdata['h_6']['font-style'])){
		?>
        font-style: <?php echo ($fdata['h_6']['font-style']!='')?$fdata['h_6']['font-style']:'normal';?>;
        font-weight: <?php echo $fdata['h_6']['font-weight']?>;
      <?php
	  }?>
		line-height: <?php echo $fdata['h_6']['line-height']?>;
	}

.content_bar p, .content_bar ul li, .content_bar ol li, .content_bar pre {
	color: <?php echo $fdata['paragraph_content']['color'];?>;
    font-size: <?php echo $fdata['paragraph_content']['font-size'];?>;
  <?php
  if(isset($fdata['paragraph_content']['font-style'])){
  ?>
	font-style: <?php echo ($fdata['paragraph_content']['font-style']!='')?$fdata['paragraph_content']['font-style']:'normal';?>;
	font-weight: <?php echo $fdata['paragraph_content']['font-weight']?>;
  <?php
  }?>
    line-height: <?php echo $fdata['paragraph_content']['line-height']?>;
}
/* content_bar Styling Ends*/



/* pagination start */ 
	.folio_navigation  .wp-pagenavi a, .folio_navigation  .wp_corenavi a.page-numbers {
		font-family: <?php echo $fdata['primary_font']==="false"?$fdata['primary_font']['font-family']:"'".$fdata['primary_font']['font-family']."'".', Arial, Helvetica, sans-serif';?>
	}
	/*.wp-pagenavi  & wp_corenavi starts*/
	
/* pagination end */

/**		20- Sidebar and Widgets		**/
/* side_bar Starts*/
		.widget_kraft_slider .bx-wrapper .bxslider .slider_caption h3 a{
			font-family: <?php echo $fdata['primary_font']==="false"?$fdata['primary_font']['font-family']:"'".$fdata['primary_font']['font-family']."'".', Arial, Helvetica, sans-serif';?>
		}
	/* widget_kraft_slider ends */
	/* widget_search, widget_kraft_search Starts*/

/* sidebar Ends*/			

/**      21- Blog Comments Section                  					  **/
/* comments_section Starts */
	#comments .commentlist li cite.fn, #comments .commentlist li cite.fn a {
		font-family: <?php echo $fdata['secondary_font']==="false"?$fdata['secondary_font']['font-family']:"'".$fdata['secondary_font']['font-family']."'".', Arial, Helvetica, sans-serif';?>
	}
/* comments_section Ends */

/**		22- Shortcodes and Styling		**/
/**      22.6- Quotes Styles			                 				  **/
/*-----------------------------------------------------------------------------------*/
/*	Quotes Styles
/*-----------------------------------------------------------------------------------*/

	/* quote_styling Starts */
	
	/* blockqoute */ 
	.quote_1, .quote_2, .quote_3, .quote_4, .quote_5{
    	font-family: <?php echo $fdata['quote_font']==="false"?$fdata['quote_font']['font-family']:"'".$fdata['quote_font']['font-family']."'".', Arial, Helvetica, sans-serif';?>;
	}
	.quote_1 p{
		color: <?php echo $fdata['quote_1']['color'];?>;
		font-size: <?php echo $fdata['quote_1']['font-size'];?>;
      <?php
	  if(isset($fdata['quote_1']['font-style'])){
		?>
        font-style: <?php echo ($fdata['quote_1']['font-style']!='')?$fdata['quote_1']['font-style']:'normal';?>;
        font-weight: <?php echo $fdata['quote_1']['font-weight']?>;
      <?php
	  }?>
		line-height: <?php echo $fdata['quote_1']['line-height']?>;
	}
    .quote_2 p{
		color: <?php echo $fdata['quote_2']['color'];?>;
		font-size: <?php echo $fdata['quote_2']['font-size'];?>;
      <?php
	  if(isset($fdata['quote_2']['font-style'])){
		?>
        font-style: <?php echo ($fdata['quote_2']['font-style']!='')?$fdata['quote_2']['font-style']:'normal';?>;
        font-weight: <?php echo $fdata['quote_2']['font-weight']?>;
      <?php
	  }?>
		line-height: <?php echo $fdata['quote_2']['line-height']?>;
	}
    .quote_3 p{
		color: <?php echo $fdata['quote_3']['color'];?>;
		font-size: <?php echo $fdata['quote_3']['font-size'];?>;
      <?php
	  if(isset($fdata['quote_3']['font-style'])){
		?>
        font-style: <?php echo ($fdata['quote_3']['font-style']!='')?$fdata['quote_3']['font-style']:'normal';?>;
        font-weight: <?php echo $fdata['quote_3']['font-weight']?>;
      <?php
	  }?>
		line-height: <?php echo $fdata['quote_3']['line-height']?>;
	}
    .quote_4 p{
		color: <?php echo $fdata['quote_4']['color'];?>;
		font-size: <?php echo $fdata['quote_4']['font-size'];?>;
      <?php
	  if(isset($fdata['quote_4']['font-style'])){
		?>
        font-style: <?php echo ($fdata['quote_4']['font-style']!='')?$fdata['quote_4']['font-style']:'normal';?>;
        font-weight: <?php echo $fdata['quote_4']['font-weight']?>;
      <?php
	  }?>
		line-height: <?php echo $fdata['quote_4']['line-height']?>;
	}
    .quote_5 p{
		color: <?php echo $fdata['quote_5']['color'];?>;
		font-size: <?php echo $fdata['quote_5']['font-size'];?>;
      <?php
	  if(isset($fdata['quote_5']['font-style'])){
		?>
        font-style: <?php echo ($fdata['quote_5']['font-style']!='')?$fdata['quote_5']['font-style']:'normal';?>;
        font-weight: <?php echo $fdata['quote_5']['font-weight']?>;
      <?php
	  }?>
		line-height: <?php echo $fdata['quote_5']['line-height']?>;
	}
	
	/* quote_styling Ends */
    
<?php
echo $fdata['custom_css'];