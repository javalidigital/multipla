<?php

add_action('init', 'portfolio_register');

function portfolio_register() {
global $fdata;
$slug = isset( $fdata['portfolio_slug'] ) && !empty( $fdata['portfolio_slug'] )? $fdata['portfolio_slug']: 'portfolio';
    $args = array(
        'labels' => array(
			'name' 				=> _x( 'Portfolios', 'post type general name', 'kraftives' ),
			'singular_name'		=> _x( 'Portfolio', 'post type singular name', 'kraftives' ),
			'all_items'			=> __( 'All Portfolio items', 'kraftives' ),
			'add_new' 			=> __( 'Add New', 'kraftives' ),
			'add_new_item' 		=> __( 'Add New Portfolio', 'kraftives' ),
			'edit_item' 		=> __( 'Edit Portfolio', 'kraftives' ),
			'new_item' 			=> __( 'New Portfolio', 'kraftives' ),
			'view_item' 		=> __( 'View Portfolio', 'kraftives' ),
			'search_items' 		=> __( 'Search Portfolios', 'kraftives' ),
			'not_found' 		=> __( 'Portfolio', 'kraftives' ),
			'not_found_in_trash'=> __( 'Portfolio', 'kraftives' ),
			'parent_item_colon' => __( 'Portfolio', 'kraftives' ),
			'menu_name'			=> __( 'Portfolio', 'kraftives' )
			
        ),
        'public' => true,
		'publicly_queryable' => true,
        'show_ui' => true,
		'query_var'          => true,
		'capability_type'    => 'post',
		'exclude_from_search' =>true,
        'menu_position' => 5,
		'rewrite' => array( 'slug' => $slug, 'with_front' => true ),
		'has_archive'        => true,
		'hierarchical'       => false,
        'supports' => array( 'title', 'editor', 'revisions', 'thumbnail', 'post-formats' ),
		'menu_icon' 		=> get_template_directory_uri() . '/inc/custom/images/icon-portfolio.png'
    );

    register_post_type( 'portfolio' , $args );
	flush_rewrite_rules(false);
}

register_taxonomy("project_categories",  array("portfolio"), array("hierarchical" => true, "label" => "Portfolio Categories", "singular_label" => "Portfolio Category", 'public' => true ));

//add_action("admin_init", "portfolio_meta_box");

