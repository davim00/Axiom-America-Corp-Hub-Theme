<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Axiom_America
 */

?>

	</div>
	<!-- #content -->

	<aside id="footer" class="widget-area frontpage-footer-widgets" role="complementary">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<?php dynamic_sidebar( 'sidebar-footer-left' ); ?>
				</div>
				<!-- .col -->
				<div class="col-sm-4">
					<?php dynamic_sidebar( 'sidebar-footer-center' ); ?>
				</div>
				<!-- .col -->
				<div class="col-sm-4">
					<?php dynamic_sidebar( 'sidebar-footer-right' ); ?>
				</div>
				<!-- .col -->
			</div>
		</div>
	</aside>
	<!-- #footer -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="site-info">
						<?php if ( true == get_theme_mod( 'footer_copyright', true ) ) : ?>
							&copy; <?php echo date("Y");
						endif;
						echo ' ' . esc_html( get_theme_mod( 'footer_text', 'Axiom America LLC. All rights reserved.' ) ); ?>
					</div><!-- .site-info -->
				</div>
				<!-- .col -->
			</div>
			<!-- .row -->
		</div>
		<!-- .container -->
		<!-- .site-info -->
	</footer>
	<!-- #colophon -->
	</div>
	<!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
