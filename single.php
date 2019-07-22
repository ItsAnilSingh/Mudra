<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

		// Start the Loop
		while ( have_posts() ) :
			the_post();

			// Include the template for the single post content.
			get_template_part( 'template-parts/post/content', 'single' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		endwhile;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
