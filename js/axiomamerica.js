// Bootstrap specific functions and styling
jQuery(document).ready(function() {
    jQuery('.comment-reply-link').addClass('btn btn-sm btn-primary');
    // Basic Styling for buttons
    jQuery('#submit, button[type=submit], html input[type=button], input[type=reset], input[type=submit]').addClass('btn btn-primary');
    jQuery('input[type=submit].search-submit').removeClass('btn-primary');
    jQuery('.nav-previous a, .nav-next a').addClass('btn btn-primary btn-clear');
    jQuery('.page-numbers').addClass('btn btn-primary btn-clear');
    jQuery('span.page-numbers').addClass('active');
    jQuery('.page-links a').addClass('btn btn-primary btn-clear');
    jQuery('.more-link').addClass('btn btn-warning text-right');
    //jQuery('.cancel-reply a').addClass('btn btn-info btn-sm');
    // Basic Styling for forms
    jQuery('p[class*=comment-form]').addClass('form-group');
    jQuery('textarea#comment, .comment-form input#author, .comment-form input#email, .comment-form input#url').addClass('form-control');
    jQuery('textarea#comment').attr('placeholder', 'Comment');
    jQuery('.comment-form input#author').attr('placeholder', 'Name*');
    jQuery('.comment-form input#email').attr('placeholder', 'Email*');
    jQuery('.comment-form input#url').attr('placeholder', 'Website');
    jQuery('.widget_archive p').addClass('form-group');
    jQuery('.widget_archive select#archives-dropdown--1').addClass('form-control');
    // Make all tables have default padding and horizontal borders
    jQuery('table').addClass('table');
    jQuery('table#wp-calendar').addClass('table table-striped');
    // Create Media Lists out of RSS feed
    jQuery('.widget_rss ul').addClass('media-list');
    // Form control
    jQuery('.postform').addClass('form-control');
    // Widgets as panels
    jQuery('.widget ul').addClass('list-group');
    jQuery('.widget ul li').addClass('list-group-item');
    jQuery('.widget.widget_search').removeClass('panel panel-default');
    jQuery('#sociallinks').removeClass('list-group');
    // Typography
    jQuery('.archive-description').addClass('lead');
    // Gallery
    jQuery('.gallery').addClass('row');
    jQuery('.gallery-item').addClass('col-sm-4');
    // Show elements immediately
    jQuery('#submit, .tagcloud, button[type=submit], .comment-reply-link, .widget_rss ul, .postform, table#wp-calendar').show("fast");
    // Shrink navbar when page is scrolled
    jQuery(window).scroll(function() {
        if (jQuery(document).scrollTop() > 50) {
            jQuery('.navbar-fixed-top').addClass('shrink');
            jQuery('.add').hide();
        } else {
            jQuery('.navbar-fixed-top').removeClass('shrink');
            jQuery('.add').show();

        }
    });
});

/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
	var container, button, menu, links, i, len;

	container = document.getElementById( 'site-navigation' );
	if ( ! container ) {
		return;
	}

	button = container.getElementsByTagName( 'button' )[0];
	if ( 'undefined' === typeof button ) {
		return;
	}

	menu = container.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	menu.setAttribute( 'aria-expanded', 'false' );
	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
		menu.className += ' nav-menu';
	}

	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) ) {
			container.className = container.className.replace( ' toggled', '' );
			button.setAttribute( 'aria-expanded', 'false' );
			menu.setAttribute( 'aria-expanded', 'false' );
		} else {
			container.className += ' toggled';
			button.setAttribute( 'aria-expanded', 'true' );
			menu.setAttribute( 'aria-expanded', 'true' );
		}
	};

	// Get all the link elements within the menu.
	links    = menu.getElementsByTagName( 'a' );

	// Each time a menu link is focused or blurred, toggle focus.
	for ( i = 0, len = links.length; i < len; i++ ) {
		links[i].addEventListener( 'focus', toggleFocus, true );
		links[i].addEventListener( 'blur', toggleFocus, true );
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		var self = this;

		// Move up through the ancestors of the current link until we hit .nav-menu.
		while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

			// On li elements toggle the class .focus.
			if ( 'li' === self.tagName.toLowerCase() ) {
				if ( -1 !== self.className.indexOf( 'focus' ) ) {
					self.className = self.className.replace( ' focus', '' );
				} else {
					self.className += ' focus';
				}
			}

			self = self.parentElement;
		}
	}

	/**
	 * Toggles `focus` class to allow submenu access on tablets.
	 */
	( function( container ) {
		var touchStartFn, i,
			parentLink = container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

		if ( 'ontouchstart' in window ) {
			touchStartFn = function( e ) {
				var menuItem = this.parentNode, i;

				if ( ! menuItem.classList.contains( 'focus' ) ) {
					e.preventDefault();
					for ( i = 0; i < menuItem.parentNode.children.length; ++i ) {
						if ( menuItem === menuItem.parentNode.children[i] ) {
							continue;
						}
						menuItem.parentNode.children[i].classList.remove( 'focus' );
					}
					menuItem.classList.add( 'focus' );
				} else {
					menuItem.classList.remove( 'focus' );
				}
			};

			for ( i = 0; i < parentLink.length; ++i ) {
				parentLink[i].addEventListener( 'touchstart', touchStartFn, false );
			}
		}
	}( container ) );
} )();
