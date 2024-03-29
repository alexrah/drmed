<?php
/**
 * @package WordPress
 * @subpackage Energetic
 */

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e( 'This post is password protected. Enter the password to view comments.','THEME_FRONT_SITE');?></p>
	<?php
		return;
	}
?>
<!-- You can start editing here. -->

	<?php if ( have_comments() ) : ?>
	<div id="comments"><!--start:comments -->
		<h3 id="comments-title">
			<?php
				printf( _n( '1 Comment', '%1$s Comments', get_comments_number(), 'THEME_FRONT_SITE' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h3>

		<ol class="commentlist">
			<?php wp_list_comments('type=comment&callback=atp_custom_comment'); ?>
		</ol>
	</div>
	<!--end:comments -->
			
	<!--start:navigation -->
	<div class="pagination">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
	<!--end:navigation -->

	<?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
	<!-- If comments are open, but there are no comments. -->
		
	 <?php else : // comments are closed ?>	

	<!-- If comments are closed. -->
		
	<?php endif; ?>
	<?php endif; ?>
	
	<?php if ('open' == $post->comment_status) : ?>
	
	<!--start:repond -->
	<div id="respond">
		<div class="cancel-comment-reply">
			<small><?php cancel_comment_reply_link(); ?></small>
		</div>
		
		<h3><?php comment_form_title( __('Leave a Reply','THEME_FRONT_SITE'), __('Leave a Reply to %s','THEME_FRONT_SITE') ); ?></h3>

		<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
		<p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment','THEME_FRONT_SITE'),wp_login_url( get_permalink() )); ?></p>
	
		</div><!-- not logged in users-->
		<?php else : ?>
				
		<!--start:form -->
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
		<?php if ( $user_ID ) : ?>
			<p><?php printf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>','THEME_FRONT_SITE'), admin_url( 'profile.php' ), $user_identity, wp_logout_url( get_permalink()  ) )?></p>
			<?php else : ?>
			<p class="comment-form-author">
				<label for="author"><?php _e('Name','THEME_FRONT_SITE');?></label><?php if ($req) echo '<span class="required">*</span>'; ?>
				<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1">
			</p>
			<p class="comment-form-email">
				<label for="email"><?php _e('Mail','THEME_FRONT_SITE'); ?></label><?php if ($req) echo '<span class="required">*</span>'; ?>
				<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2">
			</p>
			<p class="comment-form-url">
				<label for="url"><?php _e('Website','THEME_FRONT_SITE'); ?></label>
				<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3">
			</p>

			<?php endif; ?>

			<p class="comment-form-comment"><label for="comment"><?php echo _e( 'Comment', 'THEME_FRONT_SITE' );?></label>
				<textarea name="comment" id="comment" cols="10" rows="10" tabindex="4"></textarea>
			</p>

			<div class="indent">
				<p class="form-submit"><a class="button gray medium" href="#" onclick="jQuery('#commentform').submit();return false;"><span><?php _e('Submit','THEME_FRONT_SITE');?></span></a></p>
				<?php comment_id_fields(); ?>
				<?php do_action('comment_form', $post->ID); ?>
			</div>
		</form>
		<!--end:form -->
	</div>
	<!--end:repond-->
	<?php endif; // If registration required and not logged in ?>
	<?php endif; // if you delete this the sky will fall on your head ?>