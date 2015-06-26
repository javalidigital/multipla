    <!-- menu-bar starts -->
<?php global $post;
	  global $fdata;
?>
    <?php
	// Checking that if and only if its Blog page or archive page
	if( is_home() || is_archive() || is_search() || is_404() && ( !is_page() || !is_single() || !is_singular('portfolio') ) ){
	?>
    
    <header class="menu-bar sticky-bar <?php if( $fdata['show_always'] == 1 ) echo 'always_show';?>">
    <?php
	}
	// Making sure that it is other then Blog page or archive page
	elseif(is_page() || is_single() || is_singular('portfolio') ){
	?>
    <header class="menu-bar sticky-bar <?php if( get_post_meta( $post->ID, 'always_show', true ) === 'true' ) echo 'always_show';?>">
    <?php
	}?>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- logo starts -->
                    <div class="logo">
                        <figure>
                        	<?php 
							if($fdata['upload_main_logo']['url']!=''){?>
                        	<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name');?>">
                            	<img src="<?php echo $fdata['upload_main_logo']['url'];?>" alt="<?php bloginfo('name');?>" class="main_logo">
                            </a>
                            <?php
							}?>
                        </figure>
                        <div class="small_menu">
                            <div class="menu_small_btn">
                                <div class="open_menu toggle_main_menu_btn">
                                    <i class="fa fa-bars"></i>
                                </div>
                                <div class="close_menu toggle_main_menu_btn">
                                    <i class="fa fa-times"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- logo ends -->
                    
				<?php
					$top_spacing = 0; //for sticky navigation
					if ( is_admin_bar_showing() ) {
						$top_spacing = 32;
					}
				// Checking that if and only if its Blog page or archive page
				if( ( is_home() || is_archive() || is_search() || is_404() )
					&& 
					( !is_page() && !is_single() && !is_singular('portfolio') ) 
					 ){ 
					 
					 if( $fdata['sticky_menu']==true ){?>
                    <script type="text/javascript">
                        jQuery(document).ready(function($){
                            "use strict";
                                <!--main-nav starts-->
                                    /* Sticky Navigation */
                            jQuery(".sticky-bar").sticky({ topSpacing: <?php echo $top_spacing; ?> });
                        });
                    </script>
                    <?php
					 }?>
                    
                        <?php
						/* Assigning the menu whether primary or other menu selected by user */
						$folio_menu = ("folio_primarymenu"===$fdata['blog_menu'])?'':$fdata['blog_menu'];
						
						/* @TODO is back_to_top active from themeoptions or not */
						$backto_top = '
										<span class="back_top">
											<a href="javascript:void(0);" class="back_to_top"><i class="fa fa-angle-up"></i></a>
										</span>';
							
						$defaults = array(
							'theme_location'  => 'header-primary-menu',
							'menu'            => $folio_menu,
							'container'       => 'nav',
							'container_class' => 'main-nav',
							'menu_class'      => 'menu',
							'echo'            => true,
							'fallback_cb'     => '',
							'items_wrap'      => '<ul id="top-nav" class="%2$s top-nav">%3$s</ul>'.$backto_top,
						);
						
						wp_nav_menu( $defaults );
					?>
                    
                <?php
				}
				// Making sure that it is other then Blog page or archive page
				elseif( ( is_page() || is_single() || is_singular('portfolio') ) ){
                	if( get_post_meta( $post->ID, 'sticky_menu', true ) === 'true' || get_post_meta( $post->ID, 'sticky_menu', true ) === '' ){?>
					<script type="text/javascript">
                        jQuery(document).ready(function($){
                            "use strict";
                                <!--main-nav starts-->
                                    /* Sticky Navigation */
                            jQuery(".sticky-bar").sticky({ topSpacing: <?php echo $top_spacing; ?> });
                        });
                    </script>
                    <?php
					}?>
                    
                                        <?php
						/* Assigning the menu whether primary or other menu selected by user */
						$folio_menu = ("folio_primarymenu"===get_post_meta( $post->ID, 'select_menu_option', true ))?'':get_post_meta( $post->ID, 'select_menu_option', true );
						
						/* @TODO is back_to_top active from themeoptions or not */
						$backto_top = '
										<span class="back_top">
											<a href="javascript:void(0);" class="back_to_top"><i class="fa fa-angle-up"></i></a>
										</span>';
							
						$defaults = array(
							'theme_location'  => 'header-primary-menu',
							'menu'            => $folio_menu,
							'container'       => 'nav',
							'container_class' => 'main-nav',
							'menu_class'      => 'menu',
							'echo'            => true,
							'fallback_cb'     => '',
							'items_wrap'      => '<ul id="top-nav" class="%2$s top-nav">%3$s</ul>'.$backto_top,
						);
						
						wp_nav_menu( $defaults );
					?>
                <?php 
				}
				?>


                    
                    <!-- main-nav ends-->
                </div>
            </div>
        </div>
    </header>
    <!-- menu-bar ends -->
    <div class="clear">
    </div>
    
    <?php 
	if(is_page_template('temp-onepage.php')){
	?>
    <script >
	jQuery(document).ready(function($){
		"use strict";
		/* Scroll To Navigation For Top menu*/
		jQuery('#top-nav').onePageNav({
			currentClass: 'current',
			changeHash: true,
			scrollSpeed: 800,
			scrollOffset: 0,
			scrollThreshold: 0.3,
			easing: 'swing',
			filter: ':not(.external a)'
		});
	});
	</script>
    <?php	
	}
	?>