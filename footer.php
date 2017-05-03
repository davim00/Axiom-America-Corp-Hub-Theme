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
						<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'axiom-america' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'axiom-america' ), 'WordPress' ); ?></a>
						<span class="sep"> | </span>
						<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'axiom-america' ), 'axiom-america', '<a href="https://automattic.com/" rel="designer">Axiom America, LLC</a>' ); ?>
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
