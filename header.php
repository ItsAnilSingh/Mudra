<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mudra
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head itemscope itemtype="http://schema.org/WebSite">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'mudra' ); ?></a> <a class="skip-link screen-reader-text" href="#secondary"><?php _e( 'Skip to blog sidebar', 'mudra' ); ?></a>

	<header class="site-header" itemscope itemtype="http://schema.org/WPHeader">

		<?php if ( true == get_theme_mod( 'top_bar', true ) ) : ?>

		<div id="top-bar">
			<div class="container">

			<nav id="top-nav" class="top-navigation" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement" aria-label="<?php esc_attr_e( 'Top Menu', 'mudra' ); ?>">

			<?php
				if ( has_nav_menu( 'top' ) ) :
					wp_nav_menu( array(
						'theme_location' => 'top',
						'menu_id'        => 'top-menu',
						'menu_class'     => 'sf-menu',
						'link_before'    => '<span itemprop="name">',
						'link_after'     => '</span>'
					) );
				elseif ( current_user_can( 'edit_theme_options' ) ) :
			?>
			<ul id="top-menu" class="sf-menu">
				<li><a href="<?php echo esc_url( home_url() ); ?>/wp-admin/nav-menus.php"><?php _e( 'Add: Top Menu', 'mudra' ); ?></a></li>
			</ul>
			<?php endif; ?>

			</nav><!-- #top-nav -->

			<?php
				if ( true == get_theme_mod( 'social_links', true ) ) :
					get_template_part( 'template-parts/header/social', 'links' );
				endif;
			?>

			</div><!-- .container -->
		</div><!-- #top-bar -->

		<?php endif; ?>

		<div id="header-main">
			<div class="container">

			<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>

			<?php if ( true == get_theme_mod( 'header_search', true ) ) : ?>

			<span class="mobile-toggle"><i class="fa fa-search" aria-hidden="true"></i></span>
			<div class="header-search">
				<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<span class="screen-reader-text">Search for:</span>
					<input type="search" class="search-field" placeholder="<?php _e( 'Search for&hellip;', 'mudra' ); ?>" title="<?php _e( 'Enter keywords to search.', 'mudra' ); ?>" value="" name="s" autocomplete="off" />
					<input type="submit" class="search-submit" value="Search" />
				</form>
			</div><!-- .header-search -->

			<?php endif; ?>

			<div id="slick-mobile-menu"></div>

			<?php dynamic_sidebar( 'header-ad' ); ?>

			</div><!-- .container -->
		</div><!-- #header-main -->

		<div id="header-bar">
			<div class="container">

			<nav id="header-nav" class="header-navigation" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement" aria-label="<?php esc_attr_e( 'Header Menu', 'mudra' ); ?>">

				<?php
					if ( has_nav_menu( 'header' ) ) :
						wp_nav_menu( array(
							'theme_location' => 'header',
							'menu_id'        => 'header-menu',
							'menu_class'     => 'sf-menu',
							'link_before'    => '<span itemprop="name">',
							'link_after'     => '</span>'
						) );
					elseif ( current_user_can( 'edit_theme_options' ) ) :
				?>
				<ul id="header-menu" class="sf-menu">
					<li><a href="<?php echo esc_url( home_url() ); ?>/wp-admin/nav-menus.php"><?php _e( 'Add: Header Menu', 'mudra' ); ?></a></li>
				</ul>
				<?php endif; ?>

			</nav><!-- #header-nav -->

			<?php if ( true == get_theme_mod( 'header_search', true ) ) : ?>

			<span class="search-toggle"><i class="fa fa-search" aria-hidden="true"></i></span>
			<div class="header-search">
				<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="potentialAction" itemscope itemtype="http://schema.org/SearchAction">
					<span class="screen-reader-text">Search for:</span>
					<input type="search" class="search-field" itemprop="query-input" placeholder="<?php _e( 'Search for&hellip;', 'mudra' ); ?>" title="<?php _e( 'Enter keywords to search.', 'mudra' ); ?>" value="" name="s" autocomplete="off" />
					<input type="submit" class="search-submit" value="Search" />
					<meta itemprop="target" content="<?php echo esc_url( home_url( '/' ) ) . "?s={s}"; ?>">
				</form>
			</div><!-- .header-search -->

			<?php endif; ?>

			</div><!-- .container -->
		</div><!-- #header-bar -->

	</header><!-- .site-header -->

	<div id="content" class="site-content container">
