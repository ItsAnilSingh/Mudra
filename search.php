<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package mudra
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php

			if ( true == get_theme_mod( 'mudra_breadcrumbs', true ) ) :
				mudra_breadcrumbs();
			endif;

			printf(
				'<header class="page-header"><h1 class="page-title">%1$s: <span>%2$s</span></h1></header>',
				esc_html__( 'Search Results for', 'mudra' ),
				get_search_query()
			);

			if ( have_posts() ) :

				// Start the Loop
				while ( have_posts() ) : the_post();

					echo '<div class="search-content">';

					// Include the template for the search content.
					get_template_part( 'template-parts/post/content', 'search' );

					echo '</div>';

				endwhile;

				the_posts_pagination( array(
					'prev_text' => '&laquo; <span class="screen-reader-text">' . __( 'Previous', 'mudra' ) . '</span>',
					'next_text' => '<span class="screen-reader-text">' . __( 'Next', 'mudra' ) . '</span> &raquo;',
				) );

			else :

				get_template_part( 'template-parts/post/content', 'none' );

			endif;

		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer();
