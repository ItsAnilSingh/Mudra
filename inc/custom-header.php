<?php
/**
 * Custom header implementation
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Mudra
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses mudra_header_style()
 */
function mudra_custom_header_setup() {

	/**
	 * Filter mudra custom-header support arguments.
	 *
	 * @type string $default-image     	    Default image of the header.
	 * @type string $default-text-color     Default color of the header text.
	 * @type int    $width                  Width in pixels of the custom header image. Default 1100.
	 * @type int    $height                 Height in pixels of the custom header image. Default 120.
	 * @type string $wp-head-callback       Callback function used to style the header image and text
	 *                                      displayed on the blog.
	 */
	add_theme_support( 'custom-header', apply_filters( 'mudra_custom_header_args', array(
		'default-image'      => '',
		'default-text-color' => '000000',
		'width'              => 1100,
		'height'             => 120,
		'wp-head-callback'   => 'mudra_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'mudra_custom_header_setup' );

if ( ! function_exists( 'mudra_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog.
 *
 * @see mudra_custom_header_setup().
 */
function mudra_header_style() {
	$header_text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail.
	// get_header_textcolor() options: add_theme_support( 'custom-header' ) is default, hide text (returns 'blank') or any hex value.
	if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style id="mudra-custom-header-styles" type="text/css">
	<?php
	// Has the text been hidden?
	if ( ! display_header_text() ) :
		?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
		<?php
	// If the user has set a custom color for the text use that.
	else :
		?>
		.site-title a,
		.site-description,
		.mobile-toggle {
			color: #<?php echo esc_attr( $header_text_color ); ?> !important;
		}
		.slicknav_btn {
			background-color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
		<?php
	endif;
	?>
	</style>
	<?php
}
endif;
