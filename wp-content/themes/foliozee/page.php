<?php 
	get_header();
?>
    <?php
	//assiging headings for single page
	$post_id = $post->ID;
	$heading_2 = get_post_meta($post_id, "heading_2",true );
	$heading_3 = get_post_meta($post_id, "heading_3",true );
	?>
    <!-- internal_header starts -->
    
    <section class="internal_header">
    	<div class="container">
        	<div class="row">
            	<div class="col-sm-12">
                	<article>
                    	<div class="hgroup">
                        	<?php 
							$post_meta = get_post_meta( $post_id, 'hide_title', true );
							if( $post_meta === 'false' || empty( $post_meta ) ){?>
                            <div class="heading_cover">
                            	<h2><?php echo get_the_title($post_id); ?></h2>
                            </div>
                            <?php } ?>
                            <?php
                            if($heading_2){
							?>
                            <div class="heading_cover">
                            	<h3><?php echo $heading_2 ;?><!--Discussion that will <span>NEVER</span> ENDS at all--></h3>
                            </div>
                            <?php
							}
                            if($heading_3){
							?>
                            <div class="heading_cover">
                            	<?php //@TODO Header from Theme Options Panel Blog Listing settings ?>
                            	<h4><?php echo $heading_3 ;?><!--Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nibh tinci dunt ut laoreet dolore magna aliquam erat volutpat.--></h4>
                            </div>
                            <?php
							}
							?>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <!-- internal_header ends -->
    
    <?php  get_template_part('templates/page', 'content'); ?>

<?php 
	get_footer();
?>