<?php

class wedding_style_color_control_page_class{
	
	public $colorcontrol;
	public $shortcolorcontrol;
	public $options_colorcontrol;
	
	function __construct(){
		global $wedding_style_special_id_for_db;
		
		$this->colorcontrol = "Color Control";
		$this->shortcolorcontrol = $wedding_style_special_id_for_db."cc";
		
		$value_of_std[0]=get_theme_mod($this->shortcolorcontrol."_menu_elem_back_color",'#F0F0F0');
		$value_of_std[2]=get_theme_mod($this->shortcolorcontrol."_sideb_background_color",'#fafafa');
		$value_of_std[3]=get_theme_mod($this->shortcolorcontrol."_footer_back_color",'#ffffff');
		$value_of_std[4]=get_theme_mod($this->shortcolorcontrol."_home_top_posts_color",'#ffffff');
		$value_of_std[5]=get_theme_mod($this->shortcolorcontrol."_top_posts_color",'#ffffff');
		$value_of_std[6]=get_theme_mod($this->shortcolorcontrol."_text_headers_color",'#FF8BF5');
		$value_of_std[7]=get_theme_mod($this->shortcolorcontrol."_primary_text_color",'#5F5956');
		$value_of_std[8]=get_theme_mod($this->shortcolorcontrol."_footer_text_color",'#646464');
		$value_of_std[9]=get_theme_mod($this->shortcolorcontrol."_primary_links_color",'#5F5956');
		$value_of_std[10]=get_theme_mod($this->shortcolorcontrol."_primary_links_hover_color",'#5F5956');
		$value_of_std[11]=get_theme_mod($this->shortcolorcontrol."_menu_links_color",'#333333');
		$value_of_std[12]=get_theme_mod($this->shortcolorcontrol."_menu_links_hover_color",'#FF8BF5');		
		$value_of_std[13]=get_theme_mod($this->shortcolorcontrol."_menu_color",'#F0F0F0');
		$value_of_std[14]=get_theme_mod($this->shortcolorcontrol."_selected_menu_color",'#F0F0F0');
		$value_of_std[15]=get_theme_mod($this->shortcolorcontrol."_color_scheme",'#E0E0E0');
		$value_of_std[16]=get_theme_mod($this->shortcolorcontrol."_cat_tab_backgr_color",'#000000');
		$value_of_std[17]=get_theme_mod($this->shortcolorcontrol."_logo_text_color",'#FF8BF5');	
		$value_of_std[18]=get_theme_mod($this->shortcolorcontrol."_footer_sideb_background_color",'#ffffff');

		
		$this->options_colorcontrol = array(
		    "menu_elem_back_color" => array(
			
				"name" => "Menu Element Background Color",
				
				"desc" => "",
				
				"var_name" =>'menu_elem_back_color',
				"id" => $this->shortcolorcontrol . "_menu_elem_back_color",
				
				"type" => "picker",
				
				"std" => $value_of_std[0]
			), 	
		
			"sideb_background_color" =>  array(
			
				"name" => "Sidebar Background Color",
				
				"desc" => "",
				
				"var_name" =>'sideb_background_color',
				"id" => $this->shortcolorcontrol . "_sideb_background_color",
				
				"type" => "picker",
				
				"std" => $value_of_std[2]
			),		
			
			"footer_sideb_background_color" =>  array(
			
				"name" => "Footer Sidebar Background Color",
				
				"desc" => "",
				
				"var_name" =>'footer_sideb_background_color',
				"id" => $this->shortcolorcontrol . "_footer_sideb_background_color",
				
				"type" => "picker",
				
				"std" => $value_of_std[18]
			),
			"footer_back_color" =>  array(
				"name" => "Footer Background Color",
				"desc" => "",
				
				"var_name" =>'footer_back_color',
				"id" => $this->shortcolorcontrol . "_footer_back_color",
				"type" => "picker",
				"std" => $value_of_std[3]
			),
				
			"top_posts_color" =>  array(
				"name" => "Top Posts Background Color",
				"desc" => "",
				
				"var_name" =>'top_posts_color',
				"id" => $this->shortcolorcontrol . "_top_posts_color",
				"type" => "picker",
				"std" => $value_of_std[5]
			),	
				
			"text_headers_color" =>  array(
				"name" => "Header Text Color",
				"desc" => "",
				
				"var_name" =>'text_headers_color',
				"id" => $this->shortcolorcontrol . "_text_headers_color",
				"type" => "picker",
				"std" => $value_of_std[6]
			),	
			
			"primary_text_color" =>  array(
				"name" => "Primary Text Color",
				"desc" => "",
				
				"var_name" =>'primary_text_color',
				"id" => $this->shortcolorcontrol . "_primary_text_color",
				"type" => "picker",
				"std" => $value_of_std[7]
			),
			
			"footer_text_color" =>  array(
				"name" => "Footer Text Color",
				"desc" => "",
				
				"var_name" =>'footer_text_color',
				"id" => $this->shortcolorcontrol . "_footer_text_color",
				"type" => "picker",
				"std" => $value_of_std[8]
			),
			"primary_links_color" =>  array(
				"name" => "Primary Links",
				"desc" => "",
				
				"var_name" =>'primary_links_color',
				"id" => $this->shortcolorcontrol . "_primary_links_color",
				"type" => "picker",
				"std" => $value_of_std[9]
			),
			"primary_links_hover_color" =>  array(
				"name" => "Primary Links Hover",
				"desc" => "",
				
				"var_name" =>'primary_links_hover_color',
				"id" => $this->shortcolorcontrol . "_primary_links_hover_color",
				"type" => "picker",
				"std" => $value_of_std[10]
			),
			"menu_links_color" =>  array(
				"name" => "Menu Links",
				"desc" => "",
				
				"var_name" =>'menu_links_color',
				"id" => $this->shortcolorcontrol . "_menu_links_color",
				"type" => "picker",
				"std" => $value_of_std[11]
			 ),
			 "menu_links_hover_color" =>  array(
				"name" => "Menu Links Hover",
				"desc" => "",
				
				"var_name" =>'menu_links_hover_color',
				"id" => $this->shortcolorcontrol . "_menu_links_hover_color",
				"type" => "picker",
				"std" => $value_of_std[12]
			),			
			"menu_color" =>  array(
				"name" => "Hover Menu Item",
				"desc" => "",
				
				"var_name" =>'menu_color',
				"id" => $this->shortcolorcontrol . "_menu_color",
				"type" => "picker",
				"std" => $value_of_std[13]
			),
			
			"selected_menu_color" =>  array(
				"name" => "Selected Menu Item",
				"desc" => "",
				
				"var_name" =>'selected_menu_color',
				"id" => $this->shortcolorcontrol . "_selected_menu_color",
				"type" => "picker",
				"std" => $value_of_std[14]
			),
			"color_scheme" =>  array(
			
				"name" => " ",
				
				"var_name" =>'color_scheme',
				"id" => $this->shortcolorcontrol . "_color_scheme",
				
				"std" => $value_of_std[15]
			),						
			
			 "logo_text_color" =>  array(
			
				"name" => "Logo Text Color ",
				
				"desc" => "",
				
				"var_name" =>'logo_text_color',
				"id" => $this->shortcolorcontrol . "_logo_text_color",
				
				"type" => "picker",
				
				"std" => $value_of_std[17]
			),
		);
		}
	
	public function web_bussines_customize_register( $wp_customize ) {
		global $wedding_style_color_control_page;
		$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
		$theme_mod_prefix=wp_get_theme();
		$theme_mod_prefix=$theme_mod_prefix->template;
		
		$wp_customize->add_section( 'color' , array(
				'title'   => __( 'Schemes', 'WeddingStyle' ),
				'priority'  => 1,
			) 
		);
  
	}
	/// save changes or reset options
	public function web_dorado_theme_update_and_get_options_color_control(){
		
		if ( isset($_GET['page']) && $_GET['page'] == "web_dorado_theme" && isset($_GET['controller']) && $_GET['controller'] == "color_control_page") {

			if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'save' ) {
				foreach ($this->options_colorcontrol as $value) {
					set_theme_mod($value['id'], $_REQUEST[$value['var_name']]);

				}
				foreach ($this->options_colorcontrol as $value) {
					if (isset($_REQUEST[$value['var_name']])) {
						set_theme_mod($value['id'], $_REQUEST[$value['var_name']]);
					} else {
						remove_theme_mod($value['id']);
					}
				}
				header("Location: themes.php?page=web_dorado_theme&controller=color_control_page&saved=true");
				die;
			} else if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'reset' ) {
				foreach ($this->options_colorcontrol as $value) {
					remove_theme_mod($value['id']);
				}
				header("Location: themes.php?page=web_dorado_theme&controller=color_control_page&reset=true");
				die;
			}
		}	
	}
	
	public function web_dorado_color_control_page_admin_scripts(){

		wp_enqueue_style('color_control_page_main_style',get_template_directory_uri('template_directory').'/admin/css/color_control.css');	
		wp_enqueue_script('wp-color-picker');
		wp_enqueue_style( 'wp-color-picker' );
		

	}
	
	public function update_color_control(){

//for update global options
global $wedding_style_color_control_page;

foreach ($wedding_style_color_control_page->options_colorcontrol as $value) {
     $$value['var_name'] = $value['std']; 
}
$background_color = get_background_color();
$background_image=get_background_image();
}
	private function negativeColor($color)
	{
		//get red, green and blue
		$r = substr($color, 0, 2);
		$g = substr($color, 2, 2);
		$b = substr($color, 4, 2);
		
		//revert them, they are decimal now
		$r = 0xff-hexdec($r);
		$g = 0xff-hexdec($g);
		$b = 0xff-hexdec($b);
		
		//now convert them to hex and return.
		return dechex($r).dechex($g).dechex($b);
	}
	
	public function dorado_theme_admin_color_control(){
		if(isset($_REQUEST['controller']) && $_REQUEST['controller']=='color_control_page'){
			if (isset($_REQUEST['saved']) && $_REQUEST['saved'] ) 
		
			echo '<div id="message" class="updated"><p><strong>' . $this->colorcontrol . ' settings saved.</strong></p></div>';
			
		if (isset($_REQUEST['reset']) && $_REQUEST['reset'] ) 
		
			echo '<div id="message" class="updated"><p><strong>' . $this->colorcontrol . ' settings reset.</strong></p></div>';
		}
		global $wedding_style_admin_helepr_functions;
		$pickers=$this->get_option_type('picker');
		$count_picker=count( $pickers );
		$array_of_colors=array(
							array(
								"menu_elem_back_color" => "#F0F0F0", 
								"sideb_background_color" => "#fafafa",
								"footer_sideb_background_color" => "#ffffff",
								"footer_back_color" => "#f5f5f5", 
								"home_top_posts_color" => "#ffffff", 
								"top_posts_color" => "#ffffff", 
								"text_headers_color" => "#FF8BF5", 
								"primary_text_color" => "#000000", 
								"footer_text_color" => "#646464", 
								"primary_links_color" => "#5F5956", 
								"primary_links_hover_color" => "#5F5956", 
								"menu_links_color" => "#333333", 
								"menu_links_hover_color" => "#FF8BF5", 
								"menu_color" => "#F0F0F0", 
								"cat_tab_backgr_color" => "#000000",
								"selected_menu_color" => "#F0F0F0",								
								"logo_text_color" => "#FF8BF5", 
							),
							array(
								"menu_elem_back_color" => "#fafafa", 
								"sideb_background_color" => "#fafafa",
								"footer_sideb_background_color" => "#ffffff",
								"footer_back_color" => "#f5f5f5", 
								"home_top_posts_color" => "#ffffff", 
								"top_posts_color" => "#ffffff", 
								"text_headers_color" => "#edce01", 
								"primary_text_color" => "#000000", 
								"footer_text_color" => "#646464", 
								"primary_links_color" => "#5F5956", 
								"primary_links_hover_color" => "#5F5956", 
								"menu_links_color" => "#333333", 
								"menu_links_hover_color" => "#edce01", 
								"menu_color" => "#fafafa", 
								"cat_tab_backgr_color" => "#000000",
								"selected_menu_color" => "#fafafa",								
								"logo_text_color" => "#edce01", 
							),
							array(
								"menu_elem_back_color" => "#ffffff", 
								"sideb_background_color" => "#fafafa",
								"footer_sideb_background_color" => "#ffffff",
								"footer_back_color" => "#f5f5f5", 
								"home_top_posts_color" => "#ffffff", 
								"top_posts_color" => "#ffffff", 
								"text_headers_color" => "#00B3EE", 
								"primary_text_color" => "#000000", 
								"footer_text_color" => "#646464", 
								"primary_links_color" => "#5F5956", 
								"primary_links_hover_color" => "#5F5956", 
								"menu_links_color" => "#333333", 
								"menu_links_hover_color" => "#00B3EE", 
								"menu_color" => "#ffffff", 
								"cat_tab_backgr_color" => "#000000",
								"selected_menu_color" => "#ffffff",								
								"logo_text_color" => "#00B3EE", 
							),
							array(
								"menu_elem_back_color" => "#F3F3F3", 
								"sideb_background_color" => "#fafafa",
								"footer_sideb_background_color" => "#F3F3F3",
								"footer_back_color" => "#f5f5f5", 
								"home_top_posts_color" => "#F3F3F3", 
								"top_posts_color" => "#F3F3F3", 
								"text_headers_color" => "#B40000", 
								"primary_text_color" => "#000000", 
								"footer_text_color" => "#646464", 
								"primary_links_color" => "#5F5956", 
								"primary_links_hover_color" => "#5F5956", 
								"menu_links_color" => "#333333", 
								"menu_links_hover_color" => "#B40000", 
								"menu_color" => "#F3F3F3", 
								"cat_tab_backgr_color" => "#000000",
								"selected_menu_color" => "#F3F3F3",								
								"logo_text_color" => "#B40000", 
							)
							);
						$this->default_themes_jquery($array_of_colors);	?>
		
        <?php global $wedding_style_web_dor; ?>
		<div id="main_color_control_page">			
			<table align="center" width="90%" style="margin-top: 0px;border-bottom: rgb(111, 111, 111) solid 2px;">
			    <tr>   
                      <td style="font-size:14px; font-weight:bold">
					     <a href="<?php echo esc_url($wedding_style_web_dor).'/wordpress-themes-guide-step-1.html'; ?>" target="_blank" style="color:#126094; text-decoration:none;">User Manual</a><br />This section allows you customize the color features.
                         <a href="<?php echo esc_url($wedding_style_web_dor).'/wordpress-theme-options/3-6.html'; ?>" target="_blank" style="color:#126094; text-decoration:none;">More...</a>
					 </td>    
                      <td  align="right" style="font-size:16px;">
                           <a href="<?php echo esc_url($wedding_style_web_dor).'/wordpress-themes/wedding-style.html'; ?>" target="_blank" style="color:red; text-decoration:none;">
                              <img src="<?php echo get_template_directory_uri() ?>/images/header.png" border="0" alt="" width="215">
                           </a>
                       </td>
                </tr>
				<tr>
					<td style="height: 70px;"><h3 style="margin: 0px;font-family:Segoe UI;color: rgb(111, 111, 111); font-size:18pt;">Color Control</h3></td>
				</tr>
			</table>
		  <div style="margin: 0 auto;width:90%;padding-bottom:0px; padding-top:0px;">		
			<div class="optiontitle" style="">
				  <p style="font-size:15px;font-weight:bold;color: #333;">The color customization parameters are disabled in free version. Please buy the commercial version in order to enable this functionality.</p>
				  <img src="<?php echo get_template_directory_uri(); ?>/images/color.jpg" width="100%" style="border-bottom: 1px solid rgb(206, 206, 206);">
			</div>
	     </div>
</div>	
		 <?php
	}
	
	private function get_option_type($type=''){
	$cur_type_elements=array();
	$k=0;
	foreach( $this->options_colorcontrol as $option ){
		
		if(isset($type) && isset($option['type']) && $option['type'] == $type ){
		
			$cur_type_elements[$k]=$option;
			$k++;
		}
		
	}
	return $cur_type_elements;
	}
	
	
	private function default_themes_jquery($array_of_colors=NULL){
		// print array if it not set
		if($array_of_colors===NULL){
			echo "\$array_of_colors=array(<br>array(<br>";
			foreach($this->options_colorcontrol as $key=>$special_color){
				if($special_color['type']=='picker'){
					echo "	\"".$special_color['var_name']."\" => \"".$special_color['std']."\", <br>";
				}
			}
			echo "),<br>array(<br>";
			foreach($this->options_colorcontrol as $key=>$special_color){
				if($special_color['type']=='picker'){
					echo "	\"".$special_color['var_name']."\" => \"".$special_color['std']."\", <br>";
				}
			}
			echo ")); esi copy past ara array_of_colors tex@ kashxati";
			die();
			
		}
		// print qjeru and initial colors standart themes
		else
		{			
			echo '<script>jQuery(document).ready(function(){
				jQuery("#color_scheme").change(function () {
					var bkg = jQuery("#color_scheme option:selected").val();  ';

			foreach($array_of_colors as $key=>$colors){
				
				echo 'if (bkg == "Theme-'.($key+1).'") {';
					foreach($colors as $key=>$color){				
					
						echo 'jQuery("#'.$key.'").val("'.$color.'"); ';
						echo 'jQuery("#'.$key.'").css("backgroundColor", "'.$color.'"); ';
						echo 'jQuery("#'.$key.'").iris("color", "'.$color.'"); ';
						echo 'jQuery("#'.$key.'_picker").children("div").css("backgroundColor", "'.$color.'"); ';
 
					}
				echo " }";
			}
			
			echo "});  });</script>";
		}
		
		
	}
	private function default_theme_select($array_of_colors=NULL){
		$count_of_selects=count($array_of_colors);
		
		echo '<select name="color_scheme" id="color_scheme">';
		
		for($i=1;$i<=$count_of_selects;$i++){
			$selected='';
			$selected=selected($this->options_colorcontrol['color_scheme']['std'], 'Theme-'.$i );
			echo '<option value="Theme-'.$i.'" '.$selected.'>Theme-'.$i.'</option>';
			
		}
		
		echo '</select>';
		
		
	}
	private function hex_to_rgba($color, $opacity = false) {
	$default = 'rgb(0,0,0)';
	//Return default if no color provided
	if(empty($color))
          return $default; 
	//Sanitize $color if "#" is provided 
        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }
        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }
        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);
        //Check if opacity is set(rgba or rgb)
        if($opacity){
        	if(abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        	$output = 'rgb('.implode(",",$rgb).')';
        }
        //Return rgb(a) color string
        return $output;
}

private function darkest_brigths($color,$pracent){
	$new_color=$color;
	if(!(strlen($new_color==6) || strlen($new_color)==7))
	{
		return $color;
	}
	$color_vandakanishov=strpos($new_color,'#');
	if($color_vandakanishov == false) {
		$new_color= str_replace('#','',$new_color);
	}
	$color_part_1=substr($new_color, 0, 2);
	$color_part_2=substr($new_color, 2, 2);
	$color_part_3=substr($new_color, 4, 2);
	$color_part_1=dechex( (int) (hexdec( $color_part_1 ) - (hexdec( $color_part_1 )* $pracent / 100 )));
	$color_part_2=dechex( (int) (hexdec( $color_part_2)  - (( ( hexdec( $color_part_2 ) ) ) * $pracent / 100 )));
	$color_part_3=dechex( (int) (hexdec( $color_part_3 ) - (( ( hexdec( $color_part_3 ) ) ) * $pracent / 100 )));
	if(strlen($color_part_1)<2) $color_part_1="0".$color_part_1;
	if(strlen($color_part_2)<2) $color_part_2="0".$color_part_2;
	if(strlen($color_part_3)<2) $color_part_3="0".$color_part_3;
	$new_color=$color_part_1.$color_part_2.$color_part_3;
	if($color_vandakanishov == false){
		return $new_color;
	}
	else{
		return '#'.$new_color;
	}
}


}
 
