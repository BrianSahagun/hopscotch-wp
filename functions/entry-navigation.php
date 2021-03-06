<?php
// Article Entry Navigation
// Navigates from Single Entry to Single Entry
// Displayed as Next Entry, Previous Entry Actions

// Component: Article Entry Navigation
// Class: article-entry-nav_comp
if ( ! function_exists('hopscotch_article_entry_nav' ) ) :
	function hopscotch_article_entry_nav() {
        global $post_id; 
        if ( ! is_attachment() ) : ?>
            <nav class="comp content_nav article-entry_nav" role="navigation">
                <div class="cr content-nav_cr article-entry-nav_cr">
                    <h2 class="accessible-name article-entry-nav_accessible-name"><?php _e( 'Article Entry Navigation', 'hopscotch' ); ?></h2>
                    <ul class="grp content-nav_grp article-entry-nav_grp">

                        <?php // Next
                        if ( get_next_post_link() ) :
                        ?>
                        <li class="item content-nav_item article-entry-nav_item next-article-entry-nav_item">
                            <span class="label next-entry_label">
                                <span class="label pred_label"><?php _e( 'Next', 'hopscotch' ); ?></span>
                                <span class="label subj_label"><?php _e( 'Entry', 'hopscotch' ); ?></span>
                            </span>
                            <?php next_post_link( '%link', _x( '%title', 'Newer Entry', 'hopscotch' ) ); ?>
                        <?php endif; ?>

                        <?php // Previous
                        if ( get_previous_post_link() ) :
                        ?>
                        <li class="item content-nav_item article-entry-nav_item previous-article-entry-nav_item">     
                            <span class="label previous-entry_label">
                                <span class="label pred_label"><?php _e( 'Previous', 'hopscotch' ); ?></span>
                                <span class="label subj_label"><?php _e( 'Entry', 'hopscotch' ); ?></span>
                            </span>
                            <?php previous_post_link( '%link', _x( '%title', 'Older Entry', 'hopscotch' ) ); ?>
                        <?php endif; ?>

                    </ul>
                </div>
            </nav><!-- article-entry_nav -->
        <?php
        elseif ( wp_attachment_is_image( $post_id ) ) : ?>
            <nav class="comp content_nav article-entry_nav" role="navigation">
                <div class="cr content-nav_cr article-entry-nav_cr">
                    <h2 class="accessible-name article-entry-nav_accessible-name"><?php _e( 'Article Entry Navigation', 'hopscotch' ); ?></h2>
                    <ul class="grp content-nav_grp article-entry-nav_grp">
                        <li class="item content-nav_item article-entry-nav_item next-article-entry-nav_item">
                            <?php next_image_link( false, '<span class="label next-entry_label">' . __( 'Next Image', 'wpsites' ) . '</span>' ); ?>                      
                        <li class="item content-nav_item article-entry-nav_item previous-article-entry-nav_item">
                            <?php previous_image_link( false, '<span class="label previous-entry_label">' . __( 'Previous Image', 'wpsites' ) . '</span>' ); ?>
                    </ul>
                </div>
            </nav><!-- article-entry_nav -->
        <?php
        endif;
    }
endif;


// Component: Comments Entry Navigation
// Class: comments-entry-nav_comp
// Called from: comments.php
if ( ! function_exists( 'hopscotch_comments_entry_nav' ) ) :
    function hopscotch_comments_entry_nav() {
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
        ?>
        <nav class="comp content_nav comments-entry_nav" role="navigation">
            <div class="cr content-nav_cr comments-entry-nav_cr">
                <h5 class="accessible-name comments-entry-nav_accessible-name"><?php _e( 'Comments Navigation', 'hopscotch' ); ?></h5>
                <ul class="grp content-nav_grp comments-entry-nav_grp">

                    <?php // Next
                    if ( get_next_comments_link() ) :
                    ?>
                    <li class="item content-nav_item comments-entry-nav_item next-comments-entry-nav_item">
                        <span class="label next-entry_label">
                            <?php next_comments_link( __( '<span class="label pred_label">Newer</span> <span class="label subj_label">Comments</span>', 'hopscotch' ) ); ?>
                        </span>
                    <?php endif; ?>

                    <?php // Previous
                    if ( get_previous_comments_link() ) :
                    ?>
                    <li class="item content-nav_item comments-entry-nav_item previous-comments-entry-nav_item">
                        <span class="label previous-entry_label">
                            <?php previous_comments_link( __( '<span class="label pred_label">Older</span> <span class="label subj_label">Comments</span>', 'hopscotch' ) ); ?>
                        </span>
                    <?php endif; ?>

                </ul>
            </div>
        </nav><!-- comments-entry_nav -->
        
        <?php
        endif;
    }
endif;