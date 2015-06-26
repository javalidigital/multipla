<?php
$output = $title = $el_class = $open = $css_animation = '';
extract(shortcode_atts(array(
    'title' => __("Click to toggle", "js_composer"),
    'el_class' => '',
    'open' => 'closed',
    'css_animation' => ''
), $atts));

$el_class = $this->getExtraClass($el_class);
$open = ( $open == 'true' ) ? ' open' : 'closed';
//$el_class .= ( $open == ' wpb_toggle_title_active' ) ? ' wpb_toggle_open' : '';

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, ' folio-toggle-title ' . $open, $this->settings['base'], $atts );
$css_class .= $this->getCSSAnimation($css_animation);
$output .= '<div data-id="'. $open .'" class="folio-toggle">';
$output .= apply_filters('wpb_toggle_heading', '<span class="'.$css_class.'">'.$title.'</span>', array('title'=>$title));
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, ' folio-toggle-inner ' . $el_class, $this->settings['base'], $atts );
$output .= '<div class="'.$css_class.'">'.wpb_js_remove_wpautop($content, true).'</div>'.$this->endBlockComment('toggle')."\n";
$output .= '</div>';

?>
	<script type="text/javascript">
        jQuery(document).ready(function($){
        "use strict";
			/* Toggles */
			$(".folio-toggle").each( function () {
				var $this = $(this);
				if( $this.attr('data-id') == 'closed' ) {
					$this.accordion({ header: '.folio-toggle-title', collapsible: true, active: false  });
				} else {
					$this.accordion({ header: '.folio-toggle-title', collapsible: true});
				}
		
				$this.on('accordionactivate', function( e, ui ) {
					$this.accordion('refresh');
				});
		
				$(window).on('resize', function() {
					$this.accordion('refresh');
					});
				});
		});
	</script>
<?php

echo $output;
