<?php

class kraftive_quotes_widget extends WP_Widget {
    public function __construct() {

        parent::__construct(
            'kraft_quotes', // Base ID
            __('Kraftive: Quotes', 'kraftives'), // Name
            array( 'description' => __( 'Quotes with 5 different theme styles', 'kraftives' ), ) // Args
        );

    }

    public function form( $instance ) {
        $defaults = array( 'title' => '', 'quote_text' => '', 'author_name' => '', 'quote_style' => 'quote_1' );
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		
		
?>

        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'kraftives' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
        </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'quote_text' ); ?>"><?php _e( 'Quote Text:', 'kraftives' ); ?></label>
        <textarea class="widefat" id="<?php echo $this->get_field_id( 'quote_text' ); ?>" name="<?php echo $this->get_field_name( 'quote_text' ); ?>"><?php echo esc_attr( $instance['quote_text'] ); ?></textarea>
    </p>
    
        <p>
            <label for="<?php echo $this->get_field_id( 'author_name' ); ?>"><?php _e( 'Author Name:', 'kraftives' ); ?></label>

            <input class="widefat" id="<?php echo $this->get_field_id( 'author_name' ); ?>" name="<?php echo $this->get_field_name( 'author_name' ); ?>" type="text" value="<?php echo esc_attr( $instance['author_name'] ); ?>" />

        </p>
    
    <p>

      <label for="<?php echo $this->get_field_id( 'quote_style' ); ?>"><?php _e( 'Quote Style:', 'kraftives' ); ?></label>
	  <select class="widefat" id="<?php echo $this->get_field_id( 'quote_style' ); ?>" name="<?php echo $this->get_field_name( 'quote_style' ); ?>">
      	<option value="quote_1" <?php if(esc_attr( $instance['quote_style'] )=='quote_1'){ echo 'selected="selected"';}?>>Style 1</option>
        <option value="quote_2" <?php if(esc_attr( $instance['quote_style'] )=='quote_2'){ echo 'selected="selected"';}?>>Style 2</option>
        <option value="quote_3" <?php if(esc_attr( $instance['quote_style'] )=='quote_3'){ echo 'selected="selected"';}?>>Style 3</option>
        <option value="quote_4" <?php if(esc_attr( $instance['quote_style'] )=='quote_4'){ echo 'selected="selected"';}?>>Style 4</option>
        <option value="quote_5" <?php if(esc_attr( $instance['quote_style'] )=='quote_5'){ echo 'selected="selected"';}?>>Style 5</option>
      </select>	
    </p>
        <?php

    }



    public function update( $new_instance, $old_instance ) {

        $instance = array();

        $instance['title'] = wp_filter_nohtml_kses(strip_tags( $new_instance['title'] ));

        $instance['quote_text'] = wp_filter_nohtml_kses(strip_tags( $new_instance['quote_text'] ));

        $instance['author_name'] = wp_filter_nohtml_kses(strip_tags( $new_instance['author_name'] ));

        $instance['quote_style'] = wp_filter_nohtml_kses(strip_tags( $new_instance['quote_style'] ));

        return $instance;

    }



    public function widget( $args, $instance ) {

        extract( $args );

            $title = apply_filters( 'widget_title', $instance['title'] );

            $quote_text = $instance['quote_text'];

            $quote_style = $instance['quote_style'];

            $author_name = $instance['author_name'];

        ?>

    <?php echo $before_widget;
		
		if ( ! empty( $title ) )

            echo $before_title . $title . $after_title; 
        
		    
        if ( $quote_text ) {
         	echo '<blockquote class="'.$quote_style.'">
				<p>'.$quote_text.'</p>';
			if($author_name){ echo	'<strong>'.$author_name.'</strong>';}
			echo '</blockquote>';  
        }
		
        echo $after_widget;

    }



}

