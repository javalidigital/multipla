<?php
require_once locate_template('inc/utils.php');                		// Utilities
require_once locate_template('inc/post-type-folio-team.php');			// Custom post types
require_once locate_template('inc/post-type-portfolio.php');			// Custom post types
require_once locate_template('inc/custom.php');                 	// Custom functions
require_once locate_template('inc/sidebar_register.php');			// Register Sidebar
require_once locate_template('inc/widgets.php');                	// Widgets

require_once locate_template('inc/aq_resizer.php');					// Image resizer

require_once locate_template('inc/custom/custom_fields/custom_fields.php');  // Custom fields

require_once locate_template('inc/plugins.php');


//Initialize the update checker.

if (0) comment_form();
if (0) {
	//adding backwards compatibility for older versions
	add_theme_support( 'automatic-feed-links' );
}
