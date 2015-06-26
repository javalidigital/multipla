<?php 
		  //@TODO enqueu script for videojs
		  $post_id =  get_the_ID();
		  $video_type = get_post_meta($post_id, "select_videos" ,true );
		  if( $video_type === "vimeo_hosted"  ) {//vimeo_video_id
		  //enqueu script for fitVids
		  wp_enqueue_script('fitvids_js');
		  ?>
          <?php
		  $vimeo_id = get_post_meta($post_id, "vimeo_video_id",true );
		  	if($vimeo_id){?>
            <div class="featured_image video_post">
                <?php echo '<ifr'.'ame width="'.$width.'" height="'.$height.'" allowfullscreen="" mozallowfullscreen webkitallowfullscreen src="http://player.vimeo.com/video/'.$vimeo_id.'"></iframe>';?>
            </div>
            	<script>
				  jQuery(document).ready(function(){
					"use script";
					// For Fit Vimeo Youtube Videos Target your .container, .wrapper, .post, etc.
					jQuery(".featured_image").fitVids();
				  });
				</script>
            <?php
			}// if($vimeo_id) ends?>
	<?php }
		  if( $video_type === "youtube_hosted" ) {//youtube_video_id
		  //enqueu script for fitVids
		  wp_enqueue_script('fitvids_js');
		  ?>
          	<?php
			$youtube_id = get_post_meta($post_id, "youtube_video_id",true );
			if($youtube_id){?>
            <div class="featured_image video_post">
                <?php echo '<ifr'.'ame title="YouTube video player" class="youtube-player" type="text/html" width="'.$width.'" height="'.$height.'" src="www.youtube.com/watch?v='.$youtube_id.'" frameborder="0" allowFullScreen></iframe>';?>
            </div>
            	<script>
				  jQuery(document).ready(function(){
					"use script";
					// For Fit Vimeo Youtube Videos Target your .container, .wrapper, .post, etc.
					jQuery(".featured_image").fitVids();
				  });
				</script>
            <?php
			}// if($youtube_id) ends?>
	<?php }
	      if( $video_type === "self_hosted" ) {//self_hosted_mp4 //self_hosted_webm
		  //@enqueu script for video_js
		  wp_enqueue_style('video-js_css');
		  wp_enqueue_script('video_js');
		  	$self_hosted_mp4 = get_post_meta($post_id, "self_hosted_mp4",true );
			$self_hosted_webm = get_post_meta($post_id, "self_hosted_webm",true );
			$self_hosted_poster = get_post_meta($post_id, "self_hosted_poster",true );
			$article_image = aq_resize($self_hosted_poster['url'], $width, $height, true, true, true);
			$article_image = $article_image?$article_image:$self_hosted_poster;
			
			if($self_hosted_mp4 || $self_hosted_webm){
			?>
            <div class="featured_image video_post">
                <a href="<?php the_permalink();?>">
                    <span class="play-button"></span>
                    <img src="<?php echo $article_image; ?>" alt="featured_images">
                </a>
            </div>
            <?php
			} //if($self_hosted_mp4 || $self_hosted_webm) ends?>
	<?php }?>