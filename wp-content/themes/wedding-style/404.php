<?php
get_header();
wedding_style_update_page_layout_meta_settings();
global $wedding_style_integration_page; ?>	
</div>	

<div id="content" class="page">
	<div class="container">
			<?php if ( is_active_sidebar( 'primary_widget_area' ) ) { ?>
			<div id="sidebar1"  role="complementary">
				<div class="sidebar-container">
					<?php dynamic_sidebar( 'primary_widget_area' ); ?>
				</div>
			</div>
			<?php } ?>
		   <div id="blog" class="blog error404">
				<h2 class="page-header"><span><?php _e('Not Found', 'WeddingStyle'); ?></span></h2>
				<p><?php _e('You are trying to reach a page that does not exist here. Either it has been moved or you typed a wrong address.', 'WeddingStyle'); ?></p>
				<img class="imgBox" src="<?php  echo get_template_directory_uri('template_url'); ?>/images/404.jpg">
				<?php $wedding_style_integration_page->bottom_advertisment(); ?>
		  </div>

        <?php if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
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
