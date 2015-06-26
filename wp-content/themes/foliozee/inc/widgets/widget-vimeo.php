<?php
class kraftive_vimeo_widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'kraft_vimeo', // Base ID
            __( 'Kraftive: Vimeo Video', 'kraftives'), // Name
            array( 'description' => __( 'Vimeo video player works with vimeo video id', 'kraftives' ), ) // Args
        );
    }

    public function form( $instance ) {
 
		$defaults = array( 'title' => '', 'vimeo_id' => '' );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

        <p>
          <label for="<?php echo $this->get_field_id( 'title' ); ?>">
            <?php _e( 'Title:', 'kraftives' ); ?>
          </label>
          <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
        </p>
        <p>
          <label for="<?php echo $this->get_field_id( 'vimeo_id' ); ?>">
            <?php _e( 'Vimeo video id:', 'kraftives' ); ?>
          </label>
          <input class="widefat" id="<?php echo $this->get_field_id( 'vimeo_id' ); ?>" name="<?php echo $this->get_field_name( 'vimeo_id' ); ?>" type="text" value="<?php echo esc_attr( $instance['vimeo_id'] ); ?>" />
        </p>
	<?php
    }
    
	public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = wp_filter_nohtml_kses(strip_tags( $new_instance['title'] ));
        $instance['vimeo_id'] = wp_filter_nohtml_kses(strip_tags( $new_instance['vimeo_id'] ));
        return $instance;
    }

    public function widget( $args, $instance ) {
        extract( $args );

		$title = apply_filters( 'widget_title', $instance['title'] );
		$vimeo_id = $instance['vimeo_id'];
        wp_enqueue_script('fitvids_js');
        ?>
	    <?php 
		echo $before_widget;
		if ( ! empty( $title ) )
            echo $before_title . $title . $after_title; 

        if ( $vimeo_id ) {
			$iframe_var = 'iframe';
			echo '<'.$iframe_var.' width="638" height="360" allowfullscreen="" mozallowfullscreen="" webkitallowfullscreen="" src="http://player.vimeo.com/video/'.$vimeo_id.'"></'.$iframe_var.'>';
        }?> 
			<script>
			  jQuery(document).ready(function(){
				"use strict";
				// For Fit Vimeo Youtube Videos Target your .container, .wrapper, .post, etc.
				jQuery(".widget_kraft_vimeo").fitVids();
			  });
			</script>
		<?php
        echo $after_widget;

    }

}