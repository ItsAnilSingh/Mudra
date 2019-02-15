<?php
/**
 * Displays footer widgets if assigned
 *
 * @package mudra
 */

if ( true == get_theme_mod( 'footer_widgets', true ) ) : ?>
	<div class="footer-widgets container" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'mudra' ); ?>">
	<?php
	if ( is_active_sidebar( 'footer-1' ) ) : ?>
		<div class="footer-widget footer-widget-1">
			<?php dynamic_sidebar( 'footer-1' ); ?>
		</div>
	<?php endif;
	if ( is_active_sidebar( 'footer-2' ) ) : ?>
		<div class="footer-widget footer-widget-2">
			<?php dynamic_sidebar( 'footer-2' ); ?>
		</div>
	<?php endif;
	if ( is_active_sidebar( 'footer-3' ) ) : ?>
		<div class="footer-widget footer-widget-3">
			<?php dynamic_sidebar( 'footer-3' ); ?>
		</div>
	<?php endif; ?>
	</div><!-- .footer-widgets -->
<?php endif; ?>
