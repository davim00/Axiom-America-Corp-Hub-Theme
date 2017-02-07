<?php
/**
 * The template for displaying search forms in Alleno
 *
 * @package alleno-cv
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <div class="input-group">
  	<label class="screen-reader-text" for="s"><?php _e( 'Search', 'alleno-cv' ); ?></label>
    <input type="text" class="form-control search-query" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'alleno-cv' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search', 'label', 'alleno-cv' ); ?>" />
    <span class="input-group-btn"><button type="submit" class="search-submit btn btn-primary" value="<?php echo esc_attr_x( 'Search', 'submit button', 'alleno-cv' ); ?>"><span class="fa fa-search"></span></button></span>
  </div>
</form>
