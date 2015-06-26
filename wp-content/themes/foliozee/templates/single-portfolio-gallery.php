<?php
	//enqueu script for responsiveslides_js
	wp_enqueue_script('responsiveslides_js');
	wp_enqueue_style('responsiveslides_css');
	$galleryArray = get_post_gallery_ids($post->ID); 
	if($galleryArray){?>
	<div class="col-sm-7 featured_image">
		<ul class="rslides">
			<?php foreach ($galleryArray as $id) { ?>
				<li><img alt="" src="<?php echo aq_resize( wp_get_attachment_url( $id ), 670, 450, true, true, true ); ?>"></li>
			<?php }?>                                
		</ul>
	</div>
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
                maxwidth: 800,
				prevText: "",
				nextText: "",
                namespace: "transparent-btns"
              });
          });
        </script>
    <?php
	}//if($galleryArray)?>
    