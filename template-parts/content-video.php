<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Axiom_America
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_single() ) :
			the_title( '<h2 class="entry-title">', '</h2>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php axiom_america_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="post-thumbnail">
			<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail();
			}
			?>
		</div>

		<?php
		if ( ! has_post_thumbnail() ) {
		?>
		<div class="no-thumbnail">
			<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Read more %s', 'axiom-america' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
			 ?>
		</div>
	<?php } else {
		the_content( sprintf(
			/* translators: %s: Name of current post. */
			wp_kses( __( 'Read more %s', 'axiom-america' ), array( 'span' => array( 'class' => array() ) ) ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		) );
	}


			wp_link_pages( array(
				'before' => '<nav class="post-page-navigation"><div class="page-links">' . esc_html__( 'Pages:', 'axiom-america' ),
				'after'  => '</div></nav>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php axiom_america_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
