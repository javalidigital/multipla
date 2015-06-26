<?php
class kraftive_youtube_widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'kraft_youtube', // Base ID
            __( 'Kraftive: Youtube Video', 'kraftives'), // Name
            array( 'description' => __( 'Vimeo video player works with youtube video id', 'kraftives' ), ) // Args
        );
    }

    public function form( $instance ) {
		$defaults = array( 'title' => '', 'youtube_id' => '' );
		$instance = wp_parse_args( (array) $instance, $defaults ); 
?>
        <p>
          <label for="<?php echo $this->get_field_id( 'title' ); ?>">
            <?php _e( 'Title:', 'kraftives' ); ?>
          </label>
          <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
        </p>
        <p>
          <label for="<?php echo $this->get_field_id( 'youtube_id' ); ?>">
            <?php _e( 'Yoututbe video id:', 'kraftives' ); ?>
          </label>
          <input class="widefat" id="<?php echo $this->get_field_id( 'youtube_id' ); ?>" name="<?php echo $this->get_field_name( 'youtube_id' ); ?>" type="text" value="<?php echo esc_attr(  $instance['youtube_id'] ); ?>" />
        </p>
	<?php
    }
    
	public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = wp_filter_nohtml_kses(strip_tags( $new_instance['title'] ));
        $instance['youtube_id'] = wp_filter_nohtml_kses(strip_tags( $new_instance['youtube_id'] ));
        return $instance;
    }

    public function widget( $args, $instance ) {
        extract( $args );

		$title = apply_filters( 'widget_title', $instance['title'] );
		$youtube_id = $instance['youtube_id'];
        wp_enqueue_script('fitvids_js');
        ?>
	    <?php 
		echo $before_widget;
		if ( ! empty( $title ) )
            echo $before_title . $title . $after_title; 

        if ( $youtube_id ) {
			$iframe_var = 'iframe';
			echo '<'.$iframe_var.' width="560" height="315" src="//www.youtube.com/embed/'.$youtube_id.'" allowfullscreen></'.$iframe_var.'>';
        }?> 
			<script>
			  jQuery(document).ready(function(){
				"use strict";
				// For Fit Vimeo Youtube Videos Target your .container, .wrapper, .post, etc.
				jQuery(".widget_kraft_youtube").fitVids();
			  });
			</script>
		<?php
        echo $after_widget;

    }

}