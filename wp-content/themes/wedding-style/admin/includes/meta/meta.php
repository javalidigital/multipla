	<script>
	jQuery(document).ready(function(){
		var value = jQuery("input:radio[name='web_dorado_meta_date[layout]']:checked").val();
   		if (value < 4) 
   		{
   			jQuery(".class_for_js").hide();
   		}
   		else
   		{
   			jQuery(".class_for_js").show();
   		}
		if (value == 1)
		{
		    jQuery("#main_column").hide();
		}
		else
		{
		    jQuery("#main_column").show();
		}
		jQuery("input:radio[name='web_dorado_meta_date[layout]']").click(function() {
   		var value = jQuery(this).val();
   		if (value < 4) 
   		{
   			jQuery(".class_for_js").hide();
   		}
   		else
   		{
   			jQuery(".class_for_js").show();
   		}
		if (value == 1)
		{
		    jQuery("#main_column").hide();
		}
		else
		{
		    jQuery("#main_column").show();
		}
		});
	});
	</script>
	<?php  global $wedding_style_admin_helepr_functions; ?>
	<div class="t_about t_product t_service t_news t_sitemap t_blog t_full t_gallery t_search t_login t_contact t_portfolio post_edit_page t_default t_mpopular">
		<table width="100%" style="margin:40px;">
 		<tr>
 		<td>
            <div style="width:50px; height:47px; background:url(<?php echo get_template_directory_uri('template_url'); ?>/images/sprite-layouts.png) no-repeat 0 0;">
		</div>
            <input type="radio" name="web_dorado_meta_date[layout]" value="1" <?php checked($meta['layout'], "1"); ?>/>
            <br>
        </td>
        <td>
            <div style="width:50px; height:47px; background:url(<?php  echo get_template_directory_uri('template_url'); ?>/images/sprite-layouts.png) no-repeat 0 -48px;">
		</div>
            <input type="radio" name="web_dorado_meta_date[layout]" value="2" <?php checked($meta['layout']=="2" || $meta['layout']==""); ?>/><br>
        </td>
        <td>
            <div style="width:50px; height:46px; background:url(<?php  echo get_template_directory_uri('template_url'); ?>/images/sprite-layouts.png) no-repeat 0 -98px;">
		</div>
            <input type="radio" name="web_dorado_meta_date[layout]" value="3" <?php checked($meta['layout'], "3"); ?>/><br>
        </td>
        <td>
            <div style="width:50px; height:47px; background:url(<?php  echo get_template_directory_uri('template_url'); ?>/images/sprite-layouts.png) no-repeat 0 -145px;">
		</div>
            <input type="radio" name="web_dorado_meta_date[layout]" value="4" <?php checked($meta['layout'], "4"); ?>/><br>
        </td>
        <td>
            <div style="width:50px; height:46px; background:url(<?php  echo get_template_directory_uri('template_url'); ?>/images/sprite-layouts.png) no-repeat 0 -196px;">
		</div>
            <input type="radio" name="web_dorado_meta_date[layout]" value="5" <?php checked($meta['layout'], "5"); ?>/><br>
        </td>
        <td>
            <div style="width:50px; height:47px; background:url(<?php  echo get_template_directory_uri('template_url'); ?>/images/sprite-layouts.png) no-repeat 0 -245px;">
		</div>
            <input type="radio" name="web_dorado_meta_date[layout]" value="6" <?php checked($meta['layout'], "6"); ?>/><br>
                
		</td>
		</tr>
		</table>
		<div style="margin: 13px 0 11px 4px;" class="t_gallery t_portfolio post_edit_page">
			<input type="text" name="web_dorado_meta_date[content_width]" value="<?php if(!empty($meta['content_width'])) echo esc_attr($meta['content_width']); else echo "1024"; ?>" size="2" />
			<label style="font-family: Segoe UI;color: rgb(111, 111, 111); ">Px &nbsp;&nbsp;&nbsp;:Content Area Width</label>
		</div>
		<div style="margin: 13px 0 11px 4px;" class="t_gallery t_portfolio post_edit_page" id="main_column">
			<input type="text" name="web_dorado_meta_date[main_col_width]" value="<?php if(!empty($meta['main_col_width'])) echo esc_attr($meta['main_col_width']); else echo "66"; ?>" size="2" />
			<label style="font-family: Segoe UI;color: rgb(111, 111, 111); ">% &nbsp;&nbsp;&nbsp;&nbsp;:Main Column Width</label>
		</div>
		<div style="margin: 13px 0 11px 4px;" class="t_gallery t_portfolio class_for_js post_edit_page">
			<input type="text" name="web_dorado_meta_date[pr_widget_area_width]" value="<?php if(!empty($meta['pr_widget_area_width'])) echo esc_attr($meta['pr_widget_area_width']); else echo "17"; ?>" size="2" />
			<label style="font-family: Segoe UI;color: rgb(111, 111, 111); ">% &nbsp;&nbsp;&nbsp;&nbsp;:Primary Widget Area Width</label>
		</div>
	</div>
		<div style="margin: 13px 0 11px 4px;" class="t_about t_product t_news t_sitemap t_blog t_gallery t_search t_login t_contact t_portfolio post_edit_page t_default t_service t_mpopular">
			<label>
			<input type="hidden" name="web_dorado_meta_date[fullwidthpage]" value=" " />
			<input type="checkbox" name="web_dorado_meta_date[fullwidthpage]" <?php checked($meta['fullwidthpage'], "on" , true); ?> />
			Full Width Page</label><br/>
		</div>
		
		<div style="margin: 13px 0 11px 4px;" class="t_contact">
			<label style="font-family: Segoe UI;color: rgb(111, 111, 111); ">Email To:</label>
			<input type="text" name="web_dorado_meta_date[email_to]" value="<?php if(!empty($meta['email_to'])) echo esc_attr($meta['email_to']); ?>"/>
		</div>
		
		<div style="margin: 13px 0 11px 4px;" class="t_blog t_mpopular">
			<label>
			<input type="checkbox" name="web_dorado_meta_date[blogstyle]" <?php checked($meta['blogstyle'], "on"); ?> />
			Blog Style mode</label><br/>
		</div>
		
		<div style="margin: 13px 0 11px 4px;" class="t_news t_blog t_service t_mpopular">
			<label>
			<input type="checkbox" name="web_dorado_meta_date[showthumb]" <?php checked($meta['showthumb'], "on"); ?> />
			Hide Auto Thumbnail</label><br/>
		</div>
		
		<div style="margin: 13px 0 11px 4px;" class="t_portfolio">
			<label>
			<input type="checkbox" name="web_dorado_meta_date[showtitle]" <?php checked($meta['showtitle'], "on"); ?> />
			Show Titles</label><br/>
		</div>
		
		<div style="margin: 13px 0 11px 4px;" class="t_portfolio">
			<label>
			<input type="checkbox" name="web_dorado_meta_date[showdesc]" <?php checked($meta['showdesc'], "on"); ?> />
			Show Descriptions</label><br/>
		</div>
		
		
		<div style="margin: 13px 0 11px 4px;" class="t_portfolio">
			<p style=" padding-bottom: 7px;">Thumbnail Size:</p>
			<label title="Small"><input type="radio" name="web_dorado_meta_date[thumbsize]" value="1" <?php checked($meta['thumbsize'], "1"); ?>/><span>Small</span></label><br><br>
			<label title="Medium"><input type="radio" name="web_dorado_meta_date[thumbsize]" value="2" <?php checked($meta['thumbsize']=="2" || $meta['thumbsize']==""); ?>/><span>Medium</span></label><br><br>
			<label title="Large"><input type="radio" name="web_dorado_meta_date[thumbsize]" value="3" <?php checked($meta['thumbsize'], "3"); ?>/><span>Large</span></label>
		</div>
		
		<div style="margin: 13px 0 11px 4px;" class="t_about t_news t_blog t_service t_mpopular">
			<label style="font-family: Segoe UI;color: rgb(111, 111, 111); ">Number of posts per page:</label>
			<input type="text" name="web_dorado_meta_date[blog_perpage]" value="<?php if(!empty($meta['blog_perpage']) || $meta['blog_perpage']=="0") echo esc_attr($meta['blog_perpage']); else echo "9"; ?>" size="2" />
		</div>
		
		<div style="margin: 13px 0 11px 4px;" class="t_product t_gallery t_portfolio">
			<label style="font-family: Segoe UI;color: rgb(111, 111, 111); ">Number of posts per page:</label>
			<input type="text" name="web_dorado_meta_date[gallery_perpage]" value="<?php if(!empty($meta['gallery_perpage']) || $meta['blog_perpage']=="0") echo esc_attr($meta['gallery_perpage']); else echo "9"; ?>" size="2" />
		</div>

		<div style="margin: 13px 0 11px 4px;" class=" t_product t_news t_blog t_portfolio t_gallery t_service t_mpopular">
			 <?php 
			 if(isset($meta['categories']))
			   $meta_cat=$meta['categories'];
			 else  
			   $meta_cat=0;
			 $wedding_style_admin_helepr_functions->only_category_checkboxses(array(
			
				"name" => "",
				
				"description" => "Select blog categories:",
				
				"var_name" => "web_dorado_meta_date[categories]",

				"id" =>	"web_dorado_meta_date[categories]",

				"std" => $meta_cat ,
			
			)) ?>
		</div>
        



		<div style="margin: 13px 0 11px 4px; font-weight: bold;" class="t_sitemap">
			<br/><label>Page Content:</label><br/>
		</div>
		<div style="margin: 13px 0 11px 4px;" class="t_sitemap">
			<input style="margin-right: 10px;" type="checkbox" name="web_dorado_meta_date[static_pages_on]" <?php checked($meta['static_pages_on'], "on"); ?> />
			<label style="font-family: Segoe UI;color: rgb(111, 111, 111); margin-right: 9px;">Static Pages:</label>
			<input type="text" name="web_dorado_meta_date[static_pages_name]" value="<?php if(!empty($meta['static_pages_name'])) echo esc_attr($meta['static_pages_name']); else echo "Static Pages:"; ?>" size="12" />
		</div>
		<div style="margin: 13px 0 11px 4px;" class="t_sitemap">
			<input style="margin-right: 10px;" type="checkbox" name="web_dorado_meta_date[all_categories_on]" <?php checked($meta['all_categories_on'], "on"); ?> />
			<label style="font-family: Segoe UI;color: rgb(111, 111, 111);">All Categories:</label>
			<input type="text" name="web_dorado_meta_date[all_categories_name]" value="<?php if(!empty($meta['all_categories_name'])) echo esc_attr($meta['all_categories_name']); else echo "All Categories:"; ?>" size="12" />
		</div>
		<div style="margin: 13px 0 11px 4px;" class="t_sitemap">
			<input style="margin-right: 10px;" type="checkbox" name="web_dorado_meta_date[tags_on]" <?php checked($meta['tags_on'], "on"); ?> />
			<label style="font-family: Segoe UI;color: rgb(111, 111, 111); margin-right: 48px;">Tags:</label>
			<input type="text" name="web_dorado_meta_date[tags_name]" value="<?php if(!empty($meta['tags_name'])) echo esc_attr($meta['tags_name']); else echo "Tags:"; ?>" size="12" />
		</div>
		<div style="margin: 13px 0 11px 4px;" class="t_sitemap">
			<input style="margin-right: 10px;" type="checkbox" name="web_dorado_meta_date[archives_on]" <?php checked($meta['archives_on'], "on"); ?> />
			<label style="font-family: Segoe UI;color: rgb(111, 111, 111); margin-right: 29px;">Archives:</label>
			<input type="text" name="web_dorado_meta_date[archives_name]" value="<?php if(!empty($meta['archives_name'])) echo esc_attr($meta['archives_name']); else echo "Archives:"; ?>" size="12" />
		</div>
		<div style="margin: 13px 0 11px 4px;" class="t_sitemap">
			<input style="margin-right: 10px;" type="checkbox" name="web_dorado_meta_date[authors_on]" <?php checked($meta['authors_on'], "on"); ?> />
			<label style="font-family: Segoe UI;color: rgb(111, 111, 111); margin-right: 31px;">Authors:</label>
			<input type="text" name="web_dorado_meta_date[authors_name]" value="<?php if(!empty($meta['authors_name'])) echo esc_attr($meta['authors_name']); else echo "Authors:"; ?>" size="12" />
		</div>
		<div style="margin: 13px 0 11px 4px;" class="t_sitemap">
			<input style="margin-right: 10px;" type="checkbox" name="web_dorado_meta_date[blog_posts_on]" <?php if(isset($meta['blog_posts_on'])) checked($meta['blog_posts_on'], "on"); ?> />
			<label style="font-family: Segoe UI;color: rgb(111, 111, 111); margin-right: 17px;">Blog Posts:</label>
			<input type="text" name="web_dorado_meta_date[blog_posts_name]" value="<?php if(!empty($meta['blog_posts_name'])) echo esc_attr($meta['blog_posts_name']); else echo "Blog Posts:"; ?>" size="12" />
		</div>
		<div class="t_mpopular t_news">
			<input type="hidden" name="web_dorado_meta_date[mpopular]" value="1"/>
		
			<?php
           	if(isset($meta['hide_category_tabs_mst_pop']))
			   $hide_category_tabs_mst_pop=$meta['hide_category_tabs_mst_pop'];
			 else  
			   $hide_category_tabs_mst_pop=0;	
			$parametrs['dont_show_recent']=1;
			$wedding_style_admin_helepr_functions->category_select_with_checkboxse(
			array(
			
				"name" => "Display Categories with Post Lists",
			
				"description" => "Displays a list of posts from the specified categories.",
				
				"var_name" => "web_dorado_meta_date[hide_category_tabs_mst_pop]",

				"id" => "web_dorado_meta_date[hide_category_tabs_mst_pop]",

				"std" => $hide_category_tabs_mst_pop
			
			),			
			array(
			
				"name" => "Category Tabs",
							
				"description" => "@ntri kategorian kam el \"Random\",\"most populiar\",\"Recent\" ic front endum cuyc talu hamar. Sexmeq  koxqi Remov@ dzer nshac@ jnjelu hamar",
				
				"var_name" => "web_dorado_meta_date[category_tabs_mst_pop]",

				"id" => "web_dorado_meta_date[category_tabs_mst_pop]",

				"std" => $meta['category_tabs_mst_pop']
			
			),$parametrs
			
			
			
			);  ?>					  
		</div>
