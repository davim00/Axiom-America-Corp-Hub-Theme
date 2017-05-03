<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Axiom_America
 */

get_header(); ?>

<div class="row">
	<div class="col-sm-4">
		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
	</div>
	<!-- .col -->
	<div class="col-sm-4">
		<article id="post-1241" class="post-1241 post type-post status-publish format-standard sticky hentry category-uncategorized tag-sticky-2 tag-template">
			<div class="post-thumbnail">
				<img width="207" height="400" src="uploads/2013/03/featured-image-vertical.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="Horizontal Featured Image" srcset="uploads/2013/03/featured-image-vertical.jpg 300w, uploads/2013/03/featured-image-vertical-155x300.jpg 155w"
								sizes="(max-width: 207px) 100vw, 207px" /> </div>
			<header class="entry-header">
				<h2 class="entry-title"><a href="/2012/01/07/template-sticky/" rel="bookmark" class="stupid">Template: Sticky</a></h2>
				<!-- .entry-meta -->
			</header>
			<!-- .entry-header -->
			<div class="row row-centered">
				<div class="col-sm-6 col-centered">
					<a href="#" class="btn btn-warning btn-block">Read More</a>
				</div>
			</div>
		</article>
		<!-- #post-## -->
	</div>
	<!-- .col -->
</div>
<!-- .row -->
<div class="row row-centered frontpage-articles-button">
	<div class="col-sm-4 col-centered">
		<a href="#" class="btn btn-primary btn-clear btn-lg btn-block">More news and releases</a>
	</div>
</div>
</div>
<!-- .container -->

<div class="frontpage-quote">
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<blockquote>
				<p>Quisque malesuada enim a augue dictum, a fermentum enim volutpat. Nam ac tellus nec purus pretium vestibulum. Mauris ultricies sapien eget ornare porta. Aenean lacinia eros nibh, eget viverra lectus volutpat sed. </p>
				<footer>
					John Doe, <cite>Acme Corp.</cite>
				</footer>
			</blockquote>
		</div>
		<!-- .col -->
	</div>
	<!-- .row -->
</div>
<!-- .container -->
</div>
<!-- .frontpage-quote -->

<div class="frontpage-about">
<div class="container">
	<div class="row">
		<div class="col-sm-6">
			<h2>Who we are</h2>
			<p>Nam imperdiet at elit eu tincidunt. Curabitur aliquet libero eget quam euismod, nec porttitor augue auctor. Vivamus quis orci vitae velit consectetur tincidunt in sit amet nisl. Donec ultricies sit amet urna eu tristique. Morbi sed aliquet ante.
				Vestibulum pulvinar et dolor id malesuada. Vestibulum in purus porttitor, placerat justo sit amet, interdum neque. Nulla et egestas velit.</p>
		</div>
		<!-- .col -->
		<div class="col-sm-6">
			<h2>What we do</h2>
			<p>Aliquam sollicitudin consequat felis, non ornare nibh ullamcorper a. Integer malesuada felis turpis, id imperdiet orci rhoncus ac. Aenean molestie dui in semper hendrerit. Nunc dolor sem, tincidunt in justo ac, semper vulputate velit. Proin in pellentesque
				elit. Morbi sit amet urna cursus, interdum nisi a, lobortis magna. Quisque fringilla ipsum tortor, non varius nisi molestie et.</p>
		</div>
		<!-- .col -->
	</div>
	<!-- .row -->
</div>
<!-- .container -->
</div>
<!-- .vfrontpage-about -->

<div class="row">
	<div id="primary" class="content-area col-sm-8">
		<main id="main" class="site-main" role="main">



		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
