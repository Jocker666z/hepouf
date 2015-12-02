<?php
/**
 * @package aThemes
 */
?>
<?php if (has_post_format('video')) : ?> 
<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>

	<header class="entry-header">
		<h2 class="entry-title"><?php the_title(); ?></h2>
	<div class="border-h2"></div>
		<div class="entry-meta">
			<i class="ico-user"></i><?php the_author_posts_link(); ?>
			<span class="cat-links">
			<i class="ico-calendar"></i><?php the_time('d/m/Y\, G\:i'); ?> 	
			<?php
				$tags_list = get_the_tag_list( '', __( ', ', 'athemes' ) );
				if ( $tags_list ) :
			?>
			<span class="tags-links">
				<?php printf( __( '<i class="ico-tags"></i>%1$s', 'athemes' ), $tags_list ); ?>
			</span>
			<?php endif; ?>
		<!-- .entry-meta --></div>

	<!-- .entry-header --></header>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'athemes' ),
				'after'  => '</div>',
			) );
		?>
	<!-- .entry-content --></div>

<!-- #post-<?php the_ID(); ?> -->
<?php else : ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>

	<header class="entry-header">
		<h2 class="entry-title"><?php the_title(); ?></h2>
	<div class="border-h2"></div>
		<div class="entry-meta">
			<i class="ico-user"></i><?php the_author_posts_link(); ?>
			<span class="cat-links">
			<i class="ico-calendar"></i><?php the_time('d/m/Y\, G\:i'); ?> 
			<?php
				$tags_list = get_the_tag_list( '', __( ', ', 'athemes' ) );
				if ( $tags_list ) :
			?>
				<?php printf( __( '<i class="ico-tags"></i>%1$s', 'athemes' ), $tags_list ); ?>
			</span>
			<?php endif; ?>
		<!-- .entry-meta --></div>

	<!-- .entry-header --></header>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'athemes' ),
				'after'  => '</div>',
			) );
		?>
	<!-- .entry-content --></div>
<!-- #post-<?php the_ID(); ?> -->
                            <?php endif; ?>
</article>
