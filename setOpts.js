(function($) {

	$.fn.setOptions = function( options ) {

		// Establish our default settings
		var settings = $.extend({
			background : 'darkTeal',
			complete : null
		}, options);

		return this.each( function() {
			$(this).background( settings.background );

			if ( settings.background ) {
				$(this).css( 'background-color', settings.background );
			}

			if ( $.isFunction( settings.complete ) ) {
				settings.complete.call(this);
			}
		});

	};

}(jQuery));