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
    if ( get_theme_mod( true == 'jumbotron_show', true ) ) :
    ?>
  <div class="jumbotron jumbotron-front" style="background-image: url(<?php echo esc_url( bloginfo('template_directory') . '/images/BlurredBackground.jpg' ); ?>);">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h1 class="text-center<?php if ( 'none' == get_theme_mod( 'jumbotron_show_button', 'one') ) : echo esc_html( ' no-buttons' ); endif; ?>"><?php echo get_theme_mod( 'jumbotron_header', 'We make great things.' ); ?></h1>
        </div>
      </div>
      <?php if ( 'one' == get_theme_mod( 'jumbotron_show_button', 'one') ) : ?>
      <div class="row row-centered">
        <div class="col-sm-4 col-centered">
          <a href="<?php echo get_theme_mod( 'jumbotron_button_url', ''); ?>" class="btn btn-primary btn-lg btn-block btn-clear"><?php echo __( get_theme_mod( 'jumbotron_button_text', 'Find out more'), 'axiom-america' ); ?></a>
        </div>
      </div>
    <?php elseif ( 'two' == get_theme_mod( 'jumbotron_show_button', 'one') ) : ?>
      <div class="row row-centered">
        <div class="col-sm-4 col-centered">
          <a href="<?php echo esc_url( get_theme_mod( 'jumbotron_button1_url', '') ); ?>" class="btn btn-primary btn-lg btn-block btn-clear"><?php echo __( get_theme_mod( 'jumbotron_button1_text', 'Find out more'), 'axiom-america' ); ?></a>
        </div>
        <div class="col-sm-4 col-centered">
          <a href="<?php echo esc_url( get_theme_mod( 'jumbotron_button2_url', '') ); ?>" class="btn btn-primary btn-lg btn-block btn-clear"><?php echo __( get_theme_mod( 'jumbotron_button2_text', 'Find out more'), 'axiom-america' ); ?></a>
        </div>
      </div>
    <?php endif; ?>
    </div>
  </div>
<?php endif;
endif;
}
