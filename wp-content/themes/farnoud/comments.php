<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package farnoud
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
		<h4 class="comments-title sectionHeading semiSectionHeading">
			<?php
			$farnoud_comment_count = get_comments_number();
			if ( '1' === $farnoud_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'یک دیدگاه در &ldquo;%1$s&rdquo;', 'farnoud' ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf( 
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s دیدگاه در &ldquo;%2$s&rdquo;', '%1$s دیدگاه در &ldquo;%2$s&rdquo;', $farnoud_comment_count, 'comments title', 'farnoud' ) ),
					number_format_i18n( $farnoud_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
			?>
		</h4><!-- .comments-title -->

		<?php the_comments_navigation(); ?>
		<?php if(get_post_type()=='question'){ ?>
			<ul class="commentList">
				<?php wp_list_comments( 'type=comment&callback=farnoud_comment' ); ?>
			</ul>
		<?php }else{ ?>
			<ol class="comment-list">
				<?php
				wp_list_comments(
					array(
						'style'      => 'ol',
						'short_ping' => true,
					)
				);
				?>
			</ol><!-- .comment-list -->
		<?php } ?>

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'farnoud' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	comment_form();
	?>

</div><!-- #comments -->
