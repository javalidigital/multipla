<?php
/*
 * The template for displaying Comments.
 */
?>
<?php if (post_password_required()) { ?>
    <p class="nocomments"><?php _e('This post is password protected. Enter the password to view any comments.', 'WeddingStyle'); ?></p>
    
<?php return; } ?>
    
<?php if (have_comments()) : ?>
    <h5 id="comments">
			<?php
				printf( _n('One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'WeddingStyle'),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>');
			?>
    </h5>
    
    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    <div class="navigation">
        <div class="previous"><?php previous_comments_link(__( '&#8249; Older comments','WeddingStyle' )); ?></div><!-- end of .previous -->
        <div class="next"><?php next_comments_link(__( 'Newer comments &#8250;','WeddingStyle', 0 )); ?></div><!-- end of .next -->
    </div><!-- end of.navigation -->
    <?php endif; ?>
    
    <ol class="commentlist">
        <?php
		wp_list_comments( array(
				'style'      => 'ol',
				'avatar_size'=> 60,
			) );
		?>
    </ol>
    
    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    <div class="navigation">
        <div class="previous"><?php previous_comments_link(__( '&#8249; Older comments','WeddingStyle' )); ?></div><!-- end of .previous -->
        <div class="next"><?php next_comments_link(__( 'Newer comments &#8250;','WeddingStyle', 0 )); ?></div><!-- end of .next -->
    </div><!-- end of.navigation -->
    <?php endif; ?>
<?php endif; ?>
<?php

 if (comments_open()) : ?>
    <?php
    $wedding_style_fields = array(
        'author' => '<p class="comment-form-author"><input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" placeholder="' . __('Name','sp_webBusiness') . '" /></p>',
        'email' => '<p class="comment-form-email"><input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" placeholder="' . __('E-mail','sp_webBusiness') . '" /></p>',
        'url' => '<p class="comment-form-url"><input id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" placeholder="' . __('Website','sp_webBusiness') . '" /></p>',
   
   );
    $wedding_style_defaults = array('fields' => apply_filters('comment_form_default_fields', $wedding_style_fields),'comment_field' => '<p class="comment-form-comment"> <textarea  placeholder="' . __('Comment','WeddingStyle') . '" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>');
    comment_form( $wedding_style_defaults);
     endif; ?>