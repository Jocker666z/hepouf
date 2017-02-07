<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package aThemes
 */
?>
<div id="widget-area-2" class="site-sidebar widget-area" role="complementary">

	<?php if ( ! dynamic_sidebar( 'top-sidebar' ) ) : ?><?php endif; ?>

			<div class="widget">
				<div class="sidebar-search"><?php get_search_form(); ?></div>
			</div>

<div class="sidebar-entry">
	<?php query_posts('category_name=test,tuto,dossiers&showposts=3');
	while (have_posts()) : the_post();
	  // do whatever you want
	?>
		<div class="sidebar-thumbnail">
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail( 'thumbnail' ); ?></a>
		<div class="sidebar-thumbnail-title">
		<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		</div>
		</div>

	<?php
	endwhile;
	?>

	<?php query_posts('cat=10,-12,-635,-767&showposts=3');
	while (have_posts()) : the_post();
	  // do whatever you want
	?>
		<div class="sidebar-thumbnail">
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail( 'thumbnail' ); ?></a>
		<div class="sidebar-thumbnail-title">
		<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		</div>
		</div>

	<?php
	endwhile;
	?>
</div>
<div class="sidebar-bottom-link"><a href="/category/lepouf/" title="Voir les cat&eacute;gories mises en avant">Retrouver les choses mises en avant</a></div>

<aside class="widget">
<h3 class="widget-title"><span>&Agrave; l'&eacute;coute</span></h3>
<div class="sidebar-entry-music">
	<?php query_posts('cat=447&showposts=3');
	while (have_posts()) : the_post();
	  // do whatever you want
	?>
		<div class="sidebar-thumbnail-music">
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail( 'thumbnail' ); ?></a><div class="centre-cd"></div>
		<div class="sidebar-thumbnail-title-music">
		<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		</div>
		</div>

	<?php
	endwhile;
	?>
</div>
<div class="sidebar-bottom-link"><a href="/category/musique/" title="Voir la cat&eacute;gorie musique">Retrouver toute la musique</a></div>
</aside>

	<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?><?php endif; ?>
<div class="sidebar-bottom-link"><a href="/contact/" title="Proposer votre lien">Proposer votre lien</a></div>
<!-- #widget-area-2 --></div>
