<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mudra
 */

?>

<aside id="secondary" class="widget-area sidebar" role="complementary" aria-label="<?php esc_attr_e( 'Blog Sidebar', 'mudra' ); ?>" itemscope itemtype="http://schema.org/WPSideBar">
<?php
	if ( is_active_sidebar( 'sidebar-1' ) ) :
		dynamic_sidebar( 'sidebar-1' );
	elseif ( current_user_can( 'edit_theme_options' ) ) : ?>
		<div class="widget widget-setup">
			<p><a href="<?php echo esc_url( home_url() ); ?>/wp-admin/widgets.php"><?php _e( 'Add: Sidebar Widgets', 'mudra' ); ?></a></p>
		</div>
<?php endif; ?>
</aside><!-- #secondary -->
