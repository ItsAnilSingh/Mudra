<?php
/**
 * Displays footer site info
 *
 * @package mudra
 */

?>

<div class="site-info">
<?php
	$theme          = __( 'Mudra', 'mudra' );
	$theme_uri      = 'https://tricksmash.com/mudra/';
	$author         = 'ItsAnilSingh';
	$copyright_text = get_theme_mod( 'copyright_text', __( 'All Rights Reserved', 'mudra' ) );

	if ( '' == $copyright_text )
		$copyright_text = __( 'All Rights Reserved', 'mudra' );

	printf(
		'&copy; %1$s <a href="%2$s" title="%3$s">%3$s</a>. %4$s.',
		date_i18n( date( 'Y' ) ),
		esc_url( home_url() ),
		esc_html( get_bloginfo( 'name' ) ),
		esc_html( $copyright_text )
	);

	if ( true == get_theme_mod( 'support_theme', true ) ) :
		printf(
			' %1$s: <a href="%2$s" rel="nofollow" title="%3$s" target="_blank">%3$s</a> by %4$s.',
			esc_html__( 'Theme', 'mudra' ),
			esc_url( $theme_uri ),
			esc_html( $theme ),
			esc_html( $author )
		);
	endif;
?>
</div><!-- .site-info -->
