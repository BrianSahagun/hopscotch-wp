<!--
Component: Search
Class: search
-->
<div class="comp search_comp">
    <div class="cr search_cr">
        <form class="search_form" action="<?php echo home_url( '/' ); ?>" method="get" role="search">
            <fieldset>
                <legend><?php _e( 'Search Form', 'hopscotch'); ?></legend>
                <div class="field">
                    <div class="field_cr">
                        <label class="search-form_label" for="search-form_input">
                            <span class="label"><?php _e( 'Search for', 'hopscotch'); ?></span>
                            <svg class="icon search_icon" width="0" height="0"><use xlink:href="#search_icon"></use></svg>
                        </label>
                        <input id="search-form_input" class="search-form_input" type="search" name="s" placeholder="Search" required>
                    </div>
                </div><!-- field -->
                <div class="field_axn">
                    <div class="field-axn_cr">
                        <button class="search-form_button" type="submit"><?php _e( 'Search', 'hopscotch'); ?></button>
                    </div>
                </div><!-- field_axn -->
            </fieldset>
        </form>
    </div>
</div><!-- search_comp -->