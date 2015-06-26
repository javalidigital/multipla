<!-- blog_single starts 670 x 377 -->
	<?php global $post; ?>
    <div class="featured_image">
        <?php if ( has_post_thumbnail() ) {?>
        	<?php $thumb_image = aq_resize(wp_get_attachment_url(get_post_thumbnail_id()), $width, $height, true, true, true);?>	
            <a href="<?php the_permalink(); ?>"><img alt="Thumbnail" src="<?php echo $thumb_image;?>" /></a>
        <?php } ?>
    </div>
<!-- blog_single ends -->