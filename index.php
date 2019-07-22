<?php
/**
 * The main template file
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
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			// Start the Loop
			while ( have_posts() ) :
				the_post();

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

<?php
get_sidebar();
get_footer();
