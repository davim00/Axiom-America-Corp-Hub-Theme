<?php
/**
 * The navigation for the site
 *
 * This is the main navigation for the theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Axiom_America
 */

function axiom_america_site_nav() {
  if ( is_front_page() && ! is_home() ) :
    if ( true == get_theme_mod( 'jumbotron_show', true ) ) : ?>
      <nav class="navbar navbar-default navbar-transparent navbar-fixed-top" role="navigation">
    <?php else : ?>
      <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <?php endif; ?>
  <?php else: ?>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <?php endif; ?>
      <div class="container">
        <div class="navbar-header">
          <?php if (has_nav_menu("primary")): ?>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="sr-only">Toggle navigation</span>
          </button>
          <?php endif; ?>
          <span class="site-title">
            <!-- <a class="site-title navbar-brand" href="<?php //echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php //axiom_america_the_custom_logo(); ?></a> -->
            <?php axiom_america_the_custom_logo(); ?>
          </span>
        </div>

        <?php if (has_nav_menu("primary")): ?>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <?php
              wp_nav_menu( array(
                'menu'              => 'primary',
                'theme_location'    => 'primary',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
                'container_id'      => 'navbar',
                'menu_class'        => 'nav navbar-nav navbar-right',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
              );

            endif; ?>
      </div>
      <!-- /.container -->
    </nav>
    <!-- .nav.navbar-default -->
<?php }
