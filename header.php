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
	// do_action( 'featured_posts_action' );
	?>

	<!-- Featured posts -->
	<div class="featured-posts">
		<div class="container">
		  <div class="row">
		    <div class="col-sm-4">
		      <div class="featured-post-home">
						<div class="featured-post-thumbnail">
							<img width="644" height="400" src="http://axiomamerica.dev/wp-content/uploads/2013/01/photo-1478059425650-ca13d6d422f4-644x400.jpg" alt="" />
						</div>
						<h3 class="entry-title">Sticky</h3>
						<div class="featured-post-readmore">
							<p>
								<a href="#" class="btn btn-primary">Read More</a>
							</p>
						</div>
		      </div>
		    </div>
				<div class="col-sm-4">
		      <div class="featured-post-home">
						<div class="featured-post-thumbnail">
							<img width="644" height="400" src="http://axiomamerica.dev/wp-content/uploads/2013/01/photo-1478059425650-ca13d6d422f4-644x400.jpg" alt="" />
						</div>
						<h3 class="entry-title">Sticky</h3>
						<div class="featured-post-readmore">
							<p>
								<a href="#" class="btn btn-primary">Read More</a>
							</p>
						</div>
		      </div>
		    </div>
				<div class="col-sm-4">
		      <div class="featured-post-home">
						<div class="featured-post-thumbnail">
							<img width="644" height="400" src="http://axiomamerica.dev/wp-content/uploads/2013/01/photo-1478059425650-ca13d6d422f4-644x400.jpg" alt="" />
						</div>
						<h3 class="entry-title">Sticky</h3>
						<div class="featured-post-readmore">
							<p>
								<a href="#" class="btn btn-primary">Read More</a>
							</p>
						</div>
		      </div>
		    </div>
		  </div><!-- .row -->
			<div class="row">
			  <div class="col-sm-12">
			    <div class="featured-posts-blog-link">
			    	<a href="#" class="btn btn-primary btn-blog-link btn-lg">View All News and Press Releases</a>
			    </div>
			  </div>
			</div>
		</div><!-- .container -->
	</div><!-- .featured-posts -->

	<div id="content" class="site-content">
		<div class="container">
			<div class="row">
