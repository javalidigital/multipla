<?php 
	global $fdata;
	get_header();
?>
   <!-- internal_header starts -->
    
    <section class="internal_header section_404">
    	<div class="container">
        	<div class="row">
            	<div class="col-sm-12">
                    <article>
                        <div class="hgroup">
                            <div class="heading_cover heading_left">
                                <?php
							if($fdata['word_404']){
							?>
                            	<h1><?php echo $fdata['word_404']; ?></h1>
                            <?php
							}else{
							?>
								<h1>404</h1>
							<?php
							}
							?>
                            </div>
                            <div class="skew_holder">
                                <div class="skew_shape"></div>
                            </div>
                            <div class="heading_cover heading_right">
                        	<?php
							if($fdata['main_heading_404']){
							?>
                            	<h2><?php echo $fdata['main_heading_404']; ?></h2>
                            <?php
							}
							if($fdata['sub_heading_404']){
							?>
                            	<?php // Header from Theme Options Panel Blog Listing settings ?>
                            	<h3><?php echo $fdata['sub_heading_404'];?></h3>
                            <?php
                            }
							if($fdata['heading_desc_404']){
							?>
                            	<?php // Header from Theme Options Panel Blog Listing settings ?>
                            	<h4><?php echo $fdata['heading_desc_404'];?></h4>
                            <?php
							}?>
                            <div class="space_40">
                            </div>
                        	<div class="heading_cover span6 span_center align_center content_bar">
                            	<div class="row">
                                    <div class="span3">
                                        <h5>Are you looking for something?</h5>
                                    </div>
                                    <div class="span3">
                                        <div class="widget widget_search" id="search-3">
                                            <?php get_search_form(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="space_60">
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
    
    
    <!-- internal_header ends -->
    
    <?php  //get_template_part('templates/page', 'content'); ?>

<?php 
	get_footer();
?>