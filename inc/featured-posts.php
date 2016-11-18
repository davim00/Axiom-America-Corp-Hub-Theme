<?php

  if( ! defined( 'ABSPATH') ) exit;

  /**
   * Featured posts for the home page
   *
   * Since 1.0
   */

   if( ! function_exists( 'featured_posts' ) ) {
     function featured_posts() {

      if( is_home() || is_front_page() ) :

        if( get_theme_mod( 'featured_posts_toggle', true) ) : ?>

        <?php if ( have_posts() ) : ?>

          <!-- Featured posts -->
          <div class="featured-posts">
            <div class="container">
              <div class="row row-centered">

                <?php
                $postcat = get_theme_mod('featured_posts_category', 1);
                $postcount = get_theme_mod('featured_posts_number', 3);
                $args = array(
                  'cat' => $postcat,
                  'posts_per_page' => $postcount
                );
                $catquery = new WP_Query( $args );
                ?>

                <?php while($catquery->have_posts()) : $catquery->the_post();	?>

                <div class="col-sm-4 col-centered">
                  <div class="featured-post-home">
                    <?php if( has_post_thumbnail() ): ?>
                    <div class="featured-post-thumbnail">
                      <a href="<?php the_permalink(); ?>">
                        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" />
                      </a>
                    </div>
                    <?php else: ?>
                    <div class="featured-post-thumbnail">
                      <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo get_stylesheet_directory_uri() . '/images/thumb_placeholder.jpg'; ?>" alt="<?php the_title(); ?>" />
                      </a>
                    </div>
                    <?php endif; ?>
                    <h3 class="entry-title"><?php the_title(); ?></h3>
                    <div class="featured-post-readmore">
                      <p>
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More</a>
                      </p>
                    </div>
                  </div>
                </div>

                <?php endwhile; ?>

                <?php wp_reset_query(); ?>

              </div><!-- .container -->
            </div><!-- .featured-posts -->

          <?php endif;

        endif;

      endif;

    }
  }

   add_action( 'featured_posts_action', 'featured_posts', 10 ); ?>
