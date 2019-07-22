<?php
/**
 * Displays footer site info
 *
 * @package Mudra
 */

?>

<div class="site-info">

	<?php
	$mudra_copyright_text = get_theme_mod( 'copyright_text', __( 'All Rights Reserved', 'mudra' ) );

	if ( '' == $mudra_copyright_text )
		$mudra_copyright_text = __( 'All Rights Reserved', 'mudra' );

	if ( true == get_theme_mod( 'copyright', true ) ) :
		printf(
			'&copy; %1$s <a href="%2$s" title="%3$s">%3$s</a>. %4$s.',
			esc_attr( date_i18n( __( 'Y', 'mudra' ) ) ),
			esc_url( home_url() ),
			esc_html( get_bloginfo( 'name' ) ),
			esc_html( $mudra_copyright_text )
		);
	endif;

	if ( true == get_theme_mod( 'support_theme', true ) ) :
		printf(
			' %1$s: <a href="%2$s" rel="nofollow" title="%3$s" target="_blank">%3$s</a> by %4$s.',
			esc_html__( 'Theme', 'mudra' ),
			esc_url( 'https://tricksmash.com/mudra/' ),
			esc_html__( 'Mudra', 'mudra' ),
			esc_html( 'ItsAnilSingh' )
		);
	endif;
	?>
	&nbsp;

</div><!-- .site-info -->
