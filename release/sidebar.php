<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Axiom_America
 */

if ( ! is_active_sidebar( 'sidebar-page' ) ) {
	return;
}
?>

	<aside id="secondary" class="widget-area col-sm-4" role="complementary">
		<?php dynamic_sidebar( 'sidebar-page' ); ?>
	</aside>
	<!-- #secondary -->
</div>
<!-- .row -->
