<?php
/**
 * Hepouf custom functions
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 * If remove, break the main menu
 */
function hepouf_page_menu_args( $args ) {
	$args['show_home'] = true;
	$args['menu_class'] = 'clearfix sf-menu';
	return $args;
}
add_filter( 'wp_page_menu_args', 'hepouf_page_menu_args' );

/**
 * Filters wp_title to print a neat <title> tag on tab view of browser
 */
function tab_wp_title( $title, $sep ) {
	global $page, $paged;

	if ( is_feed() )
		return $title;

	// Add the blog name
	$title .= get_bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $sep $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $sep " . sprintf( __( 'Page %s', 'athemes' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'tab_wp_title', 10, 2 );

/**
 * Number of view by zone
 */
add_filter( 'pre_get_posts', 'quantity_per_view' );
function quantity_per_view( $wp_query = '' ) {
	if ( is_search() ) { // recherche
		$wp_query->query_vars['posts_per_page'] = 17;
	} elseif ( is_category() ) { // Category
		$wp_query->query_vars['posts_per_page'] = 17;
	} elseif ( is_tag() ) { // Tag
		$wp_query->query_vars['posts_per_page'] = 17;
	} elseif ( is_author() ) { // Auteur
		$wp_query->query_vars['posts_per_page'] = 17;
	} elseif ( is_date() ) { // Archive
		$wp_query->query_vars['posts_per_page'] = 17;
	}
	return $wp_query;
}

/**
 * Set width content
 */
if ( ! isset( $content_width ) )
    $content_width = 660;
function adjust_content_width() {
    global $content_width;
	if (has_post_format('video')) 
        $content_width = 960;
}
add_action( 'template_redirect', 'adjust_content_width' );

/**
 * excerpt
 */
function more_customlink() {
    return '...<a class="more-link" href="' . get_permalink() . '" rel="nofollow">Lire la suite &rarr;</a>';
}
add_filter( 'the_content_more_link', 'more_customlink' );

/**
 * Remove WordPress's default padding on images with captions
 *
 * @param int $width Default WP .wp-caption width (image width + 10px)
 * @return int Updated width to remove 10px padding
 */
function remove_caption_padding( $width ) {
	return $width - 10;
}
add_filter( 'img_caption_shortcode_width', 'remove_caption_padding' );

/**
 * Comment count by user
 */
function commentCount() {
    global $wpdb;
    $count = $wpdb->get_var('SELECT COUNT(comment_ID) FROM ' . $wpdb->comments. ' WHERE comment_author_email = "' . get_comment_author_email() . '"');
    echo $count . ' messages';
}

/**
 * Allowed tags array and hook into WP comments
 */
function list_of_allowed_tags_comments() {
  define('custom_tags', true);
  global $allowedtags;
  $allowedtags = array(
      'em' => array(),
      'strong' => array(),
      'u' => array(),
      'blockquote' => array(),
      'pre' => array(),
      'code' => array()
  );
}
add_action('init', 'list_of_allowed_tags_comments', 10);

/**
 * Limit lettering in comments
 */
add_filter( 'preprocess_comment', 'lp_preprocess_comment' );
function lp_preprocess_comment($comment) {
    if ( strlen( $comment['comment_content'] ) > 5000 ) {
        wp_die('Votre commentaire est trop long. La limite est de 5000 caract&egrave;res.');
    }
if ( strlen( $comment['comment_content'] ) < 4 ) {
        wp_die('Votre commentaire est trop court. La limite est de 4 caract&egrave;res.');
    }
    return $comment;
}

/**
 * Shortcodes for os support
 */
function lp_os_support_linux( ) {
   $shortos = "<i class='ico-os-gnu-linux'></i>";
   return $shortos;
}
add_shortcode( 'oslinux', 'lp_os_support_linux' );

function lp_os_support_win( ) {
   $shortos = "<i class='ico-os-win'></i>";
   return $shortos;
}
add_shortcode( 'oswin', 'lp_os_support_win' );

function lp_os_support_osx( ) {
   $shortos = "<i class='ico-os-osx'></i>";
   return $shortos;
}
add_shortcode( 'ososx', 'lp_os_support_osx' );

function lp_os_support_android( ) {
   $shortos = "<i class='ico-os-android'></i>";
   return $shortos;
}
add_shortcode( 'osandroid', 'lp_os_support_android' );

/**
 * Limit size of title
 */
function max_title_length( $title ) {
$max = 55;
if( strlen( $title ) > $max ) { return substr( $title, 0, $max ). " &hellip;";}
else { return $title; }
}
add_filter( 'the_title', 'max_title_length');

/**
 * Move comment field to bottom
 */
function move_comment_field_to_bottom( $fields ) {
$comment_field = $fields['comment'];
unset( $fields['comment'] );
$fields['comment'] = $comment_field;
return $fields;
}
add_filter( 'comment_form_fields', 'move_comment_field_to_bottom' );

/**
 * Clean not use emoji call 
 */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

/**
 * Fix <pre>
 */
function smart_code_escape_pre( $data ) {
	preg_match('@(<code.*>)(.*)(<\/code>)@isU', $data[2], $matches );
	if( !empty( $matches ) ) {
		return $data[1] . $matches[1] . str_replace( array( '&', '<', '>' ), array( '&amp;', '&lt;', '&gt;' ), $matches[2] ) . $matches[3] . $data[3];
	}
	else {
		return $data[1] . str_replace( array( '&', '<', '>' ), array( '&amp;', '&lt;', '&gt;' ), $data[2] ) . $data[3];
	}
}
add_filter( 'the_content', 'smart_code_escape_content', 9 );
function smart_code_escape_content( $content ) {
	$content = preg_replace_callback('@(<pre.*>)(.*)(<\/pre>)@isU', 'smart_code_escape_pre', $content );
	return $content;
}

/**
 * Change default quality of img
 */
add_filter('jpeg_quality', function($arg){return 96;});