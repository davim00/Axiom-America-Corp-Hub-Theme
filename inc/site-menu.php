<?php

  if( ! defined( 'ABSPATH') ) exit;

  /**
   * Site nav menu
   *
   * Since 1.0
   */
   if( ! function_exists( 'site_menu' ) ) {
     function site_menu() {

       if( get_theme_mod( 'hero_image_visibility', 'homepage' ) == 'homepage' && is_home() ||
         get_theme_mod( 'hero_image_visibility', 'frontpage' ) == 'frontpage' && is_front_page() ) :

         if( get_theme_mod( 'hero_image_toggle', true) ) : ?>
          <nav class="navbar navbar-default navbar-transparent navbar-fixed-top" role="navigation">
         <?php else: ?>
          <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
         <?php endif;

        else : ?>
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <?php endif; ?>
        
           <div class="container">
             <!-- Brand and toggle get grouped for better mobile display -->
               <div class="navbar-header">
                 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                   <span class="sr-only">Toggle navigation</span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                 </button>
                 <?php axiomamerica_custom_logo() ?>
                 <?php if (!has_custom_logo()) {
                 $description = get_bloginfo( 'description', 'display' );
                 if ( $description || is_customize_preview() ) : ?>
                   <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                 <?php
                 endif;
                 } ?>
               </div>

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
                   ?>
               </div>
           </nav>
      <?php
    }
  }

   add_action( 'site_menu_action', 'site_menu', 10 ); ?>
