<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to hepouf_comment() which is
 * located in the inc/template-tags.php file.
 *
 * @package aThemes
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

	<div class="separator-space"></div>

	<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h3 class="widget-title">
			<span>
			<?php printf( _nx( 'Un Commentaire', '%1$s Commentaires', get_comments_number(), 'comments title', 'athemes' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' ); ?>
			</span>
		</h3>

		<ol class="comment-list">
			<?php wp_list_comments( array( 'callback' => 'hepouf_comment', 'avatar_size' => 60 ) ); ?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'athemes' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'athemes' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
        <?php endif; // check for comment navigation ?>
	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :	?>
		<p class="no-comments"><?php _e( 'Les commentaires sont ferm&eacute;s.', 'athemes' ); ?></p>
	<?php endif; ?>

	<?php comment_form( array( 'comment_notes_after' => '<div class="form-allowed-tags">' . sprintf( __( 'Vous pouvez utiliser les 
<a title="Aide pour les balises" href="/a-propos/aides/#aide-balises" >balises</a> de mise en forme : %s' ), ' <code>' . allowed_tags() . '</code>' ) . '</div>' ) ); ?>

</div><!-- #comments -->