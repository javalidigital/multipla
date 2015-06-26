<?php 
get_header();
wedding_style_update_page_layout_meta_settings();
global $wedding_style_integration_page;
?>
</div>	

<div id="content" class="page">
	<div class="container">
	   <?php if ( is_active_sidebar( 'primary_widget_area' ) ) { ?>
			<div id="sidebar1"   role="complementary">
				<div class="sidebar-container">
					<?php dynamic_sidebar( 'primary_widget_area' );  ?>
				</div>
			</div>
		<?php } ?>
		<div id="blog" class="blog" >		
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
				  <div class="single-post single-page">					 
						<h2 class="page-header">
							<span><?php the_title(); ?></span>
						</h2>						 
					<?php the_content();  ?>
				 </div>				
			<?php endwhile; ?>
		   <div class="navigation">
				<?php posts_nav_link(); ?>
		   </div>
		   <?php endif; 
               $wedding_style_integration_page->bottom_advertisment();
			   
               global $post;
				if(comments_open())
				{ ?>
					<div class="comments-template">
						<?php echo comments_template();	?>
					</div>
			<?php }	   ?>

        </div>
	
		<?php if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
			<div id="sidebar2"  role="complementary">
				<div class="sidebar-container">
					<?php dynamic_sidebar( 'sidebar-2' );  ?>
				</div>
			</div>     
		<?php } ?>
	   <div class="clear"></div>
	</div>
</div>   
                 
<?php get_footer(); ?>