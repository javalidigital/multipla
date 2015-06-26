<?php 
class wedding_style_exclusive_categ extends WP_Widget
{
    function wedding_style_exclusive_categ(){
		$widget_ops = array('description' => 'Displays Categories Posts');
		$control_ops = array('width' => '', 'height' => '');
		parent::WP_Widget(false,$name='Categories Posts',$widget_ops,$control_ops);
	}
  /* Displays the Widget in the front-end */
    function widget($args, $instance){
		extract($args);
		$title =  esc_html( $instance['title']);
		$categ_id = empty( $instance['categ_id'] ) ? '' : $instance['categ_id'];
		$post_count = empty( $instance['post_count'] ) ? '' : $instance['post_count'];
		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title; ?>
		
        <style>	
		.cat_widg {
            padding-bottom: 10px;
			margin-bottom: 5px;
            border-bottom: 1px solid #F3F3F3;
         }		
         .widget_wedding_style_exclusive_categ div:last-child div{
		    border-bottom:none !important;
         } 
         .cat_widg_cont {		 
		   float: left;
           width: 100%;
		 }
		 .cat_widg_cont h3{
		   margin-top: 0;
           line-height: 20px;
           margin-bottom: 5px !important;
		 }
		 
		.cat_widg_cont > div:last-child {
			border-bottom: 0px !important
		 }
		 
		.cat_widg_cont h3:before {
			width: 0;
			height: 0;
			border-top: solid transparent;
			border-bottom: solid transparent;
			border-width: 5px;
			content: "\27a8";
			margin-right: -5px;
			font-style: normal;
			font-weight: 100;
			font-size: 15px;
		}
		 .cat_widg_cont h3 a{
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
		$wp_query->query('showposts='.$post_count.'&cat='.$categ_id);
			while ($wp_query->have_posts()) : $wp_query->the_post();  ?>
					<div class="cat_widg_cont">
					  <h3>
                    	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                      </h3>
		              
					  <div class="cat_widg">	
						<?php
                         
                         echo wedding_style_the_excerpt_max_charlength(100);                       
                        ?>
					     &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php the_permalink(); ?>" style="text-decoration: underline;"><span><?php echo __('More','WeddingStyle'); ?></span></a>
					   </div>
                      <div style="clear:both;"></div>					   
					</div>
					
	<?php endwhile; 
		 
		          
		 
		
		echo $after_widget;
				
		}
  /*Saves the settings. */
    function update($new_instance, $old_instance){
		
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['categ_id'] = wp_filter_post_kses( addslashes($new_instance['categ_id']));
		$instance['post_count'] = wp_filter_post_kses( addslashes($new_instance['post_count']));
		return $instance;
		
		}
  /*Creates the form for the widget in the back-end. */
    function form($instance){
				//Defaults
		$instance = wp_parse_args( (array) $instance, array( 'title'=>'Categories Posts', 'categ_id'=>'0', 'post_count'=>'3' ) );
		$title = esc_attr( $instance['title'] );
		$categ_id = esc_attr( $instance['categ_id'] ); 
        $post_count = esc_attr( $instance['post_count'] )?>
		
		<p><label for="<?php echo $this->get_field_id('title'); ?>">Title:</label><input class="widefat" id="<?php echo  $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
		
		
		<p><label for="<?php echo $this->get_field_id('categ_id'); ?>">Select Category:</label>
		<select name="<?php echo $this->get_field_name('categ_id'); ?>" id="<?php echo $this->get_field_id('categ_id') ?>" style="font-size:12px" class="inputbox">
          <option value="0">Select Category</option>
     <?php  $categories=get_categories();
            $category_count=count($categories);
            for($i=0;$i<$category_count;$i++) {
				if(isset($categories[$i])){
       ?>
          <option value="<?php echo $categories[$i]->term_id?>" <?php if($instance['categ_id']==$categories[$i]->term_id) echo  'selected="selected"'; ?>><?php echo $categories[$i]->name ?></option>
     <?php
				}
			}
       ?>
        </select></p>
		<p><label for="<?php echo $this->get_field_id('post_count'); ?>">Number of Posts:</label><input id="<?php echo  $this->get_field_id('post_count'); ?>" name="<?php echo $this->get_field_name('post_count'); ?>" type="text" value="<?php echo $post_count; ?>" size="6"/></p>
<?php		
}
}// end wedding_style_exclusive_categ class
add_action('widgets_init', create_function('', 'return register_widget("wedding_style_exclusive_categ");'))
?>