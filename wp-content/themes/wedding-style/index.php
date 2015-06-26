<?php get_header();
global $wedding_style_integration_page; ?>
</div>	
<div id="content" >	
		<div class="container">		
			<?php if ( is_active_sidebar( 'primary_widget_area' ) ) { ?>
			<div id="sidebar1" >
				<div class="sidebar-container">				
					<?php  dynamic_sidebar( 'primary_widget_area' ); 	?>					
				</div>
			</div>
			<?php } 
		    wedding_style_content_posts();  
		    $wedding_style_integration_page->bottom_advertisment();
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
