(function($) {
	$.fn.setOptions = function( options ) {

	
    function getOpts(key) { 
	  return  localStorage.getItem(key);
	  console.log(key);
	};
	
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
		    bg : '#008080',
			font : 'Open Sans',
			color : '#212121',
			sideBar: '#004050',
			window: 'ol-steel bd-steel bg-steel',
			complete : null
		}, options);
    }
		return this.each( function() {
			if ( settings.bg ) {
				$(this).addClass( 'bg-'+ settings.bg );
			} else {
				$(this).bg( settings.bg );
		      }
			  
			if (settings.color ) {
				$('#mainWrap').css( 'color', settings.color );
			} else {
				$('#mainWrap').color( settings.color );
		      }  
			  
			if ( settings.font ) {
			  $('#database').css( 'fontFamily', settings.font );
			} else {
				$('#database').font( settings.font );
		      }
			  
           if ( settings.sideBar ) {
		      $('#sideBar').removeClass('bg-darkTeal');
			  $('#sideBar').addClass( 'bg-'+ settings.sideBar );
			} else {
				$('#sideBar').css( settings.sideBar );
		      }			
			  
           if ( settings.window ) {
		      $("#dbWindow").removeClass('bd-steel ol-steel');
		      $('#dbCaption').removeClass('ol-steel bd-steel bg-steel');
			  $('#dbCaption').addClass( settings.window );
			  $('#dbCaption, #dbWindow').addClass(  settings.window );
			  $('#dbCaption, #dbWindow').addClass(  settings.window );
			} else {
			    $('#dbCaption').addClass(  settings.window );
			    $('#dbCaption, #dbWindow').addClass(  settings.window );
			    $('#dbCaption, #dbWindow').addClass(  settings.window );
		      }

			if ( $.isFunction( settings.complete ) ) {
				settings.complete.call(this);
			}
		});

	};
}(jQuery));