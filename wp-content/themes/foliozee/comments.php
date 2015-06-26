<?php function roots_comment($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment; ?>
  <li <?php comment_class(); ?>>

      <article id="comment-<?php comment_ID(); ?>" class="clearing-container">
          <?php echo get_avatar($comment, $size = '100'); ?>
        <header class="comment-author vcard">
            <?php printf(__('<cite class="fn">%s</cite>', 'kraftives'), get_comment_author_link()); ?>
            
          <time datetime="<?php echo comment_date('c'); ?>">
            <a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)); ?>"><?php printf(__('%1$s', 'kraftives'), get_comment_date(), get_comment_time()); ?></a>
          </time>
        </header>
<?php comment_reply_link(array_merge(array('reply_text' =>'Reply <i class="fa fa-long-arrow-right"></i>'), array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
			<?php edit_comment_link(__('(Edit)', 'kraftives'), '', ''); ?>

        <section class="comment comment_block">
          <?php if ($comment->comment_approved == '0') : ?>
          <div class="alert alert-block fade in">
            <p><?php _e('Your comment is awaiting moderation.', 'kraftives'); ?></p>
          </div>
          <?php endif; ?>

            <?php comment_text(); ?>
        </section>
      </article>

    <?php } ?>

<?php if (post_password_required()) : ?>
  <section id="comments">
    <div class="alert alert-block fade in">
      <p><?php _e('This post is password protected. Enter the password to view comments.', 'kraftives'); ?></p>
    </div>
  </section><!-- /#comments -->
    <?php endif; ?>

<?php if (have_comments()) : ?>
  <section id="comments">
    <h3><?php printf(_n('One Response to &ldquo;%2$s&rdquo;', '<span>%1$s</span> Responses <i class="fa fa-comment-o"></i> to &ldquo;%2$s&rdquo;', get_comments_number(), 'kraftives'), number_format_i18n(get_comments_number()), get_the_title()); ?></h3>

    <ol class="commentlist">
        <?php wp_list_comments(array('callback' => 'roots_comment')); ?>
    </ol>

      <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // are there comments to navigate through ?>
    <nav id="comments-nav" class="pager">
      <div class="previous"><?php previous_comments_link(__('&larr; Older comments', 'kraftives')); ?></div>
      <div class="next"><?php next_comments_link(__('Newer comments &rarr;', 'kraftives')); ?></div>
    </nav>

      <?php endif; // check for comment navigation ?>

      <?php if (!comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) : ?>

      <?php endif; ?>
  </section><!-- /#comments -->
    <?php endif; ?>

<?php if (!have_comments() && !comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) : ?>

<?php endif; ?>

<?php if (comments_open()) : ?>
  <section id="respond">
    <h3><?php comment_form_title(__('Leave a Reply', 'kraftives'), __('Leave a Reply to %s', 'kraftives')); ?></h3>

      <p class="cancel-comment-reply"><?php cancel_comment_reply_link('Cancel Reply <i class="fa fa-long-arrow-right"></i>'); ?></p>
      <?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
    <p class="comment-p"><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'kraftives'), wp_login_url(get_permalink())); ?></p>
      <?php else : ?>
    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
        <?php if (is_user_logged_in()) : ?>
      <p class="comment-p"><?php printf(__('Logged in as <a href="%s/wp-admin/profile.php">%s</a>.', 'kraftives'), get_option('siteurl'), $user_identity); ?>
        <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php __('Log out of this account', 'kraftives'); ?>"><?php _e('Log out &raquo;', 'kraftives'); ?></a>
      </p>
        <?php else : ?>
      <?php /*?><label for="author"><?php _e('Name', 'kraftives'); if ($req) _e(' (required)', 'kraftives'); ?></label><?php */?>
      <input placeholder="<?php _e('Your Name', 'kraftives'); if ($req) _e(' (required)', 'kraftives'); ?>" type="text" class="text input-small" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?>>
      <?php /*?><label for="email"><?php _e('Email (will not be published)', 'kraftives'); if ($req) _e(' (required)', 'kraftives'); ?></label><?php */?>
      <input placeholder="<?php _e('Email Address (will not be published)', 'kraftives'); if ($req) _e(' (required)', 'kraftives'); ?>" type="email" class="text input-small input-small-margin" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?>>
      <?php /*?><label for="url"><?php _e('Website', 'kraftives'); ?></label><?php */?>
      <input placeholder="<?php _e('Website Url', 'kraftives'); ?>" type="url" class="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3">
        <?php endif; ?>
      <?php /*?><label for="comment"><?php _e('Comment', 'kraftives'); ?></label><?php */?>
      <textarea name="comment" id="comment" class="input-xlarge" tabindex="4" placeholder="<?php _e('Message', 'kraftives'); ?>"></textarea>

      <p>
        <button name="submit" class="button" tabindex="5"><?php _e('Submit Now', 'kraftives'); ?>
        	<i class="fa fa-long-arrow-right"></i>
        </button>
      </p>
        <?php comment_id_fields(); ?>
        <?php do_action('comment_form', $post->ID); ?>
    </form>
      <?php endif; // if registration required and not logged in ?>
  </section><!-- /#respond -->
    <?php endif; ?>
