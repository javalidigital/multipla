<?php

class kraftive_text_subtitle extends WP_Widget {
	function kraftive_text_subtitle() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'widget_kraft_text', 'description' => __( 'Text block with HTML supports basic HTML tags and classes on them','kraftives') );
		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'kraftive_text_subtitle' );
		/* Create the widget. */
		$this->WP_Widget( 'kraftive_text_subtitle', __('Kraftive: Text with HTML', 'kraftives'), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		//get theme options
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        } else {
            $title = __( 'Text block', 'kraftives' );
        }
       
		extract( $args );
		$text = $instance['text'];

		/* show the widget content without any headers or wrappers */
        echo $before_widget;

        if ( ! empty( $title ) ){
            echo $before_title . $title . $after_title; 
		}
				

		$output_text = do_shortcode($text);
		echo $output_text; ?>

    <?php echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
        $instance['title'] =  $new_instance['title'] ;

		/* Strip tags (if needed) and update the widget settings. */
		$instance['text'] = wp_kses($new_instance['text'], array(
																'a' => array(
																	'href' => array(),
																	'title' => array(),
																	'class' => array()
																),
																'br' => array(),
																'em' => array('class' => array()),
																'strong' => array('class' => array()),
																'div' => array('class' => array()),
																'span' => array('class' => array()),
																'p' => array('class' => array()),
																'ul' => array('class' => array()),
																'ol' => array('class' => array()),
																'li' => array('class' => array()),
																'h1' => array('class' => array()),
																'h2' => array('class' => array()),
																'h3' => array('class' => array()),
																'h4' => array('class' => array()),
																'h5' => array('class' => array()),
																'h6' => array('class' => array()),
															));
		return $instance;
	}

	function form( $instance ) {

		/* Set up some default widget settings. */

		$defaults = array( 'title' => '', 'text' => '');

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>


    <p>
      <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'kraftives'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_html($instance['title']); ?>"/>
    </p>

    <p>
      <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text/HTML', 'kraftives'); ?></label><br/>
      <textarea rows="10" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" class="widefat"><?php echo $instance['text']; ?></textarea>
    </p>
        <?php
	}

}