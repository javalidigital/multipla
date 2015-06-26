<?php global $post, $fdata;?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->

<head>

    <!-- Meta Tags -->
        <meta http-equiv="content-type" content="text/html; charset=<?php bloginfo('charset'); ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    <!-- Favicon -->
    	<?php // favicon from theme options panel ?>
    	<link rel="shortcut icon" href="<?php echo $fdata['upload_custom_favicon']['url'];?>" >
	
        <?php if (wp_count_posts()->publish > 0) : ?>
        		<link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">
        <?php endif; ?>
        
	    <!-- IE6-8 support of HTML5 elements --> 
        <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri();?>/assets/js/vendor/html5shiv.js"></script>
        <![endif]-->
        
		<?php 
		// Google Analytics Code from theme options
		if($fdata['google_analytics']!='') { ?>
        <script type="text/javascript">
			<?php echo $fdata['google_analytics']; ?>
        </script>
        <?php } ?>
        
        

 <?php wp_head(); ?>   
</head>

<?php 
	$cless ='';
	if(is_page_template('temp-onepage.php')){ 
		$cless = 'onepagetemp';
	}
?>
<body <?php body_class( $cless );?>>
<?php if( is_page() && get_post_meta( $post->ID, 'slidebar_show' ,true ) === 'true' ){?>
<div id="sb-site">
<?php } ?>


    <!-- menu-bar starts -->
<?php
	
	$main_menu_position= "";
	if(!is_404() && !is_search()){
		$main_menu_position = get_post_meta($post->ID, 'menu_position', true )?get_post_meta($post->ID, 'menu_position', true ):"";
	}
	if( $main_menu_position==="" || $main_menu_position === 'false' || is_home() || is_archive() || is_search() || is_404() ):
			get_template_part( 'templates/menu-template' );
	endif;
?>
    
    <!-- menu-bar ends -->