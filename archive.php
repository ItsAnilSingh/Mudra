<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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

		if ( have_posts() ) :

			echo '<header class="page-header">';
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			if ( ! is_paged() ) :
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			endif;
			echo '</header><!-- .page-header -->';

			// Start the Loop
			while ( have_posts() ) :
				the_post();

				// Include the template for the archive content.
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

<?php
get_sidebar();
get_footer();
