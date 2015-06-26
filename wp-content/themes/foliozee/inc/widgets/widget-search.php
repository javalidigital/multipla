<?php

class kraftive_search_widget extends WP_Widget {

	function kraftive_search_widget() {

		/* Widget settings. */
		$widget_ops = array( 'classname' => 'widget_kraft_search', 'description' => __( 'Search widget with placeholder', 'kraftives') );

		/* Widget control settings. */
		$control_ops = array( 'id_base' => 'kraftive_search_widget' );

		/* Create the widget. */
		$this->WP_Widget( 'kraftive_search_widget', __('Kraftive: Search widget', 'kraftives'), $widget_ops, $control_ops );

	}

	function widget( $args, $instance ) {
		//get theme options
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        } else {
            $title = __( 'Search', 'kraftives' );
        }
        if ( isset( $instance[ 'text' ] ) ) {
            $text = $instance[ 'text' ];
        }else{
			$title = __( 'Enter Your Keyword', 'kraftives' );
		}

		extract( $args );

		/* show the widget content without any headers or wrappers */

        echo $before_widget;

        if ( ! empty( $title ) )

            echo $before_title . $title . $after_title; ?>

            <form role="search" method="get" id="searchform" class="form-search" action="<?php echo home_url('/'); ?>">
                <div>
                    <label for="s" class="screen-reader-text"></label>
                    <input type="text" value="" name="s" id="s" class="" placeholder="<?php if ( ! empty( $text ) ){echo $text;}else{echo 'Enter Your Keyword';} ?>">
                    <input type="submit" id="searchsubmit" value="" class="">
                </div>
            </form>
        
    <?php echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
        $instance['title'] = wp_filter_nohtml_kses(strip_tags( $new_instance['title'] ));
		/* Strip tags (if needed) and update the widget settings. */
		$instance['text'] = wp_filter_nohtml_kses($new_instance['text']);
		return $instance;
	}

	function form( $instance ) {

		/* Set up some default widget settings. */

		$defaults = array( 'title' => '' , 'text' => '' );

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

    <p>
      <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'kraftives'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>"/>
    </p>

    <p>
      <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Placeholder', 'kraftives'); ?></label><br/>
      <input class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" type="text" value="<?php echo esc_attr($instance['text']); ?>"/>
    </p>

        <?php

	}

}