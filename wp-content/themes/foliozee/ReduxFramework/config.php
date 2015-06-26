<?php

    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: https://docs.reduxframework.com
     * */

    if ( ! class_exists( 'Redux_Framework_sample_config' ) ) {

        class Redux_Framework_sample_config {

            public $args = array();
            public $sections = array();
            public $theme;
            public $ReduxFramework;

            public function __construct() {

                if ( ! class_exists( 'ReduxFramework' ) ) {
                    return;
                }

                // This is needed. Bah WordPress bugs.  ;)
                if ( true == Redux_Helpers::isTheme( __FILE__ ) ) {
                    $this->initSettings();
                } else {
                    add_action( 'plugins_loaded', array( $this, 'initSettings' ), 10 );
                }

            }

            public function initSettings() {

                // Just for demo purposes. Not needed per say.
                $this->theme = wp_get_theme();

                // Set the default arguments
                $this->setArguments();

                // Set a few help tabs so you can see how it's done
                $this->setHelpTabs();

                // Create the sections and fields
                $this->setSections();

                if ( ! isset( $this->args['opt_name'] ) ) { // No errors please
                    return;
                }

                // If Redux is running as a plugin, this will remove the demo notice and links
                //add_action( 'redux/loaded', array( $this, 'remove_demo' ) );

                // Function to test the compiler hook and demo CSS output.
                // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
                //add_filter('redux/options/'.$this->args['opt_name'].'/compiler', array( $this, 'compiler_action' ), 10, 3);

                // Change the arguments after they've been declared, but before the panel is created
                //add_filter('redux/options/'.$this->args['opt_name'].'/args', array( $this, 'change_arguments' ) );

                // Change the default value of a field after it's been set, but before it's been useds
                //add_filter('redux/options/'.$this->args['opt_name'].'/defaults', array( $this,'change_defaults' ) );

                // Dynamically add a section. Can be also used to modify sections/fields
                //add_filter('redux/options/' . $this->args['opt_name'] . '/sections', array($this, 'dynamic_section'));

                $this->ReduxFramework = new ReduxFramework( $this->sections, $this->args );
            }

            /**
             * This is a test function that will let you see when the compiler hook occurs.
             * It only runs if a field    set with compiler=>true is changed.
             * */
            function compiler_action( $options, $css, $changed_values ) {
                echo '<h1>The compiler hook has run!</h1>';
                echo "<pre>";
                print_r( $changed_values ); // Values that have changed since the last save
                echo "</pre>";
                //print_r($options); //Option values
                //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )

                /*
              // Demo of how to use the dynamic CSS and write your own static CSS file
              $filename = dirname(__FILE__) . '/style' . '.css';
              global $wp_filesystem;
              if( empty( $wp_filesystem ) ) {
                require_once( ABSPATH .'/wp-admin/includes/file.php' );
              WP_Filesystem();
              }

              if( $wp_filesystem ) {
                $wp_filesystem->put_contents(
                    $filename,
                    $css,
                    FS_CHMOD_FILE // predefined mode settings for WP files
                );
              }
             */
            }

            /**
             * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
             * Simply include this function in the child themes functions.php file.
             * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
             * so you must use get_template_directory_uri() if you want to use any of the built in icons
             * */
            function dynamic_section( $sections ) {
                //$sections = array();
                $sections[] = array(
                    'title'  => __( 'Section via hook', 'redux-framework-demo' ),
                    'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework-demo' ),
                    'icon'   => 'el-icon-paper-clip',
                    // Leave this as a blank section, no options just some intro text set above.
                    'fields' => array()
                );

                return $sections;
            }

            /**
             * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
             * */
            function change_arguments( $args ) {
                //$args['dev_mode'] = true;

                return $args;
            }

            /**
             * Filter hook for filtering the default value of any given field. Very useful in development mode.
             * */
            function change_defaults( $defaults ) {
                $defaults['str_replace'] = 'Testing filter hook!';

                return $defaults;
            }

            // Remove the demo link and the notice of integrated demo from the redux-framework plugin
            function remove_demo() {

                // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
                if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                    remove_filter( 'plugin_row_meta', array(
                        ReduxFrameworkPlugin::instance(),
                        'plugin_metalinks'
                    ), null, 2 );

                    // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                    remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
                }
            }

            public function setSections() {

                /**
                 * Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
                 * */
                // Background Patterns Reader
                $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
                $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
                $sample_patterns      = array();

                if ( is_dir( $sample_patterns_path ) ) :

                    if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) :
                        $sample_patterns = array();

                        while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                            if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                                $name              = explode( '.', $sample_patterns_file );
                                $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                                $sample_patterns[] = array(
                                    'alt' => $name,
                                    'img' => $sample_patterns_url . $sample_patterns_file
                                );
                            }
                        }
                    endif;
                endif;

                ob_start();

                $ct          = wp_get_theme();
                $this->theme = $ct;
                $item_name   = $this->theme->get( 'Name' );
                $tags        = $this->theme->Tags;
                $screenshot  = $this->theme->get_screenshot();
                $class       = $screenshot ? 'has-screenshot' : '';

                $customize_title = sprintf( __( 'Customize &#8220;%s&#8221;', 'redux-framework-demo' ), $this->theme->display( 'Name' ) );

                ?>
<!--Code used to display Theme Information Tab-->
                <div id="current-theme" class="<?php echo esc_attr( $class ); ?>">
                    <?php if ( $screenshot ) : ?>
                        <?php if ( current_user_can( 'edit_theme_options' ) ) : ?>
                            <a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize"
                               title="<?php echo esc_attr( $customize_title ); ?>">
                                <img src="<?php echo esc_url( $screenshot ); ?>"
                                     alt="<?php esc_attr_e( 'Current theme preview' ); ?>"/>
                            </a>
                        <?php endif; ?>
                        <img class="hide-if-customize" src="<?php echo esc_url( $screenshot ); ?>"
                             alt="<?php esc_attr_e( 'Current theme preview' ); ?>"/>
                    <?php endif; ?>

                    <h4><?php echo $this->theme->display( 'Name' ); ?></h4>

                    <div>
                        <ul class="theme-info">
                            <li><?php printf( __( 'By %s', 'redux-framework-demo' ), $this->theme->display( 'Author' ) ); ?></li>
                            <li><?php printf( __( 'Version %s', 'redux-framework-demo' ), $this->theme->display( 'Version' ) ); ?></li>
                            <li><?php echo '<strong>' . __( 'Tags', 'redux-framework-demo' ) . ':</strong> '; ?><?php printf( $this->theme->display( 'Tags' ) ); ?></li>
                        </ul>
                        <p class="theme-description"><?php echo $this->theme->display( 'Description' ); ?></p>
                        <?php
                            if ( $this->theme->parent() ) {
                                printf( ' <p class="howto">' . __( 'This <a href="%1$s">child theme</a> requires its parent theme, %2$s.' ) . '</p>', __( 'http://codex.wordpress.org/Child_Themes', 'redux-framework-demo' ), $this->theme->parent()->display( 'Name' ) );
                            }
                        ?>

                    </div>
                </div>

                <?php
                $item_info = ob_get_contents();

                ob_end_clean();

                $sampleHTML = '';
                if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
                    Redux_Functions::initWpFilesystem();

                    global $wp_filesystem;

                    $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
                }

/* General Settings */
	$this->sections[] = array (
			'title' => __('General Settings', 'kraftives'),
			'fields' => array (
				array (
					'id' => 'main_logo_info',
					'icon' => true,
					'type' => 'info',
					'raw' => __('<h3>Main Logo Settings.</h3>
							Main logo settings which will be displayed on the main navigation', 'kraftives').
							'<br /><br />
							<img class="img_max" src="'.ReduxFramework::$_url .'assets/img/main_nav_logo.jpg">',
				),
				array (
					'desc' => __('Upload an image that will represent your website\'s logo.<br>
											This logo will be displayed with the main navigation.', 'kraftives'),
					'id' => 'upload_main_logo',
					'type' => 'media',
					'title' => __('Upload Main Logo', 'kraftives'),
					'default' =>array( 'url' => get_template_directory_uri() .'/assets/images/fallback_images/logo.png' ),
					'url' => true,
				),
				array (
					'desc' => __('You can adjust the logo position in header by setting the top-margin.', 'kraftives'),
					'id' => 'margin_top_main_logo',
					'min' => '1',
					'step' => '1',
					'max' => '200',
					'type' => 'slider',
					'title' => __('Margin Top Value for Main Logo', 'kraftives'),
					'default' => '17',
				),
				array (
					'desc' => __('Upload a 16 x 16 image that will represent your website\'s favicon.', 'kraftives'),
					'id' => 'upload_custom_favicon',
					'type' => 'media',
					'title' => __('Upload Custom Favicon', 'kraftives'),
					'default' =>array( 'url' => get_template_directory_uri() .'/favicon.ico' ),
					'url' => true,
				),
				array (
					'desc' => __('Paste your Google Analytics (or other) tracking code here. This will be added into the header template before head tag ends.', 'kraftives'),
					'id' => 'google_analytics',
					'type' => 'textarea',
					'title' => __('Google Analytics Code', 'kraftives'),
					'default' => ''
				),
				array (
					'desc' => __('Enter your custom javascript code here, this will be added in footer template of your theme before body tag ends.', 'kraftives'),
					'id' => 'custom_js_code',
					'type' => 'ace_editor',
					'mode'      => 'javascript',
					'title' => __('Custom Javascript Code', 'kraftives'),
					'default'   => "jQuery(document).ready(function(){ \"use strict\";\n\n});"
				),
			
			),
			'icon' => 'el-icon-cogs',
		);

 	/* Pre Loader Settings starts */
	    $this->sections[] = array(
                    'icon'       => 'el-icon-hourglass',
                    'title'      => __( 'Preloader Settings', 'kraftives' ),
                    'subsection' => true,
                    'fields'     => array(
							array (
								'desc' => 'Enable or disable preloader',
								'id' => 'display_preloader',
								'type' => 'switch',
								'title' => 'Display Preloader',
								'default' => 1
							),
							array (
								'id'       => 'only_pre_loader_on',
								'type'     => 'radio',
								'title'    => __( 'Display Preloader on', 'kraftives' ),
								'desc'     => __( 'Select front page or all pages to display preloader on.', 'kraftives' ),
								//Must provide key => value pairs for radio options
								'options'  => array(
									'on_front_page' => 'Front Page',
									'on_full_site' => 'Full Site',
								),
								'default'  => 'on_front_page',
								'required' => array (
									0 => 'display_preloader',
									1 => '=',
									2 => 1,
								),
							),
							array (
								'desc' => __('Select color for preloader background', 'kraftives'),
								'id' => 'background_color_preloader',
								'type' => 'color',
								'title' => __('Preloader Background color', 'kraftives'),
								'default' => '#ffffff',
								'required' => array (
									0 => 'display_preloader',
									1 => '=',
									2 => 1,
								),
							),
							array (
								'desc' => __('Select color for preloader bar', 'kraftives'),
								'id' => 'bar_color_preloader',
								'type' => 'color',
								'title' => __('Preloader bar color', 'kraftives'),
								'default' => '#444444',
								'required' => array (
									0 => 'display_preloader',
									1 => '=',
									2 => 1,
								),
							),
							array (
								'desc' => __('This will control the bar height of the loader', 'kraftives'),
								'id' => 'barheight_preloader',
								'min' => '1',
								'step' => '1',
								'max' => '20',
								'type' => 'slider',
								'title' => __('Preloader bar Height', 'kraftives'),
								'default' => '3',
								'required' => array (
									0 => 'display_preloader',
									1 => '=',
									2 => 1,
								),
							),
							array (
								'desc' => __('Enable or disable percentage for preloader', 'kraftives'),
								'id' => 'display_percentage_preloader',
								'type' => 'switch',
								'title' => __('Display Percentage', 'kraftives'),
								'default' => 1,
								'required' => array (
									0 => 'display_preloader',
									1 => '=',
									2 => 1,
								),
							),
							array (
								'desc' => __('Select the font size for counter', 'kraftives'),
								'id' => 'fontsize_preloader',
								'type' => 'select',
								'options' => folio_font_size(),
								'title' => __('Preloader Font Size', 'kraftives'),
								'default' => '60',
								'required' => array (
									0 => 'display_preloader',
									1 => '=',
									2 => 1,
								),
							),
			)
        );

/* Styling Settigns */
	$this->sections[] = array (
			'title' => __('Styling Settings', 'kraftives'),
			'fields' => array (
				array (
					'desc' => __('Enable this option if you want to select custom <strong>background color</strong> for body, this will apply on full theme.', 'kraftives'),
					'id' => 'is_background_color',
					'on' => 'Enable',
					'off' => 'Disable',
					'type' => 'switch',
					'title' => __('Custom Background Color', 'kraftives'),
					'default' => 0
				),
				array (
					'desc' => __('Pick a background color for the theme.', 'kraftives'),
					'id' => 'background_color',
					'type' => 'color',
					'title' => __('Select Background Color', 'kraftives'),
					'default' => '',
					'required' => array (
						0 => 'is_background_color',
						1 => '=',
						2 => 1,
					),
				),
				array (
					'desc' => __('Enable this option if you want to select custom <strong>background pattern</strong> for body, this will apply on full theme.', 'kraftives'),
					'id' => 'is_background_pattern',
					'on' => 'Enable',
					'off' => 'Disable',
					'type' => 'switch',
					'title' => __('Custom Background Pattern', 'kraftives'),
					'default' => 0
				),
				array (
					'desc' => __('Select a background pattern to display on the body.', 'kraftives'),
					'id' => 'background_pattern',
					'type' => 'image_select',
					'options' => array (
						0 => array('alt' => '',  'img' => ReduxFramework::$_url . 'assets/img/bg/bg0.png'),
						1 => array('alt' => '',  'img' => ReduxFramework::$_url . 'assets/img/bg/bg1.png'),
						4 => array('alt' => '',  'img' => ReduxFramework::$_url . 'assets/img/bg/bg2.png'),
						5 => array('alt' => '',  'img' => ReduxFramework::$_url . 'assets/img/bg/bg3.png'),
						6 => array('alt' => '',  'img' => ReduxFramework::$_url . 'assets/img/bg/bg4.png'),
						7 => array('alt' => '',  'img' => ReduxFramework::$_url . 'assets/img/bg/bg5.png'),
						8 => array('alt' => '',  'img' => ReduxFramework::$_url . 'assets/img/bg/bg6.jpg'),
						9 => array('alt' => '',  'img' => ReduxFramework::$_url . 'assets/img/bg/bg7.jpg'),
						10 => array('alt' => '', 'img' => ReduxFramework::$_url . 'assets/img/bg/bg8.png'),
						2 => array('alt' => '',  'img' => ReduxFramework::$_url . 'assets/img/bg/bg10.png'),
						3 => array('alt' => '',  'img' => ReduxFramework::$_url . 'assets/img/bg/bg11.png'),
						11 => array('alt' => '', 'img' => ReduxFramework::$_url . 'assets/img/bg/bg9.png')
					),
					'title' => __('Select Background pattern', 'kraftives'),
					'default' => 1,
					'required' => array (
						0 => 'is_background_pattern',
						1 => '=',
						2 => 1,
					),
					'tiles' => true,
				),
				array (
					'desc' => __('Quickly add some CSS to your theme by adding it to this block.', 'kraftives'),
					'id' => 'custom_css',
					'type' => 'ace_editor',
					'mode'     => 'css',
					'title' => __('Custom CSS', 'kraftives'),
					'default'  => "#header{\nmargin: 0 auto;\n}"
				),
			),
			'icon' => 'el-icon-brush',
		);
/* Skins Settigns */
	$this->sections[] = array (
			'title' => __('Skin Settings', 'kraftives'),
			'fields' => array (

				array (
					'desc' => __('Select theme mode between <strong>Standard</strong> or <strong>Dark</strong> or <strong>Grayscale</strong> mode.', 'kraftives'),
					'id' => 'theme_mode',
					'type' => 'select',
					'options' => array (
						'standard_mode' => 'Standard Theme Mode',
						'dark_mode' => 'Dark Theme Mode',
						'grayscale_mode' => 'Grayscale Theme Mode',
					),
					'title' => 'Select Theme Mode',
					'default' => 'standard_mode',
				),
				
				array (
					'desc' => __('Choose the Color shceme type between Predefined Colors and Custom Skin.', 'kraftives'),
					'id' => 'color_scheme_type',
					'type' => 'select',
					'options' => array (
						'predefined_colors' => 'Predefined Color Theme',
						'custom_skin' => 'Custom Color Theme',
					),
					'title' => __('Select Color Scheme type', 'kraftives'),
					'default' => 'predefined_colors',
					'required' => array (
						0 => 'theme_mode',
						1 => '=',
						2 => array('standard_mode', 'dark_mode')
					),	
				),
				array (
					'desc' => __('Select the major color for your theme.', 'kraftives'),
					'id' => 'custom_color_theme',
					'type' => 'color',
					'title' => __('Custom Color Theme', 'kraftives'),
					'default' => '#FF3131',
					'required' => array (
						0 => 'color_scheme_type',
						1 => '=',
						2 => 'custom_skin',
					),				
				),
				array (
					'desc' => __('Select a color palette from predefined color themes, provided by Kraftives.', 'kraftives'),
					'id' => 'predefined_color_theme',
					'type' => 'image_select',
					'options' => array (
						'red.css' => array('alt' => '',  'img' => ReduxFramework::$_url . 'assets/img/cp_red.png'),
						'orange.css' => array('alt' => '',  'img' => ReduxFramework::$_url . 'assets/img/cp_orange.png'),
						'seagreen.css' => array('alt' => '',  'img' => ReduxFramework::$_url . 'assets/img/cp_seagreen.png'),
						'yellow.css' => array('alt' => '',  'img' => ReduxFramework::$_url . 'assets/img/cp_yellow.png'),
						'blue.css' => array('alt' => '',  'img' => ReduxFramework::$_url . 'assets/img/cp_blue.png'),
						'green.css' => array('alt' => '',  'img' => ReduxFramework::$_url . 'assets/img/cp_green.png')
					),
					'title' => __('Predefined Color Theme', 'kraftives'),
					'default' => 'red.css',
					'required' => array (
						0 => 'color_scheme_type',
						1 => '=',
						2 => 'predefined_colors',
					),				
				
				),
				
			),
			'icon' => 'el-icon-tint',
		);


/* Typography Settigns */
	$this->sections[] = array (
			'title' => __('Typography', 'kraftives'),
			'fields' => array (
				array (
                            'id'            => 'primary_font',
                            'type'          => 'typography',
                            'title'       	 => __( 'Primary Font', 'kraftives' ),
                            'google'      	=> true,
                            'font-backup'   => false,
                            'font-style'    => false, 
                            'font-weight'   => false,
							'subsets'       => false, 
                            'font-size'     => false,
                            'line-height'   => false,
                            'word-spacing'  => false,
                            'color'         => false,
                            'preview'       => true,
                            'all_styles'  	=> false,
							'font-family'   => true,
							'text-align'	=> false,
                            'desc'      => __( 'Select primary font, which is used as the main font of the theme and mostly used on paragraphs, lists, descriptions, posts content etc.', 'kraftives' ),
                            'default'       => array(
                                'font-family' => 'Open Sans',
                                'google'      => true,
                            ),
                        ),//Primary Font
						
				array (
                            'id'            => 'secondary_font',
                            'type'          => 'typography',
                            'title'       	 => __( 'Secondary Font', 'kraftives' ),
                            'google'      	=> true,
                            'font-backup'   => false,
                            'font-style'    => false, 
                            'font-weight'   => false,
							'subsets'       => false, 
                            'font-size'     => false,
                            'line-height'   => false,
                            'word-spacing'  => false,
                            'color'         => false,
                            'preview'       => true,
                            'all_styles'  	=> false,
							'font-family'   => true,
							'text-align'	=> false,
                            'desc'      => __( 'Select secondary font which is mostly used in section headings and content headings.', 'kraftives' ),
                            'default'       => array(
                                'font-family' => 'Roboto Slab',
                                'google'      => true,
                            ),
                        ),//Secondary Font
			),
			'icon' => 'el-icon-font',
		);

	/* General Headings Typography submenu */
		$this->sections[] = array(
                    'icon'       => 'el-icon-fontsize',
                    'title'      => __( 'General Headings', 'kraftives' ),
                    'subsection' => true,
                    'fields'     => array(				
							array (
								'id' => 'general_heading_desc',
								'icon' => true,
								'type' => 'info',
								'raw' => __('<h3>General Headings Typography.</h3>
										 This is the typography settings of Headings which will be used inside the content area (From H1 to H6)', 'kraftives'),
							),// General font Heading
							
							/*array (
										'id'            => 'heading_font',
										'type'          => 'typography',
										'title'       	 => __( 'General Heading Font', 'kraftives' ),
										'google'      	=> true,
										'font-backup'   => false,
										'font-style'    => false, 
										'font-weight'   => false,
										'subsets'       => false, 
										'font-size'     => false,
										'line-height'   => false,
										'word-spacing'  => false,
										'color'         => false,
										'preview'       => true,
										'all_styles'  	=> false,
										'font-family'   => true,
										'text-align'	=> false,
										'desc'      => __( 'Select general heading font.', 'kraftives' ),
										'default'       => array(
											'font-family' => 'Open Sans',
											'google'      => true,
										),
									),*///General Headings Font
									
							array (
									'id'          => 'h_1',
									'type'        => 'typography',
									'title'       => __('Heading One (H1)', 'kraftives'),
									'desc'  	=> __('This is used to set typography of H1 tag. Default: Color:#222222,Font Size: 38px,Line Height: 44px, Font Style: Normal, Font Weight: 800', 'kraftives'),
									'text-align'  => false,
									'font-family' => false,
									'font-weight' => true,
									'default'     => array(
										'color'         => '#222222',
										'font-size'     => '38px',
										'line-height'   => '44px',
										'font-weight'   => '400',
									),
								), //H1
							
							array (
									'id'          => 'h_2',
									'type'        => 'typography',
									'title'       => __('Heading Two (H2)', 'kraftives'),
									'desc'  	=> __('This is used to set typography of H2 tag. Default: Color:#222222, Font Size: 32px, Line Height: 38px, Font Style: Normal, Font Weight: 400', 'kraftives'),
									'text-align'  => false,
									'font-family' => false,
									'font-weight' => true,
									'default'     => array(
										'color'         => '#222222',
										'font-size'     => '32px',
										'line-height'   => '38px',
										'font-weight'   => '400',
									),
								), //H2 
							
							array (
									'id'          => 'h_3',
									'type'        => 'typography',
									'title'       => __('Heading Three (H3)', 'kraftives'),
									'desc'  	=> __('This is used to set typography of H3 tag. Default: Color:#222222, Font Size: 28px, Line Height: 34px, Font Style: Normal, Font Weight: 400', 'kraftives'),
									'text-align'  => false,
									'font-family' => false,
									'font-weight' => true,
									'default'     => array(
										'color'         => '#222222',
										'font-size'     => '28px',
										'line-height'   => '34px',
										'font-weight'   => '400',
									),
								), //H3 
							
							array (
									'id'          => 'h_4',
									'type'        => 'typography',
									'title'       => __('Heading Four (H4)', 'kraftives'),
									'desc'  	=> __('This is used to set typography of H4 tag. Default: Color:#222222, Font Size: 24px, Line Height: 30px, Font Style: Normal,Font Weight: 400', 'kraftives'),
									'text-align'  => false,
									'font-family' => false,
									'font-weight' => true,
									'default'     => array(
										'color'         => '#222222',
										'font-size'     => '24px',
										'line-height'   => '30px',
										'font-weight'   => '400',
									),
								), //H4 
							
							array (
									'id'          => 'h_5',
									'type'        => 'typography',
									'title'       => __('Heading Five (H5)', 'kraftives'),
									'desc'  	=> __('This is used to set typography of H5 tag. Default: Color:#222222, Font Size: 20px, Line Height: 26px, Font Style: Normal, Font Weight: 400', 'kraftives'),
									'text-align'  => false,
									'font-family' => false,
									'font-weight' => true,
									'default'     => array(
										'color'         => '#222222',
										'font-size'     => '20px',
										'line-height'   => '26px',
										'font-weight'   => '400',
									),
								), //H5 
							
							array (
									'id'          => 'h_6',
									'type'        => 'typography',
									'title'       => __('Heading Six (H6)', 'kraftives'),
									'desc'  	=> __('This is used to set typography of H6 tag. Default: Color:#222222, Font Size: 16px, Line Height: 22px, Font Style: Normal, Font Weight: 400', 'kraftives'),
									'text-align'  => false,
									'font-family' => false,
									'font-weight' => true,
									'default'     => array(
										'color'         => '#222222',
										'font-size'     => '16px',
										'line-height'   => '22px',
										'font-weight'   => '400',
									),
								), //H6 
							array (
									'id'          => 'paragraph_content',
									'type'        => 'typography',
									'title'       => __('Paragraph/Content', 'kraftives'),
									'desc'  	=> __('This is used to set typography of p, and li tag inside the content area. Default: Color:#777777, Font Size: 14px, Line Height: 22px, Font Style: Normal, Font Weight: normal', 'kraftives'),
									'text-align'  => false,
									'font-family' => false,
									'font-weight' => true,
									'default'     => array(
										'color'         => '#777777',
										'font-size'     => '14px',
										'line-height'   => '22px',
										'font-weight'   => '400',
									),
								), //paragraph_content 
					)
                );

	/* Quotes Typography submenu */
		$this->sections[] = array(
                    'icon'       => 'el-icon-quotes',
                    'title'      => __( 'Block Quote', 'kraftives' ),
                    'subsection' => true,
                    'fields'     => array(				
							array (
								'id' 	=> 'block_quote_desc',
								'icon'  => true,
								'type'  => 'info',
								'raw'   => __('<h3>Block Quote.</h3>
											This is the typography setting for Folio Block Quotes', 'kraftives'),
							), //Block Quotes Heading
							
							array (
										'id'            => 'quote_font',
										'type'          => 'typography',
										'title'       	 => __( 'Quotes Font', 'kraftives' ),
										'google'      	=> true,
										'font-backup'   => false,
										'font-style'    => false, 
										'font-weight'   => false,
										'subsets'       => false, 
										'font-size'     => false,
										'line-height'   => false,
										'word-spacing'  => false,
										'color'         => false,
										'preview'       => true,
										'all_styles'  	=> false,
										'font-family'   => true,
										'text-align'	=> false,
										'desc'      => __( 'Select Quotes font. Default: Open Sans.', 'kraftives' ),
										'default'       => array(
											'font-family' => 'Open Sans',
											'google'      => true,
										),
									),//Block Quotes Font
							
							array (
									'id'          => 'quote_1',
									'type'        => 'typography',
									'title'       => __('BlockQuote One', 'kraftives'),
									'desc'  	=> __('This is used to set typography of Block Quote Type one. Default: Color:#000000
				,Font Size: 16px, Line Height: 28px, Font Style: Normal, Font Weight: 400', 'kraftives'),
									'text-align'  => false,
									'font-family' => false,
									'font-weight' => true,
									'default'     => array(
										'color'         => '#000000',
										'font-size'     => '16px',
										'line-height'   => '28px',
										'font-weight'   => '400',
									),
								), //Quote One
							 
							array (
									'id'          => 'quote_2',
									'type'        => 'typography',
									'title'       => __('BlockQuote Two', 'kraftives'),
									'subtitle'  	=> __('This is used to set typography of Block Quote Type two. Default: Color:#000000
				,Font Size: 22px, Line Height: 28px, Font Style: Italic, Font Weight: 400', 'kraftives'),
									'text-align'  => false,
									'font-family' => false,
									'font-weight' => true,
									'default'     => array(
										'color'         => '#000000',
										'font-size'     => '22px',
										'line-height'   => '28px',
										'font-weight'   => '400italic',
									),
								), //Quote Two
			
							array (
									'id'          => 'quote_3',
									'type'        => 'typography',
									'title'       => __('BlockQuote Three', 'kraftives'),
									'desc'  	=> __('This is used to set typography of Block Quote Type three. Default: Color:#000000, Font Size: 22px, Line Height: 28px, Font Style: Italic, Font Weight: 600', 'kraftives'),
									'text-align'  => false,
									'font-family' => false,
									'font-weight' => true,
									'default'     => array(
										'color'         => '#000000',
										'font-size'     => '22px',
										'line-height'   => '28px',
										'font-weight'   => '600italic',
									),
								), //Quote Three
							
							array (
									'id'          => 'quote_4',
									'type'        => 'typography',
									'title'       => __('BlockQuote Four', 'kraftives'),
									'desc'  	=> __('This is used to set typography of Block Quote Type Four. Default: Color:#000000, Font Size: 22px, Line Height: 28px, Font Style: Italic, Font Weight: 400', 'kraftives'),
									'text-align'  => false,
									'font-family' => false,
									'font-weight' => true,
									'default'     => array(
										'color'         => '#000000',
										'font-size'     => '22px',
										'line-height'   => '28px',
										'font-weight'   => '400italic',
									),
								), //Quote Four
								
							array (
									'id'          => 'quote_5',
									'type'        => 'typography',
									'title'       => __('BlockQuote Five', 'kraftives'),
									'desc'  	=> __('This is used to set typography of Block Quote Type Five. Default: Color:#000000, Font Size: 22px, Line Height: 28px, Font Style: Italic, Font Weight: 600', 'kraftives'),
									'text-align'  => false,
									'font-family' => false,
									'font-weight' => true,
									'default'     => array(
										'color'         => '#000000',
										'font-size'     => '22px',
										'line-height'   => '28px',
										'font-weight'   => '600italic',
									),
								), //Quote Five
					)
                );

	/* Menus Typography submenu */
		$this->sections[] = array(
                    'icon'       => 'el-icon-credit-card',
                    'title'      => __( 'Menus Typography', 'kraftives' ),
                    'subsection' => true,
                    'fields'     => array(
			/* Main Menu Typography Starts */
							array (
								'id' => 'main_menu_desc',
								'icon' => true,
								'type' => 'info',
								'raw' => __('<h3>Main Menu Typography.</h3>
											This is the typography setting of main menu', 'kraftives').
											'<br><br><img class="img_max" src="'.ReduxFramework::$_url .'assets/img/main_nav_logo.jpg">'
							), //Main Menu Heading
							
							array (
									'id'          => 'main_menu_typo',
									'type'        => 'typography',
									'title'       => __('Main Menu', 'kraftives'),
									'desc'  	=> __('This is used to set typography of main menu. Default: Color:#ffffff
				Font Size: 14px, Line Height: 14px, Font Style: Normal, Font Weight: 400', 'kraftives'),
									'text-align'  => false,
									'font-family' => false,
									'font-weight' => true,
									'default'     => array(
										'color'         => '#ffffff',
										'font-size'     => '14px',
										'line-height'   => '14px',
										'font-weight'   => '400',
									),
								), 
							array (
								'desc' => __('Pick a background color for the main navigation. (Default #000000)', 'kraftives'),
								'id' => 'main_nav_background',
								'type' => 'color',
								'title' => __('Main menu Background Color', 'kraftives'),
								'default' => '#000000',
							),
							array (
								'desc' => __('Background visibility value from 0.1 to 1.0', 'kraftives'),
								'id' => 'main_nav_bk_opacity',
								'type' => 'slider',
								'title' => __('Main Menu Background Opacity', 'kraftives'),
								'default'       => 0.9,
								'min'           => 0,
								'step'          => 0.1,
								'max'           => 1,
								'resolution'    => 0.1,
								'display_value' => 'text'
			
							),//Main Menu
							
			/*Header Menu Starts*/
							array (
								'id' => 'header_menu_desc',
								'icon' => true,
								'type' => 'info',
								'raw' => __('<h3>Header Menu Typography.</h3> 
											This is the typography setting of header menu which is used in slider module
											', 'kraftives').
											'<br><br><img class="img_max" src="'.ReduxFramework::$_url .'assets/img/header_nav_logo.jpg">'
							),
							
							array (
									'id'          => 'header_menu_typo',
									'type'        => 'typography',
									'title'       => __('Header Menu', 'kraftives'),
									'desc'  	=> __('This is used to set typography of header menu. Default: Color:#ffffff
				,Font Size: 13px, Line Height: 14px, Font Style: Normal, Font Weight: 400', 'kraftives'),
									'text-align'  => false,
									'font-family' => false,
									'font-weight' => true,
									'default'     => array(
										'color'         => '#ffffff',
										'font-size'     => '13px',
										'line-height'   => '14px',
										'font-weight'   => '400',
									),
								), //Header Menu
			/* Slidebar Menu Typography Starts */
							array (
								'id' => 'slidebar_menu_desc',
								'icon' => true,
								'type' => 'info',
								'raw' => __('<h3>Slidebar Menu Typography.</h3>
											This is the typography setting of slidebar menu', 'kraftives').
											'<br><br><img class="img_max" src="'.ReduxFramework::$_url .'assets/img/slidebar_nav_logo.jpg">'
							), //Main Menu Heading
							
							array (
									'id'          => 'slidebar_menu_typo',
									'type'        => 'typography',
									'title'       => __('Slidebar Menu', 'kraftives'),
									'desc'  	=> __('This is used to set typography of slidebar menu. Default: Color:#ffffff
				Font Size: 14px, Line Height: 14px, Font Style: Normal, Font Weight: 400', 'kraftives'),
									'text-align'  => false,
									'font-family' => false,
									'font-weight' => true,
									'default'     => array(
										'color'         => '#ffffff',
										'font-size'     => '14px',
										'line-height'   => '14px',
										'font-weight'   => '400',
									),
								), //Slidebar Menu	
							array (
								'desc' => __('Pick a background color for the main navigation. (Default #000000)', 'kraftives'),
								'id' => 'slidebar_nav_background',
								'type' => 'color',
								'title' => __('Slidebar menu Background Color', 'kraftives'),
								'default' => '#000000',
							),
							array (
								'desc' => __('Background visibility value from 0.1 to 1.0', 'kraftives'),
								'id' => 'slidebar_nav_bk_opacity',
								'type' => 'slider',
								'title' => __('Slidebar Menu Background Opacity', 'kraftives'),
								'default'       => 0.9,
								'min'           => 0,
								'step'          => 0.1,
								'max'           => 1,
								'resolution'    => 0.1,
								'display_value' => 'text'
			
							),					
					)
                );




/* Blog Settigns */
	$this->sections[] = array (
			'title' => 'Blog Settings',
			'fields' => array (
				array (
					'id' => 'blog_listing_desc',
					'icon' => true,
					'type' => 'info',
					'raw' => __('<h3>Blog Listing Page Headings.</h3>
								<strong>Note:</strong>All Settings for blog listing page will be applied on Archives and Search pages as well', 'kraftives'),
				),
				array (
					'desc' => __('Main Bold heading of blog listing page.<br>
					<strong>Note:</strong> For archive page the main heading will be the Archive title', 'kraftives'),
					'id' => 'main_heading',
					'type' => 'text',
					'title' => __('Main Heading', 'kraftives'),
					'default' => 'Latest Blog',
				),
				array (
					'desc' => __('This will be the sub heading and will be same for blog listing and archive listing pages', 'kraftives'),
					'id' => 'sub_heading',
					'type' => 'text',
					'title' => __('Sub Heading', 'kraftives'),
					'default' => __('Discussion that will <span class="highlight">never</span> ends at all', 'kraftives'),
				),
				array (
					'desc' => __('This will be the 3rd heading used as description same in blog listing and archive listing pages', 'kraftives'),
					'id' => 'heading_desc',
					'type' => 'textarea',
					'title' => __('Heading Description', 'kraftives'),
					'default' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nibh tinci dunt ut laoreet dolore magna aliquam erat volutpat.',
				),
				array (
					'desc' => __('Switch OFF for full width layout of blog and archive page. ', 'kraftives'),
					'id' => 'switch_sidebars',
					'type' => 'switch',
					'title' => __('Show / Hide Sidebars', 'kraftives'),
					'default' => 1,
				),
				array (
					'desc' => __('Select page layout settings with sidebars.<br />
									<strong>Note:</strong> This option will apply on blog listing, archive listing and search pages', 'kraftives'),
					'id' => 'layout_option',
					'type' => 'image_select',
					'options' => array (
						'sidebar_left' => array('alt' => '',  'img' => ReduxFramework::$_url . 'assets/img/sidebar_left.png'),
						'sidebar_right' => array('alt' => '',  'img' => ReduxFramework::$_url . 'assets/img/sidebar_right.png'),
						'sidebar_both' => array('alt' => '',  'img' => ReduxFramework::$_url . 'assets/img/sidebar_both.png'),
						'sidebar_2left'   => array('alt' => '',  'img' => ReduxFramework::$_url . 'assets/img/sidebar_2left.png'),
						'sidebar_2right' => array('alt' => '',  'img' => ReduxFramework::$_url . 'assets/img/sidebar_2right.png'),
					),
					'title' => __('Layout Settings', 'kraftives'),
					'default' => 'sidebar_right',
					'required' => array (
						0 => 'switch_sidebars',
						1 => '=',
						2 => 1,
					),
				),
				array (
					'desc' => __('Select Pagination alignment <br />
								<strong>Note:</strong> This option will apply on blog listing, archive listing and search pages', 'kraftives'),
					'id' => 'page_nav_ali',
					'type' => 'select',
					'options' => array (
						'left' => __('Left', 'kraftives'),
						'right' => __('Right', 'kraftives'),
						'center' => __('Center', 'kraftives'),
					),
					'title' => __('Pagination Alignment', 'kraftives'),
					'default' => 'right',
				),
				array (
					'desc' => __('Show / Hide comments count<br />
								<strong>Note:</strong> This option will apply on blog listing, archive listing and search pages', 'kraftives'),
					'id' => 'comment_count',
					'on' => __('Show', 'kraftives'),
					'off' => __('Hide', 'kraftives'),
					'type' => 'switch',
					'title' => __('Show / Hide Comments Count', 'kraftives'),
					'default' => 1,
				),
				array (
					'desc' => __('Show / Hide Author of posts<br />
								<strong>Note:</strong> This option will apply on blog listing, archive listing and search pages', 'kraftives'),
					'id' => 'hide_author',
					'on' => __('Show', 'kraftives'),
					'off' => __('Hide', 'kraftives'),
					'type' => 'switch',
					'title' => __('Show / Hide Author', 'kraftives'),
					'default' => 1,
				),
				array (
					'desc' => __('Show / Hide category of posts<br />
								<strong>Note:</strong> This option will apply on blog listing, archive listing and search pages', 'kraftives'),
					'id' => 'hide_categories',
					'on' => __('Show', 'kraftives'),
					'off' => __('Hide', 'kraftives'),
					'type' => 'switch',
					'title' => __('Show / Hide Categories list', 'kraftives'),
					'default' => 1,
				),
				array (
					'desc' => __('Show / Hide Tags of posts<br />
								<strong>Note:</strong> This option will apply on blog listing, archive listing and search pages', 'kraftives'),
					'id' => 'hide_tags',
					'on' => __('Show', 'kraftives'),
					'off' => __('Hide', 'kraftives'),
					'type' => 'switch',
					'title' => __('Show / Hide Tags', 'kraftives'),
					'default' => 1,
				),

				array (
					'desc' => __('Excerpt length is calculated by words Ex: 37<br />
								<strong>Note:</strong> This option will apply on blog listing, archive listing and search pages', 'kraftives'),
					'id' => 'excerpt_length',
					'type' => 'text',
					'title' => __('Excerpt Length', 'kraftives'),
					'default' => '37',
				),
				
				array (
					'desc' => __('This will display the map in footer of <br />
								This option will apply on blog listing, archive listing and search pages
								<br />
								<strong>Note:</strong>To display map, make sure that you have enabled map from theme options.', 'kraftives'),
					'id' => 'blog_listing_map',
					'on' => __('Show', 'kraftives'),
					'off' => __('Hide', 'kraftives'),
					'type' => 'switch',
					'title' => __('Display Map', 'kraftives'),
					'default' => 1,
				),
				array (
					'desc' => __('This will display curve style of Map on footer.<br />
								This option will apply on blog listing, archive listing and search pages.', 'kraftives'),
					'id' => 'is_curve_on_blog',
					'type' => 'switch',
					'on' =>	__('Active', 'kraftives'),
					'off' => __('Deactive', 'kraftives'),
					'title' => __('Curve Style', 'kraftives'),
					'default' => 1,
				),

			),
			'icon' => 'el-icon-list-alt',
		);

/* Blog Menu settings submenu */
		$this->sections[] = array(
                    'icon'       => 'el-icon-credit-card',
                    'title'      => __( 'Blog Main Menu', 'kraftives' ),
                    'subsection' => true,
                    'fields'     => array(
						/* Blog Main Menu */
						array (
							'id' => 'blog_nav_desc',
							'icon' => true,
							'type' => 'info',
							'raw' => __('<h3>Menu Settings for Blog Listing, Archive & Search Pages .</h3>
									 Set main menu settings for blog listing archive & search pages<br>
									 <em><strong>Note:</strong> These settings will only apply on blog listing, archive listing, search listings and 404 pages. <br />
									 For other pages, posts, portfolio etc you have to manage these settings individually.</em>', 'kraftives').'<br><br>
									 <img class="img_max" src="' .ReduxFramework::$_url .'assets/img/main_nav_logo.jpg"><br>'
						),
						array (
							'desc' => __('Select menu to display on blog listing and archive page. Default: Primary Menu<br />
										<strong>Note:</strong> These settings will only apply on blog listing, archive listing, search listings and 404 pages.', 'kraftives'),
							'id' => 'blog_menu',
							'type' => 'select',
							'options' => folio_get_menu_list(),
							'title' => __('Select Menu', 'kraftives'),
							'default' => 'folio_primarymenu',
						),
						array (
							'desc' => __('On / Off Sticky Naviagtion', 'kraftives'),
							'id' => 'sticky_menu',
							'type' => 'switch',
							'title' => __('On / Off Sticky Naviagtion', 'kraftives'),
							'default' => 1,
						),
						array (
							'desc' => __('Turn On / Off menu on blog and archive page. If sticky menu is enable then disable this feature to show menu on sticking at the top.', 'kraftives'),
							'id' => 'show_always',
							'type' => 'switch',
							'title' => __('Always Show Menu', 'kraftives'),
							'default' => 0
						),
					
					)
                );
/* Blog single settings submenu */
		$this->sections[] = array(
                    'icon'       => 'el-icon-calendar',
                    'title'      => __( 'Blog Single Page', 'kraftives' ),
                    'subsection' => true,
                    'fields'     => array(
						array (
							'desc' => __('Display Previous/Next Post Navigation on blog single post', 'kraftives'),
							'id' => 'prev_next_nav',
							'type' => 'switch',
							'title' => __('Prev/Next Post Navigation', 'kraftives'),
							'default' => 1,
						),
						array (
							'desc' => __('Set position of Navigation menu on single blog post.', 'kraftives'),
							'id' => 'prev_next_nav_position',
							'type' => 'radio',
							'options' => array (
								'before_comment' => __('Before Comments', 'kraftives'),
								'after_comment' => __('After Comments', 'kraftives'),
							),
							'title' => __('Position of Previous/Next Post Naviagtion', 'kraftives'),
							'default' => 'after_comment',
							'required' => array (
								0 => 'prev_next_nav',
								1 => '=',
								2 => 1,
							),
						),
						array (
							'desc' => __('Display Social sharing bar on blog single post', 'kraftives'),
							'id' => 'social_sharing_bar',
							'type' => 'switch',
							'title' => __('Social Sharing bar', 'kraftives'),
							'default' => 1,
						),
						
						array (
							'desc' => __('Set share bar title for blog single post.', 'kraftives'),
							'id' => 'share_bar_title',
							'title' => __('Share Bar Title', 'kraftives'),
							'type' => 'text',
							'default' => __('Share the Story @', 'kraftives'),
							'required' => array (
								0 => 'social_sharing_bar',
								1 => '=',
								2 => 1,
							),
		
						),
		
						array (
							'desc' => __('Set position of social sharing bar on single blog post.', 'kraftives'),
							'id' => 'social_sharing_bar_pos',
							'type' => 'radio',
							'options' => array (
								'after_title' => __('After title', 'kraftives'),
								'before_comment' => __('Before Comments', 'kraftives'),
							),
							'title' => __('Position of Social Sharing bar', 'kraftives'),
							'default' => 'before_comment',
							'required' => array (
								0 => 'social_sharing_bar',
								1 => '=',
								2 => 1,
							),
						),
						array (
							'desc' => __('Enable and Disable social media sharing icon by drag and drop feature to display on blog single post', 'kraftives'),
							'id' => 'enable_social_sharing',
							'type' => 'sorter',
							'title' => __('Social Media Sharing', 'kraftives'),
							'required' => array (
								0 => 'social_sharing_bar',
								1 => '=',
								2 => 1,
							),
							'options' => array (
								'disabled' => array (
									'facebook' => __('Facebook', 'kraftives'),
									'pinterest' => __('Pinterest', 'kraftives'),
								),
								'enabled' => array (
									'twitter' => __('Twitter', 'kraftives'),
									'linkedin' => __('Linked In', 'kraftives'),
									'google' => __('Google Plus', 'kraftives'),
								),
							),
						),
					
					)
                );

/* Social Networks Settigns */
	
	$this->sections[] = array (
			'title' => __('Social Networks', 'kraftives'),
			'fields' => array (
				array (
					'desc' => __('Enter Facebook Link.', 'kraftives'),
					'id' => 'facebook',
					'type' => 'text',
					'title' => __('Facebook', 'kraftives'),
					'default' => ''
				),
				array (
					'desc' => __('Enter Linkedin Link.', 'kraftives'),
					'id' => 'linkedin',
					'type' => 'text',
					'title' => __('LinkedIn', 'kraftives'),
					'default' => ''
				),
				array (
					'desc' => __('Enter Google Plus Link.', 'kraftives'),
					'id' => 'google-plus',
					'type' => 'text',
					'title' => __('Google Plus', 'kraftives'),
					'default' => ''
				),
				array (
					'desc' => __('Enter Twitter Link.', 'kraftives'),
					'id' => 'twitter',
					'type' => 'text',
					'title' => __('Twitter', 'kraftives'),
					'default' => ''
				),
				array (
					'desc' => __('Enter Youtube Link.', 'kraftives'),
					'id' => 'youtube-play',
					'type' => 'text',
					'title' => __('Youtube', 'kraftives'),
					'default' => ''
				),
				array (
					'desc' => __('Enter Vimeo Link.', 'kraftives'),
					'id' => 'vimeo-square',
					'type' => 'text',
					'title' => __('Vimeo', 'kraftives'),
					'default' => ''
				),

				array (
					'desc' => __('Enter pinterest Link.', 'kraftives'),
					'id' => 'pinterest',
					'type' => 'text',
					'title' => __('Pinterest', 'kraftives'),
					'default' => ''
				),

				array (
					'desc' => __('Enter Behance Link.', 'kraftives'),
					'id' => 'behance',
					'type' => 'text',
					'title' => __('Behance', 'kraftives'),
					'default' => ''
				),
				array (
					'desc' => __('Enter Skype Link.', 'kraftives'),
					'id' => 'skype',
					'type' => 'text',
					'title' => __('Skype', 'kraftives'),
					'default' => ''
				),

				array (
					'desc' => __('Enter Instagram Link.', 'kraftives'),
					'id' => 'instagram',
					'type' => 'text',
					'title' => __('Instagram', 'kraftives'),
					'default' => ''
				),

				array (
					'desc' => __('Enter Delicious Link.', 'kraftives'),
					'id' => 'delicious',
					'type' => 'text',
					'title' => __('Delicious', 'kraftives'),
					'default' => ''
				),
				array (
					'desc' => __('Enter Soundcloud Link.', 'kraftives'),
					'id' => 'soundcloud',
					'type' => 'text',
					'title' => __('Soundcloud', 'kraftives'),
					'default' => ''
				),
				array (
					'desc' => __('Enter Flickr Link.', 'kraftives'),
					'id' => 'flickr',
					'type' => 'text',
					'title' => __('Flickr', 'kraftives'),
					'default' => ''
				),
				array (
					'desc' => __('Enter Rss Feeds Link.', 'kraftives'),
					'id' => 'rss',
					'type' => 'text',
					'title' => __('Rss Feeds', 'kraftives'),
					'default' => ''
				),
			),
			'icon' => 'el-icon-comment-alt',
		);

/* Portfolio Listing Settings */
	$this->sections[] = array (
					'title' => __('Portfolio Listing', 'kraftives'),
					'fields' => array (
						array (
							'desc' => __('Main Bold heading of portfolio listing page.<br>
							<strong>Note:</strong> For portfolio archive page the main heading will be the portfolio Archive title', 'kraftives'),
							'id' => 'portfolio_main_heading',
							'type' => 'text',
							'title' => __('Main Heading', 'kraftives'),
							'default' => 'Creative so far',
						),
						array (
							'desc' => __('This will be the sub heading and will be same for portfolio listing and portfolio archive listing pages', 'kraftives'),
							'id' => 'portfolio_sub_heading',
							'type' => 'text',
							'title' => __('Sub Heading', 'kraftives'),
							'default' => __('Grab some Pop corns and enjoy', 'kraftives'),
						),
						array (
							'desc' => __('This will be the 3rd heading used as description same in portfolio listing and portfolio archive listing pages', 'kraftives'),
							'id' => 'portfolio_heading_desc',
							'type' => 'textarea',
							'title' => __('Heading Description', 'kraftives'),
							'default' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nibh tinci dunt ut laoreet dolore magna aliquam erat volutpat.',
						),

					array(
							 "type" => "text",
							 "title" => __("Custom Slug for Portfolio", "kraftives"),
							 "id" => "portfolio_slug",
							 "description" => __("You can replace the default portfolio slug , set here custom portfolio slug then access portfolio listing page. Default: portfolio", "kraftives")
						  ),

						array (
							'desc' => __('Set how many portfolio items would you like to include in the grid. Use -1 to include all your items.', 'kraftives'),
							'id' => 'portfolio_items_show',
							'type' => 'slider',
							'title' => __('Number of Items to Display', 'kraftives'),
							'default' => -1,
							'min'           => -1,
							'step'          => 1,
							'max'           => 500,
							'resolution'    => 1,
							'display_value' => 'text'

						),
						array (
							'desc' => __('Select portfolio categories to display in filterable navigation. If no category selected, all portfolio projects will display', 'kraftives'),
							'id' => 'portfolio_categories',
							'type' => 'select',
							'multi'    => true,
							'title' => __('Navigation Categories to Filter', 'kraftives'),
							'default' => '',
							'options' => folio_get_all_cat_list()
						),
						array(
							 "type" => "select",
							 "title" => __("Portfolio Navigation Alignment", "kraftives"),
							 "id" => "portfolio_align",
							 "default" => "align_center",
							 "options" => array(
											'align_left' => __("Left", "kraftives"), 
											'align_right' => __("Right", "kraftives"),
											'align_center' => __("Center", "kraftives")
										),
							 "description" => __("Set alignment of filterable Portfolio navigation on portfolio listing page.", "kraftives")
						  ), 
						array(
							 "type" => "text",
							 "title" => __("Keyword for All Projects Filter", "kraftives"),
							 "id" => "allword",
							 "default" => "All",
							 "description" => __("You can replace the default 'All' keyword for the initial filter with another one. If you want to hide it", "kraftives")
						  ),
				
						  array(
							 "type" => "select",
							 "title" => __("Grid Layout Style", "kraftives"),
							 "id" => "portfolio_style",
							 "default" => "three_columns",
							 "options" => array(
											'three_columns' => __("Three Columns", "kraftives"), 
											'four_columns' => __("Four Columns", "kraftives")
										),
							 "description" => __("Set the portfolio grid view option two view option are available : Three Columns and Four Columns Page View.", "kraftives")
						  ),      
						
						array (
					'desc' => __('This will display the map in footer of <br />
								This option will apply on portfolio listing page
								<br />
								<strong>Note:</strong>To display map, make sure that you have enabled map from theme options.', 'kraftives'),
					'id' => 'portfolio_listing_map',
					'on' => __('Show', 'kraftives'),
					'off' => __('Hide', 'kraftives'),
					'type' => 'switch',
					'title' => __('Display Map', 'kraftives'),
					'default' => 1,
				),
						array (
					'desc' => __('This will display curve style of Map on footer.<br />
								This option will apply on portfolio listing page.', 'kraftives'),
					'id' => 'is_curve_on_portfolio',
					'type' => 'switch',
					'on' =>	__('Active', 'kraftives'),
					'off' => __('Deactive', 'kraftives'),
					'title' => __('Curve Style', 'kraftives'),
					'default' => 1,
				),

					),
					'icon' => 'el-icon-th',
				);


/* Footer Settigns */
	$this->sections[] = array (
			'title' => __('Footer', 'kraftives'),
			'fields' => array (
				
				array (
					'desc' => __('Organize how you want to show social icons in 404 page', 'kraftives'),
					'id' => 'arrang_social_icon',
					'type' => 'sorter',
					'title' => __('Arrange Social Icons', 'kraftives'),
					'options' => array (
						'disabled' => array (
							'flickr' => __('Flickr', 'kraftives'),
							'youtube-play' => __('Youtbe', 'kraftives'),
							'vimeo-square' => __('Vimeo', 'kraftives'),
							'rss' => __('RSS Feeds', 'kraftives'),
							'skype' => __('Skype', 'kraftives'),
							'pinterest' => __('Pinterest', 'kraftives'),
							'behance' => __('Behance', 'kraftives'),
							'instagram' => __('Instagram', 'kraftives'),
							'delicious' => __('Delicious', 'kraftives'),
							'soundcloud' => __('Soundcloud', 'kraftives'),
						),
						'enabled' => array (
							'facebook' => __('Facebook', 'kraftives'),
							'twitter' => __('Twitter', 'kraftives'),
							'linkedin' => __('Linked In', 'kraftives'),
							'google-plus' => __('Google Plus', 'kraftives'),
						),
					),
				),
				array (
					'desc' => __('Show hide footer text. ', 'kraftives'),
					'id' => 'switch_footer_text',
					'type' => 'switch',
					'title' => __('Footer Text', 'kraftives'),
					'default' => 1,
				),
				array (
					'desc' => __('Footer copyright text here.', 'kraftives'),
					'id' => 'footer_text',
					'type' => 'editor',
					'title' => __('Footer Text', 'kraftives'),
					'default' => 'Copyright &copy; 2014 Design with <span><i class="fa fa-heart"></i></span> love by <a href="http://kraftives.com">Kraftives.com</a>',
					'required' => array (
						0 => 'switch_footer_text',
						1 => '=',
						2 => 1,
					),
				),
				array (
					'desc' => __('Pick a background color for the footer (default: #222222).', 'kraftives'),
					'id' => 'footer_background',
					'type' => 'color',
					'title' => __('Footer Background Color', 'kraftives'),
					'default' => '',
				),
				array (
					'desc' => __('Pick a font color of text present in footer (default: #555555).', 'kraftives'),
					'id' => 'footer_font_color',
					'type' => 'color',
					'title' => __('Footer text font color', 'kraftives'),
					'default' => '#555555',
				),
				array (
					'desc' => __('Set Footer top padding.Default: 0px', 'kraftives'),
					'id' => 'footer_top_padding',
					'type' => 'select',
					'options' => folio_font_size(),
					'title' => __('Footer Top Padding ', 'kraftives'),
					'default' => '0',
				),
				array (
					'desc' => __('Set Footer bottom padding. Default: 0px', 'kraftives'),
					'id' => 'footer_bottom_padding',
					'type' => 'select',
					'options' => folio_font_size(),
					'title' => __('Footer Bottom Padding ', 'kraftives'),
					'default' => '0'
				),
			),
			'icon' => 'el-icon-website',
		);
	/* Footer Google Map Settigns */
		$this->sections[] = array(
                    'icon'       => 'el-icon-map-marker',
                    'title'      => __( 'Footer Map Settings', 'kraftives' ),
                    'subsection' => true,
                    'fields'     => array(
						array (
							'id' => 'map_desc',
							'icon' => true,
							'type' => 'info',
							'raw' => __('<h3>Google Map.</h3>
										Global Settings for google map displayed in footer', 'kraftives'),
						),
						array (
							'desc' => __('Show / hide google map globaly.<br />
										<strong>Note:</strong> You can enable and disable map to show and hide from each individual pages, posts & portfolio', 'kraftives'),
							'id' => 'gmap_show_hide',
							'type' => 'switch',
							'on' =>	__('Show', 'kraftives'),
							'off' => __('Hide', 'kraftives'),
							'title' => __('Show / Hide Google Map', 'kraftives'),
							'default' => 0,
						),

						array (
							'desc' => __('Show / hide toggle button from footer map.', 'kraftives'),
							'id' => 'show_hide_toogle_button',
							'type' => 'switch',
							'on' =>	__('Show', 'kraftives'),
							'off' => __('Hide', 'kraftives'),
							'title' => __('Show / Hide Toggle Button', 'kraftives'),
							'default' => 1,
							'required' => array (
								0 => 'gmap_show_hide',
								1 => '=',
								2 => 1,
							),
						),
						
						array (
							'desc' => __('Google map toggle button text', 'kraftives'),
							'id' => 'gmap_toggle_btn_txt',
							'type' => 'text',
							'default' => 'Map Location',
							'title' => __('Google Map Toggle Button Text', 'kraftives'),
							'required' => array (
								0 => 'show_hide_toogle_button',
								1 => '=',
								2 => 1,
							),
						),	
						array (
							'desc' => __('Select map toggle state between open or close when loaded.', 'kraftives'),
							'id' => 'map_toggle_state',
							'type' => 'switch',
							'on' =>	__('Open', 'kraftives'),
							'off' => __('Close', 'kraftives'),
							'title' => __('Map Toggle state.', 'kraftives'),
							'default' => 1,
							'required' => array (
								0 => 'show_hide_toogle_button',
								1 => '=',
								2 => 1,
							),
						),			
						array (
							'desc' => __('Select map style type between default, dark and greyscale', 'kraftives'),
							'id' => 'gmap_type',
							'type' => 'select',
							'title' => __('Map Type', 'kraftives'),
							'default' => 'greyscale',
							'options' => array( 
											'default' => __('Default', 'kraftives'), 
											'dark' => __('Dark', 'kraftives'), 
											'greyscale' => __('Greyscale', 'kraftives') 
										),
							'required' => array (
								0 => 'gmap_show_hide',
								1 => '=',
								2 => 1,
							),
						),
						array (
							'desc' => __('Active Curve Style.<br />
										<strong>Note:</strong> You can enable curve style for map', 'kraftives'),
							'id' => 'is_curve',
							'type' => 'switch',
							'on' =>	__('Active', 'kraftives'),
							'off' => __('Deactive', 'kraftives'),
							'title' => __('Curve Style', 'kraftives'),
							'default' => 1,
							'required' => array (
								0 => 'gmap_show_hide',
								1 => '=',
								2 => 1,
							),
						),
						array (
							'desc' => __('Map zoom level. Default: 14.', 'kraftives'),
							'id' => 'gmap_zoom_level',
							'min' => '8',
							'step' => '1',
							'max' => '20',
							'type' => 'slider',
							'title' => __('Zoom Level', 'kraftives'),
							'default' => '14',
							'required' => array (
								0 => 'gmap_show_hide',
								1 => '=',
								2 => 1,
							),
						),
						array (
							'desc' => __('Select map location by address or latitude & langitude. Default: address', 'kraftives'),
							'id' => 'find_location_by',
							'type' => 'select',
							'title' => __('Select Location By Type', 'kraftives'),
							'default' => 'address',
							'options' => array( 'address' => 'Address', 'lat_lang' => 'Latitude & Longitude' ),
							'required' => array (
								0 => 'gmap_show_hide',
								1 => '=',
								2 => 1,
							),
						),
						array (
							'desc' => __('Enter address to find loaction on map.', 'kraftives'),
							'id' => 'gmap_address',
							'type' => 'text',
							'title' => __('Address', 'kraftives'),
							'default' => '38th AVENUE STREET, Calgary, AB Canada',
							'required' => array (
								0 => 'find_location_by',
								1 => '=',
								2 => 'address',
							),
						),						
						array (
							'desc' => __('Enter Latitude to find loaction on map.', 'kraftives'),
							'id' => 'gmap_latitude',
							'type' => 'text',
							'title' => __('Latitude', 'kraftives'),
							'default' => '37.422117',
							'required' => array (
								0 => 'find_location_by',
								1 => '=',
								2 => 'lat_lang',
							),
						),						
						array (
							'desc' => __('Enter Longitude to find loaction on map.', 'kraftives'),
							'id' => 'gmap_longitude',
							'type' => 'text',
							'title' => __('Longitude', 'kraftives'),
							'default' => '-122.084053',
							'required' => array (
								0 => 'find_location_by',
								1 => '=',
								2 => 'lat_lang',
							),
						),						
						array (
							'desc' => __('Enter map marker title.', 'kraftives'),
							'id' => 'gmap_marker_title',
							'type' => 'text',
							'title' => __('Map Marker Title', 'kraftives'),
							'default' => 'Kraftives',
							'required' => array (
								0 => 'gmap_show_hide',
								1 => '=',
								2 => 1,
							),
						),						
						array (
							'desc' => __('Upload custom map marker.', 'kraftives'),
							'id' => 'gmap_marker_img',
							'type' => 'media',
							'title' => __('Map Marker Image', 'kraftives'),
							'url' => true,
							'required' => array (
								0 => 'gmap_show_hide',
								1 => '=',
								2 => 1,
							),
		
						),
						array (
							'desc' => __('Set marker height. Default: 105px', 'kraftives'),
							'id' => 'gmap_marker_height',
							'type' => 'select',
							'options' => folio_font_size(),
							'title' => __('Map Marker Height', 'kraftives'),
							'default' => '105',
							'required' => array (
								0 => 'gmap_show_hide',
								1 => '=',
								2 => 1,
							),
		
						),
						array (
							'desc' => __('Set marker width. Default: 308px', 'kraftives'),
							'id' => 'gmap_marker_width',
							'type' => 'select',
							'options' => folio_font_size(),
							'title' => __('Map Marker Width', 'kraftives'),
							'default' => '308',
							'required' => array (
								0 => 'gmap_show_hide',
								1 => '=',
								2 => 1,
							),
		
						),
						array (
							'desc' => __('Enter map height.', 'kraftives'),
							'id' => 'gmap_map_height',
							'type' => 'text',
							'title' => __('Map Height', 'kraftives'),
							'default' => 500,
							'required' => array (
								0 => 'gmap_show_hide',
								1 => '=',
								2 => 1,
							),
						),
					
					)
                );


/* 404 Page Settigns */                
	$this->sections[] = array (
			'title' => __('Page 404', 'kraftives'),
			'fields' => array (

				array (
					'desc' => __('This will be the 404 word replacment.', 'kraftives'),
					'id' => 'word_404',
					'type' => 'text',
					'title' => __('404', 'kraftives'),
					'default' => '404',
				),
				array (
					'desc' => __('This will be the main heading of 404 page.', 'kraftives'),
					'id' => 'main_heading_404',
					'type' => 'text',
					'title' => __('404 Page Main Heading', 'kraftives'),
					'default' => 'Error 404',
				),
				array (
					'desc' => __('This will be the sub heading 404 page.', 'kraftives'),
					'id' => 'sub_heading_404',
					'type' => 'text',
					'title' => __('404 Page Sub Heading', 'kraftives'),
					'default' => 'The Desired Page Not Found.',
				),
				array (
					'desc' => __('This will be the Description of 404 page.', 'kraftives'),
					'id' => 'heading_desc_404',
					'type' => 'textarea',
					'title' => __('404 Page Heading Description', 'kraftives'),
					'default' => __('Sorry, but the requested resource was not found on this site. Please try again or contact the administrator for assistance.', 'kraftives'),
				),
			),
			'icon' => 'el-icon-remove-circle',
		);

	$this->sections[] = array(
		'type' => 'divide',
	);

/* Documention Settigns */
	if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
		$this->sections[] = array(
			'icon'   => 'el-icon-list-alt',
			'title'  => __( 'Documentation', 'kraftives' ),
			'fields' => array(
				array(
					'id'       => 'documantion',
					'type'     => 'raw',
					'markdown' => true,
					'content'  => file_get_contents( dirname( __FILE__ ) . '/../README.md' )
				),
			),
		);
	}
	
                $theme_info = '<div class="redux-framework-section-desc">';
                $theme_info .= '<p class="redux-framework-theme-data description theme-uri">' . __( '<strong>Theme URL:</strong> ', 'redux-framework-demo' ) . '<a href="' . $this->theme->get( 'ThemeURI' ) . '" target="_blank">' . $this->theme->get( 'ThemeURI' ) . '</a></p>';
                $theme_info .= '<p class="redux-framework-theme-data description theme-author">' . __( '<strong>Author:</strong> ', 'redux-framework-demo' ) . $this->theme->get( 'Author' ) . '</p>';
                $theme_info .= '<p class="redux-framework-theme-data description theme-version">' . __( '<strong>Version:</strong> ', 'redux-framework-demo' ) . $this->theme->get( 'Version' ) . '</p>';
                $theme_info .= '<p class="redux-framework-theme-data description theme-description">' . $this->theme->get( 'Description' ) . '</p>';
                $tabs = $this->theme->get( 'Tags' );
                if ( ! empty( $tabs ) ) {
                    $theme_info .= '<p class="redux-framework-theme-data description theme-tags">' . __( '<strong>Tags:</strong> ', 'redux-framework-demo' ) . implode( ', ', $tabs ) . '</p>';
                }
                $theme_info .= '</div>';


                $this->sections[] = array(
                    'icon'   => 'el-icon-info-sign',
                    'title'  => __( 'Theme Information', 'redux-framework-demo' ),
                    'desc'   => __( '<p class="description">This is the Description. Again HTML is allowed</p>', 'redux-framework-demo' ),
                    'fields' => array(
                        array(
                            'id'      => 'opt-raw-info',
                            'type'    => 'raw',
                            'content' => $item_info,
                        )
                    ),
                );

                if ( file_exists( trailingslashit( dirname( __FILE__ ) ) . 'README.html' ) ) {
                    $tabs['docs'] = array(
                        'icon'    => 'el-icon-book',
                        'title'   => __( 'Documentation', 'redux-framework-demo' ),
                        'content' => nl2br( file_get_contents( trailingslashit( dirname( __FILE__ ) ) . 'README.html' ) )
                    );
                }
            }

            public function setHelpTabs() {

                // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
                $this->args['help_tabs'][] = array(
                    'id'      => 'redux-help-tab-1',
                    'title'   => __( 'Theme Information 1', 'redux-framework-demo' ),
                    'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
                );

                $this->args['help_tabs'][] = array(
                    'id'      => 'redux-help-tab-2',
                    'title'   => __( 'Theme Information 2', 'redux-framework-demo' ),
                    'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
                );

                // Set the help sidebar
                $this->args['help_sidebar'] = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo' );
            }

            /**
             * All the possible arguments for Redux.
             * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
             * */
            public function setArguments() {

                $theme = wp_get_theme(); // For use with some settings. Not necessary.

                $this->args = array(
                    // TYPICAL -> Change these values as you need/desire
                    'opt_name'             => 'fdata',
                    // This is where your data is stored in the database and also becomes your global variable name.
                    'display_name'         => $theme->get( 'Name' ),
                    // Name that appears at the top of your panel
                    'display_version'      => $theme->get( 'Version' ),
                    // Version that appears at the top of your panel
                    'menu_type'            => 'menu',
                    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                    'allow_sub_menu'       => true,
                    // Show the sections below the admin menu item or not
                    'menu_title'           => __( 'Theme Options', 'redux-framework-demo' ),
                    'page_title'           => __( 'Theme Options', 'redux-framework-demo' ),
                    // You will need to generate a Google API key to use this feature.
                    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                    'google_api_key'       => '',
                    // Set it you want google fonts to update weekly. A google_api_key value is required.
                    'google_update_weekly' => false,
                    // Must be defined to add google fonts to the typography module
                    'async_typography'     => true,
                    // Use a asynchronous font on the front end or font string
                    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
                    'admin_bar'            => true,
                    // Show the panel pages on the admin bar
                    'admin_bar_icon'     => 'dashicons-portfolio',
                    // Choose an icon for the admin bar menu
                    'admin_bar_priority' => 50,
                    // Choose an priority for the admin bar menu
                    'global_variable'      => '',
                    // Set a different name for your global variable other than the opt_name
                    'dev_mode'             => false,
                    // Show the time the page took to load, etc
                    'update_notice'        => true,
                    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
                    'customizer'           => true,
                    // Enable basic customizer support
                    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
                    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

                    // OPTIONAL -> Give you extra features
                    'page_priority'        => null,
                    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                    'page_parent'          => 'themes.php',
                    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                    'page_permissions'     => 'manage_options',
                    // Permissions needed to access the options panel.
                    'menu_icon'            => get_template_directory_uri(). '/favicon.ico',
                    // Specify a custom URL to an icon
                    'last_tab'             => '',
                    // Force your panel to always open to a specific tab (by id)
                    'page_icon'            => 'icon-themes',
                    // Icon displayed in the admin panel next to your menu_title
                    'page_slug'            => 'kraftives_options',
                    // Page slug used to denote the panel
                    'save_defaults'        => true,
                    // On load save the defaults to DB before user clicks save or not
                    'default_show'         => false,
                    // If true, shows the default value next to each field that is not the default value.
                    'default_mark'         => '',
                    // What to print by the field's title if the value shown is default. Suggested: *
                    'show_import_export'   => true,
                    // Shows the Import/Export panel when not used as a field.

                    // CAREFUL -> These options are for advanced use only
                    'transient_time'       => 60 * MINUTE_IN_SECONDS,
                    'output'               => true,
                    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                    'output_tag'           => true,
                    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

                    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                    'database'             => '',
                    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                    'system_info'          => false,
                    // REMOVE

                    // HINTS
                    'hints'                => array(
                        'icon'          => 'icon-question-sign',
                        'icon_position' => 'right',
                        'icon_color'    => 'lightgray',
                        'icon_size'     => 'normal',
                        'tip_style'     => array(
                            'color'   => 'light',
                            'shadow'  => true,
                            'rounded' => false,
                            'style'   => '',
                        ),
                        'tip_position'  => array(
                            'my' => 'top left',
                            'at' => 'bottom right',
                        ),
                        'tip_effect'    => array(
                            'show' => array(
                                'effect'   => 'slide',
                                'duration' => '500',
                                'event'    => 'mouseover',
                            ),
                            'hide' => array(
                                'effect'   => 'slide',
                                'duration' => '500',
                                'event'    => 'click mouseleave',
                            ),
                        ),
                    )
                );

                // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
                $this->args['admin_bar_links'][] = array(
                    'id'    => 'redux-docs',
                    'href'   => 'http://docs.reduxframework.com/',
                    'title' => __( 'Documentation', 'redux-framework-demo' ),
                );

                $this->args['admin_bar_links'][] = array(
                    //'id'    => 'redux-support',
                    'href'   => 'https://github.com/ReduxFramework/redux-framework/issues',
                    'title' => __( 'Support', 'redux-framework-demo' ),
                );

                $this->args['admin_bar_links'][] = array(
                    'id'    => 'redux-extensions',
                    'href'   => 'reduxframework.com/extensions',
                    'title' => __( 'Extensions', 'redux-framework-demo' ),
                );

             

                // Panel Intro text -> before the form
                /*if ( ! isset( $this->args['global_variable'] ) || $this->args['global_variable'] !== false ) {
                    if ( ! empty( $this->args['global_variable'] ) ) {
                        $v = $this->args['global_variable'];
                    } else {
                        $v = str_replace( '-', '_', $this->args['opt_name'] );
                    }
                    //$this->args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'redux-framework-demo' ), $v );
                } else {
                    //$this->args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'redux-framework-demo' );
                }

                // Add content after the form.
                //$this->args['footer_text'] = __( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'redux-framework-demo' );*/
            }

            public function validate_callback_function( $field, $value, $existing_value ) {
                $error = true;
                $value = 'just testing';

                /*
              do your validation

              if(something) {
                $value = $value;
              } elseif(something else) {
                $error = true;
                $value = $existing_value;
                
              }
             */

                $return['value'] = $value;
                $field['msg']    = 'your custom error message';
                if ( $error == true ) {
                    $return['error'] = $field;
                }

                return $return;
            }

            public function class_field_callback( $field, $value ) {
                print_r( $field );
                echo '<br/>CLASS CALLBACK';
                print_r( $value );
            }

        }

        global $reduxConfig;
        $reduxConfig = new Redux_Framework_sample_config();
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ):
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    endif;

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ):
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error = true;
            $value = 'just testing';

            /*
          do your validation

          if(something) {
            $value = $value;
          } elseif(something else) {
            $error = true;
            $value = $existing_value;
            
          }
         */

            $return['value'] = $value;
            $field['msg']    = 'your custom error message';
            if ( $error == true ) {
                $return['error'] = $field;
            }

            return $return;
        }
    endif;
