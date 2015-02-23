<?php
/**
 * The template for displaying Comments.
 *
 * @package WordPress
 * @subpackage Blendtec
 * @since Blendec 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
	return;
}
?>

<div id="comments" class="btblog--comments-area
<?php 
if (get_comments_number() < 1) {
	echo 'no-comments';
}
?>
">

	<?php // You can start editing here -- including this comment! ?>

	<?php if (have_comments()) : ?>
		<h2 class="btblog--comments-title">
			<?php
				printf( _n( '(1) Comment on &ldquo;%2$s&rdquo;', '(%1$s) Comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'blendtec' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<ul class="btblog--commentlist">
			<?php wp_list_comments( array( 'callback' => 'blendtec_comment', 'style' => 'ul') ); ?>
		</ul><!-- .commentlist -->

		<?php if (get_comment_pages_count() > 1 && get_option( 'page_comments' )) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="btblog--comment-navigation" role="navigation">
			<h1 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'blendtec' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'blendtec' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'blendtec' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

		<?php
		/* If there are no comments and comments are closed, let's leave a note.
		 * But we only want the note on posts and pages that had comments in the first place.
		 */
		if (! comments_open() && get_comments_number()) : ?>
		<p class="btblog--nocomments"><?php _e( 'Comments are closed.', 'blendtec' ); ?></p>
		<?php
		endif;
		?>

	<?php endif; // have_comments() ?>
</div>

<div class="btblog--comment-form">
	<?php
	blendtec_comment_form(
		array(
			'label_submit' => __( "Add Comment" ),
			'comment_notes_after' => '',
			'fields' => array(
				'author' =>
					'<div class="form-group"><label class="control-label" for="author">' . __('First Name', 'blendtec') . '</label> ' .
					( $req ? '<span class="required">*</span>' : '' ) .
					'<input class="form-control" id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author'] ) .
					'" size="30"' . $aria_req . ' /></p>',
				'email' =>
					'<div class="form-group"><label class="control-label" for="email">' . __( 'Email', 'blendtec' ) . '</label> ' .
					( $req ? '<span class="required">*</span>' : '' ) .
					'<input class="form-control" id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) .
					'" size="30"' . $aria_req . ' /></p>',
				'url' => ''
			),
			'comment_field' => 
				'<div class="form-group"><label class="control-label" for="comment">' . _x('Message', 'noun') . '</label> ' .
				( $req ? '<span class="required">*</span>' : '') .
				'<textarea  class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></div>'
		)
	);
	?>
</div>