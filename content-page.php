<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package aThemes
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
	<header class="entry-header">
		<h2 class="entry-title">
			<?php if($post->post_parent) {
    			$parent = $wpdb->get_row("SELECT post_title FROM $wpdb->posts WHERE ID = $post->post_parent");
     			$parent_link = get_permalink($post->post_parent); ?>
     			<a href="<?php echo $parent_link; ?>"><?php echo $parent->post_title; ?></a>
			&rarr;<?php } ?>
			<?php the_title(); ?>
		</h2>
		<div class="border-h2"></div>
		<div class="entry-meta">Dernière modification : Le <?php the_modified_date('j F, Y'); ?></div>
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