//

/*!
 * expandoButton.js
 * Original author: @jimbobalj
 * Licensed under the MIT license
 */
 /*jshint devel:true */

;(function ( $, window, document, undefined ) {
    "use strict";

    // Create the defaults once
    var pluginName = "expandoButton",
        defaults = {
          headerClass: ".expando-button-widget-header",
          bodyClass: ".expando-button-widget-body",
          closed: false,
          initialTimeToClose: 5000,
          timeToClose: 2000
        };

    // The actual plugin constructor
    function Plugin( element, options ) {
        this.element = element;
        this.options = $.extend( {}, defaults, options) ;
        this._defaults = defaults;
        this._name = pluginName;
        this.timer = null;
        this.init();
    }

    Plugin.prototype = {

      init: function() {
          if (this.options.closed) {
            this.closeIt(this.element);
          } else {
            this.closeInABit(this.element, this.options.initialTimeToClose);
          }
          this.bindUIEvents();
      },

      bindUIEvents: function() {
        var el = this.element;
        var pluginInstance = this;
        $(el).on('mouseenter',
          function(e) {
            e.preventDefault();
            pluginInstance.openIt(el);
          })
          .on('mouseleave',
          function(e) {
            e.preventDefault();
            pluginInstance.closeInABit(el);
          }
        );
      },

      closeIt: function(el) {
        if (! $(el).hasClass('is-closed')) {
          $(el).addClass('is-closed')
          .find(this.options.bodyClass)
          //.stop()
          .hide('blind');
        }
      },

      closeInABit: function(el, timeToClose) {
        if (!timeToClose) {
          timeToClose = this.options.timeToClose;
        }
        var pluginInstance = this;
        // hang onto timer reference. We may need to cancel it.
        window.clearTimeout(this.timer);
        pluginInstance.timer = setTimeout(
          function() {
            pluginInstance.closeIt(el);
          },
          timeToClose
        );
      },

      openIt: function(el) {
        window.clearTimeout(this.timer);
        if ($(el).hasClass('is-closed')) {
          $(el).removeClass('is-closed')
            .find(this.options.bodyClass)
            .show('blind');
        }
      }
    };

    // A really lightweight plugin wrapper around the constructor,
    // preventing against multiple instantiations
    $.fn[pluginName] = function ( options ) {
        return this.each(function () {
            if (!$.data(this, "plugin_" + pluginName)) {
                $.data(this, "plugin_" + pluginName,
                new Plugin( this, options ));
            }
        });
    };

    $(document).ready(function(){
      $('.expando-button-widget').expandoButton();
    });

})( window.jQuery, window, document );
