                                <?php
/**
 * @package aThemes
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( '' ); ?>>
	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	<div class="border-h2"></div>
<div class="entry-thumbnail2">
	<div class="entry-back-ico-std">
		<?php comments_popup_link( __( '0', 'athemes' ), __( '1', 'athemes' ), __( '%', 'athemes' ) ); ?>

		<?php
		$the_cat        = get_the_category();
		$cat = get_the_category(); $cat = $cat[0];
		$category_name  = $the_cat[0]->cat_name;
		$category_link  = get_category_link( $the_cat[0]->cat_ID ); ?>
			<a class="ico-cat-list" href="<?php echo $category_link ?>" title="<?php echo $category_name ?>">
			<i class="ico-cat-<?php echo $cat->slug; ?>"></i> 
			</a>
		<?php
		$the_cat        = get_the_category();
		$cat = get_the_category(); $cat = $cat[1];
		$category_name  = $the_cat[1]->cat_name;
		$category_link  = get_category_link( $the_cat[1]->cat_ID ); ?>
			<a class="ico-cat-list" href="<?php echo $category_link ?>" title="<?php echo $category_name ?>">
			<i class="ico-cat-<?php echo $cat->slug; ?>"></i> 
			</a>
		<?php
		$the_cat        = get_the_category();
		$cat = get_the_category(); $cat = $cat[2];
		$category_name  = $the_cat[2]->cat_name;
		$category_link  = get_category_link( $the_cat[2]->cat_ID ); ?>
			<a class="ico-cat-list" href="<?php echo $category_link ?>" title="<?php echo $category_name ?>">
			<i class="ico-cat-<?php echo $cat->slug; ?>"></i> 
			</a>
		</a>
		<?php
		$the_cat        = get_the_category();
		$cat = get_the_category(); $cat = $cat[3];
		$category_name  = $the_cat[3]->cat_name;
		$category_link  = get_category_link( $the_cat[3]->cat_ID ); ?>
			<a class="ico-cat-list" href="<?php echo $category_link ?>" title="<?php echo $category_name ?>">
			<i class="ico-cat-<?php echo $cat->slug; ?>"></i> 
			</a>
		</a>
	</div>
<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail( 'thumbnail' ); ?></a>
</div>
		<?php if ( 'post' == get_post_type() ) : ?>
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
			<?php endif; ?>
		<!-- .entry-meta --></div>
	<!-- .entry-header --></header>

		<div class="entry-content">
			<?php the_content( __( 'athemes' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'athemes' ), 'after' => '</div>' ) ); ?>
		</div>

<!-- #post-<?php the_ID(); ?>--></article>
