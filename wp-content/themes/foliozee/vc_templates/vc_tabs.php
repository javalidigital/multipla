<?php
	$output = $title = $interval = $el_class = '';
	extract( shortcode_atts( array(
		'title' => '',
		'interval' => 0,
		'el_class' => ''
	), $atts ) );

	wp_enqueue_script( 'jquery-ui-tabs' );

?>
	<script type="text/javascript">
        jQuery(document).ready(function($){
        "use strict";
			/* Tabs */
			$(".folio-tabs").tabs();
		});
	</script>

<?php

	$el_class = $this->getExtraClass( $el_class );
	
	$element = 'wpb_tabs';


	// Extract tab titles
	preg_match_all( '/vc_tab title="([^\"]+)"(\stab_id\=\"([^\"]+)\")(\stab_icon\=\"([^\"]+)"){0,1}/i', $content, $matches, PREG_OFFSET_CAPTURE );
	$tab_titles = array();

/**
 * vc_tabs
 *
 */

	if ( isset($matches[0]) ) { $tab_titles = $matches[0]; }
	$tabs_nav = '';
	$tabs_nav .= '<ul class="folio-nav folio-clearfix">';
	foreach ( $tab_titles as $tab ) {
		preg_match('/vc_tab title="([^\"]+)"(\stab_id\=\"([^\"]+)\")(\stab_icon\=\"([^\"]+)"){0,1}/i', $tab[0], $tab_matches, PREG_OFFSET_CAPTURE );
		if(isset($tab_matches[1][0])) {
			$tabs_nav .= '<li>';        
			$tabs_nav .= '<a href="#tab-'. (isset($tab_matches[3][0]) ? $tab_matches[3][0] : sanitize_title( $tab_matches[1][0] ) ) .'">';
			if(!empty($tab_matches[5][0]))
				$tabs_nav .= '<i class="fa '.$tab_matches[5][0].'"></i>';
			$tabs_nav .= $tab_matches[1][0] . '</a></li>';
	
		}
	}
	$tabs_nav .= '</ul>'."\n";
	
	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, trim( $element . '  folio-tabs ui-tabs ui-widget ui-widget-content ui-corner-all ' . $el_class ), $this->settings['base'], $atts );
	
	$output .= "\n\t" . '<div class="' . $css_class . '" data-interval="' . $interval . '">';
	$output .= "\n\t\t" . '<div class="folio-tab-inner">';
	$output .= wpb_widget_title( array( 'title' => $title, 'extraclass' => $element . '_heading' ) );
	$output .= "\n\t\t\t" . $tabs_nav;
	$output .= "\n\t\t\t" . wpb_js_remove_wpautop( $content );
	$output .= "\n\t\t" . '</div> ' . $this->endBlockComment( '.wpb_wrapper' );
	$output .= "\n\t" . '</div> ' . $this->endBlockComment( $element );
			
	
	echo $output;