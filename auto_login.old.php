<?php
session_start();

if(isSet($_COOKIE['LoggedInAs'])) {
$cookie_name = $_COOKIE['LoggedInAs'];
$usr = $_COOKIE['LoggedInAs'];
$hash = $_COOKIE['LoginPass'];
	// Register the session
	$_SESSION['myusername'] = $usr;
	$_SESSION['auth'] = 1;
  $IP = $_SERVER['REMOTE_ADDR'];
  date_default_timezone_set('America/Chicago');
  $LastLogged = date('n/j/Y \@ g:i A');
	
	// Check if the cookie exists
if(isSet($_COOKIE[$cookie_name]))
{

	parse_str($_COOKIE['LoggedInAs']);
	// Make a verification
	if(isset($usr ) && (isset($hash ) ) ){
$user="infortel";
$pass="T3lemanagement";

echo $usr;
  try {
    $dbh = new PDO('mysql:host=localhost;dbname=dbase', $user, $pass );			
    $UPDATE = $dbh->prepare("UPDATE dbase.members SET IP=$IP,LastLoggedIn=$LastLogged WHERE username=$usr");
				if( $UPDATE->execute() ){
				$do_login = true;
				$_POST['username'] = $_COOKIE['LoggedInAs'];
				$_POST['password'] = $_COOKIE['LoginPass'];
				include_once('do_login.php');
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