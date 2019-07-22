<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Mudra
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			if ( true == get_theme_mod( 'mudra_breadcrumbs', true ) ) :
				mudra_breadcrumbs();
			endif;
			?>

			<section class="error-404 not-found">
				<header class="entry-header">
					<h1 class="entry-title" itemprop="headline"><?php esc_html_e( 'Error 404: Page not found.', 'mudra' ); ?></h1>
				</header><!-- .entry-header -->

				<div class="entry-content" itemprop="text">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'mudra' ); ?></p>

					<?php get_search_form(); ?>

				</div><!-- .entry-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
