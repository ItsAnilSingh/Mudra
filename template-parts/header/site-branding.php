<div class="site-branding">

<?php if ( has_custom_logo() ) : ?>
				<div id="logo"><?php the_custom_logo(); ?></div><!-- #logo -->

			</div><!-- .site-branding -->
<?php else :
			if ( is_front_page() ) : ?>
				<h1 class="site-title" itemprop="headline"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1><!-- .site-title -->
			<?php else : ?>
				<p class="site-title" itemprop="headline"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p><!-- .site-title -->
			<?php endif;
				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) :
			?>	<p class="site-description" itemprop="description"><?php echo esc_html( $description ); ?></p><!-- .site-description -->
			<?php endif; ?>

			</div><!-- .site-branding -->
<?php endif; ?>
