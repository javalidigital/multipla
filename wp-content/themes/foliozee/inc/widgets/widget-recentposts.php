<?php
class kraftive_recentposts_widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'kraft_slider', // Base ID
            'Kraftive: Recent Posts', // Name
            array( 'description' => __( 'Displays the recent posts slider (displays feature image, post title and excerpt)', 'kraftives' ), ) // Args
        );
    }

    public function form( $instance ) {
		
		$defaults = array( 'title' => __( 'Recent Posts', 'kraftives' ), 'no_of_posts' => 4 );
		$instance = wp_parse_args( (array) $instance, $defaults );
		
            $title = $instance[ 'title' ];
            $no_of_posts = $instance[ 'no_of_posts' ];
?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'kraftives' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>

            <label for="<?php echo $this->get_field_id( 'no_of_posts' ); ?>"><?php _e( 'No of Posts:', 'kraftives' ); ?></label>

            <input class="widefat" id="<?php echo $this->get_field_id( 'no_of_posts' ); ?>" name="<?php echo $this->get_field_name( 'no_of_posts' ); ?>" type="text" value="<?php echo esc_attr( $no_of_posts ); ?>" />

        </p>

        <?php

    }



    public function update( $new_instance, $old_instance ) {

        $instance = array();

        $instance['title'] = wp_filter_nohtml_kses(strip_tags( $new_instance['title'] ));

        $instance['no_of_posts'] = wp_filter_nohtml_kses(strip_tags( $new_instance['no_of_posts'] ));

        return $instance;

    }



    public function widget( $args, $instance ) {

        extract( $args );

            $title = apply_filters( 'widget_title', $instance['title'] );

            $no_of_posts = $instance['no_of_posts'];

        ?>



    <?php echo $before_widget;
		if ( ! empty( $title ) )

            echo $before_title . $title . $after_title; 
            
		?>
		
        <?php
		wp_enqueue_script('bxslider_js');
		//wp_enqueue_style('jquery_bxslider_css');
		echo '<ul class="bxslider">';
			$custom_video_script='';
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => $no_of_posts
            );
            $the_query = new WP_Query($args);
				
            // The Loop
			if ($the_query-> have_posts() ) : ?>
			<?php
			while ( $the_query->have_posts() ) : $the_query->the_post();
				$article_image = NULL;
				$fall_back_image = get_template_directory_uri() . '/assets/images/fallback_images/innov_slider.jpg';
                if(has_post_thumbnail()) {
                    $thumb = get_post_thumbnail_id();
                    $img_url = wp_get_attachment_url( $thumb, 'full' ); //get img URL
                    $article_image = aq_resize( $img_url, 350, 136, true ); //resize & crop img 
				}
				$article_image = isset($article_image) ? $article_image : $fall_back_image;
				?>
                    <li><img src="<?php echo $article_image; ?>" alt="<?php the_title();?>" >
                        <div class="slider_caption">
                            <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                            
                        </div>
                    </li>
                       
				 <?php
                 endwhile; ?>
                 
				<?php else: ?>

						<li><?php echo _e('Sorry, no posts found.', 'kraftives'); ?></li>
					
				<?php endif;wp_reset_postdata(); ?>
                
    <?php
		echo '</ul>';?>
		<script type="text/javascript">
			jQuery(document).ready(function($){
				"use strict";
				/* bxslider sidbar gallery post */
				$('.bxslider').bxSlider({
					mode: 'fade',
					speed: 1000,
					captions: true,
					nextText: '',
					prevText: '',
					auto: true
				});
			});
			</script>
    <?php
        echo $after_widget;

    }

}