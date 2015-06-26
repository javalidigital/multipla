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
if($fdata['color_scheme_type']==="custom_skin"){
	$hex_color = $fdata['custom_color_theme'];
	$rgb_array = hex2rgb($hex_color);
	$rgb = $rgb_array[0].', '.$rgb_array[1].', '.$rgb_array[2];
	?>
::selection {
	background: <?php echo $hex_color;?>; /* Safari */
}
::-moz-selection {
	background: <?php echo $hex_color;?>; /* Firefox */
}
a {
    color: <?php echo $hex_color;?>;
}
/*******************************************************************/
/********************* Global Elements Css Starts ******************/
/* to highlight text */
.highlight{
	color: <?php echo $hex_color;?>;
}
/* .folio-link-url */
	.folio-link-url:hover{
		color: <?php echo $hex_color;?>;
	}
	.folio-link-url i{
		color: <?php echo $hex_color;?>;
	}
	
/* Button CSS starts */
.button, a.button{
	background-color: <?php echo $hex_color;?>;
	border: 1px solid <?php echo $hex_color;?>;
}
	.button:hover, a.button:hover{
		color: <?php echo $hex_color;?>;
	}

input[type="submit"]{
	background-color: <?php echo $hex_color;?>;
	border: 1px solid <?php echo $hex_color;?>;
}
	input[type="submit"]:hover, input[type="submit"]:active, input[type="submit"]:focus{
		color: <?php echo $hex_color;?>;
	}
	/* .toggle_section_button */
	.circle_button:active, .circle_button:focus{
		color: <?php echo $hex_color;?>;
	}
	.circle_button:hover, .circle_button:hover i{
		color: <?php echo $hex_color;?>;
	}
	
	/* .toggle_section_button */
/* Button CSS ends */

/* Form Elements CSS starts */

/********************* Global Elements Css ends ******************/
/*******************************************************************/

/**       2- Folio Zee Curve Shape                                     **/
/* Curve starts */
	.zee_curve_container .zee_curve_left:before{
		border-left: 610px solid <?php echo $hex_color;?>;
	}
	.zee_curve_container .zee_curve_right:before{
		border-right: 610px solid <?php echo $hex_color;?>;
	}

/*********************//*********************//*********************/
	/* .zee_curve_container blockquote starts */
	blockquote.home_quote strong{
		color: <?php echo $hex_color;?>;
	}
	/* .zee_curve_container blockquote ends */
	
	/**		2.1- Curve Video		**/
	/* .video_holder starts */
		/* .video_holder .play-button starts */
			.video_holder .play-button:before{
				color: <?php echo $hex_color;?>;
			}
		/* .video_holder .play-button ends */
		
	/* .video_holder ends */
	
	/**		2.2- Curve Testimonial slider		**/
	/* .testi_holder starts */
	/**		2.3- Statistics		**/
	/* .stats_single starts */
		.stats_single .stats_icon{
			border-color: <?php echo $hex_color;?>;
		}
			.stats_single:hover .stats_icon{
				border-color: <?php echo $hex_color;?> !important;
				background-color: <?php echo $hex_color;?>;
			}
			.folio_stats .stats_single:hover .stats_icon{
				border-color: <?php echo $hex_color;?>;
			}
		
		.stats_single .stats_icon i{
			color: <?php echo $hex_color;?>;
		}
	/* .stats_single ends */
	
/**       3- Navigation Primary (Sticky Navigation)                   **/
/* menu-bar starts */
	.menu-bar .main-nav .back_top a{
		color: <?php echo $hex_color;?>;
	}
	.menu-bar .main-nav li > a:hover,
	.menu-bar .main-nav ul li:hover > a, .menu-bar .main-nav ul li.current a {
		color: <?php echo $hex_color;?>;
	}
	.menu-bar .main-nav  ul > li > ul {
		border-top: 1px solid <?php echo $hex_color;?>;
	}
	/* menu-bar Dropdown Ends */
	
/* menu-bar ends */

/**			4.3- Header Navigation (Slidebar) 3			**/
/* .folio-slidebar starts */
	.sb-slidebar .main-nav li > a:hover, .sb-slidebar .main-nav ul li.current a {
		border-left-color: <?php echo $hex_color;?>;
		color: <?php echo $hex_color;?>;
	}
/* .folio-slidebar ends */

/**		7- About Section		**/
.about_single i{
	color: <?php echo $hex_color;?>;
}

/**		8- Feature Portfolio Section		**/
	.project .featured_image .vjs-default-skin div.vjs-big-play-button span:before{
		color: <?php echo $hex_color;?>;
	}
/* portfolio_listing starts */
	.portfolio_listing .single_portfolio:hover:after, .portfolio_listing .single_portfolio.active:after{
		background: <?php echo $hex_color;?>;
	}
/* portfolio_listing ends */

/**		9- Services Section		**/
/* .service_single starts */
		.service_single:hover .icon_holder .icon_shape{
			background-color: <?php echo $hex_color;?>;
		}
		.service_single .icon_holder .icon_shape{
			border: 1px solid <?php echo $hex_color;?>;
		}
			.service_single .icon_holder .icon_shape i{
				color: <?php echo $hex_color;?>;
			}
/* .service_single ends */
	
/**		11- Portfolio Section		**/
/* work_nav starts */
	.work_nav ul li a:hover, .work_nav ul li.current a{
		color: <?php echo $hex_color;?>;
	}
/* work_nav ends */

/* work_listing starts */
	.view-second .mask {
		background-color: rgba(<?php echo $rgb;?>, 0.92);
	}
/* work_listing ends */

/**		12- Team Slider Section		**/
/* team_slider starts */
		/* .team_stats starts */
		.team_slider .team_stats .stats_bar{
			background: <?php echo $hex_color;?>;
		}
		.team_slider .team_stats .stats_bar:after{
			border-top: 4px solid <?php echo $hex_color;?>;
		}
		/* .team_stats ends */
		
		/* team_social starts */
			.team_social > li a:hover{
				color: <?php echo $hex_color;?>;
			}
		/* team_social ends */
/* team_slider ends */
	
/**		14- Home Blog Section		**/
/* .hm_blog_post starts */
			.post .featured_image.video_post .play-button:before{
				color: <?php echo $hex_color;?>;
			}
			.post .post_content .date_holder .date{
				background-color: <?php echo $hex_color;?>;
			}
				.post .post_content .meta_holder .title_holder .post_title a:hover{
					color: <?php echo $hex_color;?>;
				}
			.post .post_content .meta_holder .post_meta a{
				color: <?php echo $hex_color;?>;
			}
/* .hm_blog_post ends */

/**		15- Contact Section		**/
	.contact_info .fa{
		color: <?php echo $hex_color;?>;
	}

/**		16- Footer Section (map included)		**/
/* Footer Starts*/
/* .google_map starts */
.map_mask{
	background-color: <?php echo $hex_color;?>;
}
/* .google_map ends */

footer{
	background: <?php echo $hex_color;?>;
}
/* Footer Ends*/

/**      17- Content area inner Pages    							  **/
/* content_bar Styling Starts*/ /* Content_bar styling includes for both blog and inner pages */
	.content_bar h1 span, .content_bar .h1 span, .content_bar h1 a span, .content_bar .h1 a span,
	.content_bar h2 span, .content_bar .h2 span, .content_bar h2 a span, .content_bar .h2 a span,
	.content_bar h3 span, .content_bar .h3 span, .content_bar h3 a span, .content_bar .h3 a span,
	.content_bar h4 span, .content_bar .h4 span, .content_bar h4 a span, .content_bar .h4 a span,
	.content_bar h5 span, .content_bar .h5 span, .content_bar h5 a span, .content_bar .h5 a span,
	.content_bar h6 span, .content_bar .h6 span, .content_bar h6 a span, .content_bar .h6 a span{
		color: <?php echo $hex_color;?>;
	}
.content_bar h1 a:hover, .content_bar h2 a:hover, .content_bar h3 a:hover, .content_bar h4 a:hover, .content_bar h5 a:hover, .content_bar h6 a:hover{
	color: <?php echo $hex_color;?>;
}
	.content_bar p a{
		color: <?php echo $hex_color;?>;
	}
	.content_bar ul li:before{
		color: <?php echo $hex_color;?>;
	}
/* content_bar Styling Ends*/

/**		18- Internal Section (includes headings group on top)		**/
/* .internal_header Starts */
		.hgroup_4 h2 span{
			color: <?php echo $hex_color;?>;
		}
/* .internal_header Ends */

/**		19- Inner Blog		**/
/* .blog_post Starts */
			.blog_listing .meta_holder .comments i{
				color: <?php echo $hex_color;?>;
			}
			.blog_listing .meta_holder .comments a:hover{
				color: <?php echo $hex_color;?>;
			}
	
	/* video js starts */
	.blog_listing .post .featured_image .vjs-default-skin div.vjs-big-play-button span:before{
		color: <?php echo $hex_color;?>;
	}
	/* video js ends */
	
	/* social_media starts */
		.social_media > ul > li a:hover{
			color: <?php echo $hex_color;?>;
		}
	/* social_media starts */
/* .blog_post Ends */

/* pagination start */ 
	 /*.wp-pagenavi & wp_corenavi starts*/
	.wp-pagenavi span.current, .folio_navigation  .wp_corenavi span.current {
		background: <?php echo $hex_color;?>;
	}
	/*.wp-pagenavi  & wp_corenavi starts*/
	
/* pagination end */
/* .navigation Starts (Single post) */
		/* .navigation (for Project single page) */
		.page_nav a:hover{
			background: <?php echo $hex_color;?>;
		}
/* .navigation Ends (Single post) */

/**		20- Sidebar and Widgets		**/
/* side_bar Starts*/
	/* widget_recent_entries Starts*/
	.widget_recent_entries ul li a:hover {
		color: <?php echo $hex_color;?>;
	}
	.post-date {
		color: <?php echo $hex_color;?>;
	}
	/* widget_recent_entries Ends*/
	
	/* widget_categories Starts*/
	.widget_categories ul li a {
		color: <?php echo $hex_color;?>;
	}
	/* widget_categories Ends*/
	
	/* widget_text Starts*/
	.textwidget strong {
		color: <?php echo $hex_color;?>;
	}
	/* widget_text Ends*/
	
	/* widget tagcloud starts */
	.tagcloud a:hover {
		background: <?php echo $hex_color;?>;
	}
	/* widget tagcloud ends */
	
	/* widget_kraft_slider starts */
				.widget_kraft_slider .bx-wrapper .bx-controls-direction a:hover{
					color: <?php echo $hex_color;?>;
				}
	/* widget_kraft_slider ends */
	
	/* widget_search, widget_kraft_search Starts*/
		#searchsubmit:hover{
			border-color: <?php echo $hex_color;?>;
			background-color: <?php echo $hex_color;?>;
		}
	/* widget_search, widget_kraft_search Ends*/

	/* tweet-list Starts */
	.tweet-list .tweet .icon {
		color: <?php echo $hex_color;?>;
	}
	/* tweet-list Ends */

	/* widget_nav_menu and widget_pages Starts*/
	.widget_nav_menu ul li a:hover, .widget_nav_menu ul li.current_page_item a, .widget_pages ul li a:hover, .widget_pages ul li.current_page_item a{
		color: <?php echo $hex_color;?>;
	}
	.widget_meta ul li a{
		color: <?php echo $hex_color;?>;
	}
	/* widget_nav_menu and widget_pages Ends*/
	
	/* widget_recent_comments Starts*/
	.widget_recent_comments ul li a:hover{
		color: <?php echo $hex_color;?>;
	}
	/* widget_nav_menu Ends*/
	
/* sidebar Ends*/			

/**      21- Blog Comments Section                  					  **/
/* comments_section Starts */
 #comments_section h3 i{
    color: <?php echo $hex_color;?>;
 }
		#comments .commentlist a.comment-reply-link:hover{
			color: <?php echo $hex_color;?>;
		}
	#comments .commentlist a.comment-reply-link i{
		color: <?php echo $hex_color;?>;
	}
		#comments_section #commentform .button:hover, #comments_section #commentform .button:active, #comments_section #commentform .button:focus{
			color: <?php echo $hex_color;?>;
		}
/* comments_section Ends */

/**		22- Shortcodes and Styling		**/

/**      22.1- Buttons Styles			                 				  **/
/* .button.button-outline starts */
.button.button-outline, a.button.button-outline{
	color: <?php echo $hex_color;?>;
}
/* .button.button-outline ends */

/**      22.2- Tabs Styles			                 				  **/	
.folio-tabs .folio-nav .ui-tabs-selected a,
.folio-tabs .folio-nav .ui-tabs-active a {
	color: <?php echo $hex_color;?>;
}
/**      22.3- Toggles Styles			                 				  **/
/*-----------------------------------------------------------------------------------*/
/*	Toggle Styles
/*-----------------------------------------------------------------------------------*/
.folio-toggle .ui-accordion-header-active, .folio-toggle .ui-state-active{
	background-color: <?php echo $hex_color;?>;
	border-color: <?php echo $hex_color;?>;
}

/**      22.4- Accordion Styles			                 				            **/
/*-----------------------------------------------------------------------------------*/
/*	Accordion Styles
/*-----------------------------------------------------------------------------------*/
.folio-accordion .ui-accordion-header-active, .folio-accordion .ui-state-active{
	background-color: <?php echo $hex_color;?>;
	border-color: <?php echo $hex_color;?>;
}

/**      22.5- Pricing Tables Styles			                 				  **/
/*-----------------------------------------------------------------------------------*/
/* Folio Pricing Table Styles		
/*-----------------------------------------------------------------------------------*/
.folio_pricing_single.favourite_pricing .price_title{
	background: <?php echo $hex_color;?>;
}

/**      22.6- Quotes Styles			                 				  **/
/*-----------------------------------------------------------------------------------*/
/*	Quotes Styles
/*-----------------------------------------------------------------------------------*/

	/* quote_styling Starts */
	.quote_1{
		border-left: 3px solid <?php echo $hex_color;?>;
	}
	.quote_2, .quote_3 {
		border-left: 3px solid  <?php echo $hex_color;?>;
	}
	
	/* quote_styling Ends */


/**		23- 404 section		**/
/* .section_404 starts */
			.section_404 .hgroup .heading_left h1:after{
				background: <?php echo $hex_color;?>;
			}
/* .section_404 ends */

/* Responsive slides */
.featured_image .transparent-btns_tabs .transparent-btns_here a, .featured_image .transparent-btns_tabs a:hover{
	background: <?php echo $hex_color;?>;
	border: 2px solid <?php echo $hex_color;?>;
}

.featured_image .centered-btns_here a:before,
.featured_image .transparent-btns_here a:before,
.featured_image .large-btns_here a:before {
  color: <?php echo $hex_color;?>;
}

<?php 
}//end if($fdata['predefined_colors']==="custom_color_theme")
?>