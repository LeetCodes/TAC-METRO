(function($) {
	$.fn.setOptions = function( options ) {
	
    var get = function(key) { 
	  return  localStorage.getItem(key);
	  console.log(key);
	}
	
    var JSONopts = JSON.parse(localStorage.getItem("Settings") );
	if (JSONopts) {
	// Re-build values from Local Storage settings
	
        var settings = $.extend({
            bg: JSONopts.bg,
			color: JSONopts.color,
			font: JSONopts.font,
			complete: null
        }, options);

     } else{
				// Establish our default settings
		var settings = $.extend({
		    bg : '#008080',
			color : '#212121',
			font : 'Open Sans',
			complete : null
		}, options);
    }
		return this.each( function() {
			if ( settings.bg ) {
				$(this).css( 'backgroundColor', settings.bg );
			} else {
				$(this).bg( settings.bg );
		      }
			  
			if (settings.color ) {
				$(this).css( 'Color', settings.color );
			} else {
				$(this).color( settings.color );
		      }  
			  
			if ( settings.font ) {
			  $(this).css( 'font-family', settings.font );
			} else {
				$(this).font( settings.font );
		      }

			if ( $.isFunction( settings.complete ) ) {
				settings.complete.call(this);
			}
		});

	};
	console.log(JSON.parse(JSON) );
}(jQuery));