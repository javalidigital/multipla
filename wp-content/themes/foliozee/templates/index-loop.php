<?php
/*inside posts loop call all the post-post_format() e.g. (post-video.php) Templates */
			global $fdata;
			global $content_blog_width;
			
			$temp = $wp_query; $wp_query= null;
			
			wp_reset_query();
			$wp_query = new WP_Query(); 
			$wp_query->query('paged='.$paged.'&post_type=post');
			
					if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post();?>
                    <!-- blog_post starts -->
                    <div <?php post_class('post'); ?>>
                        <!-- featured_image starts -->
                        <?php
							$format = get_post_format();
								//echo "<h1> Post Format: <strong>".$format."</strong></h1>";
							 if ( has_post_format( 'gallery' )) {
								get_template_part('templates/post', 'gallery');
							}if ( has_post_format( 'image' )) {
								get_template_part('templates/post', 'image');
							}if ( has_post_format( 'video' )) {
								get_template_part('templates/post', 'video');
							}if ( has_post_format( 'audio' )) {
								get_template_part('templates/post', 'audio');
							}if ( has_post_format( 'quote' )) {
								get_template_part('templates/post', 'quote');
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
                                	<?php  if( $fdata[ 'hide_author' ] != false ):  ?>
                                    <div class="post_meta">
                                        <span><?php _e( 'Posted by', 'kraftives' );?> 
 											<?php  the_author_posts_link(); ?> 
                                        </span>
                                    </div>
                                    <?php endif;?>
                                    <?php  if( $fdata[ 'comment_count' ] != false ):  ?>
                                    <div class="comments">
                                    	<a href="<?php  comments_link(); ?>"><i class="fa fa-comment-o"></i><span><?php comments_number( __('No', 'kraftives'), '1', '%' ); ?></span><?php comments_number( __('Comments', 'kraftives'), __('Comment', 'kraftives'), __('Comments', 'kraftives') ); ?></a>
                                    </div>
                                    <?php endif;?>
                                </div>
                                
                                <div class="meta_tags">
                                	<?php  if( $fdata[ 'hide_categories' ] != false ):  ?>
                                    <div class="post_meta post_cat">
                                       <?php if(get_the_category()){?>
                                        <span><?php _e( 'Category: ', 'kraftives' );?> <?php the_category( ',&nbsp;'); ?></span>
                                       <?php }?>
                                    </div>
                                    <?php endif;?>
                                    <?php  if( $fdata[ 'hide_tags' ] != false ):  ?>
                                    <div class="post_meta post_cat">
                                    	<?php the_tags( '<span>Tags: ', ',&nbsp;', '</span>' ); ?>
                                    </div>
                                    <?php endif;?>
                                </div>

                            </div>
                            <!-- meta_holder ends -->
                            <?php the_excerpt(); ?>
                            <a class="folio-link-url" href="<?php the_permalink(); ?>"><?php _e('Read more', 'kraftives'); ?><i class="fa fa-long-arrow-right"></i></a>
                        </div>
                        <!-- post_content ends -->
                    </div>
                    
                    <!-- blog_post ends -->
                    
                    <?php /*loop ends here:*/ 
                    endwhile;?>
                    
                    <?php
					//@TODO page navi on form theme options panel?>
                    <!-- pagenavi starts -->
                    
                    <div class="folio_navigation <?php echo "align_".$fdata['page_nav_ali'];?>">
                    	<?php if (function_exists('wp_pagenavi')){
							wp_pagenavi();
						}elseif (function_exists('folio_corenavi')){ folio_corenavi(); }?>
                    </div>
					<!-- pagenavi ends -->
                    <?php
					//}?>

                    <?php else: ?>
                    <!-- blog_post starts -->
                    <div class="post">	
                        <div class="<?php echo $content_blog_width;?> post_content">
                        	<p><?php echo _e('No posts were found..', 'kraftives'); ?></p>
                            
                        </div>
                    </div>
                    <!-- blog_post ends -->	
                    <?php endif;
					wp_reset_postdata();
					$wp_query= $temp; ?>
 