<?php get_header(); 
wp_reset_query();
global $wedding_style_general_settings_page,$post,$wedding_style_integration_page;
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
			<?php } ?>


	<div id="blog" class="blog">
            <?php $post = $posts[0];  ?> 
			<?php /* If this is a category archive */ if (is_category()) { ?>
				<h2 class="styledHeading page-header"><span><?php echo __('Archive for the','WeddingStyle'); ?>  &#8216;<?php single_cat_title(); ?>&#8217; <?php echo __('Category', 'WeddingStyle'); ?>:</span></h2>
			<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
				<h2 class="styledHeading page-header"><span><?php echo __('Posts Tagged','WeddingStyle'); ?> &#8216;<?php single_tag_title(); ?>&#8217;</span></h2>
			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
				<h2 class="styledHeading page-header"><span><?php echo __('Archive for','WeddingStyle'); ?> <?php echo get_the_date(); ?></span></h2>
			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				<h2 class="styledHeading page-header"><span><?php echo __('Archive for','WeddingStyle'); ?> <?php echo get_the_date('F Y'); ?></span></h2>
			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				<h2 class="styledHeading page-header"><span><?php echo __('Archive for','WeddingStyle'); ?> <?php echo get_the_date('Y'); ?></span></h2>
			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
				<h2 class="styledHeading page-header"><span><?php if(isset($_GET['author'])) printf( __( 'All posts by %s', 'WeddingStyle' ), '<span class="vcard">' . get_the_author_meta('user_login', $_GET['author']) . '</span>' ); ?></span></h2>
			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h2 class="styledHeading page-header"><span><?php echo __('Blog Archives','WeddingStyle'); ?></span></h2>
		<?php } ?>
		<?php if (have_posts()) :
		
    		while(have_posts()) : the_post(); ?>	
				<div class="post">
					<?php wedding_style_entry_cont(); ?>
				</div>				
       <?php endwhile; ?>	
		<div class="navigation">
			<?php wedding_style_nav_link(); ?>
		</div>
	   <?php else : ?>
		<?php endif; ?>
		<div class="clear"></div>
		<?php  $wedding_style_integration_page->bottom_advertisment(); ?>
   </div>
   <?php			
		 if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
			<div id="sidebar2" role="complementary">         
				 <div class="sidebar-container">
					 <?php dynamic_sidebar( 'sidebar-2' );   ?>
				 </div>
			</div>
		<?php } ?>
		<div class="clear"></div>
	</div>
</div>
	
<?php get_footer(); ?>