<?php   wedding_style_custom_css(); ?>
<div id="footer">
		<div class="container">
		    <div id="footer_eft"> 
		    	<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
					<div id="sidebar3"   role="complementary">
						<div class="sidebar-container">
							<?php dynamic_sidebar( 'sidebar-1' );  ?>
						</div>
					</div>
				<?php } ?>
			
			</div>
			<?php if ( is_active_sidebar( 'second-footer-widget-area' ) ) { ?>
					<div id="sidebar4"   role="complementary">
						<div class="sidebar-container">
							<?php dynamic_sidebar( 'second-footer-widget-area' );  ?>
						</div>
					</div>
		    <?php } ?>			
		</div>
		<?php wedding_style_footer_text();   ?>
	<div class="clear"></div>	
</div>
<?php wp_footer(); ?>
</body>
</html>
