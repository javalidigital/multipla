<?php

class wedding_style_sample_date{
	
	public function web_dorado_sample_data_admin_scripts(){
		
		wp_enqueue_script('jquery');	
		
	}


	public function wedding_style_install_posts(){
		
		if(isset($_GET['install_element']) && $_GET['install_element']=='inst')
		{
			$this->install_post_menu_pages();
			//$this->install_widgets();		
		}
		if(isset($_GET['remove_element']) && $_GET['remove_element']=='rem'){		
			$this->remove_post_menu_pages();
			$this->remove_widgets();		
		}
		?>
		<script>
		count_of_installed=1;
		installeation=new Array();
			installeation[1]='Adding Page Our Story';
			installeation[2]='Adding Page Trip';
			installeation[3]='Adding Page Bridesmaids';
			installeation[4]='Adding Gallery Posts Category';
			installeation[5]='Adding Top Posts Category';
			installeation[6]='Adding Category Tab Posts Category';
			installeation[7]='Adding Post Vestibulum auctor dapibus neque';
			installeation[8]='Adding Post HTML Ipsum Presents';
			installeation[9]='Adding Post Lorem ipsum dolor sit amet';
			installeation[10]='Adding Post Vestibulum auctor dapibus neque';
			installeation[11]='Adding Post Claritas est etiam processus dynamicus';
			installeation[12]='Adding Post Phasellus ultrices nulla quis nibh';
			installeation[13]='Adding Post Morbi in sem quis dui';
			installeation[14]='Adding Post Phasellus ultrices nulla quis nibh';
			installeation[15]='Adding Post Lorem ipsum dolor sit amet';
			installeation[16]='Adding Post HTML Ipsum Presents';
			installeation[17]='Adding Post Vestibulum auctor dapibus neque';
			installeation[18]='Adding Post Claritas est etiam processus dynamicus';
			installeation[19]='Adding Post Bride';
			installeation[20]='Adding Post Art';
			installeation[21]='Adding Post Bridesmaids';
			installeation[22]='Adding Post Fiance';
			installeation[23]='Adding Post Lorem Impsum';
			installeation[24]='Connecting Thumbnails to Vestibulum auctor dapibus neque Post';
			installeation[25]='Connecting Thumbnails to HTML Ipsum Presents Post';
			installeation[26]='Connecting Thumbnails to Lorem ipsum dolor sit amet Post';
			installeation[27]='Connecting Thumbnails to Vestibulum auctor dapibus neque Post';
			installeation[28]='Connecting Thumbnails to Claritas est etiam processus dynamicus Post';
			installeation[29]='Connecting Thumbnails to Phasellus ultrices nulla quis nibh Post';
			installeation[30]='Connecting Thumbnails to Morbi in sem quis dui Post';
			installeation[31]='Connecting Thumbnails to Phasellus ultrices nulla quis nibh Post';
			installeation[32]='Connecting Thumbnails to Lorem ipsum dolor sit amet Post';
			installeation[33]='Connecting Thumbnails to HTML Ipsum Presents Post';
			installeation[34]='Connecting Thumbnails to Vestibulum auctor dapibus neque Post';
			installeation[35]='Connecting Thumbnails to Claritas est etiam processus dynamicus Post';
			installeation[36]='Connecting Thumbnails to Art Post';
			installeation[37]='Connecting Thumbnails to Bridesmaids Post';
			installeation[38]='Connecting Thumbnails to Fiance Post';
			installeation[39]='Connecting Thumbnails to Lorem Impsum Post';
			installeation[40]='Adding Logo Image';
			installeation[41]='Adding Menu Wedding Style';
			installeation[42]='Adding Menu Item Home';
			installeation[43]='Adding Menu Item Our Story';
			installeation[44]='Adding Menu Item Trip';
			installeation[45]='Adding Menu Item Bridesmaids';
			installeation[46]='Adding Slider Options';
			installeation[47]='Adding Widget';
			installeation[48]='The data is installed';

			
			
		count_of_remov=1;	
	    removing=new Array();
			removing[1]='Remove Page Our Story';
			removing[2]='Remove Page Trip';
			removing[3]='Remove Page Bridesmaids';
			removing[4]='Remove Gallery Posts Category';
			removing[5]='Remove Top Posts Category';
			removing[6]='Remove Category Tab Posts Category';
			removing[7]='Remove Post Vestibulum auctor dapibus neque';
			removing[8]='Remove Post HTML Ipsum Presents';
			removing[9]='Remove Post Lorem ipsum dolor sit amet';
			removing[10]='Remove Post Vestibulum auctor dapibus neque';
			removing[11]='Remove Post Claritas est etiam processus dynamicus';
			removing[12]='Remove Post Phasellus ultrices nulla quis nibh';
			removing[13]='Remove Post Morbi in sem quis dui';
			removing[14]='Remove Post Phasellus ultrices nulla quis nibh';
			removing[15]='Remove Post Lorem ipsum dolor sit amet';
			removing[16]='Remove Post HTML Ipsum Presents';
			removing[17]='Remove Post Vestibulum auctor dapibus neque';
			removing[18]='Remove Post Claritas est etiam processus dynamicus';
			removing[19]='Remove Post Bride';
			removing[20]='Remove Post Art';
			removing[21]='Remove Post Bridesmaids';
			removing[22]='Remove Post Fiance';
			removing[23]='Remove Post Lorem Impsum';
			removing[24]='Remove Menu';
			removing[25]='Remove Widgets';
			removing[26]='The data is removed';
				
			
			function add_install_text(install_text){
				var kent_or_zuyk=count_of_installed%2+1;
				new_element=jQuery('<div class="install_date'+kent_or_zuyk+'"><div  class="install_text">'+install_text+'&nbsp;&nbsp;&nbsp;&nbsp; </div><div class="result_div"><img class="image_load" src="<?php  echo get_template_directory_uri('template_url'); ?>/images/loading.gif" /></div></div>');
				jQuery('#installed_date_list').append(new_element);
				return new_element;
			}
			function add_remov_text(remov_text){
				var kent_or_zuyk=count_of_remov%2+1;
				new_element=jQuery('<div class="remove_date'+kent_or_zuyk+'"><div  class="remove_text">'+remov_text+'&nbsp;&nbsp;&nbsp;&nbsp; </div><div class="result_div"><img class="image_load" src="<?php  echo get_template_directory_uri('template_url'); ?>/images/loading.gif" /></div></div>');
				jQuery('#installed_date_list').append(new_element);
				return new_element;
			}
			function submit(remov_or_install,number_action){
				if(number_action==1){
					jQuery('#installed_date_list').html('');
					}
				if(remov_or_install=='install'){
					if(number_action==1){
						count_of_installed=1;
						if(!confirm("This action will install sample data for your theme.Are you sure to proceed?"))
					return;
					}
					element=add_install_text(installeation[count_of_installed]);
					image_complete=jQuery(element).find('img');
					result_div=jQuery(element).find('.result_div');
					jQuery.ajax({
					  url: "<?php echo  admin_url('admin-ajax.php'); ?>?action=install_sample_date&number_of_actoion="+number_action,
					  success: function(data){
						  if(data=='1'){
							image_complete.attr('src','<?php  echo get_template_directory_uri('template_url'); ?>/images/sucsess.png');
						  }
						  else
						  {
							  result_div.html(data);
						  }	  
						  count_of_installed++;
						  if(count_of_installed!=installeation.length){
							 
						  	  submit('install',count_of_installed)
							   
						  }
					  }
					});
					return;
				}
				
				if(remov_or_install=='remove'){
					if(number_action==1){
						count_of_remov=1;	
					if(!confirm("This action will remove sample data. Are you sure to proceed?"))
						return;
					}
				    element=add_remov_text(removing[count_of_remov]);
					image_complete=jQuery(element).find('img');
					result_div=jQuery(element).find('.result_div');
					jQuery.ajax({
					  url: "<?php echo  admin_url('admin-ajax.php'); ?>?action=remove_sample_date&number_of_actoion="+number_action,
					  success: function(data){
						  if(data=='1'){
							image_complete.attr('src','<?php  echo get_template_directory_uri('template_url'); ?>/images/sucsess.png');
						  }
						  else
						  {
							  result_div.html(data);
						  }	  
						  
						   count_of_remov++;
						  if(count_of_remov!=removing.length){
							 
						  	  submit('remove',count_of_remov)
						  }
					  }
					});
					return;

				}
				
				
			}
		
		
		</script>
		<style>
			.headin_class{
				-webkit-margin-before: 0px;
				-webkit-margin-after: 10px;
				margin-left:59px;
				font-family:Segoe UI;
				width:90%;padding-bottom: 15px;
				border-bottom: rgb(111, 111, 111) solid 2px;
				color: rgb(111, 111, 111);
				font-size:18pt;
				
			}
			#installed_date_list{
				margin-left:59px;
				width:90%;
			}
			#install_remove{
				background-color:#F1F1F1 ;
				margin:10px;
				width:90%;
				margin-left:59px;
				
			}
			#doaction{
				margin: 10px;
				margin-right:0px;
			}
			.install_text{
				color:rgb(111, 111, 111);
				font-family:Segoe UI;
				font-size:15pt;
				float:left;
			}
			.remove_text{
				color:rgb(111, 111, 111);
				font-family:Segoe UI;
				font-size:15pt;
				float:left;
			}
			.list_title{
				font-size:24px;
			}
			.image_load{
				width:16px;
				height:16px;				
			}
			.error_text{
				color: #991111;
				font-size: 15pt;
			}
			.notification_text{
				color: #115A8F;
				font-size: 15pt;
			}
			.install_date2{
				padding-top:10px;
				padding-bottom:10px;
				background-color:#FFFFFF;
			}
			.install_date1{
				padding-top:10px;
				padding-bottom:10px;
				background-color:#F8F8F8;
			}
			.remove_date2{
				padding-top:10px;
				padding-bottom:10px;
				background-color:#FFFFFF;
			}
			.remove_date1{
				padding-top:10px;
				padding-bottom:10px;
				background-color:#F8F8F8;
			}
			.result_div{
	
			}
		</style>
		<?php global $wedding_style_web_dor; ?>
		<div id="main_install_page">

			<table align="center" width="90%" style="margin-top: 0px;border-bottom: rgb(111, 111, 111) solid 2px;">
			    <tr>   
                      <td style="font-size:14px; font-weight:bold">
					     <a href="<?php echo esc_url($wedding_style_web_dor).'/wordpress-themes-guide-step-1.html'; ?>" target="_blank" style="outline-style: none !important;color:#126094; text-decoration:none;">User Manual</a><br />This section allows to add sample data.
                         <a href="<?php echo esc_url($wedding_style_web_dor).'/wordpress-theme-options/3-9.html'; ?>" target="_blank" style="outline-style: none !important;color:#126094; text-decoration:none;">More...</a>
					 </td>   
                      <td  align="right" style="font-size:16px;">
                           <a href="<?php echo esc_url($wedding_style_web_dor).'/wordpress-themes/wedding-style.html'; ?>" target="_blank" style="outline-style: none !important;text-decoration:none;">
                              <img src="<?php echo get_template_directory_uri() ?>/images/header.png" border="0" alt="" width="215">
                           </a>
                        </td>
                </tr>
				<tr>
					<td>
						<h3 style="margin: 0px;font-family:Segoe UI;padding-bottom: 15px;color: rgb(111, 111, 111); font-size:18pt;">Install Sample Data</h3>
					</td>
				</tr>
			</table>
			
			
			
	
			<div id="install_remove">
			    <p style="font-size:15px;font-weight:bold;color: #333;">To get an overall impression of the theme and to get acquainted with its main capabilities we suggest you to install sample data.</p>
				<input type="button" onclick="submit('install',1)" name="" id="doaction" class="button action" value="Install Sample Data">
				<input type="button" onclick="submit('remove',1)" name="" id="doaction" class="button action" value="Remove Sample Data">
			 </div>
			 <div id="installed_date_list">
				
			 </div>
			 <div style="clear:both"></div>
		 </div>
		<?php 	
		
		
		
	}
	public function install_ajax(){
		$action_number=$_GET['number_of_actoion'];
		switch($action_number){
			case 1:{
			
				$insert_page['spec_id']='1';
				$insert_page['title']='Our Story';
				$insert_page['content']="<div class='simple-div'><img alt=\"\" src=\"".  get_template_directory_uri()."/images/about_us.jpg\" style='float:left; margin: 0px 5px 5px 0px;width: 25%;'/><p style='text-align: left;'>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui.Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat.Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis.</p></div>";
				echo $this->install_page($insert_page);
				break;
			}	
			case 2:{		
			
				$insert_page['spec_id']='2';				
				$insert_page['title']='Trip';		
				$insert_page['content']='<div class="simple-div service"><img alt="" src="'.get_template_directory_uri().'/images/service.jpg" style="float:left;"/><ul>
   <li>Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, diam. Cras consequat.</li>
   <li>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat.</li>
   <li>Phasellus ultrices nulla quis nibh. Quisque a lectus. Nam nulla quam, gravida non, commodo a, sodales sit amet, nisi.</li>
   <li>Pellentesque fermentum dolor. Aliquam quam lectus, elementum vulputate, nunc.</li>
</ul><p style="text-align: left;">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p></div>';	
				echo $this->install_page($insert_page);
				break;
			}	
			case 3:{		

				$insert_page['spec_id']='3';				
				$insert_page['title']='Bridesmaids';				
				$insert_page['content']='<div class="simple-div Bridesmaids"><div class="Bridesmaids"><img src="'.get_template_directory_uri().'/images/Bridesmaids_1.png" ><p style="padding-top: 13px;">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. </p><div class="clear"></div></div><div class="Bridesmaids"><img src="'.get_template_directory_uri().'/images/Bridesmaids_2.png" ><p style="padding-top: 13px;">The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using "Content here, content here", making it look like readable English. </p><div class="clear"></div></div><div class="Bridesmaids"><img src="'.get_template_directory_uri().'/images/Bridesmaids_3.png"><p style="padding-top: 13px;">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p><div class="clear"></div></div></div>';				
				echo $this->install_page($insert_page);
				break;
			}	
			
			case 4:{		
				$category_params['spec_id']=$action_number;
				$category_params['param'] = array(
					  'cat_name'             => 'Gallery Posts', 
					  'category_description' => 'Category for Gallery Posts', 
					  'category_nicename'    => '', 
					  'category_parent'      => ''
					);
				echo $this->install_category($category_params);
				break;
			}	
			case 5:{		
				$category_params['spec_id']=$action_number;
				$category_params['param'] =array(
					  'cat_name'             => 'Top posts', 
					  'category_description' => 'Category for Top Posts', 
					  'category_nicename'    => '', 
					  'category_parent'      => ''
					);
				echo $this->install_category($category_params);
				break;
			}	
			case 6:{		
				$category_params['spec_id']=$action_number;
				$category_params['param'] =array(
					  'cat_name'             => 'Category Tab Posts', 
					  'category_description' => 'Category for Category Tab Posts', 
					  'category_nicename'    => '', 
					  'category_parent'      => ''
					);
				echo $this->install_category($category_params);
				break;
			}			
			
			case 7:{		
			
				$insert_post['spec_id']=$action_number;				
				$insert_post['title']='Vestibulum auctor dapibus neque';				
				$insert_post['content']="<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra.</p>";								
				$insert_post['category']=array(4,5);				
				echo $this->install_post($insert_post);
				break;
			}
			case 8:{		
			
				$insert_post['spec_id']=$action_number;				
				$insert_post['title']='HTML Ipsum Presents';				
				$insert_post['content']="<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra.</p>";				
				$insert_post['category']=array(4,5);				
				echo $this->install_post($insert_post);
				break;
			}
			
			case 9:{		
			
				$insert_post['spec_id']=$action_number;				
				$insert_post['title']='Lorem ipsum dolor sit amet';				
				$insert_post['content']=" <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra.</p>";				
				$insert_post['category']=array(4,5);				
				echo $this->install_post($insert_post);
				break;
			}
			case 10:{		
				$insert_post['spec_id']=$action_number;				
				$insert_post['title']='Vestibulum auctor dapibus neque';				
				$insert_post['content']="Vestibulum auctor dapibus neque available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. ";	
				$insert_post['category']=array(4,5);								
				echo $this->install_post($insert_post);
				break;
			}
			case 11:{		
				$insert_post['spec_id']=$action_number;				
				$insert_post['title']='Claritas est etiam processus dynamicus';				
				$insert_post['content']="Vestibulum auctor dapibus neque available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. ";		
				$insert_post['category']=array(4,5);				
				echo $this->install_post($insert_post);
				break;
			}
			case 12:{		
				$insert_post['spec_id']=$action_number;				
				$insert_post['title']='Phasellus ultrices nulla quis nibh';				
				$insert_post['content']="<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis.</p>";
				$insert_post['category']=array(4,5);				
				echo $this->install_post($insert_post);
				break;
			}
			case 13:{		
				$insert_post['spec_id']=$action_number;				
				$insert_post['title']='Morbi in sem quis dui';				
				$insert_post['content']="<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui.</p>";					
				$insert_post['category']=array(4,5);				
				echo $this->install_post($insert_post);
				break;
			}
			case 14:{		
				$insert_post['spec_id']=$action_number;				
				$insert_post['title']='Phasellus ultrices nulla quis nibh';				
				$insert_post['content']="<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>";			
				$insert_post['category']=array(4,5);				
				echo $this->install_post($insert_post);
				break;
			}
			case 15:{		
				$insert_post['spec_id']=$action_number;				
				$insert_post['title']='Lorem ipsum dolor sit amet';				
				$insert_post['content']="<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>";					
				$insert_post['category']=array(4,5);				
				echo $this->install_post($insert_post);
				break;
			}
			case 16:{		
				$insert_post['spec_id']=$action_number;				
				$insert_post['title']='HTML Ipsum Presents';				
				$insert_post['content']="<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>";					
				$insert_post['category']=array(4,5);				
				echo $this->install_post($insert_post);
				break;
			}
			case 17:{		
				$insert_post['spec_id']=$action_number;				
				$insert_post['title']='Vestibulum auctor dapibus neque';				
				$insert_post['content']="<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>";					
				$insert_post['category']=array(4,5);			
				echo $this->install_post($insert_post);
				break;
			}
			case 18:{		
				$insert_post['spec_id']=$action_number;				
				$insert_post['title']='Claritas est etiam processus dynamicus';				
				$insert_post['content']="<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>";					
				$insert_post['category']=array(4,5);			
				echo $this->install_post($insert_post);
				break;
			}
			case 19:{		
				$insert_post['spec_id']=$action_number;				
				$insert_post['title']='Bridesmaids';				
				$insert_post['content']="<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.</p><p><img src='".get_template_directory_uri()."/images/vert_tab1.jpg' style='margin-right: 20px;'><img src='".get_template_directory_uri()."/images/vert_tab2.jpg' style='margin-right: 20px;'><img src='".get_template_directory_uri( )."/images/vert_tab3.jpg' ></p><p> Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui.</p>";				
				$insert_post['category']=array(6);				
				echo $this->install_post($insert_post);
				break;
			}
			case 20:{		
				$insert_post['spec_id']=$action_number;				
				$insert_post['title']='Art';				
				$insert_post['content']="<p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna 
aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea 
commodo consequat.<br>Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi.</p>";				
				$insert_post['category']=array(6);				
				echo $this->install_post($insert_post);
				break;
			}
			case 21:{		
				$insert_post['spec_id']=$action_number;				
				$insert_post['title']='Bride';				
				$insert_post['content']="<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.<br>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est.</p>";				
				$insert_post['category']=array(6);				
				echo $this->install_post($insert_post);
				break;
			}
			case 22:{		
				$insert_post['spec_id']=$action_number;				
				$insert_post['title']='Fiance';				
				$insert_post['content']="<p>Vestibulum auctor dapibus neque available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. <br>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.</p>";				
				$insert_post['category']=array(6);				
				echo $this->install_post($insert_post);
				break;
			}
			case 23:{		
				$insert_post['spec_id']=$action_number;				
				$insert_post['title']='Lorem Impsum';				
				$insert_post['content']="<p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea 
commodo consequat.<br> If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text.</p>";				
				$insert_post['category']=array(6);				
				echo $this->install_post($insert_post);
				break;
			}
			case 24:
			case 25:
			case 26:
			case 27:			
			case 28:
			case 29:
			case 30:
			case 31:
			case 32:
			case 33:
			case 34:
			case 35:{		
				$params['spec_id']=$action_number;
				$params['image_name']='gallery_'.(int)($action_number%6+1).'.jpg';
				$params['post_id']=$action_number-17;	
				echo $this->conect_post_thumbnail($params);
				break;
			}			
			case 36:
			case 37:
			case 38:
			case 39:{	
				$params['spec_id']=$action_number;
				$params['image_name']='gallery_'.(int)($action_number%4+1).'.jpg';
				$params['post_id']=$action_number-16;	
				echo $this->conect_post_thumbnail($params);
				break;
			}
			
			case 40:{		
				//////// update some meta values
				$inserted_install_logo=get_theme_mod('wedding_style_install_posts','');
				global $wedding_style_general_settings_page;
				$wedding_style_general_settings_page->update_parametr('logo_img',get_template_directory_uri().'/images/logo.png');
				echo '1';
				break;
			}
			case 41:{
									
				$menu_pamas['spec_id']=$action_number;
				$menu_pamas['name']='Wedding Style';
				$menu_pamas['description']='Menu for Custom Pages';							
				echo $this->install_menu($menu_pamas);
				break;
			}
			case 42:{		
				$params['spec_id']=$action_number;
				$params['menu_title']='Home';
				$params['menu_id']='41';
				$params['menu_url']=get_home_url();		
				echo $this->install_menu_item($params);
				break;
			}
			case 43:{		
				$params['spec_id']=$action_number;
				$params['page_id']='1';
				$params['menu_id']='41';
				$params['menu_title']='Our Story';		
				echo $this->install_menu_item($params);
				break;
			}
			case 44:{		
				$params['spec_id']=$action_number;
				$params['page_id']='2';
				$params['menu_id']='41';
				$params['menu_title']='Trip';		
				echo $this->install_menu_item($params);
				break;
			}
			case 45:{		
				$params['spec_id']=$action_number;
				$params['page_id']='3';
				$params['menu_id']='41';
				$params['menu_title']='Bridesmaids';		
				echo $this->install_menu_item($params);
				break;
			}
			case 46:{
											
				/// insert slider params
				
				$image_link=get_template_directory_uri('template_url').'/images/slider_1.jpg'.';;;;'. get_template_directory_uri('template_url').'/images/slider_2.jpg'.';;;;'.get_template_directory_uri('template_url').'/images/slider_3.jpg';
				set_theme_mod('web_busines_image_link',$image_link);
				$image_textarea='<h2>Lorem ipsum dolor sit amet</h2><p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>;;;;<h2>Lorem ipsum</h2><p>Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>;;;;<h2>Lorem ipsum dolor sit ame</h2><p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae.</p>';
				set_theme_mod('web_busines_image_textarea',$image_textarea);
				echo 1;
				break;
				
				
			}
			case 47:{				
				echo $this->install_widgets();		
				break;		
			}
			
		}
		die();
		
	}
	
	public function remove_ajax(){
		$action_number=$_GET['number_of_actoion'];
		switch($action_number){
			case 1:
			case 2:
			case 3:{
				$params['spec_id']=$action_number;
				echo $this->remove_page_post($params);
				break;
			}
			case 4:
			case 5:
			case 6:{
				$params['spec_id']=$action_number;
				echo $this->remove_category($params);
				break;
			}	
			case 7:
			case 8:
			case 9:
			case 10:
			case 11:
			case 12:
			case 13:
			case 14:
			case 15:
			case 16:
			case 17:
			case 18:
			case 19:
			case 20:
			case 21:
			case 22:
			case 23: {
				$params['spec_id']=$action_number;
				echo $this->remove_page_post($params);
				break;
			}
			case 24:
			{		
				
				$params['spec_id']=41;
				$params['menu_item'][0]=42;
				$params['menu_item'][1]=43;
				$params['menu_item'][2]=44;
				$params['menu_item'][3]=45;
				echo $this->remove_menu($params);
				break;
			}
			case 25:{	
                $inserted_install=get_theme_mod('wedding_style_install_posts','');
				if(isset($inserted_install['5']))
					remove_theme_mod( 'top_cat' . $inserted_install['5']);
				echo $this->remove_widgets();	
				break;			
			}
		}
		die();
	}
	
	private function remove_page_post($params){
		$inserted_install=get_theme_mod('wedding_style_install_posts','');
		if(isset($inserted_install[$params['spec_id']])){
			$sucsses=wp_delete_post( $inserted_install[$params['spec_id']], true );
			if($sucsses){
				
				unset($inserted_install[$params['spec_id']]);
				set_theme_mod('wedding_style_install_posts',$inserted_install);
				return 1;	
			}
			else
			{
				if(get_post($inserted_install[$params['spec_id']]))
				{
					return '<div class="error_text">Error Remove</div>';
				}
				else{
				//	if(isset)
				//	wp_delete_attachment();
					unset($inserted_install[$params['spec_id']]);
					set_theme_mod('wedding_style_install_posts',$inserted_install);
					return '<div class="notification_text">Not Found</div>';					
				}
			}
		}
		else
		return '<div class="notification_text">Not Found</div>';
		
	}
	
	private function remove_category($params){
			$inserted_install=get_theme_mod('wedding_style_install_posts','');
		if(isset($inserted_install[$params['spec_id']])){
			$sucsses=wp_delete_category( $inserted_install[$params['spec_id']]);
			if($sucsses){
				unset($inserted_install[$params['spec_id']]);
				set_theme_mod('wedding_style_install_posts',$inserted_install);
				return 1;	
			}
			else
			{
				if(get_category($inserted_install[$params['spec_id']]))
				{
					return '<div class="error_text">Error Remove</div>';
				}
				else{
					unset($inserted_install[$params['spec_id']]);
					set_theme_mod('wedding_style_install_posts',$inserted_install);
					return '<div class="notification_text">Not Found</div>';					
				}
			}
		}
		else
		return '<div class="notification_text">Not Found</div>';
		
	}
	
	private function remove_menu($params){
	
		$inserted_install=get_theme_mod('wedding_style_install_posts','');
		if(isset($inserted_install[$params['spec_id']])){
			$sucsses=wp_delete_nav_menu( $inserted_install[$params['spec_id']]);
			if($sucsses){
				
				foreach($params['menu_item'] as $menu_item){
					if(isset( $inserted_install[$menu_item]))
						unset($inserted_install[$menu_item]);
				}
				
				unset($inserted_install[$params['spec_id']]);
				set_theme_mod('wedding_style_install_posts',$inserted_install);
				return 1;	
			}
			else
			{ 
				if(wp_get_nav_menu_items($inserted_install[$params['spec_id']]))
				{
					return '<div class="error_text">Error Remove</div>';
				}
				else{
					unset($inserted_install[$params['spec_id']]);
					foreach($params['menu_item'] as $menu_item){
						if(isset( $inserted_install[$menu_item]))
							unset($inserted_install[$menu_item]);
					}
					set_theme_mod('wedding_style_install_posts',$inserted_install);
					return '<div class="notification_text">Not Found</div>';					
				}
			}
		}
		else{
			return '<div class="notification_text">Not Found</div>';
		}
		
		
	}
	
	private function exsist_in_base($list,$spec_id){
		$exsist=0;
		if($list!='')
			{
				foreach($list as $key=>$value)
				{
					if($key==$spec_id)
						$exsist=1;
				}
			}
		if($exsist)
			{
				return true;
			}
			return false;
		
	}

 
	private function install_category($category_params){
		
		$inserted_install=get_theme_mod('wedding_style_install_posts','');
		$exsist=$this->exsist_in_base($inserted_install,$category_params['spec_id']);
		if($exsist){
			$catt=get_category((int)$inserted_install[$category_params['spec_id']]);
			if($catt)
				return '<div class="notification_text">Already exists.</div>';
		}
		$cat_id=wp_insert_category($category_params['param']);
		
		if($cat_id){	
			$inserted_install[$category_params['spec_id']]=$cat_id;
			set_theme_mod('wedding_style_install_posts',$inserted_install);
			return 1;
		}
		else	{
			$category_params['param']['cat_name']=$category_params['param']['cat_name'].date("H:i:s"); 
			$cat_id=wp_insert_category($category_params['param']);	
			if($cat_id){	
				$inserted_install[$category_params['spec_id']]=$cat_id;
				set_theme_mod('wedding_style_install_posts',$inserted_install);
				return 1;
			}	
			else
				return '<div class="error_text">Error inserting category.</div>';
		}
				
	}
	
	private function conect_post_thumbnail($params){
		
		
		$inserted_post_pages=get_theme_mod('wedding_style_install_posts','');
		$exsist=$this->exsist_in_base($inserted_post_pages,$params['spec_id']);
		if($exsist)
		{
			if(wp_get_attachment_image($inserted_post_pages[$params['spec_id']]))
			{
				if(get_post( $inserted_post_pages[$params['post_id']]))
				{
					if(get_post_thumbnail_id($inserted_post_pages[$params['post_id']]))
						return '<div class="notification_text">Already exists.</div>';
					else{
						set_post_thumbnail( $inserted_post_pages[$params['post_id']], $inserted_post_pages[$params['spec_id']] );
						return 1;
					}
						
				}
				else
				{
					return '<div class="notification_text">Post does not exist.</div>';
				}
			}
				
		}
			
		$upload_dir = wp_upload_dir();		
		$image_url=get_template_directory_uri().'/images/'.$params['image_name'];
		$image_data = wp_remote_get($image_url);
		$image_data=$image_data['body'];
		$filename = basename($image_url);
		
		if(wp_mkdir_p($upload_dir['path']))
			$file = $upload_dir['path'] . '/' . $filename;
		else
			$file = $upload_dir['basedir'] . '/' . $filename;
			
		if ( ! WP_Filesystem() ) {
			request_filesystem_credentials($url, '', true, false, null);
			return;
		}
		global $wp_filesystem;
		$wp_filesystem->put_contents($file, $image_data);
		$wp_filetype = wp_check_filetype($filename, null );
		$attachment = array(
		'post_mime_type' => $wp_filetype['type'],
		'post_title' => sanitize_file_name($filename),
		'post_content' => '',
		'post_status' => 'inherit'
		);
		
		$attach_id = wp_insert_attachment( $attachment, $file,$params['post_id']);
		$attach_data = wp_generate_attachment_metadata( $attach_id, $file);
		
		wp_update_attachment_metadata( $attach_id, $attach_data );	
		if(isset($inserted_post_pages[$params['post_id']]))  {
			
			set_post_thumbnail( $inserted_post_pages[$params['post_id']], $attach_id );
			$inserted_post_pages[$params['spec_id']]=$attach_id;
			set_theme_mod('web_buisnes_install_posts',$inserted_post_pages);
			
		}
		else
		{
			return '<div class="notification_text">postdoes not exist.</div>';
		}
	return 1;
	}
	
	
	
	private function install_menu($params){
		
		$inserted_install=get_theme_mod('wedding_style_install_posts','');
		$exsist=$this->exsist_in_base($inserted_install,$params['spec_id']);
		if($exsist){
			return '<div class="notification_text">Already exists.</div>';
		}
			
		$wedding_style_menu = array(
			  'cat_name'             => $params['name'], 
			  'category_description' => $params['description'], 
			  'category_nicename'    => '', 
			  'category_parent'      => '',
			  'taxonomy'             => 'nav_menu',
			  'count' 				 => '4'
			);
		
			// Create the menu for custom pages
			$wedding_style_menu_id = wp_insert_category($wedding_style_menu);
			if($wedding_style_menu_id)
			{
				$inserted_install[$params['spec_id']]=$wedding_style_menu_id;
				set_theme_mod('wedding_style_install_posts',$inserted_install);			
				$change_selected_dur_menu=get_option('theme_mods_wedding-style');
	    		$change_selected_dur_menu['nav_menu_locations']['primary-menu']=$wedding_style_menu_id;
				update_option('theme_mods_wedding-style',$change_selected_dur_menu);
				return 1;
				
			}
			else
			{
				return '<div class="error_text">error install. menu cannot be created</div>';
			}
		
		
	}
	
	private function install_menu_item($params){
		$inserted_install=get_theme_mod('wedding_style_install_posts','');
		if(isset($inserted_install[$params['menu_id']]))
			$menu_id=$inserted_install[$params['menu_id']];
		else
			return '<div class="error_text">Menu not found</div>';
			
		$parent=0;
		
		//element isset in base?
		$exsist=$this->exsist_in_base($inserted_install,$params['spec_id']);
		if($exsist){			
			return '<div class="notification_text">Already exists.</div>';
		}
		
		
		/// if element is children
		if(isset($params['parent_of'])){
		
		$parent=$inserted_install[$params['parent_of']];
		
		}
		$page_id=0;
		
		$menu_item_url='';
		if(isset($params['menu_url']))
			$menu_item_url=$params['menu_url'];
			
		if(isset($params['page_id']) && isset($inserted_install[$params['page_id']]))
			$page_id=$inserted_install[$params['page_id']];
			$type='page';
			$type='';
			$item_type='';
			if($page_id){
				
			
		$menu_item_id=wp_update_nav_menu_item($menu_id, 0, array('menu-item-title' => $params['menu_title'],
							   'menu-item-object' =>'page',
							   'menu-item-object-id' =>$page_id ,
							   'menu-item-type' => 'post_type',
							   'menu-item-parent-id' =>$parent,
							   'menu-item-status' => 'publish'));
		}
		if($menu_item_url)	{
			
		$menu_item_id=wp_update_nav_menu_item($menu_id, 0,array(
        'menu-item-title' =>  __('Home','WeddingStyle'),
        'menu-item-classes' => 'home',
        'menu-item-url' => home_url( '/' ), 
        'menu-item-status' => 'publish'));
		
		
		}
							   
		if($menu_item_id)	{   
		$inserted_install[$params['spec_id']]=$menu_item_id;
		set_theme_mod('wedding_style_install_posts',$inserted_install);
		return 1;
		}
		else
		{
			return '<div class="error_text">Error adding menu item </div>';
		}
							   
	}
		////////////////////// install page
		
		
		
		
		
		
		private function install_page($insert_page){
			
			global $wpdb;
			$inserted_post_pages=get_theme_mod('wedding_style_install_posts','');
			if($inserted_post_pages!='' && !is_array($inserted_post_pages)){
				$inserted_post_pages='';
				set_theme_mod('wedding_style_install_posts','');
			}
			$page_exsist=0; // if this page alredy instaled
			
			// chech if page in alredy indtalled
			if($inserted_post_pages!='')
			{
				foreach($inserted_post_pages as $key=>$inserted_post_page)
				{
					if($key==$insert_page['spec_id'])
						$page_exsist=1;
				}
			}
			
			// return if instaled
			if($page_exsist)
			{
				if(get_post( $inserted_post_pages[$insert_page['spec_id']])){
					return '<div class="notification_text">Already exists.</div>';
				}
			}
			$page_parent=0;
			// page 
			if(isset($insert_page['parent_of'])){
				if(!isset($inserted_post_pages[$insert_page['parent_of']])){
					return '<div class="error_text">Parent page does not exist.</div>';	
				}
				else
					$page_parent=$inserted_post_pages[$insert_page['parent_of']];
			}
			
			// set page
			$page=array(
				  'ID'             => NULL, //Are you updating an existing post?
				  'menu_order'     =>$page_parent, //If new post is a page, it sets the order in which it should appear in the tabs.
				  'comment_status' => 'open', // 'closed' means no comments.
				  'ping_status'    => 'open', // 'closed' means pingbacks or trackbacks turned off
				  'pinged'         => '', //?
				  'post_author'    => get_current_user_id( ),
				  'post_category'  => array('category-slug'),
				  'post_content'   => $insert_page['content'],
				  'post_date'      => date('Y-m-d H:i:s'),
				  'post_date_gmt'  => date('Y-m-d H:i:s'),
				  'post_excerpt'   => '',
				  'post_name'      => $insert_page['title'] ,
				  'post_parent'    => $page_parent,
				  'post_password'  => '',
				  'post_status'    => 'publish',
				  'post_title'     => $insert_page['title'],
				  'post_type'      => 'page', //You may want to insert a regular post, page, link, a menu item or some custom post type
				  'to_ping'        => '',			
				);
				
				
				// create page
				$page_id=wp_insert_post($page);
				
				// when page sucssesfuly instaled
				if(is_numeric($page_id)){
					$value_inserted=1;
					
					/// set page type meta parmaters
						if(isset($insert_page['meta'])){
							
							$value_inserted=$wpdb->insert($wpdb->prefix.'postmeta', array(
																						'post_id'	      => $page_id,
																						'meta_key'        => $insert_page['meta']['meta_key'],
																						'meta_value'      => $insert_page['meta']['meta_value'],        
																							),
																					array(
																						'%d',
																						'%s',
																						'%s',
																					));
												
												
						}
						
						// set  custom meta params in page
						if(isset($insert_page['custom_meta'])){
							
							foreach($insert_page['custom_meta'] as $key=>$value)
								$met[$key]=$value;
								
							add_post_meta($page_id,'_wedding_style_meta',$met,TRUE);	
							
						}
					
					///  set in base page alredy createt
					$inserted_post_pages[$insert_page['spec_id']]=$page_id;
					set_theme_mod('wedding_style_install_posts',$inserted_post_pages);
					
					if($value_inserted)
						return 1;
					else
						return '<div class="error_text">Error adding page metadata.</div>';	
				}
				else
				{
					return '<div class="error_text">Error creating page.</div>';
				}
	}
	
	
	
	
		private function install_post($insert_post){
			
			global $wpdb;
			$inserted_post_pages=get_theme_mod('wedding_style_install_posts','');			
			$category=array();
			
			
			if($this->exsist_in_base($inserted_post_pages,$insert_post['spec_id']))
			{
				if(get_post( $inserted_post_pages[$insert_post['spec_id']]))
					return '<div class="notification_text">Already exists.</div>';
			}
			
			if(isset($insert_post['category'])){
				    $i=0;
					foreach($insert_post['category'] as $arr_cat){
						if(isset($inserted_post_pages[$arr_cat])){
							$category[$i]=$inserted_post_pages[$arr_cat];
						}
						else
							$category=0;
						$i++;	
					}					
				
					if(!$category){
							return '<div class="error_text">Post category not found</div>';
					}
				
			}
			$post_parent=0;
			// page 
			if(isset($insert_post['parent_of'])){
				if(!isset($inserted_post_pages[$insert_post['parent_of']])){
					return '<div class="error_text">Post category not found.</div>';	
				}
				else
					$post_parent=$inserted_post_pages[$insert_post['parent_of']];
			}
			
			// set page
			$post=array(
				  'ID'             => NULL, //Are you updating an existing post?
				  'menu_order'     => $insert_post['spec_id'], //If new post is a page, it sets the order in which it should appear in the tabs.
				  'comment_status' => 'open', // 'closed' means no comments.
				  'ping_status'    => 'open', // 'closed' means pingbacks or trackbacks turned off
				  'pinged'         => '', //?
				  'post_author'    => get_current_user_id( ),
				  'post_category'  => $category,
				  'post_content'   => $insert_post['content'],
				  'post_date'      => date('Y-m-d H:i:s'),
				  'post_date_gmt'  => date('Y-m-d H:i:s'),
				  'post_excerpt'   => '',
				  'post_name'      => $insert_post['title'] ,
				  'post_parent'    => $post_parent,
				  'post_password'  => '',
				  'post_status'    => 'publish',
				  'post_title'     => $insert_post['title'],
				  'post_type'      => 'post', //You may want to insert a regular post, page, link, a menu item or some custom post type
				  'to_ping'        => '',			
				);
				
				
				// create page
				$post_id=wp_insert_post($post);
				
				// when page sucssesfuly instaled
				if(is_numeric($post_id)){
					$value_inserted=1;
					
					/// set page type meta parmaters
						if(isset($insert_page['meta'])){
							
							$value_inserted=$wpdb->insert($wpdb->prefix.'postmeta', array(
								'post_id'	      => $post_id,
								'meta_key'        => $insert_post['meta']['meta_key'],
								'meta_value'      => $insert_post['meta']['meta_value'],        
									),
								array(
									'%d',
									'%s',
									'%s',
							));
												
												
						}
						
						// set  custom meta params in page
						if(isset($insert_post['custom_meta'])){
							
							foreach($insert_post['custom_meta'] as $key=>$value)
								$met[$key]=$value;
								
							add_post_meta($page_id,'_wedding_style_meta',$met,TRUE);	
							
						}
					
					///  set in base page alredy createt
					$inserted_post_pages[$insert_post['spec_id']]=$post_id;
					set_theme_mod('wedding_style_install_posts',$inserted_post_pages);
					
					if($value_inserted)
						return 1;
					else
						return '<div class="error_text"Error adding post metadata.</div>';	
				}
				else
				{
					return '<div class="error_text">Error creating post.</div>';
				}
	}
	
	
	
	
	
public function install_widgets(){
		$widget_web_buis_adsens=get_option('widget_wedding_style_web_buis_adsens');		
		$widget_wedding_categ=get_option('widget_wedding_style_exclusive_categ');
		$widget_wedding_test=get_option('widget_wedding_style_exclusive_testimonials');
		$widget_text=get_option('widget_text');
		
		if(isset($widget_wedding_categ[1700]))
			return '<div class="notification_text">Already exists.</div>';
		$widget_web_buis_adsens[1700]['adsenseCode']='<h3 style="padding-top: 70px;padding-bottom: 70px;text-align: center;background-color: #EBEBEB;color: #C7C7C7;">Advertisement</h3>';	
		
		if(isset($widget_wedding_categ[1701]))
			return '<div class="notification_text">Already exists.</div>';
		$widget_web_buis_adsens[1701]['adsenseCode']='<h3 style="padding-top: 70px;padding-bottom: 70px;text-align: center;background-color: #EBEBEB;color: #C7C7C7;">Advertisement</h3>';	
		
		if(isset($widget_wedding_categ[1702]))
			return '<div class="notification_text">Already exists.</div>';
		$widget_web_buis_adsens[1702]['adsenseCode']='<h3 style="padding-top: 70px;padding-bottom: 70px;text-align: center;background-color: #EBEBEB;color: #C7C7C7;">Advertisement</h3>';		
		
		if(isset($widget_wedding_categ[1703]))
			return '<div class="notification_text">Already exists.</div>';
		$term1 = get_term_by('name', 'Category Tab Posts', 'category');
		$categ_id_by_name1 = $term1->term_id;			
		$widget_wedding_test[1703]['title']='Testimonials';
		$widget_wedding_test[1703]['testimonials_id']= $categ_id_by_name1;
		$widget_wedding_test[1703]['border_radius']='90';
		$widget_wedding_test[1703]['post_count']='2';	
			
		if(isset($widget_wedding_categ[1704]))
			return '<div class="notification_text">Already exists.</div>';	
		$widget_text[1704]['title']='Contact';		
		$widget_text[1704]['text']='
					<div class="contact-content">
						<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words.There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form by injected humour,There are many variations of passages.</p>
						<p>Tell:</p>
						<span class="number">
							<p>0054 <strong>542 258 963</strong><p>
							<p>0054 <strong>542 258 963</strong><p>
						</span>
					</div>';					
		if(isset($widget_wedding_categ[1705]))
			return '<div class="notification_text">Already exists.</div>';
		$term2 = get_term_by('name', 'Gallery Posts', 'category');
		$categ_id_by_name2 = $term2->term_id;
		$widget_wedding_categ[1705]['title']='Latest news';
		$widget_wedding_categ[1705]['categ_id']= $categ_id_by_name2;
		$widget_wedding_categ[1705]['post_count']='2';	
		if(isset($widget_wedding_categ[1706]))
			return '<div class="notification_text">Already exists.</div>';
		$term3 = get_term_by('name', 'Category Tab Posts', 'category');
		$categ_id_by_name3 = $term3->term_id;
		$widget_wedding_test[1706]['title']='';
		$widget_wedding_test[1706]['testimonials_id']= $categ_id_by_name3;
		$widget_wedding_test[1706]['border_radius']='0';
		$widget_wedding_test[1706]['post_count']='4';	
		
		
		$sidbar_text_add=wp_get_sidebars_widgets();			
		$sidbar_text_add['second-footer-widget-area'][1700]='wedding_style_web_buis_adsens-1000';
		$sidbar_text_add['second-footer-widget-area'][1701]='wedding_style_web_buis_adsens-1701';
		$sidbar_text_add['second-footer-widget-area'][1702]='wedding_style_web_buis_adsens-1702';
		$sidbar_text_add['sidebar-1'][1705]='wedding_style_exclusive_categ-1705';
		$sidbar_text_add['sidebar-1'][1703]='wedding_style_exclusive_testimonials-1703';
		$sidbar_text_add['sidebar-1'][1704]='text-1704';		
		$sidbar_text_add['primary_widget_area'][1706]='wedding_style_exclusive_testimonials-1706';
		
		
		update_option('widget_wedding_style_web_buis_adsens',$widget_web_buis_adsens);
		update_option('widget_wedding_style_exclusive_categ',$widget_wedding_categ);	
		update_option('widget_wedding_style_exclusive_testimonials',$widget_wedding_test);
		update_option('widget_text',$widget_text);		
		
		update_option( 'sidebars_widgets', $sidbar_text_add);
		return 1;
	}
	
	
	public function remove_widgets(){
		///// remove widgets
		$widget_web_buis_adsens=get_option('widget_wedding_style_web_buis_adsens');	
		$widget_wedding_categ=get_option('widget_wedding_style_exclusive_categ');
		$widget_wedding_test=get_option('widget_wedding_style_exclusive_testimonials');
		$widget_text=get_option('widget_text');
		
		update_option('widget_wedding_style_web_buis_adsens',$widget_web_buis_adsens);
		update_option('widget_wedding_style_exclusive_categ',$widget_wedding_categ);	
		update_option('widget_wedding_style_exclusive_testimonials',$widget_wedding_test);
		update_option('widget_text',$widget_text);	
		
		if(!isset($widget_web_buis_adsens[1700]) || !isset($widget_web_buis_adsens[1701]) || !isset($widget_web_buis_adsens[1702])   || !isset($widget_wedding_test[1703]) || !isset($widget_text[1704]) || !isset($widget_wedding_categ[1705]) || !isset($widget_wedding_test[1706]))
			return '<div class="notification_text">Not Found</div>';
			
		$sidbar_text_add=wp_get_sidebars_widgets();	
		unset($sidbar_text_add['second-footer-widget-area'][1700]);
		unset($sidbar_text_add['second-footer-widget-area'][1701]);
		unset($sidbar_text_add['second-footer-widget-area'][1702]);		
		unset($sidbar_text_add['sidebar-1'][1703]);
		unset($sidbar_text_add['sidebar-1'][1704]);
		unset($sidbar_text_add['sidebar-1'][1705]);
		unset($sidbar_text_add['primary_widget_area'][1706]);
		update_option( 'sidebars_widgets', $sidbar_text_add );
		return 1;		
}

}
 ?>