<?php
$output = $section_id = $section_type = $el_class = $bg_image = $bg_color = $css = $view = $section_id_string = $class = $gray_background = $inner_classes = $slider = $is_curve = '';
extract(shortcode_atts(array(
    'section_id' 	  	=> '',
	'row_circle_button'	=> '',
	'circle_button_icon'=> 'fa-file-o',
	'circle_button_text'=> 'View All',
	'circle_button_url'	=> '#',
	'section_type' 		=> 'main_section',
    'bg_image'        	=> '',
	'is_gray'		 	=> 'none',
    'bg_color'        	=> '',
	'padding'		 	=> '',
	'curve_position'	=> '',
	't_c_color_type'	=> '',
	't_c_bg_color_type'	=> '',
	'b_c_color_type'	=> '',
	'b_c_bg_color_type'	=> '',
	'el_class'        	=> ''
), $atts));
global $fdata, $post;

$is_parent = $this->settings['base']=='vc_row'?true:false;

//theme style curveed and straight classes

/*if( $fdata[ 'theme_style' ] === 'curved' ){
	$section_classes = 'zee_curve_container zee_b_curve_container';
	$container_classes = '';
	
}else{

}*/


if( $is_gray === 'bg_grey' ):
	$gray_background = $is_gray;
	$bg_color = '';
endif;


wp_enqueue_style( 'js_composer_front' );
wp_enqueue_script( 'wpb_composer_front_js' );
wp_enqueue_style('js_composer_custom_css');

	
		
	if ( !empty ( $section_id ) ) {
			$section_id_string .= 'id="' . $section_id . '"'; 
	}
//Section Classes
$section_classes = 'section_holder';
$section_container_class = 'section_container ';
$section_container_class.= $padding !== 'none' ? $padding : '';
//Parallex Classes
$parallex_section_classes = 'parallex_wrapper zee_para_container';
$parallex_inner_classes = 'parallex_folio';

$el_class = $this->getExtraClass($el_class);

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'section_holder ' . get_row_css_class().' '.$gray_background . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

//Curve Classes
$curve_position;
$curve_colors_classes;
$t_c_color_type;
$t_c_bg_color_type ;
$b_c_color_type;
$b_c_bg_color_type;
$curve_colors_classes = ' '.$t_c_color_type.' '.$t_c_bg_color_type.' '.$b_c_color_type.' '.$b_c_bg_color_type;
$curve_container_class = $curve_position!='zee_d_curve_container'?'section_container section_curve_container':'';

$css_curve_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'zee_curve_container ' . get_row_css_class().' '.$gray_background .' '.$curve_position.$curve_colors_classes.' '. $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

//echo $content;

$style = $this->buildStyle($bg_image, $bg_color);




/* Headers RegExp Matching */
	if( !is_array( folio_match_expression( 'folio_header', $content, 'shortcode' ) ) ):
		$slider = folio_match_expression( 'folio_header', $content, 'shortcode' );
	endif;

/* Carousel RegExp Matching */
	if( !is_array( folio_match_expression( 'carousel_view', $content, 'attr' ) ) ):
		$view = folio_match_expression( 'carousel_view', $content, 'attr' );
	endif;

/* Map RegExp Matching */
	if( !is_array( folio_match_expression( 'map_layout', $content, 'attr' ) ) ):
		$map = folio_match_expression( 'map_layout', $content, 'attr' );
	endif;

/* Checking is google map is CURVE or not RegExp Matching */
	if( !is_array( folio_match_expression( 'is_curve_header', $content, 'attr' ) ) ):
		$is_curve = folio_match_expression( 'is_curve_header', $content, 'attr' );
	endif;



if( $section_type === 'main_section' && isset($map) && $map === 'full'  || isset( $slider ) && $slider != NULL ):

	if( isset( $map ) && $map !== '' ){$class = 'class="sec-map"';}
	if( isset( $slider ) && $slider !== '' && $is_curve === 'yes' ){$class = 'class="zee_curve_container zee_b_curve_container"';}	
	$output .= '<section '. $section_id_string .' '. $class .'>';

/* Parallex Section Starts*/
elseif( $section_type === 'parallex_section' ):

	$parallax_id = 'parallax-'.folio_random_id(3);
	wp_enqueue_script('parallax_js');
	wp_enqueue_script('localscroll_js');?>
	
		<script type="text/javascript">
            jQuery(document).ready(function($){
                "use strict";
                    /* Parallax Quote Start */
					jQuery(window).scroll(function(event) {
							// check current parallax is visible and parallax_visible class available?
							// if not then invoke parallax function on it and add class
						if (jQuery('#<?php echo $parallax_id; ?>').visible(true)) {
							//if (jQuery('#<?php echo $parallax_id; ?>').visible(true) && (jQuery('#<?php echo $parallax_id; ?>').hasClass('parallax_visible')!== true)) {
							// adding class parallax_visible to avoid invoking the parallax function on every scroll
							jQuery('#<?php echo $parallax_id; ?>').addClass('parallax_visible');
							jQuery('#<?php echo $parallax_id; ?>').parallax("50%", 0.2);

						}
					});
                    /* Parallax Quote End */
            });
        </script>
	
	<?php
	$para_id = 'id = "'.$parallax_id.'"';
	$style = $this->buildStyle($bg_image);
	$output .= $is_parent==true?'<section '. $section_id_string .' class="'.$css_class.' '.$parallex_section_classes.'">': '';
	
	$output .= '<div '.$para_id.' class="parallex_folio" '.$style.'>';
	
		$output .= $is_parent==true? '<div class="container">' : '';
			$output .= '<div class="row">';

/* Main Section Starts */
elseif( $section_type === 'main_section' || $section_type === ''  ):

	$output .= $is_parent==true?'<section '. $section_id_string .' class="'.$css_class.'"'.$style.'>':'';
	if( $view !== 'full_width' ):
			$output .= $is_parent==true? '<div class="container '.$section_container_class.'">' : '';
				$output .= '<div class="row">';
	endif;
	
/* CURVE Section Starts */
elseif( $section_type === 'curve_section' ):

	$output .= $is_parent==true?'<section '. $section_id_string .' class="'.$css_curve_class.'"'.$style.'>':'';
		$output .= $is_parent==true? '<div class="container '.$curve_container_class.'">' : '';
		if($is_parent==true){
			// Left Curve check
			if($curve_position=='zee_t_curve_container' || $curve_position=='zee_d_curve_container'){
				$output.= folio_get_curve_side('left');
			}
		}
			$output .= '<div class="row">';


endif;	



	$output .= wpb_js_remove_wpautop($content);

/* Map, Header and Featured Work Carousel Ends */
if( $section_type === 'main_section' && isset($map) && $map === 'full' || isset( $slider ) && $slider != NULL  ):
	$output .= '</section>'.$this->endBlockComment('parallex_wrapper');
		if( get_post_meta($post->ID, 'menu_position', true ) === 'true' && isset( $slider ) && $slider != NULL):
			ob_start();
			get_template_part( 'templates/menu-template' );
			$output .= ob_get_contents();
			ob_end_clean();
		endif;

/* Parallex Section Ends */
elseif( $section_type === 'parallex_section' ):

	$output .= '</div>'.$this->endBlockComment('row');
	//$output .= '</div>'.$this->endBlockComment('container');
		if($row_circle_button == 'yes'){
			$output.='<div class="zee_straight"><a href="'.$circle_button_url.'" class="circle_button circle_button_bottom"><i class="fa '.$circle_button_icon.'"></i>'.$circle_button_text.'</a></div>';
		}
	$output .= $is_parent == true? '</div>'.$this->endBlockComment('container'): '';
	$output .= '</div>'.$this->endBlockComment('parallex_folio');
	//$output .= '</section>'.$this->endBlockComment('parallex_wrapper');
	$output .= $is_parent == true? '</section>'.$this->endBlockComment('parallex_wrapper'): '';
	
/* Main Section Ends */
elseif( $section_type === 'main_section' ):
	if( $view !== 'full_width' ):
		$output .= '</div>'.$this->endBlockComment('row');
			if($row_circle_button == 'yes'){
				$output.='<div class="zee_straight"><a href="'.$circle_button_url.'" class="circle_button circle_button_bottom"><i class="fa '.$circle_button_icon.'"></i>'.$circle_button_text.'</a></div>';
			}
			$output .= $is_parent == true? '</div>'.$this->endBlockComment('container'): '';
	endif;
	$output .= $is_parent == true? '</section>'.$this->endBlockComment('section_holder'): '';
	
	
/* CURVE Section Ends */
elseif( $section_type === 'curve_section' ):
		$output .= '</div>'.$this->endBlockComment('row');
		if($is_parent==true){
			if($curve_position=='zee_b_curve_container' || $curve_position=='zee_d_curve_container'){
				$output.= folio_get_curve_side('right');
			}
		}
		if($row_circle_button == 'yes'){
			$output.='<a href="'.$circle_button_url.'" class="circle_button circle_button_bottom"><i class="fa '.$circle_button_icon.'"></i>'.$circle_button_text.'</a>';
		}
		$output .= $is_parent == true? '</div>'.$this->endBlockComment('container'): '';
	$output .= $is_parent == true? '</section>'.$this->endBlockComment('zee_curve_container'): '';
endif;
echo $output;