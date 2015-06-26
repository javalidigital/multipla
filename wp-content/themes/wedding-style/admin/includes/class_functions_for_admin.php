<?php 

class wedding_style_admin_helper_class{
	
	private $params;
	private $one_time_use;
	private $most_uses_variables;
		
	function __construct($initial_params=array()){
		
		$defaults= array(
			"textarea_width"=>"440",
			"textarea_height"=>"220",
			"input_size"=>"36",
			"select_width"=>"240",
			"upload_size" => "36"
		);
		$this->params=$this->marge_params($defaults,$initial_params);	
		$this->one_time_use['uses_upload']=1;	
		$this->one_time_use['uses_checkboxs_scripts']=1;
		$this->one_time_use['uses_select_category_scripts']=1;
		$this->one_time_use['uses_open_or_hide_parametr']=1;		
		$this->most_uses_variables['categories']=get_categories('hide_empty=0');
	}
	
	
	public function checkbox_with_input($checkbox,$input,$local_params=NULL){
		if($local_params!=NULL){
			$params=$this->marge_params($this->params,$local_params);
		}
		else{
			
			$params=$this->params;
		}
		$this->print_javascript('uses_open_or_hide_parametr');
		?>
		<div class="param_gorup_div">
			<div class="optiontitle">
				<h3><?php echo $checkbox['name'] ?></h3>
			</div>
			<div class="block margin">
				<div class="optioninput checkbox">
					<input type="hidden" value="" name="<?php echo esc_attr($checkbox['var_name']); ?>"  />
					<input type="checkbox" onclick="open_or_hide_param(this)" class="checkbox with_input" name="<?php echo esc_attr($checkbox['var_name']); ?>" id="<?php echo esc_attr($checkbox['var_name']); ?>" <?php checked($checkbox['std'], "on"); ?> />
				</div>
				<div class="optiondescreption">
					<p><?php echo $checkbox['description'] ?></p>
				</div> 
		
			</div> 
			<div class="block open_hide">
            
            
            
				<div class="optiondescreption">
					<p><?php echo $input['description'] ?></p>
				</div> 
				<div class="optioninput">
					<input name="<?php echo esc_attr($input['var_name']); ?>" id="<?php echo esc_attr($input['var_name']); ?>" type="text" value="<?php echo stripslashes(esc_attr($input['std'])); ?>" size="<?php echo esc_attr($params["input_size"]);  ?>" >
				</div> 
			</div>
		</div>
		<?php 
	}
	
	public function checkbox_with_textarea($checkbox,$textarea,$local_params=NULL){
		if($local_params!=NULL)
			$params=$this->marge_params($this->params,$local_params);
		else
			$params=$this->params;
		$this->print_javascript('uses_open_or_hide_parametr');
		?>
		<div class="param_gorup_div">
	
			<div class="optiontitle">
				<h3><?php echo $checkbox['name'] ?></h3>
			</div>
			<div class="block margin">	
				<div class="optioninput checkbox">
					<input type="hidden" value="" name="<?php echo $checkbox['var_name'] ?>"  />
					<input type="checkbox" onclick="open_or_hide_param(this)" class="checkbox with_input" name="<?php echo $checkbox['var_name'] ?>" id="<?php echo $checkbox['var_name'] ?>" <?php checked($checkbox['std'], "on"); ?> />
				</div>
				<div class="optiondescreption">
					<p><?php echo $checkbox['description'] ?></p>
				</div> 
			</div>
			<div class="block open_hide">	
				<div class="optiondescreption">
					<p><?php echo $textarea['description'] ?></p>
				</div> 
							
				<div class="optioninput">															
					<textarea name="<?php echo esc_textarea($textarea['var_name']); ?>" id="<?php echo esc_textarea($textarea['var_name']); ?>" style="width:<?php echo $params["textarea_width"] ?>px; height:<?php echo $params["textarea_height"] ?>px;"><?php echo stripslashes(esc_html($textarea['std'])); ?></textarea>							
				</div>
			</div>
		</div>	
		<?php 				
	}	
	
	public function only_select($select,$local_params=NULL){
		if($local_params!=NULL)
			$params=$this->marge_params($this->params,$local_params);
		else
			$params=$this->params;
		?>
		<div class="param_gorup_div">
        <?php if( $select['name']){ ?>
			<div class="optiontitle">
				<h3><?php echo $select['name'] ?></h3>
			</div>
         <?php } ?>
			<div class="block">		
				<div class="optiondescreption">
					<p><?php echo $select['description'] ?></p>
				</div> 
				<div class="optioninput"> 		
					<select name="<?php echo $select['var_name'] ?>" id="<?php echo $select['var_name'] ?>" style="width:<?php echo $params["select_width"] ?>px;">
					<?php
					foreach($select['all_values'] as $key => $value){
						?>
						<option value="<?php echo $key ?>" <?php selected( $select['std'], $key); ?>><?php echo $value ?></option>
						<?php 					
					}
					?>
					</select>																
				</div>
			</div>
		</div>
		<?php
	}
	
	public function only_input($input,$local_params=NULL){
		
		if($local_params!=NULL)
			$params=$this->marge_params($this->params,$local_params);
		else
			$params=$this->params;

		?>
		<div class="param_gorup_div">
        <?php if($input['name']){ ?>
			<div class="optiontitle">
				<h3><?php echo $input['name'] ?></h3>
			</div>	
            <?php } ?>
			<div class="block">
				<div class="optiondescreption">
					<p><?php if(isset($input['description'])) echo $input['description'] ?></p>
				</div> 
								
				<div class="optioninput">
					<input type="text" name="<?php echo $input['var_name'] ?>" id="<?php echo $input['var_name']; ?>" value="<?php echo stripslashes(esc_attr($input['std'])); ?>" size="<?php echo $params["input_size"]; ?>">
                    <?php if(isset($input['extend_simvol'])){echo $input['extend_simvol']; } ?>
				</div>
			</div>
		</div>  
		<?php		
	}
	public function only_textarea($textarea,$local_params=NULL){
		if($local_params!=NULL)
			$params=$this->marge_params($this->params,$local_params);
		else
			$params=$this->params;
		?>
            <div>
            <?php if($textarea["name"]){ ?>
                <div class="optiontitle first">
                    <h3><?php echo $textarea["name"] ?></h3>
                </div>
            <?php } ?>
                <div class="block">
                    <div class="optiondescreption">
                    	<p><?php echo $textarea['description'] ?></p>
                    </div>
                    <div class="optioninput">
                    	<textarea name="<?php echo $textarea['var_name'] ?>" id="<?php echo $textarea['var_name'] ?>"  style="width:<?php echo $params["textarea_width"] ?>px; height:<?php echo $params["textarea_height"] ?>px;"><?php echo stripslashes(esc_html($textarea['std'])); ?></textarea>
                    </div>
                </div>
            </div>
       	<?php

		
	}
	public function only_checkbox($checkbox,$local_params=NULL){
		if($local_params!=NULL)
			$params=$this->marge_params($this->params,$local_params);
		else
			$params=$this->params;
		?>
		<div class="param_gorup_div">
								
			<div class="optiontitle">
				<h3><?php echo $checkbox['name'] ?></h3>
			</div>
			<div class="block margin">
				<div class="optioninput checkbox">
					<input type="hidden" value="" name="<?php echo $checkbox['var_name'] ?>"  />
					<input type="checkbox" class="checkbox" name="<?php echo $checkbox['var_name'] ?>" id="<?php echo $checkbox['var_name'] ?>" <?php checked($checkbox['std'], "on"); ?>>
				</div>
			
				<div class="optiondescreption">
					<p><?php if(isset($checkbox['description'])) echo $checkbox['description'] ?></p>
				</div> 
			</div>
			
			
		</div>	
		<?php		
	}
	
	public function only_upload($upload,$local_params=NULL){
		if($local_params!=NULL)
			$params=$this->marge_params($this->params,$local_params);
		else
			$params=$this->params;

		if($this->one_time_use['uses_upload']){
			?>
            <script>
            		jQuery(document).ready(function ($) {
					/*setup the var*/
					jQuery('.upload-button:not("#main_slider_div .upload-button")').click(function () {
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
            <?php
			$this->one_time_use['uses_upload']=0;			
		}
		?>
        <div class="param_gorup_div">
        <?php if($upload["name"]){ ?>
            <div class="optiontitle">
                <h3><?php echo $upload["name"] ?></h3>
            </div>	
            <?php } ?>	
            <div class="optiondescreption">
                <p><?php echo $upload["description"] ?></p>
            </div>
            <div class="optioninput" id="upload_images">
                <input type="text" class="upload" id="<?php echo $upload["var_name"] ?>" name="<?php echo $upload["var_name"] ?>" size="<?php echo $params["upload_size"]?>" value="<?php echo $upload["std"] ?>"/>
                <input class="upload-button" type="button" value="Upload Image"/>
            </div>
        </div>
        <?php 
		
		
	}
	
	
	public function checkbox_with_upload($checkbox,$upload,$local_params=NULL){
		if($local_params!=NULL)
			$params=$this->marge_params($this->params,$local_params);
		else
			$params=$this->params;
			
			$this->print_javascript('uses_open_or_hide_parametr');

		if($this->one_time_use['uses_upload']){
			?>
            <script>
            		jQuery(document).ready(function ($) {
					/*setup the var*/
					jQuery('.upload-button:not("#main_slider_div .upload-button")').click(function () {
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
            <?php
			$this->one_time_use['uses_upload']=0;			
		}
		?>
            <div class="param_gorup_div">		
                <div class="optiontitle">
              	  <h3><?php echo $checkbox["name"] ?></h3>
                </div>
                <div class="block margin">
                    <div class="optiondescreption">
                    <p><?php echo $checkbox["description"] ?></p>
                    </div>
                    <div class="optioninput checkbox">
					<input type="hidden" value="" name="<?php echo $checkbox['var_name'] ?>"  />
                    <input type="checkbox"  class="checkbox with_input" id="<?php echo $checkbox["var_name"] ?>" name="<?php echo $checkbox["var_name"] ?>" onclick="open_or_hide_param(this)" value="on" <?php checked($checkbox["std"], 'on'); ?>/>
                    </div>
                </div>
            
            	<div  class="open_hide">
                    <div class="optiondescreption">
                     <p><?php echo $upload["description"] ?></p>
                    </div>
                    <div class="optioninput open_cheched" id="upload_images">
                		<input type="text" class="upload" id="<?php echo $upload["var_name"] ?>" name="<?php echo $upload["var_name"] ?>" size="<?php echo $params["upload_size"]?>" value="<?php echo $upload["std"] ?>"/>
                        <input class="upload-button" type="button" value="Upload Image"/>                    
                    </div>
            	</div>
            </div>
		<?php
	}
	
	public function checkbox_with_select($checkbox,$select,$inputs=NULL,$local_params=NULL){
		if($local_params!=NULL)
			$params=$this->marge_params($this->params,$local_params);
		else
			$params=$this->params;
		$this->print_javascript('uses_open_or_hide_parametr');
		?>
		<div>
			<div class="optiontitle first">
				<h3><?php echo $checkbox['name'] ?></h3>
			</div>
			<div class="block margin">
				<div class="optiondescreption">
					<p><?php echo $checkbox['description'] ?></p>
				</div>
				<div class="optioninput checkbox">
					<input type="hidden" value="" name="<?php echo $checkbox['var_name'] ?>"  />
					<input type="checkbox" onclick="open_or_hide_param(this)" class="checkbox with_input" name="<?php echo $checkbox["var_name"] ?>"    id="<?php echo $checkbox["var_name"] ?>" <?php checked($checkbox["std"], "on"); ?> />
				</div>
			</div>							
			<div class="open_hide">
            <?php if($inputs) {
					if(isset($inputs[0])){
						foreach($inputs as $input)
							$this->only_input($input);
					}
					else{
						$input=$inputs;
						$this->only_input($input);
					}
				}?>
				<div class="optiondescreption">
					<p><?php echo $select['description'] ?></p>
				</div>
				<div class="block">
				<div class="optioninput">
				<select name="<?php echo $select['var_name'] ?>" id="<?php echo $select['var_name'] ?>" style="width:<?php echo $params["select_width"] ?>px;">
					<?php
					foreach($select['all_values'] as $key => $value){
						?>
						<option value="<?php echo $key ?>" <?php selected( $select['std'], $key); ?>><?php echo $value ?></option>
						<?php 					
					}
					?>
					</select>	
				</div>
			</div>
		</div>	
							
		<?php					
	}
	
	public function only_color($color,$local_params=NULL){
		if($local_params!=NULL)
			$params=$this->marge_params($this->params,$local_params);
		else
			$params=$this->params;

		?>
		<div class="optioninput">
			<label style="margin: 0px;" for="<?php echo $color['var_name']; ?>"><?php echo $color['name']; ?></label>			
			<div style="position: relative; top: 20px;">
				<input type="text" id="<?php echo $color['var_name']; ?>" name="<?php echo $color['var_name']; ?>"   value="<?php echo $color['std']; ?>" style="background-color:<?php echo $color['std']; ?>;">
			</div>
		</div>
		
		
		<script  type="text/javascript">jQuery(document).ready(function() {
					jQuery('#<?php echo $color['var_name']; ?>').wpColorPicker();
				});
		</script>

		<?php 		
	}
	public function select_with_label($select,$class=''){
		?>
		<label class="<?php echo $select['var_name'] ?>" for="<?php echo $select['var_name'] ?>"><?php echo $select['name'] ?></label>
		<select class="<?php echo $class ?>" name="<?php echo $select['var_name'] ?>" id="<?php echo $select['var_name'] ?>" style="width:120px;">
		<?php
		
		foreach($select['all_values'] as $key => $value){
			?>
			<option value="<?php echo $key ?>" <?php selected( $select['std'], $key); ?>><?php echo $value ?></option>
			<?php 					
		}
		?>
		</select>																

		<?php
	}
	public function checkbox_category_checkboxses($checkbox_frst,$checkbox_last,$inputs=NULL,$local_params=NULL){
		if($this->one_time_use['uses_checkboxs_scripts']){
		?>
        <script>
			function refresh_input(cur_element){
			  var input_string='';
			  var checkboxses_main_div=jQuery(cur_element).parent().parent();
			  
			  jQuery(checkboxses_main_div).find("input[type=checkbox]").each(function() {
				  if(this.checked)
				 	 input_string=input_string+this.value+",";
			  });	
			  
			  checkboxses_main_div.find("input[type=hidden]").val(input_string);					
			}
		</script>
             <?php
			$this->one_time_use['uses_checkboxs_scripts']=0;			
		}
		?>
        
         <div>
            <div class="optiontitle">
            	<h3><?php echo $checkbox_frst['name'] ?></h3>
            </div>
            <div class="block margin">
                <div class="optiondescreption">
               		<p><?php echo $checkbox_frst['description'] ?></p>
                </div>
                <div class="optioninput checkbox">
                    <input type="hidden" value="" name="<?php echo $checkbox_frst['var_name'] ?>" />
                    <input type="checkbox" onclick="open_or_hide_param(this)" class="checkbox with_input" name="<?php echo $checkbox_frst['var_name'] ?>"  id="<?php echo $checkbox_frst['var_name'] ?>" <?php checked($checkbox_frst['std'], "on"); ?> />
                </div>
            </div>
            
            <div class="open_hide">
            
            	<?php 
				if($inputs) {
					if(isset($inputs[0])){
						foreach($inputs as $input)
							$this->only_input($input);
					}
					else{
						$input=$inputs;
						$this->only_input($input);
					}
				}
				
				?>
				<div style="clear:both;"></div>
                <div class="optiondescreption">
                    <p><?php echo $checkbox_last['description'] ?></p>
                </div>
                <div class="block">
                
                <?php
                $selected_categories=explode(',',$checkbox_last['std']);
                $cats = $this->most_uses_variables['categories'];
                foreach ($cats as $categs) {
                ?><div class="optioninput checkbox_for_posts">								
                <input onchange="refresh_input(this)" value="<?php echo $categs->cat_ID ?>" type="checkbox" class="checkbox" <?php checked( in_array($categs->cat_ID,$selected_categories), true ); ?> />
                </div>
                <label for="<?php echo "top_cat" . $categs->cat_ID; ?>"> <?php echo $categs->cat_name; ?></label>                
                <br />
                <br />
                <?php } ?>
                <input type="hidden" name="<?php echo $checkbox_last['var_name'] ?>" value="<?php echo $checkbox_last['std'] ?>"  />
                </div>
            </div>
        
        </div>
        
        <?php
		
	}
	public function only_category_checkboxses($checkbox,$local_params=NULL){
		if($this->one_time_use['uses_checkboxs_scripts']){
		?>
        <script>
			function refresh_input(cur_element){
			  var input_string='';
			  var checkboxses_main_div=jQuery(cur_element).parent().parent();
			  
			  jQuery(checkboxses_main_div).find("input[type=checkbox]").each(function() {
				  if(this.checked)
				 	 input_string=input_string+this.value+",";
			  });	
			  
			  checkboxses_main_div.find("input[type=hidden]").val(input_string);					
			}
		</script>
             <?php
			$this->one_time_use['uses_checkboxs_scripts']=0;			
		}
		?>
        <div class="param_gorup_div">
            <div class="optiontitle">
                <h3><?php echo $checkbox['name'] ?></h3>
            </div>
            <div class="optiondescreption" style="width:99% !important">
                <p><?php echo $checkbox['description'] ?></p>
            </div>
            <div class="esiminch">
				<?php
                $selected_categories=explode(',',$checkbox['std']);
                $cats = $this->most_uses_variables['categories'];
                foreach ($cats as $categs) {
                ?><div class="optioninput checkbox_for_posts">								
                <input onchange="refresh_input(this)" value="<?php echo $categs->cat_ID ?>" type="checkbox" class="checkbox" <?php checked( in_array($categs->cat_ID,$selected_categories), true ); ?> />
             
                </div>
                <label for="<?php echo "top_cat" . $categs->cat_ID; ?>"> <?php echo $categs->cat_name; ?></label>                
                <br />
                <br />
                <?php } ?>
                <input type="hidden" name="<?php echo $checkbox['var_name'] ?>" value="<?php echo $checkbox['std'] ?>"  />
             </div>  
         </div>    
        
        <?php
	}
	
	public function category_select_with_checkboxse($checkbox,$select,$local_params=NULL){
		if($this->one_time_use['uses_select_category_scripts']){
		?>
		<script>
			function create_select(select_id){
				var Select_options_sp=jQuery('.select_cat_for_home').eq(0).html();
				jQuery('#category_select_list').append('<select class="select_cat_for_home">'+Select_options_sp+'</select>').append(jQuery('.remov_img').eq(0).clone()).append('<div style="clear:both"></div>');
				if_last_add_refresh_input();
			} 
			
			function if_last_add_refresh_input(){
				var selected_categories={}
				var sp_coount_select=1;
					jQuery('.select_cat_for_home').each(function(index, element) {
						
						selected_categories[''+sp_coount_select+'']=jQuery(this).val();	
						sp_coount_select++;		
					});	
				
				jQuery('#home_page_tabs_exclusive').val(JSON.stringify(selected_categories));
			}
			
			
			function sp_remove_select_element(element){
					if(jQuery('.remov_img').length>1){
					jQuery(element).prev().remove();
					jQuery(element).next().remove();
					jQuery(element).remove();
					}
					if_last_add_refresh_input();
			}
		</script>
		<?php 	
		$this->one_time_use['uses_checkboxs_scripts']=0;
	}
	$this->print_javascript('uses_open_or_hide_parametr');
	?>
							<div>
							<div class="optiontitle">
								<h3><?php echo $checkbox['name'] ?></h3>
							</div>
							<div class="block margin">
								<div class="optiondescreption">
									<p><?php echo $checkbox['description'] ?></p>
								</div>
								<div class="optioninput checkbox">
                    				<input type="hidden" value="" name="<?php echo $checkbox['var_name'] ?>" />
                                    <input type="checkbox" onclick="open_or_hide_param(this)" class="checkbox with_input" name="<?php echo $checkbox['var_name'] ?>"  id="<?php echo $checkbox['var_name'] ?>" <?php if ($checkbox['std']) {  echo "checked=\"checked\"";  } ?> />
                                </div>
							</div>
							
							<div class="open_hide">
							
							
											
								<div class="optiondescreption">
									<p><?php $select['description'] ?></p>
								</div>
								<div class="clear"></div>
								<div class="category_select_list" id="category_select_list">
									<?php $categorys=$this->most_uses_variables['categories'];
									$user_selected_categories=json_decode(stripslashes($select['std']));
									if(count($user_selected_categories)>=1){
									foreach($user_selected_categories as $user_selected_categorie){
									?>
									
									<select onchange="if_last_add_refresh_input(this)" class="select_cat_for_home" >
                                    <?php if(!(isset($local_params['dont_show_recent']) && $local_params['dont_show_recent']==1)){ ?>
                                    <option <?php if($user_selected_categorie=='random') echo 'selected="selected"'; ?>   value="random">Random</option>
									<option <?php if($user_selected_categorie=='popular') echo 'selected="selected"'; ?>   value="popular">Popular</option>
									<option <?php if($user_selected_categorie=='recent') echo 'selected="selected"'; ?>   value="recent">Recent</option>
									<?php }?>
										<?php foreach($categorys as $category) {?>
										<option <?php if($user_selected_categorie==$category->cat_ID) echo 'selected="selected"'; ?>  value="<?php echo $category->cat_ID ?>"><?php echo $category->name ?></option>
										<?php } ?>
									</select>	<img onclick="sp_remove_select_element(this)"  class="remov_img" src="<?php echo get_template_directory_uri().'/images/delete_el_hover.png'; ?>" />
								<div style="clear:both"></div>
								<?php } } else {?>
									<select onchange="if_last_add_refresh_input(this)" class="select_cat_for_home" >
                                    <?php if(!(isset($local_params['dont_show_recent']) && $local_params['dont_show_recent']==1)){ ?>
									<option value="random">Random</option>
									<option value="popular">Popular</option>
									<option value="recent">Recent</option>
									<?php }?>
										<?php foreach($categorys as $category) {?>
										<option <?php if($user_selected_categories==$category->cat_ID) echo 'selected="selected"'; ?>  value="<?php echo $category->cat_ID ?>"><?php echo $category->name ?></option>
										<?php } ?>
									</select>	<img onclick="sp_remove_select_element(this)"  class="remov_img" src="<?php echo get_template_directory_uri().'/images/delete_el_hover.png'; ?>" />
								
								<?php } ?>
								</div>
								<input type="button" value="Add Category" onclick="create_select()" />
								<input type="hidden" id="home_page_tabs_exclusive" name="<?php echo $select['var_name'] ?>" value='<?php echo stripslashes($select['std']); ?>' />
						  	</div>
							
						  </div>
	<div style="clear:both"></div>
	<?php 
	
	}
	
	public function integretion_adsens($checkbox,$radio_select_type,$array_of_options,$local_params=NULL){
		
		
		if($local_params!=NULL){
			$params=$this->marge_params($this->params,$local_params);
		}
		else{
			
			$params=$this->params;
		}
		$this->print_javascript('uses_open_or_hide_parametr');
		
		if($this->one_time_use['uses_select_category_scripts']){
		?>
        		<script>
			jQuery( document ).ready(function() {
				jQuery('.radio_for_hide_or_show').each(function() {
					if(jQuery(this).is(':checked')){
						jQuery(this).parent().parent().parent().find('.radio_'+this.value).show();
					}
					else{
						jQuery(this).parent().parent().parent().find('.radio_'+this.value).hide();
					}
                    
                });
				jQuery('.radio_for_hide_or_show').change(function() {
					jQuery('.radio_for_hide_or_show').each(function() {
							if(jQuery(this).is(':checked')){
								jQuery(this).parent().parent().parent().find('.radio_'+this.value).show();
							}
							else{
								jQuery(this).parent().parent().parent().find('.radio_'+this.value).hide();
							}
                    
                	});
                });

            });
		</script>
        <?php } ?>
		<div class="param_gorup_div">
			<div class="optiontitle">
				<h3><?php echo $checkbox['name'] ?></h3>
			</div>
			<div class="block margin">
				<div class="optioninput checkbox">
					<input type="hidden" value="" name="<?php echo $checkbox['var_name'] ?>"  />
					<input type="checkbox" onclick="open_or_hide_param(this)" class="checkbox with_input" name="<?php echo $checkbox['var_name'] ?>" id="<?php echo $checkbox['var_name'] ?>" <?php checked($checkbox['std'], "on"); ?> />
				</div>
				<div class="optiondescreption">
					<p><?php echo $checkbox['description'] ?></p>
				</div> 		
			</div> 
			<div class="block open_hide">
            
            <div class="radio_div">
           		<div class="radio_description">
					<p><?php echo $radio_select_type['description'] ?></p>
				</div> 
                <div class="radio_select">
				<?php foreach($radio_select_type['values'] as $key => $radio_value){ ?>
                
                    <input class="radio_for_hide_or_show" type="radio" id='<?php echo $radio_select_type['var_name']; echo $radio_value; ?>' value="<?php echo $radio_value; ?>" name="<?php echo $radio_select_type['var_name'] ?>" <?php checked($radio_select_type['std'], $radio_value) ?>  />
                    <label for="<?php echo $radio_select_type['var_name']; echo $radio_value; ?>"><?php echo $radio_select_type['values_description'][$key] ?></label>
                <?php } ?>
                </div>
            </div>
            <?php
			foreach($radio_select_type['values'] as $key => $radio_value){
			?><div class="radio_inner_parametrs radio_<?php echo $radio_value; ?>" ><?php
				foreach($array_of_options[$key] as $array_of_option){
					$this->$array_of_option['type']($array_of_option['variable'],$local_params);
				}					
			?></div><?php 
			}
			?>
			</div>
		</div>
		<?php 
	
	
	
	}
	
	
	private function print_javascript($key){
		if($this->one_time_use[$key]){
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
					jQuery('.with_input').each(function(){open_or_hide_param(this)})
				});
				</script>
				<?php	
				$this->one_time_use[$key]=0;
				}
		
	}
	
	private function marge_params($param_begin_low_prioritet,$param_last_high_priorete){
		$new_param=array();
		foreach($param_begin_low_prioritet as $key=>$value){
			if(isset($param_last_high_priorete[$key])){
				$new_param[$key]=$param_last_high_priorete[$key];
			}
			else{
				$new_param[$key]=$value;
			}
		}
		return $new_param;
	}
	
}

class web_dor_admin_meta_helper_class{
	
	
}







?>