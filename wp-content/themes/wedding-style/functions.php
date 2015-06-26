<?php

/////////////////////// include admin
if ( ! isset( $content_width ) ) {
	$content_width = 320;
}
require_once('admin/main_admin_controler.php');
require_once('front_end/front_end_functions.php');

function wedding_style_setup() {
add_theme_support( 'custom-header', array(
	// Header image default
	'default-image'       => '',
	// Header text display default
	'header-text'         => false,
	'wp-head-callback'    => 'wedding_style_header_style',
	
) );

$wedding_style_defaults = array(
	'default-color'          => 'ffffff',
	'default-image'          => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
);

 register_nav_menu('primary-menu', __('Primary Menu','WeddingStyle'));

add_theme_support( 'custom-background', $wedding_style_defaults );
//
     if(!get_theme_mod('background_color',false)){
		set_theme_mod('background_color','ffffff')	;
	}

	//Enable post and comments RSS feed links to head

	add_theme_support('automatic-feed-links');

	// Enable post thumbnails


    add_theme_support('post-thumbnails', array('post'));

    set_post_thumbnail_size(140, 130, true);
	
	add_image_size( 'exclusive-width', 240, 182, true );
	
	
	 load_theme_textdomain('WeddingStyle', get_template_directory() . '/languages' );
	 
	 add_editor_style();
	 
	 global $wedding_style_layout_page;
	 foreach ($wedding_style_layout_page->options_themeoptions as $value) {
			if (isset($value['id']))
				$$value['var_name'] = $value['std'];
	} 
	 
}

add_action( 'after_setup_theme', 'wedding_style_setup' );

function wedding_style_header_style(){
	$header_image = get_header_image(); ?>
	<style type="text/css">
	<?php if ( ! empty( $header_image ) ) { ?>
	.site-title {
			background: url(<?php echo $header_image; ?>) no-repeat scroll top;
		}
	<?php } ?>
	</style>
	
	<?php
}

add_action('wp_head', 'wedding_style_header');


function wedding_style_header(){
	global  $wedding_style_layout_page,		// leayut class variable
		$wedding_style_typography_page,	// typagraphi class variable
		$wedding_style_integration_page,	// integration class variable
		$wedding_style_color_control_page;// color control class variable
	foreach ($wedding_style_color_control_page->options_colorcontrol as $value) {
		if(isset($value['var_name']))
     		$$value['var_name'] = $value['std']; 
	}	
	
	$wedding_style_integration_page->update_head_integration(); 

	if ( is_singular() && get_theme_mod( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	$wedding_style_layout_page->update_layout_editor();
	$wedding_style_typography_page->print_fornt_end_style_typography();
	$wedding_style_color_control_page->update_color_control();

	wedding_style_favicon_img();
	wedding_style_custom_head();
	
	////////
	$menu_slug = 'primary-menu';
	 if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_slug ] ) && $locations[ $menu_slug ]!=0) {
	$menu = wp_get_nav_menu_object( $locations[ $menu_slug ] );
	if($menu){
	$menu_items = wp_get_nav_menu_items($menu->term_id);
	?>
	<script type="text/javascript">
	jQuery(document).ready(function(e) {
    <?php
	foreach ( (array) $menu_items as $key => $menu_item ) {
	    $id = $menu_item->ID; ?>
		
       if(jQuery(".phone .top-nav-list .menu-item-<?php echo $id; ?>.has-sub").hasClass("current-menu-item")){
	        jQuery(".phone .top-nav-list .menu-item-<?php echo $id; ?>.has-sub > ul").css("display", "block");
			jQuery(".phone .top-nav-list .menu-item-<?php echo $id; ?>.has-sub > a").css("background", "<?php echo $menu_color; ?>  url(<?php echo get_template_directory_uri('template_url'); ?>/images/arrow.menu.png) 100% 0% no-repeat !important");
		  }
		  if(jQuery(".phone .top-nav-list .menu-item-<?php echo $id; ?>.has-sub").hasClass("current-menu-parent")){
	        jQuery(".phone .top-nav-list .menu-item-<?php echo $id; ?>.has-sub > ul").css("display", "block");
			jQuery(".phone .top-nav-list .menu-item-<?php echo $id; ?>.has-sub > a").css("background", "url(<?php echo get_template_directory_uri('template_url'); ?>/images/arrow.menu.png) 100% 0% no-repeat");
		  }
		  if(jQuery(".phone .top-nav-list .menu-item-<?php echo $id; ?>.has-sub").hasClass("current-page-parent")){
	        jQuery(".phone .top-nav-list .menu-item-<?php echo $id; ?>.has-sub > ul").css("display", "block");
			jQuery(".phone .top-nav-list .menu-item-<?php echo $id; ?>.has-sub > a").css("background", "url(<?php echo get_template_directory_uri('template_url'); ?>/images/arrow.menu.png) 100% 0% no-repeat");
		  }
		  if(jQuery(".phone .top-nav-list .menu-item-<?php echo $id; ?>.has-sub").hasClass("current-menu-ancestor")){
	        jQuery(".phone .top-nav-list .menu-item-<?php echo $id; ?>.has-sub > ul").css("display", "block");
			jQuery(".phone .top-nav-list .menu-item-<?php echo $id; ?>.has-sub > a").css("background", "url(<?php echo get_template_directory_uri('template_url'); ?>/images/arrow.menu.png)  100% 0% no-repeat");
		  }
		 

	<?php } ?>
	},1500);
	</script>
	
<?php
	}
}	
		
}



function wedding_style_entry_meta() {
    echo '<div class="entry-meta">';
    printf( __( '<div class="entry-meta-cat"><span class="sep date"></span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a><span class="by-author"> <span class="sep author"></span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span></div>', 'WeddingStyle' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'WeddingStyle' ), get_the_author() ) ),
		get_the_author()
	);
    
    $categories_list = get_the_category_list(', ' );
    echo '<div class="entry-meta-cat">';
	if ( $categories_list && !is_category() ) {
		echo '<span class="categories-links"><span class="sep category"></span> ' . $categories_list . '</span>';
	}
	$tag_list = get_the_tag_list( '', ' , ' );
	
	if ( $tag_list && !is_tag() ) {
		echo '<span class="tags-links"><span class="sep tag"> </span>' . $tag_list . '</span>';
	}
	echo '</div></div>';
}


function wedding_style_posted_on_blog() { 
     ?><div class="post-date"> <?php echo get_the_date(); ?> </div><?php
}


function wedding_style_post_nav() {
	global $post;
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next    = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
		<nav class="page-navigation">
			<div class="alignleft"><?php previous_post_link( '%link', '<span class="meta-nav">&larr;</span> %title', 'Previous post link' ); ?></div>
			<div class="alignright"><?php next_post_link( '%link', '%title <span class="meta-nav">&rarr;</span>', 'Next post link'  ); ?></div>
		</nav>
	<?php
}


function wedding_style_widgets_init()
{

    // Area 1, located at the top of the sidebar.

    register_sidebar(array(

            'name' => __('Primary Widget Area', 'WeddingStyle'),

            'id' => 'primary_widget_area',

            'description' => __('The primary widget area', 'WeddingStyle'),

            'before_widget' => '<div id="%1$s" class="widget-area %2$s">',

            'after_widget' => '</div> ',

            'before_title' => '<h3>',

            'after_title' => '</h3>',

        )
    );

    // Area 2, located below the Primary Widget Area in the sidebar. Empty by default.

    register_sidebar(array(

            'name' => __('Secondary Widget Area', 'WeddingStyle'),

            'id' => 'sidebar-2',

            'description' => __('The secondary widget area', 'WeddingStyle'),

            'before_widget' => '<div id="%1$s" class="widget-area %2$s">',

            'after_widget' => '</div>',

            'before_title' => '<h3 class="widget-title">',

            'after_title' => '</h3>',
        )
    );
	
	// Area 3, located below the Primary Widget Area in the sidebar. Empty by default.
	
	 register_sidebar(array(
            'name' => __('Primary Footer Widget Area', 'WeddingStyle'),
			
            'id' => 'sidebar-1',
			
            'description' => __('The footer left widget area', 'WeddingStyle'),
			
            'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
			
            'after_widget' => '</div> ',
			
            'before_title' => '<h3>',
			
            'after_title' => '</h3>',
        )
    );
	
	 register_sidebar(array(
            'name' => __('Second Footer Widget Area', 'WeddingStyle'),
			
            'id' => 'second-footer-widget-area',
			
            'description' => __('The footer right widget area', 'WeddingStyle'),
			
            'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
			
            'after_widget' => '</div> ',
			
            'before_title' => '<h3>',
			
            'after_title' => '</h3>',
        )
    );
  
}


add_filter( 'wp_nav_menu_objects', 'wedding_style_add_menu_parent_class' );

function wedding_style_add_menu_parent_class( $items ) {
		
			$parents = array();
			foreach ( $items as $item ) {
				if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
					$parents[] = $item->menu_item_parent;
				}
			}
			foreach ( $items as $item ) {
				if ( in_array( $item->ID, $parents ) ) {
					$item->classes[] = 'haschild';
				}
			}
			return $items;
		}

//Register sidebars by running wedding_style_widgets_init() on the widgets_init hook.

add_action('widgets_init', 'wedding_style_widgets_init');

//Add support for WordPress 3.0's custom menus


function wedding_style_post_classes( $classes ) {
		$classes[] = 'single-post';
	
	return $classes;
}
add_filter( 'post_class', 'wedding_style_post_classes' );

add_filter('nav_menu_css_class' , 'wedding_style_special_nav_class' , 10 , 2);

function wedding_style_special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}

function wedding_style_add_first_and_last($output) {
  $output = preg_replace('/class="menu-item/', 'class="menu-item', $output, 1);  
  $output = substr_replace($output, 'class="last menu-item', strripos($output, 'class="menu-item'), strlen('class="menu-item'));
  return $output;
}

add_filter('wp_nav_menu', 'wedding_style_add_first_and_last');


function wedding_style_add_first_and_last_page_list($output) {
  $output = preg_replace('/class="page_item/', 'class="first page_item', $output, 1);  
  if(strripos($output, 'class="page_item'))
  $output = substr_replace($output, 'class="last page_item', strripos($output, 'class="page_item'), strlen('class="page_item'));
  return $output;
}

add_filter('wp_list_pages', 'wedding_style_add_first_and_last_page_list');

if( !function_exists('wedding_style_the_excerpt_max_charlength')){
	function wedding_style_the_excerpt_max_charlength($charlength,$content=false) {
	if($content)
	{
		$excerpt=$content;
	}
	else
	{
		$excerpt = get_the_excerpt();
	}
		$charlength++;
	
		if ( mb_strlen( $excerpt ) > $charlength ) {
			$subex = mb_substr( $excerpt, 0, $charlength - 5 );
			$exwords = explode( ' ', $subex );
			$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
			if ( $excut < 0 ) {
				echo mb_substr( $subex, 0, $excut ).'...';
			} else {
				echo $subex.'...';
			}
			
		} else {
			echo $excerpt;
		}
	}
}

function wedding_style_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'wedding_style_excerpt_more' );

function wedding_style_post_thumbnail($width, $height)
{

    $thumb = get_post_custom_values("Image");

    if (!empty($thumb)) {

        $str = '<img src="' . $thumb[0] . '" width="' . $width . '" height="' . $height . '" alt="' . get_the_title() . '" width="' . $width . '" height="' . $height . '" border="0" />';
        return $str;

    }

    return !empty($thumb);
}

function wedding_style_catch_that_image()
{

    global $post, $posts;

    $first_img = '';
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/', $post->post_content, $matches);
	if(isset($matches [1] [0])){	
    	$first_img = $matches [1] [0];
	}
    if (empty($first_img)) {
        //Defines a default image
        $first_img = get_template_directory_uri('template_url') . "/images/default.jpg";
    }
    return $first_img;
}
function wedding_style_first_image($width, $height,$url_or_img=0)
{
    $thumb = wedding_style_catch_that_image();
    if ($thumb) {

        $str = "<img src=\"";
        $str .= $thumb;

        $str .= '"';
        $str .= 'alt="'.get_the_title().'" width="'.$width.'" height="'.$height.'" border="0" />';
        return $str;
    }
}

function wedding_style_empty_thumb()
{
    $thumb = get_post_custom_values("Image");
    return !empty($thumb);
}

function wedding_style_display_thumbnail($width, $height)
{
    if (has_post_thumbnail()) the_post_thumbnail(array($width, $height));

    elseif (!wedding_style_empty_thumb()) {
        return wedding_style_first_image($width, $height);
    } else {
        return wedding_style_post_thumbnail($width, $height);
    }
}

function wedding_style_thumbnail($width, $height)
{

    if (has_post_thumbnail())

        the_post_thumbnail(array($width, $height));

    elseif (wedding_style_empty_thumb()) {

        return wedding_style_post_thumbnail($width, $height);

    }
}



function wedding_style_remove_more_jump_link($link)
{

    $offset = strpos($link, '#more-');
    if ($offset) {
        $end = strpos($link, '"', $offset);
    }
    if ($end) {
        $link = substr_replace($link, '', $offset, $end - $offset);
    }
    return $link;

}

add_filter('the_content_more_link', 'wedding_style_remove_more_jump_link');

function wedding_style_p2h_comment($comment, $args, $depth) {
	
	$GLOBALS['comment'] = $comment;
	
	switch ($comment->comment_type){
		case '' :
		?>
		<div <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<div class="comment-avatar"><?php echo get_avatar($comment, $size = '54'); ?></div>
		<div class="comment-body">
			<p class="comment-meta"><span
					class="comment-author"><?php comment_author_link(); ?></span><?php _e(' on ', 'WeddingStyle'); ?><?php comment_date() ?><?php _e(' at ', 'WeddingStyle'); ?><?php comment_time() ?>
				.</p>
			<?php if ($comment->comment_approved == '0') { ?>
				<p><strong><?php _e('Your comment is awaiting moderation.', 'WeddingStyle'); ?></strong></p>
			<?php } ?>
		
			<?php comment_text(); ?>
		
			<p class="comment-reply-meta"><?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?></p>
		</div>
		<?php
		break;
		
		case 'pingback'  :
		case 'trackback' :
		?>
		<div <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>" class="post pingback">
		<p><?php _e('Pingback:', 'WeddingStyle'); ?> <?php comment_author_link(); ?><?php edit_comment_link(__('Edit', 'WeddingStyle'), ' '); ?></p>
		<?php
		break;
		
	}
}





// This filter will jump into the loop and arrange our results before they're returned


function wedding_style_update_page_layout_meta_settings()
{
	
	global $wedding_style_layout_page, $post;
	foreach ($wedding_style_layout_page->options_themeoptions as $value) {
		if(isset($value['id'])){	
			$$value['var_name'] = $value['std'];
		}
	}
    /*update page layout*/
	if(isset($post))
    	$web_business_meta = get_post_meta($post->ID, 'web_dorado_meta_date', TRUE);

		
		if(!isset($web_business_meta['content_width']))
			$web_business_meta['content_width'] = $content_area;
		if(!isset($web_business_meta['main_col_width']))
			$web_business_meta['main_col_width'] = $main_column;
		if(!isset($web_business_meta['layout']))
			$web_business_meta['layout'] = $default_layout;
		if(!isset($web_business_meta['pr_widget_area_width']))
			$web_business_meta['pr_widget_area_width'] = $pwa_width;

	if (isset($web_business_meta['fullwidthpage']) && $web_business_meta['fullwidthpage']=='on') {		
		$them_content_are_width='99%';
		?><script>var full_width_web_buisnes=1</script>
		  <style  type="text/css">
				     #footer-bottom{
						padding: 15px !important;
					}
		  </style><?php		
	}
	else {
			
		if(isset($web_business_meta['content_width']))
			$them_content_are_width=$web_business_meta['content_width'] . "px;";
		else
			$them_content_are_width=$content_area;
			
		?><script> var full_width_web_buisnes=0</script><?php
	}
  
    switch ($web_business_meta['layout']) {
        //set styles leauts
        case 1:		
			?>
            <style type="text/css">
			#sidebar1,
			#sidebar2 {
				display:none;
			}
			#blog	{
				display:block; 
				float:left;
			};
       
            .container{
            width:<?php echo $them_content_are_width; ?>
            }        
            #blog{
            width:100%;
            }               
            </style>
			<?php
            break;
        case 2:
			?>
            <style type="text/css">
			#sidebar2{
				display:none;
			} 
			#sidebar1 {
				display:block;
				float:right;
			}
			#blog{
				display:block;
				float:left;
			} 
            .container{
				width:<?php echo $them_content_are_width; ?>
            }
            #blog{
				width:<?php echo $web_business_meta['main_col_width']-1; ?>%;
            }
            #sidebar1{
				width:<?php echo (100  - $web_business_meta['main_col_width']-1); ?>%;
            }
            </style>
			<?php
            break;
        case 3:
			?>
            <style type="text/css">
			#sidebar2{
				display:none;
			} 
			#sidebar1 {
				display:block;
				float:left;
			} 
			#blog{
				display:block;
				float:left;
			}
            .container{
				width:<?php echo $them_content_are_width; ?>
            }
            #blog{
				width:<?php echo $web_business_meta['main_col_width']; ?>%;
            }
            #sidebar1{
				width:<?php echo (100  - $web_business_meta['main_col_width']-1); ?>%;
				margin-right: 1%;
            }
            </style>
			<?php
            break;
        case 4:
		?>
            <style type="text/css">
			#sidebar2{
				display:block;
				float:right;
			} 
			#sidebar1 {
				display:block; float:right;
			} 
			#blog{
				display:block;
				float:left;
			}
            .container{
				width:<?php echo $them_content_are_width; ?>
            }
            #blog{
				width:<?php echo ($web_business_meta['main_col_width']-2) ; ?>%;
            }
            #sidebar1{
				width:<?php echo $web_business_meta['pr_widget_area_width']; ?>%;
            }
            #sidebar2{
				width:<?php echo (100  - $web_business_meta['pr_widget_area_width'] - $web_business_meta['main_col_width']); ?>%;
				margin-right: 1%;
            }
            </style>
			 <?php
            break;
        case 5:
		?>
            <style type="text/css">
			#sidebar2{
				display:block;
				float:left;
			} 
			#sidebar1 {
				display:block;
				float:left;
			} 
			#blog{
				display:block;
				float:right;
			}
            .container{
				width:<?php echo $them_content_are_width; ?>
            }
            #blog{
				width:<?php echo ($web_business_meta['main_col_width']-2); ?>%;
            }
            #sidebar1{
				width:<?php echo $web_business_meta['pr_widget_area_width']; ?>%;
				margin-right: 1%;
            }
            #sidebar2{
				width:<?php echo (100  - $web_business_meta['pr_widget_area_width'] - $web_business_meta['main_col_width']); ?>%;
				margin-right: 1%;
            }
            </style>
			<?php
            break;
        case 6:
		?>
            <style type="text/css">
			#sidebar2{
				display:block;
				float:right;
			} 
			#sidebar1 {
				display:block;
				float:left; 
			} 
			#blog{
				display:block;
				float:left;
			}    			       
            .container{
				width:<?php echo $them_content_are_width; ?>
            }
            #blog{
				width:<?php echo ($web_business_meta['main_col_width']-2); ?>%;
            }
            #sidebar1{
				width:<?php echo $web_business_meta['pr_widget_area_width']; ?>%;
				margin-right: 1%;
            }
            #sidebar2{
				width:<?php echo (100  - $web_business_meta['pr_widget_area_width'] - $web_business_meta['main_col_width']); ?>%;
            }            
            </style><?php
            break;
    }
    /*update page layout end*/
}

/*customize*/


function wedding_style_wp_title( $title, $sep ) {
	global $page;

	if ( is_feed() )
		return $title;

	$title .= get_bloginfo( 'name' );

	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	return $title;
}
add_filter( 'wp_title', 'wedding_style_wp_title', 10, 2 );





/// include requerid scripts and styles


add_filter('wp_head','wedding_style_include_requerid_scripts_for_theme',1);

function wedding_style_include_requerid_scripts_for_theme(){
	wp_enqueue_script('jquery');	
	wp_enqueue_script('jquery-effects-transfer');	
	wp_enqueue_script('conect_js',get_template_directory_uri().'/scripts/conect_js.js');
	wp_enqueue_style('nivo_slider',get_template_directory_uri().'/slideshow/style.css');
	wp_enqueue_script('custom_js',get_template_directory_uri().'/scripts/javascript.js');
	wp_enqueue_script('response', get_template_directory_uri().'/scripts/responsive.js');
	wp_enqueue_style( 'webdr-style', get_stylesheet_uri(), array(), '2013-11-18' );
	wp_enqueue_style('thickbox'); 
	wp_print_scripts('thickbox');
	wp_enqueue_script('hover_effect',get_template_directory_uri().'/scripts/jquery-hover-effect.js');
	wp_enqueue_scripts('comment');
	wp_enqueue_script( 'comment-reply' );
	
}



add_action( 'pre_get_posts', 'wedding_style_main_queries' );

function wedding_style_main_queries($query){
	if(is_home() && is_front_page() && $query->is_main_query()){
		
		global $wedding_style_home_page;
		foreach ($wedding_style_home_page->options_homepage as $value) 
		{
			if(isset($value['id']))	{
				$$value['var_name'] = $value['std']; 				
			}
		}
        $cat_query="";
		$cat_checked="";
        $n_of_home_post=get_option( 'posts_per_page', 6 );       
		$cat_query=substr($content_post_categories, 0, -1);
		$query->set( 'posts_per_page', $n_of_home_post );
		$query->set( 'paged',get_query_var('paged') );
		$query->set( 'cat', $cat_query );
		$query->set( 'order', 'DESC' );
	}
}


function wedding_style_ligthest_brigths($color,$pracent){

	$new_color=$color;
	if(!(strlen($new_color==6) || strlen($new_color)==7))
	{
		return $color;
	}
	$color_vandakanishov=strpos($new_color,'#');
	if($color_vandakanishov == false) {
		$new_color= str_replace('#','',$new_color);
	}
	$color_part_1=substr($new_color, 0, 2);
	$color_part_2=substr($new_color, 2, 2);
	$color_part_3=substr($new_color, 4, 2);
	$color_part_1=dechex( (int) (hexdec( $color_part_1 ) + (( 255-( hexdec( $color_part_1 ) ) ) * $pracent / 100 )));
	$color_part_2=dechex( (int) (hexdec( $color_part_2)  + (( 255-( hexdec( $color_part_2 ) ) ) * $pracent / 100 )));
	$color_part_3=dechex( (int) (hexdec( $color_part_3 ) + (( 255-( hexdec( $color_part_3 ) ) ) * $pracent / 100 )));
	$new_color=$color_part_1.$color_part_2.$color_part_3;
	if($color_vandakanishov == false){
		return $new_color;
	}
	else{
		return '#'.$new_color;
	}

}
function wedding_style_remove_last_comma($string=''){
	
	if(substr($string,-1)==',')
		return substr($string, 0, -1);
	else
		return $string;
	
}

add_filter('body_class', 'wedding_style_multisite_body_classes');
function wedding_style_multisite_body_classes($classes){
	foreach($classes as $key=>$class)
	{
		if($class=='blog')
		$classes[$key]='blog_body';
	}
	return $classes;
}

function wedding_style_custom_head(){
	
global $wedding_style_general_settings_page;
foreach ( $wedding_style_general_settings_page->options_generalsettings as $value ) {
	if(isset($value['var_name'])){
		   $$value['var_name'] = $value['std']; 
	}
}?>

<script>
	var skzbi_hasce="<?php echo get_template_directory_uri(); ?>";
	$ = jQuery;
</script>
<?php

	echo "<style>".stripslashes($custom_css)."</style>";
	
	
}

function wedding_style_getCoordinates($address){

			$address = str_replace(" ", "+", $address); // replace all the white space with "+" sign to match with google search pattern
			$url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=$address";
			$response = wp_remote_fopen($url);
			$json = json_decode($response,TRUE); //generate array object from the response from the web 
			return ($json['results'][0]['geometry']['location']['lat'].",".$json['results'][0]['geometry']['location']['lng']); 
			
}
function wedding_style_do_nothing($parametr=NULL){
	return $parametr;
}
?>
