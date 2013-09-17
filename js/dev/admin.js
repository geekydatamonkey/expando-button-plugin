/**
* admin.js
* Scripts for the Admin Side of the Expando Button Widget
**/
;(function($, window, document, undefined) {

  /**
   * Media control frame popup.
   * @see media-editor.js
   */
  var mediaManager = function() {
    var Attachment = wp.media.model.Attachment,
      $control,
      $controlTarget,
      mediaControl;
      
    mediaControl = {
      // Initialize a new media manager or return an existing frame.
      // @see wp.media.featuredImage.frame()
      frame: function() {
        if ( this._frame ){
          return this._frame;
        }
        this._frame = wp.media({
          title: "Choose an image",
          library: {
            type: 'image'
          },
          button: {
            text: "Update Image"
          },
          multiple: false
        });
        
        this._frame.on( 'open', this.updateLibrarySelection ).state('library').on( 'select', this.select );
        
        return this._frame;
      },
      
      // Update the control when an image is selected from the media library.
      select: function() {
        var selection = this.get('selection'),
          returnProperty = $control.data('return-property') || 'url';
        
        // Insert the selected attachment url into the target element.
        if ( $controlTarget.length ) {
          console.log($controlTarget);
          $controlTarget.val( selection.pluck( returnProperty ) );
          // Insert the selected attachment ID into a data attribute
          $controlTarget.attr('data-imgID', selection.pluck('id') );
        }


        
        // Trigger an event on the control to allow custom updates.
        $control.trigger( 'selectionChange.simpleimagewidget', [ selection ] );
      },
      
      // Update the selected image in the media library based on the image in the control.
      updateLibrarySelection: function() {
        var selection = this.get('library').get('selection'),
          attachment, selectedIds;
        console.log(selection);
        
        if ( $controlTarget.length ) {
          selectedIds = $controlTarget.val();
          if ( selectedIds && '' !== selectedIds && -1 !== selectedIds && '0' !== selectedIds ) {
            attachment = Attachment.get( selectedIds );
            attachment.fetch();
          }
        }
        
        selection.reset( attachment ? [ attachment ] : [] );
      },
      
      init: function() {
        $('#wpbody').on('click', '.expando-button-uploader .img-upload-button', function(e) {
          var targetSelector;
          
          e.preventDefault();
          
          $control = $(this).closest('.expando-button-uploader');
          
          targetSelector = '.img-url';
          if ( 0 === targetSelector.indexOf('#') ) {
            // Context doesn't matter if the selector is an ID.
            $controlTarget = $( targetSelector );
          } else {
            // Search for other selectors within the context of the control.
            $controlTarget = $control.find( targetSelector );
          }
          
          mediaControl.frame().open();
        });
      }
    };
    mediaControl.init();
  };
  $(document).ready( function() {
    mediaManager();
  });


})(window.jQuery, window, document);


