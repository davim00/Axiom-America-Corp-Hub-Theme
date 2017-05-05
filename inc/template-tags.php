<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Axiom_America
 */

if ( ! function_exists( 'axiom_america_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function axiom_america_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'axiom-america' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	/*$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'axiom-america' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);*/

	echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'axiom_america_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function axiom_america_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'axiom-america' ) );
		if ( $categories_list && axiom_america_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'axiom-america' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'axiom-america' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'axiom-america' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'axiom-america' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'axiom-america' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function axiom_america_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'axiom_america_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'axiom_america_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so axiom_america_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so axiom_america_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in axiom_america_categorized_blog.
 */
function axiom_america_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'axiom_america_categories' );
}
add_action( 'edit_category', 'axiom_america_category_transient_flusher' );
add_action( 'save_post',     'axiom_america_category_transient_flusher' );

/**
 * Modify the Read More link
 *
 * @link https://codex.wordpress.org/Customizing_the_Read_More
 */
 function modify_read_more_link() {
    return '<div class="read-more-link"><a class="more-link" href="' . get_permalink() . '">Read more</a></div>';
	}
add_filter( 'the_content_more_link', 'modify_read_more_link' );

/**
 * Modify the post password form output
 */
add_filter( 'the_password_form', 'custom_password_form' );
function custom_password_form() {
	global $post;
	$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
	$output = '<form class="post-password-form form-inline" action="' . esc_url( site_url('/wp-login.php?action=postpass', 'login_post') ) . '" method="post"><p>' . __( 'This content is password protected. To view it please enter your password below:' ) . '</p><div class="form-group"><label for="' . $label . '">Password</label><input name="post-password" id="' . $label . '" type="password" placeholder="Password" class="form-control"/></div><div class="password-submit"><input type="submit" name="Submit" class="btn btn-warning" value="' . esc_attr__( "Submit" ) . '" /></div></form>';

	return $output;
};

/**
 * Format the comment output
 */
function axiom_america_comments( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' : ?>
            <li <?php comment_class(); ?> id="comment<?php comment_ID(); ?>">
            <div class="back-link"><?php comment_author_link(); ?></div>
        <?php break;
        default : ?>
            <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
            	<article <?php comment_class(); ?> class="comment">
								<div class="row">
								  <div class="col-sm-3 comment-meta">
								    <div class="comment-author vcard">
								    	<?php echo get_avatar( $comment, 100 ); ?>
											<span class="comment-author-name"><?php comment_author(); ?></span>
								    </div>
										<div class="comment-metadata">
											<time <?php comment_time( 'c' ); ?> class="comment-time-date">
												<span class="comment-date"><?php comment_date(); ?></span>
												<span class="comment-time"><?php comment_time(); ?></span>
											</time>
										</div>
										<div class="edit-link">
											<?php edit_comment_link( 'Edit' ); ?>
										</div>
								  </div>
									<div class="col-sm-9 comment-content">
									  <?php comment_text(); ?>
									</div>
								</div>
								<div class="reply">
									<?php comment_reply_link( array_merge( $args, array(
            'reply_text' => 'Reply',
            'depth' => $depth,
            'max_depth' => $args['max_depth']
            ) ) ); ?>
								</div>
							</article><!-- #comment-<?php comment_ID(); ?>-->
        <?php // End the default styling of comment
        break;
    endswitch;
}

/**
 * Display the featured image and set a fallback image
 * if there is not featured image.
 */
 function axiom_america_post_thumbnail() {
	 if ( has_post_thumbnail() ) {
		 the_post_thumbnail();
	 } else {
		 ?>	<img src="<?php echo esc_url( bloginfo('template_directory') . '/images/featured-img-fallback.jpg' ); ?>" alt="<?php the_title(); ?>" />
		<?php ;
 	 }
 }

 /**
  * Display the site logo.
  */
 function axiom_america_the_custom_logo() {

	 if ( function_exists( 'the_custom_logo' ) ) {
 		the_custom_logo();
 	}
 }

// Make the custom logo play nicely with Bootstrap
 add_filter('get_custom_logo','change_logo_class');

 function change_logo_class($html) {
	 $html = str_replace('custom-logo-link', 'navbar-brand', $html);
	 return $html;
 }

 add_filter( 'get_custom_logo', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}
