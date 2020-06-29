<?php
/**
 * Mudra Jetpack support
 */
function mudra_jetpack_support() {
	// Add infinite scroll support
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'mudra_infinite_scroll',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'mudra_jetpack_support' );

/**
 * Mudra Jetpack infinite scroll renderer
 */
function mudra_infinite_scroll() {
	// Start the Loop
	while ( have_posts() ) :
		the_post();
		if ( is_search() ) :
			echo '<div class="search-content">';
			// Include the template for the search content.
			get_template_part( 'template-parts/post/content', 'search' );
			echo '</div>';
		else :
			// Include the template for the main content.
			get_template_part( 'template-parts/post/content', get_post_format() );
		endif;
	endwhile;
}
