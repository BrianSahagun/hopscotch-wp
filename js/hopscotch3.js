// Based on WordPress Twentyfifteen functions file.
// Contains handlers for navigation and widget area.

( function( $ ) {
  var $body, $html, $window, windowWidth, resizeTimer;
  
  /*
  Nav Tree Toggle
  Upon activation of Toggle button, toggle active and inactive classes on nav-item.
  
  Elements involved:
  - toggle_axn: <button>
  - nav-item: <li>
  */
  
  /*
  Classify: parent_nav-item
  ui-type__nav-item--tree-nav
  ui-state__tree-nav--inactive
  
  Attribute: parent_nav-item
  aria-expanded="false"
  */
  $( '.parent_nav-item, .page_item_has_children, .menu-item-has-children' ).addClass( 'ui-type__nav-item--tree-nav ui-state__tree-nav--inactive' ).attr( 'aria-expanded', 'false' );
  
  // Add <button> element to Toggle Sub Nav
  $( '.parent_nav-item > a, .page_item_has_children > a, .menu-item-has-children > a' ).after( '<button class="toggle_axn">Toggle Sub Navigation</button>' );
  
  $( '.toggle_axn' ).click( function( e ) {
    var _this = $( this );
    e.preventDefault();
    _this.parent( '.nav-item, .page_item, .menu-item' ).toggleClass( 'ui-state__tree-nav--inactive ui-state__tree-nav--active' ).attr( 'aria-expanded', _this.parent( '.nav-item, .page_item, .menu-item' ).attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
  });
  
  
  /*
  Primary Navigation and Masthead Sidebar Toggle
  */
  
  ( function() {
    var priNavMastheadSidebarComp = $( '#pri-nav-masthead-sidebar_comp' ), priNavMastheadSidebarToggleAxn;
    if ( ! priNavMastheadSidebarComp ) {
      return;
    }
    
    priNavMastheadSidebarToggleAxn = $( '#pri-nav-masthead-sidebar-toggle_axn' );
    if ( ! priNavMastheadSidebarToggleAxn ) {
      return;
    }
    
    priNavMastheadSidebarToggleAxn.on( 'click.hopscotch', function() {
        var _this = $( this );
        
        // Inactive state class is set at: functions > body-class.php
        $body.toggleClass( 'ui-state__pri-nav-masthead-sidebar--inactive ui-state__pri-nav-masthead-sidebar--active' );
        priNavMastheadSidebarComp.attr( 'aria-expanded', $body.hasClass( 'ui-state__pri-nav-masthead-sidebar--active' ) ? 'true' : 'false' );
    } )
  } )();
  
  
    // Viewport resizing
    function resize() {
        windowWidth = $window.width();

        /*
        Screen width detection
        If Tablet size (768) is greater than the window width, then that must mean the viewport is either equal to 768 or narrower.
        */
        if (769 > windowWidth) {
            $html.addClass( 'ui-type__viewport--narrow' );
            $html.removeClass( 'ui-type__viewport--wide' );
        } else {
            $html.addClass( 'ui-type__viewport--wide' );
            $html.removeClass( 'ui-type__viewport--narrow' );
        }

        // If screen is narrow, deactivate primary navigation
        if ( $html.hasClass( 'ui-type__viewport--narrow' ) ) {
            $body.removeClass( 'ui-state__pri-nav-masthead-sidebar--active' );
            $body.addClass( 'ui-state__pri-nav-masthead-sidebar--inactive' );
        } else {
            $body.removeClass( 'ui-state__pri-nav-masthead-sidebar--inactive' );
            $body.addClass( 'ui-state__pri-nav-masthead-sidebar--active' );
        }

    }
    
    
    // Search Component
    ( function() {

        var search = $( '.search_comp' ),
            searchLabel = $( '.search-form_label' ),
            searchInput = $( '.search-form_input' ),
            uiStateSearchActive = 'ui-state__search--active',
            uiStateSearchInactive = 'ui-state__search--inactive';

        if( ! search )
          return;

        if( ! searchLabel )
          return;

        if( ! searchInput )
          return;

        // Deactivates the Search
        function searchDeactivate() {
          if ( search.hasClass( uiStateSearchActive ) ) {
            search.removeClass( uiStateSearchActive ).addClass( uiStateSearchInactive );
          }
        }

        // Converts the Search Label into a toggle action
        searchLabel.on( 'click.hopscotch', function( e ){
          e.stopPropagation();
          searchDeactivate();
          $( this ).closest( search ).toggleClass( uiStateSearchInactive ).toggleClass( uiStateSearchActive );
        });

        // Exempts the Search Component from the document click
        search.on( 'click.hopscotch', function( e ){
          e.stopPropagation();
        });

        // If Search Component is active, make inactive by clicks anywhere on the document
        $( document ).on( 'click.hopscotch', function() {
          searchDeactivate();
        });

        // If Search Component is active, make inactive by pressing keyboard enter and remove focus from Search Input
        $( document ).on( 'keydown.hopscotch', function( e ) {
          if ( e.which === 27 ) {
            searchDeactivate();
            searchInput.blur();
          }
        });

    } )();

  $( document ).ready( function() {
    $html = $( 'html' );
    $body = $( document.body );
    $window = $( window );

    $window
      .on( 'resize.hopscotch', function() {
      clearTimeout( resizeTimer );
      resizeTimer = setTimeout( resize, 500 );
    } );

    resize();

    for ( var i = 1; i < 6; i++ ) {
      setTimeout( resize, 100 * i );
    }
  });
  
  
} )( jQuery );