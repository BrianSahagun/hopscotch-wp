            <!--
            Constructor: Colophon
            Class: colophon
            -->
            <footer id="colophon" class="comp colophon" role="contentinfo">
                <section class="cr colophon_cr">
                    <h2 class="accessible-name colophon_accessible-name"><?php _e( 'Colophon', 'hopscotch' ); ?></h2>
                    <div class="ct colophon_ct">
                        
                        <?php if ( is_active_sidebar( 'colophon-sidebar' ) ) : ?>
                        <!--
                        Sub-Constructor: Colophon Sidebar
                        Class: colophon_sidebar
                        -->
                        <aside id="colophon_sidebar" class="sidebar colophon_sidebar" role="complementary">
                            <div class="cr colophon-sidebar_cr">
                                <h3 class="accessible-name colophon-sidebar_accessible-name"><?php _e( 'Colophon Sidebar', 'hopscotch' ); ?></h3>
                                <div class="ct colophon-sidebar_ct widget-area">
                                    <?php dynamic_sidebar( 'colophon-sidebar' ); ?>
                                </div><!-- colophon-sidebar_ct -->
                            </div>
                        </aside><!-- colophon_sidebar -->
                        <?php endif; ?>
                        
                        <!--
                        Component: Show Top
                        Class: show-top_comp
                        -->
                        <div class="comp show-top_comp">    
                            <div class="cr show-top_cr">
                                <a class="axn show-top_axn" href="#top" title="Show Top">
                                    <span class="label show-top_label">
                                        <span class="text show-top-label_text"><?php _e( 'Show Top', 'hopscotch' ); ?></span>
                                        <svg class="icon arrow-left_icon" width="0" height="0"><use xlink:href="#arrow-left_icon"></use></svg>
                                    </span>
                                </a>
                            </div>
                        </div><!-- show-top_comp -->
                        
                        <?php get_template_part( 'components/web-product-info' ); ?>
                        
                    </div><!-- colophon_ct -->
                </section>
            </footer><!-- colophon -->
        </div>
        
        <?php wp_footer(); ?>
    
    </body>
</html>