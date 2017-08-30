<?php	 	
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php	 	
		return;
	}
?>

<!-- start editing here. -->

<?php	 	 if ( have_comments() ) : ?>
<div id="comments-meta">
	<p><?php	 	 echo of_get_option('comments_list_text'); ?></p>
</div>

<div id="comments">
	<ol class="commentlist">
		<?php	 	 wp_list_comments('avatar_size=48'); ?>
	</ol>
	
	<?php	 	 if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav">
		<div class="nav-previous"><?php	 	 previous_comments_link( __( 'Older Comments' ) ); ?></div>
		<div class="nav-next"><?php	 	 next_comments_link( __( 'Newer Comments' ) ); ?></div>
	</nav>
	<?php	 	 endif; ?>
</div>

<?php	 	 else :?>

<?php	 	 if ( comments_open() ) : ?>

<div id="comments-meta">
	<p><?php	 	 echo of_get_option('comments_list_text'); ?></p>
</div>

<div id="comments">
	<ol class="commentlist">
		<?php	 	 wp_list_comments('avatar_size=48'); ?>
	</ol>
	
	<?php	 	 if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-above">
		<div class="nav-previous"><?php	 	 previous_comments_link( __( '&larr; Older Comments' ) ); ?></div>
		<div class="nav-next"><?php	 	 next_comments_link( __( 'Newer Comments &rarr;' ) ); ?></div>
	</nav>
	<?php	 	 endif; ?>
</div>

<?php	 	 else :?>

<!-- if comments are closed. -->

<?php	 	 endif; ?>
<?php	 	 endif; ?>

<?php	 	 if ( comments_open() ) : ?>

<?php	 	 comment_form(); ?>

<?php	 	 endif; ?>