            	<?php
                $post_id =  get_the_ID();
		  		$sound_cloud_url = get_post_meta($post_id, "sound_cloud_url",true );
				if($sound_cloud_url){
				 //enqueu script for soundcloud api
			wp_enqueue_script('soundcloud-api_js'); ?>
			<div class="featured_image soundcloud_widget">

                <ifr<?php echo 'ame';?> id="sc-widget-<?php echo $post_id;?>" src="https://w.soundcloud.com/player/?url=<?php echo $sound_cloud_url;?>&amp;=false&amp;auto_advance=true&amp;buying=true&amp;liking=true&amp;download=true&amp;sharing=true&amp;show_artwork=true&amp;show_comments=true&amp;show_playcount=true&amp;show_user=true&amp;hide_related=false&amp;visual=true&amp;start_track=0&amp;callback=true"></iframe>
                

                <!--<audio src="http://kolber.github.io/audiojs/demos/mp3/juicy.mp3" preload="auto"></audio>-->
            </div>
            <script>
			  jQuery(document).ready(function(){
				"use script";
				/* SOund Cloud PLayer */
				var widgetIframe = document.getElementById('sc-widget-<?php echo $post_id;?>'),
				widget       = SC.Widget(widgetIframe);
				
				widget.bind(SC.Widget.Events.READY, function() {
					widget.bind(SC.Widget.Events.PLAY, function() {
						// get information about currently playing sound
						/*widget.getCurrentSound(function(currentSound) {
						console.log('sound ' + currentSound.get('') + 'began to play');
						});*/
					});
					// get current level of volume
					widget.getVolume(function(volume) {
						console.log('current volume value is ' + volume);
					});
					// set new volume level
					widget.setVolume(50);
					// get the value of the current position
				});
			  });
			</script>
            <?php
				}?>
					
