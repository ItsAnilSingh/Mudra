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
						if ( has_nav_menu( 'footer' ) ) :
							wp_nav_menu( array(
								'theme_location' => 'footer',
								'menu_id'        => 'footer-menu',
								'menu_class'     => 'sf-menu',
								'link_before'    => '<span itemprop="name">',
								'link_after'     => '</span>'
							) );
						elseif ( current_user_can( 'edit_theme_options' ) ) :
					?>
					<ul id="footer-menu" class="sf-menu">
						<li><a href="<?php echo esc_url( home_url() ); ?>/wp-admin/nav-menus.php"><?php _e( 'Add: Footer Menu', 'mudra' ); ?></a></li>
					</ul>
					<?php endif; ?>

				</nav><!-- #footer-nav -->

			</div><!-- .container -->
		</div><!-- .footer-content -->

	</footer><!-- #colophon -->
</div><!-- #page -->

<script type="text/javascript">
/* <![CDATA[ */
jQuery(document).ready(function(){
	jQuery('ul.sf-menu').superfish({
		delay: 100,
		speed: 'fast',
		autoArrows: false
	});
});
/* ]]> */
</script>

<script type="text/javascript">
/* <![CDATA[ */
jQuery(document).ready(function(){
	jQuery('#header-menu').slicknav({
		label: '',
		prependTo: '#slick-mobile-menu'
	});
});
/* ]]> */
</script>

<?php if ( true == get_theme_mod( 'header_search', true ) ) : ?>
<script type="text/javascript">
/* <![CDATA[ */
jQuery(document).ready(function($){
	$(".search-toggle").on('click', function(event){
		event.stopPropagation();
		$("#header-bar .header-search").slideToggle();
	});
	$(".mobile-toggle").on('click', function(event){
		event.stopPropagation();
		$("#header-main .header-search").slideToggle();
	});
	$(document).on('click', function(){
		$(".header-search").hide();
	});
	$(".header-search").on('click', function(event){
		event.stopPropagation();
	});
});
/* ]]> */
</script>
<?php endif; ?>

<?php if ( true == get_theme_mod( 'sticky_header_nav', true ) ) : ?>
<script type="text/javascript">
/* <![CDATA[ */
jQuery(document).ready(function($){
	var previousScroll = 0;
	var headerBarOffset = $('#header-bar').offset().top;
	if ($(window).width() > 959 ) {
		$(window).scroll(function(){
			var currentScroll = $(this).scrollTop();
				if (currentScroll > headerBarOffset) {
					$('#header-bar').addClass('sticky-header');
					if (currentScroll > previousScroll) {
						$('#header-bar').fadeOut(500);
					} else {
						$('#header-bar').fadeIn(500);
					}
				} else {
					$('#header-bar').removeClass('sticky-header');
				}
				previousScroll = currentScroll;
		});
	}
});
/* ]]> */
</script>
<?php endif; ?>

<?php if ( true == get_theme_mod( 'back_to_top', true ) ) : ?>
<a href="#" class="back-to-top"><span class="top-arrow"><i class="fa fa-chevron-up" aria-hidden="true"></i></span></a>
<script type="text/javascript">
/* <![CDATA[ */
jQuery(document).ready(function($){
	var offset = 250;
	var speed = 300;
	var duration = 500;
	$('.back-to-top').hide();
	$(window).scroll(function(){
		if ($(this).scrollTop() < offset) {
			$('.back-to-top').fadeOut(duration);
		} else {
			$('.back-to-top').fadeIn(duration);
		}
	});
	$('.back-to-top').on('click', function(){
		$('html, body').animate({scrollTop:0}, speed);
		return false;
	});
});
/* ]]> */
</script>
<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>
