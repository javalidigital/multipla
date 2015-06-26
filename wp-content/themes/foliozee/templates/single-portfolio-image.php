<!-- starts 940 x 440 -->
<div class="col-sm-7 featured_image">

    <?php 
	global $post;
	$image = get_post_meta( $post->ID, 'portfolio_image_format', true );
	
	if ( $image ) {
		$project_image = aq_resize($image['url'], 670, 450, false, true, true);
		?>
        <a href="<?php the_permalink(); ?>">
        	<img src="<?php echo $project_image; ?>" alt="<?php the_title(); ?>" />
        </a>
    <?php } ?>
</div>