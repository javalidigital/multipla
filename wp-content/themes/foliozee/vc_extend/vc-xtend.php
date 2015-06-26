<?php
###################################################################################
##				KraftiveComments:  Disbale VC front-end editor	 	 ##										
#####################################################################################
	if(function_exists('vc_disable_frontend')){
		vc_disable_frontend();
	}
	vc_set_as_theme( true );	
	//disable auto updates
	vc_is_updater_disabled();


###################################################################################
##				KraftiveComments:  Remove Custom tesaser from page layout	 	 ##										
#####################################################################################

	if ( is_admin() ) {
		if ( ! function_exists('folio_remove_vc_custom_teaser') ) {
			function folio_remove_vc_custom_teaser(){
				$post_types = get_post_types( '', 'names' ); 
				foreach ( $post_types as $post_type ) {
					remove_meta_box('vc_teaser',  $post_type, 'side');
				}
			} 
		} 
	add_action('do_meta_boxes', 'folio_remove_vc_custom_teaser');
	}

###################################################################################
##				KraftiveComments:  Remove unnecessory elemnts	 	     		##										
#####################################################################################
if( function_exists( "vc_remove_element" ) ){
	vc_remove_element("vc_posts_grid");
	vc_remove_element("vc_posts_slider");
	vc_remove_element("vc_pie");
	vc_remove_element("vc_wp_search");
	vc_remove_element("vc_wp_meta");
	vc_remove_element("vc_wp_archives");
	vc_remove_element("vc_wp_recentcomments");
	vc_remove_element("vc_wp_calendar");
	vc_remove_element("vc_wp_pages");
	vc_remove_element("vc_wp_tagcloud");
	vc_remove_element("vc_wp_custommenu");
	vc_remove_element("vc_wp_text");
	vc_remove_element("vc_wp_posts");
	vc_remove_element("vc_wp_links");
	vc_remove_element("vc_wp_rss");
	vc_remove_element("vc_wp_categories");
	vc_remove_element("vc_carousel");
	vc_remove_element("vc_gmaps");
}



/*###################################################################################
/##				KraftiveComments:  Custom Functions							   		   ##/										
#####################################################################################*/


	//getting post name and ids for slider module fields  
	function folio_rev_sliders(){
		if ( is_plugin_active( 'revslider/revslider.php' ) ) {
			global $wpdb;
			$rs = $wpdb->get_results(
				"
				  SELECT id, title, alias
				  FROM " . $wpdb->prefix . "revslider_sliders
				  ORDER BY id ASC LIMIT 999
				  "
				);
			$revsliders = array();
			if ( $rs ) {
				foreach ( $rs as $slider ) {
					$revsliders[$slider->title] = $slider->alias;
				}
			} 
		}
		else {
			$revsliders[__( 'No sliders found', 'kraftives' )] = 0;
		}
			return $revsliders;
	}
	function folio_get_posts_array( $post_type = '', $get_by = 'image' ){
		 $posts = '';
		 $qry = new WP_Query( array( 'post_type' => $post_type, 'posts_per_page' => -1 ) );
		 if( $qry->have_posts() ){
			while( $qry->have_posts() ){
				$qry->the_post();
				if( $get_by == 'id' )
					$posts[get_the_ID()] = get_the_title();
				elseif( $get_by == 'image' ){
					$posts[' <img src="'.aq_resize(folio_get_featured_image( get_the_id()), 32, 32, true ).'" alt="" title="'.get_the_title().'" />'] = get_the_ID();
				}
			}
		}
		return $posts;
	}

	function folio_portfolio_array(){
		$portfolio_categs = get_terms('project_categories', array('hide_empty' => false));
		$portfolio_cats_array = array();
		$dt_placebo = array('No Thanks!' => NULL);
		$term_vals = array();
			foreach($portfolio_categs as $portfolio_categ) {
			  $term_vals[$portfolio_categ->name] = folio_get_taxonomy_cat_ID($portfolio_categ->name);
				$portfolio_cats_array[$portfolio_categ->name] = $portfolio_categ->name;
			}
		return $portfolio_cats_array;
	}


//get All Sliders List
function folio_get_sliders_list(){
	$list = array();
	
	$list = array(
			__('Static Banner', 'kraftives')	  		=> 'static_banner',
			__('Revolution Slider', 'kraftives')  		=> 'revSlider',
	);

	return $list;	
}

//Generating list of font awesome icnos
	if(!function_exists('folio_icons')) {
		function folio_icons(){
			 $fa_icons = array( "No Icon" => "",
			 					"Adjust" => "fa-adjust",
								"Adn" => "fa-adn",
								"Align center" => "fa-align-center",
								"Align justify" => "fa-align-justify",
								"Align left" => "fa-align-left",
								"Align right" => "fa-align-right",
								"Ambulance" => "fa-ambulance",
								"Anchor" => "fa-anchor",
								"Android" => "fa-android",
								"Angellist" => "fa-angellist",
								"Angle double down" => "fa-angle-double-down",
								"Angle double left" => "fa-angle-double-left",
								"Angle double right" => "fa-angle-double-right",
								"Angle double up" => "fa-angle-double-up",
								"Angle down" => "fa-angle-down",
								"Angle left" => "fa-angle-left",
								"Angle right" => "fa-angle-right",
								"Angle up" => "fa-angle-up",
								"Apple" => "fa-apple",
								"Archive" => "fa-archive",
								"Area chart" => "fa-area-chart",
								"Arrow circle down" => "fa-arrow-circle-down",
								"Arrow circle left" => "fa-arrow-circle-left",
								"Arrow circle o down" => "fa-arrow-circle-o-down",
								"Arrow circle o left" => "fa-arrow-circle-o-left",
								"Arrow circle o right" => "fa-arrow-circle-o-right",
								"Arrow circle o up" => "fa-arrow-circle-o-up",
								"Arrow circle right" => "fa-arrow-circle-right",
								"Arrow circle up" => "fa-arrow-circle-up",
								"Arrow down" => "fa-arrow-down",
								"Arrow left" => "fa-arrow-left",
								"Arrow right" => "fa-arrow-right",
								"Arrow up" => "fa-arrow-up",
								"Arrows" => "fa-arrows",
								"Arrows alt" => "fa-arrows-alt",
								"Arrows h" => "fa-arrows-h",
								"Arrows v" => "fa-arrows-v",
								"Asterisk" => "fa-asterisk",
								"At" => "fa-at",
								"Backward" => "fa-backward",
								"Ban" => "fa-ban",
								"Bar chart" => "fa-bar-chart",
								"Barcode" => "fa-barcode",
								"Bars" => "fa-bars",
								"Beer" => "fa-beer",
								"Behance" => "fa-behance",
								"Behance square" => "fa-behance-square",
								"Bell" => "fa-bell",
								"Bell o" => "fa-bell-o",
								"Bell slash" => "fa-bell-slash",
								"Bell slash o" => "fa-bell-slash-o",
								"Bicycle" => "fa-bicycle",
								"Binoculars" => "fa-binoculars",
								"Birthday cake" => "fa-birthday-cake",
								"Bitbucket" => "fa-bitbucket",
								"Bitbucket square" => "fa-bitbucket-square",
								"Bold" => "fa-bold",
								"Bolt" => "fa-bolt",
								"Bomb" => "fa-bomb",
								"Book" => "fa-book",
								"Bookmark" => "fa-bookmark",
								"Bookmark o" => "fa-bookmark-o",
								"Briefcase" => "fa-briefcase",
								"Btc" => "fa-btc",
								"Bug" => "fa-bug",
								"Building" => "fa-building",
								"Building o" => "fa-building-o",
								"Bullhorn" => "fa-bullhorn",
								"Bullseye" => "fa-bullseye",
								"Bus" => "fa-bus",
								"Calculator" => "fa-calculator",
								"Calendar" => "fa-calendar",
								"Calendar o" => "fa-calendar-o",
								"Camera" => "fa-camera",
								"Camera retro" => "fa-camera-retro",
								"Car" => "fa-car",
								"Caret down" => "fa-caret-down",
								"Caret left" => "fa-caret-left",
								"Caret right" => "fa-caret-right",
								"Caret square o down" => "fa-caret-square-o-down",
								"Caret square o left" => "fa-caret-square-o-left",
								"Caret square o right" => "fa-caret-square-o-right",
								"Caret square o up" => "fa-caret-square-o-up",
								"Caret up" => "fa-caret-up",
								"Cc" => "fa-cc",
								"Cc amex" => "fa-cc-amex",
								"Cc discover" => "fa-cc-discover",
								"Cc mastercard" => "fa-cc-mastercard",
								"Cc paypal" => "fa-cc-paypal",
								"Cc stripe" => "fa-cc-stripe",
								"Cc visa" => "fa-cc-visa",
								"Certificate" => "fa-certificate",
								"Chain broken" => "fa-chain-broken",
								"Check" => "fa-check",
								"Check circle" => "fa-check-circle",
								"Check circle o" => "fa-check-circle-o",
								"Check square" => "fa-check-square",
								"Check square o" => "fa-check-square-o",
								"Chevron circle down" => "fa-chevron-circle-down",
								"Chevron circle left" => "fa-chevron-circle-left",
								"Chevron circle right" => "fa-chevron-circle-right",
								"Chevron circle up" => "fa-chevron-circle-up",
								"Chevron down" => "fa-chevron-down",
								"Chevron left" => "fa-chevron-left",
								"Chevron right" => "fa-chevron-right",
								"Chevron up" => "fa-chevron-up",
								"Child" => "fa-child",
								"Circle" => "fa-circle",
								"Circle o" => "fa-circle-o",
								"Circle o notch" => "fa-circle-o-notch",
								"Circle thin" => "fa-circle-thin",
								"Clipboard" => "fa-clipboard",
								"Clock o" => "fa-clock-o",
								"Cloud" => "fa-cloud",
								"Cloud download" => "fa-cloud-download",
								"Cloud upload" => "fa-cloud-upload",
								"Code" => "fa-code",
								"Code fork" => "fa-code-fork",
								"Codepen" => "fa-codepen",
								"Coffee" => "fa-coffee",
								"Cog" => "fa-cog",
								"Cogs" => "fa-cogs",
								"Columns" => "fa-columns",
								"Comment" => "fa-comment",
								"Comment o" => "fa-comment-o",
								"Comments" => "fa-comments",
								"Comments o" => "fa-comments-o",
								"Compass" => "fa-compass",
								"Compress" => "fa-compress",
								"Copyright" => "fa-copyright",
								"Credit card" => "fa-credit-card",
								"Crop" => "fa-crop",
								"Crosshairs" => "fa-crosshairs",
								"Css3" => "fa-css3",
								"Cube" => "fa-cube",
								"Cubes" => "fa-cubes",
								"Cutlery" => "fa-cutlery",
								"Database" => "fa-database",
								"Delicious" => "fa-delicious",
								"Desktop" => "fa-desktop",
								"Deviantart" => "fa-deviantart",
								"Digg" => "fa-digg",
								"Dot circle o" => "fa-dot-circle-o",
								"Download" => "fa-download",
								"Dribbble" => "fa-dribbble",
								"Dropbox" => "fa-dropbox",
								"Drupal" => "fa-drupal",
								"Eject" => "fa-eject",
								"Ellipsis h" => "fa-ellipsis-h",
								"Ellipsis v" => "fa-ellipsis-v",
								"Empire" => "fa-empire",
								"Envelope" => "fa-envelope",
								"Envelope o" => "fa-envelope-o",
								"Envelope square" => "fa-envelope-square",
								"Eraser" => "fa-eraser",
								"Eur" => "fa-eur",
								"Exchange" => "fa-exchange",
								"Exclamation" => "fa-exclamation",
								"Exclamation circle" => "fa-exclamation-circle",
								"Exclamation triangle" => "fa-exclamation-triangle",
								"Expand" => "fa-expand",
								"External link" => "fa-external-link",
								"External link square" => "fa-external-link-square",
								"Eye" => "fa-eye",
								"Eye slash" => "fa-eye-slash",
								"Eyedropper" => "fa-eyedropper",
								"Facebook" => "fa-facebook",
								"Facebook square" => "fa-facebook-square",
								"Fast backward" => "fa-fast-backward",
								"Fast forward" => "fa-fast-forward",
								"Fax" => "fa-fax",
								"Female" => "fa-female",
								"Fighter jet" => "fa-fighter-jet",
								"File" => "fa-file",
								"File archive o" => "fa-file-archive-o",
								"File audio o" => "fa-file-audio-o",
								"File code o" => "fa-file-code-o",
								"File excel o" => "fa-file-excel-o",
								"File image o" => "fa-file-image-o",
								"File o" => "fa-file-o",
								"File pdf o" => "fa-file-pdf-o",
								"File powerpoint o" => "fa-file-powerpoint-o",
								"File text" => "fa-file-text",
								"File text o" => "fa-file-text-o",
								"File video o" => "fa-file-video-o",
								"File word o" => "fa-file-word-o",
								"Files o" => "fa-files-o",
								"Film" => "fa-film",
								"Filter" => "fa-filter",
								"Fire" => "fa-fire",
								"Fire extinguisher" => "fa-fire-extinguisher",
								"Flag" => "fa-flag",
								"Flag checkered" => "fa-flag-checkered",
								"Flag o" => "fa-flag-o",
								"Flask" => "fa-flask",
								"Flickr" => "fa-flickr",
								"Floppy o" => "fa-floppy-o",
								"Folder" => "fa-folder",
								"Folder o" => "fa-folder-o",
								"Folder open" => "fa-folder-open",
								"Folder open o" => "fa-folder-open-o",
								"Font" => "fa-font",
								"Forward" => "fa-forward",
								"Foursquare" => "fa-foursquare",
								"Frown o" => "fa-frown-o",
								"Futbol o" => "fa-futbol-o",
								"Gamepad" => "fa-gamepad",
								"Gavel" => "fa-gavel",
								"Gbp" => "fa-gbp",
								"Gift" => "fa-gift",
								"Git" => "fa-git",
								"Git square" => "fa-git-square",
								"Github" => "fa-github",
								"Github alt" => "fa-github-alt",
								"Github square" => "fa-github-square",
								"Gittip" => "fa-gittip",
								"Glass" => "fa-glass",
								"Globe" => "fa-globe",
								"Google" => "fa-google",
								"Google plus" => "fa-google-plus",
								"Google plus square" => "fa-google-plus-square",
								"Google wallet" => "fa-google-wallet",
								"Graduation cap" => "fa-graduation-cap",
								"H square" => "fa-h-square",
								"Hacker news" => "fa-hacker-news",
								"Hand o down" => "fa-hand-o-down",
								"Hand o left" => "fa-hand-o-left",
								"Hand o right" => "fa-hand-o-right",
								"Hand o up" => "fa-hand-o-up",
								"Hdd o" => "fa-hdd-o",
								"Header" => "fa-header",
								"Headphones" => "fa-headphones",
								"Heart" => "fa-heart",
								"Heart o" => "fa-heart-o",
								"History" => "fa-history",
								"Home" => "fa-home",
								"Hospital o" => "fa-hospital-o",
								"Html5" => "fa-html5",
								"Ils" => "fa-ils",
								"Inbox" => "fa-inbox",
								"Indent" => "fa-indent",
								"Info" => "fa-info",
								"Info circle" => "fa-info-circle",
								"Inr" => "fa-inr",
								"Instagram" => "fa-instagram",
								"Ioxhost" => "fa-ioxhost",
								"Italic" => "fa-italic",
								"Joomla" => "fa-joomla",
								"Jpy" => "fa-jpy",
								"Jsfiddle" => "fa-jsfiddle",
								"Key" => "fa-key",
								"Keyboard o" => "fa-keyboard-o",
								"Krw" => "fa-krw",
								"Language" => "fa-language",
								"Laptop" => "fa-laptop",
								"Lastfm" => "fa-lastfm",
								"Lastfm square" => "fa-lastfm-square",
								"Leaf" => "fa-leaf",
								"Lemon o" => "fa-lemon-o",
								"Level down" => "fa-level-down",
								"Level up" => "fa-level-up",
								"Life ring" => "fa-life-ring",
								"Lightbulb o" => "fa-lightbulb-o",
								"Line chart" => "fa-line-chart",
								"Link" => "fa-link",
								"Linkedin" => "fa-linkedin",
								"Linkedin square" => "fa-linkedin-square",
								"Linux" => "fa-linux",
								"List" => "fa-list",
								"List alt" => "fa-list-alt",
								"List ol" => "fa-list-ol",
								"List ul" => "fa-list-ul",
								"Location arrow" => "fa-location-arrow",
								"Lock" => "fa-lock",
								"Long arrow down" => "fa-long-arrow-down",
								"Long arrow left" => "fa-long-arrow-left",
								"Long arrow right" => "fa-long-arrow-right",
								"Long arrow up" => "fa-long-arrow-up",
								"Magic" => "fa-magic",
								"Magnet" => "fa-magnet",
								"Male" => "fa-male",
								"Map marker" => "fa-map-marker",
								"Maxcdn" => "fa-maxcdn",
								"Meanpath" => "fa-meanpath",
								"Medkit" => "fa-medkit",
								"Meh o" => "fa-meh-o",
								"Microphone" => "fa-microphone",
								"Microphone slash" => "fa-microphone-slash",
								"Minus" => "fa-minus",
								"Minus circle" => "fa-minus-circle",
								"Minus square" => "fa-minus-square",
								"Minus square o" => "fa-minus-square-o",
								"Mobile" => "fa-mobile",
								"Money" => "fa-money",
								"Moon o" => "fa-moon-o",
								"Music" => "fa-music",
								"Newspaper o" => "fa-newspaper-o",
								"Openid" => "fa-openid",
								"Outdent" => "fa-outdent",
								"Pagelines" => "fa-pagelines",
								"Paint brush" => "fa-paint-brush",
								"Paper plane" => "fa-paper-plane",
								"Paper plane o" => "fa-paper-plane-o",
								"Paperclip" => "fa-paperclip",
								"Paragraph" => "fa-paragraph",
								"Pause" => "fa-pause",
								"Paw" => "fa-paw",
								"Paypal" => "fa-paypal",
								"Pencil" => "fa-pencil",
								"Pencil square" => "fa-pencil-square",
								"Pencil square o" => "fa-pencil-square-o",
								"Phone" => "fa-phone",
								"Phone square" => "fa-phone-square",
								"Picture o" => "fa-picture-o",
								"Pie chart" => "fa-pie-chart",
								"Pied piper" => "fa-pied-piper",
								"Pied piper alt" => "fa-pied-piper-alt",
								"Pinterest" => "fa-pinterest",
								"Pinterest square" => "fa-pinterest-square",
								"Plane" => "fa-plane",
								"Play" => "fa-play",
								"Play circle" => "fa-play-circle",
								"Play circle o" => "fa-play-circle-o",
								"Plug" => "fa-plug",
								"Plus" => "fa-plus",
								"Plus circle" => "fa-plus-circle",
								"Plus square" => "fa-plus-square",
								"Plus square o" => "fa-plus-square-o",
								"Power off" => "fa-power-off",
								"Print" => "fa-print",
								"Puzzle piece" => "fa-puzzle-piece",
								"Qq" => "fa-qq",
								"Qrcode" => "fa-qrcode",
								"Question" => "fa-question",
								"Question circle" => "fa-question-circle",
								"Quote left" => "fa-quote-left",
								"Quote right" => "fa-quote-right",
								"Random" => "fa-random",
								"Rebel" => "fa-rebel",
								"Recycle" => "fa-recycle",
								"Reddit" => "fa-reddit",
								"Reddit square" => "fa-reddit-square",
								"Refresh" => "fa-refresh",
								"Renren" => "fa-renren",
								"Repeat" => "fa-repeat",
								"Reply" => "fa-reply",
								"Reply all" => "fa-reply-all",
								"Retweet" => "fa-retweet",
								"Road" => "fa-road",
								"Rocket" => "fa-rocket",
								"Rss" => "fa-rss",
								"Rss square" => "fa-rss-square",
								"Rub" => "fa-rub",
								"Scissors" => "fa-scissors",
								"Search" => "fa-search",
								"Search minus" => "fa-search-minus",
								"Search plus" => "fa-search-plus",
								"Share" => "fa-share",
								"Share alt" => "fa-share-alt",
								"Share alt square" => "fa-share-alt-square",
								"Share square" => "fa-share-square",
								"Share square o" => "fa-share-square-o",
								"Shield" => "fa-shield",
								"Shopping cart" => "fa-shopping-cart",
								"Sign in" => "fa-sign-in",
								"Sign out" => "fa-sign-out",
								"Signal" => "fa-signal",
								"Sitemap" => "fa-sitemap",
								"Skype" => "fa-skype",
								"Slack" => "fa-slack",
								"Sliders" => "fa-sliders",
								"Slideshare" => "fa-slideshare",
								"Smile o" => "fa-smile-o",
								"Sort" => "fa-sort",
								"Sort alpha asc" => "fa-sort-alpha-asc",
								"Sort alpha desc" => "fa-sort-alpha-desc",
								"Sort amount asc" => "fa-sort-amount-asc",
								"Sort amount desc" => "fa-sort-amount-desc",
								"Sort asc" => "fa-sort-asc",
								"Sort desc" => "fa-sort-desc",
								"Sort numeric asc" => "fa-sort-numeric-asc",
								"Sort numeric desc" => "fa-sort-numeric-desc",
								"Soundcloud" => "fa-soundcloud",
								"Space shuttle" => "fa-space-shuttle",
								"Spinner" => "fa-spinner",
								"Spoon" => "fa-spoon",
								"Spotify" => "fa-spotify",
								"Square" => "fa-square",
								"Square o" => "fa-square-o",
								"Stack exchange" => "fa-stack-exchange",
								"Stack overflow" => "fa-stack-overflow",
								"Star" => "fa-star",
								"Star half" => "fa-star-half",
								"Star half o" => "fa-star-half-o",
								"Star o" => "fa-star-o",
								"Steam" => "fa-steam",
								"Steam square" => "fa-steam-square",
								"Step backward" => "fa-step-backward",
								"Step forward" => "fa-step-forward",
								"Stethoscope" => "fa-stethoscope",
								"Stop" => "fa-stop",
								"Strikethrough" => "fa-strikethrough",
								"Stumbleupon" => "fa-stumbleupon",
								"Stumbleupon circle" => "fa-stumbleupon-circle",
								"Subscript" => "fa-subscript",
								"Suitcase" => "fa-suitcase",
								"Sun o" => "fa-sun-o",
								"Superscript" => "fa-superscript",
								"Table" => "fa-table",
								"Tablet" => "fa-tablet",
								"Tachometer" => "fa-tachometer",
								"Tag" => "fa-tag",
								"Tags" => "fa-tags",
								"Tasks" => "fa-tasks",
								"Taxi" => "fa-taxi",
								"Tencent weibo" => "fa-tencent-weibo",
								"Terminal" => "fa-terminal",
								"Text height" => "fa-text-height",
								"Text width" => "fa-text-width",
								"Th" => "fa-th",
								"Th large" => "fa-th-large",
								"Th list" => "fa-th-list",
								"Thumb tack" => "fa-thumb-tack",
								"Thumbs down" => "fa-thumbs-down",
								"Thumbs o down" => "fa-thumbs-o-down",
								"Thumbs o up" => "fa-thumbs-o-up",
								"Thumbs up" => "fa-thumbs-up",
								"Ticket" => "fa-ticket",
								"Times" => "fa-times",
								"Times circle" => "fa-times-circle",
								"Times circle o" => "fa-times-circle-o",
								"Tint" => "fa-tint",
								"Toggle off" => "fa-toggle-off",
								"Toggle on" => "fa-toggle-on",
								"Trash" => "fa-trash",
								"Trash o" => "fa-trash-o",
								"Tree" => "fa-tree",
								"Trello" => "fa-trello",
								"Trophy" => "fa-trophy",
								"Truck" => "fa-truck",
								"Try" => "fa-try",
								"Tty" => "fa-tty",
								"Tumblr" => "fa-tumblr",
								"Tumblr square" => "fa-tumblr-square",
								"Twitch" => "fa-twitch",
								"Twitter" => "fa-twitter",
								"Twitter square" => "fa-twitter-square",
								"Umbrella" => "fa-umbrella",
								"Underline" => "fa-underline",
								"Undo" => "fa-undo",
								"University" => "fa-university",
								"Unlock" => "fa-unlock",
								"Unlock alt" => "fa-unlock-alt",
								"Upload" => "fa-upload",
								"Usd" => "fa-usd",
								"User" => "fa-user",
								"User md" => "fa-user-md",
								"Users" => "fa-users",
								"Video camera" => "fa-video-camera",
								"Vimeo square" => "fa-vimeo-square",
								"Vine" => "fa-vine",
								"Vk" => "fa-vk",
								"Volume down" => "fa-volume-down",
								"Volume off" => "fa-volume-off",
								"Volume up" => "fa-volume-up",
								"Weibo" => "fa-weibo",
								"Weixin" => "fa-weixin",
								"Wheelchair" => "fa-wheelchair",
								"Wifi" => "fa-wifi",
								"Windows" => "fa-windows",
								"Wordpress" => "fa-wordpress",
								"Wrench" => "fa-wrench",
								"Xing" => "fa-xing",
								"Xing square" => "fa-xing-square",
								"Yahoo" => "fa-yahoo",
								"Yelp" => "fa-yelp",
								"Youtube" => "fa-youtube",
								"Youtube play" => "fa-youtube-play",
								"Youtube square" => "fa-youtube-square"
);
			return $fa_icons;
		}
	}

//Generating list css3 animation
	if(!function_exists('folio_animations')) {
		function folio_animations(){
			$animations = array(
				__("No Animation","kraftives") => "",
				__("Swing","kraftives") => "swing",
				__("Pulse","kraftives") => "pulse",
				__("Fade In","kraftives") => "fadeIn",
				__("Fade In Up","kraftives") => "fadeInUp",
				__("Fade In Down","kraftives") => "fadeInDown",
				__("Fade In Left","kraftives") => "fadeInLeft",
				__("Fade In Right","kraftives") => "fadeInRight",
				__("Fade In Up Long","kraftives") => "fadeInUpBig",
				__("Fade In Down Long","kraftives") => "fadeInDownBig",
				__("Fade In Left Long","kraftives") => "fadeInLeftBig",
				__("Fade In Right Long","kraftives") => "fadeInRightBig",
				__("Slide In Down","kraftives") => "slideInDown",
				__("Slide In Left","kraftives") => "slideInLeft",
				__("Slide In Left","kraftives") => "slideInLeft",
				__("Bounce In","kraftives") => "bounceIn",
				__("Bounce In Up","kraftives") => "bounceInUp",
				__("Bounce In Down","kraftives") => "bounceInDown",
				__("Bounce In Left","kraftives") => "bounceInLeft",
				__("Bounce In Right","kraftives") => "bounceInRight",
				__("Rotate In","kraftives") => "rotateIn",
				__("Light Speed In","kraftives") => "lightSpeedIn",
				__("Roll In","kraftives") => "rollIn",
				);
			return $animations;
		}
	}


//Vc param description
	if(!function_exists('folio_pattren_description')) {
		function folio_pattren_description(){
			$description = __(" <br>To Hightlight text insert text between: <span class='highlight'>/highlight_start/</span> <strong>My Highlighted text</strong> <span class='highlight'>/highlight_end/</span>.<br> To break line <em>(e.g. /br/)</em> between <span class='highlight'>This line will break from here /br/ this is breaked part</span>.", "kraftives");	
		return $description;
		}
	}

//Add <br /> tag between any text

if(!function_exists('folio_break_it')) {
		function folio_break_it( $text ){
		
			preg_match_all('#/br/#', $text, $matches);
			if( isset( $matches[0][0] ) ):
				$replacement = str_replace('/br/','<br />', $matches[0][0] );
				
				$text = preg_replace( '#'.$matches[0][0].'#', $replacement, $text );
			endif;
			return $text; 
			
	
		}
	}

//text hightlight function
	if(!function_exists('folio_highlight_it')) {
		function folio_highlight_it( $text ){
		
			preg_match_all('#/highlight_start/(.*)/highlight_end/#', $text, $matches);
			if( isset( $matches[0][0] ) ):
				$replacement = str_replace('/highlight_end/','</span>',str_replace('/highlight_start/',
				'<span class="highlight">', $matches[0][0] ) );
				$text = preg_replace( '#'.$matches[0][0].'#', $replacement, $text );
			endif;
			return $text; 
			
	
		}
	}

//geting categories to show in module
	if(!function_exists('folio_categories')) {
		function folio_categories(){
			$blog_cats = get_terms('category', array('hide_empty' => false));
			$cats_array = array();
			foreach($blog_cats as $blog_cat) {
				$cats_array[$blog_cat->name] = $blog_cat->slug;
			}
			return $cats_array;
		}
	}


/*###################################################################################
/##				KraftiveComments: Extend Row Element							   ##/										
#####################################################################################*/
	//removing param
	if( function_exists( 'vc_remove_param' ) ){
		vc_remove_param("vc_row", "el_class");
		vc_remove_param("vc_row", "font_color");
		vc_remove_param("vc_row", "css");
	}

$setting = array (
  "show_settings_on_create" => true,
);
vc_map_update('vc_row', $setting);


	$section_id = array(
		'type' => 'textfield',
		'heading' => __("ID Name for Navigation", "kraftives"),
		'param_name' => 'section_id',
		'description' => __("If this row wraps the content of one of your sections, set an ID. You can then use it for navigation. Ex: about.", "kraftives"),
		//'dependency' => array( 'element' => 'section_id', 'not_empty' => false)
	);
	



	  $section_type = array(
			'type' => 'dropdown',
			'heading' => __( 'Select Section Type', 'kraftives' ),
			'param_name' => 'section_type',
			'value' => array(
							  __('Standard Section', 'kraftives' ) => 'main_section',
							  __('Curve Section', 'kraftives') => 'curve_section',
							  __('Parallex', 'kraftives') => 'parallex_section',
						),
			'description' => __( 'Select row/section type to be rendered', 'kraftives' ),
			"group" => __( "Section Settings", "kraftives" )
			//'dependency' => array( 'element' => 'parallex_image', 'not_empty' => true)
	  );
	  $bg_image = array(
			'type' => 'attach_image',
			'heading' => __( 'Background Image', 'kraftives' ),
			'param_name' => 'bg_image',
			'description' => __( 'Upload Background image for row, if parralex section type selected, parralex will apply on row ', 'kraftives' ),
	  );

	  $is_gray = array(
			'type' => 'dropdown',
			'heading' => __( 'Select Background Color', 'kraftives' ),
			'param_name' => 'is_gray',
			'value' => array(
							  __( 'No Background Color', 'kraftives' ) => 'none',
							  __( 'Gray Background', 'kraftives' ) => 'bg_grey',
							  __('Custom Background Color', 'kraftives') => 'custom_color',
						),
			'description' => __( 'Select background type Predifined <strong>Gray Color</strong> or <strong>Custom Color</strong> ', 'kraftives' ),
	  );
	  
	   $bg_color = array(
			'type' => 'colorpicker',
			'heading' => __( 'Custom Background Color', 'kraftives' ),
			'param_name' => 'bg_color',
			'description' => __( 'Select backgound color for your row', 'kraftives' ),
			'dependency' => array(
				'element' => 'is_gray',
				'value' => array( 'custom_color' )
			)

	  );

	  $padding = array(
			'type' => 'dropdown',
			'heading' => __( 'Padding Space', 'kraftives' ),
			'param_name' => 'padding',
			'value' => array(
							  __( 'Padding Top and Bottom', 'kraftives' ) => 'none',
							  __( 'Only Top Padding', 'kraftives' ) => 'no_padding_bottom',
							  __( 'Only Bottom Padding', 'kraftives' ) => 'no_padding_top',
							  __( 'No Padding', 'kraftives' ) => 'no_padding_top no_padding_bottom',
						),
			'description' => __( 'Select padding space you want on row section that is Both Top and Bottom, Only Top, Only Bottom and No Padding space.', 'kraftives' ),
			'dependency' => array(
				'element' => 'section_type',
				'value' => array( 'main_section', 'parallex_section' )
			)
	  );
	  
	  $curve_position = array(
			'type' => 'dropdown',
			'heading' => __( 'Curve Position', 'kraftives' ),
			'param_name' => 'curve_position',
			'value' => array(
							  __( 'Both Top and Bottom', 'kraftives' ) => 'zee_d_curve_container',
							  __( 'Only Top Curve', 'kraftives' ) => 'zee_t_curve_container',
							  __( 'Only Bottom Curve', 'kraftives' ) => 'zee_b_curve_container',
						),
			'description' => __( 'Select Curve Shape positions to appear on (options top, bottom or both).', 'kraftives' ),
			'dependency' => array(
				'element' => 'section_type',
				'value' => array( 'curve_section')
			),
	  		"group" => __( "Section Settings", "kraftives" )
	  );
	  
	  $t_c_color_type = array( // top_curve_color_type
	  //@TODO image required for curve
			'type' => 'dropdown',
			'heading' => __( 'Top Curve color type', 'kraftives' ),
			'param_name' => 't_c_color_type',
			'value' => array(
							  __( 'Theme major color', 'kraftives' ) => 'theme_skin',
							  __( 'Grey color', 'kraftives' ) => 'top_c_grey',
						),
			'description' => __( 'Select Top curve color type between theme major color or grey curve', 'kraftives' ),
			'dependency' => array(
				'element' => 'curve_position',
				'value' => array( 'zee_d_curve_container', 'zee_t_curve_container')
			),
	  		"group" => __( "Section Settings", "kraftives" )
	  );
	  $t_c_bg_color_type = array( // top_curve_background_color_type
	  //@TODO image required for curve BG
			'type' => 'dropdown',
			'heading' => __( 'Top Curve background color', 'kraftives' ),
			'param_name' => 't_c_bg_color_type',
			'value' => array(
							  __( 'Default background Color', 'kraftives' ) => '',
							  __( 'Grey backround color', 'kraftives' ) => 'top_grey',
						),
			'description' => __( 'Select Top curve Background color type between default white color or grey ', 'kraftives' ),
			'dependency' => array(
				'element' => 'curve_position',
				'value' => array( 'zee_d_curve_container', 'zee_t_curve_container')
			),
			"group" => __( "Section Settings", "kraftives" )
	  );
	  
	  $b_c_color_type = array( // bottom_curve_color_type 
	  //@TODO image required for curve
			'type' => 'dropdown',
			'heading' => __( 'Bottom Curve color', 'kraftives' ),
			'param_name' => 'b_c_color_type',
			'value' => array(
							  __( 'Theme major color', 'kraftives' ) => 'theme_skin',
							  __( 'Grey color', 'kraftives' ) => 'bottom_c_grey',
						),
			'description' => __( 'Select Bottom curve color type between theme major color or grey curve', 'kraftives' ),
			'dependency' => array(
				'element' => 'curve_position',
				'value' => array( 'zee_d_curve_container', 'zee_b_curve_container')
			),
			"group" => __( "Section Settings", "kraftives" )
	  );
	  
	  $b_c_bg_color_type = array( // bottom_curve_background_color_type 
	  //@TODO image required for curve BG
			'type' => 'dropdown',
			'heading' => __( 'Bottom Curve background color', 'kraftives' ),
			'param_name' => 'b_c_bg_color_type',
			'value' => array(
							  __( 'Default background Color', 'kraftives' ) => '',
							  __( 'Grey backround color', 'kraftives' ) => 'bottom_grey',
						),
			'description' => __( 'Select Bottom curve Background color type between default white color or grey ', 'kraftives' ),
			'dependency' => array(
				'element' => 'curve_position',
				'value' => array( 'zee_d_curve_container', 'zee_b_curve_container')
			),
			"group" => __( "Section Settings", "kraftives" )
	  );

	$row_circle_button = array(
		'type' => 'checkbox',
		'heading' => __("Display Row Circle button", "kraftives"),
		'param_name' => 'row_circle_button',
		"value" => array( __( "Show", "kraftives" ) => "yes" ),
		'description' => __("Circle button which will be displayed at the end of the row section.", "kraftives"),
		//'dependency' => array( 'element' => 'section_id', 'not_empty' => false)
	);
	$circle_button_icon = array(
		'type' => 'dropdown',
		'heading' => __("Row Redirection Circle button URL", "kraftives"),
		'param_name' => 'circle_button_icon',
		"value" => folio_icons(),
		'description' => __("Icon to display in Circle button", "kraftives"),
		'dependency' => array( 'element' => 'row_circle_button', 'value' => array('yes'))
	);
	$circle_button_text = array(
		'type' => 'textfield',
		'heading' => __("Row Redirection Circle button TEXT", "kraftives"),
		'param_name' => 'circle_button_text',
		'value' => 'View All',
		'description' => __("Text of the button Circle button which will be displayed at the end of the row.", "kraftives"),
		'dependency' => array( 'element' => 'row_circle_button', 'value' => array('yes'))
	);
	$circle_button_url = array(
		'type' => 'textfield',
		'heading' => __("Row Redirection Circle button URL", "kraftives"),
		'param_name' => 'circle_button_url',
		'value' => '#',
		'description' => __("URL of the circle button in row", "kraftives"),
		'dependency' => array( 'element' => 'row_circle_button', 'value' => array('yes'))
	);


		$el_class = array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'kraftives' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'kraftives' ),
			"group" => __( "Section Settings", "kraftives" )
		);


if( function_exists( 'vc_add_param' ) ){
	vc_add_param('vc_row', $section_id);
	vc_add_param('vc_row', $section_type);
	vc_add_param('vc_row', $bg_image);
	vc_add_param('vc_row', $is_gray);
	vc_add_param('vc_row', $bg_color);
	vc_add_param('vc_row', $padding);
	vc_add_param('vc_row', $curve_position);
	vc_add_param('vc_row', $t_c_color_type);
	vc_add_param('vc_row', $t_c_bg_color_type);
	vc_add_param('vc_row', $b_c_color_type);
	vc_add_param('vc_row', $b_c_bg_color_type);
	vc_add_param('vc_row', $row_circle_button);
	vc_add_param('vc_row', $circle_button_icon);
	vc_add_param('vc_row', $circle_button_text);
	vc_add_param('vc_row', $circle_button_url);
}

/*###################################################################################
/##				KraftiveComments: Extend Video Player							   ##/										
#####################################################################################*/


//Removing unnecessary params
	if( function_exists( 'vc_remove_param' ) ){
		vc_remove_param("vc_video", "title");
		vc_remove_param("vc_video", "css");
		vc_remove_param("vc_video", "link");
		vc_remove_param("vc_video", "el_class");
	}


	$type = array(
		'type' => 'dropdown',
		'heading' => __("Select Type", "kraftives"),
		'param_name' => 'video_type',
		'description' => __('Select type of video you want show', "kraftives"),
		'value'	=> array(
						__('HTML', 'kraftives') => 'html', 
						__('Vimeo', 'kraftives') => 'vimeo', 
						__('Youtube', 'kraftives') => 'youtube',
						//'Daily Motion'	=> 'daily'
						)
	);

	$html_poster = array(
		'type' => 'attach_image',
		'heading' => __("HTML Video Poster Image", "kraftives"),
		'param_name' => 'poster_image',
		'description' => __("HTML Video Poster Image", "kraftives"),
		'dependency' => array(
		'element' => 'video_type',
		'value' => array( 'html' )
		)     
	);
	$mp4_link = array(
		'type' => 'textfield',
		'heading' => __("MP4 Video Link", "kraftives"),
		'param_name' => 'mp4_link',
		'description' => __("MP4 Video Link for HTML", "kraftives"),
		'dependency' => array(
		'element' => 'video_type',
		'value' => array( 'html' )
		)     
	);
	$webm_link = array(
		'type' => 'textfield',
		'heading' => __("WEBM Video Link", "kraftives"),
		'param_name' => 'webm_link',
		'description' => __("Webm Video Link for HTML", "kraftives"),
		'dependency' => array(
		'element' => 'video_type',
		'value' => array( 'html' )
		)   
	);

	$video_id = array(
		'type' => 'textfield',
		'heading' => __("Youtube / Vimeo Video ID", "kraftives"),
		'param_name' => 'video_id',
		'description' => __("Youtube / Vimeo Video ID. Example: the id is the highlighted text  eg. http://vimeo.com/<strong class='highlight'>27299211</strong>, https://www.youtube.com/watch?v=<strong class='highlight'>1LzRIhUAilk</strong>", "kraftives"),
		'dependency' => array(
		'element' => 'video_type',
		'value' => array( 'youtube','vimeo','daily' )
		)   

	);

	$width = array(
		'type' => 'textfield',
		'heading' => __("Width", "kraftives"),
		'param_name' => 'video_width',
		'description' => __("Video width in px Example: 100px", "kraftives")
	);
	$height = array(
		'type' => 'textfield',
		'heading' => __("Height", "kraftives"),
		'param_name' => 'video_height',
		'description' => __("Video Height in px Example: 100px", "kraftives")
	);


if( function_exists( 'vc_add_param' ) ){	
	vc_add_param('vc_video', $type);
	vc_add_param('vc_video', $html_poster);
	vc_add_param('vc_video', $mp4_link);
	vc_add_param('vc_video', $webm_link);
	vc_add_param('vc_video', $video_id);
	vc_add_param('vc_video', $width);
	vc_add_param('vc_video', $height);

}
//Vc_video End

/*###################################################################################
/##				KraftiveComments: Extend Button Element							   ##/										
#####################################################################################*/

//Removing Param of button module
if( function_exists( 'vc_remove_param' ) ){
	vc_remove_param("vc_button", "size"); 
	vc_remove_param("vc_button", "icon"); 
	vc_remove_param("vc_button", "color"); 
}

	$style = array(
		'type' => 'dropdown',
		'heading' => __("Select Style", "kraftives"),
		'param_name' => 'style',
		'description' => __("Select style of button", "kraftives"),
		'value'	=> array(
						__('Red Button', 'kraftives') => 'folio-button', 
						__('Dark Button', 'kraftives') => 'folio-button-dark', 
						__('Outline Button', 'kraftives') => 'folio-button-outline',
						)
	);
if( function_exists( 'vc_remove_param' ) ){
	vc_add_param('vc_button', $style);
}
	$setting = array (
	  'name' => __('Folio Button', 'kraftives'),
	  'category' => __('Folio Zee Modules', 'kraftives'),
	);
if( function_exists( 'vc_map_update' ) ){
	vc_map_update('vc_button', $setting);
}
  $folio_icone = array(
		'type' => 'dropdown',
		'heading' => __( 'Icon', 'kraftives' ),
		'param_name' => 'folio_icons',
		'value' => folio_icons(),
		'description' => __( 'Button Icon.', 'kraftives' ),
		'param_holder_class' => 'vc-colored-dropdown'
	);

  $size = array(
		'type' => 'dropdown',
		'heading' => __( 'Size', 'kraftives' ),
		'param_name' => 'size',
		'value' => array(
					__('Default', 'kraftives')	=> '',
					__('Small', 'kraftives')	  => 'button-small',
					__('Medium', 'kraftives')	 => 'button-medium',
					__('Large', 'kraftives')	  => 'button-large',
					__('X-large', 'kraftives')	=> 'button-xlarge',
					__('Full Width', 'kraftives') => 'button-full'
					),
		'description' => __( 'Button Size.', 'kraftives' ),
		'param_holder_class' => 'folio-size-dropdown'
	);
  $target = array(
		'type' => 'dropdown',
		'heading' => __( 'Target', 'kraftives' ),
		'param_name' => 'target',
		'value' => array(
					__('Open in Same Window', 'kraftives')	=> '_self',
					__('open in New Window', 'kraftives')	  => '_new'
					),
		'description' => __( 'Button Size.', 'kraftives' ),
		'param_holder_class' => 'folio-size-dropdown'
	);

if( function_exists( 'vc_add_param' ) ){
	vc_add_param('vc_button', $folio_icone);		
	vc_add_param('vc_button', $size);
	vc_add_param('vc_button', $target);
}
	
//Vc_button End

/*###################################################################################
/##				KraftiveComments: Extend Text Block Element							##/										
#####################################################################################*/

if( function_exists( 'vc_remove_param' ) ){
	vc_remove_param("vc_column_text", "css_animation");
	vc_remove_param("vc_column_text", "css");
}
if( function_exists( 'vc_add_param' ) ){
	vc_add_param('vc_column_text', array(
		"type" => "dropdown",
		"class" => "",
		"heading" => __("Text Alignment", "kraftives"),
		"param_name" => "alignment",
		"admin_label" => true,
		"value" => array(
						__('Left', 'kraftives') => 'align_left',
						__('Right', 'kraftives') => 'align_right',
						__('Center', 'kraftives') => 'align_center'
						),
		"description" => __("Select alignment of text", "kraftives"),
	));
}

function folio_css_classes_for_vc_row_and_vc_column($class_string, $tag) {
  if ($tag=='vc_column_text') {
    $class_string = str_replace('wpb_text_column', 'content_bar', $class_string);
  }
  return $class_string;
}
// Filter to Replace default css class for vc_row shortcode and vc_column
add_filter('vc_shortcodes_css_class', 'folio_css_classes_for_vc_row_and_vc_column', 10, 2);

//Text Block End

/*###################################################################################
/##				KraftiveComments: Extend HTML Text Block Element							##/										
#####################################################################################*/

function folio_css_classes_for_vc_row_and_vc_raw_html($class_string, $tag) {
  if ($tag=='vc_raw_html') {
    $class_string = str_replace('wpb_raw_html', 'content_bar', $class_string);
  }
  return $class_string;
}
// Filter to Replace default css class for vc_row shortcode and vc_column
add_filter('vc_shortcodes_css_class', 'folio_css_classes_for_vc_row_and_vc_raw_html', 10, 2);

//Text Block End

/*###################################################################################
/##				KraftiveComments: Extend Tabs							   		   ##/										
#####################################################################################*/

	$toggle_setting = array (
	  'allowed_container_element' => 'vc_tabs'
	);
	if( function_exists( 'vc_map_update' ) ){
		vc_map_update('vc_tab', $toggle_setting);
	}
	
  $tab_icon = array(
		'type' => 'dropdown',
		'heading' => __( 'Icon', 'kraftives' ),
		'param_name' => 'tab_icon',
		'value' => folio_icons(),
		'description' => __( 'Tab Icon.', 'kraftives' ),
		'param_holder_class' => 'vc-colored-dropdown'
	);
	if( function_exists( 'vc_add_param' ) ){
		vc_add_param('vc_tab', $tab_icon);
	}
	
	//Vc_tab end
	
/*###################################################################################
/##				KraftiveComments: Extend Toggle							   		   ##/										
#####################################################################################*/


	$toggle_setting = array (
	  'name' => __('Folio Toggle', 'kraftives'),
	  'category' => __('Folio Zee Modules', 'kraftives'),
	);
	if( function_exists( 'vc_map_update' ) ){
		vc_map_update('vc_toggle', $toggle_setting);
	}

	if( function_exists( 'vc_remove_param' ) ){
		vc_remove_param("vc_toggle", "css_animation");
	}
	
//Vc_toggle end

/*###################################################################################
/##				KraftiveComments: Custom Params							   		   ##/										
#####################################################################################*/

// Generate param type "number" 
	add_action('admin_init','folio_generate_shortcode_params');
	function folio_generate_shortcode_params(){
		/* Generate param type "number" */
		if ( function_exists('add_shortcode_param'))
		{
			add_shortcode_param('number' , 'folio_number_settings_field'  );
			add_shortcode_param('tab_id' , 'folio_tab_id_form_field'  );
		}
	}
	
	if(!function_exists('folio_number_settings_field')) {
		function folio_number_settings_field($settings, $value)
		{
			$dependency = vc_generate_dependencies_attributes($settings);
			$param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
			$type = isset($settings['type']) ? $settings['type'] : '';
			$min = isset($settings['min']) ? $settings['min'] : '';
			$max = isset($settings['max']) ? $settings['max'] : '';
			$suffix = isset($settings['suffix']) ? $settings['suffix'] : '';
			$class = isset($settings['class']) ? $settings['class'] : '';
			$output = '<input type="number" min="'.$min.'" max="'.$max.'" class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '" value="'.$value.'" style="max-width:100px; margin-right: 10px;" />'.$suffix;
			return $output;
		}
	}


//Tab id
function folio_tab_id_form_field ($settings, $value) {
	$dependency = vc_generate_dependencies_attributes($settings);
	return '<div class="my_param_block">'
	  .'<input name="'.$settings['param_name']
	  .'" class="wpb_vc_param_value wpb-textinput '
	  .$settings['param_name'].' '.$settings['type'].'_field" type="hidden" value="'
	  .$value.'" ' . $dependency . ' />'
	  .'<label>'.$value.'</label>'
	  .'</div>';
}

/*###################################################################################
/##				KraftiveComments: VC Custom Module Icons  		   					##/										
#####################################################################################*/
function folio_vc_custom_element_icon_css(){ 
	wp_enqueue_style('style-dynamic-color_css', get_template_directory_uri() . '/assets/css/vc_extend_element_icons.css', false, null);
}
add_action( 'admin_enqueue_scripts', 'folio_vc_custom_element_icon_css' );