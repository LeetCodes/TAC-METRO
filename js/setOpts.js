(function($) {
	$.fn.setOptions = function( options ) {

	
    function getOpts(key) {
//		console.log(key);
      return  localStorage.getItem(key);

	}
	
    var getJSON=[], JSONopts= {}, getPrefs = localStorage.getItem("Settings"), storage =JSON.parse(getPrefs);
	var promise = $(storage).each( function(index, data){
        getJSON.push(data);
    }).promise();

	promise.done( function() {
          return JSONopts= getJSON;
    });
    
	if (getPrefs) {
	// Re-build values from Local Storage settings
	
        var settings = $.extend({
            bg: JSONopts[0],
			font: JSONopts[1],
			color: JSONopts[2],
			sideBar: JSONopts[3],
			window: JSONopts[4],
			complete: null
        }, options);

     } else{
				// Establish our default settings
		var settings = $.extend({
		    bg : 'dark',
			font : 'Open Sans',
			color : 'white',
			sideBar: 'darker',
			window: 'ol-black',
			complete : null
		}, options);
    }
		return this.each( function() {
			if ( settings.bg ) {
				$(this).addClass( 'bg-'+ settings.bg );
			} else {
				$('#mainWrap').addClass('bg-'+ settings.bg );
		      }
			  
			if (settings.color ) {
				$('#mainWrap, #dbWindow .icon, #dbWindow .title, #database, .noResults').removeClass('fg-black');
				$('#mainWrap, #dbWindow .icon, #dbWindow .title, #database table, #dbb, .noResults').addClass( settings.color );
			} else {
				$('#mainWrap, #dbWindow .icon, #dbWindow .title, #database table, #dbb, .noResults').css('color',  settings.color );
		      }  
			  
			if ( settings.font ) {
			  $('#database table, #dbb, .noResults').css( 'fontFamily', settings.font );
			} else {
				$('#database table, #dbb, .noResults').css('fontFamily', settings.font );
		      }
			  
           if ( settings.sideBar ) {
		      $('#sideBar').removeClass('bg-darkTeal');
		      $('#userid').removeClass('bg-darker');
			  $('#sideBar').addClass( 'bg-'+ settings.sideBar );
			  $('#userid').addClass( 'bg-'+ settings.sideBar );
			} else {
				$('#sideBar').addClass('bg-'+ settings.sideBar );
		      }			
			  
           if ( settings.window ) {
		      $("#dbWindow").removeClass('bd-steel ol-steel');
		      $('#dbCaption').removeClass('ol-steel bd-steel bg-steel');
			  $('#dbCaption').addClass( settings.window );
			  $('#dbCaption, #dbWindow, #database').addClass(  settings.window );
			} else {
			    $('#dbCaption').addClass(  settings.window );
			    $('#dbCaption, #dbWindow, #database').addClass(  settings.window );
		      }

			if ( $.isFunction( settings.complete ) ) {
				settings.complete.call(this);
			}
		});

	};
}(jQuery));