<?php
class kraftive_facebook_widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'kraft_facebook', // Base ID
            __('Kraftive: Facebook widget', 'kraftives'), // Name
            array( 'description' => __( 'Facebook likebox widget, supports all options provided by facebook', 'kraftives' ), ) // Args
        );
    }

    public function form( $instance ) {

        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        } else {
            $title = __( 'Facebook widget', 'kraftives' );
        }

        if ( isset( $instance[ 'width' ] ) ) {
            $width = $instance[ 'width' ];
        } else {
            $width = 300;
        }
        if( isset($instance[ 'color' ] ) ){
            $color = $instance[ 'color' ];
        } else {
            $color = 'dark';
        }
        if( isset($instance[ 'stream' ] ) ){
            $stream = $instance[ 'stream' ];
        } else {
            $stream = 'false';
        }
        if( isset($instance[ 'faces' ] ) ){
            $faces = $instance[ 'faces' ];
        } else {
            $faces = 'true';
        }
        if( isset($instance[ 'url' ] ) ){
            $url = $instance[ 'url' ];
        } else {
            $url = 'WordPress';
        }
        if( isset($instance[ 'header' ] ) ){
            $header = $instance[ 'header' ];
        } else {
            $header = 'false';
        }
        if( isset($instance[ 'header' ] ) ){
            //$css = $instance[ 'css' ];
        }
        if( isset($instance[ 'border' ] ) ){
            $border = $instance[ 'border' ];
        }else{
			$border = "true";
		}
        ?>

    <p>
       <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'kraftives' ); ?></label>
       <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>

        <p>

            <label for="<?php echo $this->get_field_id( 'url' ); ?>"><?php _e( 'Facebook Name: ( ex: WordPress )', 'kraftives' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" type="text" value="<?php echo esc_attr( $url ); ?>" />

        </p>

        <p>

            <label for="<?php echo $this->get_field_id( 'width' ); ?>"><?php _e( 'Width(px):', 'kraftives' ); ?></label>

            <input class="widefat" id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" type="text" value="<?php echo esc_attr( $width ); ?>" />

        </p>
    

    <p>

        <label for="<?php echo $this->get_field_id( 'border' ); ?>"><?php _e( 'Show Border:', 'kraftives' ); ?></label>

        <select id="<?php echo $this->get_field_id( 'border' ); ?>" name="<?php echo $this->get_field_name( 'border' );?>"  value="<?php echo esc_attr( $border ); ?>" >

            <option value ='true' <?php if( esc_attr( $border ) == 'true' ) echo 'selected'; ?>>Yes</option>

            <option value = 'false' <?php if( esc_attr( $border ) == 'false' ) echo 'selected'; ?>>No</option>

        </select>

    </p>

        <p>

            <label for="<?php echo $this->get_field_id( 'color' ); ?>"><?php _e( 'Color scheme:', 'kraftives' ); ?></label>

            <select id="<?php echo $this->get_field_id( 'color' ); ?>" name="<?php echo $this->get_field_name( 'color' );?>"  value="<?php echo esc_attr( $color ); ?>" >

                <option value ='light' <?php if( esc_attr( $color ) == 'light' ) echo 'selected'; ?>>Light</option>

                <option value = 'dark' <?php if( esc_attr( $color ) == 'dark' ) echo 'selected'; ?>>Dark</option>

            </select>



        </p>

        <p>

        <label for="<?php echo $this->get_field_id( 'stream' ); ?>"><?php _e( 'Show stream:', 'kraftives' ); ?></label>

        <select id="<?php echo $this->get_field_id( 'stream' ); ?>" name="<?php echo $this->get_field_name( 'stream' );?>"  value="<?php echo esc_attr( $stream ); ?>" >

            <option value ='true' <?php if( esc_attr( $stream ) == 'true' ) echo 'selected'; ?>>Yes</option>

            <option value = 'false' <?php if( esc_attr( $stream ) == 'false' ) echo 'selected'; ?>>No</option>

        </select>

        </p>

        <p>

            <label for="<?php echo $this->get_field_id( 'faces' ); ?>"><?php _e( 'Show faces:', 'kraftives' ); ?></label>

            <select id="<?php echo $this->get_field_id( 'faces' ); ?>" name="<?php echo $this->get_field_name( 'faces' );?>"  value="<?php echo esc_attr( $faces ); ?>" >

                <option value ='true' <?php if( esc_attr( $faces ) == 'true' ) echo 'selected'; ?>>Yes</option>

                <option value = 'false' <?php if( esc_attr( $faces ) == 'false' ) echo 'selected'; ?>>No</option>

            </select>

        </p>

        <p>

            <label for="<?php echo $this->get_field_id( 'header' ); ?>"><?php _e( 'Show header:', 'kraftives' ); ?></label>

            <select id="<?php echo $this->get_field_id( 'header' ); ?>" name="<?php echo $this->get_field_name( 'header' );?>"  value="<?php echo esc_attr( $header ); ?>" >

            <option value ='true' <?php if( esc_attr( $header ) == 'true' ) echo 'selected'; ?>>Yes</option>

            <option value = 'false' <?php if( esc_attr( $header ) == 'false' ) echo 'selected'; ?>>No</option>

         </select>

        </p>
        
        <?php /*?><p>

            <label for="<?php echo $this->get_field_id( 'css' ); ?>"><?php _e( 'Custom Styling:', 'kraftives' ); ?></label>

			<textarea class="widefat" id="<?php echo $this->get_field_id( 'css' ); ?>" name="<?php echo $this->get_field_name( 'css' ); ?>"><?php echo esc_attr( $css ); ?>
            </textarea>

        </p><?php */?>



        <?php

    }



    public function update( $new_instance, $old_instance ) {

        $instance = array();

        $instance['title'] = wp_filter_nohtml_kses(strip_tags( $new_instance['title'] ));

        $instance['color'] = wp_filter_nohtml_kses(strip_tags( $new_instance['color'] ));

        $instance['stream'] = wp_filter_nohtml_kses(strip_tags( $new_instance['stream'] ));

        $instance['width'] = wp_filter_nohtml_kses(strip_tags( $new_instance['width'] ));

        $instance['faces'] = wp_filter_nohtml_kses(strip_tags( $new_instance['faces'] ));

        $instance['url'] = wp_filter_nohtml_kses(strip_tags( $new_instance['url'] ));

        $instance['header'] = wp_filter_nohtml_kses(strip_tags( $new_instance['header'] ));

        $instance['border'] = wp_filter_nohtml_kses(strip_tags( $new_instance['border'] ));

        //$instance['css'] = wp_filter_nohtml_kses(strip_tags( $new_instance['css'] ));


        return $instance;

    }



    public function widget( $args, $instance ) {

        extract( $args );

            $title = apply_filters( 'widget_title', $instance['title'] );

            $width = $instance['width'];

            $color = $instance['color'];

            $stream = $instance['stream'];

            $faces = $instance['faces'];

            $url = $instance['url'];

            $header = $instance['header'];

            $border = $instance['border'];

            //$css = $instance['css'];



        ?>


        <?php echo $before_widget;

                if ( ! empty( $title ) )

            echo $before_title . $title . $after_title; ?>


    <style type="text/css">

    <?php  if ($css !=''){
         echo $css;
    }?>

        .facebookOuter {
            
        }
        .facebookInner {
            
        }
    </style>

    <div id="fb-root"></div>
	<script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=279053742178223&version=v2.0";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    
    <div class="facebookOuter">
        <div class="facebookInner">
            <div class="fb-like-box"
                 data-width="<?php echo $width; ?>" data-height="255"
                 data-href="http://www.facebook.com/<?php echo $url; ?>"
                 data-colorscheme="<?php echo $color; ?>"
                 data-show-border="<?php echo $border; ?>" data-show-faces="<?php echo $faces; ?>"
                 data-stream="<?php echo $stream; ?>" data-header="<?php echo $header; ?>">
            </div>
        </div>
    </div>


    <?php
      echo $after_widget;

    }

}

