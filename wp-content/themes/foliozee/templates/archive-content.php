<?php
global $fdata;
?>
    <!-- sec-blog starts -->
	<section class="content_area_section">
    	<div class="container">
        	<div class="row">
            	<!-- left sidebar starts -->
				<?php
				//assiging Sidebar options
				//get values from THEME OPTIONs
				$is_sidebar = $fdata['switch_sidebars']==true?"true":"false";
				$sidebar_pos = $fdata['layout_option'];
				global $content_blog_width;
				
				$sidebar_width = 'col-sm-4';
				$content_width = 'col-sm-8';
				$content_blog_width = 'col-sm-7';
				$sidebar_class='';
				$content_class = '';//variable for full width blogpost
				
				// if sidebar is inactive
				if($is_sidebar==='false'){
					$content_width = 'col-sm-10';
					$content_blog_width = 'col-sm-9';
					$content_class = 'full_width_blog span_center';
				}
				// for 2 sidebaars we are changing he width of sidebars and content
				if($is_sidebar==='true' && ($sidebar_pos==='sidebar_2left' || $sidebar_pos==='sidebar_2right' || $sidebar_pos==='sidebar_both') ){
					$sidebar_width = 'col-sm-3';
					$content_width = 'col-sm-6';
					$content_blog_width = 'col-sm-5';
					$sidebar_class = 'both_sidebars';
				}
				
				if($is_sidebar==='true' && ($sidebar_pos==='sidebar_left' || $sidebar_pos==='sidebar_both' || $sidebar_pos==='sidebar_2left') ){
				?>
                <aside>
                	<div class="<?php echo $sidebar_width; ?>">
                        <div class="side_bar left_sidebar <?php echo $sidebar_class;?>">
	                        <?php  get_template_part('templates/sidebar', 'left'); ?>
                        </div>
                    </div>
				</aside>
                <?php 
				}
				?>
                <!-- left sidebar ends -->
                
                <?php 
				if($is_sidebar==='true' && ($sidebar_pos==='sidebar_2left') ){
				?>
                <!-- right sidebar starts --> 
                    <aside>
                        <div class="<?php echo $sidebar_width; ?>">
                            <div class="side_bar right_sidebar <?php echo $sidebar_class;?>">
	                            <?php  get_template_part('templates/sidebar', 'right'); ?>
                            </div>
                        </div>
                    </aside>
                <!-- right sidebar ends -->
                <?php 
				}
				?>    
                
            	<!-- content_bar starts -->
            	<div class="<?php echo $content_width.' '.$content_class;; ?> content_bar blog_listing">
                	
                    <?php /* call index loop */ ?>
                   	<?php get_template_part('templates/archive', 'loop'); ?>
                    
               	</div>
                <!-- content_bar ends -->
                
                <?php 
				if($is_sidebar==='true' && ($sidebar_pos==='sidebar_2right') ){
				?>
                <!-- left sidebar starts --> 
                <aside>
                	<div class="<?php echo $sidebar_width; ?>">
                        <div class="side_bar left_sidebar <?php echo $sidebar_class;?>">
	                        <?php  get_template_part('templates/sidebar', 'left'); ?>
                        </div>
					</div>
                </aside>
                <!-- left sidebar ends -->
                <?php
				}
				?>
                
                <?php
				// sidebar should be true and it should not be Left or not be 2Left
                if($is_sidebar==='true' && $sidebar_pos!=='sidebar_left' && $sidebar_pos!=='sidebar_2left' && ($sidebar_pos==='sidebar_right' || $sidebar_pos==='sidebar_both' || $sidebar_pos==='sidebar_2right') ){
				?>
                <!-- right sidebar starts --> 
                <aside>
                	<div class="<?php echo $sidebar_width; ?>">
                        <div class="side_bar right_sidebar <?php echo $sidebar_class;?>">
	                        <?php  get_template_part('templates/sidebar', 'right'); ?>
                        </div>
                    </div>
				</aside>
                <!-- right sidebar ends -->
                <?php
				}
				?>
                
            </div>
        </div>
    </section>
    <!-- sec-blog ends -->