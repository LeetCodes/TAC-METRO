/*global $:false, Favico:false, document:false, window:false, console:false, setInterval:false, localStorage:false, weatherMan:false, pgLoad:false, IP:false, date:false, event:false */ 
	

 
function checked() {

var name = "<?php echo $MyLogin ?>", IP = "<?php echo $_SERVER['REMOTE_ADDR']; ?>", PASS = "<?php echo $MyPass; ?>";	
// REMOVED $.COOKIE TO REDUCE PLUGIN LOADS. LOCALSTORAGE WILL CONTAIN A COOKIE OF LOGIN PROPERTIES //

     $("#auto").on('change', function() {
       var value = $(this).prop("checked") ? 'true' : 'false';
         if( value === 'true'){
                $('#myusername').val(name);
                $('#mypassword').val(PASS);
                localStorage.setItem("User", name);
				localStorage.setItem("Pass", PASS);
		} else{
                var inputName= $('#myusername').val();
                var inputPass= $('#mypassword').val();
                      localStorage.setItem("User", inputName);
                      localStorage.setItem("Pass", inputPass);
		  }
     });	
}

/* 

*** END FUNCTION DECLARATIONS ***

*/
 
 
$(document).ready(function () {"use strict";
     var $USER = $("#username").text(), $RowCounts = $("#delTable tr").length, $COUNT = parseInt( ($RowCounts - 1), 10); 
	 var id, userid, data, parent, site = null; 
    new weatherMan();

    new startTimer();
	
  var favicon = new Favico({
    "type" : "rectangle",
    "bgColor" : '#FADC00',
    "textColor" : '#000000',
    animation: "popFade"
  });
  favicon.badge($COUNT);
	
    $(document).on("click", "#auto", function(){
        new checked();
	});


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

  $(document).on("click","#all_clear", function() {
    $(this).hide("explode", 1000 ).remove();
    new Reload();
      console.log('Manual DB refresh call @ ' + getTime());
  });

  
$(document).on("click","#del", function () {
  id = $(this).parent().parent().attr('id');
  userid = '&user=' + $USER;
 data = 'id=' + id + userid; 
  parent = $(this).parent().parent();
  site = $('#delTable').find('tr[id^='+id+'] td:nth-child(6)').text();
    $('#removal').dialog('open');
    $('.talk').html('<p> Are you sure you want to remove Ticket <u>#<b>'+ id +' </b></u>? </p>');
    return false;
    });

$('#removal').dialog({
    autoOpen: false,
    height: 225,
    width: 325,
    modal: true,
    title: 'Are you sure, '+ $USER +'?', 
    resizeable: false,
    closeOnEscape: true,
  buttons: {
    Okay: function() {
  $.ajax({
    type: "POST",
    url: "delete_row.php?",
    data: data,
    cache: false,
    error: function() {
     console.log("<p>Failed to remove ticket "+ id +". <br> Please refresh the page and try again.</p>");
    },
   success: function () {
     $(this).parent().parent().fadeOut(1500, function () {
     $(this).remove();
     console.log('Ticket #'+ id +' for '+ site +' was removed from the open queue');
     });
   },
   complete:function() {
     $('#table').fadeOut(1000, function() {
       $('#Database').load("dbb.php").fadeIn('slow');
     });
     new RefreshAlerts();
   }
  });
    $(this).dialog('close');
//    addNotice("<p>"+ $USER +" successfully removed <br>Ticket # "+ id +" for "+ site +"! </p>"); // -- Removed 7/9/14
    },
    Cancel: function() {
    $(this).dialog('close');
    window.location.reload(); 
    }
  }
});
 
  $(document).on("click", ".themes a", function() {
   $("link").attr("href",$(this).attr('rel'));
    var title= $(this).attr('rel');
  //   var styleSheet = localStorage.setItem("style", title);
  localStorage.setItem("style", title);
  console.log("Theme changed to: "+ title +" at "+ getTime());
      new Continue();
  });

});
