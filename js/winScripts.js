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
/*    window.resizable({
		handles: 'n, e, s, w, ne, se, sw, nw',
		containment: '#handle_area',
		minHeight: 80,
		minWidth: 138,
		maxHeight: $('#handle_area').height()-33,
		maxWidth: $('#handle_area').width()
	});  */
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
	  flat: false,
	  icon: '<span class="icon-checkbox"></span>',
	  title: 'Delete Ticket?',
	  width: 450,
	  padding: 10,
	  content: 'Are you sure you want to delete Ticket #'+ticket+'? <br>' +
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

$("#sideBar, #startmenu").hide();
new getDB();
var $USER = localStorage.getItem("Login");
$("#log-in").html($USER);
 
});	

