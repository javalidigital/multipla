<?php 
	global $fdata;
	get_header();
?>
    
    <!-- internal_header starts -->
    <section class="internal_header">
    	<div class="container">
        	<div class="row">
            	<div class="col-sm-12">
                    <article>
                    	<div class="hgroup_4">
                                <?php
                                if (is_category()) { ?>
                                <h2><?php _e('Category Archive for', 'kraftives') ?> 
                                	<span class="highlight"><?php single_cat_title(); ?></span>
                                </h2>
                                
                                <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
                                <h2><?php _e('Posts Tagged', 'kraftives') ?>  
                                	<span class="highlight"><?php single_tag_title(); ?></span>
                                </h2>
                                
                                <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
                                <h2><?php _e('Archive for', 'kraftives') ?> 
									<span class="highlight"><?php the_time('F jS, Y'); ?></span>
                                </h2>
                                
                                <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
                                <h2><?php _e('Archive for', 'kraftives') ?> 
									<span class="highlight"><?php the_time('F, Y'); ?></span>
                                </h2>
                                
                                <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
                                <h2><?php _e('Archive for', 'kraftives') ?> 
									<span class="highlight"><?php the_time('Y'); ?></span>
                                </h2>
                                
                                <?php /* If this is an author archive */ } elseif (is_author()) { ?>
                                <h2><?php _e('Author Archive', 'kraftives') ?>
                                	<span class="highlight"><?php the_author(); ?></span>
                                </h2>
                                
                                <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
                                <h2><?php _e('Blog Archives', 'kraftives') ?></h2>
                                <?php 
                                } 
								//wp_reset_query();
								?>
                            
                            
                            <?php
							if($fdata['sub_heading']){
							?>
                            <div class="heading_cover">
                            	<?php //@TODO Header from Theme Options Panel Blog Listing settings ?>
                            	<h3><?php echo $fdata['sub_heading'];?></h3>
                            </div>
                            <?php
                            }
							if($fdata['heading_desc']){
							?>
                            <div class="heading_cover">
                            	<?php //@TODO Header from Theme Options Panel Blog Listing settings ?>
                            	<h4><?php echo $fdata['heading_desc'];?></h4>
                            </div>
                            <?php
							}?>
                    	</div>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <!-- internal_header ends -->
    
    <?php get_template_part('templates/archive', 'content'); ?>

<?php 
	get_footer();
?>