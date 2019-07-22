<?php
/**
 * Generate CSS out of customizer settings
 */
function mudra_customizer_css() {

	// Background color
	$background_color = get_background_color();

	// Text color
	$text_color = get_theme_mod( 'text_color', '#333' );

	// Link color
	$link_color = get_theme_mod( 'link_color', '#0057e7' );

	// Link color on hover
	$hover_color = get_theme_mod( 'hover_color', '#1e73be' );

	// Button color
	$button_color = get_theme_mod( 'button_color', '#0057e7' );

	// Button color on hover
	$button_hover_color = get_theme_mod( 'button_hover_color', '#d62d20' );

	if ( ! empty( $background_color ) || ! empty( $text_color ) || ! empty( $link_color ) || ! empty( $hover_color ) || ! empty( $button_color ) || ! empty( $button_hover_color ) ) { ?>
		<style type="text/css">
		<?php if ( ! empty( $background_color ) ) : ?>

			@media only screen and (max-width: 959px) {
				.header-widget {
					background-color: #<?php echo esc_attr( $background_color ); ?>;
				}
			}
			<?php endif; ?>
		<?php if ( ! empty( $text_color ) ) : ?>

			body,
			blockquote,
			.breadcrumbs-nav {
				color: <?php echo esc_attr( $text_color ); ?>;
			}
		<?php endif; ?>
		<?php if ( ! empty( $link_color ) ) : ?>

			a,
			#header-nav li ul,
			.breadcrumbs-nav a {
				color: <?php echo esc_attr( $link_color ); ?>;
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
			.breadcrumbs-nav a:hover {
				color: <?php echo esc_attr( $hover_color ); ?>;
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
			.top-arrow,
			.entry-content .wp-block-button__link,
			.comment-reply-link:hover,
			.comment-reply-link:focus,
			.comments-pagination .page-numbers {
				background-color: <?php echo esc_attr( $button_color ); ?> !important;
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
			.pagination .page-numbers:hover,
			.pagination .page-numbers:focus,
			.top-arrow:hover,
			.top-arrow:focus,
			.entry-content .wp-block-button__link:hover,
			.entry-content .wp-block-button__link:focus,
			.comments-pagination .current,
			.comments-pagination .page-numbers:hover,
			.comments-pagination .page-numbers:focus {
				background-color: <?php echo esc_attr( $button_hover_color ); ?> !important;
			}
		<?php endif; ?>

		</style>
<?php }

}
add_action( 'wp_head', 'mudra_customizer_css');
