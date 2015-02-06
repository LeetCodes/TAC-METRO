<?php
session_start();
session_destroy();

if( isset($_COOKIE['LoggedInAs']) ) {
$user = $_COOKIE['LoggedInAs'];
header("refresh:1; url=". $_SERVER['HTTP_REFERER']);
require('database.php'); 		
	date_default_timezone_set('America/Chicago');
		$IP = $_SERVER['REMOTE_ADDR'];
		$LastLogged = "L_".date('n/j/Y \@ g:i A');
print "<div id='IP' style='color:#FFFFFF;'>". $IP ."</div>";
		?>

<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript">
$(function() {
var IP = $('div#IP').text();
localStorage.setItem('Login', IP);
});				
</script>
<?php
mysql_query("UPDATE dbase.members SET IP='$IP', LastLoggedIn='$LastLogged' WHERE username='$user'") or die("Could not update LastLoggedIn!". mysql_error() );
}

else {
header("refresh:1; url=". $_SERVER['HTTP_REFERER']);
}
?>