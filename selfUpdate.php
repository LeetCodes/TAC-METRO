<?php
$user="infortel";
$pass="T3lemanagement";
$Request = file_get_contents('php://input');
$DELETE = json_decode($Request, true);
$Ticket = $DELETE["Ticket"];

try {
    $dbh = new PDO('mysql:host=localhost;dbname=dbase', $user, $pass );
	$query = $dbh->prepare('UPDATE Tickets SET Deleted="X",Removedby="Jim",Removed_Datetime="2015-01-09 14:14:57" WHERE ticket=:ticket');
    $query->bindParam(':ticket', $Ticket);
	
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
