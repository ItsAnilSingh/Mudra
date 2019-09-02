<?php
/**
 * Custom additional functions for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Mudra
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function mudra_body_classes( $classes ) {
	// Add class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Add class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'mudra_body_classes' );


/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function mudra_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'mudra_pingback_header' );


/**
 * Modifies tag cloud widget arguments to display all tags in the same font size.
 */
function mudra_widget_tag_cloud_args( $args ) {
	$args['largest']  = 1;
	$args['smallest'] = 1;
	$args['unit']     = 'em';

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'mudra_widget_tag_cloud_args' );


/**
 * Add missing 'alt' and 'title' tags for gravatar
 */
function mudra_gravatar_alt( $mudraGravatar ) {
	if ( have_comments() ) :
		$alt = get_comment_author();
	else :
		$alt = get_the_author_meta( 'display_name' );
	endif;

	$mudraGravatar = str_replace( 'alt=\'\'', 'alt=\'Avatar for ' . $alt . '\' title=\'Gravatar for ' . $alt . '\'', $mudraGravatar );

	return $mudraGravatar;
}
add_filter( 'get_avatar', 'mudra_gravatar_alt' );


/*
 * Add missing schema attribute to nav links
 */
function mudra_add_attribute( $attr, $item, $args ) {
	$attr['itemprop'] = 'url';
	return $attr;
}
add_filter( 'nav_menu_link_attributes', 'mudra_add_attribute', 10, 3 );


/**
 * Mudra author posts link
 */
function mudra_author_posts_link() {
	global $authordata;
	if ( ! is_object( $authordata ) ) {
		return;
	}

	printf(
		'<a href="%1$s" itemprop="url" rel="author"><span itemprop="name">%2$s</span></a>',
		esc_url( get_author_posts_url( $authordata->ID, $authordata->user_nicename ) ),
		get_the_author()
	);
}


/**
 * Mudra breadcrumbs
 */
function mudra_breadcrumbs() {
	$sep = ' &raquo; ';

	// Bail out if in home or front page
	if ( is_home() || is_front_page() ) :
		return;
	else :
		printf(
			'<div class="breadcrumbs" itemscope itemtype="https://schema.org/BreadcrumbList"><span class="breadcrumbs-nav"><span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="%1$s" title="%2$s" itemprop="item"><span itemprop="name">%2$s</span></a><meta itemprop="position" content="1"></span>%3$s',
			esc_url( home_url() ),
			esc_html__( 'Home', 'mudra' ),
			esc_attr( $sep )
		);

		if ( is_archive() ) :
			if ( is_category() ) :
				$cat_title = single_cat_title( '', false );
				printf( '<span>%s</span>', esc_html( $cat_title ) );
			elseif ( is_tag() ) :
				$tag_title = single_tag_title( '', false );
				printf( '<span>%s</span>', esc_html( $tag_title ) );
			elseif ( is_author() ) :
				printf(
					'<span>%1$s %2$s</span>',
					esc_html__( 'Archives for', 'mudra' ),
					get_the_author_meta( 'display_name' )
				);
			elseif ( is_day() ) :
				printf(
					'<span>%1$s %2$s</span>',
					esc_html__( 'Archives for', 'mudra' ),
					get_the_date()
				);
			elseif ( is_month() ) :
				printf(
					'<span>%1$s %2$s</span>',
					esc_html__( 'Archives for', 'mudra' ),
					get_the_date( _x( 'F Y', 'monthly archives date format', 'mudra' ) )
				);
			elseif ( is_year() ) :
				printf(
					'<span>%1$s %2$s</span>',
					esc_html__( 'Archives for', 'mudra' ),
					get_the_date( _x( 'Y', 'yearly archives date format', 'mudra' ) )
				);
			else :
				printf( '<span>%s</span>', esc_html__( 'Blog Archives', 'mudra' ) );
			endif;
		endif;

		if ( is_single() ) :
			$categories = get_the_category();
			if ( ! empty( $categories ) ) :
				printf(
					'<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="%1$s" title="%2$s" itemprop="item"><span itemprop="name">%2$s</span></a><meta itemprop="position" content="2"></span>%3$s',
					esc_url( get_category_link( $categories[0]->term_id ) ),
					esc_html( $categories[0]->name ),
					esc_attr( $sep )
				);
			endif;
			printf( '<span>%s</span>', esc_html( strip_tags( get_the_title() ) ) );
		endif;

		if ( is_page() ) :
			printf( '<span>%s</span>', esc_html( strip_tags( get_the_title() ) ) );
		endif;

		if ( is_search() ) :
			printf(
				'<span>%1$s %2$s</span>',
				esc_html__( 'You searched for:', 'mudra' ),
				get_search_query()
			);
		endif;

		if ( is_404() ) :
			printf( '<span>%s</span>', esc_html__( 'Error 404: Page not found.', 'mudra' ) );
		endif;

		printf( '</span></div>' );

	endif;

}


/**
 * Related posts
 */
function mudra_related_posts( $args = array() ) {
	global $post;

	// Default args
	$args = wp_parse_args( $args, array(
		'post_id'   => ! empty( $post ) ? $post->ID : '',
		'taxonomy'  => 'category',
		'limit'     => 3,
		'post_type' => ! empty( $post ) ? $post->post_type : 'post',
		'orderby'   => 'date',
		'order'     => 'DESC'
	) );

	// Bail out if taxonomy does not exist
	if ( ! taxonomy_exists( $args['taxonomy'] ) ) {
		return;
	}

	// Get post taxonomies
	$taxonomies = wp_get_post_terms( $args['post_id'], $args['taxonomy'], array( 'fields' => 'ids' ) );

	// Bail out if no taxonomies assigned
	if ( empty( $taxonomies ) ) {
		return;
	}

	// Get related posts
	$related_posts = get_posts( array(
		'post__not_in'   => (array) $args['post_id'],
		'post_type'      => $args['post_type'],
		'tax_query'      => array( array(
				'taxonomy'  => $args['taxonomy'],
				'field'     => 'term_id',
				'terms'     => $taxonomies
			),
		),
		'posts_per_page' => $args['limit'],
		'orderby'        => $args['orderby'],
		'order'          => $args['order']
	) );

	include( locate_template( 'template-parts/post/related-posts.php', false, false ) );

	wp_reset_postdata();
}
