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
							<div class="heading_cover">
                            	<h2><?php printf( __( 'Search <span class="highlight">Results</span>', 'kraftives' )); ?></h2>
                        	</div>
                            <div class="heading_cover">
                            	<h3><?php printf( __( '%s', 'kraftives' ), '<span>"' . get_search_query() . '"</span>' ); ?></h3>
                            </div>
                            <div class="heading_cover col-sm-12">
                            	<h4><?php _e( 'Do you want to search more?', 'kraftives' );?></h4>
                                <div class="space_20"></div>
                                <div class="widget widget_search" id="search-5">
                                    <?php get_search_form(); ?>
                                </div>
                            </div>

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