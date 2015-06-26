<?php
$output = $title = $link = $size = $el_class = '';
extract( shortcode_atts( array(
	'title' => '',
	'poster_image' => '',
	'link' => 'http://vimeo.com/23237102',
	'mp4_link' => '',
	'webm_link' => '',
	'video_id' => '',
	'video_height' => '',
	'video_width' => '',
	'video_type' => '',
	'el_class' => '',
	'css' => ''

), $atts ) );


wp_enqueue_script('fitvids_js');
?>
	<script type="text/javascript">
		jQuery(document).ready(function($){
			"use strict";
			
			// For Fit Vimeo Youtube Videos Target your .container, .wrapper, .post, etc.
			$(".featured_image, .responsive_video").fitVids();
		});
	</script>
<?php 
	$img_id = preg_replace( '/[^\d]/', '', $poster_image );
	$link_to = wp_get_attachment_image_src( $img_id, 'full' );
	$src = $link_to[0];


$el_class = $this->getExtraClass( $el_class );
//$video_width = !empty( $video_width )? $video_width : '100%';

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'folio_element wpb_video_widget wpb_content_element ' . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

if( $video_type == 'html' ):
	
	wp_enqueue_style('video-js_css');
	wp_enqueue_script('video_js');
	
	$output .= "\n\t\t" . '<div class="widget_kraft_custom_video '. $css_class .'">';
	$output .= "\n\t\t" . '<video width="'. $video_width .'" height="'. $video_height .'" class="video-js vjs-default-skin" controls preload="auto" poster="'. $src .'" data-setup="{}" >';
	$output .= "\n\t\t" . '<source src="'. $mp4_link .'" type="video/mp4">';
	$output .= "\n\t\t" . '<source src="'. $webm_link .'" type="video/webm">';
	$output .= "\n\t\t" . '</video>';
	$output .= "\n\t\t" . '</div>';
elseif( $video_type == 'youtube' ):
	$output .= "\n\t\t" . '<div class="featured_image '. $css_class .'">';
		$output .= "\n\t\t" . '<ifr'.'ame width="'. $video_width .'" height="'. $video_height .'" src="http://www.youtube.com/embed/'. $video_id .'" allowfullscreen>
		</iframe>';
	$output .= "\n\t\t" . '</div>';

elseif ($video_type == 'vimeo'):
	$output .= "\n\t\t" . '<div class="featured_image '. $css_class .'">';
		$output .= "\n\t\t" . '<ifr'.'ame src="//player.vimeo.com/video/' .$video_id .'" width="'. $video_width .'" height="'. $video_height .'"  webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
	$output .= "\n\t\t" . '</div>';

endif;
echo $output;