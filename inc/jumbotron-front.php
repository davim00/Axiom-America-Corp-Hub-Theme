<?php
/**
 * A Jumbotron to show on the front page
 *
 * This is the template that displays a jumbotron on the home page
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Axiom_America
 */

function axiom_america_front_jumbotron() {
  if ( is_front_page() && ! is_home() ) :
    ?>
  <div class="jumbotron jumbotron-front" style="background-image: url(images/BlurredBackground.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h1 class="text-center">Evolving textiles through technology.</h1>
        </div>
      </div>
      <div class="row row-centered">
        <div class="col-sm-4 col-centered">
          <a href="#" class="btn btn-primary btn-lg btn-block btn-clear">Find out more</a>
        </div>
        <div class="col-sm-4 col-centered">
          <a href="#" class="btn btn-primary btn-lg btn-block btn-clear">Find out more</a>
        </div>
      </div>
    </div>
  </div>
<?php endif;
}
