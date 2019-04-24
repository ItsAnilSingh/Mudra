<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mudra
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">

		<?php get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>

		<div class="footer-content">
			<div class="container">

			<?php get_template_part( 'template-parts/footer/site', 'info' ); ?>

				<nav id="footer-nav" class="footer-navigation" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement" aria-label="<?php esc_attr_e( 'Footer Menu', 'mudra' ); ?>">

					<?php
						wp_nav_menu( array(
							'theme_location' => 'footer',
							'menu_id'        => 'footer-menu',
							'menu_class'     => 'sf-menu',
							'fallback_cb'    => 'mudra_footer_fallback_menu',
							'link_before'    => '<span itemprop="name">',
							'link_after'     => '</span>'
						) );
					?>

				</nav><!-- #footer-nav -->

			</div><!-- .container -->
		</div><!-- .footer-content -->

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php if ( true == get_theme_mod( 'back_to_top', true ) ) : ?>
<a href="#" class="back-to-top"><span class="top-arrow"><i class="fa fa-chevron-up" aria-hidden="true"></i></span></a>
<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>
