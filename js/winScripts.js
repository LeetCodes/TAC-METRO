$(function() {
   var $USER = localStorage.getItem("Login"), timer= [];
    $("#log-in").html($USER);
    $("#sideBar, #startmenu").hide();
	
$(".taskbar").delegate("#t-explor","click",function(){
	$(".window").toggle();
});
$(".taskbar").delegate("#t-calc","click",function(){
	$(".tileBar").toggle();
});
$(".content").delegate("#cancel","click",function(){
	$.Dialog("close");
});
$('.caption').delegate(".btn-min","click",function(){
	$(this).parent().parent().hide();
});
$('.caption').delegate(".btn-close","click",function(){
	$(this).parent().parent().hide();
});
$( ".taskbar ul" ).sortable({scroll: false,containment: "parent",
revert: true,
start:function(){
$(this).children().undelegate("click");
},
stop: function() {
$(this).children().delegate("click");
}
});
$( ".taskbar ul" ).disableSelection();
$(".drag").draggable({handle: "div.head",scroll: false,stack: "#wrapper div"});


function Notify() {
 $RowCounts = $("#Table tr").length;
 $COUNT = parseInt( ($RowCounts - 1), 10);	
 favicon = new Favico({
 "type" : "rectangle",
 "bgColor" : '#FADC00',
 "textColor" : '#000000',
 animation: "popFade"
 });
favicon.badge($COUNT);
}	

 //  Set up variables to report Date and Time in console.log()    //
var getTime = function() {
    var d = new Date(), curr_hour = d.getHours(), minute = d.getMinutes();
      if( d.getHours() > 12) {
         curr_hour = curr_hour - 12;
      } if( curr_hour < 12 ){
         hours = curr_hour;
        }  var hours = curr_hour;
   
      if (minute.toString().length < 2){
          minute = "0" + minute;
      } var minutes = minute;

  return  hours +":"+ minutes;	 
};

// Construct a timer to refresh the DB without needing the user to hit F5 //
    function startTimer (){
     var timer = setInterval(Continue, 250000);
      pgTimer = setInterval(pgLoad, 750000);
        console.log('Timer started. '+ getTime() );
    }
    
    function stopTimer (){
      clearInterval( timer );
      console.log('DB Refresh Timer stopped. '+ getTime() );
    }	
   
	function Continue (){
	new stopTimer();
      console.log('DB Refreshed. '+ getTime() ); 
        new Reload(); 
	new startTimer();
    }
   function pgLoad (){
      console.log('Page Reloaded. '+ getTime() ); 
      new f(); 
    }	

function weatherMan(){
  var URL = "../weatherMan.json";
//  var URL = "http://api.wunderground.com/api/f4de0ee4ffd72094/geolookup/conditions/q/IL/Chicago.json?callback=?",
//      JSONcache = JSON.parse(sessionStorage.getItem('JSONcache'));
//  if (!JSONcache){

    $.getJSON(URL, function() {
//   console.log("weatherMan() generating report...");
    })
    .done(function(parsed_json) {
        var pattern=  new RegExp("^(.{26})([a-z])"), 
	    temperF = parsed_json.current_observation.temp_f, 
	    humidity = parsed_json.current_observation.relative_humidity, 
//	    Wreport = parsed_json.current_observation.weather, 
//	    time = parsed_json.current_observation.observation_time, 
	    Icon = parsed_json.current_observation.icon_url, 
	    IconURL = Icon.replace(pattern, "$1k"), 
	    htmlString = "<center><h1 id='temp' class='fg-white'><img id='wIcon' src='"+ IconURL +"' />"+ temperF +"<sup><i class='icon-Fahrenheit'></i></sup></h1></center>";
   $('#Weather').html(htmlString); 
// JSONcache = sessionStorage.setItem('JSONcache', JSON.stringify(htmlString));
    })
    .fail(function(){
        $('#Weather').empty().html("<b>Sorry</b>, something's not quite right here.");
      })
    .always(function(){
    console.log("weatherMan() has completed updating.");
    });
  }
//  else {
//  htmlString = JSONcache;
//     $('#Weather').html(htmlString).fadeIn(900); 
//  }


function f() {
    window.location.reload(); 
}


// Get Browser-Specifc Prefix
function getBrowserPrefix() {
   
  // Check for the unprefixed property.
  if ('hidden' in document) {
    return null;
  }
 
  // All the possible prefixes.
  var browserPrefixes = ['moz', 'ms', 'o', 'webkit'];
 
  for (var i = 0; i < browserPrefixes.length; i++) {
    var prefix = browserPrefixes[i] + 'Hidden';
    if (prefix in document) {
      return browserPrefixes[i];
    }
  }
 
  // The API is not supported in browser.
  return null;
}
 
// Get Browser Specific Hidden Property
function hiddenProperty(prefix) {
  if (prefix) {
    return prefix + 'Hidden';
  } else {
    return 'hidden';
  }
}
 
// Get Browser Specific Visibility State
function visibilityState(prefix) {
  if (prefix) {
    return prefix + 'VisibilityState';
  } else {
    return 'visibilityState';
  }
}
 
// Get Browser Specific Event
function visibilityEvent(prefix) {
  if (prefix) {
    return prefix + 'visibilitychange';
  } else {
    return 'visibilitychange';
  }
}


// ::BROWSER TAB ONFOCUS EVENT::

// Get Browser Prefix
var prefix = getBrowserPrefix(), hidden = hiddenProperty(prefix), visibilityState = visibilityState(prefix), visibilityEvent = visibilityEvent(prefix);
 
document.addEventListener(visibilityEvent, function(event) {
  if (!document[hidden]) {
    new Continue();
  } else {
     new stopTimer();
  }
});


//Time
function checkTime(i) {
	if (i < 10) { i="0" + i; }
	return i;
};

// Clock
	setInterval( function() {
		var d = new Date();
		var m = d.getMonth()+1;
		$(".datetime").html(checkTime(d.getHours())+":"+checkTime(d.getMinutes())+"<br/>"+checkTime(m)+"/"+checkTime(d.getDate())+"/"+d.getFullYear());
	}, 1000 );
	
$(function() {
	var window = $(".window");
	//Draggable
	window.draggable({ 
		cancel: '.window_inner, .buttonrow',
		containment: '#handle_area',
		scroll: false,
		stack: '.window'
	});
  window.resizable({
		handles: 'n, s, e, w, nw, sw, ne, se',
		containment: 'body',
		minHeight: 250,
		minWidth: 400,
		maxHeight: $('#mainWrap').height()-33,
		maxWidth: $('#mainWrap').width()-250
	});  
});

var window = $(".window"), start = $(".start"), startmenu = $("#startmenu"), timer = [];
	// Startmenu
	start.on('click', function () {
		 $('#sideBar').toggle("slide",{direction: "right"});
	});	
	
function getDB(){
 $.ajax({
  url : "tacDB.php",
  dataType : "json", 
  beforeSend : function(){
    $('#database').html("<span class='ajaxloader'>LOADING</span>");
   },
  error : function(err){
      $('#database').html("<b>Sorry</b>, something's not quite right here."+ err);
   },
  success : function(data) {
 var json = eval(data), $USER = localStorage.getItem("Login");
 
   if ($.isEmptyObject(json)){
      $("#database").empty().html("<center><h1>Great Job,"+ $USER +"!</h1> <h3 class='subheader'> All tickets have been called back.</h3></center>");
	  // console.log(json);
	} else{
    $("#database").html("<table id='Table' class='table striped hovered'><THEAD><tr id='trr'><td>Ticket</td><td>Opened</td><td>ETA</td><td>Priority</td><td>Site</td><td>Comments</td><td>Contact Preference</td></tr></THEAD><TBODY id='dbb'>");
      $.each(data, function(key, value) {
    var ticket=value.Ticket,date=value.Date,starttime=value.STime,ETA=value.ETA,Priority=value.Priority,Site=value.Site,Comments=value.Comments,Contact=value.ContactPref,Deleted=value.Deleted;
        var Deletelink = "<div class='deleteLink toolbar transparent' title='Delete ticket #"+ticket+"?'><i class='icon-remove fg-hover-red'></i></div>";
	       $("#dbb").append("<tr><td>"+ticket+"</td><td>"+date+"</td><td>"+ETA+"</td><td>"+Priority+"</td><td>"+Site+"</td><td>"+Comments+"</td><td>"+Contact+"</td><td>"+Deletelink+"</td></tr>");
		 // console.log(json);
$(document).on("click",".deleteLink",function() {
    $.Dialog({
	  shadow: true,
	  overlay: false,
	  draggable: true,
	  flat: true,
	  icon: '<span class="icon-checkbox"></span>',
	  title: 'Delete Ticket '+ticket+'?',
	  width: 450,
	  padding: 10,
	  content: '<h3>Are you sure you want to delete Ticket #'+ticket+'? </h3>' +
        '<button id="confirm" type="submit" class="success">YEP!</button> <button id="cancel" type="reset" class="danger" >NOPE!</button>',
	  sysButtons:{
	    btnMin: false,
		btnMax: false,
		btnClose: true
      }
    });
  });
	 });
      $("#database").append("</tbody></table>");
    }
  }
 });
}


// Reload function to refresh database

function Reload() { 
  $('#Table').fadeOut(800);
    $('#database').fadeOut(800, function() {
       getDB();
   }).fadeIn(1000);
}

$(document).keyup(function(e) {
if (e.keyCode == 27) { 
    new Continue();
console.log('Manual DB refresh call @ ' + getTime());	
}  
});  

  $(document).keyup(function(e) {
    if (e.keyCode == 192) { 
       $('#sideBar').toggle("slide",{direction: "right"});
    }  
  });    



/* // TEST JSON STRING IN LOCALSTORAGE//

var string =JSON.stringify( {bg:"#000000", color:"#ffffff",font:"Arial"} );
localStorage.setItem("Settings", string);
console.log(string +" set!");
*/	 
 $("#mainWrap").setOptions({ 	   
     complete: function(){ 
	   console.log('Color applied!'); 
	 } 	  
  });

 
 $(document).on('click', "#Preferences", function() {
   $.Dialog({
     shadow: true,
	 overlay: true,
	 draggable: true,
	 flat: false,
	 width: '30%',
	 height: '55%',
	 icon: '<span class="icon-clipboard-2"></span>',
	 title: 'Set Preferences',
	 padding: 5,
	 content: function(){
       METRO_AUTO_REINIT = true;
	   $(this).load("make_opts.htm");
	 },
	 sysButtons:{
	    btnMin: false,
		btnMax: false,
		btnClose: true
      }

   });
       
  });	

 var $RowCounts = $("#Table tr").length, $COUNT = parseInt( ($RowCounts - 1), 10), favicon = new Favico({
    "type" : "rectangle",
    "bgColor" : '#FADC00',
    "textColor" : '#000000',
    animation: "popFade"
  });
  favicon.badge($COUNT);

  $("#bottom .start").on("click", function(){
    $(this).toggleClass("shadow");
  });

    new getDB();
    new weatherMan();
    new startTimer();
	new Notify();
	
// END WinScripts //  
});  