<?php

  if( ! defined( 'ABSPATH') ) exit;

  /**
   * Page
   *
   * Since 1.0
   */

   if( ! function_exists( 'axiom_breadcrumbs' ) ) {
     function axiom_breadcrumbs() {

       if( ! is_front_page() ) : ?>

       <div class="axiom-page-title">
         <div class="container">
           <div class="row">
             <div class="col-sm-12">
               <?php custom_breadcrumbs(); ?>
             </div>
           </div>
         </div>
       </div>

       <?php endif;
     }
   }

   add_action( 'axiom_breadcrumbs_action', 'axiom_breadcrumbs', 10 ); ?>
