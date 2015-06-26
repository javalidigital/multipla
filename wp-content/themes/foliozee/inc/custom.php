<?php
//getting source of image 

function folio_get_image_src( $id = '' ){

	$id = preg_replace( '/[^\d]/', '', $id);
	$image_src = wp_get_attachment_image_src( $id, 'full' );
	$src = $image_src[0];
	return $src;
	
}
/* to Find any value from shortcode */

function folio_match_expression( $key_word = '', $content, $search_by = '' ){
	$matches = '';
	if( $search_by === 'attr' ):
		preg_match_all('#'.$key_word.'="([^\"]+)"#', $content, $matches);
		if( isset( $matches[0][0] ) ): 
			$matches = $matches[1][0];
		endif;
	elseif( $search_by === 'shortcode' ):
		preg_match_all('#'.$key_word.'#', $content, $matches);
		
		if( isset( $matches[0][0] ) ): 
			$matches = $matches[0][0];
		endif;
	endif;
return $matches;
}

/* Curve side style  */

function folio_get_curve_side(  $side = '' ){
	if( $side === 'right' ):
		return '<div class="zee_curve_right"></div>';
	elseif( $side === 'left' ):
		return '<div class="zee_curve_left"></div>';
	endif;
}


//setting map type here Ex. Default, Greyscale, Dark
	if(!function_exists('folio_mapType')) { 
		function folio_mapType($type) {
			if( $type === 'greyscale' ){
				$style = 'styles: [
					{
						featureType: "all",
						elementType: "all",
						stylers: [
							{ saturation: -100 },
						]
					}
				]';
			
			}elseif( $type === 'dark' ){
				$style = 'styles: [
						{
							featureType: "all",
							elementType: "all",
							stylers: [
								{ hue: "#ff1a00" },
								{ invert_lightness: true },
								{ saturation: -100 },
								{ lightness: 33 },
								{ gamma: 0.5 }
							]
						},{
							featureType: "water",
							elementType: "geometry",
							stylers: [
								{ color: "#2D333C" }
							]
						}
				]';
			
			}else{
			
				$style = '';
			}
		return $style;
		}
	}

/* Get Google Map */
function folio_get_map( $style = '' ){
	
	global $post, $fdata;
		
		$title = !empty( $fdata[ 'gmap_title' ] )? $fdata[ 'gmap_title' ]: "";
		$gmap_toggle_btn_txt = !empty( $fdata[ 'gmap_toggle_btn_txt' ] )? $fdata[ 'gmap_toggle_btn_txt' ]: "";
		$gmap_type = !empty( $fdata[ 'gmap_type' ] )? $fdata[ 'gmap_type' ]: "";
		$gmap_zoom_level = !empty( $fdata[ 'gmap_zoom_level' ] )? $fdata[ 'gmap_zoom_level' ]: "";
		
		$find_location_by = !empty( $fdata[ 'find_location_by' ] )? $fdata[ 'find_location_by' ]: "";
		$gmap_address = !empty( $fdata[ 'gmap_address' ] )? $fdata[ 'gmap_address' ]: "";
		$gmap_latitude = !empty( $fdata[ 'gmap_latitude' ] )? $fdata[ 'gmap_latitude' ]: "";
		$gmap_longitude = !empty( $fdata[ 'gmap_longitude' ] )? $fdata[ 'gmap_longitude' ]: "";
		$gmap_marker_title = !empty( $fdata[ 'gmap_marker_title' ] )? $fdata[ 'gmap_marker_title' ]: "";
		$gmap_marker_img = !empty( $fdata[ 'gmap_marker_img' ][ 'id' ] )? $fdata[ 'gmap_marker_img' ][ 'id' ]: "";
		$gmap_marker_height = !empty( $fdata[ 'gmap_marker_height' ] )? $fdata[ 'gmap_marker_height' ]: "";
		$gmap_marker_width = !empty( $fdata[ 'gmap_marker_width' ] )? $fdata[ 'gmap_marker_width' ]: "";
		$is_button = !empty( $fdata[ 'show_hide_toogle_button' ] )? "true": "";
		$gmap_map_height = isset( $fdata[ 'gmap_map_height' ] ) && !empty( $fdata[ 'gmap_map_height' ] )? $fdata[ 'gmap_map_height' ]: '';

		$map_state = empty($fdata[ 'map_toggle_state' ]) && $fdata[ 'map_toggle_state' ]==false? "close": "open";

		$is_curve = !empty( $fdata[ 'is_curve' ] ) && $style === 'true' ? "yes": "";

		return do_shortcode('[folio_google_map title="'. $title .'" button_text="'. $gmap_toggle_btn_txt .'" map_layout="full" type="'. $gmap_type .'" zoom="'. $gmap_zoom_level .'" location="'. $find_location_by .'" address="'. $gmap_address .'" latitude="'. $gmap_latitude .'" longitude="'. $gmap_longitude .'" marker_height="'. $gmap_marker_height .'" marker_width="'. $gmap_marker_width .'" marker_title="'. $gmap_marker_title .'" is_button="'.$is_button.'" marker="'.$gmap_marker_img.'" is_curve ="'.$is_curve.'" map_state="'.$map_state.'" map_height="'.$gmap_map_height.'"]'); 

}

//setting a random id
	if(!function_exists('folio_random_id')) { 
		function folio_random_id($id_length) {
			$random_id_length = $id_length; 
			$rnd_id = crypt(uniqid(rand(),1)); 
			$rnd_id = strip_tags(stripslashes($rnd_id)); 
			$rnd_id = str_replace(".","",$rnd_id); 
			$rnd_id = strrev(str_replace("/","",$rnd_id)); 
			$rnd_id = str_replace(range(0,9),"",$rnd_id); 
			$rnd_id = substr($rnd_id,0,$random_id_length); 
			$rnd_id = strtolower($rnd_id);  
	
		return $rnd_id;
		}
	}

// Get Portfolio category ID
	function folio_get_taxonomy_cat_ID( $cat_name='General' ) {
		$cat = get_term_by( 'name', $cat_name, 'project_categories' );
		if ( $cat )
			return $cat->term_id;
		return 0;
	}

	function folio_get_taxonomy_cat_slug( $cat_name='General' ) {
		$cat = get_term_by( 'name', $cat_name, 'project_categories' );
		if ( $cat )
			return $cat->slug;
		return 0;
	}

//get list of all portfolio categories
function folio_get_all_cat_list(){
	$portfolio_categs = get_terms('project_categories', array('hide_empty' => false));
	$portfolio_cats_array = array();
	$dt_placebo = array('No Thanks!' => NULL);
	$term_vals = array();
	foreach($portfolio_categs as $index => $portfolio_categ) {
	  $term_vals[$portfolio_categ->name] = folio_get_taxonomy_cat_ID($portfolio_categ->name);
		$portfolio_cats_array[$portfolio_categ->name] = $portfolio_categ->name;
	}
	return $portfolio_cats_array;
}
//print_r(folio_get_all_cat_list());exit;

		// getting menus list 
function folio_get_menu_list(){
		$all_menus = wp_get_nav_menus();
		$menu_list['folio_primarymenu']='Primary Menu';
		foreach ( $all_menus as $folioMenu) {
			$menu_list[$folioMenu->slug] =  $folioMenu->name;
		} 
	return $menu_list;
}
//Font size array for theme option panel
	function folio_font_size(){
		for( $i = 1; $i <= 500; $i++ ){
			$j = $i.'px';
			$padding[$i] = $j; 
		}
		return $padding;
	}
	

/**
* gets the current post type in the WordPress Admin
*/
function folio_get_current_post_type() {
	global $post, $typenow, $current_screen;
	//we have a post so we can just get the post type from that
	if ( $post && $post->post_type )
	return $post->post_type;
	//check the global $typenow - set in admin.php
	elseif( $typenow )
	return $typenow;
	//check the global $current_screen object - set in sceen.php
	elseif( $current_screen && $current_screen->post_type )
	return $current_screen->post_type;
	//lastly check the post_type querystring
	elseif( isset( $_REQUEST['post_type'] ) )
	return sanitize_key( $_REQUEST['post_type'] );
	
	// on edit post
	elseif(isset($_REQUEST['post'])){
		if (get_post_type($_REQUEST['post']))
		return get_post_type($_REQUEST['post']);
	}
	//we do not know the post type!
	return null;
}

function folio_corenavi()
{
    global $wp_query, $wp_rewrite;
    $pages = '';
    $max = $wp_query->max_num_pages;
    if (!$current = get_query_var('paged')) $current = 1;
    $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
    $a['total'] = $max;
    $a['current'] = $current;

    $total = 0; //1 - display the text "Page N of N", 0 - not display
    $a['mid_size'] = 6; //how many links to show on the left and right of the current
    $a['end_size'] = 1; //how many links to show in the beginning and end
    $a['prev_text'] = __('Prev', 'wedding'); //text of the "Previous page" link
    $a['next_text'] = __('Next', 'wedding'); //text of the "Next page" link

    if ($max > 1) echo '<div class="wp_corenavi">';
    if ($total == 1 && $max > 1) $pages = '' . $current . ' of ' . $max . '' . "\r\n";
    echo $pages . paginate_links($a);
    if ($max > 1) echo '</div>';
}