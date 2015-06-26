<?php 
class wedding_style_home_page_class{
	public $homepage;
	public $shorthomepage;
	public $options_homepage;
	
	function __construct(){
		$this->homepage = "Homepage";
		$this->shorthomepage = "";
		$value_of_std[1]=get_theme_mod($this->shorthomepage."_top_post_cat_name",'');
		$value_of_std[2]=get_theme_mod($this->shorthomepage."_hide_top_posts",'on');
		$value_of_std[3]=get_theme_mod($this->shorthomepage."_top_post_categories",'');
		$value_of_std[5]=get_theme_mod($this->shorthomepage."_home_page_tabs_exclusive",'');
		$value_of_std[6]=get_theme_mod($this->shorthomepage."_hide_content_post",'on');
		$value_of_std[7]=get_theme_mod($this->shorthomepage."_home_content_post",'');
		$value_of_std[9]=get_theme_mod($this->shorthomepage."_content_post_cat_name",'my wedding photos');
		$value_of_std[10]=get_theme_mod($this->shorthomepage."_hide_content_posts",'on');
		$value_of_std[11]=get_theme_mod($this->shorthomepage."_content_post_categories",'');
		$value_of_std[12] = get_theme_mod($this->shorthomepage."_content_post_img", get_template_directory_uri().'/images/Wedding-01.png');
		
		
		$this->options_homepage = array(
			
			"top_post_cat_name" => array(
			
				"name" => "Top Post Title",
				
				"description" => "Specify a title for the top posts.",
				
				"var_name" => "top_post_cat_name",
				
				"id" => $this->shorthomepage."_top_post_cat_name",
				
				"std" => $value_of_std[1]
			),
			
			"hide_top_posts" => array(
			
				"name" => "Show Top Posts",
				
				"description" => "Check the box to display the top posts from the homepage.",
				
				"var_name" => "hide_top_posts",
				
				"id" => $this->shorthomepage."_hide_top_posts",
				
				"std" => $value_of_std[2]
			),
			
			
			"top_post_categories" => array(
			
				"name" => "Show Top Posts",
				
				"description" => "Select the categories from which you want the homepage top posts to be selected (the posts are selected automatically).",
				
				"var_name" => "top_post_categories",
				
				"id" => $this->shorthomepage."_top_post_categories",
				
				"std" => $value_of_std[3]
			),	
			
			"hide_content_post" => array(
			
				"name" => "Show featured post",
				
				"description" => "Check the box to display the featured post on homepage.",
				
				"var_name" => "hide_content_post",
				
				"id" => $this->shorthomepage."_hide_content_post",
				
				"std" => $value_of_std[6]
			),
			
			"home_content_post" => array(
			
				"name" => "Hide content post.",
				
				"all_values" => $this->get_all_posts_in_select(),
				
				"description" => "Select a post for displaying as a featured post",
				
				"var_name" => "home_content_post",
				
				"id" => $this->shorthomepage."_home_content_post",
				
				"std" => $value_of_std[7]
			),
		
			"content_post_cat_name" => array(
			
				"name" => "Title for the Content Posts",
				
				"description" => "Specify a name for the content post group.",
				
				"var_name" => "content_post_cat_name",
				
				"id" => $this->shorthomepage."_content_post_cat_name",
				
				"std" => $value_of_std[9]
			),
			
			"hide_content_posts" => array(
			
				"name" => "Content Top Posts",
				
				"description" => "Check the box to select the categories from which the content top posts will be displayed.",
				
				"var_name" => "hide_content_posts",
				
				"id" => $this->shorthomepage."_hide_content_posts",
				
				"std" => $value_of_std[10]
			),
			
			
			"content_post_categories" => array(
			
				"name" => "",
				
				"description" => "Select the categories.",
				
				"var_name" => "content_post_categories",
				
				"id" => $this->shorthomepage."_content_post_categories",
				
				"std" => $value_of_std[11]
			),
			
			'content_post_img' => array(
			
				"name" => "Featured Post background image",
				
				"description" => "You can upload a custom image to be used as a background for the featured post.",
				
				"var_name" => "content_post_img",
				
				"id" => $this->shorthomepage."_content_post_img",
				
				"std" => $value_of_std[12]
			),
		);
	}
	/* save changes or reset options */
	public function web_dorado_theme_update_and_get_options_home(){
		if (isset($_GET['page']) &&  $_GET['page'] == "web_dorado_theme" && isset($_GET['controller']) && $_GET['controller'] == "home_page") {
			if (isset($_REQUEST['action']) && $_REQUEST['action']=='save' ) {
				foreach ($this->options_homepage as $value) {
					if(isset($_REQUEST[$value['var_name']]))
						set_theme_mod($value['id'], stripslashes($_REQUEST[$value['var_name']]));
				}
				foreach ($this->options_homepage as $value) {
					if (isset($_REQUEST[$value['var_name']])) {
						set_theme_mod($value['id'], stripslashes($_REQUEST[$value['var_name']]));
					} else {
						remove_theme_mod($value['id']);
					}
				}
				header("Location: themes.php?page=web_dorado_theme&controller=home_page&saved=true");
				die;
			} 
			else {
				if (isset($_REQUEST['action']) && $_REQUEST['action']=='reset') {
					foreach ($this->options_homepage as $value) {
						remove_theme_mod($value['id']);
					}
					header("Location: themes.php?page=web_dorado_theme&controller=home_page&reset=true");
					die;
				}
			}
		}
	}
	
	public function web_dorado_home_page_admin_scripts(){
		wp_enqueue_style('home_page_main_style',get_template_directory_uri().'/admin/css/home_page.css');	
	}
	
	public function update_parametr($param_name,$value){
		set_theme_mod($this->options_homepage[$param_name]['id'],$value);
	}
	
	private function get_all_posts_in_select(){
		$args= array(
			'posts_per_page'   => 3000,
			'orderby'          => 'post_date',
			'order'            => 'DESC',
			'post_type'        => 'post',
			'post_status'      => 'publish',
		);
		$posts_array_custom=array();
		
		$posts_array = get_posts( $args );
			foreach($posts_array as $post){
				$posts_array_custom[$post->ID]=$post->post_title;
			}
		return $posts_array_custom;
	}
	
	public function dorado_theme_admin_home(){
			
		if (isset($_REQUEST['saved']) && $_REQUEST['saved'] ) 
		
			echo '<div id="message" class="updated"><p><strong>Home settings are saved.</strong></p></div>';
			
		if (isset($_REQUEST['reset']) && $_REQUEST['reset'] ) 
		
			echo '<div id="message" class="updated"><p><strong>Home settings are reset.</strong></p></div>';
			
		global $wedding_style_admin_helepr_functions;
		
		global $wedding_style_web_dor;	?>
	
	
		<div id="main_home_page">
			<table align="center" width="90%" style="margin-top: 0px; margin-bottom: 20px;">
				<tr>
					<td colspan="2">
						<h2 style="margin:15px 0px 0px;font-family:Segoe UI;padding-bottom: 10px;color: rgb(111, 111, 111); font-size:28pt;">Homepage</h2>
					</td>
				</tr>
				<tr>   
					<td style="font-size:14px; font-weight:bold; padding-left: 5px;">
					    <a href="<?php echo esc_url($wedding_style_web_dor).'/wordpress-themes-guide-step-1.html'; ?>" target="_blank" style="color:#126094; text-decoration:none;">User Manual</a><br />This section allows you to make changes in post styles and customize your homepage appearance.
                        <a href="<?php echo esc_url($wedding_style_web_dor).'/wordpress-theme-options/3-4.html'; ?>" target="_blank" style="color:#126094; text-decoration:none;">More...</a>
					    </td>   
                    <td  align="right" style="font-size:16px;">
						<a href="<?php echo esc_url($wedding_style_web_dor).'/wordpress-themes/wedding-style.html'; ?>" target="_blank" style="color:red; text-decoration:none;">
							<img src="<?php echo get_template_directory_uri() ?>/images/header.png" border="0" alt="" width="215">
						</a>
					</td>
				</tr>
			</table>
			<form method="post"  action="themes.php?page=web_dorado_theme&controller=home_page">
				<table align="center" width="90%" style=" padding-bottom:0px; padding-top:0px;">
					<tr>
						<td>
							<?php 
							$wedding_style_admin_helepr_functions->only_input($this->options_homepage['top_post_cat_name']);  /* Home Number of posts */
							$wedding_style_admin_helepr_functions->checkbox_category_checkboxses($this->options_homepage['hide_top_posts'],$this->options_homepage['top_post_categories']);  /* Home Top posts */						  
							$wedding_style_admin_helepr_functions->only_upload($this->options_homepage['content_post_img']); /* Content post bg image */
							$wedding_style_admin_helepr_functions->checkbox_with_select($this->options_homepage['hide_content_post'],$this->options_homepage['home_content_post']);  /* Home Number of posts */
							$wedding_style_admin_helepr_functions->only_input($this->options_homepage['content_post_cat_name']);  /* Home Number of posts */
							$wedding_style_admin_helepr_functions->checkbox_category_checkboxses($this->options_homepage['hide_content_posts'],$this->options_homepage['content_post_categories']);  /* Home Top posts */	
							?>
						</td>
					</tr>
				</table><br/>
				<p class="submit" style="float: left; margin-left: 63px; margin-right: 8px;">
					<input class="button" name="save" type="submit" value="Save changes"/>
					<input type="hidden" name="action" value="save"/>
				</p>
			</form>
			<form method="post" action="themes.php?page=web_dorado_theme&controller=home_page">
				<p class="submit">
					<input class="button" name="reset" type="submit" value="Reset"/>
					<input type="hidden" name="action" value="reset"/>
				</p>
			</form>
		</div>
	<?php
	}	
}