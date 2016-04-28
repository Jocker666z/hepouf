<?php
/**
 * Custom template tags for this theme.
 */

/**
 * Display navigation to next/previous pages when applicable
 */
if ( ! function_exists( 'hepouf_content_nav' ) ) :
function hepouf_content_nav( $nav_id ) {
	global $wp_query, $post;

	// Don't print empty markup on single pages if there's nowhere to navigate.
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous )
			return;
	}

	// Don't print empty markup in archives if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return;

	$nav_class = ( is_single() ) ? 'post-navigation' : 'paging-navigation';

	?>
	<nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo $nav_class; ?>">

	<?php if ( is_single() ) : // navigation links for single posts ?>

		<?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '<i class="ico-left-open"></i>', 'Previous post link', 'athemes' ) . '</span> %title' ); ?>
		<?php next_post_link( '<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x( '<i class="ico-right-open"></i>', 'Next post link', 'athemes' ) . '</span>' ); ?>

	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

<?php wp_pagenavi(); ?>

	<?php endif; ?>

	</nav><!-- #<?php echo esc_html( $nav_id ); ?> -->
	<?php
}
endif; // hepouf_content_nav

/**
 * Template for comments 
 * It recommended to desactive pingbacks
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
if ( ! function_exists( 'hepouf_comment' ) ) :
function hepouf_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;

	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php _e( 'Pingback :', 'athemes' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'athemes' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			<footer class="clearfix comment-meta">
                        
				<div class="reply-bar"></div>
            
				<div class="clearfix comment-author vcard">
					<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>

					<div class="comment-metadata">
						<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
							<time><?php comment_date('d/m/Y, G\:i'); ?></time>
						</a>
					</div><!-- .comment-metadata -->

					<?php printf( __( '%s', 'athemes' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>

					<span class="comment-level">
						<?php
							$user_info = get_userdata($comment->user_id);
							if ( $user_info->display_name == Jocker ) {echo('Papi' . "\n");}
							elseif ( $user_info->display_name == Shibo ) {echo('D&eacute;tective chiens et chats' . "\n");}
							elseif ( $user_info->display_name == Nath ) {echo('Graphistologue' . "\n");}
							elseif ( $user_info->display_name == Manu ) {echo('Pierre Tchernia of the space' . "\n");}
							elseif ( $user_info->display_name == Loo ) {echo('Maitre de guerre' . "\n");}
						?> 
					</br>
					<span class="comment-count"><?php commentCount(); ?></span>	
					</span><!-- .comment-count-and-role -->

				</div><!-- .comment-author -->

				<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Votre commentaire est en attente de mod&eacute;ration.', 'athemes' ); ?></p>
				<?php endif; ?>
			</footer><!-- .comment-meta -->

			<div class="comment-content">
				<?php comment_text(); ?>
                <div class="reply">
					<?php edit_comment_link('Editer', '', '</br>'); ?>
				</div><!-- .reply -->
			</div><!-- .comment-content -->
		</article><!-- .comment-body -->

	<?php
	endif;
}
endif; // ends check for hepouf_comment()

/**
 * Prints the attached image with a link to the next attached image.
 * Remove this, break the attached image
 */
if ( ! function_exists( 'hepouf_the_attached_image' ) ) :
function hepouf_the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters( 'athemes_attachment_size', array( 1200, 1200 ) );
	$next_attachment_url = wp_get_attachment_url();

	/**
	 * Grab the IDs of all the image attachments in a gallery so we can get the
	 * URL of the next adjacent image in a gallery, or the first image (if
	 * we're looking at the last image in a gallery), or, in a gallery of one,
	 * just the link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
		esc_url( $next_attachment_url ),
		the_title_attribute( array( 'echo' => false ) ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category
 * Remove this, partialy break the theme
 */
function athemes_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so athemes_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so athemes_categorized_blog should return false
		return false;
	}
}