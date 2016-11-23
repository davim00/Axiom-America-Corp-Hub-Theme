<?php

  if( ! defined( 'ABSPATH') ) exit;

  /**
   * Page
   *
   * Since 1.0
   */

   if( ! function_exists( 'page_title' ) ) {
     function page_title() {

       if( ! is_front_page() ) : ?>

       <div class="axiom-page-title">
         <div class="container">
           <div class="row">
             <div class="col-sm-12">
               <?php if( is_home() ) : ?>
               <h2><?php echo apply_filters( 'the_title', get_the_title( get_option( 'page_for_posts' ) ) ); ?></h2>
               <?php else :
                 global $post ?>
               <h2><?php echo get_the_title($post->ID); ?></h2>
               <?php endif; ?>
             </div>
           </div>
         </div>
       </div>

       <?php endif;
     }
   }

   add_action( 'page_title_action', 'page_title', 10 ); ?>
