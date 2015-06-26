<?php

add_action('init', 'team_register');

function team_register() {
    $args = array(
        'labels' => array(
			'name' 				=> _x( 'Teams', 'post type general name', 'kraftives' ),
			'singular_name'		=> _x( 'Team', 'post type singular name', 'kraftives' ),
			'all_items'			=> __( 'All Team Members', 'kraftives' ),
			'add_new' 			=> __( 'Add New Team Member', 'kraftives' ),
			'add_new_item' 		=> __( 'Add New Team Member', 'kraftives' ),
			'edit_item' 		=> __( 'Edit Team Member', 'kraftives' ),
			'new_item' 			=> __( 'New Team Member', 'kraftives' ),
			'view_item' 		=> __( 'View Team Member', 'kraftives' ),
			'search_items' 		=> __( 'Search Team Member', 'kraftives' ),
			'not_found' 		=> __( 'Team Member', 'kraftives' ),
			'not_found_in_trash'=> __( 'Team Member', 'kraftives' ),
			'parent_item_colon' => __( 'Team Member', 'kraftives' ),
			'menu_name'			=> __( 'Folio Team', 'kraftives' ),
			
        ),
        'public' => false,
        'show_ui' => true,
		'exclude_from_search' =>true,
        'menu_position' => 5,
        'rewrite' => true,
        'supports' => array( 'title', 'thumbnail', 'editor'),
		'menu_icon' 		=> get_template_directory_uri() . '/inc/custom/images/icon-team.png'
    );

    register_post_type( 'folio_team' , $args );
}


/* Add Custom Image Column in post type */

// GET FEATURED IMAGE
function folio_get_featured_image($post_ID) {
    $post_thumbnail_id = get_post_thumbnail_id($post_ID);
    if ($post_thumbnail_id) {
        $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'full', true);
        return $post_thumbnail_img[0];
    }
}

// ADD NEW COLUMN
function folio_columns_head($defaults) {
  $new = array();
  foreach($defaults as $key => $title) {
	  $new['cb'] = '<input type="checkbox" />';
	  $new['thumbnail'] = 'Member Image';
	  $new['title'] = 'Name';
	  $new['designation'] = 'Designation';
	  $new['skills'] = 'Skills';
  }
  
  return $new;
}
 
// getting featured image
function folio_columns_content($column_name, $post_ID) {
    if ($column_name == 'thumbnail') {
        $post_featured_image = folio_get_featured_image($post_ID);
        if ($post_featured_image) {
            echo '<img  width="48" height="48" src="' . $post_featured_image . '" />';
        }
    }
//getting designation
	if ($column_name == 'designation') {
        $designation = get_post_meta($post_ID, 'folio_designation', true);
        if ($designation) {
            echo $designation;
        }else{
			echo "N/A";
		}
    }

//getting skills
	if ($column_name == 'skills') {
        $skills = get_post_meta( get_the_ID(), 'folio_add_skill', true );

		$count = count($skills)-1;
		
		if( count($skills) > 0 ){
				foreach( $skills as $key => $skill ):
					if( $count == $key ){
						echo $skill['folio_re_skill_name'];
					}else{
						echo $skill['folio_re_skill_name']. ',';
					}
				endforeach;
		}else{
			echo "N/A";
		}    
	  }
}

add_filter('manage_folio_team_posts_columns', 'folio_columns_head');
add_action('manage_folio_team_posts_custom_column', 'folio_columns_content', 1, 2);
/* Custom column end */