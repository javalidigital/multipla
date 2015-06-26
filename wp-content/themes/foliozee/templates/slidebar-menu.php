
<?php if(defined('SLIDEBAR')){?>
    <section class="folio-slidebar <?php if ( is_admin_bar_showing() ) { echo "admin_login"; }?>">
                    <div class="sb-slidebar sb-right">
                        <!--main-nav starts-->
                        <nav class="main-nav">
                        
                            <!-- logo starts -->
                            <?php if( defined('SITE_LOGO') && SITE_LOGO !== NULL ){?>
                            <div class="logo">
                                <figure>
                                    <a href="<?php echo home_url(); ?>">
                                    	<img src="<?php echo SITE_LOGO; ?>" alt="Folio Zee Logo">
                                    </a>
                                </figure>
                            </div>
                            <?php } ?>
                            <?php 
                            $folio_menu = ("folio_primarymenu"===get_post_meta( $post->ID, 'select_menu_option', true ))?'':get_post_meta( $post->ID, 'select_menu_option', true );
                                            
                                                
                                            $defaults = array(
                                                'theme_location'  => 'header-primary-menu',
                                                'menu'            => $folio_menu,
                                                'container'       => false,
                                                'container_class' => false,
                                                'menu_class'      => false,
                                                'echo'            => true,
                                                'fallback_cb'     => 'wp_page_menu',
                                                'items_wrap'      => '<ul id="head-nav" class="%2$s top-nav">%3$s</ul>',
                                            );
                                            
                                            wp_nav_menu( $defaults );
                            
                            
                            ?>
                            
                        </nav>
                        <!-- main-nav ends-->
                    </div>
                </section>
                <?php } ?>