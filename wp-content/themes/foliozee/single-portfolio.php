<?php 
	get_header();
?>

    <section class="section_holder">
    	<div class="container section_container">
    
    <?php
	//assiging headings for single page
	$post_id = $post->ID;
	$heading_1 = get_post_meta($post_id, "heading_1",true );
	$heading_2 = get_post_meta($post_id, "heading_2",true );

	if( $heading_1 || $heading_2 ){
	?>
    <!-- internal_header starts -->
    
        	<div class="row">
                <article>
                    <div class="hgroup">
                       <?php if($heading_1){ ?>

                        <div class="col-xs-3 heading_cover">
                            <h2><?php echo $heading_1; ?></h2>
                        </div>
						<?php } ?>
                        <div class="col-xs-1 skew_holder">
                            <div class="skew_shape"></div>
                        </div>
                        <?php if($heading_2){ ?>
                        <div class="col-xs-8 heading_cover">
                            <h3><?php echo $heading_2; ?></h3>
                        </div>
                        <?php } ?>
                    </div>
                </article>
            </div>

    <?php
	}?>
    
    <?php  get_template_part('templates/single-portfolio', 'loop'); ?>

<?php 
	get_footer();
?>