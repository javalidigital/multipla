<?php
class kraftive_portfolio_widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'kraft_portfolio', // Base ID
            'Kraftive: Portfolio', // Name
            array( 'description' => __( 'Displays the portfolio with featured image and redirection url', 'kraftives' ), ) // Args
        );
    }

    public function form( $instance ) {
		
		$defaults = array( 'title' => __( 'Portfolio images', 'kraftives' ), 'image_number' => 4 );
		$instance = wp_parse_args( (array) $instance, $defaults );
		
            $title = $instance[ 'title' ];
            $image_number = $instance[ 'image_number' ];
?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'kraftives' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>

            <label for="<?php echo $this->get_field_id( 'image_number' ); ?>"><?php _e( 'No of Portfolio:', 'kraftives' ); ?></label>

            <input class="widefat" id="<?php echo $this->get_field_id( 'image_number' ); ?>" name="<?php echo $this->get_field_name( 'image_number' ); ?>" type="text" value="<?php echo esc_attr( $image_number ); ?>" />

        </p>

        <?php

    }



    public function update( $new_instance, $old_instance ) {

        $instance = array();

        $instance['title'] = wp_filter_nohtml_kses(strip_tags( $new_instance['title'] ));

        $instance['image_number'] = wp_filter_nohtml_kses(strip_tags( $new_instance['image_number'] ));

        return $instance;

    }



    public function widget( $args, $instance ) {

        extract( $args );

            $title = apply_filters( 'widget_title', $instance['title'] );

            $image_number = $instance['image_number'];

        ?>



    <?php echo $before_widget;
		if ( ! empty( $title ) )

            echo $before_title . $title . $after_title; 
            
		?>
		
        <?php
		wp_enqueue_script('prettyPhoto_js');
		wp_enqueue_style('prettyPhoto_css');
		echo '<div class="portfolio clearfix">';
			$custom_video_script='';
            $args = array(
                'post_type' => 'portfolio',
                'posts_per_page' => $image_number,
                'orderby' => 'rand'
            );
            $the_query = new WP_Query($args);

            // The Loop
			if ($the_query-> have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
				$article_image = NULL;
				$fall_back_image = get_template_directory_uri() . '/assets/images/fallback_images/sidebar_portfolio.jpg';
                if(has_post_thumbnail()) {
                    $thumb = get_post_thumbnail_id();
                    $img_url = wp_get_attachment_url( $thumb, 'full' ); //get img URL
                    $article_image = aq_resize( $img_url, 80, 80, true ); //resize & crop img 
				}
				$article_image = isset($article_image) ? $article_image : $fall_back_image;
				?>
                    <a class="overlay video" href="<?php the_permalink();?>" title="<?php the_title();?>" >
                    	<img src="<?php echo $article_image; ?>" alt="<?php the_title();?>" >
                    </a>
                       
				 <?php
                 endwhile; ?>
                 
				<?php else: ?>

						<p><?php echo _e('Sorry, no portfolio item found.', 'kraftives'); ?></p>
					
				<?php endif;wp_reset_postdata(); ?>
                
    <?php
		echo '</div>';
        echo $after_widget;

    }

}