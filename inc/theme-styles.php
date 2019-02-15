<?php
/**
 * Generate CSS out of customizer settings
 */
function mudra_customizer_css() {

	// Text color
	$text_color = get_theme_mod( 'text_color', '#333' );

	// Link color
	$link_color = get_theme_mod( 'link_color', '#ce181e' );

	// Link color on hover
	$hover_color = get_theme_mod( 'hover_color', '#dd3333' );

	// Button color
	$button_color = get_theme_mod( 'button_color', '#ce181e' );

	// Button color on hover
	$button_hover_color = get_theme_mod( 'button_hover_color', '#333' );

	if ( ! empty( $text_color ) || ! empty( $link_color ) || ! empty( $hover_color ) || ! empty( $button_color ) || ! empty( $button_hover_color ) ) { ?>
		<style type="text/css">
		<?php if ( ! empty( $text_color ) ) : ?>

			body {
				color: <?php echo sanitize_hex_color( $text_color ); ?>;
			}
		<?php endif; ?>
		<?php if ( ! empty( $link_color ) ) : ?>

			a {
				color: <?php echo sanitize_hex_color( $link_color ); ?>;
			}
		<?php endif; ?>
		<?php if ( ! empty( $hover_color ) ) : ?>

			a:hover,
			a:focus,
			a:active,
			#header-nav a:hover,
			#header-nav li.sfHover,
			#header-nav li.current-menu-item a,
			.slicknav_nav a:hover,
			.slicknav_nav li.current-menu-item a,
			.slicknav_nav .slicknav_row:hover,
			.breadcrumbs .breadcrumbs-nav a:hover {
				color: <?php echo sanitize_hex_color( $hover_color ); ?>;
			}
		<?php endif; ?>
		<?php if ( ! empty( $button_color ) ) : ?>

			button,
			input[type="button"],
			input[type="submit"],
			input[type="reset"],
			.read-more a,
			.read-more a:visited,
			.pagination .page-numbers,
			.top-arrow {
				background-color: <?php echo sanitize_hex_color( $button_color ); ?> !important;
			}
		<?php endif; ?>
		<?php if ( ! empty( $button_hover_color ) ) : ?>

			button:hover,
			button:focus,
			input[type="button"]:hover,
			input[type="button"]:focus,
			input[type="submit"]:hover,
			input[type="submit"]:focus,
			input[type="reset"]:hover,
			input[type="reset"]:focus,
			.read-more a:hover,
			.read-more a:focus,
			.pagination .current,
			.pagination .page-numbers:focus,
			.pagination .page-numbers:hover {
				background-color: <?php echo sanitize_hex_color( $button_hover_color ); ?> !important;
			}
		<?php endif; ?>

		</style>
<?php }

}
add_action( 'wp_head', 'mudra_customizer_css');
