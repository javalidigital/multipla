<?php
	if(is_page()){	
		if ( ! dynamic_sidebar( 'sidebar-right-page' ) ){ ?>
				<div class="widget widget_kraft_search" id="search-3">
					<?php get_search_form(); ?>
				</div>
			
			<!-- recent_entries starts-->
			<div class="widget widget_recent_entries" id="recent-posts-2">
				<h3 class="widget-title"><?php _e( 'Archives', 'kraftives' ); ?></h3>
				<ul>
				 <?php wp_get_archives( 'type=monthly' ); ?>
					
				</ul>
			</div><!-- recent_entries ends-->
	
			<div class="widget widget_recent_entries" id="recent-posts-3">
				<h3 class="widget-title"><?php _e( 'Meta', 'kraftives' ); ?></h3>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</div><!-- recent_entries ends-->
		<?php 
		}
	}else{// end widget area ?
		if ( ! dynamic_sidebar( 'sidebar-right-post' ) ){ ?>
				<div class="widget widget_kraft_search" id="search-3">
					<?php get_search_form(); ?>
				</div>
			
			<!-- recent_entries starts-->
			<div class="widget widget_recent_entries" id="recent-posts-2">
				<h3 class="widget-title"><?php _e( 'Archives', 'kraftives' ); ?></h3>
				<ul>
				 <?php wp_get_archives( 'type=monthly' ); ?>
					
				</ul>
			</div><!-- recent_entries ends-->
	
			<div class="widget widget_recent_entries" id="recent-posts-3">
				<h3 class="widget-title"><?php _e( 'Meta', 'kraftives' ); ?></h3>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</div><!-- recent_entries ends-->
		<?php 
		}
	}