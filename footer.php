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

if( is_home() || is_front_page() ) : ?>
				</div><!-- .home-content -->
			</div><!-- .container -->
		</div><!-- .row -->
<?php else : ?>
			</div><!-- .row -->
		</div><!-- .container -->
<?php endif; ?>

	</div><!-- #content -->

	<?php
	// Quote Section
	do_action( 'homepage_quote_action' );
	?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="row">
			  <div class="site-info col-sm-12">
					<?php printf( esc_html__( '&copy; ' . date( 'Y' ) . ' ' . get_theme_mod( 'copyright_text', 'Axiom America' ) ) ); ?>
				</div><!-- .site-info -->
			</div><!-- .row -->
		</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<script type="text/javascript">
jQuery(window).scroll(function() {
  if (jQuery(document).scrollTop() > 50) {
    jQuery('nav').addClass('shrink');
  } else {
    jQuery('nav').removeClass('shrink');
  }
});
</script>

<?php wp_footer(); ?>

</body>
</html>
