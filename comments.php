<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mudra
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

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$mudra_comments_number = get_comments_number();
			if ( '1' === $mudra_comments_number ) {
				printf(
					/* translators: %s: post title */
					esc_html_x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'mudra' ),
					'<span>' . esc_html( get_the_title() ) . '</span>'
				);
			} else {
				printf(
					/* translators: 1: number of comments, 2: post title */
					esc_html( _nx(
						'%1$s Reply to &ldquo;%2$s&rdquo;',
						'%1$s Replies to &ldquo;%2$s&rdquo;',
						$mudra_comments_number,
						'comments title',
						'mudra'
					) ),
					number_format_i18n( $mudra_comments_number ),
					'<span>' . esc_html( get_the_title() ) . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'max_depth'  => 5,
				'style'      => 'ol',
				'short_ping' => true,
				'reply_text' => __( 'Reply', 'mudra' ),
			) );
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_pagination( array(
			'prev_text' => '<span class="screen-reader-text">' . __( 'Previous', 'mudra' ) . '</span>',
			'next_text' => '<span class="screen-reader-text">' . __( 'Next', 'mudra' ) . '</span>',
		) );

	endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'mudra' ); ?></p>
		<?php
	endif;

	comment_form();
	?>

</div><!-- #comments -->
