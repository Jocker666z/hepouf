<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package aThemes
 */
?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php _e( 'Pas de resultat', 'athemes' ); ?></h1>
	<!-- .page-header --></header>

	<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'athemes' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p  style="text-align:center"><b><?php _e( 'Essaye autre chose, manant!', 'athemes' ); ?></b></p>

		<?php else : ?>

			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'athemes' ); ?></p>

		<?php endif; ?>
	<!-- .page-content --></div>
<!-- .no-results --></section>
