<?php
if ( function_exists('register_sidebar') ) {
							
	//1 - Left Sidebar on page
			register_sidebar(array('name' => '1 - Left Sidebar on Page',
									'id' => 'sidebar-left-page',
									'before_widget' => '<div id="%1$s" class="widget %2$s">',
									'after_widget'  => '</div>',
									'before_title' => '<h3 class="widget-title">',
									'after_title' => '</h3>')
							);
	//2 - Right Sidebar on Page

			register_sidebar(array('name' => '2 - Right Sidebar on Page',
									'id' => 'sidebar-right-page',
									'before_widget' => '<div id="%1$s" class="widget %2$s">',
									'after_widget'  => '</div>',
									'before_title' => '<h3 class="widget-title">',
									'after_title' => '</h3>')

							);
	//3 - Left Sidebar on Post
			register_sidebar(array('name' => '1 - Left Sidebar on Post',
									'id' => 'sidebar-left-post',
									'before_widget' => '<div id="%1$s" class="widget %2$s">',
									'after_widget'  => '</div>',
									'before_title' => '<h3 class="widget-title">',
									'after_title' => '</h3>')
							);
	//4 - Right Sidebar on Post

			register_sidebar(array('name' => '2 - Right Sidebar on Post',
									'id' => 'sidebar-right-post',
									'before_widget' => '<div id="%1$s" class="widget %2$s">',
									'after_widget'  => '</div>',
									'before_title' => '<h3 class="widget-title">',
									'after_title' => '</h3>')
							);
}