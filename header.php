<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Axiom_America
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'axiom-america' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<?php axiom_america_site_nav();

		if ( true == get_theme_mod( 'jumbotron_show', true ) ) :

			axiom_america_front_jumbotron();

		endif; ?>

	</header><!-- #masthead -->

	<?php if ( is_front_page() && ! is_home() ) :

		if ( true == get_theme_mod( 'featured_posts_show', true ) ) : ?>
			<div id="content" class="site-content container">
		<?php else : ?>
			<div id="content" class="site-content full-width">
		<?php endif;
		else : ?>
			<div id="content" class="site-content container">
		<?php endif;
