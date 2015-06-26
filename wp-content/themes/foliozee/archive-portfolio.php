<?php
	get_header();

	global $fdata;
	//assiging headings for single page
	$heading_1 = $fdata[ 'portfolio_main_heading' ];
	$heading_2 = $fdata[ 'portfolio_sub_heading' ];
	$heading_3 = $fdata[ 'portfolio_heading_desc' ];
	
	?>
    <!-- internal_header starts -->
    <?php
	if($heading_1 || $heading_2 || $heading_3){
	?>
    <section class="internal_header">
    	<div class="container">
        	<div class="row">
            	<div class="col-sm-12">
                    <article>
                    	<div class="hgroup_4">
                        	<?php
							if($heading_1){
							?>
                            <div class="heading_cover">
                            	<h2><?php echo $heading_1; ?></h2>
                            </div>
                            <?php
							}
							if($heading_2){
							?>
                            <div class="heading_cover">
                            	<?php // Header from Theme Options Panel Blog Listing settings ?>
                            	<h3><?php echo $heading_2;?></h3>
                            </div>
                            <?php
                            }
							if($heading_3){
							?>
                            <div class="heading_cover">
                            	<?php // Header from Theme Options Panel Blog Listing settings ?>
                            	<h4><?php echo $heading_3;?></h4>
                            </div>
                            <?php
							}?>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
	<?php 
	}?>
    
    <!-- internal_header ends -->
    <section class="content_area">
    	<div class="container section_container">
        	<div class="row">
            	<div class="col-sm-12">
                	<?php 
						$item_show = isset($fdata['portfolio_items_show']) && 
						!empty($fdata['portfolio_items_show'])? $fdata['portfolio_items_show']: -1;
						
						$portfolio_categories = isset($fdata['portfolio_categories']) && 
						!empty($fdata['portfolio_categories'])? implode(',', $fdata['portfolio_categories']): '';
						
						$allword = isset($fdata['allword']) && 
						!empty($fdata['allword'])? $fdata['allword']: 'All';

						$portfolio_style = isset($fdata['portfolio_style']) && 
						!empty($fdata['portfolio_style'])? $fdata['portfolio_style']: 'both';
					?>
                	<!-- Shortcode for portfolio listing starts -->
                    <?php echo do_shortcode( '[folio_portfolio_grid layout="'.$portfolio_style.'" number="'.$item_show.'" categories="'.$portfolio_categories.'" allword="'.$allword.'" align="'.$fdata['portfolio_align'].'"]' )?>
                	<!-- Shortcode for portfolio listing ends -->
                </div>
            </div>
        </div>
    </section>

<?php
	get_footer();