<?php 
		  $post_id =  get_the_ID();
		  $quote_style = get_post_meta($post_id, "select_quote_styles" ,true );
		  $quote_text = get_post_meta($post_id, "quote_text" ,true );
		  $quote_author = get_post_meta($post_id, "quote_author" ,true );
		 ?>
         	<div class="featured_image quote_post">
				<!-- .quote starts -->
                <blockquote class="quote">
                    <p><?php echo $quote_text;?></p>
                    <strong>&ndash; <?php echo $quote_author;?></strong>
                </blockquote>
                <!-- .quote ends -->
          	</div>
                    
