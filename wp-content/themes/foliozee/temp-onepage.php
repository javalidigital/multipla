<?php
/*Template Name: One Page Template */
	get_header();

       	wp_reset_query();
		
		if ( have_posts() ) : while ( have_posts() ) : the_post();
		
			the_content();
		
		/*loop ends here:*/ 
		endwhile;
		
		else: ?>
		<!-- blog_post starts -->
		<div class="blog_post">	
			<div class="post_content">
				<p><?php echo _e('No page content found...', 'kraftives'); ?></p>
			</div>
		</div>
		<!-- blog_post ends -->	
		<?php 
		endif;
		wp_reset_postdata();
		
	get_footer();