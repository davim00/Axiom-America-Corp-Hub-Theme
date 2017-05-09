<?php
/**
 * The quote on the front page
 *
 * This is the template that displays a quote on the home page
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Axiom_America
 */

function axiom_america_front_quote() {
  if ( is_front_page() && ! is_home() ) :
    ?>
    <div class="frontpage-quote">
    	<div class="container">
    		<div class="row">
    			<div class="col-sm-12">
    				<blockquote>
    					<?php echo '<p>' . esc_html( get_theme_mod( 'quote_text', 'Quisque malesuada enim a augue dictum, a fermentum enim volutpat. Nam ac tellus nec purus pretium vestibulum. Mauris ultricies sapien eget ornare porta. Aenean lacinia eros nibh, eget viverra lectus volutpat sed.' ) ) . '</p>';
              if ( true == get_theme_mod( 'cite_show', true ) ) :
      					echo '<footer>' . esc_html( get_theme_mod( 'cite_text', 'John Doe, Acme Corp.' ) ) . '</footer>';
              endif; ?>
    				</blockquote>
    			</div>
    			<!-- .col -->
    		</div>
    		<!-- .row -->
    	</div>
    	<!-- .container -->
    </div>
    <!-- .frontpage-quote -->
<?php endif;
}
