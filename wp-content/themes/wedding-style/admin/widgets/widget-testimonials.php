<?php 
class wedding_style_exclusive_testimonials extends WP_Widget
{
    function wedding_style_exclusive_testimonials(){
		$widget_ops = array('description' => 'Displays testimonials Posts');
		$control_ops = array('width' => '', 'height' => '');
		parent::WP_Widget(false,$name='Testimonials Posts',$widget_ops,$control_ops);
	}
  /* Displays the Widget in the front-end */
    function widget($args, $instance){
		extract($args);
		$title =  esc_html( $instance['title']);
		$testimonials_id = empty( $instance['testimonials_id'] ) ? '' : $instance['testimonials_id'];
		$post_count = empty( $instance['post_count'] ) ? '' : $instance['post_count'];
		$border_radius = empty( $instance['border_radius'] ) ? '' : $instance['border_radius'];
		echo $before_widget;
		$id = $this->get_field_id('title');
		if ( $title )
			echo $before_title . $title . $after_title; ?>
		
        <style>
        .testim_widg_cont<?php echo $id; ?> .testim_widg img {
			float:left;
			margin: 0 10px 10px 0;
			border-radius: <?php echo $border_radius; ?>px;
        }	
		.testim_widg {
			border-bottom: 1px solid #E7E3E3;
			min-height: 95px;
		}	
		.testim_widg_cont<?php echo $id; ?> > div:last-child > div {
			border-bottom: 0px !important
		}
        .testim_widg_cont<?php echo $id; ?> .testim_widg img {
			margin-top: 12px;
			width: 65px;
			height: 65px;
		} 		
        .widget_wedding_style_exclusive_testimonials div:last-child div{
		    border-bottom:none !important;
        } 
        .testim_widg_cont {		 
		   float: left;
           width: 100%;
		}
		.testim_widg_cont h3{
		   margin-top: 0;
           line-height: 15px;
           margin-bottom: 15px !important; 
		}		 
		.testim_widg_cont h3 a{
		   font-size:20px !important;
		}
		.widget-title{
		   margin-bottom: 0;
		}
        </style>		
		<?php	
			
		$wp_query= null;
		$wp_query = new WP_Query();
		if(!isset($post_count))
			$post_count =0;
		$wp_query->query('showposts='.$post_count.'&cat='.$testimonials_id);
			while ($wp_query->have_posts()) : $wp_query->the_post();
        ?>
		
			    	<div class="testim_widg_cont<?php echo $id; ?>">		              
					  <div class="testim_widg">	
						<?php
                         echo wedding_style_display_thumbnail(150,150); 
						 ?>
						 <h3>
                    	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                      </h3>
						<p> <?php  echo wedding_style_the_excerpt_max_charlength(50); ?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php the_permalink(); ?>" style="text-decoration: underline;"><span><?php echo __('More','WeddingStyle'); ?></span></a></p>
					     
						  
					   </div>				   
					</div>
					
					<?php endwhile; 
		 
		 wp_reset_postdata();
		
		echo $after_widget;
				
		}
  /*Saves the settings. */
    function update($new_instance, $old_instance){
		
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['testimonials_id'] = wp_filter_post_kses( addslashes($new_instance['testimonials_id']));
		$instance['post_count'] = wp_filter_post_kses( addslashes($new_instance['post_count']));
		$instance['border_radius'] = wp_filter_post_kses( addslashes($new_instance['border_radius']));
		return $instance;
		
		}
  /*Creates the form for the widget in the back-end. */
    function form($instance){
				//Defaults
		$instance = wp_parse_args( (array) $instance, array( 'title'=>'Testimonials Posts', 'testimonials_id'=>'0', 'post_count'=>'3', 'border_radius'=>'' ) );
		$title = esc_attr( $instance['title'] );
		$testimonials_id = esc_attr( $instance['testimonials_id'] ); 
        $post_count = esc_attr( $instance['post_count'] );
		$border_radius = esc_attr( $instance['border_radius'] );?>
		
		<p><label for="<?php echo $this->get_field_id('title'); ?>">Title:</label><input class="widefat" id="<?php echo  $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
		
		
		<p><label for="<?php echo $this->get_field_id('testimonials_id'); ?>">Select Category:</label>
		<select name="<?php echo $this->get_field_name('testimonials_id'); ?>" id="<?php echo $this->get_field_id('testimonials_id') ?>" style="font-size:12px" class="inputbox">
          <option value="0">Select Category</option>
     <?php  $testimonials=get_categories();
            foreach($testimonials as $testimonial) {
       ?>
          <option value="<?php echo $testimonial->term_id?>" <?php if($instance['testimonials_id']==$testimonial->term_id) echo  'selected="selected"'; ?>><?php echo $testimonial->name ?></option>
     <?php
            }
       ?>
        </select></p>
		
		<p><label for="<?php echo $this->get_field_id('post_count'); ?>">Number of Posts:</label><input id="<?php echo  $this->get_field_id('post_count'); ?>" name="<?php echo $this->get_field_name('post_count'); ?>" type="text" value="<?php echo $post_count; ?>" size="6"/></p>
		<p><label for="<?php echo $this->get_field_id('border_radius'); ?>">Border Radius:</label><input id="<?php echo  $this->get_field_id('border_radius'); ?>" name="<?php echo $this->get_field_name('border_radius'); ?>" type="text" value="<?php echo $border_radius; ?>" size="6"/>px</p>
<?php		
}
}// end exclusive_categ class
add_action('widgets_init', create_function('', 'return register_widget("wedding_style_exclusive_testimonials");'))
?>