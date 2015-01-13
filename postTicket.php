<?php
$user="infortel";
$pass="T3lemanagement";
$Request = file_get_contents('php://input');
$CREATE = json_decode($Request, true);

// Build variables from POST data in JSON query submitted to this script.

$Ticket = $CREATE["Ticket"];
$priority = $CREATE["Priority"];
$site = $CREATE["Site"];
$comments = filter_var($CREATE["Comments"], FILTER_SANITIZE_STRING);
$creator = $CREATE["Creator"];
$removed = "N";
$contact = $CREATE["ContactPref"];

try {
    $dbh = new PDO('mysql:host=localhost;dbname=dbase', $user, $pass );
	$query = $dbh->prepare("INSERT INTO tickets (Ticket,Date,STime,ETA,Priority,Site,Comments,Deleted,Removed_Datetime,removedby,Creator,ContactPref) VALUES (:ticket, DATE_FORMAT(CURDATE(),'%c/%e/%Y'), CURTIME(),ADDTIME(CURTIME(),'02:00:00'),:priority,:site,:comments,:removed,:creator,:contact");
    $query->bindParam(":ticket", $Ticket);
    $query->bindParam(":date", $date);
    $query->bindParam(":stime", $stime);
    $query->bindParam(":eta", $eta);
    $query->bindParam(":priority", $priority);
    $query->bindParam(":site", $site);
    $query->bindParam(":removed", $removed);
    $query->bindParam(":comments", $comments);
    $query->bindParam(":creator", $creator);
    $query->bindParam(":contact", $contact);
	
	if($query->execute() ){
	  print "1";
	  //print "<br>". var_dump($Ticket);
    } else {
	    print "OH NO!";
	  }
      $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}


?>
