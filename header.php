<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mudra
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head itemscope itemtype="https://schema.org/WebSite">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="profile" href="https://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="https://schema.org/WebPage">
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'mudra' ); ?></a> <a class="skip-link screen-reader-text" href="#secondary"><?php esc_html_e( 'Skip to blog sidebar', 'mudra' ); ?></a>

	<header id="masthead" class="site-header" itemscope itemtype="https://schema.org/WPHeader">

	<?php
	if ( true == get_theme_mod( 'top_bar', true ) ) :
		?>

		<div id="top-bar">
			<div class="container">

			<nav id="top-nav" class="top-navigation" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement" aria-label="<?php esc_attr_e( 'Top Menu', 'mudra' ); ?>">

				<?php
				wp_nav_menu( array(
					'theme_location' => 'top',
					'menu_id'        => 'top-menu',
					'menu_class'     => 'sf-menu',
					'fallback_cb'    => 'mudra_top_fallback_menu',
					'link_before'    => '<span itemprop="name">',
					'link_after'     => '</span>'
				) );
				?>

			</nav><!-- #top-nav -->

			<?php
			if ( true == get_theme_mod( 'social_links', false ) ) :
				get_template_part( 'template-parts/header/social', 'links' );
			endif;
			?>

			</div><!-- .container -->
		</div><!-- #top-bar -->

		<?php
	endif;
	?>

		<div id="header-main">
			<div class="container"<?php if ( get_header_image() ) : echo ' id="custom-header" style="background:url(' . esc_url( get_header_image() ) . '); height:100%;"'; endif; ?>>

			<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>

			<?php
			if ( true == get_theme_mod( 'header_search', true ) ) :
				?>
				<span class="mobile-toggle"><i class="fa fa-search" aria-hidden="true"></i></span>
				<div class="header-search">
					<?php get_search_form(); ?>
				</div><!-- .header-search -->
				<?php
			endif;
			?>

			<div id="slick-mobile-menu"></div>

			<?php dynamic_sidebar( 'header-widget' ); ?>

			</div><!-- .container -->
		</div><!-- #header-main -->

		<div id="header-bar">
			<div class="container">

			<nav id="header-nav" class="header-navigation" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement" aria-label="<?php esc_attr_e( 'Header Menu', 'mudra' ); ?>">

				<?php
				wp_nav_menu( array(
					'theme_location' => 'header',
					'menu_id'        => 'header-menu',
					'menu_class'     => 'sf-menu',
					'fallback_cb'    => 'mudra_header_fallback_menu',
					'link_before'    => '<span itemprop="name">',
					'link_after'     => '</span>'
				) );
				?>

			</nav><!-- #header-nav -->

			<?php
			if ( true == get_theme_mod( 'header_search', true ) ) :
				?>
				<span class="search-toggle"><i class="fa fa-search" aria-hidden="true"></i></span>
				<div class="header-search">
					<?php get_search_form(); ?>
				</div><!-- .header-search -->
				<?php
			endif;
			?>

			</div><!-- .container -->
		</div><!-- #header-bar -->

	</header><!-- .site-header -->

	<div id="content" class="site-content container">
