<?php 

include_once 'my-meta-box-class.php';
class Metabox_Extended extends AT_Meta_Box {

    public function __construct($meta_box) {

        parent::__construct($meta_box);
		add_action( 'admin_enqueue_scripts', array( $this, 'load_switch_scripts_styles' ) );
    }

	public function load_switch_scripts_styles() {
		// Get Plugin Path
		$plugin_path = $this->SelfPath;
		wp_enqueue_style( 'bootstarp_swirch_css', $plugin_path . '/css/bootstrap-switch.css' );
		wp_enqueue_style( 'custom_fields_css', $plugin_path . '/css/custom_fields.css' );
		wp_enqueue_script( 'bootstrap-switch_js', $plugin_path . '/js/bootstrap-switch.js', array('jquery'), false, false );
		wp_enqueue_script( 'custom_fields_js', $plugin_path . '/js/custom_fields.js', array('jquery'), false, false );
	}

//Add Switch button
	public function addSwitch($id,$args,$repeater=false){
	
		$new_field = array('type' => 'switch',
							'id'=> $id,
							'std' => 'false',
							'desc' => '',
							'style' =>'',
							'name' => 'Switch Field',
							'multiple' => false, 
					);
		$new_field = array_merge($new_field, $args);
		if(false === $repeater){
		  $this->_fields[] = $new_field;
		}else{
		  return $new_field;
		}
	}
	public function show_field_switch( $field, $meta ) {
		global $post;
		// Get Plugin Path
		//var_dump($meta);
		$this->show_field_begin( $field, $meta );
		$class = '';
		ob_start();?>
					
					<div class="switch_post" id="<?php echo $field['id']; ?>">
						 <input type="checkbox" checked="checked"  />
						 <input type="hidden" name="<?php echo $field['id']; ?>" class="switch_value <?php echo  $field['id']; ?>" value="<?php if( empty($meta) ){echo $field['std'];}else{ echo $meta;}?>" /> 
						<script>
						jQuery(document).ready(function(){
							"use strict";
							jQuery("#<?php echo $field['id'];?>").bootstrapSwitch(
								"setState",
								<?php if(!$meta){echo $field['std'];}else{ echo $meta; }?>
							) // true || false
							
						});
						</script>
					</div>
		<?php
		$output = ob_get_contents();
		ob_end_clean();				
		echo $output;
		$this->show_field_end( $field, $meta );
	
	}


//Add Image radio

  public function addRadioImage($id,$options,$args,$repeater=false){
    $new_field = array('type' => 'radioimage','id'=> $id,'std' => array(),'desc' => '','style' =>'','name' => 'Radio Image Field','options' => $options,'multiple' => false,);
    $new_field = array_merge($new_field, $args);
    if(false === $repeater){
      $this->_fields[] = $new_field;
    }else{
      return $new_field;
    }
  }
  public function show_field_radioimage( $field, $meta ) {
  
	$plugin_path = $this->SelfPath;
    $i = 0;
    /*if ( ! is_array( $meta ) )
      $meta = (array) $meta;*/
	  $id = $field['id'];
      
    $this->show_field_begin( $field, $meta );
	ob_start();?>		
			<ul id="folio_layout_<?php echo $field['id'];?>" class="box_radio box_radio_sidebars">
            
			<?php foreach ( $field['options'] as $key => $value ) {?>
					<li>
                        <input  name="<?php echo $field['id']; ?>" 
                        type="radio" <?php if($meta === $key )
						{echo  'checked="checked"'; }
						elseif('sidebar_right' == $key )
						{echo 'checked="checked"'; }?> 
                        class="form-control" value="<?php echo $key; ?>" />
                    <a class="input-select" href="javascript:void(0);" title="<?php echo $value; ?>">
                        <img src="<?php echo get_template_directory_uri();?>/inc/custom/custom_fields/meta-box-class/images/sidebars/<?php echo $key?>.png" alt="<?php echo $value; ?>" />
                        
                    </a>
                </li>
		<?php	} ?>
			</ul>
<?php
		$output = ob_get_contents();
		ob_end_clean();				
		echo $output;
    $this->show_field_end( $field, $meta );
  }  

}
?>