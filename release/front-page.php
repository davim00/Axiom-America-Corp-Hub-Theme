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

get_header();

if ( true == get_theme_mod( 'featured_posts_show', true ) ) : ?>

	<div class="row">
		<div class="frontpage-articles">

				<?php
				if ( have_posts() ) :

					if ( is_home() && ! is_front_page() ) : ?>
						<header>
							<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
						</header>

					<?php
					endif;

					global $query_string;

					/* Start the Loop */
					$postcat = get_theme_mod( 'featured_posts_cat', 1 );
					$postnumber = 3;
					$args = array(
						'posts_per_page' => $postnumber,
						'cat' => $postcat,
					);
					$catquery = new WP_Query( $args );


					while($catquery->have_posts()) : $catquery->the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */

						get_template_part( 'template-parts/content', 'frontpage' );

					endwhile;

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>

		</div>
		<!-- .frontpage-articles -->
	</div>
	<!-- .row -->

	<div class="row row-centered frontpage-articles-button">
		<div class="col-sm-4 col-centered">
			<a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>" class="btn btn-primary btn-clear btn-lg btn-block">More news and releases</a>
		</div>
	</div>
</div>
<!-- .container -->

<?php endif;

if ( true == get_theme_mod( 'quote_show', true ) ) :

	axiom_america_front_quote();

endif;

if ( true == get_theme_mod( 'about_show', true ) ) :

	axiom_america_front_about();

endif; ?>

<div class="row">
	<div id="primary" class="content-area col-sm-8">
		<main id="main" class="site-main" role="main">



		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
