function setOpts() {
var prefs = [];
	      var promise = $('#setOpts input[type="radio"]:checked').each(function(){
		  var val= $(this).val();
	        prefs.push(val);
	      }).promise();
		  promise.done( function() {
              localStorage.removeItem("TEST");
            console.log("radio values: "+JSON.stringify(prefs) );
            localStorage.setItem("TEST", JSON.stringify(prefs) );
		  });

		  $("#savePref").prop("disabled", true);
		  $("#tacPref").html("<h1>Preferences saved!</h1>").fadeIn(1000);
}

$(function() {
	
$(".taskbar").delegate("#t-explor","click",function(){
	$(".window").toggle();
});
$(".taskbar").delegate("#t-calc","click",function(){
	$("#tile1").toggle();
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
    $("#database").html("<table id='Table' class='table striped bordered hovered'><THEAD><tr id='trr'><td>Ticket</td><td>Opened</td><td>ETA</td><td>Priority</td><td>Site</td><td>Comments</td><td>Contact Preference</td></tr></THEAD><TBODY id='dbb'>");
      $.each(data, function(key, value) {
    var ticket=value.Ticket,date=value.Date,starttime=value.STime,ETA=value.ETA,Priority=value.Priority,Site=value.Site,Comments=value.Comments,Contact=value.ContactPref,Deleted=value.Deleted;
        var Deletelink = "<div class='deleteLink toolbar transparent' title='Delete ticket #"+ticket+"?'><i class='icon-cancel fg-hover-red'></i></div>";
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
        '<button id="confirm" class="success">YEP!</button>',
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

/* // TEST JSON STRING IN LOCALSTORAGE//

var string =JSON.stringify( {bg:"#000000", color:"#ffffff",font:"Arial"} );
localStorage.setItem("Settings", string);
console.log(string +" set!");
*/	 
 $("#mainWrap").setOptions({ 	   
     complete: function(){ 
	   console.log('Color applied!') 
	 } 	  
  });

$("#sideBar, #startmenu").hide();
new getDB();
var $USER = localStorage.getItem("Login");
$("#log-in").html($USER);
 
 $(document).on('click', "#Preferences", function() {
   $.Dialog({
     shadow: true,
	 overlay: false,
	 draggable: true,
	 flat: false,
	 icon: '<span class="icon-checkbox"></span>',
	 title: 'Set Preferences',
	 padding: 5,
	 content: '',
	 sysButtons:{
	    btnMin: false,
		btnMax: false,
		btnClose: true
      },
	  onShow: function(_dialog){
	  var content = '<iframe height="400" width="425" src="make_opts.FULL.htm" frameborder="0"></iframe>';
	   $.Dialog.content(content);
	   $.Metro.initInputs();
	     $("#savePref").on("click", function() {
	       $.Dialog.close();
	     });
	  }
 });
});	

  var testStorage = localStorage.getItem("TEST");
   var prefs = []; 
    if (testStorage){  	
      var storage = JSON.parse(testStorage);
	    $.when( $(storage).each( function(index, data) {
	      prefs.push(data);
	    }) ).then(function() {
		   JSON.stringify(prefs);
		   console.log("Prefs stored: "+ JSON.stringify(prefs) );
		 });		
	    // console.log("data: "+data);
 	}

  $(document).on("click","#savePref", function(e){
    e.preventDefault();
    setOpts();
	$(this).Dialog.close();
  });
});  