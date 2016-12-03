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

			<div class="list-block-thumb">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail( 'thumbnail' ); ?></a>
			</div>	

			<div class="list-block-title">				
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			
				<div class="entry-meta">
					<i class="ico-user"></i><?php the_author_posts_link(); ?>
					<span class="cat-links">
					<i class="ico-calendar"></i><?php the_time('d/m/Y\, G\:i'); ?> 
					</span>
					<span class="comments-link"><i class="ico-comment"></i>	
						<?php echo sprintf(__('<a href="%s">%s Commentaire(s)</a>', 'textdomain'), get_comments_link(),get_comments_number()); ?>
					</span>
				</div>

				<div class="entry-meta">
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
				</div>
            </div>	
			<?php the_content( __( 'athemes' ) ); ?>

		<div id='comment-board'><?php $withcomments = "1"; comments_template(); // Get wp-comments.php template ?></div>
			<input type='button' id='hideshow' value='hide/show'>
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

<script type="text/javascript">
<!--
jQuery(document).ready(function(){
        jQuery('#hideshow').on('click', function(event) {        
             jQuery('#comment-board').toggle('show');
        });
    });
//-->
</script>