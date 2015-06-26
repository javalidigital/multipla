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
							if($fdata['main_heading']){
							?>
                            <div class="heading_cover">
                            	<h2><?php echo $fdata['main_heading']; ?></h2>
                            </div>
                            <?php
							}
							if($fdata['sub_heading']){
							?>
                            <div class="heading_cover">
                            	<?php // Header from Theme Options Panel Blog Listing settings ?>
                            	<h3><?php echo $fdata['sub_heading'];?></h3>
                            </div>
                            <?php
                            }
							if($fdata['heading_desc']){
							?>
                            <div class="heading_cover">
                            	<?php // Header from Theme Options Panel Blog Listing settings ?>
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
    <?php  get_template_part('templates/index', 'content'); ?>

<?php 
	get_footer();
?>