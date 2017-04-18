jQuery(function($) {

    /**
     * Initialize the slimScroll for the navigation menu overlay
     */
    $( function() {
        $( '#menu-overlay .inner nav' ).slimScroll({
            height: '400px',
            width: '350px',
            color: '#fff',
            size: '4px',
            railVisible: true,
            railColor: '#fff',
            railOpacity: 0.5,
        });
    });
   
    /**
     * Initialize all Bootstrap tooltips
     */
    $('[data-toggle="tooltip"]').tooltip({
        container: 'body',
        trigger: 'click hover'
    });

    /**
     * Main Navigation Click Tab Effect
     */
    var collapsed_nav   = true;
    
    $( '#primary-menu-toggle').click( function() {
      
        if ( collapsed_nav ) {
       
            $( '#menu-open' ).stop().fadeOut( 50, function() {
                $( '#menu-close' ).fadeIn( 200 );
            });
       
            $( '#menu-overlay-wrapper' ).stop().fadeIn( 400, function() {
                
            });
       
            collapsed_nav = false;
        
        } else {
            
            $( '#menu-close' ).stop().fadeOut( 50, function(){
                $( '#menu-open' ).fadeIn( 200 );
            });
       
            $( '#menu-overlay-wrapper' ).stop().fadeOut( 200, function() {
                
            });
        
            collapsed_nav = true;
            
        }
        
    });
    
    /**
     * Navigation Overlay - item hover effect
     */
    
    $( '.main-navigation li > a').mouseenter( function() {
        
        $( this ).stop().animate({
            paddingTop: '4px',
            paddingBottom: '4px',
            letterSpacing: '.25em',
        }, 100 );
        
    }).mouseleave( function() {
       
        $( this ).stop().animate({
            paddingTop: '2px',
            paddingBottom: '2px',
            letterSpacing: '.2em',
        }, 200 );
        
    });
           
});