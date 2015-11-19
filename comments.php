<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
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

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'latte' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-above" class="navigation comment-navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'latte' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'latte' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'latte' ) ); ?></div>

			</div>
		</nav>
		<?php endif; ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'	   => 'ol',
					'short_ping'  => true,
					'callback'	=> 'latte_comment',
					'avatar_size' => 60
				) );
			?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-below" class="navigation comment-navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'latte' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'latte' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'latte' ) ); ?></div>

			</div>
		</nav>
		<?php endif; ?>

	<?php endif; ?>

	<?php
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'latte' ); ?></p>
	<?php endif; ?>

	<?php 
		
		$fields =  array(
			'author' => '<p class="comment-form-author"><input class="form-control" id="author" name="author" type="text" placeholder="' . __( 'Name', 'latte' ) . ' ' . ( $req ? "*" : '' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"/></p>',
			'email' => '<p class="comment-form-email"><input class="form-control" id="email" name="email" type="text" placeholder="' . __( 'Email', 'latte' ) . ' ' . ( $req ? "*" : '' ) . '" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"/></p>',
			'url' => '<p class="comment-form-url"><input class="form-control" id="url" name="url" type="text" placeholder="' . __( 'Website', 'latte' ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
		);

		$comment_args = array(
			'comment_field' =>  '<p class="comment-form-comment"><textarea class="form-control" id="comment" name="comment" cols="45" rows="8" placeholder="' . __( 'Comment', 'latte' ) . '" aria-required="true">' .
			'</textarea></p>',
			'fields' => apply_filters( 'comment_form_default_fields', $fields ),
		);
		
		comment_form($comment_args); 

	?>
</div>