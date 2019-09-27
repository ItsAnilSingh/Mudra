<?php
/**
 * Mudra Theme Customizer
 *
 * @package Mudra
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function mudra_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector' => '.site-title a',
			'render_callback' => 'mudra_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector' => '.site-description',
			'render_callback' => 'mudra_customize_partial_blogdescription',
		) );
	}

	// Support section
	require_once get_parent_theme_file_path( '/inc/classes/support.php' );
	$wp_customize->register_section_type( 'Mudra_Customizer_Support_Section' );
	$wp_customize->add_section( new Mudra_Customizer_Support_Section( $wp_customize, 'mudra_support', array(
		'title'             => __( 'Need Support? Click Here!', 'mudra' ),
		'url'               => esc_url( 'https://tricksmash.com/contact/#content' ),
		'priority'          => 0,
		'capability'        => 'edit_theme_options',
	) ) );

	// Text color
	$wp_customize->add_setting( 'text_color', array(
		'default'           => '#333',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'text_color', array(
		'label'             => __( 'Text Color', 'mudra' ),
		'section'           => 'colors',
		'settings'          => 'text_color',
	) ) );

	// Link color
	$wp_customize->add_setting( 'link_color', array(
		'default'           => '#0057e7',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
		'label'             => __( 'Link Color', 'mudra' ),
		'section'           => 'colors',
		'settings'          => 'link_color',
	) ) );

	// Link color on hover
	$wp_customize->add_setting( 'hover_color', array(
		'default'           => '#1e73be',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hover_color', array(
		'label'             => __( 'Link Color (on hover)', 'mudra' ),
		'section'           => 'colors',
		'settings'          => 'hover_color',
	) ) );

	// Button color
	$wp_customize->add_setting( 'button_color', array(
		'default'           => '#0057e7',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_color', array(
		'label'             => __( 'Button Color', 'mudra' ),
		'section'           => 'colors',
		'settings'          => 'button_color',
	) ) );

	// Button color on hover
	$wp_customize->add_setting( 'button_hover_color', array(
		'default'           => '#d62d20',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_hover_color', array(
		'label'             => __( 'Button Color (on hover)', 'mudra' ),
		'section'           => 'colors',
		'settings'          => 'button_hover_color',
	) ) );

	/**
	 * Theme options
	 */
	$wp_customize->add_panel( 'mudra_theme_options', array(
		'title'             => __( 'Mudra Theme Options', 'mudra' ),
		'priority'          => 45, // Before Header Image
		'capability'        => 'edit_theme_options',
	) );

	// General settings
	$wp_customize->add_section( 'general_settings', array(
		'title'             => __( 'General Settings', 'mudra' ),
		'capability'        => 'edit_theme_options',
		'panel'             => 'mudra_theme_options',
	) );

	// Back to top
	$wp_customize->add_setting( 'back_to_top', array(
		'default'           => true,
		'sanitize_callback' => 'mudra_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'back_to_top', array(
		'type'              => 'checkbox',
		'section'           => 'general_settings',
		'label'             => __( 'Scroll Back To Top', 'mudra' ),
	) );

	// Top bar settings
	$wp_customize->add_section( 'top_bar_settings', array(
		'title'             => __( 'Top Bar Settings', 'mudra' ),
		'capability'        => 'edit_theme_options',
		'panel'             => 'mudra_theme_options',
	) );

	// Top bar
	$wp_customize->add_setting( 'top_bar', array(
		'default'           => true,
		'sanitize_callback' => 'mudra_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'top_bar', array(
		'type'              => 'checkbox',
		'section'           => 'top_bar_settings',
		'label'             => __( 'Display Top Bar', 'mudra' ),
	) );

	// Social links
	$wp_customize->add_setting( 'social_links', array(
		'default'           => false,
		'sanitize_callback' => 'mudra_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'social_links', array(
		'type'              => 'checkbox',
		'section'           => 'top_bar_settings',
		'label'             => __( 'Display Social Links', 'mudra' ),
	) );

	// Social sites
	$social_sites = mudra_get_social_sites();
	foreach ( $social_sites as $social_site ) {
		$wp_customize->add_setting( $social_site, array( 'sanitize_callback' => 'esc_url_raw' ) );
		$wp_customize->add_control( $social_site, array(
			'type'              => 'text',
			'section'           => 'top_bar_settings',
			'label'             => ucwords( $social_site ),
		) );
	}

	// Header bar settings
	$wp_customize->add_section( 'header_bar_settings', array(
		'title'             => __( 'Header Bar Settings', 'mudra' ),
		'capability'        => 'edit_theme_options',
		'panel'             => 'mudra_theme_options',
	) );

	// Sticky header navigation
	$wp_customize->add_setting( 'sticky_header_nav', array(
		'default'           => 'disable',
		'sanitize_callback' => 'mudra_sanitize_select',
	) );
	$wp_customize->add_control( 'sticky_header_nav', array(
		'type'              => 'select',
		'section'           => 'header_bar_settings',
		'label'             => __( 'Sticky Header Menu', 'mudra' ),
		'choices'           => array(
			'disable'       => __( 'Disable', 'mudra' ),
			'always'        => __( 'Always', 'mudra' ),
			'scroll_up'     => __( 'On Scroll Up', 'mudra' ),
		),
	) );

	// Header search
	$wp_customize->add_setting( 'header_search', array(
		'default'           => true,
		'sanitize_callback' => 'mudra_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_search', array(
		'type'              => 'checkbox',
		'section'           => 'header_bar_settings',
		'label'             => __( 'Header Search', 'mudra' ),
	) );

	// Post header settings
	$wp_customize->add_section( 'post_header_settings', array(
		'title'             => __( 'Post Header Settings', 'mudra' ),
		'capability'        => 'edit_theme_options',
		'panel'             => 'mudra_theme_options',
	) );

	// Breadcrumbs
	$wp_customize->add_setting( 'mudra_breadcrumbs', array(
		'default'           => true,
		'sanitize_callback' => 'mudra_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'mudra_breadcrumbs', array(
		'type'              => 'checkbox',
		'section'           => 'post_header_settings',
		'label'             => __( 'Display Breadcrumbs', 'mudra' ),
	) );

	// Archive settings
	$wp_customize->add_section( 'archive_settings', array(
		'title'             => __( 'Blog/Archive Settings', 'mudra' ),
		'capability'        => 'edit_theme_options',
		'panel'             => 'mudra_theme_options',
	) );

	// Archive entry date
	$wp_customize->add_setting( 'archive_entry_date', array(
		'default'           => 'posted_date',
		'sanitize_callback' => 'mudra_sanitize_select',
	) );
	$wp_customize->add_control( 'archive_entry_date', array(
		'type'              => 'select',
		'section'           => 'archive_settings',
		'label'             => __( 'Select Entry Date', 'mudra' ),
		'choices'           => array(
			'disable'             => __( 'Hide', 'mudra' ),
			'posted_date'         => __( 'Posted on', 'mudra' ),
			'updated_date'        => __( 'Last updated on', 'mudra' ),
			'posted_updated_date' => __( 'Posted on & Last updated on', 'mudra' ),
		),
	) );

	// Archive entry author
	$wp_customize->add_setting( 'archive_entry_author', array(
		'default'           => true,
		'sanitize_callback' => 'mudra_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'archive_entry_author', array(
		'type'              => 'checkbox',
		'section'           => 'archive_settings',
		'label'             => __( 'Display Entry Author', 'mudra' ),
	) );

	// Archive entry comments
	$wp_customize->add_setting( 'archive_entry_comments', array(
		'default'           => true,
		'sanitize_callback' => 'mudra_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'archive_entry_comments', array(
		'type'              => 'checkbox',
		'section'           => 'archive_settings',
		'label'             => __( 'Display Entry Comments', 'mudra' ),
	) );

	// Archive featured images
	$wp_customize->add_setting( 'archive_featured_images', array(
		'default'           => true,
		'sanitize_callback' => 'mudra_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'archive_featured_images', array(
		'type'              => 'checkbox',
		'section'           => 'archive_settings',
		'label'             => __( 'Display Featured Images', 'mudra' ),
	) );

	// Excerpt length
	$wp_customize->add_setting( 'excerpt_length', array(
		'default'           => 45,
		'sanitize_callback' => 'mudra_sanitize_number',
	) );
	$wp_customize->add_control( 'excerpt_length', array(
		'type'              => 'number',
		'section'           => 'archive_settings',
		'label'             => __( 'Enter Excerpt Length', 'mudra' ),
	) );

	// Read more
	$wp_customize->add_setting( 'read_more', array(
		'default'           => __( 'Read More', 'mudra' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'read_more', array(
		'type'              => 'text',
		'section'           => 'archive_settings',
		'label'             => __( 'Read More Button', 'mudra' ),
	) );

	// Archive entry footer
	$wp_customize->add_setting( 'archive_entry_footer', array(
		'default'           => true,
		'sanitize_callback' => 'mudra_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'archive_entry_footer', array(
		'type'              => 'checkbox',
		'section'           => 'archive_settings',
		'label'             => __( 'Display Entry Footer', 'mudra' ),
	) );

	// Post settings
	$wp_customize->add_section( 'single_settings', array(
		'title'             => __( 'Post Settings', 'mudra' ),
		'capability'        => 'edit_theme_options',
		'panel'             => 'mudra_theme_options',
	) );

	// Post entry date
	$wp_customize->add_setting( 'single_entry_date', array(
		'default'           => 'posted_date',
		'sanitize_callback' => 'mudra_sanitize_select',
	) );
	$wp_customize->add_control( 'single_entry_date', array(
		'type'              => 'select',
		'section'           => 'single_settings',
		'label'             => __( 'Select Entry Date', 'mudra' ),
		'choices'           => array(
			'disable'             => __( 'Hide', 'mudra' ),
			'posted_date'         => __( 'Posted on', 'mudra' ),
			'updated_date'        => __( 'Last updated on', 'mudra' ),
			'posted_updated_date' => __( 'Posted on & Last updated on', 'mudra' ),
		),
	) );

	// Post entry author
	$wp_customize->add_setting( 'single_entry_author', array(
		'default'           => true,
		'sanitize_callback' => 'mudra_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'single_entry_author', array(
		'type'              => 'checkbox',
		'section'           => 'single_settings',
		'label'             => __( 'Display Entry Author', 'mudra' ),
	) );

	// Post entry comments
	$wp_customize->add_setting( 'single_entry_comments', array(
		'default'           => true,
		'sanitize_callback' => 'mudra_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'single_entry_comments', array(
		'type'              => 'checkbox',
		'section'           => 'single_settings',
		'label'             => __( 'Display Entry Comments', 'mudra' ),
	) );

	// Post featured image
	$wp_customize->add_setting( 'single_featured_image', array(
		'default'           => true,
		'sanitize_callback' => 'mudra_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'single_featured_image', array(
		'type'              => 'checkbox',
		'section'           => 'single_settings',
		'label'             => __( 'Display Featured Image', 'mudra' ),
	) );

	// Post entry footer
	$wp_customize->add_setting( 'single_entry_footer', array(
		'default'           => true,
		'sanitize_callback' => 'mudra_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'single_entry_footer', array(
		'type'              => 'checkbox',
		'section'           => 'single_settings',
		'label'             => __( 'Display Entry Footer', 'mudra' ),
	) );

	// Post navigation
	$wp_customize->add_setting( 'post_navigation', array(
		'default'           => true,
		'sanitize_callback' => 'mudra_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'post_navigation', array(
		'type'              => 'checkbox',
		'section'           => 'single_settings',
		'label'             => __( 'Display Post Navigation', 'mudra' ),
	) );

	// Author box
	$wp_customize->add_setting( 'author_box', array(
		'default'           => true,
		'sanitize_callback' => 'mudra_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'author_box', array(
		'type'              => 'checkbox',
		'section'           => 'single_settings',
		'label'             => __( 'Display Author Box', 'mudra' ),
	) );

	// Related posts
	$wp_customize->add_setting( 'related_posts', array(
		'default'           => 'disable',
		'sanitize_callback' => 'mudra_sanitize_select',
	) );
	$wp_customize->add_control( 'related_posts', array(
		'type'              => 'select',
		'section'           => 'single_settings',
		'label'             => __( 'Related Posts', 'mudra' ),
		'choices'           => array(
			'disable'       => __( 'Hide', 'mudra' ),
			'categories'    => __( 'By Categories', 'mudra' ),
			'tags'          => __( 'By Tags', 'mudra' ),
		),
	) );

	// Related posts order by
	$wp_customize->add_setting( 'related_posts_orderby', array(
		'default'           => 'date',
		'sanitize_callback' => 'mudra_sanitize_select',
	) );
	$wp_customize->add_control( 'related_posts_orderby', array(
		'type'              => 'select',
		'section'           => 'single_settings',
		'label'             => __( 'Related Posts Order By', 'mudra' ),
		'choices'           => array(
			'date'          => __( 'Date', 'mudra' ),
			'rand'          => __( 'Random', 'mudra' ),
			'comment_count' => __( 'Comment Count', 'mudra' ),
		),
	) );

	// Footer settings
	$wp_customize->add_section( 'footer_settings', array(
		'title'             => __( 'Footer Settings', 'mudra' ),
		'capability'        => 'edit_theme_options',
		'panel'             => 'mudra_theme_options',
	) );

	// Footer widgets
	$wp_customize->add_setting( 'footer_widgets', array(
		'default'           => true,
		'sanitize_callback' => 'mudra_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'footer_widgets', array(
		'type'              => 'checkbox',
		'section'           => 'footer_settings',
		'label'             => __( 'Display Footer Widgets', 'mudra' ),
	) );

	// Copyright
	$wp_customize->add_setting( 'copyright', array(
		'default'           => true,
		'sanitize_callback' => 'mudra_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'copyright', array(
		'type'              => 'checkbox',
		'section'           => 'footer_settings',
		'label'             => __( 'Display Copyright Notice', 'mudra' ),
	) );

	// Copyright text
	$wp_customize->add_setting( 'copyright_text', array(
		'default'           => __( 'All Rights Reserved', 'mudra' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'copyright_text', array(
		'type'              => 'text',
		'section'           => 'footer_settings',
		'label'             => __( 'Custom Copyright Text', 'mudra' ),
	) );

	// Support theme
	$wp_customize->add_setting( 'support_theme', array(
		'default'           => true,
		'sanitize_callback' => 'mudra_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'support_theme', array(
		'type'              => 'checkbox',
		'section'           => 'footer_settings',
		'label'             => __( 'Support Theme?', 'mudra' ),
	) );

}
add_action( 'customize_register', 'mudra_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 */
function mudra_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 */
function mudra_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Sanitize checkbox
 */
function mudra_sanitize_checkbox( $checked ) {
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

/**
 * Sanitize number
 */
function mudra_sanitize_number( $number, $setting ) {
	$number = absint( $number );
	return ( $number ? $number : $setting->default );
}

/**
 * Sanitize select
 */
function mudra_sanitize_select( $selection, $setting ) {
	$selection = sanitize_key( $selection );
	$choices = $setting->manager->get_control( $setting->id )->choices;
	return ( array_key_exists( $selection, $choices ) ? $selection : $setting->default );
}

/**
 * Social sites
 */
function mudra_get_social_sites() {

	// Store social site names in an array
	$social_sites = array(
		'facebook',
		'twitter',
		'linkedin',
		'instagram',
		'pinterest',
		'youtube',
		'RSS'
	);

	// Return social sites array
	return $social_sites;
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function mudra_customize_preview_js() {
	wp_enqueue_script( 'mudra-customize-preview', get_template_directory_uri() . '/assets/js/customize-preview.js', array( 'customize-preview' ), '', true );
}
add_action( 'customize_preview_init', 'mudra_customize_preview_js' );
