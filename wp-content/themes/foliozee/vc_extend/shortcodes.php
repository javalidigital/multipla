<?php  

/*--------------------------------------------------------------------------------
|				KraftiveComments:  Headimg Module / Element Shortcode			|						
--------------------------------------------------------------------------------*/

function folio_main_heading( $atts, $content = null ) {
//can create unlimited fields using below array
$output = $color_one = $color_two = $color_three = '';
   extract( shortcode_atts( array(
	'heading_style'		=> '',
	//Style 1	  
	'style_1_title'		=> '',
	'is_desc'			  => '',
	'style_1_desc'		 => '',
	'is_line'			  => '',
	'line_color'		   => '',
	
	//Style  2	  
	'style_2_title'		=> '',
	//'style_2_sub_title'	=> '',
	'style_2_desc'		 => '',
	

//Style 3 parallex
	'style_3_title'		=> '',

	//Style 4
	'style_4_title'		=> '',
	'style_4_sub_title'	=> '',
	'style_4_desc'		=> '',
	'align' 				=> 'align_center',
	'align_4' 				=> 'align_left',
//Style 5 curved
	'style_5_title'		=> '',
	
//styling
	'heading_1_color'		=> '',
	'heading_2_color'		=> '',
	'heading_3_color'		=> '',
	'el_class'			 => '',
  
   ), $atts ) );
   
	$color_one = !empty( $heading_1_color )? 'style = "color: '. $heading_1_color .';"': '';
	$color_two = !empty( $heading_2_color )? 'style = "color: '. $heading_2_color .';"': '';
	$color_three = !empty( $heading_3_color )? 'style = "color: '. $heading_3_color .';"': '';
	
	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $el_class, $atts );
	
	$style = 'style = "border-color:'.$line_color.';"';

	ob_start();
		if( $heading_style === 'style_1' ){?>
                    <div class="hgroup <?php echo $el_class; ?>">
                        <div class="row">
                            <div class="col-xs-3 heading_cover">
                                <h2 <?php echo $color_one;?>><?php echo folio_highlight_it(folio_break_it($style_1_title)); ?></h2>
                            </div>
                            
                            <?php if( $is_line === 'yes' ):?>
                                <div class="col-xs-1 skew_holder">
                                    <div class="skew_shape" <?php echo $style; ?>></div>
                                </div>
                            <?php endif; ?>
                            
                            <?php if( $is_desc === 'yes' ):?>
                                <div class="col-xs-8 heading_cover">
                                    <h3 <?php echo $color_two;?>><?php echo folio_highlight_it(folio_break_it($style_1_desc)) ;?></h3>
                                </div>
                            <?php endif;?>
                        </div>
                    </div>
		
		<?php }elseif( $heading_style === 'style_2' ){?>
        			<div class="simple_text <?php echo $el_class.' '. $align; ?>">
                        <div class="text_holder">
                            <h4 <?php echo $color_one;?>><?php echo folio_highlight_it(folio_break_it($style_2_title)) ;?></h4>
                            <p <?php echo $color_two;?>><?php echo folio_highlight_it(folio_break_it($style_2_desc)) ;?></p>
                        </div>
                    </div>
		<?php }elseif( $heading_style === 'style_3' ){?>
                        <div class="curve_heading <?php echo $el_class.' '. $align; ?>">
                            <h4 <?php echo $color_one;?>><?php echo folio_highlight_it(folio_break_it($style_3_title)) ;?></h4>
                        </div>		
		<?php }elseif( $heading_style === 'style_4' ){?>
                    <div class="hgroup_4 <?php echo $el_class.' '. $align_4; ?>">
                        <div class="heading_cover">
                            <h2 <?php echo $color_one;?>><?php echo folio_highlight_it( folio_break_it($style_4_title) );?></h2>
                        </div>
                        <div class="heading_cover">
                            <h3 <?php echo $color_two;?>><?php echo folio_highlight_it( folio_break_it($style_4_sub_title) ); ?></h3>
                        </div>
                        <div class="heading_cover">
                            <h4 <?php echo $color_three;?>><?php echo folio_highlight_it( folio_break_it($style_4_desc) ); ?></h4>
                        </div>
                    </div>
		<?php }elseif( $heading_style === 'style_5' ){?>
        			<div class="content_bar <?php echo $el_class.' '. $align_4; ?>">
                        <div class="heading_cover">
                                <h2 class="folio_h2" <?php echo $color_one;?>><?php echo folio_highlight_it( folio_break_it($style_5_title) ); ?></h2>
                        </div>
                    </div>
		<?php } 
	$output = ob_get_contents();
	ob_end_clean();

	return $output;
}

add_shortcode( 'folio_heading', 'folio_main_heading' );


/*--------------------------------------------------------------------------------
|				KraftiveComments:  Custom Heading Module / Element Shortcode			|						
--------------------------------------------------------------------------------*/
	function folio_custom_heading($atts, $content = null ){
		$output = $title = '';
			
		extract(shortcode_atts(array(
			'tag'				  => 'h3',
			'tag_content'		=> '',
			'is_link'			 => '',
			'link'				 => '',
			'tag_align'			=>'align_left',
			'el_class'			 => '',
		), $atts));
	
			ob_start(); 
				$class = $tag_align;
				$link = ( $link == '||' ) ? '' : $link;
				$link = vc_build_link( $link );
				$a_href = $link['url'];
				$a_title = $link['title'];
				$a_target = $link['target'];
				
				$a_title = $a_title!=''? $a_title: 'Heading';
				$a_target = $a_target!=''? 'target="'. $a_target .'"' :'';

				$tag_content = folio_highlight_it( folio_break_it($tag_content) );
					?>
                    <div class="content_bar <?php echo $el_class; ?>">
                        <?php echo '<'.$tag ?> class="<?php echo $class; ?>">
                            <?php if( !empty($is_link) ):?>
                                <a href="<?php echo $a_href; ?>" title="<?php echo $a_title; ?>" 
                                <?php echo $a_target; ?>><?php echo $tag_content?></a>	
                            <?php else:?>
                                <?php echo $tag_content; ?>
                            <?php endif; ?>
                        </<?php echo $tag; ?>>
                    </div>        			
	<?php
			$output = ob_get_contents();
			ob_end_clean();
		
			return $output;
	}
		
	add_shortcode( 'folio_custom_heading', 'folio_custom_heading' );


/*--------------------------------------------------------------------------------
|				KraftiveComments:  About Module / Element Shortcode			|						
--------------------------------------------------------------------------------*/

	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_Folio_About extends WPBakeryShortCodesContainer {
		}
	}

	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_About_Tab extends WPBakeryShortCode {
		}
	}

	function folio_about($atts, $content = null ){
		$output = $title = '';
		//
		extract(shortcode_atts(array(
			'bg_image' => '',
			'image_position' => '',
			'title' => '',
			'link' => '',
			'el_class' => '',
		), $atts));

		$column_class = ! empty($bg_image)? 'col-sm-8': 'col-sm-12'; 

		$link = ( $link == '||' ) ? '' : $link;
		$link = vc_build_link( $link );
		$a_href = $link['url'];
		$a_title = $link['title'];
		$a_target = $link['target'];
		
		$a_title = $a_title!=''? $a_title: 'Read More';
		$a_target = $a_target!=''? 'target="'. $a_target .'"' :'';
		
		ob_start();?>
			<div class="row <?php echo $el_class; ?>">
            	<?php if( ! empty( $bg_image ) && $image_position === 'left' ):?>
            	<div class="col-sm-4 about_image">
                	<img src="<?php echo folio_get_image_src( $bg_image ); ?>" alt="About Us">
                </div>
                <?php endif; ?>
                
                <div class="<?php echo $column_class; ?> about_content_holder">
                	<h3><?php echo $title; ?></h3>
                	<div class="row">
						<?php echo wpb_js_remove_wpautop($content);?>
                        <div class="col-sm-6 learn_more_about">
	                        <a <?php echo $a_target;?> href="<?php echo !empty($a_href)? $a_href: 'javascript:void(0);'; ?>" class="folio-link-url">
								<?php echo $a_title; ?> <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            	<?php if( ! empty( $bg_image ) && $image_position === 'right' ):?>
            	<div class="col-sm-4 about_image">
                	<img src="<?php echo folio_get_image_src( $bg_image ); ?>" alt="About Us">
                </div>
                <?php endif; ?>
            </div>
        
		<?php $output = ob_get_contents();
		ob_end_clean();
	
		return $output;
	
	}
	add_shortcode( 'folio_about', 'folio_about' );
	
	
	
//About us Child Element 
function folio_about_tab($atts, $content = null ){
	$output = $title = '';
		
	extract(shortcode_atts(array(
		'title' => '',
		'description' => '',
		'icon_class' => '',
		'el_class' => ''
	), $atts));

		ob_start();?>
            <div class="col-sm-6 about_single <?php echo $el_class; ?>">
                <div class="icon_holder">
                    <i class="fa <?php echo $icon_class; ?>"></i>
                </div>
                <div class="about_right">
                    <h4><?php echo $title; ?></h4>
                    <p><?php echo $description; ?></p>
                </div>
            </div>
<?php
		$output = ob_get_contents();
		ob_end_clean();
	
		return $output;
}
	
add_shortcode( 'about_tab', 'folio_about_tab' );






/*--------------------------------------------------------------------------------
|				KraftiveComments:  Services Module / Element Shortcode			|						
--------------------------------------------------------------------------------*/

	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_Folio_Services extends WPBakeryShortCodesContainer {
		}
	}

	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Service extends WPBakeryShortCode {
		}
	}

	function folio_services($atts, $content = null ){
		$output = $title = '';
		//
		extract(shortcode_atts(array(
			'title' => '',
			'el_class' => '',
		), $atts));
		ob_start();?>
			<div class="row">
				<?php echo wpb_js_remove_wpautop($content);?>
            </div>
		<?php $output = ob_get_contents();
		ob_end_clean();
	
		return $output;
	
	}
	add_shortcode( 'folio_services', 'folio_services' );

//Services Child Element 
	function folio_service($atts, $content = null ){
		$output = $title = '';
		
		extract(shortcode_atts(array(
			'title' => __("Services", "kraftives"),
			'description' => '',
			'icon_class' => '',
			'read_more_link' => '',
			'el_class' => ''
		), $atts));

		$link = ( $read_more_link == '||' ) ? '' : $read_more_link;
		$link = vc_build_link( $link );
		$a_href = $link['url'];
		$a_title = $link['title'];
		$a_target = $link['target'];
		$a_target = $a_target!=''? 'target="'. $a_target .'"' :'';

		ob_start();?>
            <div class="col-sm-6 service_single">
                <div class="icon_holder">
                    <div class="icon_shape">
                        <i class="fa <?php echo $icon_class; ?>"></i>
                    </div>
                </div>
                <div class="service_right">
                    <h4><?php echo $title; ?></h4>
                    <p><?php echo $description; ?></p>
                    <a <?php echo $a_target; ?> href="<?php echo !empty($a_href)? $a_href: 'javascript:void(0);'; ?>" class="folio-link-url">
						<?php echo !empty($a_title)? $a_title: 'Learn More'; ?> 
                        <i class="fa fa-long-arrow-right"></i>
                    </a>
                </div>
            </div>
<?php
		$output = ob_get_contents();
		ob_end_clean();
	
		return $output;
	}
	
add_shortcode( 'service', 'folio_service' );

/*--------------------------------------------------------------------------------
|				KraftiveComments:  Fun & Facts Module / Element Shortcode			|						
--------------------------------------------------------------------------------*/


	function folio_fun_facts($atts, $content = null ){
		$output = $title = '';
		
		extract(shortcode_atts(array(
			'fact_start_value' => 0,
			'fact_end_value' => '',
			'fact_text' => '',
			'fact_color' => '',
			'fact_icons' => '',
			'fact_speed' => '35',
			'el_class' => ''
		), $atts));
		
		$style = 'style="color:'.$fact_color.';"';
		$icon_border = 'style="border-color:'.$fact_color.';"';
		ob_start();?>
            <div class="stats_single">
                <div class="icon_holder">
                    <div class="stats_icon" <?php echo $icon_border; ?>>
                        <i class="fa <?php echo $fact_icons; ?>" <?php echo $style; ?>></i>
                    </div>
                </div>
                <div class="stats_hgroup">
                    <h3 class="countPercentage animated" data-percentageto="<?php echo $fact_end_value; ?>" 
                    data-animdelay="<?php echo $fact_speed; ?>">
                    	<span <?php echo $style; ?>><?php echo $fact_start_value; ?></span></h3>
                    <h4><?php echo $fact_text; ?></h4>
                </div>
            </div>
 <?php
		$output = ob_get_contents();
		ob_end_clean();
	
		return $output;
	}
		add_shortcode( 'folio_funfacts', 'folio_fun_facts' );


/*--------------------------------------------------------------------------------
|				KraftiveComments:  Testmonials Module / Element Shortcode			|						
--------------------------------------------------------------------------------*/

	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_Folio_Testmonials extends WPBakeryShortCodesContainer {
		}
	}

	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Testmonial extends WPBakeryShortCode {
		}
	}


	//Parent Element
	function folio_testmonials($atts, $content = null ){
		$output = '';
		wp_enqueue_script('3dgallery_js');
		
		extract(shortcode_atts(array(
			'transition' => '',
			'el_class' => ''
		), $atts));
		
		//generating random id
		$test_id = folio_random_id(5);
		$key = wp_generate_password(5, false, false);
		wp_enqueue_style('owl_carousel_css');
		wp_enqueue_style('owl_transitions_css');
		
		wp_enqueue_script('owl_carousel_js');
		wp_enqueue_script('custom_testimonial_js');
		
		wp_localize_script( 'custom_testimonial_js', 'folio_test_'.$key, array( 'id' => $test_id, 'transition' => $transition ) );
	
			ob_start(); ?>
				<div class="row">
					<div class="testi_holder <?php echo $el_class; ?>">
						<div class=" col-sm-10 span_center align_center">
							<div id="test-<?php echo $test_id; ?>" class="owl-carousel folio_testimonials" data-key = "<?php echo $key; ?>">
								<?php echo wpb_js_remove_wpautop($content); ?>  
							</div>
						</div>
					</div>
				</div>
	 <?php
			$output = ob_get_contents();
			ob_end_clean();
		
			return $output;
	}
	add_shortcode( 'folio_testmonials', 'folio_testmonials' );
	
	//Child Element
	
	function folio_testmonial( $atts, $content = null ) {
	  $output = '';
	   extract( shortcode_atts( array(
	
		  'author_name' => '',
		  'author_designation' => '',
		  'testmonial_description' => '',
		  'author_image' => '',
		  'el_class' => '',
	  
	   ), $atts ) );
	
			ob_start();?>
			   <div class="testi_single span_center">
							<div class="avatar">
								<img src="<?php echo folio_get_image_src( $author_image ); ?>" alt="<?php echo $author_name; ?>">
							</div>
							<div class="testi_text">
								<h3><?php echo $testmonial_description; ?></h3>
								<h5><?php echo $author_name.' - '; ?><span class="highlight"><?php echo $author_designation; ?></span></h5>
							</div>
						</div> 
	 <?php
			$output = ob_get_contents();
			ob_end_clean();
		
			return $output;
	}
	
	add_shortcode( 'testmonial', 'folio_testmonial' );
	
/*--------------------------------------------------------------------------------
|				KraftiveComments:  Clients Module / Element Shortcode			|						
--------------------------------------------------------------------------------*/

//Parent Element
	function folio_clients($atts, $content = null ){
		$output =  $el_class  = '';
		extract(shortcode_atts(array(
			'el_class' => ''
		), $atts));
			ob_start();?>
				<div class="row clients_holder animated <?php echo $el_class; ?>" data-animdelay="0.2s" data-animspeed="1s" data-animrepeat="0" data-animtype="fadeInUp">
					<?php echo wpb_js_remove_wpautop($content);?>
				</div>          
	 <?php
			$output = ob_get_contents();
			ob_end_clean();
		
			return $output;
	}

	add_shortcode( 'folio_clients', 'folio_clients' );

//Child Element
	function folio_client( $atts, $content = null ) {
		$output = '';
		   extract( shortcode_atts( array(
			  'title' => '',
			  'client_logo' => '',
			  'client_link' => '',
			  'el_class' => '',
		   ), $atts ) );
			ob_start();?>
                <div class="col-sm-2 client_single <?php echo $el_class; ?>">
                    <a href="<?php echo $client_link; ?>"><img src="<?php echo folio_get_image_src( $client_logo ); ?>" 
                    alt="<?php echo $title; ?>"></a>
                </div>
	 <?php
			$output = ob_get_contents();
			ob_end_clean();
			return $output;
	}
	
	add_shortcode( 'client', 'folio_client' );

/*--------------------------------------------------------------------------------
|				KraftiveComments:  Contact Info Module / Element Shortcode			|						
--------------------------------------------------------------------------------*/

function folio_contact_info($atts,$content = null){
	
	$output = $style = '';
	extract(shortcode_atts(array(
			'contact_icons' => '',
			'title' => '',
			'description' => '',
			'el_class' => '',
	), $atts));
			ob_start();?>
				<div class="contact_info align_center <?php echo $el_class; ?>">
                    	<i class="fa <?php echo $contact_icons;?>"></i>
                        <h4 class="contact_title"><?php echo $title; ?></h4>
                        <p class="contact_description"><?php echo $description;?></p>
                    </div>
	 <?php
			$output = ob_get_contents();
			ob_end_clean();
			return $output;
                      
}

add_shortcode( 'folio_contact_info', 'folio_contact_info' );

/*--------------------------------------------------------------------------------
|				KraftiveComments:  Video with Quote Module / Element Shortcode			|						
--------------------------------------------------------------------------------*/

function folio_quote_video($atts,$content = null){
	
	$output = '';
	extract(shortcode_atts(array(
			'display' => '',
			'video_title' => '',
			'video_id' => '',
			'author' => '',
			'description' => '',
			'el_class' => '',
	), $atts));

		if( $display === 'only_video' || $display === 'both' ): 
			$id = folio_random_id(5);
			$key = wp_generate_password(5, false, false);
			wp_enqueue_script( 'fitvids_js' );
			wp_enqueue_script( 'prettyPhoto_js' );
			wp_enqueue_script( 'home_video_js' );
			wp_localize_script( 'home_video_js', 'folio_video_'.$key, array( 'id' => $id) );
		endif;
			ob_start();?>
				<div class="video_holder <?php echo $el_class; ?>">
                	<div class="span_center align_center">
                	<?php if( $display === 'only_video' || $display === 'both' ):?>
                    	<div class="button_holder">
                    		<a  id="video-<?php echo $id; ?>"  class="play-button" href="http://vimeo.com/<?php echo $video_id;?>&amp;width=700" rel="prettyPhoto[gallery1]" title="<?php echo $video_title; ?>"  data-key = "<?php echo $key; ?>" ></a>
                        </div>
                    <?php endif; ?>
                    <?php if( $display === 'only_quote' || $display === 'both' ):?>
                        <blockquote class="home_quote">
                            <p>"<?php echo $description; ?>"</p>
                            <strong> &ndash; <?php echo $author; ?></strong>
                        </blockquote>
                   <?php endif; ?>
                   </div>
                </div>
	 <?php
			$output = ob_get_contents();
			ob_end_clean();
			return $output;
}

add_shortcode( 'folio_quote_video', 'folio_quote_video' );


/*--------------------------------------------------------------------------------
|				KraftiveComments:  Portfolio Carousel Module / Element Shortcode			|						
--------------------------------------------------------------------------------*/

	function folio_portfolio_carousel($atts, $content = null) {
	
		$output = '';
		extract(shortcode_atts(array(
			"carousel_view" => '',
			"number" => "-1",
			"categories" => "",
			"width_390" => "",
			"width_768" => "",
			"width_980" => "",
			"width_1400" => "",
			"auto_play" => "",
			"stop_on_hover" => "",
			"navigation" => "",
			"mouse_drag" => "",
			"link" => "",
			"is_circle_show" => "",
			"is_curve" => "",
			"curve_color" => "",
			"curve_bg_color" => ""
		), $atts));
		global $fdata, $post;
		
		$link = ( $link == '||' ) ? '' : $link;
		$link = vc_build_link( $link );
		$a_href = $link['url'];
		$a_title = $link['title'];
		$a_target = $link['target'];
		$a_target = $a_target!=''? 'target="'. $a_target .'"' :'';

		$categories = explode(",", $categories);
	
		if ( post_type_exists( 'portfolio' ) ) {		
			$portfolio_categs = get_terms('project_categories', array('hide_empty' => false));
			$categ_list = NULL;
	
			foreach ($categories as $category) {
				foreach($portfolio_categs as $portfolio_categ) {
					if($category === $portfolio_categ->name) {
						$categ_list[ $category ]= $portfolio_categ->slug;
					}
				}
			}
		}

				if( count($categ_list) > 0 ):
				$categ_list = array_values($categ_list);
					$args1 = array(
						'post_type'=>'portfolio',
						'posts_per_page' => $number,
						'tax_query' => array(
							array(
								'taxonomy' => 'project_categories',
								'field'    => 'slug',
								'terms'    => $categ_list,
							),
						),
					);
				else:
					$args1 = array(
						'post_type'=>'portfolio',
						'posts_per_page' => $number,
					);									
				endif;
						
		//generating random id
		$id = folio_random_id(5);
		$key = wp_generate_password(5, false, false);
		wp_enqueue_script('fitvids_js');
		wp_enqueue_script('responsiveslides_js');
		wp_enqueue_style('responsiveslides_css');
		wp_enqueue_script('project_script_js');

		wp_enqueue_style('owl_carousel_css');
		wp_enqueue_style('owl_transitions_css');
		wp_enqueue_style('project_style_css');
		
		wp_enqueue_script('owl_carousel_js');
		wp_enqueue_script('custom_portfolio_js');
		$slug = isset( $fdata['portfolio_slug'] ) && !empty( $fdata['portfolio_slug'] )? $fdata['portfolio_slug']: 'portfolio';
		
		
		wp_localize_script( 'project_script_js', 'homeUrl', array( 'home_url' => home_url('/'), 'portfolio_slug' => $slug));

		wp_localize_script( 'custom_portfolio_js', 'folio_port_'.$key, 
		array( 
			'id' => $id, 
			'width_390' => $width_390,
			'width_768' => $width_768,
			'width_980' => $width_980,
			'width_1400' => $width_1400,
			
			'auto_play' => $auto_play === 'true'? 3000: 'false',
			'stop_on_hover' => $stop_on_hover,
			'navigation' => $navigation,
			'mouse_drag' => $mouse_drag,
			 
			) 
		);

			ob_start();?>
					

    <div id="portfolio_wrapper" class="portfolio_wrapper">
        <div class="portfolio_listing" id="folio-<?php echo $id; ?>" data-key = "<?php echo $key; ?>">
				
<?php

						$my_query = new WP_Query($args1);
							if( $my_query->have_posts() ) {
								while ($my_query->have_posts()) : $my_query->the_post();
?>
                                    <div class="single_portfolio item greyscale">
                                        <a href="#!<?php echo $slug;?>/<?php echo $post->post_name; ?>">
                                        	<?php if ( has_post_thumbnail() ) {?>
                                            	<?php $id = get_post_thumbnail_id(get_the_ID());?>
                                                <img src="<?php echo aq_resize(wp_get_attachment_url( $id ),390 ,394, true );?>" 
                                                alt="<?php the_title();?>">
											<?php }else{?>
                      							<img src="<?php echo IMAGES_PATH.'fallback_images/portfolio-img-feature.jpg';?>" />
											<?php }?>
                                        </a>
                                    </div>
<?php								
							endwhile;
						}
						wp_reset_query(); 
?>

        </div>

    </div>

	
    <section class="section_holder <?php echo $is_curve === 'yes' ? ' zee_curve_container zee_b_curve_container ' : ''; echo $curve_color.' '. $curve_bg_color;?>">
    	<div class="container section_container <?php echo $is_curve === 'yes' ? ' section_curve_container' : '';?>">            
            
            <div class="row">
<?php //endif; ?>
                <!-- ajax_project_wrapper starts -->  
                <div id="ajax_project_wrapper" >     
    
                    <!-- project_nav starts --> 
                    <div id="project_nav">
                        <ul>
                        	<li id="previous_project"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                            <li id="next_project"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>  
                    </div>
                    <!-- project_nav ends --> 
                    
                    <!-- close_project starts -->
                    <div id="close_project">
                        <a href="#project_loader"><i class="fa fa-times"></i></a>               
                    </div>  
                    <!-- close_project ends -->
                    
                    <!-- project_loader starts -->
                    <div id="project_loader"></div>
                    <!-- project_loader ends -->
                    
                    <!-- project_container_holder starts -->
                    <div id="project_container_holder">
                        <!-- project_container starts -->
                        <div id="project_container">
                        </div>
                        <!-- project_container ends -->
                    </div>
                    <!-- project_container_holder ends -->
    
                </div>
                <!-- ajax_project_wrapper ends -->   

            <?php echo $is_curve === 'yes' ? folio_get_curve_side(  'right' ): ''?>
            </div>
<?php if( $carousel_view !== 'container' && $is_circle_show === 'true' ): ?>                  <!-- circle_button -->
				<?php
				$curve_portfolio_row = '';
				if($is_curve === 'yes'){ // Curved row ?>
                <a class="circle_button circle_button_bottom scroll_next_section" 
                data-scroll-id="true" <?php echo $a_target; ?> href="<?php echo $a_href ?>">
                	<i class="fa fa-file-o"></i><?php echo !empty($a_title)? $a_title : 'View All Projects' ; ?>
                </a>
                <?php
				}else{// Standard row
				?>
                <div class="zee_straight">
                    <a class="circle_button circle_button_bottom scroll_next_section" 
                    data-scroll-id="true" <?php echo $a_target; ?> href="<?php echo $a_href ?>">
                        <i class="fa fa-file-o"></i><?php echo !empty($a_title)? $a_title : 'View All Projects' ; ?>
                    </a>
                </div>
                <?php
				}?>
                <!-- circle_button -->
<?php endif; ?>            
            
        </div>
    </section>
 <?php
			$output = ob_get_contents();

			ob_end_clean();
			return $output;
	}

	add_shortcode("folio_portfolio_carousel", "folio_portfolio_carousel");	


/*--------------------------------------------------------------------------------
|				KraftiveComments:  Portfolio Module / Element Shortcode			|						
--------------------------------------------------------------------------------*/
	function folio_portfolio_grid($atts, $content = null) {
	
		$output = $colunm_class = $layout = $filter_id = '';
	
		extract(shortcode_atts(array(
			"number" => "-1",
			"categories" => "",
			"allword" => "All Projects",
			"layout" => '',
			"align" => "align_center",
		), $atts));
		
	
		global $post;
		$id = folio_random_id(5);
		$filter_id = folio_random_id(6);
		$key = wp_generate_password(5, false, false);

		wp_enqueue_style('isotope_animation_css');
		wp_enqueue_script('isotope_js');
		wp_enqueue_script('custom_isotop_js');
		
		wp_localize_script( 'custom_isotop_js', 'folio_portfolio_grid_'.$key, array( 
										'id' => $id, 
										'colunms' => $layout, 
										'filter' => $filter_id  )
						);

		if( $layout === 'four_columns' ):
			$colunm_class = 'work_item_4_col';
		endif;
		$categories = explode(",", $categories);
	
		if ( post_type_exists( 'portfolio' ) ) {		
			$portfolio_categs = get_terms('project_categories', array('hide_empty' => false));
			$categ_list = NULL;
	
			foreach ($categories as $category) {
				foreach($portfolio_categs as $portfolio_categ) {
					if($category === $portfolio_categ->name) {
						$categ_list[ $category ]= $portfolio_categ->slug;
					}
				}
			}
		}
ob_start();
	?>
			<div class="heading_cover">
				<!-- work_nav starts -->
				<nav class="work_nav <?php echo $align; ?>">
					<ul id="filters_<?php echo $filter_id;?>">
						<li class="current">
							<a data-filter="*" href="#"><i class="fa fa-th-large"></i>
								<?php echo !empty($allword)? $allword: 'All Projects'; ?>
							</a>
						</li>
						<?php 
					if( count($categ_list) > 0 ):
						foreach( $categ_list as $index => $category  ):
						?>
						<li><a data-filter=".<?php echo $category; ?>" href="#"><?php echo $index; ?></a></li>												 								<?php
						endforeach;
					endif;
						?>
					</ul>
				</nav>
				<!-- work_nav ends-->
			</div>
	<?php	
	if( count($categ_list) > 0 ):
	$categ_list = array_values($categ_list);
		$args1 = array(
			'post_type'=>'portfolio',
			'posts_per_page' => $number,
			'tax_query' => array(
				array(
					'taxonomy' => 'project_categories',
					'field'    => 'slug',
					'terms'    => $categ_list,
				),
			),
		);
	else:
		$args1 = array(
			'post_type'=>'portfolio',
			'posts_per_page' => $number,
		);									
	endif;
	?>

	<div class="work_listing" id="portfolio_grid_<?php echo $id; ?>" data-key = "<?php echo $key;?>">
		<?php						
			$my_query = new WP_Query($args1);
				if( $my_query->have_posts() ) {
					while ($my_query->have_posts()) : $my_query->the_post();
						$terms = get_the_terms( get_the_ID(), 'project_categories' );
						$term_val = '';
						if($terms) { 
							foreach ($terms as $term) { 
								$term_val .=folio_get_taxonomy_cat_slug($term->name) .' '; 
							} 				
						}
						$tagline = get_post_meta($post->ID,'portfolio_tagline',true);							
				?>
				<div class="work_item isotope-item <?php echo $colunm_class .' '. $term_val; ?>">
					<div class="single_work animated" data-animdelay="0.2s" data-animspeed="1s" data-animrepeat="0" data-animtype="fadeInUp">
						<figure class="view view-second">
							   <?php if ( has_post_thumbnail() ) {?>
									<?php $id = get_post_thumbnail_id(get_the_ID());?>
									<img src="<?php echo aq_resize(wp_get_attachment_url( $id ),390 ,394, true );?>" 
									alt="<?php the_title();?>">
								<?php }else{?>
									<img src="<?php echo IMAGES_PATH.'fallback_images/portfolio-img-feature.jpg';?>" />
								<?php }?>
								<div class="mask"></div>
								<div class="content">
									<div class="links">
										<a href="<?php the_permalink(); ?>" class="info-link" target="_blank">
										</a>
									</div>
									<div class="work_detail">
										<h3><?php the_title(); ?></h3>
										<p><?php echo $tagline; ?></p>
									</div>
								</div>
						</figure>
					</div>
				</div>
			<?php								
				endwhile;
			}
			wp_reset_query(); 
			?>
		</div>
<?php	
			$output = ob_get_contents();
			ob_end_clean();
			return $output;
	}

	add_shortcode("folio_portfolio_grid", "folio_portfolio_grid");	


/*--------------------------------------------------------------------------------
|				KraftiveComments:  Google Map Module / Element Shortcode			|						
--------------------------------------------------------------------------------*/

	function folio_google_map($atts, $content = null) {
		$output = $carousel_view = $style = '';
		extract(shortcode_atts(array(
			'map_layout' => 'full',
			'title' => get_bloginfo('name'),
			'is_button' => '',
			'map_state' => 'open',
			'type' => 'default',
			'location' => 'address',
			'marker_title' => get_bloginfo('name'),
			'marker' => '',
			'marker_height' => '308',
			'marker_width' => '105',
			'button_text' => __('Location Map', 'kraftives'),
			'latitude' => '37.422117',
			'longitude' => '-122.084053',
			'zoom' => '14',
			'address' => __('38th AVENUE STREET, Calgary, AB Canada', 'kraftives'),
			'is_curve' => '',
			'map_height' => '',
			'map_width' => '',

			//'curve_color' => ''
		), $atts));

		//custom height and width
			if( $map_height !== '' ){
				$style .= 'height: '.$map_height.'px;';
			}
			if( $map_width !== '' ){
				$style .= 'width: '.$map_width.'px;';
			}

		//generate random id for map
		$map_id = folio_random_id(3);
		$toggle_id = folio_random_id(4);
		if( $marker !== '' ):
		$marker = folio_get_image_src( $marker );
		else:
		$marker = IMAGES_PATH.'fallback_images/images.png';
		endif;
		wp_enqueue_script('googlemaps_js');
		wp_enqueue_script('gmap3_js');
		
		if( $location === 'lat_long' ){
				$location_type = 'latLng:['.$latitude.', '.$longitude.'], data:"'.$marker_title.'"';
		}else{
				$location_type = 'address:"'.$address.'", data:"'.$marker_title.'"';
		}
	ob_start();?>
	
<!-- Google map circle button -->
<?php echo $is_curve !== 'yes'? '<div class="zee_straight">' : ''; ?>
    <div class="container">
    	<?php 
			if( $is_curve === 'yes' ):
				echo folio_get_curve_side(  'left' );
			endif;
		?>
        <?php if( $carousel_view !== 'container' && $is_button === 'true' ): ?>
                <a id="<?php echo $toggle_id; ?>" class="circle_button circle_button_top toggle_section_button toggle_map_button" 
                        href="#map_<?php echo $map_id; ?>">
                            <i class="fa fa-times"></i><?php echo $button_text; ?>
                </a>
        <?php endif; ?>
    </div>
    
    <div class="map_mask"></div>
    
    <div id="map_<?php echo $map_id; ?>" class="google_map" <?php if( $map_height !== '' ||  $map_width !== '' ){echo 'style = "'.$style.'"';} ?>></div>
<?php echo $is_curve !== 'yes'? '</div>' : ''; ?>

	<script type="text/javascript">

			jQuery(document).ready(function($){
			"use strict";
			/* Google Map Loading */
		/* toggle_section_button Start */
			var $map_state = '<?php echo $map_state;?>';
			var $map_toggle_btn_id = jQuery('#<?php echo $toggle_id; ?>');
			var $toggle_element = jQuery('#<?php echo $toggle_id; ?>').attr('href');
			if($map_state  == 'close'){
				if($($map_toggle_btn_id).hasClass('toggle_map_button')){
					jQuery($toggle_element).siblings('.map_mask').toggle('blind', {direction:'up'}, 1000);
				}
				jQuery($toggle_element).toggle('blind', {direction:'up'}, 1000);
			}
			
		jQuery($map_toggle_btn_id).click(function(e){
			e.preventDefault();
			if($(this).hasClass('toggle_map_button')){
				jQuery($toggle_element).siblings('.map_mask').toggle('blind', {direction:'up'}, 1000);
			}
			jQuery($toggle_element).toggle('blind', {direction:'up'}, 1000);
			e.stopPropagation();
	
		});
	
	/* toggle_section_button End */
	
	



		$('#map_<?php echo $map_id; ?>').gmap3({
			map: {
				options: {
					maxZoom: <?php echo $zoom;?>,
					minZoom: 8,
					mapTypeId: "folio_map",
					mapTypeControlOptions: {
						mapTypeIds: ["folio_map", google.maps.MapTypeId.ROADMAP, google.maps.MapTypeId.SATELLITE, google.maps.MapTypeId.TERRAIN]
					}
				} 
			},
			styledmaptype:{
				id: "folio_map",
				options:{
					name: "Folio Map"
				},
				
				//map type here : i.e default, dark, greyscale
				<?php echo folio_mapType( $type ) ;?>
				
			},
			marker:{
				<?php echo $location_type;?>,
				options: {
					icon: new google.maps.MarkerImage(
						"<?php echo $marker; ?>",
						new google.maps.Size(<?php echo $marker_width; ?>, <?php echo $marker_height; ?>, "px", "px")
					)
				},
			<?php if( ! empty( $marker_title ) ):?>
				events:{
			  mouseover: function(marker, event, context){
				var map = $(this).gmap3("get"),
				  infowindow = $(this).gmap3({get:{name:"infowindow"}});
				if (infowindow){
				  infowindow.open(map, marker);
				  infowindow.setContent(context.data);
				} else {
				  $(this).gmap3({
					infowindow:{
					  anchor:marker,
					  options:{content: context.data}
					}
				  });
				}
			  },
			  mouseout: function(){
				var infowindow = $(this).gmap3({get:{name:"infowindow"}});
				if (infowindow){
				  infowindow.close();
				}
			  }
			}
			<?php endif; ?>

			},
		},
		"autofit" );			
	});
		</script>	
	<?php
		$output = ob_get_contents();
		ob_end_clean();
		return $output;	
	}

	add_shortcode("folio_google_map", "folio_google_map");

/*--------------------------------------------------------------------------------
|				KraftiveComments:  Pricing Table Module / Element Shortcode		|						
--------------------------------------------------------------------------------*/

	function folio_pricing($atts,$content = null){
		$output = '';
		extract(shortcode_atts(array(
				'package_heading' => '',
				'package_price' => '',
				'package_unit' => '',
				'package_content' => '',
				'package_link' => '',
				'package_featured' => 'none',
				'el_class' => '',
		), $atts));
	
		$link = ( $package_link == '||' ) ? '' : $package_link;
		$link = vc_build_link( $package_link );
		$a_href = $link['url'];
		$a_title = $link['title'];
		$a_target = ($link['target']!='')?'target="'. $link['target'] .'"':'';
		
		if( isset($package_featured) && $package_featured != 'none' ) { $favorite = $package_featured; }else{$favorite = ' dark_pricing ';}
		
		$css_class = ' '.$el_class.' '.$favorite;

		$features = explode( ',', $package_content );

		$buy_button = ($a_title!='' && $a_href!='') ? '<a href="'. $a_href .'" title="'. $a_title .'" '. $a_target .' class="button button-medium">'. $a_title .'</a>' : '';
	
		ob_start();?>
		
        <div class="folio_pricing_single  <?php echo $css_class; ?>"> <!--animated fadeIn -->
            <div class="price_cost">
                <h3 class="price"><?php echo $package_price; ?></h3>
                <span class="duration"><?php echo $package_unit; ?></span>
            </div>
            <div class="price_title">
                <h2><?php echo $package_heading; ?></h2>
            </div>
            <div class="pricing_details">
			<?php if( count($features) > 0 ):?>
                    <ul>
                    <?php foreach( $features as $feature ):?>
                            <li><?php echo $feature; ?></li>
                    <?php endforeach; ?> 
                    </ul>
            <?php endif; ?> 
                <a <?php echo $a_target; ?> href="<?php echo $a_href; ?>" class="button button-medium">
                    <?php echo $a_title; ?>
                </a>
            </div>
        </div>
		<?php
		$output = ob_get_contents();
		ob_end_clean();
		return $output;	
	}

	add_shortcode( 'folio_pricing', 'folio_pricing' );

/*--------------------------------------------------------------------------------
|				KraftiveComments:  Quotes Module / Element Shortcode		|						
--------------------------------------------------------------------------------*/

	function folio_quote($atts,$content = null){
		$output = '';
		extract(shortcode_atts(array(
				'style' => 'quote_1',
				'qoute_content' => '',
				'author' => '',
				'el_class' => '',
		), $atts));
		$class = $style;
		if( !empty($el_class) ){ $class .= ' '.$el_class;  }
	ob_start();
	?>
    <div class="content_bar">
		<blockquote class="<?php echo $class; ?>">
            <p> <?php echo $qoute_content; ?> </p>
            <strong>&ndash;  <?php echo $author; ?></strong>
		</blockquote>
    </div>
	<?php
		$output = ob_get_contents();
	ob_end_clean();
	return $output;	
	}
	
	add_shortcode( 'folio_quote', 'folio_quote' );

/*--------------------------------------------------------------------------------
|				KraftiveComments:  Alerts Module / Element Shortcode		|						
--------------------------------------------------------------------------------*/
	function folio_alerts($atts,$content = null){
		$output = '';
		extract(shortcode_atts(array(
				'style' => 'white',
				'alert_message' => '',
				'el_class' => '',
		), $atts));
		$class = $style;
		if( !empty($el_class) ){ $class .= ' ' . $el_class;  }
	ob_start();?>
		<div class="folio-alert <?php echo $class; ?>"><?php echo $alert_message; ?></div>
		<?php 
		$output = ob_get_contents();
	ob_end_clean();
	return $output;	
						  
	}
	
	add_shortcode( 'folio_alert', 'folio_alerts' );

/*--------------------------------------------------------------------------------
|				KraftiveComments:  Spacer Module / Element Shortcode		|						
--------------------------------------------------------------------------------*/


	function folio_spacer($atts,$content = null){
				$height = $output = '';
				extract(shortcode_atts(array(
					"height" => "",
				),$atts));
				
				$style = 'style = "height: '. $height .'px"';
		ob_start();?>
				<div class="folio_spacer" <?php echo $style;?>></div>
				<?php 
			$output = ob_get_contents();
		ob_end_clean();
		return $output;	
	}
	
	
	add_shortcode( 'folio_spacer', 'folio_spacer' );

/*--------------------------------------------------------------------------------
|				KraftiveComments:  Animator Module / Element Shortcode		|						
--------------------------------------------------------------------------------*/

	function folio_animator($atts, $content = null ){
		$output = '';
		//
		extract(shortcode_atts(array(
			'animation_delay' => 0.2,
			'animation_speed' => 1,
			'animation_repeat' => 0,
			'animation_type' => '',
			'el_class' => ''
		), $atts));
		ob_start();?>
            <div class="animated <?php echo $el_class; ?>" 
                data-animdelay="<?php echo $animation_delay;?>'s" 
                data-animspeed="<?php echo $animation_speed;?>'s" 
                data-animrepeat="<?php echo $animation_repeat; ?>" 
                data-animtype="<?php echo $animation_type; ?>">
                    <?php echo wpb_js_remove_wpautop($content); ?>
            </div> 
		<?php 
			$output = ob_get_contents();
		ob_end_clean();
		return $output;	
	}
	add_shortcode( 'folio_animator', 'folio_animator' );

/*--------------------------------------------------------------------------------
|				KraftiveComments:  Blog Grid Module / Element Shortcode		|						
--------------------------------------------------------------------------------*/

function folio_blog_grid($atts, $content = null) {
$output = $columns_count = $column_class = ''; 
	extract(shortcode_atts(array(
		"number" => "6", 
		"categories" => "",
		"columns_count" => "",

	), $atts));
	
	global $post;

	if( $columns_count === 'hm_3_col' ):
		$column_class = 'col-sm-4';
		$height = 171;
		$width = 370;
	else:
		$column_class = 'col-sm-6';
		$height = 264;
		$width = 570;

	endif;
	$count = 	$columns_count; 
	$output = '';
		$blog_array_cats = get_terms('category', array('hide_empty' => false));
		if(empty($categories)) {
			foreach($blog_array_cats as $blog__array_cat) {
				$categories .= $blog__array_cat->slug .', ';
			}
		}
		
		$args = array(
			'orderby'=> 'post_date',
			'order' => 'date',
			'post_type' => 'post',
			'category_name' => $categories,
			'posts_per_page' => $number,
		);
	
	$my_query = new WP_Query($args);
	ob_start();
	if( $my_query->have_posts() ) {?>
       <div class="row">
        <div class="hm_blog_post content_bar <?php echo $columns_count; ?>">
            <?php while ($my_query->have_posts()) : $my_query->the_post();?>
                <div class="<?php echo $column_class; ?>">
                    <div <?php post_class('post'); ?>>
                        <?php
                        $format = get_post_format();
						
						if( $format ){
							include(locate_template('vc_extend/formats/format-'.$format.'.php'));
						}
                        ?>
                        <div class="post_content">
                        <!-- date_holder starts -->
                            <div class="date_holder">
                                <div class="date align_center">
                                    <span class="date_day"><?php echo get_the_date('d');?></span>
                                    <span class="date_month"><?php echo get_the_date('M');?></span>
                                </div>
                            </div>
                            <!-- date_holder ends -->
                            
                            <!-- meta_holder starts -->
                            <div class="meta_holder">
                                <div class="title_holder">
                                    <h2 class="post_title">
                                        <a href="<?php the_permalink(); ?>">
                                        	<?php if(!get_the_title()){ the_permalink();  }else{the_title();}?>
                                        </a>
                                    </h2>
                                <!--Awsome POST WITH HTML5 HD VIDEO-->
                                </div>
                                <div class="post_meta">
                                    <span><?php _e( 'Posted by', 'kraftives' );?>
                                    	<?php  the_author_posts_link(); ?>
                                    </span>
                                </div>
                            </div>
                            <!-- meta_holder ends -->
                            
                            <?php the_excerpt(); ?>
                            <a class="folio-link-url" href="<?php the_permalink(); ?>">
								<?php _e('Read more', 'kraftives'); ?> 
                                <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </div>
						
                    </div>
                </div>
            <?php endwhile;?>
						
        </div>
      </div> 

		 
		<?php
	}
	wp_reset_query();
		$output = ob_get_contents();
	ob_end_clean();
	return $output;	
}

add_shortcode("folio-blog-grid", "folio_blog_grid");	


/*--------------------------------------------------------------------------------
|				KraftiveComments:  Header Module / Element Shortcode		|						
--------------------------------------------------------------------------------*/
	function folio_sliders($atts,$content = null){
		$output = $slider = $words = $style = $bg_image = $heading_classes = '';
	
				extract(shortcode_atts(array(
					"header_logo" => "",//General options
					"show_menu" => "",
					"menu_style" => "",
					"show_next_icon" => "",
					"next_icon_animation" => "",
					"slider" => "",
					"margin_top_header_logo" => "",
	
					"heading_style" => "",
  					"title" => "",//static header starts
					"sub_title" => "",
					"bg_image" => "",
					"is_curve_header" => "",
					
					"rev_slider" => "",//Revolution Slider starts
				),$atts));
	
		global $post;
		
		if( $heading_style === 'style_2' ){
			$heading_classes = 'span_center align_center slim_text';
		}elseif( $heading_style === 'style_3' ){
			$heading_classes = 'slim_text';
		}
	
		if( !empty($bg_image) ):
			$bg_image = 'style="background-image:url('.folio_get_image_src( $bg_image ).');"';
		endif;	

	ob_start();?>

		
        <?php if( $slider === 'static_banner'){?>
        <div class="static_banner <?php if( $menu_style == 'style_1' ) echo 'static_banner_2';?>" <?php echo $bg_image; ?>>
            <!-- header-menu-1 starts -->
            <div class="<?php echo $menu_style !== 'style_1' ? $menu_style: 'header-menu-1'; ?> menu-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- logo starts -->
                            <?php if( isset( $header_logo ) && $header_logo != NULL ):?>
                            	<div class="logo">
                                    <figure>
                                        <a href="<?php echo home_url(); ?>">
                                        	<img src="<?php echo folio_get_image_src( $header_logo )?>" alt="Folio Zee Logo">
                                        </a>
                                    </figure>
                            	</div>
                            <?php endif; ?>
                            
                                <!-- header_toggle_menu -->
								<?php if( $show_menu === 'yes' ):?> 
								<div class="header_nav_holder">
									<!--main-nav starts-->
                            	<?php if( $menu_style === 'header-menu-1' || $menu_style === 'header-menu-2' ){?>   
								<?php
									wp_enqueue_script('custom_menu_js');
	
									$folio_menu = ("folio_primarymenu"===get_post_meta( $post->ID, 'select_menu_option', true ))?'':get_post_meta( $post->ID, 'select_menu_option', true );
									
										
									$defaults = array(
										'theme_location'  => 'header-primary-menu',
										'menu'            => $folio_menu,
										'container'       => 'nav',
										'container_class' => 'main-nav',
										'menu_class'      => 'menu',
										'echo'            => true,
										'fallback_cb'     => 'wp_page_menu',
										'items_wrap'      => '<ul id="head-nav" class="%2$s top-nav">%3$s</ul>',
									);
									
									wp_nav_menu( $defaults );
	
								}
						?>
									<!-- main-nav ends-->
									<!-- header_toggle_menu -->
								<?php if( $menu_style === 'header-menu-1' || $menu_style === 'header-menu-2' ):?> 
                                	<div class="header_toggle_menu">
                                        <div class="menu_small_btn">
                                            <div class="open_menu toggle_top_menu_btn">
                                                <i class="fa fa-bars"></i>
                                            </div>
                                            <div class="close_menu toggle_top_menu_btn">
                                                <i class="fa fa-times"></i>
                                            </div>
                                        </div>
                                	</div>
                               <?php elseif( $menu_style === 'style_1' ): ?>
                                	<div class="header_toggle_menu">
                                    	<div class="menu_small_btn sb-toggle-left">
                                        <div class="folio-sb-toggle-btn sb-toggle-right">
                                            <i class="fa fa-bars"></i>
                                        </div>
                                    </div>
                                	</div>
                                <?php endif;?>
                                    <!-- header_toggle_menu -->
								</div>
                                
                                <?php endif; ?>
                                
                                <!-- header_toggle_menu -->
                           </div>
                    </div>
                            
                 </div>
            </div>
                   <!-- </div>-->
            <!-- header-menu-1 ends -->

        	<div class="container">
            	<div class="row">
                    <!-- text_banner_holder starts -->
                    <div class="text_banner_holder">
                        
                        
					<?php if( $heading_style === 'style_1' ):?>                        
                        <div class="col-xs-2">
                        	<div class="skew_shape">
                            </div>
                        </div>
                     <?php endif; ?>
                        <div class="heading_wrap col-xs-10 <?php echo $heading_classes; ?> ">
                            <h2><?php echo folio_highlight_it(folio_break_it( $title )); ?></h2>
                            <h3 class="<?php if( $heading_style === 'style_2' ) echo 'align_center';?>"><?php echo $sub_title; ?></h3>
                            <!-- next_section starts -->
                            <?php if( $show_next_icon === 'yes' ):?>
                            	
                            <div class="next_section <?php if( $next_icon_animation === 'yes' ) echo 'animated';?> animate_infinite" data-animdelay="0.2s" data-animspeed="1.4s" data-animrepeat="1" data-animtype="bounce">
                                <a href="javascript:void(0);" class="scroll_next_section">
                                    <i class="fa fa-angle-down"></i>
                                </a>
                            </div>
                            <?php endif; ?>
                            <!-- next_section ends -->
                        </div>
                    </div>
                    <!-- text_banner_holder ends -->
				</div>
            <?php 
				if( $is_curve_header === 'yes' ){
					echo folio_get_curve_side(  'right' );
				}
			?>
            </div>
        </div>
        <?php }elseif( $slider === 'revSlider' ){?>
				<?php echo do_shortcode('[rev_slider '. $rev_slider.']');?>
        <?php }?>
			
        <?php if( $menu_style === 'style_1' ){?>
        		
        	
			<?php
				define('SLIDEBAR', $menu_style);
				define('SITE_LOGO', folio_get_image_src( $header_logo ));
				wp_enqueue_style('slidebars_css'); 
				wp_enqueue_script('slidebars_js');
				wp_enqueue_script('custom_menu_js');
				
			?>
            <script>
            
            jQuery(document).ready(function($) {
				'use strict'
				$.slidebars({
					hideControlClasses: true
				});
            });		  /* Slidebar Navigation */
            </script>

        <?php } ?>

<?php

	$output = ob_get_contents();
	ob_end_clean();
	return $output;
	}
	
	
	add_shortcode( 'folio_header', 'folio_sliders' );


/*--------------------------------------------------------------------------------
|				KraftiveComments:  Header Module / Element Shortcode		|						
--------------------------------------------------------------------------------*/

	function folio_team_post($atts, $content = null ){
		$output = $thumbs = $stats = $description = $social = '';
		//enqueue bx slider style and script
		
		extract(shortcode_atts(array(
			'display_members' => '',
			'display_selected' => '',
			'show_next_prev' => '',
			'el_class' => ''
		), $atts));
		if( $display_selected  ){
			$display_selected = explode(',', $display_selected);
		}
	ob_start();?>
<?php 
	if( isset( $display_selected ) && count( $display_selected > 0 ) ):
		$args = array(  'post_type' => 'folio_team', 
						'posts_per_page' => $display_members, 
						'post__in' => $display_selected
						 );
	else:
		$args = array(  'post_type' => 'folio_team', 
						'posts_per_page' => $display_members, 
						 );
	
	endif;	
	$query = new WP_Query( $args );
	$total_posts = $query->found_posts ;
	$count = 1;	


		$carouselId = folio_random_id(5);
		$sliderId = folio_random_id(6);
		$key_team = wp_generate_password(5, false, false);
		$key_stat = wp_generate_password(5, false, false);
		wp_enqueue_script('flexslider_js');
		
		wp_enqueue_script('custom_team_js');
		
		wp_localize_script( 'custom_team_js', 'folio_carousel_'.$key_team, 
		array( 
			'carouselId' => $carouselId, 
			'sliderId' => $sliderId,
			'show_next_prev' => $show_next_prev) 
		);
		
		

		
	if( $query->have_posts() ){
?>

                <!-- team_carousel starts -->
<div id="carousel_<?php echo $carouselId;?>" class="team_carousel" data-key = "<?php echo $key_team;?>">
    <ul class="slides">
<?php
		while( $query->have_posts() ){
			$query->the_post();		
			if( has_post_thumbnail( get_the_ID() ) ){
			$designation = get_post_meta( get_the_ID(), 'folio_designation', true );
			$skills = get_post_meta( get_the_ID(), 'folio_add_skill', true );
			
			$socials['fa-facebook'] = get_post_meta( get_the_ID(), 'folio_facebook', true );
			$socials['fa-linkedin'] = get_post_meta( get_the_ID(), 'folio_linkedin', true );
			$socials['fa-twitter'] = get_post_meta( get_the_ID(), 'folio_twitter', true );
			$socials['fa-google-plus'] = get_post_meta( get_the_ID(), 'folio_googleplus', true );
?>
		 <?php 
			if( count($skills) > 1 ):
				foreach( $skills as $skill ):
					$skill_name = $skill['folio_re_skill_name'];
					$skill_percentage = $skill['folio_re_skill_percentage'];
					$stats .= 
					'<span class="team_stats">
						<span class="stats_bar_holder">
							<span class="stats_bar" data-percent="'.$skill_percentage.'"></span>
						</span>
						<span class="stats_title">'.$skill_name.'</span>
					</span>';
				endforeach;
			endif;?>

            <li>
            <img src="<?php echo aq_resize(folio_get_featured_image( get_the_id()), 291, 310, true );?>" alt="<?php the_title();?>" />
                <div class="member_basic">
                    <h3 class="member_name"><?php the_title(); ?></h3>
                    <p class="member_designation"><?php echo $designation; ?></p>
                </div>
            </li>
<?php 
			foreach( $socials as $class => $link ):
				if( !empty( $link ) ){
					$social .= '<li><a href="'.$link.'"><i class="fa '. $class .'"></i></a></li>';
				}
			endforeach;
			$description .= 
				'<li>
					<div class="col-sm-3">
						'.$stats.'
						<ul class="team_social">
							'.$social.'
						</ul>
					</div>
					<div class="col-xs-offset-1 col-sm-7 team_description">
						'.get_the_content().'
					</div>
				</li>';
	$stats = '';
	$social = '';
?>
    	<?php } ?>
	<?php } ?>
    </ul>
</div>
<!-- team_carousel ends -->
<!-- team_slider starts -->
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div id="slider_<?php echo $sliderId;?>" class="team_slider">
                    <ul class="slides">
                        <?php echo $description;?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
                <!-- team_slider ends -->
<?php }
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
	}
	add_shortcode( 'folio_team_post', 'folio_team_post' );//Shortcode


?>
