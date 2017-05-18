<?php
/**
 * The template for displaying Archive pages.
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
						if ( is_category() ) :
							single_cat_title();
							{
							  $category = get_category( get_query_var('cat') );
							  if ( ! empty( $category ) )
							    echo '<span><a href="' . get_category_feed_link( $category->cat_ID ) . '" title="' . sprintf( __( 'Suivre le fil de la catégorie : %1$s', 'appthemes' ), $category->name ) . '" rel="nofollow"><i class="ico-feed"></i></a></span>';
							}
							
						elseif ( is_tag() ) :
							single_tag_title();
							{
							$theID           = intval(get_query_var('tag_id'));
							$rss_link        = get_tag_feed_link($theID);
							$rss_description = 'Suivre le fil du tag : ' .single_tag_title("", false);
							if ( ! empty( $theID ) )
							    echo '<span><a href="' . $rss_link . '" title="' . $rss_description . '" rel="nofollow"><i class="ico-feed"></i></a></span>';
							}
							
						elseif ( is_author() ) :
							{
							$author          = (isset($_GET['author_name'])) ? get_userdatabylogin($author_name) : get_userdata(intval($author));
							$author_title    = 'Les articles de ' . $author->nickname;
							$rss_link        = get_author_feed_link($author->ID);
							$rss_description = 'Suivre le fil de ' . $author->nickname;
							if ( ! empty( $author ) )
							echo '' . $author_title . '<span><a href="' . $rss_link . '" title="' . $rss_description . '" rel="nofollow"><i class="ico-feed"></i></a></span>';
							}
							rewind_posts();

						elseif ( is_day() ) :
							printf( __( 'Jour : %s', 'athemes' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Mois : %s', 'athemes' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Année : %s', 'athemes' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'athemes' );

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'athemes');

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'athemes' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'athemes' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'athemes' );

						else :
							_e( 'Archives', 'athemes' );

						endif;
					?>
				</h1>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			<!-- .page-header -->
</header>
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>



		<div class="list-block">
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
				
		</div>
		<?php endwhile; ?>
			<?php hepouf_content_nav( 'nav-below' ); ?>
		<?php else : ?>
			<?php get_template_part( 'no-results', 'archive' ); ?>
		<?php endif; ?>

		<!-- #content --></div>
	<!-- #primary --></section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
