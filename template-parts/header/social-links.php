<div class="social-links">
<?php if ( get_theme_mod( 'facebook', '' ) ) : ?>
	<a class="facebook" href="<?php echo esc_url( get_theme_mod( 'facebook', '' ) ); ?>" title="<?php _e( 'Follow us on Facebook', 'mudra' ); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
<?php endif; ?>
<?php if ( get_theme_mod( 'twitter', '' ) ) : ?>
	<a class="twitter" href="<?php echo esc_url( get_theme_mod( 'twitter', '' ) ); ?>" title="<?php _e( 'Follow us on Twitter', 'mudra' ); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
<?php endif; ?>
<?php if ( get_theme_mod( 'google+', '' ) ) : ?>
	<a class="google-plus" href="<?php echo esc_url( get_theme_mod( 'google+', '' ) ); ?>" title="<?php _e( 'Follow us on Google+', 'mudra' ); ?>" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
<?php endif; ?>
<?php if ( get_theme_mod( 'instagram', '' ) ) : ?>
	<a class="instagram" href="<?php echo esc_url( get_theme_mod( 'instagram', '' ) ); ?>" title="<?php _e( 'Follow us on Instagram', 'mudra' ); ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
<?php endif; ?>
<?php if ( get_theme_mod( 'pinterest', '' ) ) : ?>
	<a class="pinterest" href="<?php echo esc_url( get_theme_mod( 'pinterest', '' ) ); ?>" title="<?php _e( 'Follow us on Pinterest', 'mudra' ); ?>" target="_blank"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
<?php endif; ?>
<?php if ( get_theme_mod( 'youtube', '' ) ) : ?>
	<a class="youtube" href="<?php echo esc_url( get_theme_mod( 'youtube', '' ) ); ?>" title="<?php _e( 'Follow us on YouTube', 'mudra' ); ?>" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
<?php endif; ?>
<?php if ( get_theme_mod( 'RSS', '' ) ) : ?>
	<a class="rss" href="<?php echo esc_url( get_theme_mod( 'RSS', '' ) ); ?>" title="<?php _e( 'Subscribe to RSS feed', 'mudra' ); ?>" target="_blank"><i class="fa fa-rss" aria-hidden="true"></i></a>
<?php endif; ?>
</div>
