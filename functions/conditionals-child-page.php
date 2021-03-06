<?php
// Is Child Conditional
// Usage: if ( is_child( 'parent-page' ) ) echo 'I am a child of Parent Page';
// Note: This affects both the page in the condition and its children.
// Source: http://www.kevinleary.net/wordpress-is_child-for-advanced-navigation/

function is_child( $parent = '' ) {
    global $post;

    $parent_obj = get_page( $post->post_parent, ARRAY_A );
    $parent = (string) $parent;
    $parent_array = (array) $parent;

    if ( in_array( (string) $parent_obj['ID'], $parent_array ) ) {
        return true;
    } elseif ( in_array( (string) $parent_obj['post_title'], $parent_array ) ) {
        return true;    
    } elseif ( in_array( (string) $parent_obj['post_name'], $parent_array ) ) {
        return true;
    } else {
        return false;
    }
}