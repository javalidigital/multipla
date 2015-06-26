<?php get_header();
global $wedding_style_integration_page; ?>
</div>	
<div id="content" >
		<div class="container">		
			<?php if ( is_active_sidebar( 'primary_widget_area' ) ) { ?>
			<div id="sidebar1" style="margin-top:10px !important;">
				<div class="sidebar-container">				
				<?php  dynamic_sidebar( 'primary_widget_area' ); 	?>					
				</div>
			</div>
			<?php } ?>
			
			
			
		    <?php wedding_style_content_posts_for_home(); 
                   $wedding_style_integration_page->bottom_advertisment(); ?>

			<?php 
			  if(comments_open())
			  {  ?>
					<div class="comments-template">
						<?php echo comments_template();	?>
					</div>
			<?php }	 ?>
			
            <?php if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
				<div id="sidebar2"  style="margin-top:10px !important;">
					<div class="sidebar-container">
						<?php  dynamic_sidebar( 'sidebar-2' ); 	?>
					</div>
				</div>
          <?php } ?>
		<div class="clear"></div>
  </div>
</div>
<?php get_footer(); ?>