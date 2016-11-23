<?php

  if( ! defined( 'ABSPATH') ) exit;

  /**
   * Jumbotron for the home page
   *
   * Since 1.0
   */

   if( ! function_exists( 'homepage_quote' ) ) {
     function homepage_quote() {

      if( is_front_page() ) :

        if( get_theme_mod( 'quote_toggle', true) ) : ?>

            <!-- Quote -->
            <div class="homepage-quote">
              <div class="container">
                <div class="row">
                  <div class="col-sm-12">
                    <blockquote>
                      <p>
                        <?php echo esc_html( get_theme_mod( 'quote_text' ) ); ?>
                      </p>
                      <footer>
                        <?php echo esc_html( get_theme_mod( 'quote_cite' ) ); ?>
                      </footer>
                    </blockquote>
                  </div>
                </div><!-- .row -->
              </div><!-- .container -->
            </div><!-- .homepage-quote -->

        <?php endif;
      endif;

    }
  }

add_action( 'homepage_quote_action', 'homepage_quote', 10 ); ?>
