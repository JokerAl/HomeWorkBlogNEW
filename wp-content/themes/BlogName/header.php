<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site wrapper">
	<header id="masthead" class="site-header" role="banner">
		<div class="container-fluid">
			<div class="site-branding">
				<?php
				if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_theme_mod('logo-img') ?>" alt="banner"></a></h1>
				<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_theme_mod('logo-img')?>" alt="banner"></a></p>
					<?php
				endif; ?>
			</div><!-- .site-branding -->
			<form name="search-form" action="#" method="GET">
				<div class="search-input">
					<input id="search-input" type="search" name="search-request" placeholder="Search" >
					<button type="submit" class="fa fa-search">
				</div>
			</form>
		</div>
			<button class="hamburger">&#9776;</button>
			<button class="cross">&#735;</button>

			<nav id="site-navigation" class=" top-nav clearfix" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->



	</header><!-- #masthead -->

	<div id="content" class="site-content">
