<?php
/**
 * The template for displaying Archive pages.
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

		<?php if ( have_posts() ) : ?>

	<!-- start.page-header -->

			<header class="page-header">
				<h1 class="page-title">
					<?php
						if ( is_category() ) :
							single_cat_title();
							{
							  $category = get_category( get_query_var('cat') );
							  if ( ! empty( $category ) )
							    echo '<span><a href="' . get_category_feed_link( $category->cat_ID ) . '" title="' . sprintf( __( 'Suivre le fil de la catégorie : %1$s', 'appthemes' ), $category->name ) . '" rel="nofollow"><i class="ico-rss"></i></a></span>';
							}
							rewind_posts();	endif; ?>
				</h1>
            </header>

	<!-- end.page-header -->

	<!-- start.page-content-->
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

		<div class="board-content">

			<div class="board-block-title">				
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>		
				<div class="entry-meta">
                    Proposé par <i><?php the_author_posts_link(); ?> </i> le <?php the_time(' d/m/Y\ '); ?>
				</div>
            </div>
            
			<?php the_content( __( 'athemes' ) ); ?>
            
<div class="share-links">
		<span class="share-links-ico">
                <a style="margin-right:7px" target="_blank" title="Envoyer par mail" href="mailto:?subject=<?php the_title_attribute(); ?>&body=<?php the_permalink(); ?>" rel="nofollow"><i class="ico-mail"></i></a>
                <a target="_blank" title="Twitter" href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title_attribute(); ?>" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=260,width=700');return false;"><i class="ico-twitter"></i></a>
                <a target="_blank" title="Facebook" href="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&t=<?php the_title_attribute(); ?>" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=700');return false;"><i class="ico-facebook"></i></a> 				
                <a target="_blank" title="Google +" href="https://plus.google.com/share?url=<?php the_permalink(); ?>&hl=fr" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=450,width=650');return false;"><i class="ico-gplus"></i></a>
                <a target="_blank" title="Reddit" href="http://reddit.com/submit?url=<?php the_permalink(); ?>" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=750,width=550');return false;"><i class="ico-reddit"></i></a>
</span>

<span class="board-comments-link">
	<i class="ico-comment"></i><?php echo sprintf(__('<a href="%s">%s Commentaire(s)</a>', 'textdomain'), get_comments_link(),get_comments_number()); ?>
<span>
            </div>  
            
        <!-- end.page-content-->

		<?php endwhile; ?>
			<?php hepouf_content_nav( 'nav-below' ); ?>
		<?php else : ?>
			<?php get_template_part( 'no-results', 'archive' ); ?>
		<?php endif; ?>

		</div>
	</section>
        
<?php get_footer(); ?>