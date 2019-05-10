<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package mudra
 */


if ( ! function_exists( 'mudra_top_fallback_menu' ) ) :
/**
 * Top fallback menu
 */
function mudra_top_fallback_menu() {
	$args = array(
		'echo'             => 0,
		'title_li'         => ''
	);

	echo '<div><ul id="top-menu" class="sf-menu">' . wp_list_pages( $args ) . '</ul></div>';
}
endif;


if ( ! function_exists( 'mudra_header_fallback_menu' ) ) :
/**
 * Header fallback menu
 */
function mudra_header_fallback_menu() {
	$args = array(
		'echo'             => 0,
		'title_li'         => '',
		'show_option_none' => ''
	);

	echo '<div><ul id="header-menu" class="sf-menu">' . wp_list_categories( $args ) . '</ul></div>';
}
endif;


if ( ! function_exists( 'mudra_footer_fallback_menu' ) ) :
/**
 * Footer fallback menu
 */
function mudra_footer_fallback_menu() {
	$args = array(
		'echo'             => 0,
		'title_li'         => ''
	);

	echo '<div><ul id="footer-menu" class="sf-menu">' . wp_list_pages( $args ) . '</ul></div>';
}
endif;


if ( ! function_exists( 'mudra_custom_excerpt_length' ) ) :
/**
 * Filter the excerpt length.
 */
function mudra_custom_excerpt_length( $length ) {
	$custom_length = get_theme_mod( 'excerpt_length', 45 );
	return is_admin() ? $length : $custom_length;
}
add_filter( 'excerpt_length', 'mudra_custom_excerpt_length', 999 );
endif;


if ( ! function_exists( 'mudra_custom_excerpt_more' ) ) :
/**
 * Customize the excerpt more.
 */
function mudra_custom_excerpt_more( $more ) {
	return is_admin() ? $more : ' &hellip;';
}
add_filter( 'excerpt_more', 'mudra_custom_excerpt_more' );
endif;


if ( ! function_exists( 'mudra_entry_date' ) ) :
/**
 * Prints HTML entry date meta information.
 */
function mudra_entry_date( $entry_date ) {

	$posted = __( 'Posted on:', 'mudra' );
	$updated = __( 'Last updated on:', 'mudra' );

	if ( 'posted_date' === $entry_date ) :
		printf(
			'%1$s <time class="published" itemprop="datePublished" datetime="%2$s">%3$s</time>',
			esc_html( $posted ),
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() )
		);
	elseif ( 'updated_date' === $entry_date ) :
		printf(
			'%1$s <time class="modified" itemprop="dateModified" datetime="%2$s">%3$s</time>',
			esc_html( $updated ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);
	elseif ( 'posted_updated_date' === $entry_date ) :
		printf(
			'%1$s <time class="published" itemprop="datePublished" datetime="%2$s">%3$s</time> <span>&vert;</span> %4$s <time class="modified" itemprop="dateModified" datetime="%5$s">%6$s</time>',
			esc_html( $posted ),
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_html( $updated ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);
	endif;

}
endif;


if ( ! function_exists( 'mudra_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function mudra_entry_footer() {

	/* translators: used between list items, there is a space after the comma */
	$separate_meta = __( ', ', 'mudra' );

	// Get Categories for posts.
	$categories_list = get_the_category_list( $separate_meta );

	// Get Tags for posts.
	$tags_list = get_the_tag_list( '', $separate_meta );

	// We don't want to output .entry-footer if it will be empty, so make sure its not.
	if ( ( ( mudra_categorized_blog() && $categories_list ) || $tags_list ) || get_edit_post_link() ) {

		echo '<footer class="entry-footer">';

			if ( 'post' === get_post_type() ) {
				if ( ( $categories_list && mudra_categorized_blog() ) || $tags_list ) {
					echo '<div class="cat-tags-links">';

						// Make sure there's more than one category before displaying.
						if ( $categories_list && mudra_categorized_blog() ) {
							printf (
								'<div class="cat-links">%1$s <span class="screen-reader-text">%1$s</span>%2$s</div>',
								esc_html__( 'Filed Under:', 'mudra' ),
								$categories_list
							);
						}

						if ( $tags_list && ! is_wp_error( $tags_list ) ) {
							printf (
								'<div class="tags-links">%1$s <span class="screen-reader-text">%1$s</span>%2$s</div>',
								esc_html__( 'Tagged With:', 'mudra' ),
								$tags_list
							);
						}

					echo '</div>';
				}
			}

		echo '</footer> <!-- .entry-footer -->';
	}
}
endif;


if ( ! function_exists( 'mudra_edit_link' ) ) :
/**
 * Returns an accessibility-friendly link to edit a post or page.
 */
function mudra_edit_link() {
	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'mudra' ),
			get_the_title()
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;


if ( ! function_exists( 'mudra_categorized_blog' ) ) :
/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function mudra_categorized_blog() {
	$category_count = get_transient( 'mudra_categories' );

	if ( false === $category_count ) {
		// Create an array of all the categories that are attached to posts.
		$categories = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$category_count = count( $categories );

		set_transient( 'mudra_categories', $category_count );
	}

	// Allow viewing case of 0 or 1 categories in post preview.
	if ( is_preview() ) {
		return true;
	}

	return $category_count > 1;
}
endif;


if ( ! function_exists( 'mudra_category_transient_flusher' ) ) :
/**
 * Flush out the transients used in mudra_categorized_blog.
 */
function mudra_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'mudra_categories' );
}
add_action( 'edit_category', 'mudra_category_transient_flusher' );
add_action( 'save_post',     'mudra_category_transient_flusher' );
endif;
