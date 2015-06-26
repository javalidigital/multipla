<?php	
//////////////**CONTENT POSTS FRONT PAGE**/////////////////
function wedding_style_content_posts_for_home() {
	global $wedding_style_general_settings_page,$wedding_style_home_page,$wp_query,$paged;
	// initial home settings variables
	foreach ($wedding_style_home_page->options_homepage as $value) {
		if(isset($value['id'])){
			$$value['var_name'] = $value['std']; 
		}
	}
	// initial general settings variables
	foreach ($wedding_style_general_settings_page->options_generalsettings as $value) {
		if (isset($value['id'])){
			$$value['var_name'] = $value['std']; 
		} 
	}	
	if($blog_style){
		$home_class="blog-style";
	}
	else{
		$home_class="";
	} 	
	?>
	<div id="blog" class="blog" >
		<style>
			#sidebar1, #sidebar2{
				margin-top:10px !important;
			}
		</style>
		<?php
		if(have_posts()) { 
			while (have_posts()) {
				the_post();
				?>
				<div class="blog-post blog_posts home-post <?php echo $home_class; ?>">				 
					<a class="title_href" href="<?php echo get_permalink() ?>">
						<h2><?php the_title(); ?></h2>
					</a>
					<?php
					if($date_enable){ ?>
						<div class="home-post-date">
							<?php echo wedding_style_posted_on_blog();?>
						</div>
					<?php } 
					if($grab_image){
						echo wedding_style_display_thumbnail(150,150); 
					}
					else{
						echo wedding_style_thumbnail(150,150);
					}
					if($blog_style){
						the_excerpt();
					}
					else{
						the_content(__('More','wd_exclusive'));
					}   ?>
					<a href="<?php the_permalink(); ?>"  class="read_more read_blog"><?php echo __('More', 'WeddingStyle'); ?></a>	
					<div class="clear"></div>	
				</div>
				<?php 
			}
			if( $wp_query->max_num_pages > 2 ){ ?>
				<div class="page-navigation">
					<div class="alignleft"><?php previous_posts_link( '&laquo; Previous Page' ); ?></div>
					<div class="alignright"><?php next_posts_link( 'Next Page &raquo;', '' ); ?></div>
				</div>   
			<?php 
			}
		}?>			
	</div>
	<div class="clear"></div>
<?php 
}	

function wedding_style_home_video_post(){
	global $wedding_style_home_page,$post;
	global $wedding_style_general_settings_page;
	// initial home settings variables
	foreach ($wedding_style_home_page->options_homepage as $value) {
		if(isset($value['id'])){
			$$value['var_name'] = $value['std']; 
		}
	}
	foreach ($wedding_style_general_settings_page->options_generalsettings as $value) {
		if(isset($value['id'])){
			$$value['var_name'] = $value['std']; 
		}
	}	
	$magazin_home_video_post=get_post($home_content_post); 
	if($magazin_home_video_post){
		$save_post = $post; 
		$post = $magazin_home_video_post; 
		setup_postdata( $post ); 
		if (isset($home_content_post) && $hide_content_post == 'on' && $magazin_home_video_post){ ?>
			<div id="videos-block" class="content-inner-block" style="background-image: url(<?php echo esc_url($content_post_img); ?>);">
				<div class="container">
					<h1 class="content_cat" style="font-size: 60px;padding: 30px 0px;"><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a></h1>
					<div class="full-width"><?php 
						if($blog_style=="on") {
							the_excerpt();
						}
						else {
							echo the_content();
						}
						wp_reset_postdata();
						$post = $save_post; 
						?>
						<div class="clear"></div>
					</div>
				</div>
			</div>
			<?php 
		} 
	}
}
 
 
function wedding_style_content_posts() {
	global $wedding_style_general_settings_page,$wedding_style_integration_page,$wedding_style_home_page,$wp_query,$post;
	foreach ($wedding_style_integration_page->options_integration as $value) {
		if(isset($value['var_name'])){
			$$value['var_name'] = $value['std']; 
		}
	}
	// initial home settings variables
	foreach ($wedding_style_home_page->options_homepage as $value) {
		if(isset($value['id'])){
			$$value['var_name'] = $value['std']; 
		}
	}
	// initial general settings variables
	foreach ($wedding_style_general_settings_page->options_generalsettings as $value) {
		if(isset($value['id'])){
			$$value['var_name'] = $value['std']; 
		}
	}
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$cat_checked=0;
	$n_of_home_post=get_option( 'posts_per_page', 6 ); 
	if($content_post_categories)
		$cat_checked=1;
	if($n_of_home_post!=0){ ?>
	<div id="blog" class="content-inner-block">
	<?php
	$home_wp_query = new WP_Query('showposts='.($n_of_home_post).'&cat='.wedding_style_remove_last_comma($content_post_categories).'&paged='.$paged.'&order=ASC');
	if ($hide_content_posts == 'on') { ?>
		<div class="blog-post">
			<h3 class="content_cat" style="text-transform: uppercase;"><?php echo $content_post_cat_name; ?></h3>
			<div class="freshdesignweb">     
				<div class="image_grid portfolio_4col">
					<ul id="list" class="portfolio_list da-thumbs">
						<?php 
						if(have_posts()) { 
							while ($home_wp_query->have_posts()) {
								$home_wp_query->the_post();
								$tumb_id=get_post_thumbnail_id( $post->ID );												
								$thumb_url=wp_get_attachment_image_src($tumb_id,'full');														
								$thumb_url=$thumb_url[0];
								?>
								<li>
									<?php
									if($grab_image)
										echo wedding_style_display_thumbnail('200','150'); 
									elseif(!$grab_image && !has_post_thumbnail())
										echo '<img src="'.get_template_directory_uri('template_url').'/images/top_post.jpg" style="width: auto;height: auto;"/>';
									else 
										echo wedding_style_thumbnail('600','900'); ?>
									<article class="da-animate da-slideFromRight" style="display: block;">
										<h4><?php the_title(); ?></h4>
										<div style="width:60%; margin:0 auto;">	
											<span class="link_post"><a href="<?php echo get_permalink() ?>"></a></span>
											<span class="zoom"><a href="<?php echo $thumb_url; ?>?TB_iframe=1&tbWidth=800&tbHeight=600" class="thickbox"></a></span>
										</div>	
									</article> 
								</li>
							<?php 
							} 
						}?>
					</ul>
				</div>
				<!-- Portfolio 4 Column End -->
			</div>
			<div class="clear"></div>
			<div class="page-navigation">
				<div class="alignleft"><?php previous_posts_link( '&laquo; Previous Page' ); ?></div>
				<div class="alignright"><?php next_posts_link( 'Next Page &raquo;', '' ); ?></div>
			</div>
		</div>
		<div class="clear"></div>
		<?php } 
	}
	wp_reset_query();
}


function wedding_style_entry_cont(){
	//for update general_settings
	global $wedding_style_general_settings_page;
	foreach ($wedding_style_general_settings_page->options_generalsettings as $value) {
		if (isset( $value['var_name'] )){ 
			$$value['var_name'] = $value['std'];
		}
	} ?>
	<div class="blog-post blog_posts">
		<?php 
		if($grab_image) {
			echo wedding_style_display_thumbnail(240,182); 
		}
		else {
			echo wedding_style_thumbnail(240,182);
		}
		?>

		<h3 class="page_title">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h3>
		<?php	
		if(isset($blog_style) && $blog_style=="on") { ?>													   
		<p style="padding-bottom: 10px;"><?php wedding_style_the_excerpt_max_charlength(200); ?></p>
		<a href="<?php the_permalink(); ?>"  class="read_more">More</a><?php
		}
		else { 
			the_content(); 
		}
		if($date_enable){
			wedding_style_entry_meta();
		} ?>
		<div class="clear"></div>		   
	</div>
	<?php

	}

function wedding_style_entry_cont_for_search(){
	//for update general_settings
	global $wedding_style_general_settings_page;
	foreach ($wedding_style_general_settings_page->options_generalsettings as $value) {
		if (get_theme_mod( $value['var_name'] ) === FALSE){ 
			$$value['var_name'] = $value['std'];
		}
		else{ 
			$$value['var_name'] = get_theme_mod( $value['id'] );
		}
	}  ?>
	<div class="entry">
		<?php 
		if($blog_style){
			the_excerpt();
		}
		else{
			the_content(__('More','WeddingStyle'));
		}  ?>
	</div>
	<?php if($date_enable){          
		wedding_style_entry_meta(); 			
	}   
}

function wedding_style_footer_text(){
	global  $wedding_style_general_settings_page;
	foreach ( $wedding_style_general_settings_page->options_generalsettings as $value ) {
		if(isset($value['id'])){
			if ( get_theme_mod( $value['id'] ) === FALSE ) {
				$$value['var_name'] = $value['std']; 
			} 
			else {
				$$value['var_name'] = get_theme_mod( $value['id'] ); 
			}
		}
	}
	if($footer_text != "")	{?>
		<div id="footer-bottom">
			<div id="ex_social">
				<?php wedding_style_ftricons(); ?>
			</div>
			<?php echo stripslashes($footer_text); ?>		
		</div>
	<?php }
}



function wedding_style_custom_css(){
	global 	$wedding_style_general_settings_page;
	foreach ( $wedding_style_general_settings_page->options_generalsettings as $value ) {
		if(isset($value['id'])){
			if ( get_theme_mod( $value['id'] ) === FALSE ) {
				$$value['var_name'] = $value['std']; 
			} 
			else {
				$$value['var_name'] = get_theme_mod( $value['id'] ); 
			}
		}
	}
	echo "<style>".$custom_css."</style>";
}



function wedding_style_logo_img(){
	global $wedding_style_general_settings_page,$wedding_style_integration_page;
	foreach ( $wedding_style_general_settings_page->options_generalsettings as $value ){
		if(isset($value['id'])){
			if ( get_theme_mod( $value['id'] ) === FALSE ){
				$$value['var_name'] = $value['std']; 
			} 
			else {
				$$value['var_name'] = get_theme_mod( $value['id'] ); 
			}
		}
	} ?>
	<div id="header-middle">
		<a class="hedar-a-element" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<div id="logo_element">
				<?php 
				if(trim($logo_img) && $logo_img!=''){ ?> 
					<h1 id="site-title">
						<span>
							<a id="logo" style="color: #c7c6c6;" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
								<?php   echo "<img id=\"site-title\" src=\"".esc_url($logo_img)."\" alt=\"logo\">";   ?>
							</a>
						</span>
					</h1>
				<?php	
				} 
				else { ?> 
					<h1 id="site-title">
						<span>
							<a class="site-title-a" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
								<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>
							</a>
						</span>
					</h1>
				<?php } ?>
			</div>
		</a>
		<?php $wedding_style_integration_page->head_advertisment(); ?>
		<div class="clear"></div>
	</div>
	<?php
	}


function wedding_style_slideshow(){
	global $wedding_style_home_page,$wedding_style_slider_page;
	foreach ($wedding_style_home_page->options_homepage as $value){
		if(isset($value['id'])){
			if (get_theme_mod( $value['id'] ) === FALSE){ 
				$$value['var_name'] = $value['std']; 
			} 
			else { 
				$$value['var_name'] = get_theme_mod( $value['id'] ); 
			}
		}
	}
	$image_link=get_theme_mod('web_busines_image_link',get_template_directory_uri('template_url').'/images/slider_1.jpg'.';;;;'. get_template_directory_uri('template_url').'/images/slider_2.jpg'.';;;;'.get_template_directory_uri('template_url').'/images/slider_3.jpg');
	
	$hide_slider = get_theme_mod('ct_hide_slider');
	$show_slider = get_theme_mod('ct_show_slider');
	
	if($show_slider==true){
		$show_slider_in_homepage = is_home(); ?>
		<style>
		h2.page-header span {
			position: relative;
			top: 0;
		}
		</style>
	<?php
	}
	else
	$show_slider_in_homepage = true;

	if($hide_slider=="" && $image_link!='' && $show_slider_in_homepage){  ?>
		<script>
		var data = [];      
		<?php
		$image_link=get_theme_mod('web_busines_image_link',get_template_directory_uri('template_url').'/images/slider_1.jpg'.';;;;'. get_template_directory_uri('template_url').'/images/slider_2.jpg'.';;;;'.get_template_directory_uri('template_url').'/images/slider_3.jpg');

		if($image_link){
			$link_array=explode(';;;;',$image_link);
			if(count($link_array)>1)
			array_pop($link_array);
		}
		else {$link_array=array();}	

		for($i=0;$i<count($link_array);$i++){
			echo 'data["'.$i.'"]=[];';
		}
		
		for($i=0;$i<count($link_array);$i++){
			echo 'data["'.$i.'"]["id"]="'.$i.'";';
			echo 'data["'.$i.'"]["image_url"]="'.$link_array[$i].'";';
		}

		$image_textarea=get_theme_mod('web_busines_image_textarea','<h2>Lorem ipsum dolor sit amet</h2><p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>;;;;<h2>Lorem ipsum</h2><p style="color: #fff">Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>;;;;<h2>Lorem ipsum dolor sit ame</h2><p style="color:#fff">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae.</p>');

		if($image_textarea){
			$textarea_array=explode(';;;;',$image_textarea);
			array_pop($textarea_array);
		}
		else {$textarea_array=array();}

		for($i=0;$i<count($textarea_array);$i++){
			echo 'data["'.$i.'"]["description"]="'.str_replace('"',"'",$textarea_array[$i]).'";';
			$current_image_description = str_replace('"',"'",$textarea_array[$i]);
		}
		
		$image_title=get_theme_mod('web_busines_image_title',';;;;');
		if($image_title){
			$title_array=explode(';;;;',$image_title);
			array_pop($title_array);
		}
		else {$title_array=array();}

		for($i=0;$i<count($title_array);$i++){
			if($title_array[$i]!=''){
				echo 'data["'.$i.'"]["alt"]="'.str_replace('"',"'",$title_array[$i]).'";';
			}
			else
				echo 'data["'.$i.'"]["alt"]="";'; 
				$current_image_alt=str_replace('"',"'",$title_array[$i]);
		} ?>
		</script>

		<?php		
		$slideshow_title_position = explode('-', trim(get_theme_mod('ct_slider_title_position', 'right-top')) );
		$slideshow_description_position = explode('-', trim(get_theme_mod('ct_slider_description_position', 'right-bottom')) );
		?>
		<style>
		.bwg_slideshow_image_wrap {
			height:<?php echo get_theme_mod('ct_slider_height','400'); ?>px;
			width:100% !important;
		}

		.bwg_slideshow_title_span {
			text-align: <?php echo $slideshow_title_position[0]; ?>;
			vertical-align: <?php echo $slideshow_title_position[1]; ?>;
		}
		.bwg_slideshow_description_span {
			text-align: <?php echo $slideshow_description_position[0]; ?>;
			vertical-align: <?php echo $slideshow_description_position[1]; ?>;
		}
		</style>

		<!--SLIDESHOW START-->
		<div id="slideshow">
			<div class="wdcontainer">
				<div class="slider_contener_for_exklusive">
					<div class="bwg_slideshow_image_wrap" id="bwg_slideshow_image_wrap_id">
						<?php 
						$current_image_id=0;
						$current_pos =0;
						$current_key=0;
						?>
						<!--################# DOTS ################# -->

						<a id="spider_slideshow_left" onclick="javascript:bwg_change_image(parseInt(jQuery('#bwg_current_image_key').val()), (parseInt(jQuery('#bwg_current_image_key').val()) - iterator()) >= 0 ? (parseInt(jQuery('#bwg_current_image_key').val()) - iterator()) % data.length : data.length - 1, data);"><span id="spider_slideshow_left-ico"><span><i class="bwg_slideshow_prev_btn fa "></i></span></span></a>
						<a id="spider_slideshow_right" onclick="javascript:bwg_change_image(parseInt(jQuery('#bwg_current_image_key').val()), (parseInt(jQuery('#bwg_current_image_key').val()) + iterator()) % data.length, data);"><span id="spider_slideshow_right-ico"><span><i class="bwg_slideshow_next_btn fa "></i></span></span></a>

						<!--################ IMAGES ################## -->
						<div id="bwg_slideshow_image_container"  width="100%" class="bwg_slideshow_image_container">        
							<div class="bwg_slide_container" width="100%">
								<div class="bwg_slide_bg">
									<div class="bwg_slider">
										<?php
										$image_href=get_theme_mod('web_busines_image_href',';;;;');
										if($image_href){
											$href_array=explode(';;;;',$image_href);
											array_pop($href_array);
										}
										else {$href_array=array();}	

										if($image_link){
											$image_rows=explode(';;;;',$image_link);
											if(count($image_rows)>1)
											array_pop($image_rows);
										}
										else {$image_rows=array();}	
										$i=0;

										foreach ($image_rows as $key => $image_row) {
											if ($i == $current_image_id) {
												$current_key = $key; ?>
												<span class="bwg_slideshow_image_span" id="image_id_<?php echo $i; ?>">
													<span class="bwg_slideshow_image_span1">
														<span class="bwg_slideshow_image_span2">
															<a href="<?php if(isset($href_array[$i])) echo esc_url($href_array[$i]); ?>" >
																<img id="bwg_slideshow_image" class="bwg_slideshow_image" src="<?php echo esc_url($image_row); ?>" image_id="<?php echo $i; ?>" />
															</a>
														</span>
													</span>
												</span>
												<input type="hidden" id="bwg_current_image_key" value="<?php echo $key; ?>" />
												<?php
											}
											else { ?>
											<span class="bwg_slideshow_image_second_span" id="image_id_<?php echo $i; ?>">
												<span class="bwg_slideshow_image_span1">
													<span class="bwg_slideshow_image_span2">
														<a href="<?php if(isset($href_array[$i])) echo esc_url($href_array[$i]); ?>" >
															<img id="bwg_slideshow_image_second" class="bwg_slideshow_image" src="<?php echo esc_url($image_row); ?>" />
														</a>
													</span>
												</span>
											</span>
											<?php
											}
											$i++;
										}
										?>
									</div>
								</div>
							</div>
							<?php if (isset($enable_slideshow_ctrl) && $enable_slideshow_ctrl) { ?>
								<a id="spider_slideshow_left" href="javascript:bwg_change_image(parseInt(jQuery('#bwg_current_image_key').val()), (parseInt(jQuery('#bwg_current_image_key').val()) - iterator()) >= 0 ? (parseInt(jQuery('#bwg_current_image_key').val()) - iterator()) % data.length : data.length - 1, data);"><span id="spider_slideshow_left-ico"><span><i class="bwg_slideshow_prev_btn fa <?php echo $theme_row->slideshow_rl_btn_style; ?>-left"></i></span></span></a>
								<span id="bwg_slideshow_play_pause"><span><span id="bwg_slideshow_play_pause-ico"><i class="bwg_ctrl_btn bwg_slideshow_play_pause fa fa-play"></i></span></span></span>
								<a id="spider_slideshow_right" href="javascript:bwg_change_image(parseInt(jQuery('#bwg_current_image_key').val()), (parseInt(jQuery('#bwg_current_image_key').val()) + iterator()) % data.length, data);"><span id="spider_slideshow_right-ico"><span><i class="bwg_slideshow_next_btn fa <?php echo $theme_row->slideshow_rl_btn_style; ?>-right"></i></span></span></a>
							<?php } ?>
						</div>

						<!--################ TITLE ################## -->
						<div class="bwg_slideshow_image_container" style="position: absolute;">
							<div class="bwg_slideshow_title_container">
								<div style="display:table; margin:0 auto;">
									<span class="bwg_slideshow_title_span">
										<div class="bwg_slideshow_title_text" >
											<?php echo stripslashes($title_array[0]); ?>
										</div>
									</span>
								</div>
							</div>
						</div>

						<!--################ DESCRIPTION ################## -->
						<div class="bwg_slideshow_image_container" style="position: absolute;">
							<div class="bwg_slideshow_title_container">
								<div style="display:table; margin:0 auto;">
									<span class="bwg_slideshow_description_span">
										<div class="bwg_slideshow_description_text">
											<?php echo stripslashes($textarea_array[0]); ?>        
										</div>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
		if(is_home())
			$slider_height = get_theme_mod('ct_slider_height','350');
		else{
			$slider_height = 250;
		?>
			<style>
			.wd_bwg_slideshow_image {
			width: 100% !important;
			max-height: 100% !important;
			height: auto !important;
			}
			</style>
			<?php
		}
		$wedding_style_js_parameters=array(
		"pausetime"    =>get_theme_mod('ct_pause_time','4000'),
		"speed"        =>get_theme_mod('ct_anim_speed','500'),
		"pausehover"   =>get_theme_mod('ct_pause_on_hover',false),
		"effect"       =>trim(get_theme_mod('ct_effect','random')),
		"height"       =>$slider_height,
		"widt_standart"=>1024
		);

		wedding_style_slideshow_java_script($wedding_style_js_parameters); ?>

		<!--SLIDESHOW END-->

	<?php }
}


function wedding_style_top_posts(){
	global $wedding_style_home_page,$wedding_style_general_settings_page,$paged;
	foreach ( $wedding_style_general_settings_page->options_generalsettings as $value ) {
		if ( isset( $value['id'] )) 	{ 
			$$value['var_name'] = $value['std']; 
		}
	}
	foreach ($wedding_style_home_page->options_homepage as $value) {
		if(isset($value['id'])){
			$$value['var_name'] = $value['std']; 
		}
	}
	if(isset($blog_style) && $blog_style=="on") { ?>								
		<style>
		#top-posts-list li div.image-block img{
			height: 180px !important;
			width: 250px;
		}
		</style>
	<?php }   
	if ($hide_top_posts=='on' && is_home()) {	
		$wedding_style_query = new WP_Query('posts_per_page=3&cat='.$top_post_categories.'&orderby=date&order=ASC');
		if($top_post_categories!=""){				
			if($wedding_style_query->have_posts()) { ?>
				<div  id="top-posts"  class="content-inner-block">
				<div class="container">
					<ul id="top-posts-list">				
						<?php
						while ($wedding_style_query->have_posts()) {						
						$wedding_style_query->the_post(); ?>
							<li>
								<a href="<?php the_permalink(); ?>">
									<div class="image-block">	
										<?php if($grab_image){
											echo wedding_style_display_thumbnail(240,182); 
										}
										else {
											echo wedding_style_thumbnail(240,182);
										} ?>	
									</div>
								</a>				   
								<div class="top-posts-texts">
									<h3 class="heading">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h3>
									<p><?php wedding_style_the_excerpt_max_charlength(250); ?></p>
								</div>					
							</li>
						<?php }  ?>					
					</ul>
				</div>
				<div style="clear:both;"></div>
				<?php 
			} 
		}
		else { ?>
		<div id="top-posts" class="web">
			<div class="container screen" style="width: 989px;">
				<ul id="top-posts-list">
					<li>
						<a href="#" style="color: rgb(70, 70, 70);">
							<div class="image-block" style="height: 180px;width: 180px;margin-top: 10px;margin-bottom: 0px;border-radius: 90px;">
								<img width="320" height="167" src="<?php  echo get_template_directory_uri('template_url'); ?>/images/top_2.jpg" class="attachment-320x210 wp-post-image" alt="top_2.jpg">									
							</div>
						</a>
						<div class="top-posts-texts">
							<h3 class="heading"><a href="#" style="color: rgb(70, 70, 70);">My Wedding Ring</a></h3>
							<span>Lorem Ipsum is that it has a more-or-less normal distribution of letters.</span>
						</div>
					</li>
					<li>
						<a href="#" style="color: rgb(70, 70, 70);">
							<div class="image-block" style="height: 180px;width: 180px;margin-top: 10px;margin-bottom: 0px;border-radius: 90px;">
								<img width="320" height="167" src="<?php  echo get_template_directory_uri('template_url'); ?>/images/top_3.jpg" class="attachment-320x210 wp-post-image" alt="top_3.jpg">									
							</div>
						</a>
						<div class="top-posts-texts">
							<h3 class="heading"><a href="#" style="color: rgb(70, 70, 70);">My Wedding Trip</a></h3>
							<span>Lorem Ipsum is that it has a more-or-less normal distribution of letters.</span>
						</div>
					</li>
					<li>
						<a href="#" style="color: rgb(70, 70, 70);">
							<div class="image-block" style="height: 180px;width: 180px;margin-top: 10px;margin-bottom: 0px;border-radius: 90px;">
								<img width="320" height="167" src="<?php  echo get_template_directory_uri('template_url'); ?>/images/top_1.jpg" class="attachment-320x210 wp-post-image" alt="top_1.jpg">									
							</div>
						</a>
						<div class="top-posts-texts">
							<h3 class="heading"><a href="#" style="color: rgb(70, 70, 70);">My Wedding Party</a></h3>
							<span>Lorem Ipsum is that it has a more-or-less normal distribution of letters.</span>
						</div>
					</li>				
				</ul>
			</div>
			<div style="clear:both;"></div>
		</div>
		<?php
		}
	} wp_reset_postdata();
}



function wedding_style_favicon_img(){
	global $wedding_style_general_settings_page;
	foreach ( $wedding_style_general_settings_page->options_generalsettings as $value ){
		if(isset($value['id'])){
			if ( get_theme_mod( $value['id'] ) === FALSE ){
				$$value['var_name'] = $value['std']; 
			} 
			else {
				$$value['var_name'] = get_theme_mod( $value['id'] ); 
			}
		}
	}
	if($favicon_enable=='on' && $favicon_img) { ?>
		<link rel="shortcut icon" href="<?php if(trim($favicon_img)) echo esc_url($favicon_img);?>" type="image/x-icon" />
	<?php  
	}
}


function wedding_style_page_blog(){
	global $wedding_style_general_settings_page,$post, $web_dorado_meta_date;
	foreach ( $wedding_style_general_settings_page->options_generalsettings as $value ) {
		if ( get_theme_mod( $value['id'] ) === FALSE ) { 
		   $$value['var_name'] = $value['std']; 
		} 
		else {
		   $$value['var_name'] = get_theme_mod( $value['id'] ); 
		}
	}
	//wp_reset_query();

	if(!$date_enable){ ?>
		<style>
		.read_more{
			bottom:0 !important;
		} 
		</style>
	<?php 
	} ?>
	<div class="blog-post blog-page">	
		<?php								  
		if (!isset($web_dorado_meta_date['showthumb']) || $web_dorado_meta_date['showthumb']!="on")  { ?>
		<div class="image-block">
			<?php 
			if($grab_image && $date_enable){
				echo wedding_style_posted_on_blog();
			}
			if($grab_image && !has_post_thumbnail()) {
				echo wedding_style_display_thumbnail(240,182); 
			}
			else {
				echo wedding_style_thumbnail(240,182);
			}
			?>
		</div>
		<?php } ?>
		<h3>
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h3>
		<?php	
		if(isset($web_dorado_meta_date['blogstyle']) && $web_dorado_meta_date['blogstyle']=="on") { ?>																  
			<p>
				<?php wedding_style_the_excerpt_max_charlength(220); ?>
			</p>									
		<?php  }
		else  { ?>
			<p>
				<?php the_content(__('More','WeddingStyle')); ?>
			</p>
		<?php } ?>
		<a href="<?php the_permalink(); ?>"  class="read_more read_blog"><?php echo __('More', 'WeddingStyle'); ?></a>	
		<div class="clear"></div>		   
	</div>
	<?php
}

function wedding_style_news_page(){
	global $wedding_style_general_settings_page,$post,$web_business_meta;
	foreach ( $wedding_style_general_settings_page->options_generalsettings as $value ) {
		if ( get_theme_mod( $value['id'] ) === FALSE ){ 
			$$value['var_name'] = $value['std']; 
		} 
		else {
			$$value['var_name'] = get_theme_mod( $value['id'] ); 
		}
	} ?>
	<div class="entry">	
		<?php
		if (!isset($web_business_meta['showthumb'])) {
			if($grab_image) {
				echo wedding_style_display_thumbnail(240,182); 
			}
			else {
				echo wedding_style_thumbnail(240,182);
			}							
		}
		else if($web_business_meta['showthumb']!="on"){							
			if($grab_image) {
				echo display_thumbnail(220,220); 
			}
			else {
				echo _thumbnail(220,220);
			}
		}							
		if($blog_style) {
			the_content(__('More','WeddingStyle'));
		}
		else {
			the_excerpt();
		}  ?>
	</div>
<?php
}


function wedding_style_ftricons(){
	global  $wedding_style_general_settings_page;
	foreach ( $wedding_style_general_settings_page->options_generalsettings as $value ) {
		if(isset($value['id'])){
			if ( get_theme_mod( $value['id'] ) === FALSE ) {
				$$value['var_name'] = $value['std']; 
			} 
			else {
				$$value['var_name'] = get_theme_mod( $value['id'] ); 
			}
		}
	} ?>
	<a  <?php if( $show_facebook_icon=='' || $facebook_url == "" ){ echo "style=\"display:none;\""; } ?> href="<?php if( trim($facebook_url) ) { echo esc_url($facebook_url);} else { echo "javascript:;";}?>"  target="_blank" title="Facebook">
		<img src="<?php  echo get_template_directory_uri('template_url'); ?>/images/Facebook-icon.png" width="45" height="45" alt="" />
	</a>
	<a <?php if( $show_twitter_icon=='' || $twitter_url == ""){ echo "style=\"display:none;\""; } ?> href="<?php if( trim($twitter_url) ){ echo esc_url($twitter_url);} else { echo "javascript:;";}?>" target="_blank" title="Twitter">
		<img src="<?php  echo get_template_directory_uri('template_url'); ?>/images/twitter_icon.png" width="45" height="45" alt="" />
	</a>
	<a <?php if( $show_rss_icon=='' || $rss_url == "" ) { echo "style=\"display:none;\""; } ?>  href="<?php if( trim($rss_url) ) { echo esc_url($rss_url);} else { echo "javascript:;";}?>" target="_blank" title="Rss">
		<img src="<?php  echo get_template_directory_uri('template_url'); ?>/images/rss-icon.png" width="45" height="45" alt="" />
	</a>
<?php
}


function wedding_style_nav_link( ) {
	global $wp_query;
	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav class="navigation" role="navigation">
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'WeddingStyle' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'WeddingStyle' ) ); ?></div>
		</nav>
	<?php endif;
}

function wedding_style_slideshow_java_script($wedding_style_js_parameters){ ?>
<script type="text/javascript">
	var bwg_transition_duration = <?php echo $wedding_style_js_parameters["speed"];?>;
	// For browsers that does not support transitions.
	function bwg_fallback(current_image_class, next_image_class, direction) {
		bwg_<?php echo $wedding_style_js_parameters["effect"];?>(current_image_class, next_image_class, direction);
		
	}
	
	function bwg_<?php echo $wedding_style_js_parameters["effect"];?>(current_image_class, next_image_class, direction) {
	
		if (bwg_testBrowser_cssTransitions()) {
		  jQuery(next_image_class).css('transition', 'opacity ' + bwg_transition_duration + 'ms linear');
		  jQuery(current_image_class).css({'opacity' : 0, 'z-index': 1});
		  jQuery(next_image_class).css({'opacity' : 1, 'z-index' : 2});
		}
		else {
		  jQuery(current_image_class).animate({'opacity' : 0, 'z-index' : 1}, bwg_transition_duration);
		  jQuery(next_image_class).animate({
			  'opacity' : 1,
			  'z-index': 2
			});
		  // For IE.
		  jQuery(current_image_class).fadeTo(bwg_transition_duration, 0);
		  jQuery(next_image_class).fadeTo(bwg_transition_duration, 1);
		}
	}
	
  var bwg_trans_in_progress = false;
     
      var bwg_playInterval;
      // Stop autoplay.
      clearInterval(bwg_playInterval);
	  
      var bwg_current_key = 0;
      var bwg_current_filmstrip_pos = 0;
      // Set filmstrip initial position.
      function bwg_set_filmstrip_pos(filmStripWidth) {
        var selectedImagePos = -bwg_current_filmstrip_pos - (jQuery(".bwg_slideshow_filmstrip_thumbnail").width() + 2) / 2;
        var imagesContainerLeft = Math.min(0, Math.max(filmStripWidth - jQuery(".bwg_slideshow_filmstrip_thumbnails").width(), selectedImagePos + filmStripWidth / 2));
        jQuery(".bwg_slideshow_filmstrip_thumbnails").animate({
            left: imagesContainerLeft
          }, {
            duration: 500,
            complete: function () { bwg_filmstrip_arrows(); }
          });
      }
      function bwg_move_filmstrip() {
        var image_left = jQuery(".bwg_slideshow_thumb_active").position().left;
        var image_right = jQuery(".bwg_slideshow_thumb_active").position().left + jQuery(".bwg_slideshow_thumb_active").outerWidth(true);
        var bwg_filmstrip_width = jQuery(".bwg_slideshow_filmstrip").outerWidth(true);
        var long_filmstrip_cont_left = jQuery(".bwg_slideshow_filmstrip_thumbnails").position().left;
        var long_filmstrip_cont_right = Math.abs(jQuery(".bwg_slideshow_filmstrip_thumbnails").position().left) + bwg_filmstrip_width;
        if (image_left < Math.abs(long_filmstrip_cont_left)) {
          jQuery(".bwg_slideshow_filmstrip_thumbnails").animate({
            left: -image_left
          }, {
            duration: 500,
            complete: function () { bwg_filmstrip_arrows(); }
          });
        }
        else if (image_right > long_filmstrip_cont_right) {
          jQuery(".bwg_slideshow_filmstrip_thumbnails").animate({
            left: -(image_right - bwg_filmstrip_width)
          }, {
            duration: 500,
            complete: function () { bwg_filmstrip_arrows(); }
          });
        }
      }
      // Show/hide filmstrip arrows.
      function bwg_filmstrip_arrows() {
        if (jQuery(".bwg_slideshow_filmstrip_thumbnails").width() < jQuery(".bwg_slideshow_filmstrip").width()) {
          jQuery(".bwg_slideshow_filmstrip_left").hide();
          jQuery(".bwg_slideshow_filmstrip_right").hide();
        }
        else {
          jQuery(".bwg_slideshow_filmstrip_left").show();
          jQuery(".bwg_slideshow_filmstrip_right").show();
        }
      }

      function bwg_testBrowser_cssTransitions() {
        return bwg_testDom('Transition');
      }
      function bwg_testBrowser_cssTransforms3d() {
        return bwg_testDom('Perspective');
      }
      function bwg_testDom(prop) {
        // Browser vendor CSS prefixes.
        var browserVendors = ['', '-webkit-', '-moz-', '-ms-', '-o-', '-khtml-'];
        // Browser vendor DOM prefixes.
        var domPrefixes = ['', 'Webkit', 'Moz', 'ms', 'O', 'Khtml'];
        var i = domPrefixes.length;
        while (i--) {
          if (typeof document.body.style[domPrefixes[i] + prop] !== 'undefined') {
            return true;
          }
        }
        return false;
      }
      function bwg_cube(tz, ntx, nty, nrx, nry, wrx, wry, current_image_class, next_image_class, direction) {
		// If browser does not support 3d transforms/CSS transitions.
        if (!bwg_testBrowser_cssTransitions()) {
          return bwg_fallback(current_image_class, next_image_class, direction);
        }
        if (!bwg_testBrowser_cssTransforms3d()) {
          return bwg_fallback3d(current_image_class, next_image_class, direction);
        }
        bwg_trans_in_progress = true;
        jQuery(".bwg_slide_bg").css('perspective', 1000);
        jQuery(current_image_class).css({
          transform : 'translateZ(' + tz + 'px)',
          backfaceVisibility : 'hidden'
        });
        jQuery(next_image_class).css({
          opacity : 1,
          backfaceVisibility : 'hidden',
          transform : 'translateY(' + nty + 'px) translateX(' + ntx + 'px) rotateY('+ nry +'deg) rotateX('+ nrx +'deg)'
        });
        jQuery(".bwg_slider").css({
          transform: 'translateZ(-' + tz + 'px)',
          transformStyle: 'preserve-3d'
        });
        // Execution steps.
        setTimeout(function () {
          jQuery(".bwg_slider").css({
            transition: 'all ' + bwg_transition_duration + 'ms ease-in-out',
            transform: 'translateZ(-' + tz + 'px) rotateX('+ wrx +'deg) rotateY('+ wry +'deg)'
          });
        }, 20);
        // After transition.
        jQuery(".bwg_slider").one('webkitTransitionEnd transitionend otransitionend oTransitionEnd mstransitionend', jQuery.proxy(bwg_after_trans));
        function bwg_after_trans() {
          jQuery(current_image_class).removeAttr('style');
          jQuery(next_image_class).removeAttr('style');
          jQuery(".bwg_slider").removeAttr('style');
          jQuery(current_image_class).css({'opacity' : 0, 'z-index': 1});
          jQuery(next_image_class).css({'opacity' : 1, 'z-index' : 2});
          bwg_trans_in_progress = false;
        }
      }
      function bwg_cubeH(current_image_class, next_image_class, direction) {
        // Set to half of image width.
        var dimension = jQuery(current_image_class).width() / 2;
        if (direction == 'right') {
          bwg_cube(dimension, dimension, 0, 0, 90, 0, -90, current_image_class, next_image_class, direction);
        }
        else if (direction == 'left') {
          bwg_cube(dimension, -dimension, 0, 0, -90, 0, 90, current_image_class, next_image_class, direction);
        }
      }
      function bwg_cubeV(current_image_class, next_image_class, direction) {
        // Set to half of image height.
        var dimension = jQuery(current_image_class).height() / 2;
        // If next slide.
        if (direction == 'right') {
          bwg_cube(dimension, 0, -dimension, 90, 0, -90, 0, current_image_class, next_image_class, direction);
        }
        else if (direction == 'left') {
          bwg_cube(dimension, 0, dimension, -90, 0, 90, 0, current_image_class, next_image_class, direction);
        }
      }
      // For browsers that does not support transitions.
      function bwg_fallback(current_image_class, next_image_class, direction) {
	  
        bwg_(current_image_class, next_image_class, direction);
      }
      // For browsers that support transitions, but not 3d transforms (only used if primary transition makes use of 3d-transforms).
      function bwg_fallback3d(current_image_class, next_image_class, direction) {
        bwg_sliceV(current_image_class, next_image_class, direction);
      }
      function bwg_none(current_image_class, next_image_class, direction) {
        jQuery(current_image_class).css({'opacity' : 0, 'z-index': 1});
        jQuery(next_image_class).css({'opacity' : 1, 'z-index' : 2});
      }
      function bwg_(current_image_class, next_image_class, direction) {
		
        if (bwg_testBrowser_cssTransitions()) {
          jQuery(next_image_class).css('transition', 'opacity ' + bwg_transition_duration + 'ms linear');
          jQuery(current_image_class).css({'opacity' : 0, 'z-index': 1});
          jQuery(next_image_class).css({'opacity' : 1, 'z-index' : 2});
        }
        else {
          jQuery(current_image_class).animate({'opacity' : 0, 'z-index' : 1}, bwg_transition_duration);
          jQuery(next_image_class).animate({
              'opacity' : 1,
              'z-index': 2
            });
          // For IE.
          jQuery(current_image_class).fadeTo(bwg_transition_duration, 0);
          jQuery(next_image_class).fadeTo(bwg_transition_duration, 1);
        }
      }
      function bwg_grid(cols, rows, ro, tx, ty, sc, op, current_image_class, next_image_class, direction) {
        // If browser does not support CSS transitions.
        if (!bwg_testBrowser_cssTransitions()) {
          return bwg_fallback(current_image_class, next_image_class, direction);
        }
        bwg_trans_in_progress = true;
        // The time (in ms) added to/subtracted from the delay total for each new gridlet.
        var count = (bwg_transition_duration) / (cols + rows);
        // Gridlet creator (divisions of the image grid, positioned with background-images to replicate the look of an entire slide image when assembled)
        function bwg_gridlet(width, height, top, img_top, left, img_left, src, imgWidth, imgHeight, c, r) {
          var delay = (c + r) * count;
          // Return a gridlet elem with styles for specific transition.
          return jQuery('<div class="bwg_gridlet" />').css({
            width : width,
            height : height,
            top : top,
            left : left,
            backgroundImage : 'url("' + src + '")',
            backgroundColor: jQuery(".bwg_slideshow_image_wrap").css("background-color"),
            /*backgroundColor: rgba(0, 0, 0, 0),*/
            backgroundRepeat: 'no-repeat',
            backgroundPosition : img_left + 'px ' + img_top + 'px',
            backgroundSize : imgWidth + 'px ' + imgHeight + 'px',
            transition : 'all ' + bwg_transition_duration + 'ms ease-in-out ' + delay + 'ms',
            transform : 'none'
          });
        }
        // Get the current slide's image.
        var cur_img = jQuery(current_image_class).find('img');
        // Create a grid to hold the gridlets.
        var grid = jQuery('<div />').addClass('bwg_grid');
        // Prepend the grid to the next slide (i.e. so it's above the slide image).
        jQuery(current_image_class).prepend(grid);
        // vars to calculate positioning/size of gridlets
        var cont = jQuery(".bwg_slide_bg");
        var imgWidth = cur_img.width();
        var imgHeight = cur_img.height();
        var contWidth = cont.width(),
            contHeight = cont.height(),
            imgSrc = cur_img.attr('src'),//.replace('/thumb', ''),
            colWidth = Math.floor(contWidth / cols),
            rowHeight = Math.floor(contHeight / rows),
            colRemainder = contWidth - (cols * colWidth),
            colAdd = Math.ceil(colRemainder / cols),
            rowRemainder = contHeight - (rows * rowHeight),
            rowAdd = Math.ceil(rowRemainder / rows),
            leftDist = 0,
            img_leftDist = (jQuery(".bwg_slide_bg").width() - cur_img.width()) / 2;
        // tx/ty args can be passed as 'auto'/'min-auto' (meaning use slide width/height or negative slide width/height).
        tx = tx === 'auto' ? contWidth : tx;
        tx = tx === 'min-auto' ? - contWidth : tx;
        ty = ty === 'auto' ? contHeight : ty;
        ty = ty === 'min-auto' ? - contHeight : ty;
        // Loop through cols
        for (var i = 0; i < cols; i++) {
          var topDist = 0,
              img_topDst = (jQuery(".bwg_slide_bg").height() - cur_img.height()) / 2,
              newColWidth = colWidth;
          // If imgWidth (px) does not divide cleanly into the specified number of cols, adjust individual col widths to create correct total.
          if (colRemainder > 0) {
            var add = colRemainder >= colAdd ? colAdd : colRemainder;
            newColWidth += add;
            colRemainder -= add;
          }
          // Nested loop to create row gridlets for each col.
          for (var j = 0; j < rows; j++)  {
            var newRowHeight = rowHeight,
                newRowRemainder = rowRemainder;
            // If contHeight (px) does not divide cleanly into the specified number of rows, adjust individual row heights to create correct total.
            if (newRowRemainder > 0) {
              add = newRowRemainder >= rowAdd ? rowAdd : rowRemainder;
              newRowHeight += add;
              newRowRemainder -= add;
            }
            // Create & append gridlet to grid.
            grid.append(bwg_gridlet(newColWidth, newRowHeight, topDist, img_topDst, leftDist, img_leftDist, imgSrc, imgWidth, imgHeight, i, j));
            topDist += newRowHeight;
            img_topDst -= newRowHeight;
          }
          img_leftDist -= newColWidth;
          leftDist += newColWidth;
        }
        // Set event listener on last gridlet to finish transitioning.
        var last_gridlet = grid.children().last();
        // Show grid & hide the image it replaces.
        grid.show();
        cur_img.css('opacity', 0);
        // Add identifying classes to corner gridlets (useful if applying border radius).
        grid.children().first().addClass('rs-top-left');
        grid.children().last().addClass('rs-bottom-right');
        grid.children().eq(rows - 1).addClass('rs-bottom-left');
        grid.children().eq(- rows).addClass('rs-top-right');
        // Execution steps.
        setTimeout(function () {
          grid.children().css({
            opacity: op,
            transform: 'rotate('+ ro +'deg) translateX('+ tx +'px) translateY('+ ty +'px) scale('+ sc +')'
          });
        }, 1);
        jQuery(next_image_class).css('opacity', 1);
        // After transition.
        jQuery(last_gridlet).one('webkitTransitionEnd transitionend otransitionend oTransitionEnd mstransitionend', jQuery.proxy(bwg_after_trans));
        function bwg_after_trans() {
          jQuery(current_image_class).css({'opacity' : 0, 'z-index': 1});
          jQuery(next_image_class).css({'opacity' : 1, 'z-index' : 2});
          cur_img.css('opacity', 1);

          grid.remove();
          bwg_trans_in_progress = false;
        }
      }
      function bwg_sliceH(current_image_class, next_image_class, direction) {
        if (direction == 'right') {
          var translateX = 'min-auto';
        }
        else if (direction == 'left') {
          var translateX = 'auto';
        }
        bwg_grid(1, 8, 0, translateX, 0, 1, 0, current_image_class, next_image_class, direction);
      }
      function bwg_sliceV(current_image_class, next_image_class, direction) {
        if (direction == 'right') {
          var translateY = 'min-auto';
        }
        else if (direction == 'left') {
          var translateY = 'auto';
        }
        bwg_grid(10, 1, 0, 0, translateY, 1, 0, current_image_class, next_image_class, direction);
      }

      function bwg_slideV(current_image_class, next_image_class, direction) {
        if (direction == 'right') {
          var translateY = 'auto';
        }
        else if (direction == 'left') {
          var translateY = 'min-auto';
        }
        bwg_grid(1, 1, 0, 0, translateY, 1, 1, current_image_class, next_image_class, direction);
      }

      function bwg_slideH(current_image_class, next_image_class, direction) {
        if (direction == 'right') {
          var translateX = 'min-auto';
        }
        else if (direction == 'left') {
          var translateX = 'auto';
        }
        bwg_grid(1, 1, 0, translateX, 0, 1, 1, current_image_class, next_image_class, direction);
      }

      function bwg_scaleOut(current_image_class, next_image_class, direction) {
        bwg_grid(1, 1, 0, 0, 0, 1.5, 0, current_image_class, next_image_class, direction);
      }
      
      function bwg_scaleIn(current_image_class, next_image_class, direction) {
        bwg_grid(1, 1, 0, 0, 0, 0.5, 0, current_image_class, next_image_class, direction);
      }

      function bwg_blockScale(current_image_class, next_image_class, direction) {
        bwg_grid(8, 6, 0, 0, 0, .6, 0, current_image_class, next_image_class, direction);
      }

      function bwg_kaleidoscope(current_image_class, next_image_class, direction) {
        bwg_grid(10, 8, 0, 0, 0, 1, 0, current_image_class, next_image_class, direction);
      }

      function bwg_fan(current_image_class, next_image_class, direction) {
        if (direction == 'right') {
          var rotate = 45;
          var translateX = 100;
        }
        else if (direction == 'left') {
          var rotate = -45;
          var translateX = -100;
        }
        bwg_grid(1, 10, rotate, translateX, 0, 1, 0, current_image_class, next_image_class, direction);
      }

      function bwg_blindV(current_image_class, next_image_class, direction) {
        bwg_grid(1, 8, 0, 0, 0, .7, 0, current_image_class, next_image_class);
      }

      function bwg_blindH(current_image_class, next_image_class, direction) {
        bwg_grid(10, 1, 0, 0, 0, .7, 0, current_image_class, next_image_class);
      }
	  
      function bwg_random(current_image_class, next_image_class, direction) {
        var anims = ['sliceH', 'sliceV', 'slideH', 'slideV', 'scaleOut', 'scaleIn', 'blockScale', 'kaleidoscope', 'fan', 'blindH', 'blindV'];
        // Pick a random transition from the anims array.
		
        this["bwg_" + anims[Math.floor(Math.random() * anims.length)] + ""](current_image_class, next_image_class, direction);
      }
      
	  function iterator() {
        var iterator = 1;

        return iterator;
      }

	function bwg_change_image(current_key, key, data) {
			
		if (bwg_trans_in_progress) {
		  return;
		}
		var direction = 'right';
		if (bwg_current_key > key) {
		  var direction = 'left';
		}
		else if (bwg_current_key == key) {
		  return;
		}
		
		// Hide previous/next buttons on first/last images.
		if (data[key]) {
		  if (current_key == '-1') { // Filmstrip.
			current_key = jQuery(".bwg_slideshow_thumb_active").children("img").attr("image_key");
		  }
		  else if (current_key == '-2') { // Dots.
			current_key = jQuery(".bwg_slideshow_dots_active").attr("image_key");
		  }

		  // Set active thumbnail.
		  jQuery(".bwg_slideshow_filmstrip_thumbnail").removeClass("bwg_slideshow_thumb_active").addClass("bwg_slideshow_thumb_deactive");
		  jQuery("#bwg_filmstrip_thumbnail_" + key + "").removeClass("bwg_slideshow_thumb_deactive").addClass("bwg_slideshow_thumb_active");
		  jQuery(".bwg_slideshow_dots").removeClass("bwg_slideshow_dots_active").addClass("bwg_slideshow_dots_deactive");
		  jQuery("#bwg_dots_" + key + "").removeClass("bwg_slideshow_dots_deactive").addClass("bwg_slideshow_dots_active");          

		 
		  bwg_current_key = key;
		  

		  // Change image id, key, title, description.
		  jQuery("#bwg_current_image_key").val(key);
		  jQuery("#bwg_slideshow_image").attr('image_id', data[key]["id"]);
		  
		  
		  jQuery(".bwg_slideshow_title_text").html(data[key]["alt"]);
		  jQuery(".bwg_slideshow_description_text").html(data[key]["description"]);
			
			
		  var current_image_class = "#image_id_" + data[current_key]["id"];
		
		  var next_image_class = "#image_id_" + data[key]["id"];
		  bwg_<?php echo $wedding_style_js_parameters["effect"];?>(current_image_class, next_image_class, direction);
		}
	
		
		//prpr
		jQuery('.bwg_slideshow_title_text').removeClass('none');
		if(jQuery('.bwg_slideshow_title_text').html()==""){jQuery('.bwg_slideshow_title_text').addClass('none');}
		
		jQuery('.bwg_slideshow_description_text').removeClass('none');
		if(jQuery('.bwg_slideshow_description_text').html()==""){jQuery('.bwg_slideshow_description_text').addClass('none');}
	}
	
	
	
		
     function bwg_popup_resize() {
		
      
	   //standart chap vor@ voroshvac chi bnav template um
	   
		firstsize=1024;
		var bodyWidth=jQuery(window).width();
		var	parentWidth=jQuery(".bwg_slideshow_image_wrap").parent().width();
		
		//tryuk vor hankarc responsive.js @  ushana body i chap@ verci vochte verevi div i 
		if(parentWidth>bodyWidth){parentWidth=bodyWidth;}
	     var kaificent_for_shoxq=(30/firstsize);
		var str=(<?php echo $wedding_style_js_parameters["height"];?>/firstsize  );	
	

           jQuery(".bwg_slideshow_image_wrap").css({height: ((parentWidth) * str)});
		   jQuery("#slideshow").css({height: ((parentWidth) * str)});
		   jQuery(".slider_contener_for_exklusive").css('border-width',(kaificent_for_shoxq*parentWidth));
		 
		   jQuery(".bwg_slideshow_image_wrap > div").css({height: ((parentWidth) * str)});
		    $(".bwg_slideshow_title_container > div").css({height: ((parentWidth) * str)});
			
			  jQuery(".bwg_slideshow_image").css({height: ((parentWidth) * str)});
			
			
          jQuery(".bwg_slideshow_image_container").css({width: (parentWidth)});
          jQuery(".bwg_slideshow_image_container").css({height: ((parentWidth) * str)});
          jQuery(".bwg_slideshow_image").css({
            maxWidth: parentWidth,
            maxHeight: ((parentWidth) * str)
          });
       

          jQuery(".bwg_slideshow_filmstrip_container").css({width: (parentWidth)});
          jQuery(".bwg_slideshow_filmstrip").css({width: (parentWidth - 40)});
          jQuery(".bwg_slideshow_dots_container").css({width: (parentWidth)});   
      }
	  
      
	  
      jQuery(document).ready(function () {
		bwg_popup_resize();
		
		jQuery(window).resize(function() {
			bwg_popup_resize();
		});
		
		
        var bwg_click = jQuery.browser.mobile ? 'touchend' : 'click';

        // Set image container height.
        jQuery(".bwg_slideshow_image_container").height(jQuery(".bwg_slideshow_image_wrap").height() - 0);

        // Set filmstrip initial position.
        bwg_set_filmstrip_pos(jQuery(".bwg_slideshow_filmstrip").width());

        // Play/pause.

        
       function play() {
       window.clearInterval(bwg_playInterval);
       /* Play.*/
       bwg_playInterval = setInterval(function () {
         var iterator = 1;
         if (0) {
           iterator = Math.floor((data.length - 1) * Math.random() + 1);
         }
         bwg_change_image(parseInt(jQuery('#bwg_current_image_key').val()), (parseInt(jQuery('#bwg_current_image_key').val()) + iterator) % data.length, data)
       }, '<?php echo $wedding_style_js_parameters["pausetime"];?>');
     }
     jQuery(window).focus(function() {
       if (!jQuery(".bwg_ctrl_btn").hasClass("fa-play")) {
         play();
       }
       var i = 0;
       jQuery(".bwg_slider").children("span").each(function () {
         if (jQuery(this).css('opacity') == 1) {
           jQuery("#bwg_current_image_key").val(i);
         }
         i++;
       });
     });
     jQuery(window).blur(function() {
       window.clearInterval(bwg_playInterval);
     });



var pausehover="<?php echo $wedding_style_js_parameters["pausehover"];?>";

if(pausehover=="true"){
$("#bwg_slideshow_image_container, .bwg_slideshow_image_container").hover(function(){clearInterval(bwg_playInterval);},function(){play();});
}

       if (1) {
         play();
         jQuery(".bwg_slideshow_play_pause").attr("title", "Pause");
         jQuery(".bwg_slideshow_play_pause").attr("class", "bwg_ctrl_btn bwg_slideshow_play_pause fa fa-pause");
       }



     });

</script>

<?php
}
?>