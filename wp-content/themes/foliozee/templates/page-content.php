
    <!-- sec-blog starts -->
	<section class="content_area_section">
    	<div class="container">
        	<div class="row">
            	<!-- left sidebar starts -->
				<?php
				//assiging Sidebar options
				$post_id = $post->ID;
				//assiging Sidebar options sidebar_active, post_layout_option
				$is_sidebar = get_post_meta($post_id, "sidebar_active",true );
				$sidebar_pos = get_post_meta($post_id, "page_layout_option",true );
				$sidebar_width = 'col-sm-4';
				$content_width = 'col-sm-8';
				$sidebar_class='';
				if(($sidebar_pos==='sidebar_2left' || $sidebar_pos==='sidebar_2right' || $sidebar_pos==='sidebar_both')){
					$sidebar_class = 'both_sidebars';
				}
				
				// if sidebar is inactive
				if($is_sidebar==='false' || !($is_sidebar)){
					$content_width = 'col-sm-12';//'span12';
				}
				// for 2 sidebaars we are changing he width of sidebars and content
				if($is_sidebar==='true' && ($sidebar_pos==='sidebar_2left' || $sidebar_pos==='sidebar_2right' || $sidebar_pos==='sidebar_both') ){
					$sidebar_width = 'col-sm-3';
					$content_width = 'col-sm-6';
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
                
                <!-- right sidebar ends -->
                
            	<!-- content_bar starts -->
            	<div class="<?php echo $content_width; ?> content_bar content_page">
                	
                    <?php /* @TODO  call index loop*/ ?>
                   	<?php  get_template_part('templates/page', 'loop'); ?>
                    
               	</div>
                <!-- content_bar ends -->
                
                <!-- left sidebar starts --> 
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
                
                <!-- right sidebar ends -->
                
            </div>
        </div>
    </section>
    
    <!-- sec-blog ends -->