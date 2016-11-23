<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Axiom_America
 */

get_header(); ?>

<?php if( get_theme_mod( 'content_toggle', true) ) : ?>

	<div id="primary" class="content-area col-sm-12">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				// if ( comments_open() || get_comments_number() ) :
				// 	comments_template();
				// endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php else : ?>
	<div class="col-sm-6">
		<h3><?php echo esc_html( get_theme_mod( 'content_title_1', 'Who we are' ) ); ?></h3>
		<p>
			<?php echo esc_html( get_theme_mod( 'content_text_1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.' ) ); ?>
		</p>
	</div>
	<div class="col-sm-6">
	  <h3><?php echo esc_html( get_theme_mod( 'content_title_2', 'What we do' ) ); ?></h3>
		<p>
			<?php echo esc_html( get_theme_mod( 'content_text_2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.' ) ); ?>
		</p>
	</div>
<?php endif;

get_footer();
