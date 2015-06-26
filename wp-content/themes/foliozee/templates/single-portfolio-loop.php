    <!-- content_area project starts -->
            <div class="row">
            	<!-- project_ajax_content starts -->
				<?php
                /*inside posts loop call all the post-post_format() e.g. (post-video.php) Templates */
                //@TODO navigation postion 
                wp_reset_query();
            
                if ( have_posts() ) : while ( have_posts() ) : the_post();?>

                    <div id="project_ajax_content">
                        <div class="content_bar project">
                           <?php
							$format = get_post_format();
								//echo "<h1> Post Format: <strong>".$format."</strong></h1>";
							 if ( has_post_format( 'gallery' )) {
								get_template_part('templates/single-portfolio', 'gallery');
							}if ( has_post_format( 'image' )) {
								get_template_part('templates/single-portfolio', 'image');
							}if ( has_post_format( 'video' )) {
								get_template_part('templates/single-portfolio', 'video');
							}
							$content_width = $format>''?"col-sm-5":"col-sm-10";
							?>

                            <?php
								$post_id = $post->ID;
                                $portfolio_client = get_post_meta($post_id, "portfolio_client",true );
								$portfolio_url = get_post_meta($post_id, "portfolio_url",true );
								$portfolio_url_title = get_post_meta($post_id, "portfolio_url_title",true );
								$portfolio_tagline = get_post_meta($post_id, "portfolio_tagline",true );
								$portfolio_launch_project_link = get_post_meta($post_id, "portfolio_launch_project_link",true );
								$portfolio_launch_project_link = !empty($portfolio_launch_project_link)? $portfolio_launch_project_link : 'javascript:void(0);'
							?>
                            <div class="<?php echo $content_width; ?>">
                            	<div class="project_detail">
                                	<div class="project_text">
                                    	<div class="hgroup">
                                            <h2><?php the_title(); ?></h2>
                                            <h3><?php echo $portfolio_tagline; ?></h3>
                                        </div>
                                        <?php the_content(); ?>
                                    </div>
                                    <div class="project_meta">
                                        <span class="meta_title"><?php _e("Client", "kraftives"); ?></span>
                                        <span class="meta_description"><?php echo $portfolio_client;?></span>
                                    </div>
                                    <div class="project_meta">
                                        <span class="meta_title"><?php _e("Client's Website", "kraftives"); ?></span>
                                        <span class="meta_description">
                                            <a href="<?php echo $portfolio_url;?>">
                                                <?php echo !empty($portfolio_url_title)? $portfolio_url_title: $portfolio_url;?>
                                            </a>
                                        </span>
                                    </div>
                                    <a href="<?php echo $portfolio_launch_project_link; ?>" class="folio-link-url project_launch">
                                    	<?php _e("Launch Project", "kraftives"); ?>
                                        <i class="fa fa-long-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- project_ajax_content ends -->
                <?php /*loop ends here:*/ 
				endwhile;?>
				<?php else: ?>
                	<p><?php echo _e('No portfolio found..', 'kraftives'); ?></p>
				<?php endif;
				wp_reset_postdata();
				?>
                <!-- page_nav starts -->
                <?php get_template_part('templates/single-prev-next', 'nav');?>
                <!-- page_nav ends -->
            </div>
        </div>
    </section>
    <!-- content_area project ends -->
