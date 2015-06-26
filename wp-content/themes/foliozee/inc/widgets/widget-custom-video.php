<?php
class kraftive_custom_video_widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'kraft_custom_video', // Base ID
            __('Kraftive: HTML5 Video', 'kraftives'), // Name
            array( 'description' => __( 'Self hosted .mp4 and .webm video plays on HTML5 Video Player', 'kraftives' ), ) // Args
        );
    }

    public function form( $instance ) {
       	$defaults = array( 'title' => '', 'mp4_url' => '', 'webm_url' => '' );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

        <p>
          <label for="<?php echo $this->get_field_id( 'title' ); ?>">
            <?php _e( 'Title:', 'kraftives' ); ?>
          </label>
          <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
        </p>
        <p>
          <label for="<?php echo $this->get_field_id( 'mp4_url' ); ?>">
            <?php _e( 'MP4 video URL:', 'kraftives' ); ?>
          </label>
          <input class="widefat" id="<?php echo $this->get_field_id( 'mp4_url' ); ?>" name="<?php echo $this->get_field_name( 'mp4_url' ); ?>" type="text" value="<?php echo esc_url( $instance['mp4_url'] ); ?>" />
        </p>
        <p>
          <label for="<?php echo $this->get_field_id( 'webm_url' ); ?>">
            <?php _e( 'WebM video URL:', 'kraftives' ); ?>
          </label>
          <input class="widefat" id="<?php echo $this->get_field_id( 'webm_url' ); ?>" name="<?php echo $this->get_field_name( 'webm_url' ); ?>" type="text" value="<?php echo esc_url( $instance['webm_url'] ); ?>" />
        </p>
        <p>
          <label for="<?php echo $this->get_field_id( 'video_poster' ); ?>">
            <?php _e( 'Video Poster URL:', 'kraftives' ); ?>
          </label>
          <input class="widefat" id="<?php echo $this->get_field_id( 'video_poster' ); ?>" name="<?php echo $this->get_field_name( 'video_poster' ); ?>" type="text" value="<?php echo esc_url( $instance['video_poster'] ); ?>" />
        </p>
	<?php
    }
    
	public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = wp_filter_nohtml_kses(strip_tags( $new_instance['title'] ));
        $instance['mp4_url'] = wp_filter_nohtml_kses(strip_tags( $new_instance['mp4_url'] ));
		$instance['webm_url'] = wp_filter_nohtml_kses(strip_tags( $new_instance['webm_url'] ));
		$instance['video_poster'] = wp_filter_nohtml_kses(strip_tags( $new_instance['video_poster'] ));
        return $instance;
    }

    public function widget( $args, $instance ) {
        extract( $args );

		$title = apply_filters( 'widget_title', $instance['title'] );
		$mp4_url = $instance['mp4_url'];
		$webm_url = $instance['webm_url'];
		$video_poster = $instance['video_poster'];
        wp_enqueue_style('video-js_css');
        wp_enqueue_script('video_js');
		
        ?>
	    <?php 
		echo $before_widget;
		if ( ! empty( $title ) )
            echo $before_title . $title . $after_title; 
		
        if ( $mp4_url ) {
			$video_poster = aq_resize($video_poster, 476);
			echo '
			<video height="200" class="video-js vjs-default-skin" controls preload="auto" ';echo isset($video_poster)?'poster="'.$video_poster.'"':'';
			echo ' data-setup="{}" >
				<source src="'.$mp4_url.'" type="video/mp4">
				<source src="'.$webm_url.'" type="video/webm">
			</video>';
        }?> 

		<?php
        echo $after_widget;

    }

}