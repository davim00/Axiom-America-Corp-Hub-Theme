<?php

  if( ! defined( 'ABSPATH') ) exit;

  /**
   * Jumbotron for the home page
   *
   * Since 1.0
   */

   if( ! function_exists( 'jumbotron_hero' ) ) {
     function jumbotron_hero() {
       if( get_theme_mod( 'hero_image_toggle', true) ) {
         if( get_theme_mod( 'hero_image_visibility', 'homepage' ) == 'homepage' && is_home() ||
          get_theme_mod( 'hero_image_visibility', 'frontpage' ) == 'frontpage' && is_front_page() ) {

            if ( get_theme_mod( 'hero_image_toggle', true ) ) : ?>

            <!-- Jumbotron -->
            <div class="hero">
              <div class="jumbotron" style="background-image: url('<?php echo esc_url( get_theme_mod( 'hero_image_background_image', '' ) ); ?>'); background-color: <?php echo esc_url( get_theme_mod( 'hero_image_background_color', '#50526d' ) ); ?>;">
                <div class="container">
                  <h2><?php echo esc_attr( get_theme_mod( 'hero_image_title', 'A Remarkable Website' ) ); ?></h2>
                  <?php if ( get_theme_mod( 'hero_image_button_01', true ) ) : ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'hero_image_button_01_link', '#' ) ); ?>" class="btn btn-primary btn-lg"><?php echo esc_attr( get_theme_mod( 'hero_image_button_01_text', 'Button 1' ) ); ?></a>
                  <?php endif;

                  if ( get_theme_mod( 'hero_image_button_02', true ) ) : ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'hero_image_button_02_link', '#' ) ); ?>" class="btn btn-primary btn-lg"><?php echo esc_attr( get_theme_mod( 'hero_image_button_02_text', 'Button 2' ) ); ?></a>
                  <?php endif;

                  $output = '';
                  if ( function_exists( 'get_theme_mod' ) )
                    $output = '<img class="img-responsive" src="' . get_theme_mod( 'hero_image_foreground_image', '' ) . '" />';
                  if ( empty( $output ) )
                    $output = '';
                  echo $output; ?>
                </div>
              </div><!-- Jumbotron -->
            </div><!-- .hero -->

          <?php else : ?>

              <div class="top-nav-space"></div>

            <?php endif;
          }
       }
     }
   }

   add_action( 'jumbotron_hero_action', 'jumbotron_hero', 10 ); ?>
