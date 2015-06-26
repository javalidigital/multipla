<?php

class wedding_style_integration_page_class{
	
	public $integration;
	
	public $shortintegration;

	public $options_integration;

	
	function __construct(){
		
		$this->integration = "Integration";
		global $wedding_style_special_id_for_db;
		$this->shortintegration = $wedding_style_special_id_for_db."int";
		
		
		$value_of_std[0]=get_theme_mod($this->shortintegration."_integrate_header_enable",'');
		$value_of_std[1]=get_theme_mod($this->shortintegration."_integrate_body_enable",'');
		$value_of_std[2]=get_theme_mod($this->shortintegration."_integrate_singletop_enable",'');
		$value_of_std[3]=get_theme_mod($this->shortintegration."_integrate_singlebottom_enable",'');
		$value_of_std[4]=get_theme_mod($this->shortintegration."_integration_head",'');
		$value_of_std[5]=get_theme_mod($this->shortintegration."_integration_body",'');
		$value_of_std[6]=get_theme_mod($this->shortintegration."_integration_single_top",'');
		$value_of_std[7]=get_theme_mod($this->shortintegration."_integration_single_bottom",'');
		$value_of_std[8]=get_theme_mod($this->shortintegration."_integrate_is_baner_enable",'');
		$value_of_std[9]=get_theme_mod($this->shortintegration."_integrate_baner_image_url",'');
		
		$value_of_std[10]=get_theme_mod($this->shortintegration."_integration_head_adsense_hide",'on');
		$value_of_std[11]=get_theme_mod($this->shortintegration."_integration_head_adsense_type",'adsens');
		$value_of_std[12]=get_theme_mod($this->shortintegration."_integration_head_adsense",'info@wedingtemplate.com<br>+0056 246 568 74');
		$value_of_std[13]=get_theme_mod($this->shortintegration."_integration_head_advertisment_picture",'');
		$value_of_std[14]=get_theme_mod($this->shortintegration."_integration_head_advertisment_url",'');
		$value_of_std[15]=get_theme_mod($this->shortintegration."_integration_head_advertisment_title",'');
		$value_of_std[16]=get_theme_mod($this->shortintegration."_integration_head_advertisment_alt",'');

		$value_of_std[17]=get_theme_mod($this->shortintegration."_integration_bottom_adsense_hide",'');
		$value_of_std[18]=get_theme_mod($this->shortintegration."_integration_bottom_adsense_type",'adsens');
		$value_of_std[19]=get_theme_mod($this->shortintegration."_integration_bottom_adsense",'');
		$value_of_std[20]=get_theme_mod($this->shortintegration."_integration_bottom_advertisment_picture",'');
		$value_of_std[21]=get_theme_mod($this->shortintegration."_integration_bottom_advertisment_url",'');
		$value_of_std[22]=get_theme_mod($this->shortintegration."_integration_bottom_advertisment_title",'');
		$value_of_std[23]=get_theme_mod($this->shortintegration."_integration_bottom_advertisment_alt",'');
		
		// all options information integration
		$this->options_integration = array(	
             array(
				"name" => "Integration",
				
				"type" => "title"
			),		

			"integrate_header_enable" => array(
			
				"name" => "Enable Header code",
				
				"description" => "Here you can add code to appear in the head section of every page of your blog (e.g.  for adding javascript or css to all pages).",
				
				"var_name" => "integrate_header_enable",

				"id" => $this->shortintegration."_integrate_header_enable",

				"std" => $value_of_std[0]
				
			),

			"integrate_body_enable" => array(
			
				"name" => "Enable Body code",
				
				"description" => "Here you can add code to appear in body section of all pages of your blog (e.g. for displaying a tracking code for a state counter such as Google Analytics).",
				
				"var_name" => "integrate_body_enable",

				"id" => $this->shortintegration."_integrate_body_enable",

				"std" => $value_of_std[1]
				
			),

			"integrate_singletop_enable" => array(
			
				"name" => "Enable Single Top code",
				
				"description" => "Here you can add code to be placed at the top of all single posts (e.g. for integrating social bookmarking links).",
				
				"var_name" => "integrate_singletop_enable",

				"id" => $this->shortintegration."_integrate_singletop_enable",

				"std" => $value_of_std[2]
				
			),

			"integrate_singlebottom_enable" => array(
			
				"name" => "Enable Single Bottom code",
				
				"description" => "Here you can add code to be placed at the bottom of all single posts (e.g. for integrating social bookmarking links).",
				
				"var_name" => "integrate_singlebottom_enable",

				"id" => $this->shortintegration."_integrate_singlebottom_enable",

				"std" => $value_of_std[3]
				
			),

			"integration_head" => array(
			
				"name" => "",
				
				"description" => "",
				
				"var_name" => "integration_head",

				"id" => $this->shortintegration."_integration_head",

				"std" => $value_of_std[4]
			
			),

			"integration_body" => array(
			
				"name" => "",
				
				"description" => "",
				
				"var_name" => "integration_body",

				"id" => $this->shortintegration."_integration_body",

				"std" => $value_of_std[5]
			),

			"integration_single_top" => array(
			
				"name" => "",
				
				"description" => "",
				
				"var_name" => "integration_single_top",
	
				"id" => $this->shortintegration."_integration_single_top",
	
				"std" => $value_of_std[6]
			),

			"integration_single_bottom" => array(
			
				"name" => "",
				
				"description" => "",
				
				"var_name" => "integration_single_bottom",

				"id" => $this->shortintegration."_integration_single_bottom",

				"std" => $value_of_std[7]
			),
						
			
			"integrate_is_baner_enable" => array(
			
				"name" => "Enable 468x60 banner",
				
				"description" => "Enabling this option will display a 468x60 banner ad on the bottom of your post pages below the single post content. If enabled you must fill in the banner image and destination url below.",
				
				"var_name" => "integrate_is_baner_enable",
	
				"id" => $this->shortintegration."_integrate_is_baner_enable",
	
				"std" => $value_of_std[8]
			),

			"integrate_baner_image_url" => array(
			
				"name" => "Input 468x60 advertisement banner image",
				
				"description" => "You can upload the advertisement banner (size 468x60) by clicking the Upload banner button.",
				
				"var_name" => "integrate_baner_image_url",
	
				"id" => $this->shortintegration."_integrate_baner_image_url",
	
				"std" => $value_of_std[9]
			),
			
			
			
			
			
			///////////// #### INTEGRATION SEO HEAD
			
			"integration_head_adsense_hide" => array(
			
				"name" => "Header Advertisement / AdSense",
				
				"description" => "Check the box to place an ad in header.",
				
				"var_name" => "integration_head_adsense_hide",
	
				"id" => $this->shortintegration."_integration_head_adsense_hide",
	
				"std" => $value_of_std[10]
			),
			
			"integration_head_adsense_type" => array(
			
				"name" => "",
				
				"description" => "Select the type of the ad to use.",
				
				"var_name" => "integration_head_adsense_type",
				
				"values" => array('adsens','advertisment'),
				
				"values_description" => array('AdSense','Advertisment'),
	
				"id" => $this->shortintegration."_integration_head_adsense_type",
	
				"std" => $value_of_std[11]
			),
			
			"integration_head_adsense" => array(
			
				"name" => "",
				
				"description" => "Provide the AdSense code.",
				
				"var_name" => "integration_head_adsense",
	
				"id" => $this->shortintegration."_integration_head_adsense",
	
				"std" => $value_of_std[12]
			),
			
			"integration_head_advertisment_picture" => array(
			
				"name" => "",
				
				"description" => "Provide a URL or upload an image to use.",
				
				"var_name" => "integration_head_advertisment_picture",
	
				"id" => $this->shortintegration."_integration_head_advertisment_picture",
	
				"std" => $value_of_std[13]
			),
			"integration_head_advertisment_url" => array(
			
				"name" => "",
				
				"description" => "Provide the URL to get redirected upon clicking the image.",
				
				"var_name" => "integration_head_advertisment_url",
	
				"id" => $this->shortintegration."_integration_head_advertisment_url",
	
				"std" => $value_of_std[14]
			),			
			"integration_head_advertisment_title" => array(
			
				"name" => "",
				
				"description" => "Provide a title for the image.",
				
				"var_name" => "integration_head_advertisment_title",
	
				"id" => $this->shortintegration."_integration_head_advertisment_title",
	
				"std" => $value_of_std[15]
			),	
			"integration_head_advertisment_alt" => array(
			
				"name" => "",
				
				"description" => "Provide an alt text to show if the image is not displayed.",
				
				"var_name" => "integration_head_advertisment_alt",
	
				"id" => $this->shortintegration."_integration_head_advertisment_alt",
	
				"std" => $value_of_std[16]
			),	

			
			
			
			
			///////////////INTEGRATIN SEO BOTTOM
			
			
			
			
			"integration_bottom_adsense_hide" => array(
			
				"name" => "Bottom Advertisement / AdSense",
				
				"description" => "Check the box to place an ad at the bottom of all pages.",
				
				"var_name" => "integration_bottom_adsense_hide",
	
				"id" => $this->shortintegration."_integration_bottom_adsense_hide",
	
				"std" => $value_of_std[17]
			),

			
			
			"integration_bottom_adsense_type" => array(
			
				"name" => "",
				
				"description" => "Select the type of the ad to use.",
				
				"var_name" => "integration_bottom_adsense_type",
				
				"values" => array('adsens','advertisment'),
				
				"values_description" => array('AdSense','Advertisment'),
	
				"id" => $this->shortintegration."_integration_bottom_adsense_type",
	
				"std" => $value_of_std[18]
			),
			
			"integration_bottom_adsense" => array(
			
				"name" => "",
				
				"description" => "Provide the AdSense code.",
				
				"var_name" => "integration_bottom_adsense",
	
				"id" => $this->shortintegration."_integration_bottom_adsense",
	
				"std" => $value_of_std[19]
			),
			
			"integration_bottom_advertisment_picture" => array(
			
				"name" => "",
				
				"description" => "Provide a URL or upload an image to use.",
				
				"var_name" => "integration_bottom_advertisment_picture",
	
				"id" => $this->shortintegration."_integration_bottom_advertisment_picture",
	
				"std" => $value_of_std[20]
			),
			"integration_bottom_advertisment_url" => array(
			
				"name" => "",
				
				"description" => "Provide the URL to get redirected upon clicking the image.",
				
				"var_name" => "integration_bottom_advertisment_url",
	
				"id" => $this->shortintegration."_integration_bottom_advertisment_url",
	
				"std" => $value_of_std[21]
			),	
			"integration_bottom_advertisment_title" => array(
			
				"name" => "",
				
				"description" => "Provide a title for the image.",
				
				"var_name" => "integration_bottom_advertisment_title",
	
				"id" => $this->shortintegration."_integration_bottom_advertisment_title",
	
				"std" => $value_of_std[22]
			),	
			"integration_bottom_advertisment_alt" => array(
			
				"name" => "",
				
				"description" => "Provide an alt text to show if the image is not displayed.",
				
				"var_name" => "integration_bottom_advertisment_alt",
	
				"id" => $this->shortintegration."_integration_bottom_advertisment_alt",
	
				"std" => $value_of_std[23]
			),	
		);
		
		
	}
	

	/// save changes or reset options
	public function web_dorado_theme_update_and_get_options_integration(){
		
		if ( isset($_GET['page']) && $_GET['page'] == "web_dorado_theme" && isset($_GET['controller']) && $_GET['controller'] == "integration_page") {
			if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'save') {
				foreach ($this->options_integration as $value) {
					if (isset($_REQUEST[$value['var_name']])) {
						set_theme_mod($value['id'], $_REQUEST[$value['var_name']]);
					} else {
						remove_theme_mod($value['id']);
					}
				}
				header("Location: themes.php?page=web_dorado_theme&controller=integration_page&saved=true");
				die;
			} else if (isset($_REQUEST['action']) && $_REQUEST['action'] =='reset') {
				foreach ($this->options_integration as $value) {
					remove_theme_mod($value['id']);
				}
				header("Location: themes.php?page=web_dorado_theme&controller=integration_page&reset=true");
				die;
			}
		}
	
	}
	
	public function web_dorado_integration_page_admin_scripts(){
		
		wp_enqueue_style('integration_page_main_style',get_template_directory_uri('template_directory').'/admin/css/integration_page.css');	
		

	}
	
	public function dorado_theme_admin_integration(){
	
	if(isset($_REQUEST['controller']) && $_REQUEST['controller']=='integration_page'){
	if (isset($_REQUEST['saved']) && $_REQUEST['saved'] ) 
	
		echo '<div id="message" class="updated"><p><strong>Integration settings are saved.</strong></p></div>';
		
	if (isset($_REQUEST['reset']) && $_REQUEST['reset'] ) 
	
		echo '<div id="message" class="updated"><p><strong>Integration settings are reset.</strong></p></div>';
	}
	
	global $wedding_style_admin_helepr_functions, $wedding_style_web_dor;
	?>
	<script>
	function open_or_hide_param(cur_element){	
				if(cur_element.checked){
					jQuery(cur_element).parent().parent().parent().find('.open_hide').show();
				}
				else
				{
					jQuery(cur_element).parent().parent().parent().find('.open_hide').hide();
				}
	}

	jQuery(document).ready(function() { 
		jQuery('.with_input_home').each(function(){open_or_hide_param_home(this)})
		jQuery('.with_input__').each(function(){open_or_hide_param(this)})
	
	jQuery("#change-integration-1").click(function(){
				jQuery("#integration_2").hide(100);
				jQuery("#integration_1").show(100);
				jQuery("#button_integration-1").addClass("active_button");
				jQuery("#button_integration-2").removeClass("active_button");

		
			});
		  
	jQuery("#change-integration-2").click(function(){
		
				jQuery("#integration_1").hide(100);
				jQuery("#integration_2").show(100);
				jQuery("#button_integration-2").addClass("active_button");
				jQuery("#button_integration-1").removeClass("active_button");

	});
	
	jQuery('#main_integration_page .upload-button').click(function () {
		window.parent.uploadID = jQuery(this).prev('input');
		/*grab the specific input*/
		formfield = jQuery('.upload').attr('name');
		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		return false;
	});
		
	window.send_to_editor = function (html) {
		imgurl = jQuery('img', html).attr('src');
		window.parent.uploadID.val(imgurl);
		/*assign the value to the input*/
		tb_remove();
	};
	
	});
	</script>
	
	<div id="main_integration_page">
	
		<table align="center" width="90%" style="margin-top: 0px; margin-bottom: 20px;border-bottom: rgb(111, 111, 111) solid 2px;">
			    <tr>   
                      <td style="font-size:14px; font-weight:bold">
					     <a href="<?php echo esc_url($wedding_style_web_dor).'/wordpress-themes-guide-step-1.html'; ?>" target="_blank" style="color:#126094; text-decoration:none;">User Manual</a><br />This section allows you to customize the homepage. 
                         <a href="<?php echo esc_url($wedding_style_web_dor).'/wordpress-theme-options/3-5.html'; ?>" target="_blank" style="color:#126094; text-decoration:none;">More...</a>
					  </td>   
                      <td  align="right" style="font-size:16px;">
                           <a href="<?php echo esc_url($wedding_style_web_dor).'/wordpress-themes/wedding-style.html'; ?>" target="_blank" style="color:red; text-decoration:none;">
                              <img src="<?php echo get_template_directory_uri() ?>/images/header.png" border="0" alt="" width="215">
                           </a>
                        </td>
                </tr>
				<tr>
					<td colspan="2"><h3  style="margin: 0px;font-family:Segoe UI;padding-bottom: 15px;color: rgb(111, 111, 111); font-size:18pt;"><?php echo $this->integration; ?></h3>
					</td>
				</tr>
			</table>		
		<form method="post"  action="themes.php?page=web_dorado_theme&controller=integration_page">
			<table align="center" width="90%" style=" padding-bottom:0px; padding-top:0px;">
				<tr>
					<td>
							<a href="javascript:;" id="change-integration-1" style="text-decoration:none; color:black; font-family:Segoe UI;color: rgb(111, 111, 111); font-size:10p;"><span class="button active_button" id="button_integration-1" style="background: url(<?php get_template_directory_uri('template_url'); ?>/images/button.png) center; background-size: 100% 100%;">Main Integretion</span></a>
							<a href="javascript:;" id="change-integration-2" style="text-decoration:none; background-color:silver; color:black; font-family:Segoe UI;color: rgb(111, 111, 111); font-size:10p;"><span class="button" id="button_integration-2" style="background: url(<?php get_template_directory_uri('template_url'); ?>/images/button.png) center; background-size: 100% 100%;">AdSense and Advertisement Integrations</span></a>
<br />
<br />

				<div id="integration_1">
                      <?php
					    $wedding_style_admin_helepr_functions->checkbox_with_textarea($this->options_integration['integrate_header_enable'], $this->options_integration['integration_head']);
					    $wedding_style_admin_helepr_functions->checkbox_with_textarea($this->options_integration['integrate_body_enable'], $this->options_integration['integration_body']);
					    $wedding_style_admin_helepr_functions->checkbox_with_textarea($this->options_integration['integrate_singletop_enable'], $this->options_integration['integration_single_top']);
						$wedding_style_admin_helepr_functions->checkbox_with_textarea($this->options_integration['integrate_singlebottom_enable'], $this->options_integration['integration_single_bottom']);						
                      ?>					  
				</div>
				<div id="integration_2"  style="display:none;">
				      <?php
					    $array_of_head_adsens=array(
					// adsens of head
						0=>array(
							0=> array(
									'type' =>'only_textarea',
									'variable'=>$this->options_integration['integration_head_adsense']
								)
						),
					// advertisment of head
						1=>array(
							0=> array(
									'type' =>'only_upload',
									'variable'=>$this->options_integration['integration_head_advertisment_picture']
								),
							1=> array(
									'type' =>'only_input',
									'variable'=>$this->options_integration['integration_head_advertisment_url']
							),
							2=> array(
									'type' =>'only_input',
									'variable'=>$this->options_integration['integration_head_advertisment_title']
							),
							3=> array(
									'type' =>'only_input',
									'variable'=>$this->options_integration['integration_head_advertisment_alt']
							)
							
							
						)
					
					);
					
					$array_of_bottom_adsens=array(
					// adsens of bottom
						0=>array(
							0=> array(
									'type' =>'only_textarea',
									'variable'=>$this->options_integration['integration_bottom_adsense']
								)
						),
					// advertisment of bottom
						1=>array(
							0=> array(
									'type' =>'only_upload',
									'variable'=>$this->options_integration['integration_bottom_advertisment_picture']
								),
							1=> array(
									'type' =>'only_input',
									'variable'=>$this->options_integration['integration_bottom_advertisment_url']
							),
							2=> array(
									'type' =>'only_input',
									'variable'=>$this->options_integration['integration_bottom_advertisment_title']
							),
							3=> array(
									'type' =>'only_input',
									'variable'=>$this->options_integration['integration_bottom_advertisment_alt']
							)							
						)
					
					);
						$wedding_style_admin_helepr_functions->integretion_adsens($this->options_integration['integration_head_adsense_hide'], $this->options_integration['integration_head_adsense_type'],$array_of_head_adsens);
						$wedding_style_admin_helepr_functions->integretion_adsens($this->options_integration['integration_bottom_adsense_hide'], $this->options_integration['integration_bottom_adsense_type'],$array_of_bottom_adsens);
					  ?>						
						
				</div>
			</td>
		</tr>
	</table>
	<br/>
	<p class="submit" style="float: left; margin-left: 63px; margin-right: 8px;">
			<input class="button" name="save" type="submit" value="Save changes"/>
			<input type="hidden" name="action" value="save"/>
	</p>
   </form>
   <form method="post" action="themes.php?page=web_dorado_theme&controller=integration_page">
		<p class="submit">
			<input class="button" name="reset" type="submit" value="Reset"/>
			<input type="hidden" name="action" value="reset"/>
		</p>
	</form>
</div>
	<?php	
	}	
	public function update_head_integration(){
		
			foreach ($this->options_integration as $value) {
		       if(isset($value['var_name'])) 
				if (get_theme_mod($value['var_name']) === FALSE) {
					$$value['var_name'] = $value['std'];
				}
		
			}
			if($integrate_header_enable)
				echo stripslashes($integration_head);
	
	}
	public function update_body_integration(){
		
			foreach ($this->options_integration as $value) {
		      if(isset($value['var_name']))
				if (get_theme_mod($value['var_name']) === FALSE) {
					$$value['var_name'] = $value['std'];
				}
		
			}
		
		if($integrate_body_enable)
			echo stripslashes($integration_body);


	}
	
	public function update_top_of_post_integration()
	{
	
		foreach ($this->options_integration as $value) {
		       if(isset($value['var_name']))
				if (get_theme_mod($value['var_name']) === FALSE) {
					$$value['var_name'] = $value['std'];
				}
		
			}
	
		if($integrate_singletop_enable)
		echo stripslashes($integration_single_top);
	
	}

	public function update_bottom_of_post_integration()
	{
	
		foreach ($this->options_integration as $value) {
			if(isset($value['var_name']))	
				if (get_theme_mod($value['var_name']) === FALSE) {
					$$value['var_name'] = $value['std'];
				}
		
			}
		
		if($integrate_singlebottom_enable)
		echo stripslashes($integration_single_bottom);
	
	}
	
	public function head_advertisment(){
		foreach ($this->options_integration as $value) {
			if(isset($value['var_name']))	
				if (get_theme_mod($value['var_name']) === FALSE) {
					$$value['var_name'] = $value['std'];
				}
		}
	
		
		if($integration_head_adsense_hide=='on'){
			switch($integration_head_adsense_type){
			case 'adsens': 
				?><div class="advertismnet" id="top-advertismnet"><?php echo $integration_head_adsense ?></div><?php 
				break;
			case 'advertisment': 
				?><div class="advertismnet" id="top-advertismnet"><a href="<?php echo esc_url($integration_head_advertisment_url); ?>"><img src="<?php echo esc_url($integration_head_advertisment_picture); ?>" alt="<?php echo $integration_head_advertisment_alt; ?>" title="<?php echo $integration_head_advertisment_title; ?>" /></a></div><?php 
				break;
			default:
				?><div class="advertismnet" id="top-advertismnet"><?php echo $integration_head_adsense ?></div><?php 
			}
		} 
		
	}
	public function bottom_advertisment(){
		foreach ($this->options_integration as $value) {
			if(isset($value['var_name']))	
				if (get_theme_mod($value['var_name']) === FALSE) {
					$$value['var_name'] = $value['std'];
				}
		}
		
		if($integration_bottom_adsense_hide=='on'){
			switch($integration_bottom_adsense_type){
			case 'adsens': 
				?><div class="advertismnet" id="bottom-advertismnet"><?php echo $integration_bottom_adsense ?></div><?php 
				break;
			case 'advertisment': 
				?><div class="advertismnet" id="bottom-advertismnet"><a href="<?php echo esc_url($integration_bottom_advertisment_url); ?>" ><img src="<?php echo esc_url($integration_bottom_advertisment_picture); ?>" alt="<?php echo $integration_bottom_advertisment_alt; ?>" title="<?php echo $integration_bottom_advertisment_title; ?>" /></a></div><?php 
				break;
			default:
				?><div class="advertismnet" id="bottom-advertismnet"><?php echo $integration_bottom_adsense ?></div><?php 

			}
		} 
		
	}


}
 