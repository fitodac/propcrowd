<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-wrapper">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<!--
		<h2 class="comments-title">
			<?php 
			// $comments_number = get_comments_number();
			// if ( '1' === $comments_number ) {
				/* translators: %s: post title */
				// printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'twentyseventeen' ), get_the_title() );
			// } else {
				// printf(
					/* translators: 1: number of comments, 2: post title */
					// _nx(
						// '%1$s Reply to &ldquo;%2$s&rdquo;',
						// '%1$s Replies to &ldquo;%2$s&rdquo;',
						// $comments_number,
						// 'comments title',
						// 'twentyseventeen'
					// ),
					// number_format_i18n( $comments_number ),
					// get_the_title()
				// );
			//}
			?>
		</h2>
		-->

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'avatar_size' => 100,
					'style'       => 'ol',
					'short_ping'  => true,
					'reply_text'  => 'Reply',
				) );
			?>
		</ol>

		<?php the_comments_pagination( array(
			'prev_text' => '<span class="screen-reader-text">' . __( 'Previous', 'twentyseventeen' ) . '</span>',
			'next_text' => '<span class="screen-reader-text">' . __( 'Next', 'twentyseventeen' ) . '</span>',
		) );

	endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php _e( 'Comments are closed.', 'twentyseventeen' ); ?></p>
	<?php
	endif;





	$args = array(
		'fields' => apply_filters(
			'comment_form_default_fields', array(
				'author' => 
				'<div class="form-group">
					<label for="author">Nombre '. ( $req ? '<span class="required">*</span>' : '' ) .'</label>
					<input id="author" placeholder="" name="author" type="text" value="'.
						esc_attr( $commenter['comment_author'] ) .'" size="30"' . $aria_req . ' class="form-control" />
				</div>',
				
				'email' => 
				'<div class="form-group">
					<label for="email">Email '. ( $req ? '<span class="required">*</span>' : '' ) .'</label>
					<input id="email" placeholder="" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
						'" size="30"' . $aria_req . ' class="form-control" />
				</div>',

				'captcha' => 
				'<div class="form-group">
					<div class="g-recaptcha" data-sitekey="6LfpgHYUAAAAAO_6L4hI32WL2qCIW2ZOR4CuFyVH"></div>
				</div>',
				
			)
		),
		'comment_field' => 
		'<div class="form-group">' .
			'<label for="comment">Comentario</label>' .
			'<textarea id="comment" name="comment" placeholder="" cols="45" rows="6" aria-required="true" class="form-control"></textarea>' .
		'</div>',

		'comment_notes_before' => '',

		'comment_notes_after' => '',
		
		'submit_button' => '<input name="%1$s" type="submit" id="%2$s" class="btn btn-primary" value="PUBLICAR" />',

		'title_reply' => '<header><h5>Publicar un comentario</h5></header>'
	);



	comment_form($args);
	?>

</div><!-- #comments -->
