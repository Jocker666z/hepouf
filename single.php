<?php
/**
 * The Template for displaying all single posts.
 *
 * @package hepouf
 */

get_header();
?>
<?php if (has_post_format('video')) : ?> 
	<div id="primary" class="content-area">
		<div id="content" class="site-content-video" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?></div>



<div id="content" class="site-content-bottom" role="main">
<footer>
<div class="entry-meta entry-footer">
</div>
	<!-- .entry-meta --></footer>

			<div class="charelinks">
			<a style="margin-right:15px" target="_blank" title="Envoyer par mail" href="mailto:?subject=<?php the_title_attribute(); ?>&body=<?php the_permalink(); ?>" rel="nofollow"><i class="ico-mail"></i></a>
			<a target="_blank" title="Twitter" href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title_attribute(); ?>" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=260,width=700');return false;"><i class="ico-twittor"></i></a>
			<a target="_blank" title="Fessebook" href="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&t=<?php the_title_attribute(); ?>" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=700');return false;"><i class="ico-fessebook"></i></a> 				
			<a target="_blank" title="Google +" href="https://plus.google.com/share?url=<?php the_permalink(); ?>&hl=fr" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=450,width=650');return false;"><i class="ico-gplus"></i></a>
			<a target="_blank" title="Reddit" href="http://reddit.com/submit?url=<?php the_permalink(); ?>" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=750,width=550');return false;"><i class="ico-reddit"></i></a>
				</div>
        
		<div class="charepost "><?php wp_related_posts()?></div>

			<?php hepouf_content_nav( 'nav-below' ); ?>
			
			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() )
					comments_template();
			?>

		<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->

	</div><!-- #primary -->
			<?php get_footer(); ?>

<?php else : ?>
	
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?></div>

	<div id="content" class="site-content" role="main">
<footer>
<div class="entry-meta entry-footer">
</div>

	<!-- .entry-meta --></footer>

			<div class="charelinks">
			<a style="margin-right:15px" target="_blank" title="Envoyer par mail" href="mailto:?subject=<?php the_title_attribute(); ?>&body=<?php the_permalink(); ?>" rel="nofollow"><i class="ico-mail"></i></a>
			<a target="_blank" title="Twitter" href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title_attribute(); ?>" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=260,width=700');return false;"><i class="ico-twittor"></i></a>
			<a target="_blank" title="Fessebook" href="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&t=<?php the_title_attribute(); ?>" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=700');return false;"><i class="ico-fessebook"></i></a> 				
			<a target="_blank" title="Google +" href="https://plus.google.com/share?url=<?php the_permalink(); ?>&hl=fr" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=450,width=650');return false;"><i class="ico-gplus"></i></a>
			<a target="_blank" title="Reddit" href="http://reddit.com/submit?url=<?php the_permalink(); ?>" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=750,width=550');return false;"><i class="ico-reddit"></i></a>
				</div>

		<div class="charepost">
			<?php wp_related_posts()?>
        </div>

			<?php hepouf_content_nav( 'nav-below' ); ?>
			
			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() )
					comments_template();
			?>

		<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
			<?php get_sidebar(); ?>
			<?php get_footer(); ?>
<?php endif; ?>