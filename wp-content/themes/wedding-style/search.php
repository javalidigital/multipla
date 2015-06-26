<?php 

global $query_string, $wedding_style_integration_page;

		
query_posts($query_string .'&posts_per_page=999');
get_header();
$wedding_style_any_post_find = 1;
?>
</div>	

<div id="content" class="page">
 <div class="container">
    <?php if ( is_active_sidebar( 'primary_widget_area' ) ) { ?>
			<div id="sidebar1" role="complementary">
				<div class="sidebar-container">
					<?php dynamic_sidebar( 'primary_widget_area' );  ?>
				</div>
			</div>
			<?php }  ?>
			<div id="blog" class="blog search">
				<div class="single-post">
					<h2 class="page-header">
						<span><?php echo __('Search','WeddingStyle'); ?></span>
					</h2>						
				</div>
					<?php /*print page content*/ 
					if( have_posts() ) { 
						while( have_posts()){ 
						$wedding_style_any_post_find=0;
							the_post(); ?>
							 <div class="single-post">
									<a href="<?php the_permalink(); ?>">
										<h3><?php the_title(); ?></h3>
									</a>
								<?php wedding_style_entry_cont_for_search(); ?>
								<div class="clear"></div>
							</div>
				  <?php } 
				  ?>
						<div class="page-navigation">
							<?php posts_nav_link(); ?>
						</div>
				  
				<?php	}
				  if($wedding_style_any_post_find)
					echo "Nothing was found. Please try another keyword.";				
				$wedding_style_integration_page->bottom_advertisment(); ?>
	      </div>
		  <?php if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
			<div id="sidebar2" role="complementary">         
				 <div class="sidebar-container">
					 <?php dynamic_sidebar( 'sidebar-2' ); ?>
				 </div>
			</div>
		  <?php } ?>
	   <div style="clear:both"></div>
	</div>
</div>

<?php get_footer(); ?>
