<?php
					/*inside posts loop call all the post-post_format() e.g. (post-video.php) Templates */
					//@TODO navigation postion 
					wp_reset_query();
		
					if ( have_posts() ) : while ( have_posts() ) : the_post();?>
                    <?php
						the_content();
					?>
                    <?php /*loop ends here:*/ 
                    endwhile;?>
                    
                    
                    <?php else: ?>
                    <!-- blog_post starts -->
                    <div class="post">	
                        <div class="post_content">
                        	<p><?php echo _e('No page were found..', 'kraftives'); ?></p>
                        </div>
                    </div>
                    <!-- blog_post ends -->	
                    <?php endif;
					wp_reset_postdata();
					?>