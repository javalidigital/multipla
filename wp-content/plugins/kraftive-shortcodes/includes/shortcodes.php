<?php
/**
 * Create and define the shortcodes
 *
 * @package ZillaShortcodes
 * @since  1.0
 */

/*	Column Shortcodes --- */

if ( !function_exists('folio_column') ) {
	function folio_column( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'column' => 'one-third',
			'last' => false
		), $atts));

		$last_class = '';
		$last_div = '';
		if( $last ) {
			$last_class = ' folio-column-last';
			$last_div = '<div class="clear"></div>';
		}

		return '<div class="folio-' . $column . $last_class . '">' . do_shortcode($content) . '</div>' . $last_div;
	}
	add_shortcode('folio_column', 'folio_column');
}

/* Legacy shortcodes --- */

if (!function_exists('folio_one_third')) {
	function folio_one_third( $atts, $content = null ) {
	   return '<div class="folio-one-third">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('folio_one_third', 'folio_one_third');
}

if (!function_exists('folio_one_third_last')) {
	function folio_one_third_last( $atts, $content = null ) {
	   return '<div class="folio-one-third folio-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('folio_one_third_last', 'folio_one_third_last');
}

if (!function_exists('folio_two_third')) {
	function folio_two_third( $atts, $content = null ) {
	   return '<div class="folio-two-third">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('folio_two_third', 'folio_two_third');
}

if (!function_exists('folio_two_third_last')) {
	function folio_two_third_last( $atts, $content = null ) {
	   return '<div class="folio-two-third folio-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('folio_two_third_last', 'folio_two_third_last');
}

if (!function_exists('folio_one_half')) {
	function folio_one_half( $atts, $content = null ) {
	   return '<div class="folio-one-half">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('folio_one_half', 'folio_one_half');
}

if (!function_exists('folio_one_half_last')) {
	function folio_one_half_last( $atts, $content = null ) {
	   return '<div class="folio-one-half folio-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('folio_one_half_last', 'folio_one_half_last');
}

if (!function_exists('folio_one_fourth')) {
	function folio_one_fourth( $atts, $content = null ) {
	   return '<div class="folio-one-fourth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('folio_one_fourth', 'folio_one_fourth');
}

if (!function_exists('folio_one_fourth_last')) {
	function folio_one_fourth_last( $atts, $content = null ) {
	   return '<div class="folio-one-fourth folio-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('folio_one_fourth_last', 'folio_one_fourth_last');
}

if (!function_exists('folio_three_fourth')) {
	function folio_three_fourth( $atts, $content = null ) {
	   return '<div class="folio-three-fourth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('folio_three_fourth', 'folio_three_fourth');
}

if (!function_exists('folio_three_fourth_last')) {
	function folio_three_fourth_last( $atts, $content = null ) {
	   return '<div class="folio-three-fourth folio-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('folio_three_fourth_last', 'folio_three_fourth_last');
}

if (!function_exists('folio_one_fifth')) {
	function folio_one_fifth( $atts, $content = null ) {
	   return '<div class="folio-one-fifth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('folio_one_fifth', 'folio_one_fifth');
}

if (!function_exists('folio_one_fifth_last')) {
	function folio_one_fifth_last( $atts, $content = null ) {
	   return '<div class="folio-one-fifth folio-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('folio_one_fifth_last', 'folio_one_fifth_last');
}

if (!function_exists('folio_two_fifth')) {
	function folio_two_fifth( $atts, $content = null ) {
	   return '<div class="folio-two-fifth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('folio_two_fifth', 'folio_two_fifth');
}

if (!function_exists('folio_two_fifth_last')) {
	function folio_two_fifth_last( $atts, $content = null ) {
	   return '<div class="folio-two-fifth folio-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('folio_two_fifth_last', 'folio_two_fifth_last');
}

if (!function_exists('folio_three_fifth')) {
	function folio_three_fifth( $atts, $content = null ) {
	   return '<div class="folio-three-fifth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('folio_three_fifth', 'folio_three_fifth');
}

if (!function_exists('folio_three_fifth_last')) {
	function folio_three_fifth_last( $atts, $content = null ) {
	   return '<div class="folio-three-fifth folio-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('folio_three_fifth_last', 'folio_three_fifth_last');
}

if (!function_exists('folio_four_fifth')) {
	function folio_four_fifth( $atts, $content = null ) {
	   return '<div class="folio-four-fifth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('folio_four_fifth', 'folio_four_fifth');
}

if (!function_exists('folio_four_fifth_last')) {
	function folio_four_fifth_last( $atts, $content = null ) {
	   return '<div class="folio-four-fifth folio-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('folio_four_fifth_last', 'folio_four_fifth_last');
}

if (!function_exists('folio_one_sixth')) {
	function folio_one_sixth( $atts, $content = null ) {
	   return '<div class="folio-one-sixth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('folio_one_sixth', 'folio_one_sixth');
}

if (!function_exists('folio_one_sixth_last')) {
	function folio_one_sixth_last( $atts, $content = null ) {
	   return '<div class="folio-one-sixth folio-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('folio_one_sixth_last', 'folio_one_sixth_last');
}

if (!function_exists('folio_five_sixth')) {
	function folio_five_sixth( $atts, $content = null ) {
	   return '<div class="folio-five-sixth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('folio_five_sixth', 'folio_five_sixth');
}

if (!function_exists('folio_five_sixth_last')) {
	function folio_five_sixth_last( $atts, $content = null ) {
	   return '<div class="folio-five-sixth folio-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('folio_five_sixth_last', 'folio_five_sixth_last');
}


?>