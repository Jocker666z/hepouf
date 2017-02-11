<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package hepouf
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>

	<header class="entry-header">

<?php if(has_post_thumbnail()) :?>
	<div class="head-content-tumbnail"><?php the_post_thumbnail( 'thumbnail' ); ?></div>
<?php else :?>
<?php endif;?>

	<div class="head-content-title">
		<h2 class="entry-title">
			<?php if($post->post_parent) {
    			$parent = $wpdb->get_row("SELECT post_title FROM $wpdb->posts WHERE ID = $post->post_parent");
     			$parent_link = get_permalink($post->post_parent); ?>
     			<a href="<?php echo $parent_link; ?>"><?php echo $parent->post_title; ?></a>
			&rarr;<?php } ?>
			<?php the_title(); ?>
		</h2>

	<div class="entry-content-meta">
		<div class="entry-meta">
			<span>Dernière modification : <?php the_modified_author(); ?> le <?php the_modified_date('d/m/Y\ à G\hi'); ?></span>


		<?php if ( comments_open() ) : ?>
			<?php
			if (get_comments_number()==0) {
				echo sprintf(__('<span class="comments-link-entry-meta"><a href="%s">%s <i class="ico-comment"></i></a></span>','textdomain'),get_comments_link(),get_comments_number());
			} else {
				echo sprintf(__('<span class="have-comments-link-entry-meta"><a href="%s">%s <i class="ico-comment"></i></a></span>','textdomain'),get_comments_link(),get_comments_number());
}
			?>
	 		<?php else : // comments are closed ?>
			<!-- If comments are closed. -->
		<?php endif; ?>		
	</div>
	</div>
	</div>
	</header>

	<?php if ( (has_post_thumbnail()) && ( get_theme_mod( 'athemes_page_img' )) ) : ?>
		<div class="single-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>	
	<?php endif; ?>		

	<div class="clearfix entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'athemes' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->