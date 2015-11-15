<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>

<?php
function mytheme_comment($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; ?>

<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<span><?php echo get_avatar($comment,$size='60',$default=get_template_directory_uri().'/images/gravatar.gif' ); ?></span><br />
            <div class="a_d">
			<cite><?php comment_author_link() ?></cite><br />
			<div class="date"><?php comment_date('M d, Y'); ?></div>
		</div>
        </div>

<div class="comment-text">
<?php if ($comment->comment_approved == '0') : ?>
<em class="awaiting_moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
<br />
<?php endif; ?>

<?php comment_text() ?>
<div class="comment-meta commentmetadata">
<?php edit_comment_link(__('(edit)'),' ','') ?>
</div>

<div class="reply">
<?php comment_reply_link(array_merge( $args, array('reply_text' => '(reply)', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
</div>

	</div>
</div>
<?php } ?>

<?php if ( have_comments() ) : ?>

<h3>
	<?php comments_number('No Comments', 'One Comment', '% Comments' ); ?>
</h3>

<ol class="commentlist">
	<?php //wp_list_comments('avatar_size=60'); ?>
	<?php wp_list_comments('callback=mytheme_comment'); ?>
</ol>

<div class="comms-navigation">
    <div style="float:left"><?php previous_comments_link() ?></div>
    <div style="float:right"><?php next_comments_link() ?></div>
</div>

<?php
else : // no comments so far

    if ('open' == $post->comment_status) :
        // If comments are open, but there are no comments.
    else :
        if ( is_single() ){ echo"<p>Comments are closed on this post.</p>"; }
    endif;

endif;

// Comment Form
if ('open' == $post->comment_status) : ?>

<div id="respond">
	<h3><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></h3>
    <div class="cancel-comment-reply">
        <?php cancel_comment_reply_link(); ?>
    </div>
    
	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
	<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>

    <?php else : ?>

   	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

	<?php if ( $user_ID ) : ?>
			
	<p class="logged">Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out</a></p>
			
	<?php else : ?>
			
	<p>
                    <label for="author">Input your name here</label>
                    <input type="text" class="textfield" name="author" id="author" value="<?php echo $comment_author; ?>" size="60"  />
                </p>
                <p>
                    <label for="email">And email address please</label>
                    <input type="text" class="textfield" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="60"  />
                </p>    
               <p> 
			<label for="url">Website URL</label>
	<input type="text" class="textfield" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="60" /></p>
			
	<?php endif; ?>
			
	<p>
                    <label for="comment">Send us a couple of words</label>
                    <textarea class="textarea" name="comment" id="comment"></textarea>
                </p>

	<input type="submit" class="comment sb" value="Submit Comment" /><?php comment_id_fields(); ?>
		    
	<?php do_action('comment_form', $post->ID); ?>
	
	</form>
	
<?php endif; // If registration required and not logged in ?>

</div><!--/respond-->

<?php endif; ?>