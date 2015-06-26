<?php
/**
 * Plugin Name: Kraftive Shortcodes
 * Plugin URI: http://www.kraftives.com
 * Description: A simple shortcode generator. Add buttons, columns, tabs, toggles and alerts to your theme.
 * Version: 1.0
 * Author: Kraftives
 * Author URI: http://www.kraftives.com
 */

/* Force to denpendat on Visual Composer Activation */

	register_activation_hook( __FILE__, 'child_plugin_activate' );
	function child_plugin_activate(){
	
		// Require parent plugin
		if ( ! is_plugin_active( 'js_composer/js_composer.php' ) and current_user_can( 'activate_plugins' ) ) {
			// Stop activation redirect and show error
			wp_die('Sorry, but this plugin requires the Visual Composer to be installed and active. <br><a href="' . admin_url( 'themes.php?page=install-required-plugins' ) . '">&laquo; Return to Plugins</a>');
		}
	}

class KraftiveShortcodes {

    function __construct()
    {
    	define( 'TZSC_VERSION', '1.0' );

    	// Plugin folder path
    	if ( ! defined( 'TZSC_PLUGIN_DIR' ) ) {
    		define( 'TZSC_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
    	}

    	// Plugin folder URL
    	if ( ! defined( 'TZSC_PLUGIN_URL' ) ) {
    		define( 'TZSC_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
    	}

    	require_once( TZSC_PLUGIN_DIR .'includes/shortcodes.php' );

        add_action( 'admin_init', array(&$this, 'admin_init') );
	}


	/**
	 * Enqueue Scripts and Styles
	 *
	 * @return	void
	 */
	function admin_init()
	{
		include_once( TZSC_PLUGIN_DIR . 'includes/class-tzsc-admin-insert.php' );

		// css
		wp_enqueue_style( 'zilla-popup', TZSC_PLUGIN_URL . 'assets/css/admin.css', false, '1.0', 'all' );

		// js
		wp_enqueue_script( 'jquery-ui-sortable' );
		wp_localize_script( 'jquery', 'ZillaShortcodes', array('plugin_folder' => WP_PLUGIN_URL .'/kraftive-shortcodes') );
	}
}
new KraftiveShortcodes();

?>