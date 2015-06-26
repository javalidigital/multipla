<?php get_header();
global $wedding_style_integration_page;  ?>
</div>	

<div id="content" >
	<?php 
		wedding_style_top_posts();	  
		if( is_home() ){ wedding_style_home_video_post(); }
	?><div class="container">
		
			<?php if ( is_active_sidebar( 'primary_widget_area' ) ) { ?>
			<div id="sidebar1" >
				<div class="sidebar-container">				
				<?php  dynamic_sidebar( 'primary_widget_area' ); 	?>					
				</div>
			</div>
			<?php }  ?>
			
			<div id="blog" class="blog" >
				<?php 
			if( is_home() )
				wedding_style_content_posts();
			else
				wedding_style_content_posts_for_home();	?>
		  
			<?php	
			 $wedding_style_integration_page->bottom_advertisment();	
			  ?>
			  <div class="clear"></div>
			</div>
			<?php
            if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
				<div id="sidebar2">
					<div class="sidebar-container">
						<?php  dynamic_sidebar( 'sidebar-2' ); 	?>
					</div>
				</div>
          <?php } ?>
		<div class="clear"></div>
  </div>
</div>
<?php get_footer(); ?>