<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mudra
 */

?>

<aside id="secondary" class="widget-area sidebar" role="complementary" aria-label="<?php esc_attr_e( 'Blog Sidebar', 'mudra' ); ?>" itemscope itemtype="https://schema.org/WPSideBar">
<?php
if ( is_active_sidebar( 'primary' ) ) :
	dynamic_sidebar( 'primary' );
else :
	?>
	<div id="search" class="widget widget_search">
		<?php get_search_form(); ?>
	</div>
	<div id="archives" class="widget">
		<h3 class="widget-title"><?php esc_html_e( 'Archives', 'mudra' ); ?></h3>
		<ul><?php wp_get_archives( array( 'type' => 'monthly' ) ); ?></ul>
	</div>
	<div id="meta" class="widget">
		<h3 class="widget-title"><?php esc_html_e( 'Meta', 'mudra' ); ?></h3>
		<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<?php wp_meta(); ?>
		</ul>
	</div>
	<?php
endif;
?>
</aside><!-- #secondary -->
