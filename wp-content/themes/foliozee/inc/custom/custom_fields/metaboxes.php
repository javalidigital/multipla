<?php



//include the main class file

require_once("meta-box-class/extend-class.php");
if (is_admin()){
	$team_meta = '';
  $prefix = 'folio_';


/*--------------------------------------------------------------------------------
|				KraftiveComments:  Display Map on all post types / Metaboxes			|						
--------------------------------------------------------------------------------*/

  $config = array(
    'id'             => 'folio_display_google_map',
    'title'          =>  __('Map Settings', 'kraftives'),
    'pages'          => array('post', 'page', 'portfolio'),
    'context'        => 'side',
    'priority'       => 'high',
    'fields'         => array(),
    'local_images'   => false,
    'use_with_theme' => true
  );
	$map_settings = new Metabox_Extended($config);

	$map_settings->addSwitch('map_in_footer',
		array(
			'name'=> __('Display Map', 'kraftives'), 
			'desc' =>  __('Display the map in footer of this page.<br />
					<small><strong>Note:</strong> To display map, make sure that you have enabled map from Theme Options in Footer settings.</small>', 'kraftives'),
	 		'std' => 'false'
	 	)
	);

	$map_settings->addSwitch('map_style',
		array(
			'name'=> __('Curve Map', 'kraftives'), 
			'desc' =>  __('To display Curve over map enable this option.', 'kraftives'),
	 		'std' => 'false'
	 	)
	);
	
$map_settings->Finish();
/*--------------------------------------------------------------------------------
|				KraftiveComments:  Post Post Type / Metaboxes			|						
--------------------------------------------------------------------------------*/

/* Post audio Section, toggles when audio format selected */
  $config = array(
    'id'             => 'post_audio_custom_fields',
    'title'          =>  __('Post Audio', 'kraftives'),
    'pages'          => array('post'),
    'context'        => 'normal',
    'priority'       => 'high',
    'fields'         => array(),
    'local_images'   => false,
    'use_with_theme' => true
  );
	$post_audio = new Metabox_Extended($config);

		$post_audio->addText('sound_cloud_url',
			array(
				'name'=> __('Sound cloud URL', 'kraftives'), 
				'desc' => __('Insert sound cloud song url e.g. https://soundcloud.com/ccw/jennifer-lopez-ft-pitbull-on', 'kraftives'),
			)
		); 

	$post_audio->Finish();

/* Post quote Section, toggles when quote format selected */
  $config = array(
    'id'             => 'post_quote_custom_fields',
    'title'          =>  __('Post Quote', 'kraftives'),
    'pages'          => array('post'),
    'context'        => 'normal',
    'priority'       => 'high',
    'fields'         => array(),
    'local_images'   => false,
    'use_with_theme' => true
  );
	$post_quote = new Metabox_Extended($config);

		$post_quote->addTextarea('quote_text',
			array(
				'name'=> __('Quote Text', 'kraftives'), 
				'desc' => __('Insert your quote text', 'kraftives'),
			)
		); 
		
		$post_quote->addText('quote_author',
			array(
				'name'=> __('Quote Author', 'kraftives'), 
				'desc' => __('Insert the quote author name', 'kraftives'),
			)
		);
	$post_quote->Finish();

/*--------------------------------------------------------------------------------
|				KraftiveComments:  Heading options for Page  Type / Metaboxes			|						
--------------------------------------------------------------------------------*/
	$config = array(
		'id' => 'page_header_custom_fields',	
		'title' => __('Page Header headings', 'kraftives'),	
		'pages' => array('page'),
		'context' => 'normal',	
		'priority' => 'high',	
		'fields' => array(),	
		'local_images' => false,	
		'use_with_theme' => true
	);
 	$page_heading =  new Metabox_Extended($config);
 
	$page_heading->addSwitch('hide_title',
		array(
			'name'=> __('Hide Title', 'kraftives'), 
			'desc' => __('Turn it ON  if you want to hide page main title. <br /><strong>Note:</strong> This feature only works with default template.', 'kraftives'),
	 		'std' => 'false'
	 	)
	);	
	
	/* Heading 2 */
	$page_heading->addTextarea('heading_2',
		array(
			'name'=> __('Heading 2', 'kraftives'), 
			'desc' => __('This will be the 2nd heading', 'kraftives'),
		)
	);
  	/* Heading 3 */
	$page_heading->addTextarea('heading_3',
		array(
			'name'=> __('Heading 3', 'kraftives'), 
			'desc' => __('This will be the 3rd heading', 'kraftives'),
		)
	);
	
	$page_heading->Finish();
/*--------------------------------------------------------------------------------
|				KraftiveComments:  General Metaboxes							|						
--------------------------------------------------------------------------------*/
/* used in all posts type */

/* post / Portfolio video Section, toggles when video format selected */
  $config = array(
    'id'             => 'portfolio_video_custom_fields',
    'title'          =>  __('Portfolio Video', 'kraftives'),
    'pages'          => array('post', 'portfolio'),
    'context'        => 'normal',
    'priority'       => 'high',
    'fields'         => array(),
    'local_images'   => false,
    'use_with_theme' => true
  );
	$portfolio_video = new Metabox_Extended($config);
	
	$portfolio_video->addSelect('select_videos',
		array( 
			'vimeo_hosted' => __('Vimeo Video', 'kraftives'),
			'youtube_hosted' => __('Youtube Video', 'kraftives'),
			'self_hosted' => __('Self Hosted Video', 'kraftives'),
			 
		),
		array(
			'name'=> __('Select Video type', 'kraftives'), 
			'desc'	=> __('Select video type from vimeo or youtube or self-hosted.', 'kraftives'),
			'std'=> array('vimeo_hosted')
			)
	);
	$portfolio_video->addText('youtube_video_id',
		array(
			'name'=> __('YouTube video ID', 'kraftives'), 
			'desc' => __('Insert the youtube video ID', 'kraftives'),
		)
	); 
	$portfolio_video->addText('vimeo_video_id',
		array(
			'name'=> __('Vimeo video ID', 'kraftives'), 
			'desc' => __('Insert the vimeo video ID', 'kraftives'),
		)
	); 	

	$portfolio_video->addFile('self_hosted_mp4',
		array(
			'name'=> __('Upload .mp4 video', 'kraftives'), 
			'desc' => __('Upload self hosted video in .mp4 format', 'kraftives'),
		)
	);
	$portfolio_video->addFile('self_hosted_webm',
		array(
			'name'=> __('Upload .webM video', 'kraftives'), 
			'desc' => __('Upload self hosted video in .webm format', 'kraftives'),
		)
	);
	$portfolio_video->addImage('self_hosted_poster',
		array(
			'name'=> __('Upload Video Poster', 'kraftives'), 
			'desc' => __('Video Poster is only available for Self hosted video', 'kraftives'),
		)
	);
	
	$portfolio_video->Finish();

/* Featured Image Section , this will toggle when image format selected*/
  $config = array(
    'id'             => 'portfolio_image_custom_fields',
    'title'          =>  __('Portfolio Image', 'kraftives'),
    'pages'          => array('portfolio'),
    'context'        => 'normal',
    'priority'       => 'high',
    'fields'         => array(),
    'local_images'   => false,
    'use_with_theme' => true
  );
	$featured_image = new Metabox_Extended($config);
	
	$featured_image->addImage('portfolio_image_format',
		array(
			'name'=> __('Upload Image', 'kraftives'),
			'desc'	=> __('Upload image for image format portoflio', 'kraftives'),
		)
	);  

	$featured_image->Finish();


/* Menu Section */
  $config = array(
    'id'             => 'portfolio_menu_custom_fields',
    'title'          =>  __('Navigation Settings', 'kraftives'),
    'pages'          => array('portfolio', 'post', 'page'),
    'context'        => 'normal',
    'priority'       => 'high',
    'fields'         => array(),
    'local_images'   => false,
    'use_with_theme' => true
  );
  

	/* Getting Menus */
	$all_menus = wp_get_nav_menus();
	$menu_list=array( 'folio_primarymenu' => 'Primary Menu' );
	foreach ( $all_menus as $folioMenu) {
		$menu_list[ $folioMenu->slug ] = $folioMenu->name;
	} 
	
  	$menu_settings = new Metabox_Extended($config);
	
	$menu_settings->addSelect('select_menu_option',
		$menu_list,
		array(
			'name'=> __('Select Menu', 'kraftives'), 
			'desc'	=> __('If left unchanged then default primary menu will be selected', 'kraftives'),
			'std'=> array('folio_primarymenu')
			)
	);
	
	$menu_settings->addSwitch('sticky_menu',
		array(
			'name'=> __('Sticky menu', 'kraftives'), 
			'desc' => __('This will stick menu on top of the page when page scrolls', 'kraftives'), 
	 		'std' => 'true'
	 	)
	);

	$menu_settings->addSwitch('always_show',
		array(
			'name'=> __('Always Show', 'kraftives'), 
			'desc' => __('Always Show navigation menu. If sticky menu is enable then disable this feature to show menu on sticking at the top.', 'kraftives'), 
	 		'std' => 'false'
	 	)
	);
if (folio_get_current_post_type()==='page'){

		$menu_settings->addSwitch('menu_position',
			array(
				'name'=> __('Navigation after header module', 'kraftives'), 
				'desc' => __('Enable this to display this module after slider/header module.<br>
				<strong>Note:</strong>Only Enable it if you have header module present in the top.', 'kraftives'),
				'std' => 'false'
			)
		);
		$menu_settings->addSwitch('slidebar_show',
			array(
				'name'=> __('Show Slidebar Menu', 'kraftives'), 
				'desc' => __('Enable this to display slidebar menu on slider/header module.<br>
				<strong>Note:</strong> Only Enable it if you have header module present in the top and "Slide Bar" menu style selected.', 'kraftives'),
				'std' => 'false'
			)
		);

}

$menu_settings->Finish();

/*--------------------------------------------------------------------------------
|				KraftiveComments:  Team Post Type / Metaboxes			|						
--------------------------------------------------------------------------------*/

//Team Social Links

$config = array(
    'id'             => 'folio_social_links', 
    'title'          => 'Social Links', 
    'pages'          => array('folio_team'),
    'context'        => 'side',
    'priority'       => 'high',
    'fields'         => array(),
    'local_images'   => false,
    'use_with_theme' => true
  );
  
	$social_links =  new Metabox_Extended($config);
	  
	 $social_links->addText($prefix.'facebook',
	 	array(
			'name'=> 'Facebook', 
			'desc' => 'Enter facebook link'
		)
	);
	 $social_links->addText($prefix.'linkedin',
	 	array(
			'name'=> 'Linkedin', 
			'desc' => 'Enter linkedin link'
		)
	);
	 $social_links->addText($prefix.'twitter',
	 	array('name'=> 'Twitter', 
			'desc' => 'Enter twitter link'
		)
	);
	 $social_links->addText($prefix.'googleplus',
	 	array(
			'name'=> 'Google Plus', 
			'desc' => 'Enter google plus link'
		)
	);
	
	$social_links->Finish();



//Skills Metaboxes
  $config = array(
    'id'             => 'folio_additional_information',
    'title'          => 'Additional Information',
    'pages'          => array('folio_team'),
    'context'        => 'normal',
    'priority'       => 'high',
    'fields'         => array(),
    'local_images'   => false,
    'use_with_theme' => true
  );




  $team_meta =  new Metabox_Extended($config);
  
  	$team_meta->addText($prefix.'designation',
		array(
			'name'=> 'Designation', 
			'desc' => 'Enter designation'
		)
	);
  	$skill_fields[] = $team_meta->addText($prefix.'re_skill_name',
		array(
			'name'=> 'Skill Name', 
			'desc' => 'Enter skill name.'
		),true
	);
  	$skill_fields[] = $team_meta->addText($prefix.'re_skill_percentage',
		array(
			'name'=> 'Skill Percentage', 
			'desc' => 'Enter skill percentage'
		),true
	);

  //repeater block
	$team_meta->addRepeaterBlock($prefix.'add_skill',
		array(
		'inline'   => true, 
		'name'     => 'Add Skill',
		'fields'   => $skill_fields, 
		'sortable' => true
		)
	);

$team_meta->Finish();




/*--------------------------------------------------------------------------------
|				KraftiveComments:  Portfolio Post Type / Metaboxes			|						
--------------------------------------------------------------------------------*/

/* Headings Section */
  $config = array(
    'id'             => 'portfolio_header_custom_fields',
    'title'          => __('Portfolio Header Headings', 'kraftives'),
    'pages'          => array('portfolio'),
    'context'        => 'normal',
    'priority'       => 'high',
    'fields'         => array(),
    'local_images'   => false,
    'use_with_theme' => true
  );

$portfolio =  new Metabox_Extended($config);
  
	/* Heading 1 */
	$portfolio->addTextarea('heading_1',
		array(
			'name'=> __('Heading 1', 'kraftives'), 
			'desc' => __('This will be the 1st heading', 'kraftives'),
		)
	);
  	/* Heading 2 */
	$portfolio->addTextarea('heading_2',
		array(
			'name'=> __('Heading 2', 'kraftives'), 
			'desc' => __('This will be the 2nd heading', 'kraftives'),
		)
	);

$portfolio->Finish();

/* Portfolio Details Section */
  $config = array(
    'id'             => 'portfolio_custom_fields',
    'title'          =>  __('Portfolio Details', 'kraftives'),
    'pages'          => array('portfolio'),
    'context'        => 'normal',
    'priority'       => 'high',
    'fields'         => array(),
    'local_images'   => false,
    'use_with_theme' => true
  );
	$portfolio_details = new Metabox_Extended($config);
	


	$portfolio_details->addText('portfolio_client',
		array(
			'name'=> __('Client', 'kraftives'), 
			'desc' => __('Insert Client title of this project', 'kraftives'),
		)
	); 

	$portfolio_details->addText('portfolio_url',
		array(
			'name'=> __('Live URL', 'kraftives'), 
			'desc' => __('Insert live URL of this project', 'kraftives'),
		)
	);  	
	$portfolio_details->addText('portfolio_url_title',
		array(
			'name'=> __('Live URL title', 'kraftives'), 
			'desc' => __('Insert live URL title to display as link, if it is empty then url will be used as a fallback.', 'kraftives'),
		)
	); 

	$portfolio_details->addText('portfolio_tagline',
		array(
			'name'=> __('Tag line', 'kraftives'), 
			'desc' => __('This will only display in portfolio listing module in builder', 'kraftives'),
		)
	); 	

	$portfolio_details->addText('portfolio_launch_project_link',
		array(
			'name'=> __('Launch Project Link', 'kraftives'), 
			'desc' => __('Insert external URL for project', 'kraftives'),
		)
	);

	
	$portfolio_details->Finish();




/*--------------------------------------------------------------------------------
|				KraftiveComments:  Layout Options for Page / Post Type / Metaboxes			|						
--------------------------------------------------------------------------------*/
	$config = array(
		'id' => 'post_custom_fields',	
		'title' => __('Layout Options', 'kraftives'),	
		'pages' => array('page', 'post'),
		'context' => 'normal',	
		'priority' => 'high',	
		'fields' => array(),	
		'local_images' => false,	
		'use_with_theme' => true
	);
	
	$layout_options =  new Metabox_Extended($config);

	$layout_options->addSwitch('sidebar_active',

		array(
			'name'=> __('Sidebar', 'kraftives'), 
			'desc' => __('Turn it on to active sidebar.', 'kraftives'), 
	 		'std' => folio_get_current_post_type()==='page' ? 'false' : 'true'
	 	)
	);
	
	$layout_options->addRadioImage('page_layout_option',
			array(
				'sidebar_right' 	=> 'Sidebar Right',
				'sidebar_left' 	 => 'Sidebar Left', 
				'sidebar_2right'   =>'Sidebar-2 - Right', 
				'sidebar_2left'	=>'Sidebar-2 - Left',
				'sidebar_both' 	 => 'Sidebar Both', 
				),
			array(
				'name'=> __('Select layout Option.', 'kraftives'), 
				'std'=> array('sidebar_left'),
				'desc' => __('Select the layout option', 'kraftives'), 
			)
	);


	$layout_options->Finish();	

}//end is_admin()