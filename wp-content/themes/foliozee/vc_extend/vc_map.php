<?php
/*--------------------------------------------------------------------------------
|				KraftiveComments:  Heading Module / Element Map					|						
--------------------------------------------------------------------------------*/

	vc_map( array(
	  "name" => __("Folio Heading", "kraftives"),
	  "base" => "folio_heading",
	  "class" => "icon_folio_heading",
	  "icon"	=> 'icon_folio_heading',
	  "weight" => 100,
	  "category" => __("Folio Zee Modules", "kraftives"),
	  "description" => __( "All Heading modules will be handled from here.", 'kraftives' ),
	
	  "params" => array(
		array(
			"type" => "dropdown",
			"param_name" => "heading_style",
			"heading" => __("Heading Style", "kraftives"),
			"value" => array(
						"Style 1" => "style_1",
						"Style 2" => "style_2",
						"Style 3"   => "style_3",
						"Style 4"   => "style_4",
						"Style 5"   => "style_5"
					),
			"description" => __("Choose heading style.", "kraftives"),
			"group" => __( "General Settings", "kraftives" )
		),

	//Styel 1
	
		array(
			'type' => 'tab_id',
			'param_name' => "style_1_image",
			"description" => __('<img src="'.IMAGES_PATH . 'headings/style_1.PNG" width="100%" alt="style 1" />', "kraftives"),
			"dependency" => array(
					"element" => "heading_style",
					"value" => array( "style_1" )
				),

			"group" => __( "General Settings", "kraftives" )
		),
		array(
			"type" => "textfield",
			"heading" => __("Title", "kraftives"),
			"param_name" => "style_1_title",
			"description" => __("Main heading group", "kraftives"),
			"dependency" => array(
					"element" => "heading_style",
					"value" => array( "style_1" )
				),
	
		 	"group" => __( "General Settings", "kraftives" )
		 ),
		
		array(
			"type" => "checkbox",
			"heading" => __( "Show Description", "kraftives" ),
			"param_name" => "is_desc",
			"description" => __( "Select checkbox to active description box.", "kraftives" ),
			"value" => array( __( "Show", "kraftives" ) => "yes" ),
			"dependency" => array(
					"element" => "heading_style",
					"value" => array( "style_1" )
				),
			"group" => __( "General Settings", "kraftives" )
		),
		array(
			"type" => "textarea",
			"heading" => __("Short Description", "kraftives"),
			"param_name" => "style_1_desc",
			"description" => __("Short description for heading.". folio_pattren_description()),
			"dependency" => array(
					"element" => "is_desc",
					"value" => array( "yes" )
				),
		 	"group" => __( "General Settings", "kraftives" )
		 ),
		array(
			"type" => "checkbox",
			"heading" => __( "Show Curved Line", "kraftives" ),
			"param_name" => "is_line",
			"description" => __( "Select checkbox to active curved line.", "kraftives" ),
			"value" => array( __( "Show", "kraftives" ) => "yes" ),
			"dependency" => array(
					"element" => "heading_style",
					"value" => array( "style_1" )
				),
			"group" => __( "General Settings", "kraftives" )
		),
		array(
			"type" => "colorpicker",
			"admin_label" => true,
			"heading" => __("Line Color", "kraftives"),
			"param_name" => "line_color",
			"value"	=> "#999999",
			"description" => __("line color", "kraftives"),
			"dependency" => array(
					"element" => "is_line",
					"value" => array( "yes" )
				),
	
			"group" => __( "General Settings", "kraftives" )
		),		
	
	//Style 2
	
		array(
			'type' => 'tab_id',
			'param_name' => "style_2_image",
			"description" => __('<img src="'.IMAGES_PATH . 'headings/style_2.PNG" width="100%" alt="style 2" />', "kraftives"),
			"dependency" => array(
					"element" => "heading_style",
					"value" => array( "style_2" )
				),

		"group" => __( "General Settings", "kraftives" )
		),

		array(
			"type" => "textfield",
			"heading" => __("Title", "kraftives"),
			"param_name" => "style_2_title",
			"description" => __("Main Title for heading.".folio_pattren_description()),
			"dependency" => array(
					"element" => "heading_style",
					"value" => array( "style_2" )
				),
	
		 "group" => __( "General Settings", "kraftives" )
		 ),
		array(
			"type" => "textarea",
			"heading" => __("Short Description", "kraftives"),
			"param_name" => "style_2_desc",
			"description" => __("Short description for heading.". folio_pattren_description()),
			"dependency" => array(
					"element" => "heading_style",
					"value" => array( "style_2" )
				),
		 "group" => __( "General Settings", "kraftives" )
		 ),
	
	//Style 3 Parallex
		array(
			'type' => 'tab_id',
			'param_name' => "style_3_image",
			"description" => __('<img src="'.IMAGES_PATH . 'headings/style_3.PNG" width="100%" alt="style 3" />', "kraftives"),
			"dependency" => array(
					"element" => "heading_style",
					"value" => array( "style_3" )
				),
			"group" => __( "General Settings", "kraftives" )
		),

		array(
			"type" => "textfield",
			"heading" => __("Title", "kraftives"),
			"param_name" => "style_3_title",
			"description" => __("Main Title for heading.".folio_pattren_description()),
			"dependency" => array(
					"element" => "heading_style",
					"value" => array( "style_3" )
				),
	
		 	"group" => __( "General Settings", "kraftives" )
		 ),
	//Style 4 Custom Headings
		array(
			'type' => 'tab_id',
			'param_name' => "style_4_image",
			"description" => __('<img src="'.IMAGES_PATH . 'headings/style_5.PNG" width="100%" alt="style 3" />', "kraftives"),
			"dependency" => array(
					"element" => "heading_style",
					"value" => array( "style_4" )
				),
			"group" => __( "General Settings", "kraftives" )
		),
		array(
			"type" => "textfield",
			"heading" => __("Title", "kraftives"),
			"param_name" => "style_4_title",
			"description" => __("Main Title for heading.".folio_pattren_description()),
			"dependency" => array(
					"element" => "heading_style",
					"value" => array( "style_4" )
				),
	
		 	"group" => __( "General Settings", "kraftives" )
		 ),	
		array(
			"type" => "textfield",
			"heading" => __("Sub Title", "kraftives"),
			"param_name" => "style_4_sub_title",
			"description" => __("Sub Title for heading.".folio_pattren_description()),
			"dependency" => array(
					"element" => "heading_style",
					"value" => array( "style_4" )
				),
	
		 	"group" => __( "General Settings", "kraftives" )
		 ),	
		array(
			"type" => "textarea",
			"heading" => __("Short Description", "kraftives"),
			"param_name" => "style_4_desc",
			"description" => __("Heading short description.".folio_pattren_description()),
			"dependency" => array(
					"element" => "heading_style",
					"value" => array( "style_4" )
				),
	
		 	"group" => __( "General Settings", "kraftives" )
		 ),		
		array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Heading Align", "kraftives"),
				"param_name" => "align",
				"admin_label" => true,
				"value" => array(
								'Center' => 'align_center',
								'Left' => 'align_left',
								'Right' => 'align_right',
								),
				"description" => __("Set alignment of Heading", "kraftives"),
				"dependency" => array(
						"element" => "heading_style",
						"value" => array( "style_2", "style_3" )
					),
				"group" => __( "General Settings", "kraftives" )
			),

	//Style 5 Custom Headings
		array(
			'type' => 'tab_id',
			'param_name' => "style_5_image",
			"description" => __('<img src="'.IMAGES_PATH . 'headings/style_6.PNG" width="100%" alt="style 5" />', "kraftives"),
			"dependency" => array(
					"element" => "heading_style",
					"value" => array( "style_5" )
				),
			"group" => __( "General Settings", "kraftives" )
		),
		array(
			"type" => "textfield",
			"heading" => __("Title", "kraftives"),
			"param_name" => "style_5_title",
			"description" => __("Main Title for heading.".folio_pattren_description()),
			"dependency" => array(
					"element" => "heading_style",
					"value" => array( "style_5" )
				),
	
		 	"group" => __( "General Settings", "kraftives" )
		 ),	
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => __("Heading Align", "kraftives"),
			"param_name" => "align_4",
			"admin_label" => true,
			"value" => array(
							'Left' => 'align_left',
							'Right' => 'align_right',
							'Center' => 'align_center'
							),
			"description" => __("Set alignment of Heading", "kraftives"),
			"dependency" => array(
					"element" => "heading_style",
					"value" => array( "style_4", "style_5" )
				),
			"group" => __( "General Settings", "kraftives" )
		),

/* Colors for headings */
		array(
			"type" => "colorpicker",
			"admin_label" => true,
			"heading" => __("Heading One Color", "kraftives"),
			"param_name" => "heading_1_color",
			"description" => __("use to change color of main heading of module", "kraftives"),
			"dependency" => array(
					"element" => "heading_style",
					"value" => array( "style_1", "style_2", "style_3", "style_4", "style_5" )
				),
	
			"group" => __( "Styling", "kraftives" )
		),
		array(
			"type" => "colorpicker",
			"admin_label" => true,
			"heading" => __("Heading Two Color", "kraftives"),
			"param_name" => "heading_2_color",
			"description" => __("use to change color of sub heading of module", "kraftives"),
			"dependency" => array(
					"element" => "heading_style",
					"value" => array( "style_1", "style_2", "style_4" )
				),
	
			"group" => __( "Styling", "kraftives" )
		),
		array(
			"type" => "colorpicker",
			"admin_label" => true,
			"heading" => __("Heading Three Color", "kraftives"),
			"param_name" => "heading_3_color",
			"description" => __("use to change color of heading description of module", "kraftives"),
			"dependency" => array(
					"element" => "heading_style",
					"value" => array( "style_4" )
				),
	
			"group" => __( "Styling", "kraftives" )
		),
		
	  )
	) );
   
/*--------------------------------------------------------------------------------
|				KraftiveComments:  Custom Heading Module / Element Map				|						
--------------------------------------------------------------------------------*/
	vc_map( array(
	  "name" => __("Folio Custom Heading", "kraftives"),
	  "base" => "folio_custom_heading",
	  "class" => "icon_folio_heading",
	  "icon"	=> 'icon_folio_heading',
	  "weight" => 101,
	  "category" => __("Folio Zee Modules", "kraftives"),
	  "description" => __( "All Heading tags H1 to H6 will be handled from here.", 'kraftives' ),
	
	  "params" => array(
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Heading Tag", "kraftives"),
				"param_name" => "tag",
				"admin_label" => true,
				"value" => array(
								'H1' => 'h1',
								'H2' => 'h2',
								'H3' => 'h3',
								'H4' => 'h4',
								'H5' => 'h5',
								'H6' => 'h6'
								),
				"description" => __("Select heading from h1 to h6", "kraftives"),
			),

			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Heading Text", "kraftives"),
				"param_name" => "tag_content",
				"value" => "Heading",
				"description" => __("Heading text here".folio_pattren_description(), "kraftives"),
			),

			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Heading Align", "kraftives"),
				"param_name" => "tag_align",
				"admin_label" => true,
				"value" => array(
								'Left' => 'align_left',
								'Right' => 'align_right',
								'Center' => 'align_center'
								),
				"description" => __("Set alignment of Heading", "kraftives"),
			),

			array(
				"type" => "checkbox",
				"class" => "",
				"heading" => __("Link It", "kraftives"),
				"param_name" => "is_link",
				'value' => array( __( 'Show Link', 'kraftives' ) => 'yes' ),
				"description" => __("Select checkbox to active link on heading text.", "kraftives"),
			),

			array(
				"type" => "vc_link",
				"class" => "",
				"heading" => __("Link", "kraftives"),
				"param_name" => "link",
				"value" => "",
				"description" => __("set link", "kraftives"),
			),
	
			array(
			"type" => "textfield",
			"heading" => __("Extra Class Name", "kraftives"),
			"param_name" => "el_class",
			"description" => __("Extra Class Here", "kraftives")
		 )
	  
	  		)
	  	)
	);

/*--------------------------------------------------------------------------------
|				KraftiveComments:  About Us Module / Element Map				|						
--------------------------------------------------------------------------------*/
	vc_map( array(
		"name" => __("Folio About Us", "kraftives"),
		"base" => "folio_about",
		"weight" => 99,
		"as_parent" => array('only' => 'about_tab'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
		"content_element" => true,
		"category" => __("Folio Zee Modules",'kraftives'),
		"icon"	=>	"icon_aboutus",
		"class"	=> "icon_aboutus",
		"description"	=>	__("About us section","kraftives"),
		"show_settings_on_create" => true,
		"params" => array(
			array(
					'type' => 'attach_image',
					'heading' => __( 'Featured Image', 'kraftives' ),
					'param_name' => 'bg_image',
					'description' => __( 'Feature image to display on right/left side of this module.', 'kraftives' ),
			  ),
			array(
					'type' => 'dropdown',
					'heading' => __( 'Featured Image Position', 'kraftives' ),
					'param_name' => 'image_position',
					'value' => array( 'Left' => 'left', 'Right' => 'right' ),
					'description' => __( 'Set featured image position. Default: Left', 'kraftives' ),
			  ),
			array(
					'type' => 'textfield',
					'heading' => __( 'Title', 'kraftives' ),
					'param_name' => 'title',
					'description' => __( 'Title of about us page ', 'kraftives' ),
			  ),
			array(
					'type' => 'vc_link',
					'heading' => __( 'Read More Link', 'kraftives' ),
					'param_name' => 'link',
					'description' => __( 'Link to any particullar page.', 'kraftives' ),
			  ),
			array(
				"type" => "textfield",
				"heading" => __("Extra class name", "kraftives"),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "kraftives")
			)
		),
		"js_view" => 'VcColumnView'
	) );

//About Child Element
	vc_map( array(
		"name" => __("About Tab", "kraftives"),
		"base" => "about_tab",
		"icon"	=>	"icon_aboutus",
		"description"	=>	__("About tab Section","kraftives"),
		"class" => "icon_aboutus",
		"content_element" => true,
		"as_child" => array('only' => 'folio_about'), // Use only|except attributes to limit parent (separate multiple values with comma)
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => __( 'Title', 'kraftives' ),
					'param_name' => 'title',
					'description' => __( 'About tab title.', 'kraftives' )
				),
				array(
					'type' => 'textarea',
					'heading' => __( 'Description', 'kraftives' ),
					'param_name' => 'description',
					'description' => __( 'About Description.', 'kraftives' )
				),
				array(
					"type" => "dropdown",
					"param_name" => "icon_class",
					"heading" => __("Choose an Icon", "kraftives"),
					"value" => folio_icons(),
					"description" => __("Choose an icon from the drop down list.", "kraftives")
				),
			
				array(
					'type' => 'textfield',
					'heading' => __( 'Extra Class', 'kraftives' ),
					'param_name' => 'el_class',
					'description' => __( 'Extra Class.', 'kraftives' )
				),
			)
	) );


/*--------------------------------------------------------------------------------
|				KraftiveComments:  Services Module / Element Map				|						
--------------------------------------------------------------------------------*/
	vc_map( array(
		"name" => __("Folio Services", "kraftives"),
		"base" => "folio_services",
		"weight" => 99,
		"as_parent" => array('only' => 'service'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
		"content_element" => true,
		"category" => __("Folio Zee Modules",'kraftives'),
		"icon"	=>	"icon_services_folio",
		"class"	=> "icon_services_folio",
		"description"	=>	__("Services Section","kraftives"),
		"show_settings_on_create" => false,
		"params" => array(
			array(
				"type" => "textfield",
				"heading" => __("Extra class name", "kraftives"),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "kraftives")
			)
		),
		"js_view" => 'VcColumnView'
	) );

//Services Child Element
	vc_map( array(
		"name" => __("Service", "kraftives"),
		"base" => "service",
		"icon"	=>	"service_icon",
		"description"	=>	__("Service Section","kraftives"),
		"content_element" => true,
		"as_child" => array('only' => 'services'), // Use only|except attributes to limit parent (separate multiple values with comma)
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => __( 'Title', 'kraftives' ),
					'param_name' => 'title',
					'description' => __( 'Service section title.', 'kraftives' )
				),
				array(
					'type' => 'textarea',
					'heading' => __( 'Description', 'kraftives' ),
					'param_name' => 'description',
					'description' => __( 'Service Description.', 'kraftives' )
				),
				array(
					"type" => "dropdown",
					"param_name" => "icon_class",
					"heading" => __("Choose an Icon", "kraftives"),
					"value" => folio_icons(),
					"description" => __("Choose an icon from the drop down list.", "kraftives")
				),
			
				array(
					'type' => 'vc_link',
					'heading' => __( 'Read More Link', 'kraftives' ),
					'param_name' => 'read_more_link',
					'description' => __( 'Set read more link.', 'kraftives' )
				),
			
				array(
					'type' => 'textfield',
					'heading' => __( 'Extra Class', 'kraftives' ),
					'param_name' => 'el_class',
					'description' => __( 'Extra Class.', 'kraftives' )
				),
			)
	) );


/*--------------------------------------------------------------------------------
|				KraftiveComments:  Fun & Facts / Element Map				|						
--------------------------------------------------------------------------------*/

	vc_map( array(
		   "name" => __("Folio Fun & Fact", "kraftives"),
		   "icon" => "icon_folio_funfact",
		   "base" => "folio_funfacts",
		   "weight" => 95,
		   "description" => __("Values counting to a specified target", "kraftives"),
		   "class" => "icon_folio_funfact",
		   "category" => __("Folio Zee Modules", "kraftives"),
		   "params" => array( 

			  array(
				 "type" => "textfield",
				 "admin_label" => true,
				 "heading" => __("Start Value", "kraftives"),
				 "param_name" => "fact_start_value",
				 "value" => 0,
				 "description" => __("Enter the start value of the funfact. Ex: 34", "kraftives"),
				 ),

			  array(
				 "type" => "textfield",
				 "admin_label" => true,
				 "heading" => __("End Value", "kraftives"),
				 "param_name" => "fact_end_value",
				 "description" => __("Enter the ending value of the funfact. Ex: 99", "kraftives"),
				 ),

			  array(
				 "type" => "colorpicker",
				 "admin_label" => true,
				 "heading" => __("Value Color", "kraftives"),
				 "param_name" => "fact_color",
				 "value" => "",
				 "description" => __("Fact value color", "kraftives"),
				 ),


			  array(
				 "type" => "textfield",
				 "class" => "",
				 "admin_label" => true,
				 "heading" => __("Fun Fact Text", "kraftives"),
				 "param_name" => "fact_text",
				 "description" => __("Enter a text for the fact. Ex: 'Projects Completed'.", "kraftives"),
			  ),      
			  array(
				 "type" => "textfield",
				 "class" => "",
				 "heading" => __("Speed", "kraftives"),
				 "param_name" => "fact_speed",
				 "value" => 35,
				 "description" => __("Speed for the fact animation.", "kraftives"),
			  ),
				array(
					"type" => "dropdown",
					"param_name" => "fact_icons",
					"heading" => __("Choose an Icon", "kraftives"),
					"value" => folio_icons(),
					"description" => __("Choose an icon from the drop down list.", "kraftives")
				),
		   )
		) );

/*--------------------------------------------------------------------------------
|				KraftiveComments:  Testimonials / Element Map				|						
--------------------------------------------------------------------------------*/
//Parent Element
	vc_map( array(
		"name" => __("Folio Testmonials", "kraftives"),
		"base" => "folio_testmonials",
		"class"	=> "icon_folio_testmonials",
		"icon" => "icon_folio_testmonials",
		"weight" => 91,
		"as_parent" => array('only' => 'testmonial'), 
		"content_element" => true,
		"category" => __('Folio Zee Modules', 'kraftives'),
		"description"	=>	__("Testmonials Section", "kraftives"),
		"show_settings_on_create" => true,
		"params" => array(
			array(
				"type" => "dropdown",
				"heading" => __("Transition Type", "kraftives"),
				"param_name" => "transition",
				"value" => array(
								__("Go Down", "kraftives") => "goDown",
								__("Fade", "kraftives") => "fade",
								__("Fade Up", "kraftives") => "fadeUp",
								__("Back Slide", "kraftives") => "backSlide",
							),
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "kraftives")
			),

			array(
				"type" => "textfield",
				"heading" => __("Extra class name", "kraftives"),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "kraftives")
			)
		),
		"js_view" => 'VcColumnView'
	) );

//Chlid Element

	vc_map( array(
      "name" => __("Testmonial", 'kraftives'),
      "base" => "testmonial", 
      "class" => "icon_testmonial_heading",
	  "icon"	=> 'icon_testmonial_heading',
      "category" => __('Folio Zee Modules', 'kraftives'),
		"content_element" => true,
		"as_child" => array('only' => 'folio_testmonials'), // Use only|except attributes to limit parent (separate multiple values with comma)
		"description"	=>	__("Testimonial single block","kraftives"),
		"show_settings_on_create" => true,
	  "params" => array(
		  array(
				'type' => 'attach_image',
				'heading' => __( 'Author Image', 'kraftives' ),
				'param_name' => 'author_image',
				'description' => __( 'Upload Image of author ', 'kraftives' ),
		  ),
		 array(
            "type" => "textfield",
            "heading" => __("Author Name", 'kraftives'),
            "param_name" => "author_name",
            "description" => __("Author Name", 'kraftives')
         ),
		 array(
            "type" => "textfield",
            "heading" => __("Designation", 'kraftives'),
            "param_name" => "author_designation",
            "description" => __("Author designation here.", 'kraftives')
         ),

         array(
            "type" => "textarea",
            "heading" => __("Description", 'kraftives'),
            "param_name" => "testmonial_description",
            "value" => __("Description here", 'kraftives'),
            "description" => __("Description for testmonail.", 'kraftives')
         ),

		 array(
            "type" => "textfield",
            "heading" => __("Extra Class Name", 'kraftives'),
            "param_name" => "el_class",
            "description" => __("Extra Class Here", 'kraftives')
         )

      ),
   ) );
   
/*--------------------------------------------------------------------------------
|				KraftiveComments:  Clients / Element Map				|						
--------------------------------------------------------------------------------*/

	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_Folio_Clients extends WPBakeryShortCodesContainer {
		}
	}

	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Client extends WPBakeryShortCode {
		}
	}

//Parent Element
	vc_map( array(
		"name" => __("Folio Client Block", "kraftives"),
		"base" => "folio_clients",
		"as_parent" => array('only' => 'client'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
		"content_element" => true,
		"category" => __("Folio Zee Modules", "kraftives"),
		"icon"	=>	"icon_folio_clients",
		"class"	=>	"icon_folio_clients",
		"description"	=>	__("Clients Block","kraftives"),
		"show_settings_on_create" => false,
		"weight" => 93,
		"params" => array(
			array(
				"type" => "textfield",
				"heading" => __("Extra class name", "kraftives"),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "kraftives")
			)
		),
		"js_view" => 'VcColumnView'
	) );

//Child Element

	vc_map( array(
      "name" => __("Client", "kraftives"),
      "base" => "client",
      "class" => "icon_folio_client",
	  "icon"	=> 'icon_folio_client',
 	  "content_element" => true,
	  "as_child" => array('only' => 'folio_clients'), // Use only|except attributes to limit parent (separate multiple values with comma)
     
	  //Creating input fields to show output in front site.( having lot of built-in field types ) 
	  "params" => array(
         array(
            "type" => "textfield",
            "heading" => __("Title", "kraftives"),
            "param_name" => "title",
            "description" => __("Titlt of client.", "kraftives")
         ),

         array(
            "type" => "textfield",
            "heading" => __("Client Url", 'kraftives'),
            "param_name" => "client_link",
            "description" => __("Write client Url.", 'kraftives')
         ),

		  array(
				'type' => 'attach_image',
				'heading' => __( 'Client Logo', 'kraftives' ),
				'param_name' => 'client_logo',
				'description' => __( 'Upload Client Logo ', 'kraftives' ),
		  ),

		 array(
            "type" => "textfield",
            "heading" => __("Extra Class Name", "kraftives"),
            "param_name" => "el_class",
            "description" => __("Extra Class Here", "kraftives")
         )

      )
   ) );
   
/*--------------------------------------------------------------------------------
|				KraftiveComments:  Contact Info / Element Map				|						
--------------------------------------------------------------------------------*/

	vc_map(
	array(
	   "name" => __("Folio Contact Info", "kraftives"),
	   "base" => "folio_contact_info",
	   "class" => "icon_folio_contact_info",
	   "icon" => "icon_folio_contact_info",
	   "weight" => 90,
	   "category" => __("Folio Zee Modules",'kraftives'),
	   "description" => __("Folio zee Contact Info.","kraftives"),
	   "params" => array(
	
			array(
				"type" => "dropdown",
				"param_name" => "contact_icons",
				"heading" => __("Choose an Icon", "kraftives"),
				"value" => folio_icons(),
				"description" => __("Choose an icon from the drop down list.", "kraftives")
			),

			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Title", "kraftives"),
				"param_name" => "title",
				"value" => "",
				"description" => __("Enter title of contact Ex: Email, Fax, Address...etc", "kraftives"),
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Description", "kraftives"),
				"param_name" => "description",
				"value" => "",
				"description" => __("Enter description of contact Ex: +92300000012, mail@mail.com...etc", "kraftives"),
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Extra Class", "kraftives"),
				"param_name" => "el_class",
				"value" => "",
				"description" => __("Extra Class name", "kraftives"),
			)
		)// params
));// vc_map

/*--------------------------------------------------------------------------------
|				KraftiveComments:  Video with Qoute / Element Map				|						
--------------------------------------------------------------------------------*/

	vc_map(array(
		   "name" => __("Video With Quote", "kraftives"),
		   "base" => "folio_quote_video",
		   "class" => "icon_folio_video_qoute",
		   "icon" => "icon_folio_video_qoute",
		   "weight" => 90,
		   "category" => __("Folio Zee Modules",'kraftives'),
		   "description" => __("Display vimeo video with qoute..","kraftives"),
		   "params" => array(
		
				array(
					"type" => "dropdown",
					"param_name" => "display",
					"heading" => __("Display", "kraftives"),
					"value" => array( 
									__( "Both", "kraftives" ) => 'both', 
									__( "Only Video", "kraftives" ) => 'only_video', 
									__( "Only Quote", "kraftives" ) => 'only_quote' 
								),
					"description" => __("Choose any option to dispaly.", "kraftives")
				),
	
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Title", "kraftives"),
					"param_name" => "video_title",
					"value" => "",
					"description" => __("Enter title which will be show on the hover of video button", "kraftives"),
					"dependency" => array(
						"element" => "display",
						"value" => array( "both", "only_video" )
					),
	
				),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Vimeo Video ID", "kraftives"),
					"param_name" => "video_id",
					"value" => "",
					"description" => __("Enter vimeo video id Ex: <strong>81894287</strong>", "kraftives"),
					"dependency" => array(
						"element" => "display",
						"value" => array( "both", "only_video" )
					),
				),
	
				array(
					"type" => "textfield",
					"heading" => __("Author Name", "kraftives"),
					"param_name" => "author",
					"value" => "",
					"description" => __("Enter name of Quote author.", "kraftives"),
					"dependency" => array(
						"element" => "display",
						"value" => array( "both", "only_quote" )
					),
				),
	
				array(
					"type" => "textarea",
					"heading" => __("Description", "kraftives"),
					"param_name" => "description",
					"value" => "",
					"description" => __("Enter quote", "kraftives"),
					"dependency" => array(
						"element" => "display",
						"value" => array( "both", "only_quote" )
					),
				),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Extra Class", "kraftives"),
					"param_name" => "el_class",
					"value" => "",
					"description" => __("Extra Class name", "kraftives"),
				)
			)// params 
	));// vc_map


/*--------------------------------------------------------------------------------
|				KraftiveComments:  Portfolio Craousle / Element Map				|						
--------------------------------------------------------------------------------*/


	vc_map( array(
		   "name" => __("Folio Portfolio Carousel", "kraftives"),
		   "icon" => "icon_carousel",
		   "base" => "folio_portfolio_carousel",
		   "description" => "portfolio carousel module",
		   "weight" => 96,
		   "class" => "icon_carousel",
		   "category" => __("Folio Zee Modules", "kraftives"),
		   "params" => array( 
			  
			  array(
				 "type" => "dropdown",
				 "class" => "",
				 "admin_label" => true,
				 "heading" => __("Carousel View", "kraftives"),
				 "param_name" => "carousel_view",
				 "value" => array(
							 __( "Full Width", "kraftives" ) => "full_width", 
							 __( "In Container", "kraftives" ) => "container" 
							),
				 "description" => __("Set how many portfolio items would you like to include in the grid. Use '-1' to include all your items.", "kraftives"),
				 "group" => __( "General Settings", "kraftives" )     
			  ),

			array(
				"type" => "checkbox",
				"heading" => __("Is Curve", "kraftives"),
				"param_name" => "is_curve",
				"value" => array(__( "Is Curve", "kraftives" ) => "yes"),
				"description" => __("Check this for actgivating curved carousel <strong>Note: </strong> This will only add <strong>Bottom Curve</strong>. ", "kraftives"),
				"group" => __( "General Settings", "kraftives" ) 
			),
			array( // top_curve_color_type
					'type' => 'dropdown',
					'heading' => __( 'Curve color', 'kraftives' ),
					'param_name' => 'curve_color',
					'value' => array(
									  __( 'Theme major color', 'kraftives' ) => '',
									  __( 'Grey color', 'kraftives' ) => 'bottom_c_grey',
								),
					'description' => __( 'Select Top curve color type between theme major color or grey curve', 'kraftives' ),
					'dependency' => array(
						'element' => 'is_curve',
						'value' => array('yes')
					),
					'group' => __( 'General Settings', 'kraftives' ) 
			  ),

			array( 
						'type' => 'dropdown',
						'heading' => __( 'Bottom Curve background color', 'kraftives' ),
						'param_name' => 'curve_bg_color',
						'value' => array(
										  __( 'Default background Color', 'kraftives' ) => '',
										  __( 'Grey backround color', 'kraftives' ) => 'bottom_grey',
									),
						'description' => __( 'Select Bottom curve Background color type between default white color or grey ', 'kraftives' ),
						'dependency' => array(
							'element' => 'is_curve',
							'value' => array( 'yes' )
						),
						'group' => __( 'General Settings', 'kraftives' ) 
				  ),
			  array(
				 "type" => "textfield",
				 "class" => "",
				 "admin_label" => true,
				 "heading" => __("Number of Items to Display", "kraftives"),
				 "param_name" => "number",
				 "value" => -1,
				 "description" => __("Set how many portfolio items would you like to include in the grid. Use '-1' to include all your items.", "kraftives"),
				 "group" => __( "General Settings", "kraftives" )     
			  ),
			  array(
				 "type" => "checkbox",
				 "class" => "",
				 "heading" =>  __("Portfolio Categories", "kraftives"),
				 "param_name" => "categories",
				 "value" => folio_portfolio_array(),
				 "description" => __("Select from which categories to display projects.", "js_composer"),
				 "group" => __( "General Settings", "kraftives" )     				 
			  ),
			  array(
				 "type" => "textfield",
				 "admin_label" => true,
				 "heading" => __("Show Items On Width 390", "kraftives"),
				 "param_name" => "width_390",
				 "value" => 2,
				 "description" => __("Set how many carousel items want to display of width between 390 to 768.", "kraftives"),
				 "group" => __( "Carousel Settings", "kraftives" )     
			  ),
			  array(
				 "type" => "textfield",
				 "admin_label" => true,
				 "heading" => __("Show Items On Width 768", "kraftives"),
				 "param_name" => "width_768",
				 "value" => 3,
				 "description" => __("Set how many carousel items want to display of width between 768 to 980.", "kraftives"),
				 "group" => __( "Carousel Settings", "kraftives" )     
			  ),
			  array(
				 "type" => "textfield",
				 "admin_label" => true,
				 "heading" => __("Show Items On Width 980", "kraftives"),
				 "param_name" => "width_980",
				 "value" => 4,
				 "description" => __("Set how many carousel items want to display of width between 980 to 1400.", "kraftives"),
				 "group" => __( "Carousel Settings", "kraftives" )     
			  ),
			  array(
				 "type" => "textfield",
				 "admin_label" => true,
				 "heading" => __("Show Items On Width 1400", "kraftives"),
				 "param_name" => "width_1400",
				 "value" => 5,
				 "description" => __("Set how many carousel items want to display of width 1400 and above.", "kraftives"),
				 "group" => __( "Carousel Settings", "kraftives" )     
			  ),
			  array(
				 "type" => "dropdown",
				 "admin_label" => true,
				 "heading" => __("Auto Paly", "kraftives"),
				 "param_name" => "auto_play",
				 "value" => array(__( "True", "kraftives" ) => "true", __( "False", "kraftives" ) => "false" ),
				 "description" => __("Set auto play speed of carousel.", "kraftives"),
				 "group" => __( "Carousel Settings", "kraftives" )     
			  ),

			  array(
				 "type" => "dropdown",
				 "class" => "",
				 "heading" =>  __("Stop on Hover", "kraftives"),
				 "param_name" => "stop_on_hover",
				 "value" => array(__( "True", "kraftives" ) => "true", __( "False", "kraftives" ) => "false" ),
				 "description" => __("Stop autoplay on mouse hover
				 ", "js_composer"),
				 "group" => __( "Carousel Settings", "kraftives" )     				 
			  ),
			  array(
				 "type" => "dropdown",
				 "class" => "",
				 "heading" =>  __("Navigation", "kraftives"),
				 "param_name" => "navigation",
				 "value" => array(__( "True", "kraftives" ) => "true", __( "False", "kraftives" ) => "false" ),
				 "description" => __("Display next and prev buttons.", "js_composer"),
				 "group" => __( "Carousel Settings", "kraftives" )     				 
			  ),
			  array(
				 "type" => "dropdown",
				 "class" => "",
				 "heading" =>  __("Mouse Drag", "kraftives"),
				 "param_name" => "mouse_drag",
				 "value" => array(__( "True", "kraftives" ) => "true", __( "False", "kraftives" ) => "false" ),
				 "description" => __("Turn off/on mouse events.", "js_composer"),
				 "group" => __( "Carousel Settings", "kraftives" )     				 
			  ),

			  array(
				 "type" => "dropdown",
				 "class" => "",
				 "heading" =>  __("Show / Hide Circle Button", "kraftives"),
				 "param_name" => "is_circle_show",
				 "value" => array(__( "True", "kraftives" ) => "true", __( "False", "kraftives" ) => "false" ),
				 "description" => __("use for showing / hinding view all projects circle button from bottom of carousel.", "js_composer"),
				 "group" => __( "Carousel Settings", "kraftives" )     				 
			  ),

			  array(
				 "type" => "vc_link",
				 "class" => "",
				 "heading" =>  __("View All Projects / Link", "kraftives"),
				 "param_name" => "link",
				 "description" => __("Set view all project link and circle button text / title. Circle button will only display on full width view.", "js_composer"),
				 "group" => __( "Carousel Settings", "kraftives" )     				 
			  ),
		   )
		) );

/*--------------------------------------------------------------------------------
|				KraftiveComments:  Portfolio / Element Map				|						
--------------------------------------------------------------------------------*/

	vc_map( array(
		   "name" => __("Folio Portfolio", "kraftives"),
		   "icon" => "icon_folio_portfolio",
		   "base" => "folio_portfolio_grid",
		   "description" => "grid layout for portfolio items: 1-Column module",
		   "weight" => 96,
		   "class" => "icon_folio_portfolio",
		   "category" => __("Folio Zee Modules", "kraftives"),
		   "params" => array( 
			  array(
				 "type" => "dropdown",
				 "admin_label" => true,
				 "heading" => __("Column Layout", "kraftives"),
				 "param_name" => "layout",
				 "value" => array( 
				 					__("Three Columns", "kraftives") => "three_columns",
									__("Four Columns", "kraftives") => "four_columns",
								),
				 "description" => __("Set how many portfolio items would you like to include in the grid. Use '-1' to include all your items.", "js_composer")
			  ),
			  array(
				 "type" => "textfield",
				 "class" => "",
				 "admin_label" => true,
				 "heading" => __("Number of Items to Display", "kraftives"),
				 "param_name" => "number",
				 "value" => 10,
				 "description" => __("Set how many portfolio items would you like to include in the grid. Use '-1' to include all your items.", "js_composer")
			  ),
			  array(
				 "type" => "checkbox",
				 "class" => "",
				 "heading" =>  __("Portfolio Categories", "kraftives"),
				 "param_name" => "categories",
				 "value" => folio_portfolio_array(),
				 "description" => __("Select from which categories to display projects.", "js_composer")
			  ),
			  array(
				 "type" => "textfield",
				 "heading" => __("Keyword for All Projects Filter", "kraftives"),
				 "param_name" => "allword",
				 "value" => "All",
				 "description" => __("You can replace the default 'All' keyword for the initial filter with another one. If you want to hide it.", "js_composer")
			  ),
			  array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Portfolio Navigation Alignment", "kraftives"),
					"param_name" => "align",
					"admin_label" => true,
					"value" => array(
									'Left' => 'align_left',
									'Right' => 'align_right',
									'Center' => 'align_center'
									),
					"description" => __("Set alignment of Portfolio navigation", "kraftives"),
				),
		   )
		) );

/*--------------------------------------------------------------------------------
|				KraftiveComments:  Google Map / Element Map				|						
--------------------------------------------------------------------------------*/

	vc_map( array(
	   "name" => __("Folio Google Map", "kraftives"),
	   "base" => "folio_google_map",
	   "icon" => "icon_folio_google_map",
	   "description" => "Use it put Google map in inside the page, for footer map use theme options panel map setting",
	   "weight" => 89,
	   "class" => "icon_folio_google_map",
	   "category" => __("Folio Zee Modules", "kraftives"),
	   "params" => array( 
		  /*array(
			 "type" => "textfield",
			 "class" => "",
			 "admin_label" => true,
			 "heading" => __("Title", "kraftives"),
			 "param_name" => "title",
			 "value" => __('Location Map', 'kraftives'),
			 "description" => __("Write toggle button text.", "kraftives")
		  ),*/
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Show / Hide Circle Button", "kraftives"),
				"param_name" => "is_button",
				"admin_label" => true,
				"value" => array(
								__('True', 'kraftives') => 'true',
								__('False', 'kraftives') => 'false'
								),
				"description" => __("Select circle toggle button show / hide option.", "kraftives"),
			),
			
	
		  array(
			 "type" => "textfield",
			 "class" => "",
			  "admin_label" => true,
			 "heading" => __("Map Button Text", "kraftives"),
			 "param_name" => "button_text",
			 "value" => __('Location Map', 'kraftives'),
		  	 "description" => __("Write toggle button text.", "kraftives"),
			 'dependency' => array(
				'element' => 'is_button',
				'value' => array( 'true' )
			),
		  ),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Map Toggle state", "kraftives"),
				"param_name" => "map_state",
				"admin_label" => true,
				"value" => array(
								__('Open', 'kraftives') => 'open',
								__('Close', 'kraftives') => 'close'
								),
				"description" => __("Select map toggle state between open or close when loaded.", "kraftives"),
				'dependency' => array(
						'element' => 'is_button',
						'value' => array( 'true' )
					),
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Layout of Map", "kraftives"),
				"param_name" => "map_layout",
				"admin_label" => true,
				"value" => array(
								__('Full Width', 'kraftives') => 'full',
								__('In Container', 'kraftives') => 'containers'
								),
				"description" => __("Select Type of layout if it's on full width don't put any other element / module in same row, in container layout you can put other elements / modules in it.", "kraftives"),
			),
	
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Select Map Type", "kraftives"),
				"param_name" => "type",
				"admin_label" => true,
				"value" => array(
								__('Default', 'kraftives') => 'default',
								__('Greyscale', 'kraftives') => 'greyscale',
								__('Dark', 'kraftives') => 'dark'
								),
				"description" => __("Select Type of Map", "kraftives"),
			),


			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Zoom Level", "kraftives"),
				"param_name" => "zoom",
				"admin_label" => true,
				"value" => array( 14, 8, 9, 10, 11, 12, 13, 15, 16, 17, 18, 19, 20 ),
				"description" => __("Select zoom level, default : 14", "kraftives"),
			),
	
	
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Find Location By", "kraftives"),
				"param_name" => "location",
				"admin_label" => true,
				"value" => array(
								__('Address', 'kraftives') => 'address',
								__('Latitude / Longitude', 'kraftives') => 'lat_long'
								),
				"description" => __("Find location by address or latitude / longitude.", "kraftives"),
			),
	
			  array(
				 "type" => "textfield",
				 "class" => "",
				  "admin_label" => true,
				 "heading" => __("Address", "kraftives"),
				 "param_name" => "address",
				 "value" => __('38th AVENUE STREET, Calgary, AB Canada', 'kraftives'),
				 'dependency' => array(
					'element' => 'location',
					'value' => array( 'address' )
				),
			  ),
	
	
			  array(
				 "type" => "textfield",
				 "class" => "",
				  "admin_label" => true,
				 "heading" => __("Location Latitude", "kraftives"),
				 "param_name" => "latitude",
				 "value" => '37.422117',
				 'dependency' => array(
					'element' => 'location',
					'value' => array( 'lat_long' )
				),
			  ),
			  array(
				 "type" => "textfield",
				 "class" => "",
				  "admin_label" => true,
				 "heading" => __("Location Longitude", "kraftives"),
				 "param_name" => "longitude",
				 "value" => '-122.084053',
				 'dependency' => array(
					'element' => 'location',
					'value' => array( 'lat_long' )
				),
	
			  ),
		  array(
			 "type" => "textfield",
			 "class" => "",
			  "admin_label" => true,
			 "heading" => __("Marker Title", "kraftives"),
			 "param_name" => "marker_title",
			 "value" => ''
		  ),
	
		  array(
			 "type" => "attach_image",
			 "class" => "",
			  "admin_label" => true,
			 "heading" => __("Marker Image", "kraftives"),
			 "param_name" => "marker",
			 "value" => ''
		  ),
		  array(
			 "type" => "number",
			 "class" => "",
			  "admin_label" => true,
			 "heading" => __("Marker Height", "kraftives"),
			 "param_name" => "marker_height",
			 "value" => 105,
			 "min" => 1,
			 "max" => 500,
			 "suffix" => "px",
			 "description" => __("set marker image height in px.", "kraftives")
		  ),
		  array(
			 "type" => "number",
			 "class" => "",
			  "admin_label" => true,
			 "heading" => __("Marker Width", "kraftives"),
			 "param_name" => "marker_width",
			 "value" => 308,
			 "min" => 1,
			 'max' => 500,
			 "suffix" => "px",
			 "description" => __("set marker image width in px.", "kraftives")
		  ),
		  array(
			 "type" => "number",
			 "class" => "",
			  "admin_label" => true,
			 "heading" => __("Map Height", "kraftives"),
			 "param_name" => "map_height",
			 "value" => 477,
			 "min" => 1,
			 "suffix" => "px",
			 "description" => __("set map height in px.", "kraftives")
		  ),
		  array(
			 "type" => "number",
			 "class" => "",
			  "admin_label" => true,
			 "heading" => __("Map Width", "kraftives"),
			 "param_name" => "map_width",
			 "min" => 1,
			 "suffix" => "px",
			 "description" => __("set map width in px.", "kraftives")
		  )                         
		                           
	   )
	) );
	
/*--------------------------------------------------------------------------------
|				KraftiveComments:  Pricing Table / Element Map				|						
--------------------------------------------------------------------------------*/
	
	vc_map(
	array(
	   "name" => __("Folio Pricing Table", 'kraftives'),
	   "base" => "folio_pricing",
	   "class" => "icon_folio_pricing",
	   "icon" => "icon_folio_pricing",
	   "weight" => 84,
	   "category" => __("Folio Zee Modules",'kraftives'),
	   "description" => __("Create nice looking pricing tables.","kraftives"),
	   "params" => array(
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Package Name / Title", "kraftives"),
				"param_name" => "package_heading",
				"admin_label" => true,
				"description" => __("Enter the package name or table heading, e.g. Premium, Gold etc", "kraftives"),
			),
			array(
				"type" => "textfield",
				"heading" => __("Package Price", "kraftives"),
				"param_name" => "package_price",
				"description" => __("Enter the price for this package. e.g. $157", "kraftives"),
			),
			array(
				"type" => "textfield",
				"heading" => __("Price Unit", "kraftives"),
				"param_name" => "package_unit",
				"description" => __("Enter the price unit for this package. e.g. per month", "kraftives"),
			),
			array(
				"type" => "exploded_textarea",
				"heading" => __("Features list seperated in lines", "kraftives"),
				"param_name" => "package_content",
				"description" => __("For every new feature write text on new line", "kraftives"),
				"value" => "10 Custom Logo Concepts\nUnlimited Revision Rounds\nEnvelope Concept\nLetterhead Concept\n100% satisfaction"
			),
			array(
				"type" => "vc_link",
				"heading" => __("Button Link", "kraftives"),
				"param_name" => "package_link",
				"description" => __("Select / enter the link for call to action button", "kraftives"),
			),
			array(
				"type" => "checkbox",
				//"heading" => __("Featured", "kraftives"),
				"param_name" => "package_featured",
				"value" => array(__("Make this pricing box as featured", "kraftives") => "favourite_pricing"),
			),
			array(
				"type" => "textfield",
				"heading" => __("Extra Class", "kraftives"),
				"param_name" => "el_class",
				"description" => __("Extra Class name", "kraftives"),
			)
		)// params
));// vc_map

/*--------------------------------------------------------------------------------
|				KraftiveComments:  Quotes / Element Map				|						
--------------------------------------------------------------------------------*/

		vc_map(
			array(
			   "name" => __("Folio Quotes", 'kraftives'),
			   "base" => "folio_quote",
			   "class" => "icon_folio_quote",
			   "icon" => "icon_folio_quote",
			   "weight" => 83,
			   "category" => __("Folio Zee Modules",'kraftives'),
			   "description" => __("Folio zee Block Quotes.","kraftives"),
			   "params" => array(
					array(
						"type" => "dropdown",
						"heading" => __("Style", "kraftives"),
						"param_name" => "style",
						"admin_label" => true,
						"value" => array(
										__('Style 1', 'kraftives') => 'quote_1',
										__('Style 2', 'kraftives') => 'quote_2',
										__('Style 3', 'kraftives') => 'quote_3',
										__('Style 4', 'kraftives') => 'quote_4',
										__('Style 5', 'kraftives') => 'quote_5'
										),
						"description" => __("Select Style of Quote", "kraftives"),
					),
					array(
						"type" => "textarea",
						"class" => "",
						"heading" => __("Quote Content", "kraftives"),
						"param_name" => "qoute_content",
						"value" => "",
						"description" => __("Enter the content of quote", "kraftives"),
					),
					array(
						"type" => "textfield",
						"class" => "",
						"heading" => __("Author Name", "kraftives"),
						"param_name" => "author",
						"value" => "",
						"description" => __("Enter the name of author", "kraftives"),
					),
					array(
						"type" => "textfield",
						"class" => "",
						"heading" => __("Extra Class", "kraftives"),
						"param_name" => "el_class",
						"value" => "",
						"description" => __("Extra Class name", "kraftives"),
					)
				)// params
		));// vc_map

/*--------------------------------------------------------------------------------
|				KraftiveComments:  Alerts / Element Map				|						
--------------------------------------------------------------------------------*/

	vc_map(
	array(
	   "name" => __("Folio Alerts", "kraftives"),
	   "base" => "folio_alert",
	   "class" => "icon_folio_alert",
	   "icon" => "icon_folio_alert",
	   "weight" => 87,
	   "category" => __("Folio Zee Modules",'kraftives'),
	   "description" => __("Folio zee Alerts.","kraftives"),
	   "params" => array(
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Alert Type", "kraftives"),
				"param_name" => "style",
				"admin_label" => true,
				"value" => array(
								__('White Alert',"kraftives") => 'white',
								__('Grey Alert',"kraftives") => 'grey',
								__('Red Alert',"kraftives") => 'red',
								__('Yellow Alert',"kraftives") => 'yellow',
								__('Green Alert',"kraftives") => 'green',
								__('Blue Alert',"kraftives") => 'blue'
								),
				"description" => __("Select alert type", "kraftives"),
			),
			array(
				"type" => "textarea",
				"class" => "",
				"heading" => __("Alert Text", "kraftives"),
				"param_name" => "alert_message",
				"value" => "",
				"description" => __("Write alert text here", "kraftives"),
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Extra Class", "kraftives"),
				"param_name" => "el_class",
				"value" => "",
				"description" => __("Extra Class name", "kraftives"),
			)
		)// params
));// vc_map

/*--------------------------------------------------------------------------------
|				KraftiveComments:  Spacer / Element Map				|						
--------------------------------------------------------------------------------*/

	vc_map(
	array(
	   "name" => __("Folio Spacer / Gap", 'kraftives'),
	   "base" => "folio_spacer",
	   "class" => "folio_spacer",
	   "icon" => "folio_spacer",
	   "weight" => 81,
	   "category" => __("Folio Zee Modules",'kraftives'),
	   "description" => __("Adjust space between components.","kraftives"),
	   "params" => array(
			array(
				"type" => "number",
				"class" => "",
				"heading" => __("Spacer Height", "kraftives"),
				"param_name" => "height",
				"admin_label" => true,
				"value" => 10,
				"min" => 1,
				"max" => 500,
				"suffix" => "px",
				"description" => __("Enter value in pixels", "kraftives"),
			),
		)
	)
	);

/*--------------------------------------------------------------------------------
|				KraftiveComments:  Animator / Element Map				|						
--------------------------------------------------------------------------------*/
	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_Folio_Animator extends WPBakeryShortCodesContainer {
		}
	}

	vc_map( array(
		"name" => __("Folio Animator", "kraftives"),
		"base" => "folio_animator",
		"as_parent" => array('except ' => 'member,testmonial'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
		"content_element" => true,
		"weight" => 86,
		"category" => __("Folio Zee Modules",'kraftives'),
		"icon"	=>	"icon_folio_animator",
		"class" => "icon_folio_animator",
		"description"	=>	__("Animation Block","folio_fox"),
		"show_settings_on_create" => true,
		"params" => array(
			array(
				"type" => "textfield",
				"heading" => __("Animation Delay", "kraftives"),
				"param_name" => "animation_delay",
				"description" => __("Animation Delay time in seconds i.e: 0.2.", "kraftives")
			),
			array(
				"type" => "textfield",
				"heading" => __("Animation Speed", "kraftives"),
				"param_name" => "animation_speed",
				"description" => __("Animation speed time in seconds i.e: 1.0", "kraftives")
			),
		array(
			"type" => "dropdown",
			"param_name" => "animation_repeat",
			"heading" => __("Animation Repeat", "kraftives"),
            "value" => array( "No" => 0, "Yes" => 1),
			"description" => __("Repeat the animation everytime the element appear on screen.", "kraftives"),
		),

		array(
			"type" => "dropdown",
			"param_name" => "animation_type",
			"heading" => __("Select Animation Effect", "kraftives"),
            "value" => folio_animations(),
			"description" => __("Choose animation effect from the drop down list.", "kraftives"),
		),
		array(
			"type" => "textfield",
			"heading" => __("Extra class name", "kraftives"),
			"param_name" => "el_class",
			"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "kraftives")
		),
			

		),
		"js_view" => 'VcColumnView'
	) );
/*--------------------------------------------------------------------------------
|				KraftiveComments:  Blog / Element Map				|						
--------------------------------------------------------------------------------*/
	
	vc_map( array(
   "name" => __("Folio Blog Listing", "kraftives"),
   "icon" => "icon_folio_blog",
   "base" => "folio-blog-grid",
   "weight" => 92,
   "description" => __("Blog posts listing: 1-Column module", "kraftives"),
   "class" => "icon_folio_blog",
   "category" => __("Folio Zee Modules", "kraftives"),
   "params" => array( 
      array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Number of Blog Posts to Display. Use '-1' to include all your items.", "kraftives"),
         "param_name" => "number",
         "value" => 10,
         "description" => __("Set how many blog items would you like to include in the grid.", "kraftives")
      ),
	array(
			"type" => "dropdown",
			"param_name" => "columns_count",
			"heading" => __("Columns Count", "kraftives"),
            "value" => array( "Two Columns" => "hm_2_col", "Three Columns" => "hm_3_col"),
			"description" => __("Select columns count.", "kraftives"),
		),
    array(
      "type" => "checkbox",
      "heading" => __("Select Categories", "kraftives"),
      "param_name" => "categories",
      "value" => folio_categories(),
	  "description" => __("Select from which categories to display blog posts(mandatory).", "kraftives")	  
    ),
	
   )) );


/*--------------------------------------------------------------------------------
|				KraftiveComments:  Headers / Element Map				|						
--------------------------------------------------------------------------------*/

	vc_map(
	array(
	   "name" => __("Folio Headers (Sliders)", 'kraftives'),
	   "base" => "folio_header",
	   "class" => "folio_sliders",
	   "weight" => 101,
	   "icon" => "folio_sliders",
	   "category" => __("Folio Zee Modules",'kraftives'),
	   "description" => __("Headers Section.","kraftives"),
	   "params" => array(
			
		array(
				"type" => "attach_image",
				"heading" => __( "Header Logo", "kraftives" ),
				"param_name" => "header_logo",
				"description" => __( "Upload header logo to show on header", "kraftives" ),
				"group" => __( "General Settings", "kraftives" )
		  ),

		array(
			"type" => "number",
			"param_name" => "margin_top_header_logo",
			"heading" => __("Margin-Top Value for Headers Logo", "kraftives"),
			"group" => __( "General Settings", "kraftives" ),
			"description" => __("You can adjust the logo position in header by setting a top-margin to it.", "kraftives"),
			"value" => 0,
			"min" => 0,
			"max" => 500,
			"suffix" => "px",
		),

		array(
			"type" => "checkbox",
			"heading" => __( "Show Menu on Header", "kraftives" ),
			"param_name" => "show_menu",
			"description" => __( "Select checkbox to active menu on header.", "kraftives" ),
			"value" => array( __( "Show", "kraftives" ) => "yes" ),
			"group" => __( "General Settings", "kraftives" )
		),

		array(
			"type" => "dropdown",
			"param_name" => "menu_style",
			"heading" => __("Select Menu Style", "kraftives"),
            "value" => array("Slide Bar" => "style_1", "Style 2" => 'header-menu-1', "Style 3" => 'header-menu-2'),
			"description" => __("Choose  menu style to show on header.", "kraftives"),
			"dependency" => array(
				"element" => "show_menu",
				"value" => array( "yes" )
			),
			"group" => __( "General Settings", "kraftives" )     

		),

		array(
			"type" => "checkbox",
			"heading" => __( "Show Next section scroll Icon", "kraftives" ),
			"param_name" => "show_next_icon",
			"description" => __( "Select checkbox to active next section icon.", "kraftives" ),
			"value" => array( __( "Show", "kraftives" ) => "yes" ),
			"group" => __( "General Settings", "kraftives" )
		),

		array(
			"type" => "dropdown",
			"heading" => __( "Arrow Position", "kraftives" ),
			"param_name" => "arrow_position",
			"description" => __( "Select arrow position default: Center.", "kraftives" ),
			"value" => array( 
							__( "Center", "kraftives" ) => "center" ,
							__( "Left", "kraftives" ) => "left" ,
							__( "Right", "kraftives" ) => "right" 
						),
			"dependency" => array(
			"element" => "show_next_icon",
			"value" => array( "yes" )
			),
			"group" => __( "General Settings", "kraftives" )     
		),
		
		array(
			"type" => "checkbox",
			"heading" => __( "Apply Animation", "kraftives" ),
			"param_name" => "next_icon_animation",
			"description" => __( "Select checkbox to active anomation to next section icon.", "kraftives" ),
			"value" => array( __( "Show", "kraftives" ) => "yes" ),
			"dependency" => array(
			"element" => "show_next_icon",
			"value" => array( "yes" )
			),
			"group" => __( "General Settings", "kraftives" )     
		),

array(
				"type" => "checkbox",
				"heading" => __("Is Curve", "kraftives"),
				"param_name" => "is_curve_header",
				"value" => array(__( "Is Curve", "kraftives" ) => "yes"),
				"description" => __("Check this for actgivating curved carousel <strong>Note: </strong> This will only add <strong>Bottom Curve</strong>. ", "kraftives"),
				"group" => __( "General Settings", "kraftives" ) 
			),
			array( // top_curve_color_type
					'type' => 'dropdown',
					'heading' => __( 'Curve color', 'kraftives' ),
					'param_name' => 'curve_color',
					'value' => array(
									  __( 'Theme major color', 'kraftives' ) => '',
									  __( 'Grey color', 'kraftives' ) => 'bottom_c_grey',
								),
					'description' => __( 'Select Top curve color type between theme major color or grey curve', 'kraftives' ),
					'dependency' => array(
						'element' => 'is_curve_header',
						'value' => array('yes')
					),
					'group' => __( 'General Settings', 'kraftives' ) 
			  ),

			array( 
						'type' => 'dropdown',
						'heading' => __( 'Bottom Curve background color', 'kraftives' ),
						'param_name' => 'curve_bg_color',
						'value' => array(
										  __( 'Default background Color', 'kraftives' ) => '',
										  __( 'Grey backround color', 'kraftives' ) => 'bottom_grey',
									),
						'description' => __( 'Select Bottom curve Background color type between default white color or grey ', 'kraftives' ),
						'dependency' => array(
							'element' => 'is_curve_header',
							'value' => array( 'yes' )
						),
						'group' => __( 'General Settings', 'kraftives' ) 
				  ),

		array(
			"type" => "dropdown",
			"param_name" => "slider",
			"heading" => __("Choose  Header(Slider) to show", "kraftives"),
            "value" => folio_get_sliders_list(),
			"description" => __("Choose header / slider  from the drop down list.", "kraftives"),
			"group" => __( "Header Settings", "kraftives" )
		),



// Headers Setting Starts here


		array(
				"type" => "attach_image",
				"heading" => __( "Header Background Image", "kraftives" ),
				"param_name" => "bg_image",
				"description" => __( "Background image of the slider, upload image of 1920x770 dimension for best results
", "kraftives" ),
			"dependency" => array(
				"element" => "slider",
				"value" => array("static_banner")
			),
			"group" => __( "Header Settings", "kraftives" )     
		  ),
		array(
			"type" => "dropdown",
			"param_name" => "heading_style",
			"heading" => __("Heading Style", "kraftives"),
			"value" => array(
						"Style 1" => "style_1",
						"Style 2" => "style_2",
						"Style 3"   => "style_3",
					),
			"description" => __("Choose heading style.", "kraftives"),
			"dependency" => array(
				"element" => "slider",
				"value" => array("static_banner")
			),
			"group" => __( "Header Settings", "kraftives" ) 
		),

		array(
			 "type" => "textfield",
			 "class" => "",
			 "admin_label" => true,
			 "heading" => __("Main Heading", "kraftives"),
			 "param_name" => "title",
			 "value" => '',
			 "description" => __("Main heading." .folio_pattren_description(), "kraftives"),
			"dependency" => array(
				"element" => "slider",
				"value" => array("static_banner")
			),
			"group" => __( "Header Settings", "kraftives" )     
		  ),
		array(
			 "type" => "textfield",
			 "class" => "",
			 "admin_label" => true,
			 "heading" => __("Sub Heading", "kraftives"),
			 "param_name" => "sub_title",
			 "value" => '',
			 "description" => __("Sub heading for header." .folio_pattren_description(), "kraftives"),
			"dependency" => array(
				"element" => "slider",
				"value" => array("static_banner")
			),
			"group" => __( "Header Settings", "kraftives" )     
		  ),

//Revloution Slider Starts 

		array(
			"type" => "dropdown",
			"heading" => __( "Revolution Slider", "kraftives" ),
			"param_name" => "rev_slider",
			"admin_label" => true,
			"value" => folio_rev_sliders(),
			"description" => __( "Select your Revolution Slider.", "kraftives" ),
			"dependency" => array(
			"element" => "slider",
			"value" => array( "revSlider" )
			),
			"group" => __( "Header Settings", "kraftives" )     

		),

		)
	)
	);
/*--------------------------------------------------------------------------------
|				KraftiveComments:  Team Post Type  / Element Map				|						
--------------------------------------------------------------------------------*/
	vc_map(
	array(
	   "name" => __("Folio Team", 'kraftives'),
	   "base" => "folio_team_post",
	   "class" => "icon_folio_team",
	   "icon" => "icon_folio_team",
	   "weight" => 81,
	   "category" => __("Folio Zee Modules",'kraftives'),
	   "description" => __("Adjust space between components.","kraftives"),
	   "params" => array(
		array(
			 "type" => "number",
			 "heading" => __("Number of Team Members to Display", "kraftives"),
			 "param_name" => "display_members",
			 "value" => 6,
			 "description" => __("Number of team members to Display. Use '-1' to include all team members.", "kraftives")
      	),
		array(
				"type" => "checkbox",
				"heading" => __("Display Selected", "kraftives"),
				"param_name" => "display_selected",
				"admin_label" => true,
				"value" => folio_get_posts_array( 'folio_team', 'image' ),
				"description" => __("Show / hide next / prev botton.", "kraftives"),
			),
		
		array(
				"type" => "dropdown",
				"heading" => __("Show Next / Prev Buttons", "kraftives"),
				"param_name" => "show_next_prev",
				"admin_label" => true,
				"value" => array(
								__('True', 'kraftives') => 'true',
								__('False', 'kraftives') => 'false'
								),
				"description" => __("Show / hide next / prev botton.", "kraftives"),
			),
		)
	)
	);