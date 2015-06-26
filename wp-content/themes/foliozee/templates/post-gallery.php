<?php
	//enqueu script for responsiveslides_js
	wp_enqueue_script('responsiveslides_js');
	wp_enqueue_style('responsiveslides_css');
	$galleryArray = get_post_gallery_ids($post->ID); 
	if($galleryArray){
		echo '<div class="featured_image">
					<ul class="rslides">';
					foreach ($galleryArray as $id) { 
						$image_resize = aq_resize(wp_get_attachment_url( $id ), 770, 430, true, true, true);
						$image_resize = $image_resize?$image_resize:wp_get_attachment_url( $id );
					?>
						
						<li><img src="<?php echo $image_resize; ?>" alt=""></li>
	<?php
					 }
		echo '	</ul>
			  </div>';
	
	?>
<script type="text/javascript">
	  jQuery(document).ready(function($){
		  "use script";
			/* ResponsiveSlider Internal Posts Gallery slider */
			// Slideshow 2
			$(".rslides").responsiveSlides({
				auto: true,
				pager: true,
				nav: true,
				speed: 500,
				maxwidth: 870,
				prevText: "",
				nextText: "",
				namespace: "transparent-btns"
			});
	  });
</script>
    <?php
	}//if($galleryArray)?>