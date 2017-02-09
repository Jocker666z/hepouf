<?php
/**
 * @package aThemes
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>

	<header class="entry-header">
		
<?php if(has_post_thumbnail()) :?>
	<div class="head-content-tumbnail"><?php the_post_thumbnail( 'thumbnail' ); ?></div>
<?php else :?>
<?php endif;?>

	<div class="head-content-title">
	<h2 class="entry-title"><?php the_title(); ?></h2>

	<div class="entry-content-meta">
		<div class="entry-meta">
			<i class="ico-user"></i><?php the_author_posts_link(); ?>
			<span class="calendar-meta"><i class="ico-calendar"></i><?php the_time('d/m/Y\ à G\:i'); ?></span>

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

			</br>

		<?php if ( 'post' == get_post_type() ) : ?>
			<?php
				$categories_list = get_the_category_list( __( ', ', 'athemes' ) );
				if ( $categories_list && athemes_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( '<i class="ico-folder"></i>%1$s', 'athemes' ), $categories_list ); ?>
			</span>
			<?php endif; ?>
		<?php endif; ?>
			</br>

			<?php
				$tags_list = get_the_tag_list( '', __( ', ', 'athemes' ) );
				if ( $tags_list ) :
			?>
				<?php printf( __( '<i class="ico-tags"></i>%1$s', 'athemes' ), $tags_list ); ?>

			<?php endif; ?>
	</div>
	</div>

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

</article>