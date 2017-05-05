<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Axiom_America
 */

?>

<div class="col-sm-4">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="post-thumbnail">
			<?php axiom_america_post_thumbnail();	?>
		</div>
		<header class="entry-header">
			<?php
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			?>
		</header><!-- .entry-header -->

		<div class="row row-centered">
			<div class="col-sm-6 col-centered">
				<a href="<?php echo esc_url( get_permalink() ); ?>" class="btn btn-warning btn-block"><?php echo __( 'Read more', 'axiom-america' ); ?></a>
			</div>
		</div>
	</article><!-- #post-## -->
</div>
<!-- .col -->
