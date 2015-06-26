<?php

class kraftive_flickr_widget extends WP_Widget
{
    public function __construct()
    {
        $widget_ops  = array('classname' => 'widget_kraft_flickr', 'description' => __( 'Displays your Flickr feed with lightbox slideshow','kraftives'));
        $control_ops = array('width' => 200, 'height' => 350, 'id_base' => 'kraftive_flickr');
        $this->WP_Widget('kraftive_flickr', __('Kraftive: Flickr Feed', 'kraftives'), $widget_ops, $control_ops );
    }

    public function widget($args, $instance)
    {
        extract($args);

        $title = $instance['title'] ;
        $id    = $instance['id'];
        $num   = $instance['num'];

        wp_enqueue_script('jflickrfeed_js');
		wp_enqueue_script('prettyPhoto_js');
		wp_enqueue_style('prettyPhoto_css');


        echo $before_widget;
		if ($title)
            echo $before_title . $title . $after_title;
        echo '<div id="flickr" class="flikr clearfix">';

        

		if ($num && !empty($id)) 
		{
        ?>
    		</div>
            <script type="text/javascript">
            <!--
            jQuery(document).ready(function() {
				"use strict";
                jQuery('#flickr').jflickrfeed({
                    limit: <?php  echo $num;?>,
                    qstrings: {
                        id: '<?php  echo $id;?>'
                    },
                    itemTemplate:
                    '<a rel="prettyPhoto[galleryflickr]" class="th zoom overlay" href="{{image}}" title="{{title}}">' +
                    '<img src="{{image_q}}"/></a>'
                }, function(data) {
                    jQuery("a[rel^='prettyPhoto']").prettyPhoto({
					  social_tools: false,
					  slideshow: 4000, /* false OR interval time in ms */
					  opacity: 0.80, /* Value between 0 and 1 */
					  show_title: true, /* true/false */
					  allow_resize: true, /* Resize the photos bigger than viewport. true/false */
					  
					});
                });
            });
            // -->
            </script>
		<?php 
		}
		else
		{
		   _e('Please enter correct Flickr settings in widget panel', 'kraftives');
		}
		echo $after_widget;
    }

    public function update($new_instance, $old_instance) 
    {
        $instance = $old_instance;
        
        $instance['title'] = wp_filter_nohtml_kses(trim(strip_tags($new_instance['title'])));
        $instance['num']   = wp_filter_nohtml_kses(trim(strip_tags($new_instance['num'])));
        $instance['id']    = wp_filter_nohtml_kses(trim(strip_tags($new_instance['id'])));
        
        return $instance;
    }
    
    public function form($instance) 
    {
		
        $defaults = array('title' => 'Flickr Photos', 'id'=>'71865026@N00', 'num' => '8');
		$instance = wp_parse_args($instance, $defaults ); 
    ?>
        <p>
    		<label for="<?php  echo  $this->get_field_id('title'); ?>"><?php _e('Title:', 'kraftives'); ?></label>
    		<input class="widefat" type="text" id="<?php  echo  $this->get_field_id('title'); ?>" name="<?php  echo  $this->get_field_name('title'); ?>" value="<?php  echo  esc_attr($instance['title']); ?>" />
    	</p>

    	<p>
			<label for="<?php  echo  $this->get_field_id('id'); ?>"><?php _e('ID:', 'kraftives'); ?></label>
			<input class="widefat" type="text" id="<?php  echo  $this->get_field_id('id'); ?>" name="<?php  echo  $this->get_field_name('id'); ?>" value="<?php  echo  esc_attr($instance['id']); ?>" />
		</p>
    
		<p>
			<label for="<?php  echo  $this->get_field_id('num'); ?>"><?php _e('Number of photos:', 'kraftives'); ?></label>
			<input class="widefat" type="text" id="<?php  echo  $this->get_field_id('num'); ?>" name="<?php  echo  $this->get_field_name('num'); ?>" value="<?php  echo  esc_attr($instance['num']); ?>" />
		</p>
        <?php
    }
}