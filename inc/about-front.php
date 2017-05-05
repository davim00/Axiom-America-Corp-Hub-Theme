<?php
/**
 * Comapny info on the front page
 *
 * This is the template that displays the short blurbs about the company on the home page
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Axiom_America
 */

function axiom_america_front_about() {
  if ( is_front_page() && ! is_home() ) :
    if ( true == get_theme_mod( 'about_show', true ) ) :
    ?>
    <div class="frontpage-about">
    <div class="container">
      <?php if ( 'one' == get_theme_mod( 'about_number', 'two' ) ) : ?>
    	   <div class="row row-centered one-section">
      <?php else : ?>
        <div class="row">
      <?php endif;

      if ( 'one' == get_theme_mod( 'about_number', 'two' ) ) : ?>

    		<div class="col-sm-6 col-centered">
          <?php
    			echo '<h2>' . esc_html( get_theme_mod( 'about_title', 'Who we are' ) ) . '</h2>';
          echo '<p>' . esc_html( get_theme_mod( 'about_text', 'Nam imperdiet at elit eu tincidunt. Curabitur aliquet libero eget quam euismod, nec porttitor augue auctor. Vivamus quis orci vitae velit consectetur tincidunt in sit amet nisl. Donec ultricies sit amet urna eu tristique. Morbi sed aliquet ante.
    				Vestibulum pulvinar et dolor id malesuada. Vestibulum in purus porttitor, placerat justo sit amet, interdum neque. Nulla et egestas velit.' ) ) . '</p>'; ?>
        </div>
        <!-- .col -->

      <?php else : ?>

        <div class="col-sm-6">
          <?php
  			  echo '<h2>' . esc_html( get_theme_mod( 'about_title1', 'Who we are' ) ) . '</h2>';
          echo '<p>' . esc_html( get_theme_mod( 'about_text1', 'Nam imperdiet at elit eu tincidunt. Curabitur aliquet libero eget quam euismod, nec porttitor augue auctor. Vivamus quis orci vitae velit consectetur tincidunt in sit amet nisl. Donec ultricies sit amet urna eu tristique. Morbi sed aliquet ante. Vestibulum pulvinar et dolor id malesuada. Vestibulum in purus porttitor, placerat justo sit amet, interdum neque. Nulla et egestas velit.' ) ) . '</p>'; ?>
        </div>
        <!-- .col -->
        <div class="col-sm-6">
          <?php
  			  echo '<h2>' . esc_html( get_theme_mod( 'about_title2', 'What we do' ) ) . '</h2>';
          echo '<p>' . esc_html( get_theme_mod( 'about_text2', 'Aliquam sollicitudin consequat felis, non ornare nibh ullamcorper a. Integer malesuada felis turpis, id imperdiet orci rhoncus ac. Aenean molestie dui in semper hendrerit. Nunc dolor sem, tincidunt in justo ac, semper vulputate velit. Proin in pellentesque elit. Morbi sit amet urna cursus, interdum nisi a, lobortis magna. Quisque fringilla ipsum tortor, non varius nisi molestie et.' ) ) . '</p>'; ?>
        </div>
        <!-- .col -->

  		<?php endif; ?>

    	</div>
    	<!-- .row -->
    </div>
    <!-- .container -->
    </div>
    <!-- .vfrontpage-about -->
<?php endif;
endif;
}
