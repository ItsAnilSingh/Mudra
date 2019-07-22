<?php
/**
 * Template Name: Full Width
 *
 * The template for displaying full width pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mudra
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main full-width" role="main">

		<?php
		if ( true == get_theme_mod( 'mudra_breadcrumbs', true ) ) :
			mudra_breadcrumbs();
		endif;

		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/page/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
