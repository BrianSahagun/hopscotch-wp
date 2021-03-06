<?php
// Body Class
// Conditionals to add different classes to the body tag

function hopscotch_body_class( $classes ) {
    global $post;
    
    // Default
    $classes[] = 'body';

    // Masthead Sidebar Class
    if ( is_active_sidebar( 'masthead-sidebar' ) )
        $classes[] = 'hs-state__masthead-sidebar--enabled';
    else
        $classes[] = 'hs-state__masthead-sidebar--disabled';

    // Content Header Sidebar Class
    if ( is_active_sidebar( 'content-header-sidebar' ) )
        $classes[] = 'hs-state__content-header-sidebar--enabled';
    else
        $classes[] = 'hs-state__content-header-sidebar--disabled';

    // Content Sidebar Class
    if ( is_active_sidebar( 'content-sidebar' ) )
        $classes[] = 'hs-state__content-sidebar--enabled';
    else
        $classes[] = 'hs-state__content-sidebar--disabled';

    // Colophon Sidebar Class
    if ( is_active_sidebar( 'colophon-sidebar' ) )
        $classes[] = 'hs-state__colophon-sidebar--enabled';
    else
        $classes[] = 'hs-state__colophon-sidebar--disabled';
    
    //------------------------- Comments
    if ( is_singular() ) {
        $num_comments = get_comments_number();

        $comment_count_class = 'hs-type__article-entry-comments--zero';
        $comment_number = (int) get_comments_number( get_the_ID() );

        // Defines the class depending on the comment count
        if ( 1 === $comment_number )
            $classes[] = 'hs-type__article-entry-comments--single';
        elseif ( 1 < $comment_number )
            $classes[] = 'hs-type__article-entry-comments--multiple';

        // CSS Class for Closed or Open Comments
        if ( comments_open( get_the_ID() ) )
            $classes[] = 'hs-state__article-entry-comments--open';
        else
            $classes[] = 'hs-state__article-entry-comments--closed';

        if ( get_comments_number( get_the_ID() ) )
            $classes[] = 'hs-state__article-entry-comments--populated';
        else
            $classes[] = 'hs-state__article-entry-comments--empty';
    }

    return $classes;
}
add_filter('body_class','hopscotch_body_class');