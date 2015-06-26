<?php
	extract( shortcode_atts( array(
		'href' => '#',
		'title' => __( 'Button text', "js_composer" ),
		'folio_icons' => 'none',
		'size' => 'button',
		'style' => '',
		'target' => '_self',
		'el_class' => ''
	), $atts ) );
	
	$class = 'button '.$size.' ';
	
	if( $style != 'folio-button' ):
		$style = explode( '-', $style );
		$class .= $style[1].'-'.$style[2];
	endif;
	
	
	$el_class = $this->getExtraClass( $el_class );
	
	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, ' ' . $class .' ' . $el_class, $this->settings['base'], $atts );
	?>
	<a class="<?php echo esc_attr( trim( $css_class ) ); ?>" href="<?php echo $href; ?>"
	
	   title="<?php echo esc_attr( $title ); ?>" target="<?php echo $target; ?>">
		<?php if( $folio_icons != 'none' ):?>
		<i class="fa <?php echo $folio_icons; ?>"></i>
		<?php endif;?>
		<?php echo $title; ?>
	</a>
	<?php echo $this->endBlockComment( 'vc_button' ) . "\n";