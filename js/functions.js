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
