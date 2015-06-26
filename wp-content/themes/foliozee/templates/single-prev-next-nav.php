<?php 
global $content_blog_width;
?>
<!-- page_nav starts -->

<div class="col-sm-12">
    <div class="page_nav <?php if(folio_get_current_post_type()==='portfolio'){echo "project_page_nav span_center";}?>">

        <?php next_post_link('%link','<i class="fa fa-angle-right"></i>', false); ?>
        <?php previous_post_link('%link','<i class="fa fa-angle-left"></i>', false); ?>

    </div>
</div>
<!-- page_nav ends -->