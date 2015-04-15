$(function() {
  var window = $(".window"), start = $(".start"), startmenu = $("#startmenu"), timer = [];
  var $USER =  localStorage.getItem("Login") ? localStorage.getItem("Login") : $("#IPADDRESS").text();
	$("#log-in").html($USER);
    $("#sideBar, #startmenu").hide();
 	
$(".taskbar").delegate("#t-explor","click",function(){
	$(".window").toggle();
});
$(".taskbar").delegate("#t-calc","click",function(){
	$(".tileBar").toggle();
});

function closeDialog(){
	($.Dialog).close();
}

// Clicking the Network item in the taskbar will pop open a $.Dialog showing who is logged in and the most recent ticket activity.

$(".taskbar").delegate("#t-network","click",function(){
    $.Dialog({
      shadow: false,
      overlay: false,
      draggable: true,
      flat: true,
      icon: '<span class="icon-info fg-cobalt"></span>',
      title: 'TAC Users logged in today',
      width: 450,
	  height: 150,
      padding: 15,
      content: function() {
        $(this).load("../WhoIsLogged.php");
	  },
      sysButtons:{
        btnMin: false,
        btnMax: false,
        btnClose: true
      }
    });	
});

// Clicking the Search item in the Taskbar will pop open a $.Dialog showing the datePicker and a submit button that will open a new tab/page with results displayed.

$(".taskbar").delegate("#t-search","click",function(){
    $.Dialog({
      shadow: false,
      overlay: false,
      draggable: true,
      flat: false,
      icon: '<span class="icon-search fg-darkTeal"></span>',
      title: 'Search TAC Tickets',
      width: 400,
	  height: 450,
      padding: 15,
      content: function() {
        $(this).load("t-search.php", function(){
		  $("#datepicker").datepicker();
		});
	  },
      sysButtons:{
        btnMin: false,
        btnMax: false,
        btnClose: true
      }
    });

});
$(document).delegate(".tile","click",function(){
	$(this).toggleClass("selected");
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

  $(document).on("submit", "#datepickr", function(e){ 
    e.preventDefault();
    closeDialog();
  });

function Notify() {
 $RowCounts = $("#Table tbody").children().length;
 favicon = new Favico({
 "type" : "rectangle",
 "bgColor" : '#FADC00',
 "textColor" : '#000000',
 animation: "popFade"
 });
favicon.badge($RowCounts);
$("#ticketCount").html($RowCounts);
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
        console.log('Timer started. '+ getTime() );
    }
    
    function stopTimer (){
      clearInterval( timer );
    }	
   
	function Continue (){
	new stopTimer();
      console.log('DB Refreshed. '+ getTime() ); 
        new Reload(); 
    }

// function used to display Weather information in the #weather live tile

function weatherMan(){
  var URL = "weatherMan.json";
    $.getJSON(URL, function() {
    })
    .done(function(parsed_json) {
        var pattern=  new RegExp("^(.{26})([a-z])"), 
        temperF = parsed_json.current_observation.temp_f, 
        humidity = parsed_json.current_observation.relative_humidity, 
        Icon = parsed_json.current_observation.icon_url, 
        IconURL = Icon.replace(pattern, "$1k"), 
        htmlString = "<center><h1 id='temp' class='fg-white'><img id='wIcon' src='"+ IconURL +"' />"+ temperF +"<sup><i class='icon-Fahrenheit'></i></sup></h1></center>";
   $('#Weather').html(htmlString); 
    })
    .fail(function(){
        $('#Weather').empty().html("<b>Sorry</b>, something's not quite right here.");
      })
    .always(function(){
    console.log("weatherMan() has completed updating.");
    });
  }


// FORECAST() updates conditions when #Weather live tile is clicked
  $(".tileBar").delegate("#weatherMan","click",function(){
     $.Dialog({
          shadow: false,
          overlay: false,
          draggable: true,
          flat: true,
          icon: '<span class="icon-cloudy-3"></span>',
          title: 'Weather Forecast',
          width: '550px',
	      height: '250px',
          padding: 10,
          content: function() {
            $(this).load("TACforecast.html");
	      },
          sysButtons:{
            btnMin: false,
            btnMax: false,
            btnClose: true
          }
      });
  });

function f() {
    document.location.reload(true); 
}

// Get Browser Prefix
var prefix = getBrowserPrefix(), hidden = hiddenProperty(prefix), visibilityState = visibilityState(prefix), visibilityEvent = visibilityEvent(prefix);
 
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


document.addEventListener(visibilityEvent, function(event) {
  if (!document[hidden]) {
    new Continue();
  } else {
     new stopTimer();
	 closeDialog();
  }
});


//Time
function checkTime(i) {
	if (i < 10) { i="0" + i; }
	return i;
}

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
		containment: '#mainWrap',
		minHeight: 250,
		minWidth: 350,
		maxHeight: $('#mainWrap').height()-33,
		maxWidth: $('#mainWrap').width()-250
	});  
});

	// Startmenu
	start.on('click', function () {
        $('#sideBar').toggle("slide",{direction: "right"});
	});	


//Load Database from JSON string pulled out of database request in MySQL
	
function getDB(){
 $.ajax({
  url : "tacDB.php",
  dataType : "json", 
  beforeSend : function(){
    $("#database").html("<p><span class='ajaxloader'></span></p>");
   },
  error : function(err){
      $("#database").html("<p> <b>Sorry</b>, something is not quite right here.<blockquote>"+ err + "</blockquote></p>");
   },
  success : function(data) {
 var json = eval(data), $USER = localStorage.getItem("Login");
 
   if ($.isEmptyObject(json)){
	          METRO_AUTO_REINIT = true;
      $("#database").empty().html("<span class='text-center'><h1 class='noResults'>Great Job,"+ $USER +"!</h1> <h3 class='subheader noResults'> All tickets have been called back.</h3> </span>");
  // console.log(json);
	} else{
    $("#database").html("<table id='Table' class='table bg-transparent'><THEAD><tr id='trr'><td>Ticket</td><td>Opened</td><td>ETA</td><td>Priority</td><td>Site</td><td>Comments</td><td>Contact Preference</td><td><i class='icon-cancel fg-red' title='Remove Ticket'></i></td></tr></THEAD><TBODY id='dbb'>");
      $.each(data, function(key, value) {
    var ticket=value.Ticket,date=value.Date,starttime=value.STime,ETA=value.ETA,Priority=value.Priority,Site=value.Site,Comments=value.Comments,Contact=value.ContactPref,Deleted=value.Deleted;
        var Deletelink = "<div class='deleteLink toolbar transparent fg-hover-red' title='Delete ticket #"+ticket+"?'><button><i class='icon-remove'></i></button></div>";
          $("#dbb").append("<tr id="+ticket+"><td>"+ticket+"</td><td>"+date+"</td><td>"+ETA+"</td><td>"+Priority+"</td><td>"+Site+"</td><td>"+Comments+"</td><td>"+Contact+"</td><td>"+Deletelink+"</td></tr>");
  // console.log(json);

     });
       $("#database").append("</tbody></table>");
    }
  }, 
  complete: function() {
    new Notify();	
     $("#mainWrap").setOptions({
       complete: function(){ 
        console.log('Color re-applied!'); 
        }
     });
  }
 });
}
function createLogger(name) {
  return function(_, a, b) {
    // Skip the first argument (event object) but log the name and other args.
    console.log(name, a, b);
  };
}
//Remove Ticket Functionality
function removeTicket(ticket, login) {
var jsonData = JSON.stringify( {"Ticket":ticket,"Login":login} );

	$.ajax({
		url: 'removeTicket.php',
		type: 'POST',
		dataType: 'json',
		data: jsonData,
		error: function(err){
			alert('Sorry, your ticket could not be removed.'+ err);
		},
		success: function(response) {
			if (response == '1'){
              $("#"+ticket).fadeOut(800, function() {
                $(this).remove();
              });
            var not = $.Notify({
    	      caption: "Great Job, "+login+ "!",
              content: "You removed ticket #"+ticket+"!",
		      style: {background: "#005A5A", color: "#F5FFFA"},
              timeout: 5000 // 5 seconds
            });
		   $.publish('TAC-ALERT', not );			
            ($.Dialog).close();
// console.log("Ticket #"+ticket+" was removed by "+login+".");
            } else {
				alert('I was not able to process your request.');
			}
		},
       complete: function() {
		     new Reload();
	   }
	});
}

// Reload function to refresh database

function Reload() { 
  $('#Table').fadeOut(800);
    $('#database').fadeOut(800, function() {
       getDB();
   }).fadeIn(1000);
   new Notify();
   $(".tile").removeClass("selected");
   }

$(document).on("click",".deleteLink",function() {
	var ticket = $(this).parent().parent("tr").attr('id'), login = $("#log-in").text();
    $.Dialog({
      shadow: false,
      overlay: true,
      draggable: true,
      flat: true,
      icon: '<span class="icon-remove fg-red"></span>',
      title: 'Delete Ticket '+ticket+'?',
      width: 450,
      padding: 10,
      content: '<h3>Are you sure you want to delete Ticket #<b class="fg-red">'+ticket+'</b>, '+login+'? </h3> <br>' +
        '<button id="confirm" type="submit" class="large primary" ><i class="icon-thumbs-up on-left"></i> Yes!</button>'+
		'<button id="cancel" type="reset" class="large inverse" ><i class="icon-thumbs-down on-left"></i> NOPE!</button>',
      sysButtons:{
        btnMin: false,
        btnMax: false,
        btnClose: true
      }
    });
	$("#confirm").on("click", function() {
       removeTicket(ticket, login);
    });
	$("#cancel").on("click", function() {
       closeDialog();
    });
});
  

$(document).keyup(function(e) {

  if (e.keyCode == 27) { 
     new Continue();
    console.log('Manual DB refresh call @ ' + getTime());	
  }  

   if (e.keyCode == 192) { 
       $('#sideBar').toggle("slide",{direction: "right"});
    }  
});  


  $(document).on("click", "#RELOAD", function() {
     Reload();
  });



// event to set TAC-ALERT Options using setOpts.js library extension
 
 $(document).on('click', "#Preferences", function() {
   $.Dialog({
     shadow: true,
     overlay: false,
     draggable: true,
     flat: false,
     width: '45%',
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
  
  // event for opening Statistics Dialog window
  
$(document).on('click', "#statistics", function() {
   $.Dialog({
     shadow: false,
     overlay: false,
     draggable: true,
     flat: true,
     width: '650px',
     height: '450px',
     icon: '<span class="icon-bars"></span>',
     title: 'Today\'s Statistics',
     padding: 10,
     content: function(){
       METRO_AUTO_REINIT = true;
       $(this).html("<iframe id='chartdiv' src='../cStatPNG.php' width='625' height='425' frameborder='0'> </iframe>");
     },
     sysButtons:{
        btnMin: false,
        btnMax: false,
        btnClose: true
     }
    });
     return false;
});	 


//  event for New Ticket Dialog window
  
$(document).on('click', "#newTicket", function() {
   $.Dialog({
     shadow: true,
     overlay: false,
     draggable: true,
     flat: false,
     width: '350px',
     height: '500px',
     icon: '<span class="icon-floppy"></span>',
     title: 'Open a New Ticket',
     padding: 5,
     content: function(){
       METRO_AUTO_REINIT = true;
       $(this).load("ticketPost.htm");
     },
     sysButtons:{
        btnMin: false,
        btnMax: false,
        btnClose: true
     }
    });
     return false;
});

//  event for Edit Ticket Dialog window
  
$(document).on('click', "#editTicket", function() {
   $.Dialog({
     shadow: true,
     overlay: false,
     draggable: true,
     flat: false,
     width: '350px',
     height: '300px',
     icon: '<span class="icon-wrench"></span>',
     title: 'Edit a TAC Ticket',
     padding: 10,
     content: function(){
       METRO_AUTO_REINIT = true;
       $(this).load("editTicket.php");
     },
     sysButtons:{
        btnMin: false,
        btnMax: false,
        btnClose: true
     }
    });
     return false;
});

//event for logging in a TAC user
function autoLogIn(){
	 $.Dialog({
     shadow: false,
     overlay: false,
     draggable: true,
     flat: false,
     width: '300px',
     height: '355px',
     icon: '<span class="icon-user"></span>',
     title: 'Log in to TACAlert',
     padding: 15,
     content: function(){
       METRO_AUTO_REINIT = true;
       $(this).load("TAClogin.php");
     },
     sysButtons:{
        btnMin: false,
        btnMax: false,
        btnClose: true
     }
    });
}
$(document).on('click', "#TAClogin", function() {
      autoLogIn();
});	

// initialize the Favico numbering system
 var $RowCounts = $("#Table tr").length, $COUNT = parseInt( ($RowCounts - 1), 10), favicon = new Favico({
    "type" : "rectangle",
    "bgColor" : '#FADC00',
    "textColor" : '#000000',
    animation: "popFade"
  });
  favicon.badge($COUNT);

    new getDB();
    new weatherMan();
    new startTimer();

    $.subscribe('TAC-ALERT', createLogger('TAC-ALERT'));	
// END WinScripts //  
});  