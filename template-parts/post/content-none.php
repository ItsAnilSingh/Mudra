<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mudra
 */

?>

<section class="no-results not-found">
	<header class="entry-header">
		<h1 class="entry-title" itemprop="headline"><?php esc_html_e( 'Nothing found', 'mudra' ); ?></h1>
	</header><!-- .entry-header -->
	<div class="entry-content" itemprop="text">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( '%1$s <a href="%2$s">%3$s</a>.', esc_html__( 'Ready to publish your first post?', 'mudra' ), esc_url( admin_url( 'post-new.php' ) ), esc_html__( 'Get started here', 'mudra' ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, no content matched your criteria. Try again with different keywords.', 'mudra' ); ?></p>
			<?php
				get_search_form();

		else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'mudra' ); ?></p>
			<?php
				get_search_form();

		endif; ?>
	</div><!-- .entry-content -->
</section><!-- .no-results -->
