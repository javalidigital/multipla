<?php class wedding_style_slider_page_class{
	function __construct(){}
	/// save changes or reset options
	private function web_dorado_theme_update_slider(){
		
		$image_list='';
		$image_href='';
		$image_title='';
		$image_textarea='';
		$image_link='';
		$ct_pause_on_hover='';
		$ct_hide_slider='';
		$ct_show_slider='';
		
		if(isset($_POST['ct_pause_on_hover'])){
			$ct_pause_on_hover =$_POST['ct_pause_on_hover'];
		}
		if(isset($_POST['ct_hide_slider'])){
			$ct_hide_slider =$_POST['ct_hide_slider'];
		}
		if(isset($_POST['ct_show_slider'])){
			$ct_show_slider =$_POST['ct_show_slider'];
		}		
		if ( isset($_GET['saved']) && $_GET['saved']=='saved' ) {	
						
			
			for($i=0;$i<200;$i++){
				if(isset($_POST['ct_image_link_'.$i])){
					$image_link .=$_POST['ct_image_link_'.$i].';;;;';
				}
				
				if(isset($_POST['ct_image_href_'.$i])){
					$image_href .=$_POST['ct_image_href_'.$i].';;;;';
				}
				
				if(isset($_POST['ct_image_title_'.$i])){
					$image_title .=$_POST['ct_image_title_'.$i].';;;;';
				}
				
				if(isset($_POST['ct_image_textarea_'.$i])){
					$image_textarea .=$_POST['ct_image_textarea_'.$i].';;;;';
				}
			}
			
			set_theme_mod('web_busines_image_link',$image_link);
			set_theme_mod('web_busines_image_href',$image_href);
			set_theme_mod('web_busines_image_textarea',$image_textarea);
			set_theme_mod('web_busines_image_title',$image_title);
			set_theme_mod('ct_slider_height',$_POST['ct_slider_height']);
			set_theme_mod('ct_pause_time',$_POST['ct_pause_time']);
			set_theme_mod('ct_anim_speed',$_POST['ct_anim_speed']);
			set_theme_mod('ct_effect',$_POST['ct_effect']);
			set_theme_mod('ct_pause_on_hover',$ct_pause_on_hover);
			set_theme_mod('ct_hide_slider',$ct_hide_slider);
			set_theme_mod('ct_show_slider',$ct_show_slider);			
			set_theme_mod('ct_slider_title_position',$_POST['ct_slider_title_position']);
			set_theme_mod('ct_slider_description_position',$_POST['ct_slider_description_position']);
			
		}
		if(isset($_GET['reset']) && $_GET['reset']=='reset'){
		
		remove_theme_mod('web_busines_image_link');
		remove_theme_mod('web_busines_image_href');
		remove_theme_mod('web_busines_image_title');
		remove_theme_mod('web_busines_image_textarea');
		remove_theme_mod('ct_slider_height');
		remove_theme_mod('ct_pause_time');
		remove_theme_mod('ct_anim_speed');	
		remove_theme_mod('ct_effect');
		remove_theme_mod('ct_pause_on_hover');
		remove_theme_mod('ct_hide_slider');
		remove_theme_mod('ct_show_slider');
		remove_theme_mod('ct_slider_title_position');
		remove_theme_mod('ct_slider_description_position');
			
		}	
	
	}
	/// print massage after save
	private function web_dor_print_massage(){
		
		if (isset($_GET['saved']) && $_GET['saved'] =='saved'  ) 
		
			echo '<div id="message" class="updated"><p><strong>Slider settings are saved.</strong></p></div>';
			
		if (isset($_GET['reset']) && $_GET['reset'] == 'reset' ) 
		
			echo '<div id="message" class="updated"><p><strong>Slider settings are reset.</strong></p></div>';
	
	}
	
	/// include style and scripts for slider page
	public function web_dorado_slider_page_admin_scripts(){
		wp_enqueue_style('color_control_page_main_style',get_template_directory_uri().'/admin/css/slider_page.css');	
		wp_enqueue_script('jquery');
		wp_enqueue_script( 'common' );
		wp_enqueue_script( 'jquery-color' );
		wp_print_scripts('editor');
		if (function_exists('add_thickbox')) add_thickbox();
		wp_print_scripts('media-upload');
		wp_admin_css();
		wp_enqueue_script('utils');
		do_action("admin_print_styles-post-php");
		do_action('admin_print_styles');
	
	}
	
	public function get_slider_parametrs(){
				
		$image_link=get_theme_mod('web_busines_image_link',get_template_directory_uri('template_url').'/images/slider_1.jpg'.';;;;'. get_template_directory_uri('template_url').'/images/slider_2.jpg'.';;;;'.get_template_directory_uri('template_url').'/images/slider_3.jpg');
		if($image_link){
			$link_array=explode(';;;;',$image_link);
			array_pop($link_array);
		}
		else {$link_array=array();}	
		$param['link_array']=$link_array;
		
		
		$image_href=get_theme_mod('web_busines_image_href','');
		if($image_href){
			$href_array=explode(';;;;',$image_href);
			array_pop($href_array);
		}
		else {$href_array=array();}	
		$param['href_array']=$href_array;
		
		$image_textarea=get_theme_mod('web_busines_image_textarea','');
		if($image_textarea){
			$textarea_array=explode(';;;;',$image_textarea);
			array_pop($textarea_array);
		}
		else {$textarea_array=array();}	
		$param['textarea_array']=$textarea_array;
		
		
		
		$image_title=get_theme_mod('web_busines_image_title','');
		if($image_title){
			$title_array=explode(';;;;',$image_title);
			array_pop($title_array);
		}
		else {$title_array=array();}	
		$param['title_array']=$title_array;
		
		
		return $param;
	}
	
	//// back end style
	public function dorado_theme_admin_slider(){
		global $wedding_style_web_dor;		
		$LIST='';
		$this->web_dorado_theme_update_slider();
		$this->web_dor_print_massage();
		$param=$this->get_slider_parametrs();
		$link_array=$param['link_array'];
		$href_array=$param['href_array'];
		$title_array=$param['title_array'];
		$textarea_array=$param['textarea_array'];
		global $web_dor;
		?>		
		<div id="main_slider_page">
			<div class="wrap" style="margin-right:76px; margin-left: 82px;">
	
			<table align="center" width="90%" style="margin-left: 0;margin-right: 0;margin-top: 0px; margin-bottom: 23px;border-bottom: rgb(111, 111, 111) solid 2px;">
					 <tr>   
                      <td style="font-size:14px; font-weight:bold">
					     <a href="<?php echo esc_url($wedding_style_web_dor).'/wordpress-themes-guide-step-1.html'; ?>" target="_blank" style="color:#126094; text-decoration:none;">User Manual</a><br />This section allows you to make changes in default layout of the theme.
                         <a href="<?php echo esc_url($wedding_style_web_dor).'/wordpress-theme-options/3-2.html'; ?>" target="_blank" style="color:#126094; text-decoration:none;">More...</a>
					    </td>   
                      <td  align="right" style="font-size:16px;">
                           <a href="<?php echo esc_url($wedding_style_web_dor).'/wordpress-themes/wedding-style.html'; ?>" target="_blank" style="color:red; text-decoration:none;">
                              <img src="<?php echo get_template_directory_uri() ?>/images/header.png" border="0" alt="" width="215">
                           </a>
                       </td>
                    </tr>
					<tr>
						<td>
							<h3 style="margin: 0px;font-family:Segoe UI;padding-bottom: 15px;color: rgb(111, 111, 111); font-size:18pt;">Slider</h3>
						</td>
					</tr>
				</table>		
		<?php	
			//Style and js included in $template html file
$template='<style>
#add-image-line .upload-button{
	height: 38px !important;
		display: initial !important;
		background: url({THEME_URL}/images/button.png) center !important; 
		background-size: 100% 100% !important;
		border-radius: 0px !important;
		border: none !important;
		font-size: 16px !important;
		padding: 6px !important;
		color: white !important;
		font-size: 13px !important;
		text-shadow: none !important;
		font-weight: bold;
		background-color: none;
	}

	#main_slider_div .optiontitle {
		margin-top: 50px;
		margin-bottom: 20px;
		width: 818px;
		margin: 0px;
		font-family: Segoe UI;
		color: rgb(111, 111, 111);
		font-size: 18pt;
		padding-bottom: 15px;
		border-bottom: rgb(206, 206, 206) solid 1.5px;
	}
	#main_slider_div tr.new td:last-child{background:rgba(256,256,240,0.5)}
	#main_slider_div td {
		width:30%;
		padding:5px 0px 5px 0px;
	}

	#main_slider_div td, #main_slider_div textarea {
		line-height: inherit;
		font-family: Segoe UI;
		color: rgb(111, 111, 111);
		font-size: 14px;
	}
	#main_slider_div h3{
		border:none;
		cursor:auto !important;
	}
	#main_slider_div td h3{
		font-weight: 200;
		margin: 0;
		cursor:auto !important;
	}
	#main_slider_div .optiontitle h3{
		font-weight: 200;
		margin: 0px;
	}
	#main_slider_div select{
		font-family: Segoe UI;
		color: rgb(111, 111, 111) !important;
		font-size: 14px !important;
	}
	#main_slider_div input{
		font-family: Segoe UI;
		color: rgb(111, 111, 111) !important;
		font-size: 14px !important;
	}
	#main_slider_div textarea{
		font-family: Segoe UI;
		color: rgb(111, 111, 111) !important;
		font-size: 14px !important;
		width:420px;
		height:40px;
		resize: none;
	}
	#main_slider_div .button {
		height: 38px !important;
		display: initial !important;
		background-size: 100% 100% !important;
		border-radius: 0px !important;
		border: none !important;
		font-size: 16px !important;
		padding: 6px !important;
		color: white !important;
		font-size: 13px !important;
		text-shadow: none !important;
		font-weight: bold;
		background-color: none;
	}
	#main_slider_div tr trd a.remove{
		position:absolute;
		top:0px;
		right:0px;
		
	}
	
	#main_slider_div tr.slide-from-base td {
		border-top:1px solid #ddd;
		padding:10px 0px 0px 0px;
	}
</style>
<div id="main_slider_div">
<form method="post" action="themes.php?page=web_dorado_theme&controller=slider_page&saved=saved">
<table class="optioninput" width="800">
	<tr>
		<td width="30%"  valign="middle"><h3>Slider Height
        <span class="hasTip" style="cursor: pointer;color: #3B5998;" title="The height of the slider can be customized. You need to specify the height in the box provided.">[?]</span></h3></td>
		<td><input style="width:66px;" name="ct_slider_height" id="ct_slider_height" value="{HEIGHT}" /></td>
	</tr>
	<tr>
		<td width="30%"  valign="middle"><h3>Animation Speed
        <span class="hasTip" style="cursor: pointer;color: #3B5998;" title="When using an animation for the slider, you can control its speed. You can use the provided box to fill in the optimal speed.">[?]</span></h3>
        </td>
		<td><input style="width:66px;" name="ct_anim_speed" id="ct_anim_speed" value="{SPEED}" /></td>
	</tr>
	<tr>
		<td width="30%"  valign="middle"><h3>Pause Time
        <span class="hasTip" style="cursor: pointer;color: #3B5998;" title="The timing for the slider animation can be customized. You can adjust it providing timing in the corresponding box.">[?]</span></h3>
        </h3></td>
		<td><input style="width:66px;" name="ct_pause_time" id="ct_pause_time" value="{PAUSE}" /></td>
	</tr>
	<tr>
		<td width="30%"  valign="middle"><h3>Stop animation while hovering
        <span class="hasTip" style="cursor: pointer;color: #3B5998;" title="By default slider animation is constant. However you can choose it to stop while hovering, checking the box for this option.">[?]</span>
        </h3></td>
		<td><input type="checkbox" name="ct_pause_on_hover" id="ct_pause_on_hover" value="true" {CHECKED}></td>
	</tr>
	
	<tr>
		<td width="30%"  valign="middle"><h3>Effect
        <span class="hasTip" style="cursor: pointer;color: #3B5998;" title="The animation of the slider can be customized with the help of various effects. You can choose the slider animation effect from the list included below.">[?]</span>
        </h3></td>
		<td>
			<select style="width:215px;" name="ct_effect" id="ct_effect">
				<option value="none">None</option>
				<option value="cubeH">Cube Horizontal</option>
				<option value="cubeV">Cube Vertical</option>
				<option value="fade">Fade</option>
				<option value="sliceH">Slice Horizontal</option>
				<option value="sliceV">Slice Vertical</option>
				<option value="slideH">Slide Horizontal</option>
				<option value="slideV">Slide Vertical</option>
				<option value="scaleOut">Scale Out</option>
				<option value="scaleIn">Scale In</option>
				<option value="blockScale">Block Scale</option>
				<option value="kaleidoscope">Kaleidoscope</option>
				<option value="fan">Fan</option>
				<option value="blindH">Blind Horizontal</option>
				<option value="blindV">Blind Vertical</option>
				<option value="random">Random</option>
			</select>
		</td>
	</tr>
	
	<tr>
		<td width="30%"  valign="middle"><h3>Title Position
        <span class="hasTip" style="cursor: pointer;color: #3B5998;" title="The animation of the slider can be customized with the help of various effects. You can choose the slider animation effect from the list included below.">[?]</span>
        </h3></td>
		<td>
			<table class="bws_position_table">
				<tbody>
				  <tr>
					<td><input type="radio" value="left-top" id="slideshow_title_top-left" name="ct_slider_title_position"></td>
					<td><input type="radio" value="center-top" id="slideshow_title_top-center" name="ct_slider_title_position"></td>
					<td><input type="radio" value="right-top" id="slideshow_title_top-right" name="ct_slider_title_position" checked=""></td>
				  </tr>
				  <tr>
					<td><input type="radio" value="left-middle" id="slideshow_title_middle-left" name="ct_slider_title_position"></td>
					<td><input type="radio" value="center-middle" id="slideshow_title_middle-center" name="ct_slider_title_position"></td>
					<td><input type="radio" value="right-middle" id="slideshow_title_middle-right" name="ct_slider_title_position"></td>
				  </tr>
				  <tr>
					<td><input type="radio" value="left-bottom" id="slideshow_title_bottom-left" name="ct_slider_title_position"></td>
					<td><input type="radio" value="center-bottom" id="slideshow_title_bottom-center" name="ct_slider_title_position"></td>
					<td><input type="radio" value="right-bottom" id="slideshow_title_bottom-right" name="ct_slider_title_position"></td>
				  </tr>
				</tbody>	
			</table>
			<script>jQuery(\'input[name="ct_slider_title_position"][value="{titlepositionActive}"]\').attr("checked","checked");</script>	
		</td>
	</tr>
	
	
	<tr>
		<td width="30%"  valign="middle"><h3>Description Position
        <span class="hasTip" style="cursor: pointer;color: #3B5998;" title="The animation of the slider can be customized with the help of various effects. You can choose the slider animation effect from the list included below.">[?]</span>
        </h3></td>
		<td>
			<table class="bws_position_table">
				<tbody>
				  <tr>
					<td><input type="radio" value="left-top" id="slideshow_description_top-left" name="ct_slider_description_position"></td>
					<td><input type="radio" value="center-top" id="slideshow_description_top-center" name="ct_slider_description_position"></td>
					<td><input type="radio" value="right-top" id="slideshow_description_top-right" name="ct_slider_description_position"></td>
				  </tr>
				  <tr>
					<td><input type="radio" value="left-middle" id="slideshow_description_middle-left" name="ct_slider_description_position"></td>
					<td><input type="radio" value="center-middle" id="slideshow_description_middle-center" name="ct_slider_description_position"></td>
					<td><input type="radio" value="right-middle" id="slideshow_description_middle-right" name="ct_slider_description_position"></td>
				  </tr>
				  <tr>
					<td><input type="radio" value="left-bottom" id="slideshow_description_bottm-Left" name="ct_slider_description_position"></td>
					<td><input type="radio" value="center-bottom" id="slideshow_description_bottom-center" name="ct_slider_description_position"></td>
					<td><input type="radio" value="right-bottom" id="slideshow_description_bottm-right" name="ct_slider_description_position" checked=""></td>
				  </tr>
				</tbody>
		  </table>
		  <script>jQuery(\'input[name="ct_slider_description_position"][value="{descriptionpositionActive}"]\').attr("checked","checked");</script>
		</td>
	</tr>
	
	
	{LIST}
	<tr id="add-image-line">
		<td width="30%"  valign="middle"><h3>Image
        <span class="hasTip" style="cursor: pointer;color: #3B5998;" title="Using this option you can add images for the slider.">[?]</span>
        </h3></td>
		<td><input class="upload-button" type="button" id="slides-img-add-button" value="Upload New Image" /></td>
	</tr>
</table>
	<p class="submit" style="float: left; margin-left: -22px; margin-right: 8px;">
		<input class="button" name="save" type="submit" value="Save changes" style="background: url({THEME_URL}/images/button.png) center; background-size: 100% 100%;" />
		<input type="hidden" name="action" value="save" />
	</p>
</form>
<form method="post" action="themes.php?page=web_dorado_theme&controller=slider_page&reset=reset">
	<p class="submit"> 
		<input class="button" name="reset" type="submit" value="Reset"  style="background: url({THEME_URL}/images/button.png) center; background-size: 100% 100%;"/>
		<input type="hidden" name="action" value="reset" />
	</p>
</form>
</div>


<script type="text/javascript">

jQuery(document).ready(function(){ 
	
	 var j=jQuery(\'tr.slide-from-base\').length;

	
	jQuery(\'#main_slider_div .upload-button\').click(function(){
		var button="add";
 		tb_show(\'\', \'media-upload.php?type=image&amp;TB_iframe=true\');  
		add_image=send_to_editor ;
		
		window.send_to_editor = function(html) { 
			imgurl = jQuery(\'img\',html).attr(\'src\');
			var tr=\'<tr class="new"><td width="30%" valign="middle"><h3>Image</h3></td><td><input size="36" value="\'+imgurl+\'" class="upload" id="ct_image_link_\'+j+\'" name="ct_image_link_\'+j+\'" /><input type="submit" class="update-button" value="Update image"><input class="remove-image" value="Remove image" type="submit" /></td></tr> <tr class="new" rel="\'+j+\'"><td width="30%" valign="middle"><h3></h3></td><td><img  src="\'+imgurl+\'" /></td></tr><tr class="new"><td width="30%" valign="middle"><h3>The URL of image when clicked</h3></td><td><input type="text" name="ct_image_href_\'+j+\'" value="" /></td></tr><tr><td width="30%"  valign="middle"><h3>Image Title</h3></td><td><input  type="text"  name="ct_image_title_\'+j+\'" value="" /></td></tr><tr class="new"><td width="30%"  valign="middle"><h3>Text on images</h3></td><td><textarea name="ct_image_textarea_\'+j+\'"></textarea></td></tr>\';
			jQuery("#add-image-line").before(tr);	
			j++;
			tb_remove();  
		};
		return false; 	
	});
	
	
	jQuery(document).on("click" , ".update-button",  function(){
		var i=jQuery(this).parents("tr").next().attr("rel");
		var button="update";
		tb_show(\'\', \'media-upload.php?type=image&amp;TB_iframe=true\');  	
	
		window.send_to_editor = function(html) { 
			updateurl = jQuery(\'img\',html).attr(\'src\'); 
			jQuery("#ct_image_link_"+i).attr(\'value\',updateurl);
			jQuery("#ct_image_link_"+i).attr(\'name\',\'ct_image_link_\'+i);
			jQuery("tr[rel=\'"+i+"\']").find("img").attr("src",updateurl);
			tb_remove();  
		};

		return false; 	
	});
	

	jQuery(document).on("click" , ".remove-image",  function(){
		jQuery(this).parents("tr").next().next().next().next().remove();
		jQuery(this).parents("tr").next().next().next().remove();
		jQuery(this).parents("tr").next().next().remove();
		jQuery(this).parents("tr").next().remove();
		jQuery(this).parents("tr").remove();
		return false;
	});
	
});
 


</script>
';
			$list='<tr class="slide-from-base"><td width="30%" valign="middle"><h3>Image</h3></td><td><input size="36" value="{LINK}" class="upload" id="ct_image_link_{ID}" name="ct_image_link_{ID}" /><input type="submit" class="update-button" value="Update image"><input class="remove-image" value="Remove image" type="submit" /></td></tr>
<tr rel="{ID}"><td width="30%" valign="middle"><h3></h3></td><td><img  src="{LINK}" /></td></tr>
<tr><td width="30%" valign="middle"><h3>The URL of image when clicked</h3></td><td><input  type="text" name="ct_image_href_{ID}" value="{HREF}" /></td></tr>
<tr><td width="30%"  valign="middle"><h3>Image Title</h3></td><td><input  type="text"  name="ct_image_title_{ID}" value="{TITLE}" /></td></tr>
<tr><td width="30%"  valign="middle"><h3>Text on images</h3></td><td><textarea name="ct_image_textarea_{ID}">{DESCRIPTION}</textarea></td></tr>';
		
			for($i=0;$i<count($link_array);$i++){
				$str=$list;
				$str=str_replace("{LINK}",$link_array[$i],$str);
				if(!isset($href_array[$i]))
				$href_array[$i]='';
				if(!isset($title_array[$i]))
				$title_array[$i]='';
				if(!isset($textarea_array[$i]))
				$textarea_array[$i]='';
				$str=str_replace("{HREF}",$href_array[$i],$str);
				$str=str_replace("{TITLE}",stripslashes($title_array[$i]),$str);
				$str=str_replace("{DESCRIPTION}",stripslashes($textarea_array[$i]),$str);
				$str=str_replace("{ID}",$i,$str);
				$LIST.=$str;
			}
			$template=str_replace("{LIST}",$LIST,$template);			
			$template=str_replace("{HEIGHT}",get_theme_mod('ct_slider_height','400'),$template);
			$template=str_replace("{SPEED}",get_theme_mod('ct_anim_speed','500'),$template);
			$template=str_replace("{PAUSE}",get_theme_mod('ct_pause_time','4000'),$template);
			$template=str_replace("{THEME_URL}",get_template_directory_uri(),$template);
						
			$template=str_replace("{titlepositionActive}",get_theme_mod('ct_slider_title_position'),$template);
			$template=str_replace("{descriptionpositionActive}",get_theme_mod('ct_slider_description_position'),$template);
			
			
			if(get_theme_mod('ct_pause_on_hover')){$template=str_replace("{CHECKED}",'checked="checked"',$template);}
			if(get_theme_mod('ct_hide_slider')){$template=str_replace("{HIDE}",'checked="checked"',$template);}
			if(get_theme_mod('ct_show_slider')){$template=str_replace("{SHOW}",'checked="checked"',$template);}
			
			if(get_theme_mod('ct_effect')){$template=str_replace('value="'.get_theme_mod('ct_effect').'"','value="'.get_theme_mod('ct_effect').'"'.' selected="selected"',$template);}
			else{$template=str_replace("{CHECKED}",'',$template);
				$template=str_replace("{HIDE}",'',$template);
				$template=str_replace("{SHOW}",'',$template);
			}
			echo $template;
		?> <div style="clear:both; width:100%"></div></div></div>  <?php
	}
}