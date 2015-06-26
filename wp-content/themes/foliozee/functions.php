<?php
function kraftive_setup() {
	
	
	define('CSS_PATH', get_template_directory_uri(). '/assets/css/');
	define('JS_PATH', get_template_directory_uri(). '/assets/js/');
	define('IMAGES_PATH', get_template_directory_uri(). '/assets/images/');
	
	load_theme_textdomain('kraftives', get_template_directory() . '/languages');

	  // Add post formats (http://codex.wordpress.org/Post_Formats)
	  if(folio_get_current_post_type()==='portfolio'){
	  	add_theme_support('post-formats', array('image', 'gallery', 'video'));
	  }else{ // for default blog posts
		  add_theme_support('post-formats', array('image', 'gallery', 'video', 'audio', 'quote'));

	  }
	  add_theme_support( 'title-tag' );
	  // Tell the TinyMCE editor to use a custom stylesheet
  	  add_editor_style('custom/custom_fields/assets/css/editor-style.css');
	  
	  $defaults = array(
		'default-image'          => '',
		'random-default'         => false,
		'width'                  => 0,
		'height'                 => 0,
		'flex-height'            => false,
		'flex-width'             => false,
		'default-text-color'     => '',
		'header-text'            => true,
		'uploads'                => true,
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-header', $defaults );
}

add_action('after_setup_theme', 'kraftive_setup');

/* enqueued scripts in includes.php */
require_once locate_template('/inc/includes.php'); 

//require_once locate_template('/vc_extend/vc-includes.php');  

if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/ReduxFramework/ReduxCore/framework.php' ) ) {
    require_once( dirname( __FILE__ ) . '/ReduxFramework/ReduxCore/framework.php' );
}
if ( file_exists( dirname( __FILE__ ) . '/ReduxFramework/config.php' ) ) {
    require_once( dirname( __FILE__ ) . '/ReduxFramework/config.php' );
}

	require_once locate_template('/vc_extend/shortcodes.php'); 
function folio_vc_init(){
	require_once locate_template('/vc_extend/shortcodes.php');
	if (class_exists('Vc_Manager')) { 
		require_once locate_template('/vc_extend/vc-xtend.php');  
		require_once locate_template('/vc_extend/vc_map.php'); 
	}
}
	add_action( 'init', 'folio_vc_init' );



function folio_scripts() {

global $fdata;	
    
/* enqueuing google fonts */
	$protocol = is_ssl() ? 'https' : 'http';


		if($fdata['primary_font']['google']==true){
			$primary_font = "$protocol://fonts.googleapis.com/css?family=" .$fdata['primary_font']['font-family'] . 			":100,100italic,200,200italic,400,400italic,500,500italic,600,600italic,700,300,800,300italic,700italic,800italic";
		}
		if($fdata['secondary_font']['google']==true){
			$secondary_font = "$protocol://fonts.googleapis.com/css?family=" . $fdata['secondary_font']['font-family'] . 			":100,100italic200,200italic,400,400italic,500,500italic,600,600italic,700,300,800,300italic,700italic,800italic";
		}
		if($fdata['quote_font']['google']==true){
			$quote_font = "$protocol://fonts.googleapis.com/css?family=" . $fdata['quote_font']['font-family'] . 			":100,100italic200,200italic,400,400italic,500,500italic,600,600italic,700,300,800,300italic,700italic,800italic";
		}
  wp_enqueue_style('primary_font-google-fonts',$primary_font);
  wp_enqueue_style('secondary_font-google-fonts',$secondary_font);
  wp_enqueue_style('quote_font-google-fonts',$quote_font);
  
  
  wp_enqueue_style('bootstrap_css', CSS_PATH . 'bootstrap.css', false, null);
  wp_enqueue_style('font-awesome_css', CSS_PATH . 'font-awesome.css', false, null);
 
 	
	
//Curve_style	
		wp_enqueue_style('style_css', CSS_PATH . 'style.css', false, null);

//straight_style
		wp_enqueue_style('straight_style', CSS_PATH . 'straight_style.css', false, null);


  wp_register_style('style_dark_css', CSS_PATH . 'dark_style.css', false, null);
  wp_register_style('grayscale_style_css', CSS_PATH . 'grayscale_style.css', false, null);
	
  //SELECT STYLE_DARK enqueue it from theme options panel enabling in sripts file
	if($fdata['theme_mode']==="dark_mode"){
		wp_enqueue_style('style_dark_css');
	}elseif( $fdata['theme_mode']==="grayscale_mode" ){
		wp_enqueue_style('grayscale_style_css');
	}
  wp_enqueue_style('style-responsive_css', CSS_PATH . 'style-responsive.css', false, null);
  
  
  
  wp_enqueue_style('prettyPhoto_css', CSS_PATH . 'prettyPhoto.css', false, null);
  wp_register_style('responsiveslides_css', CSS_PATH . 'responsiveslides.css', false, null);
  wp_register_style('flexslider_css', CSS_PATH. 'flexslider.css', false, null);
  wp_register_style('video-js_css', CSS_PATH. 'video-js.css', false, null);
  wp_register_style('animation_css', CSS_PATH. 'animation.css', false, null);
  wp_register_style('isotope_animation_css', CSS_PATH. 'isotope_animation.css', array(), true);
  wp_register_style('jquery_bxslider_css', CSS_PATH. 'jquery.bxslider.css', false, null);
  wp_enqueue_style('project_style_css', CSS_PATH. 'project_style.css', array(), null);
  wp_register_style('responsiveslides_css', CSS_PATH. 'responsiveslides.css', false, null);
  wp_register_style('owl_carousel_css', CSS_PATH. 'owl.carousel.css', false, null);
  wp_register_style('owl_transitions_css', CSS_PATH. 'owl.transitions.css', false, null);
  wp_register_style('slidebars_css', CSS_PATH . 'slidebars.css', false, null);
 // wp_enqueue_style('style_dynamic', get_template_directory_uri() . '/css/style_dynamic.css', false, null);
  

   //enqueuing dynamic style sheet
	if($fdata['color_scheme_type']==="predefined_colors" && $fdata['theme_mode']!== "grayscale_mode"){
		wp_enqueue_style('predefined_color_theme_css', CSS_PATH. 'colors/'.$fdata['predefined_color_theme'], false, null);
	}elseif($fdata['color_scheme_type']==="custom_skin" && $fdata['theme_mode']!== "grayscale_mode"){
		wp_enqueue_style('style-dynamic-color_css', CSS_PATH. 'colors/style_dynamic_colors.php', false, null); 
	}
	//Dynamic Styling Options
	wp_enqueue_style('style-dynamic', CSS_PATH . 'style_dynamic.php', false, null);	
  
  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
	
	wp_register_script('jquery-ui_js', JS_PATH. 'vendor/jquery-ui.js', false, null, true);//jquery-ui
	
	wp_register_script('browser_js', JS_PATH. 'vendor/jquery.browser.min.js', false, null, true);//jquery.browser.min
	wp_register_script('easing_js', JS_PATH. 'jquery.easing.min.js', false, null, true);//jquery.easing.min
	
	wp_register_script('modernizr_js', JS_PATH. 'vendor/modernizr-2.6.2.min.js', false, null, true);//modernizr.custom.53451

	wp_register_script('validate_js', JS_PATH. 'vendor/jquery.validate.min.js', false, null, true);//modernizr.custom.53451

	wp_register_script('animation_js', JS_PATH. 'animation.js', false, null, true);//animation
	
	//<!-- Google Map JS file -->
	wp_register_script('googlemaps_js', 'http://maps.google.com/maps/api/js?sensor=false&amp;language=en.js', false, null, true);
	wp_register_script('gmap3_js', JS_PATH. 'gmap3.js', false, null, true);//gmap3
	
	//<!-- Flickr Feeds JS file -->

	wp_register_script('jflickrfeed_js', JS_PATH. 'jflickrfeed.min.js', false, null, true);//jflickrfeed.min
	
	//<!-- 3D Gallery JS file -->
	wp_register_script('owl_carousel_js', JS_PATH. 'owl.carousel.js', false, null, true);//jquery.3dgallery
	
	//<!-- Bx Slider JS file -->
	wp_register_script('bxslider_js', JS_PATH. 'jquery.bxslider.js', false, null, true);//jquery.bxslider
	
	//<!-- Fit Videos JS file -->
	wp_register_script('fitvids_js', JS_PATH. 'jquery.fitvids.js', false, null, true);//jquery.fitvids
	
	//<!-- Flex Slider JS file -->
	wp_register_script('flexslider_js', JS_PATH. 'jquery.flexslider.js', false, null, true);//jquery.flexslider
	
	//<!-- Isotope Animation JS file -->
	wp_register_script('isotope_js', JS_PATH. 'jquery.isotope.js', false, null, true);
//jquery.isotope
	
	//<!-- Sticky JS file -->
	wp_register_script('sticky_js', JS_PATH. 'jquery.sticky.js', false, null, true);//jquery.sticky
	
	//<!-- Navigation Scroll TO JS file -->
	wp_register_script('scrollTo_js', JS_PATH. 'jquery.scrollTo.js', false, null, true);//jquery.scrollTo
	wp_register_script('nav_js', JS_PATH. 'jquery.nav.js', false, null, true);//jquery.nav
	
	//<!-- Parallax JS Flie -->
	wp_register_script('parallax_js', JS_PATH. 'jquery.parallax-1.1.3.js', false, null, true);//jquery.parallax-1.1.3
	wp_register_script('localscroll_js', JS_PATH. 'jquery.localscroll-1.2.7-min.js', false, null, true);//jquery.localscroll-1.2.7-min
	
	//<!-- Pretty Photo JS file -->
	wp_register_script('prettyPhoto_js', JS_PATH. 'jquery.prettyPhoto.js', false, null, true);//jquery.prettyPhoto
	
	//<!-- main_home JS file -->
	wp_register_script('main_home_js', JS_PATH. 'main_home.js', array( 
				'sticky_js',
				'scrollTo_js',
				'nav_js',
				'video_js',
				
				 ), false, true);//main_home
	
	//<!-- Main Inner JS file -->
	wp_register_script('main_inner_js', JS_PATH. 'main_inner.js', false, null, true);//main_inner
	
	//<!-- Project_Style JS file -->
	wp_register_script('project_script_js', JS_PATH. 'project_script.js', false, null, true);//project_script
	
	//<!-- Responsive Slides JS file -->
	wp_register_script('responsiveslides_js', JS_PATH. 'responsiveslides.min.js', false, null, true);//responsiveslides.min
	
	//<!-- Sound Cloud JS file -->
	wp_register_script('soundcloud-api_js', JS_PATH. 'soundcloud-api.js', false, null, true);//soundcloud-api
	
	//<!-- Videojs JS file -->
	wp_register_script('video_js', JS_PATH. 'video.js', false, null, true);//video
	
	//<!-- Preloader -->
	wp_register_script('queryloader2_js', JS_PATH. 'jquery.queryloader2.js', false, null, true);//jquery.queryloader2
	
	//<!-- Preloader -->
	wp_register_script('slidebars_js', JS_PATH. 'slidebars.js', false, null, true);//jquery.queryloader2
	
	//custom social sharing 
	wp_register_script('custom_social_js', JS_PATH. 'custom-social.js', false, null, true);		
	
	wp_register_script('grayscale_js', JS_PATH. 'grayscale.js', false, null, true);		
	wp_register_script('grayscale_functions_js', JS_PATH. 'grayscale_functions.js', false, null, true);		


/*Register Custom Scripts for wp_localize_scripts()*/
	wp_register_script('custom_testimonial_js', JS_PATH. 'custom/custom_testmonial.js', array('owl_carousel_js'), null, true);
	
	wp_register_script('home_video_js', JS_PATH. 'custom/home_video.js', array('prettyPhoto_js'), null, true);
	wp_register_script('custom_portfolio_js', JS_PATH. 'custom/custom_portfolio.js', array('owl_carousel_js'), null, true);
	wp_register_script('custom_isotop_js', JS_PATH. 'custom/custom_isotop.js', array('isotope_js'), null, true);
	wp_register_script('custom_team_js', JS_PATH. 'custom/custom_team.js', array('flexslider_js'), null, true);

	wp_register_script('custom_gmap_js', JS_PATH. 'custom/custom_gmap.js', array('gmap3_js'), null, true);
	wp_register_script('custom_menu_js', JS_PATH. 'custom/custom_menu.js', array(), null, true);


	/*TODO Style Switcher Ends Only for demo */
    wp_register_style('switcher', get_template_directory_uri() . '/switcher/switcher.css', false, null);
	wp_register_script('styleswitcher.jquery', get_template_directory_uri() . '/switcher/styleswitcher.jquery.js', false, null, true);
	wp_register_script('switcher', get_template_directory_uri() . '/switcher/switcher.js', false, null, true);
	
	/* Style Switcher Ends Only for demo */
	
	//Enqueue Styles here
	wp_enqueue_style('animation_css');
	
	//Enqueue Script here
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-ui_js');
	wp_enqueue_script('easing_js');
	wp_enqueue_script('browser_js');
	//wp_enqueue_script('jquery-ui-core ');
	wp_enqueue_script('animation_js');
	wp_enqueue_script('modernizr_js');
	wp_enqueue_script('sticky_js');
	wp_enqueue_script('grayscale_js');
	wp_enqueue_script('grayscale_functions_js');

	
	if(is_page_template('temp-onepage.php')){
		wp_enqueue_script('scrollTo_js');
		wp_enqueue_script('nav_js');
	}
	if($fdata['display_preloader']==true){
		wp_enqueue_script('queryloader2_js');
	}
	if( is_single() && $fdata['social_sharing_bar']==true){
		wp_enqueue_script('custom_social_js');
	}
	wp_enqueue_script('main_home_js');
	//wp_enqueue_script('main_inner_js');
	
}
if(!is_admin()) {
	add_action('wp_enqueue_scripts', 'folio_scripts', 100);
}


/* Featured Image COde*/

if ( function_exists( 'add_theme_support' ) ) { 
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 150, 150 , true); // default Post Thumbnail dimensions (cropped)
	add_theme_support( 'custom-background' );
}

if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'blog-post-image', 870, 490, true); //// blog post thumbnail featured image
	/*add_image_size( 'blog-side-image', 80, 80, true); //300 pixels wide (and unlimited height)*/
}



/*And this would make two menu options appear, header menu and extra menu -*/
function register_my_menus() {
  register_nav_menus(
    array(
	  // Register wp_nav_menu() menus
	  //(http://codex.wordpress.org/Function_Reference/register_nav_menus)
	  'header-primary-menu' => __( 'Header Primary Menu', 'kraftives' ),
    )
  );

}

add_action( 'init', 'register_my_menus' );

// theme protected password on excerpt
function folio_excerpt_password_form( $excerpt ) {
    if ( post_password_required() )
        $excerpt = get_the_password_form();
    return $excerpt;
}
add_filter( 'the_excerpt', 'folio_excerpt_password_form' );

//WP Titlt Filter
function folio_wp_title( $title, $sep ) {

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";
	
	return $title;
}
add_filter( 'wp_title', 'folio_wp_title', 10, 2 );


/* set custom length of excerpt */

	function folio_excerpt_length( $length ) {
		global $fdata;
		if( $fdata['excerpt_length'] != '' ){
		return $fdata['excerpt_length'];
		}else{
			return 37;
		}
	}
	add_filter( 'excerpt_length', 'folio_excerpt_length', 999 );

