<?php 
session_start();
require_once("database.php"); 
include("autologin.php");
?>

<script type="text/javascript" src="js/metro.min.js"></script>
<div id='wrap' class='metro'>
<?php

	function NotLoggedIn() {
	
			$user = "Not Logged In";
			$USER = $_SERVER["REMOTE_ADDR"];
			$success = "#FFCCCC";
			$IP = $_SERVER['REMOTE_ADDR'];	
            $_SESSION['myusername'] = $IP;
?>
		<div id='out' class="input-control">
		<form id='form1' name='form1' method='post' action='checklogin.php'>
<?php	

  $check = mysql_query("select username, password from dbase.members where IP='$IP'");
  $checkup = mysql_fetch_row($check);
  $MyLogin = $checkup[0];
  $MyPass = $checkup[1];
  ?>

<div class="input-control text">
  <input name="myusername" type="text" id="myusername"  placeholder="Username" />
 </div>
<div class="input-control password" data-role="input-control">
  <input name="mypassword" type="password" value="" id="mypassword" placeholder="Password"/> 
  <button class="btn-reveal"></button>
</div>

<br><br>
<div id="chkbx" class="input-control switch margin10" data-role="input-control">
    <label>Remember Me
  <input type="checkbox" id="auto" name="autologin" value="1" />
  <span class="check"></span>
    </label>
</div> 

<br>
<button type="submit" name="Submit" value="Login" class="large button"><i class="icon-user on-right"></i> Log In</button>
</form>


</div>
<span id="RegUser"><a href="RegUsr.php" target="_NEW">Click here to register.</a></span>

<script type="text/javascript">
$(function() {
    $("#form1").on("submit", function(){
      var loginName = "<?php echo $USER;?>";
        localStorage.setItem("Login", loginName);
    });
});
</script>
<?php
};
function LoggedIn() {
		$IP = $_SERVER['REMOTE_ADDR'];
		date_default_timezone_set('America/Chicago');
		$LastLogged = date('n/j/Y \@ g:i A');
		$_SESSION['myusername'] = $_COOKIE['LoggedInAs'];

		$USER = $_SESSION['myusername'];
		$Uuser = $_COOKIE['LoggedInAs'];
		$user = $_SESSION['myusername'];

		mysql_query("UPDATE dbase.members SET IP='$IP', LastLoggedIn='$LastLogged' WHERE username='$user'") or die("Could not update LastLoggedIn!". mysql_error() );
?>
		<div id='in' >		
You have been logged in as <b id="LoggedIn" >  <?php echo ucwords($Uuser) ;?> </b> - <small>Thank you</small>. 

</div><a href='TAClogout.php'><span id='outlog'> <b>Log Out?</b> </a></span>
<script type="text/javascript">
$(function() {
var loginName = "<?php echo $USER;?>";
localStorage.setItem("Login", loginName);

setTimeout( window.location.reload(true), 10000);
});
</script>
<?php
};

  if( empty($_COOKIE['LoggedInAs']) ){
    $cookie = null;
  }
  else{
    $cookie = $_COOKIE['LoggedInAs'];
  }
	
	if($cookie) {
        LoggedIn();
	}
	else {
        NotLoggedIn();
	}
?>	
</div>