<!-- blog_single starts 670 x 377 -->
	<div class="featured_image">
        <?php if ( has_post_thumbnail() ) {?>
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('blog-post-image'); ?></a>
        <?php } ?>
    </div>
<!-- blog_single ends -->