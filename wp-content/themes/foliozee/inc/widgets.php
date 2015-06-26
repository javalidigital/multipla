<?php

$widget_path = locate_template('/inc/widgets/');

$widgets = array(
    'inc/widgets/widget-tweets.php',
    'inc/widgets/widget-flickr.php',
    'inc/widgets/widget-text.php',
    'inc/widgets/widget-search.php',
    'inc/widgets/widget-facebook.php',
    'inc/widgets/widget-portfolio.php',
	'inc/widgets/widget-quotes.php',
	'inc/widgets/widget-vimeo.php',
	'inc/widgets/widget-youtube.php',
	'inc/widgets/widget-custom-video.php',
	'inc/widgets/widget-recentposts.php',
	
	//'inc/widgets/widget-instagram.php',
);


// Allow child themes/plugins to add widgets to be loaded.
$widgets = apply_filters( 'kraftive_widgets', $widgets );

foreach ( $widgets as $w ) {
    locate_template( $w, true );
}

//CUSTOM WIDGETS
add_action("widgets_init", "load_widgets");
function load_widgets()
{
    register_widget('kraftive_latest_tweets');//
    register_widget('kraftive_flickr_widget');//
    register_widget('kraftive_text_subtitle');//
    register_widget('kraftive_search_widget');//
    register_widget('kraftive_facebook_widget');//
    register_widget('kraftive_portfolio_widget');//
	register_widget('kraftive_quotes_widget');//
	register_widget('kraftive_vimeo_widget');//
	register_widget('kraftive_youtube_widget');//
	register_widget('kraftive_custom_video_widget');//
	register_widget('kraftive_recentposts_widget');//
	

	//register_widget('kraftive_instagram_widget');//
}

function add_user_sidebar( $id, $meta ){
    $sidebar = get_post_meta($id, $meta, $single = true);
    if ( ( $sidebar ) &&  function_exists('dynamic_sidebar') )
        return  dynamic_sidebar( $sidebar );
}

