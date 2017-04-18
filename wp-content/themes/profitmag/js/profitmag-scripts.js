  var ds = ds || {};
  var sar;

  ( function( $ ) {
      var media;
      var profitmag_gallery_input, parent, remove, previous_image = '', new_images = '', temp_images =  '';
      ds.media = media = {

          frame: function() {
              if ( this._frame )
                  return this._frame;

              this._frame = wp.media( {
                  title: 'Select Your Images',
                  button: {
                      text: 'Choose'
                  },
                  multiple: true,
                  library: {
                      type: 'image'
                  }
              } );                    

              this._frame.state( 'library' ).on( 'select', this.select );

              return this._frame;
          },

          select: function() {
              var settings = wp.media.view.settings,
                  selection = this.get( 'selection' );
                  profitmag_gallery_input.val('');

              selection.map( media.setDetails );

          },

          setDetails: function( attachment ) {
              
              parent = profitmag_gallery_input.parent();
              images_input = profitmag_gallery_input;
              previous_images = images_input.val();
              
              if(previous_images != '') {
                previous_images = $.trim(previous_images);
                new_images = previous_images.replace('"]', ',' + attachment.get('id') + '"]');
                
              } else {
                  new_images = '[gallery ids="' + attachment.get('id') + '"]';
              }

              images_input.val(new_images).change();                    
              
          },

          init: function() {
              $( document ).on( 'focus, click', '.gallery-input-field', function( e ) {
                  e.preventDefault();
                  profitmag_gallery_input = $( this );
                  value =  profitmag_gallery_input.val();
                  media.frame().open();         
               });
          }
      };
      $( media.init );  
            
  } )( jQuery );
