<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->
<div id="comments">
<?php if ( have_comments() ) : ?>
	
	
	<h2><?php comments_number(get_option('phi_trans_noresponses'),get_option('phi_trans_oneresponses'), '% '.get_option('phi_trans_responses')  );?> <?php echo get_option('phi_trans_to');?> &#8220;<?php the_title(); ?>&#8221;</h2>

	
	<ul class="commentlist">
	<?php wp_list_comments("callback=phi_comments"); ?>
	</ul>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
	
 <?php else : // this is displayed if there are no comments so far ?>

	
<?php endif; ?>

</div>
<?php if ( comments_open() ) : ?>

<div id="respond">

<h2><?php comment_form_title( get_option('phi_trans_leaveareply'), get_option('phi_trans_leaveareplyto') ); ?></h2>

<div class="cancel-comment-reply">
	<small><?php cancel_comment_reply_link(); ?></small>
</div>

<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p> <a href="<?php echo wp_login_url( get_permalink() ); ?>">You must be logged in to post a comment.<?php echo get_option('phi_trans_mustbeloggedin');?></a> </p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( is_user_logged_in() ) : ?>

<p><?php echo get_option('phi_trans_loggedinas').' '?><a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php echo get_option('phi_trans_logout');?>"><?php echo get_option('phi_trans_logout');?></a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php /*echo esc_attr($comment_author); */ echo attribute_escape($comment_author);?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="author"><small><?php echo get_option('phi_trans_name');?> <?php if ($req) echo get_option('phi_trans_required'); ?></small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo attribute_escape($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="email"><small><?php echo get_option('phi_trans_email'); echo get_option('phi_trans_notpublished'); if ($req) echo get_option('phi_trans_required'); ?></small></label></p>

<p><input type="text" name="url" id="url" value="<?php echo attribute_escape($comment_author_url); ?>" size="22" tabindex="3" />
<label for="url"><small><?php echo get_option('phi_trans_website');?></small></label></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

<p><textarea name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="<?php echo get_option('phi_trans_submitcomment');?>" />
<?php comment_id_fields(); ?>
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; // if you delete this the sky will fall on your head ?>
