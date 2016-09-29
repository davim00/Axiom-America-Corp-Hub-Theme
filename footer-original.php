<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Axiom_America
 */

?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer container" role="contentinfo">
		<div class="row">
		  <div class="site-info col-sm-12">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'axiom-america' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'axiom-america' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'axiom-america' ), 'axiom-america', '<a href="http://www.axiomamerica.com" rel="designer">Axiom America</a>' ); ?>
			</div><!-- .site-info -->
		</div><!-- .row -->
	</footer><!-- #colophon .container -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
