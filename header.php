<?php
/**
 * The header for our theme.
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

		<?php
		// Site menu
		do_action( 'site_menu_action' );
		?>

	</header><!-- #masthead -->

	<?php
	// Hero Section
	do_action( 'jumbotron_hero_action' );
	?>

	<?php
	// Featured posts
	do_action( 'featured_posts_action' );
	?>

	<?php if( is_front_page() ) :
		if( get_theme_mod( 'content_toggle', true) ) : ?>
		<div id="content" class="site-content">
			<div class="home-content">
				<div class="container">
					<div class="row">
		<?php else : ?>
		<div class="frontpage-content">
			<div class="container">
				<div class="row">
		<?php endif;
		else : ?>
		<div id="content" class="site-content">
			<div class="container">
				<div class="row">
		<?php endif; ?>
