<?php
global $fdata;
					/*inside posts loop call all the post-post_format() e.g. (post-video.php) Templates */
					//@TODO navigation postion 
					global $content_blog_width;
					wp_reset_query();
		
					if ( have_posts() ) : while ( have_posts() ) : the_post();?>
                    
                    <!-- blog_post starts -->
                    <div <?php post_class('post'); ?>>
                        <!-- featured_image starts -->
                        <?php
							$format = get_post_format();
								//echo "<h1> Post Format: <strong>".$format."</strong></h1>";
							 if ( has_post_format( 'gallery' )) {
								get_template_part('templates/single-post', 'gallery');
							}if ( has_post_format( 'image' )) {
								get_template_part('templates/single-post', 'image');
							}if ( has_post_format( 'video' )) {
								get_template_part('templates/single-post', 'video');
							}if ( has_post_format( 'audio' )) {
								get_template_part('templates/single-post', 'audio');
							}if ( has_post_format( 'quote' )) {
								get_template_part('templates/single-post', 'quote');
							}?>
                        <!-- featured_image ends -->
                        
                        <!-- post_content starts -->
                        <div class="post_content">
                            <!-- date_holder starts -->
                            <div class="date_holder">
                                <div class="date align_center">
                                    <span class="date_day"><?php echo get_the_date('d');?></span>
                                    <span class="date_month"><?php echo get_the_date('M');?></span>
                                </div>
                            </div>
                            <!-- date_holder ends -->
                            <!-- meta_holder starts -->
                            <div class="meta_holder">
                                <div class="title_holder">
                                    <h2 class="post_title">
                                    	<a href="<?php the_permalink(); ?>">
                                    		<?php if(!get_the_title()){ the_permalink();  }else{the_title();}?>
                                        </a>
                                    </h2>
                                </div>
                                
                                <div class="meta_list">
                                    <div class="post_meta">
                                        <span><?php _e( 'Posted by', 'kraftives' );?> 
 											<?php  the_author_posts_link(); ?> 
                                        </span>
                                    </div>
                                    <div class="comments">
                                    	<a href="<?php  comments_link(); ?>"><i class="fa fa-comment-o"></i><span><?php comments_number( __('No', 'kraftives'), '1', '%' ); ?></span><?php comments_number( __('Comments', 'kraftives'), __('Comment', 'kraftives'), __('Comments', 'kraftives') ); ?></a>
                                    </div>
                                </div>
                                
                                <div class="meta_tags">
                                    <div class="post_meta post_cat">
                                       <?php if(get_the_category()){?>
                                        <span><?php _e( 'Category: ', 'kraftives' );?> <?php the_category( ',&nbsp;'); ?></span>
                                       <?php }?>
                                    </div>
                                    <div class="post_meta post_cat">
                                    	<?php the_tags( '<span>Tags: ', ',&nbsp;', '</span>' ); ?>
                                    </div>
                                </div>
                            </div>
                            <!-- meta_holder ends -->
                           
                           
                            <?php the_content(); ?>
							<?php 
							$defaults = array(
								'before'           => '<div class="page_links_holder"><div class="page_links"><span class="page-links-title">' . __( 'Pages:','kraftives' ).'</span>',
								'after'            => '</div></div>',
								'link_before'      => '',
								'link_after'       => '',
								'next_or_number'   => 'number',
								'separator'        => ' ',
								'nextpagelink'     => __( 'Next page', 'kraftives' ),
								'previouspagelink' => __( 'Previous page', 'kraftives' ),
								'pagelink'         => '<span>%</span>',
								'echo'             => 1
							);
							wp_link_pages($defaults); ?>
                                <?php
                                // @Todo Social bar position after post title
                                if($fdata['social_sharing_bar']==true && $fdata['social_sharing_bar_pos']==="after_title" ){?>
                                <!-- social_media starts -->
                                <?php get_template_part('templates/socialbar', 'template');?>
                                <!-- social_media starts -->
                                <?php
                                }?>
                                
                                <?php
                                // Social bar position before comments
                                if($fdata['social_sharing_bar']==true && $fdata['social_sharing_bar_pos']==="before_comment" ){?>
                                <!-- social_media starts -->
                                <?php get_template_part('templates/socialbar', 'template');?>
                                <!-- social_media starts -->
                                <?php
                                }?>                            
                        </div>
                        <!-- post_content ends -->
                    </div>
                    <!-- blog_post ends -->

                    <?php 
					// Prev/Next Navigation on single post Before Comment
					if($fdata['prev_next_nav']==true && $fdata['prev_next_nav_position']==="before_comment" ){?>
                    <!-- page_nav starts -->
                    <?php get_template_part('templates/single-prev-next', 'nav');?>
                    <!-- page_nav ends -->
                    <?php
					}?>
                                        
                    <!-- comments_section starts -->
                    <div id="comments_section">
                        <?php comments_template(); ?>
                    </div>
					<!-- comments_section ends -->
                    
                    <?php 
					// Prev/Next Navigation on single post After Comment
					if($fdata['prev_next_nav']==true && $fdata['prev_next_nav_position']==="after_comment" ){?>
                    <!-- page_nav starts -->
                    <?php get_template_part('templates/single-prev-next', 'nav');?>
                    <!-- page_nav ends -->
                    <?php
					}?>

                    <?php /*loop ends here:*/ 
                    endwhile;?>
                    
                    
                    <?php else: ?>
                    <!-- blog_post starts -->
                    <div class="blog_post">	
                        <div class="<?php echo $content_blog_width;?> post_content">
                        	<p><?php echo _e('No post found..', 'kraftives'); ?></p>
                            
                        </div>
                    </div>
                    <!-- blog_post ends -->	
                    <?php endif;
					wp_reset_postdata();
					?>