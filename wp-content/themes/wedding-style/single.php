<?php
global $wedding_style_integration_page,$wedding_style_general_settings_page;
foreach ($wedding_style_general_settings_page->options_generalsettings as $value) {
    if (isset( $value['var_name'] )) 
		$$value['var_name'] = $value['std'];
}
get_header(); 
wedding_style_update_page_layout_meta_settings();
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
	<div id="blog" class="blog">
		<?php $wedding_style_integration_page->update_top_of_post_integration(); 
		if(have_posts()) { 
    		while(have_posts()) { the_post(); ?>
			<div <?php post_class(); ?>>			
				<h2 class="page-header">
					<span><?php the_title(); ?></span>
				</h2>				
				<div class="entry">	
					<?php
						if ( has_post_thumbnail() ) { ?>
						<div class="post-thumbnail-div post-thumbnail">
							  <?php echo the_post_thumbnail(240,182); ?>
						</div> 
					<?php } 
					the_content(); ?>
				</div>
			</div>
			<?php if($date_enable){
				wedding_style_entry_meta();
			}
			
			$wedding_style_integration_page->update_bottom_of_post_integration(); 
			wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Page', 'WeddingStyle' ) . '</span>', 'after' => '</div>', 'link_before' => '<span class="page-links-number">', 'link_after' => '</span>' ) ); 
			wedding_style_post_nav(); ?>
			
			<div class="clear"></div>
			
			<?php  $wedding_style_integration_page->bottom_advertisment();
			
			global $post;
			$withcomments = true;
				if(comments_open()){?>
                   <div class="comments-template">
                      <?php echo comments_template(); ?>
                   </div>	
			   <?php  } ?>
	</div>			
<?php }
}
		if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
			<div id="sidebar2">
				<div class="sidebar-container">
				  <?php dynamic_sidebar( 'sidebar-2' );  ?>
				</div>
			</div>     
			<?php } ?>		
		<div class="clear"></div>
	</div>
</div>

<?php get_footer(); ?>