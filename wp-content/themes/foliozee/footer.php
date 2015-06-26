	<!-- sec-map starts -->
 
    <?php 
		
	global $fdata, $post;

/* Google map for footer */

//if portfolio listing page this condition will excute

			if( $fdata[ 'gmap_show_hide' ] == true ){
				if( $fdata['portfolio_listing_map'] == true ){
					if( is_post_type_archive('portfolio') ){
						$map_style = !empty($fdata['is_curve_on_portfolio']) ? 'true' : '' ;
						?>
						<section class="sec-map <?php echo $fdata['is_curve_on_portfolio'] == true? 'zee_curve_container zee_t_curve_container': '';?>">
                            	<?php echo folio_get_map( $map_style ); ?>
						</section>
						<?php
					}
				}
			}
			
//if blog listing , archive, search and 404 pages this condition will excute			
			if( $fdata[ 'gmap_show_hide' ] == true ):
				if( $fdata['blog_listing_map'] == true ):
					if( ! is_post_type_archive('portfolio') && is_archive() || is_home() || is_404() || is_search() ):
						$map_style = !empty($fdata['is_curve_on_blog']) ? 'true' : '' ;
						?>
                            <section class="sec-map <?php echo $fdata['is_curve_on_blog'] == true? 'zee_curve_container zee_t_curve_container': '';?>">
                            	<?php echo folio_get_map( $map_style ); ?>
							</section>
						<?php
					endif;
				endif;
			endif;

//if page, post single and portfolio single pages this condition will excute			
			if( $fdata[ 'gmap_show_hide' ] == true ):
				if( !is_archive() && ! is_home() && ! is_404() && ! is_search() ):
					if( get_post_meta( $post->ID, 'map_in_footer',true)== 'true' ):
						$map_style = get_post_meta( $post->ID, 'map_style', true );
						?>
                            <section class="sec-map <?php echo $fdata['is_curve'] == true && $map_style === 'true' ? 'zee_curve_container zee_t_curve_container': '';?>">
                            	<?php echo folio_get_map( $map_style ); ?>
							</section>
						<?php
					endif;
				endif;
			endif;

?>

    <!-- sec-map ends -->
	  
    <!-- footer start -->
    
    <footer>
    	<div class="container">
        	<div class="row">
            	<div class="col-sm-6">
                	<?php if( $fdata[ 'switch_footer_text' ] == true ):?> 
                            <div class="hgroup">
                            <?php // @TODO from copyright from theme options panel ?>
                                <h5 class="copy_right"><?php echo $fdata[ 'footer_text' ];?></h5>
                            </div>
                        <?php endif;?>
                </div>
                <div class="col-sm-6">
                     <?php $socials = $fdata[ 'arrang_social_icon' ][ 'enabled' ];unset( $socials['placebo'] );?>
                   
						<?php if( count($socials) > 0 ){?>
                        <ul class="sm_links align_center">
						<?php
								foreach( $socials as $name => $socail ):
									$link = ! empty($fdata[$name]) ? $fdata[$name]: 'javascript:void(0);'; 					
						?>
                                    <li>
                                        <a href="<?php echo $link; ?>" class="sm_icon">
                                            <span class="icon-folio-shape-filled"></span>
                                            <i class="fa fa-<?php echo $name;?>"></i>
                                        </a>
                                    </li>
							
						<?php   endforeach;?>
                        </ul>
                        <?php }?>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end -->
<?php if( is_page() && get_post_meta( $post->ID, 'slidebar_show' ,true ) === 'true' ){?>
			</div>
			<?php get_template_part('templates/slidebar-menu'); ?>
<?php } ?> 	
 <?php 
	
	
	//$footer_script = kraft_get_option('gs_general', 'gs_gen_footercode', '' );
	//if($footer_script!='') { ?>
		<script type="text/javascript">
		  <?php //echo $footer_script; ?>
		  			/*alert(" Preloader: true<br>
					is_front_page: <?php echo is_front_page()?"true":"false";?><br />
					only_pre_loader_on: <?php echo $fdata['only_pre_loader_on'];?><br />
					");*/
		</script>
	<?php //} 
    
    if(	$fdata['display_preloader']==true 
		&& 
		( ( $fdata['only_pre_loader_on']=='on_front_page' 
			&& 
			( is_front_page() )
		   ) 
		  || 
		   $fdata['only_pre_loader_on']=='on_full_site'
		)
	  ){
	  
	  
	//if($fdata['display_preloader']==true) { ?>
    
		<script type="text/javascript">
			jQuery(document).ready(function($){
				"use strict";
				 /* preloaders calling  */	
				 if ( !$.browser.msie ) { 
					$("body").queryLoader2({
						barColor: "<?php echo $fdata['bar_color_preloader'];?>",
						backgroundColor: "<?php echo $fdata['background_color_preloader'];?>",
						percentage: <?php echo $fdata['display_percentage_preloader']==true?"true":"false";?>,
						barHeight: <?php echo $fdata['barheight_preloader'];?>,
						completeAnimation: "fade",
						minimumTime: 200
					});  
				 }else{
					 $('#load').hide();
				 }
			});
		</script>
	<?php } ?>
    
     <?php
		// Custom Javascript Code from theme options
		if($fdata['custom_js_code']!='') { ?>
        <script type="text/javascript">
          <?php echo $fdata['custom_js_code']; ?>
        </script>
        <?php } ?>

<?php wp_footer();?>
</body>
</html>
