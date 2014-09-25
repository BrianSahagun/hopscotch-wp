<?php

//------------------------- Breadcrumbs
// Displays the parent pages of a page 

function hopscotch_breadcrumbs() {
    global $post;
    
    if ( ( is_page() && $post->post_parent > 0 ) || is_search() ) {

        $ancestors = get_post_ancestors($post);

        if ( $ancestors ) {
            $ancestors = array_reverse($ancestors);
            ?>
            <div class="action-items breadcrumbs">
            <p class="assistive-text">Breadcrumbs:</p>
            <ul class="action-list breadcrumb-list">
            
            <?php
            foreach ($ancestors as $crumb) {
                echo '<li class="action-item breadcrumb-item"><a href="'.get_permalink($crumb).'">'.get_the_title($crumb).'</a></li>';
            }
            ?>
            </ul>
            </div>
        <?php
        }
        
    }
    
}

        /*
        if (is_single()) {
            $category = get_the_category();
            echo '<ul class="action-list breadcrumb-list">';
            echo '<li class="action-item breadcrumb-item"><a href="'.get_category_link($category[0]->cat_ID).'">'.$category[0]->cat_name.'</a></li>';
        }

        if (is_category()) {
            $category = get_the_category();
            echo '<ul class="action-list breadcrumb-list">';
            echo '<li class="action-item breadcrumb-item">'.$category[0]->cat_name.'</li>';
        }


    } elseif (is_front_page()) {

        $ancestors = get_post_ancestors($post);
        echo '<div class="action-items breadcrumbs">';

        if ($ancestors) {
            $ancestors = array_reverse($ancestors);
            echo '<ul class="action-list breadcrumb-list">';

            foreach ($ancestors as $crumb) {
                echo '<li class="action-item breadcrumb-item"><a href="'.get_permalink($crumb).'">'.get_the_title($crumb).'</a></li>';
            }
        }
        echo '</ul>';
        echo '</div>';
    } */