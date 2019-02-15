<?php
/**
 * The main template file
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mudra
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php

			if ( have_posts() ) :

				// Start the Loop
				while ( have_posts() ) : the_post();

					// Include the template for the main content.
					get_template_part( 'template-parts/post/content', 'loop' );

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
<?php get_footer(); ?>
