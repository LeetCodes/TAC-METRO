<?php
session_start();

if(isSet($_COOKIE['LoggedInAs'])) {
  $cookie_name = $_COOKIE['LoggedInAs'];
  $usr = $_COOKIE['LoggedInAs'];
  $hash = $_COOKIE['LoginPass'];
  
  $IP = $_SERVER['REMOTE_ADDR'];
  date_default_timezone_set('America/Chicago');
  $LastLogged = date('n/j/Y \@ g:i A');
	
	// Check if the cookie exists
  if(isSet($_COOKIE['LoggedInAs'])) {
	parse_str($_COOKIE['LoggedInAs']);
	
	// Make a verification
	if(isset($usr ) && (isset($hash ) ) ) {
      $user="infortel";
      $pass="T3lemanagement";

   try {
      $dbh = new PDO('mysql:host=localhost;dbname=dbase', $user, $pass );			
	// Register the session
	$_SESSION['myusername'] = $usr;
	$_SESSION['auth'] = 1;
      $UPDATE = $dbh->prepare("UPDATE dbase.members SET IP='$IP', LastLoggedIn='$LastLogged' WHERE username='$usr'");
		  if( $UPDATE->execute() ){
    
	$cookie_name = "LoggedInAs";
	$cookie_value = $usr;
	$cookie_time = (86400 * 30);
	setcookie ($cookie_name, $cookie_value, time() + $cookie_time);
?>
<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
  <script type="text/javascript">
    $(function() {
      var loginName = "<?php echo ucwords($usr);?>";
      localStorage.setItem("Login", loginName);
	  console.log("Logged in through AutoLogin!");
    });
  </script>			
 <?php
                }
  } 
      catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
      }
    }
  }
}
?>