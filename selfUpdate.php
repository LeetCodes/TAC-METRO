<?php
$user="infortel";
$pass="T3lemanagement";
$Request = file_get_contents('php://input');
$DELETE = json_decode($Request, true);
$Ticket = $DELETE["Ticket"];
$User = $DELETE["User"];

try {
    $dbh = new PDO('mysql:host=localhost;dbname=dbase_backup', $user, $pass );
	$query = $dbh->prepare('UPDATE Tickets SET Deleted="X",Removedby=:user,Removed_Datetime= DATE_FORMAT(CURDATE(),"%c/%e/%Y") WHERE ticket=:ticket');
    $query->bindParam(':ticket', $Ticket);
    $query->bindParam(':user', $User);
	
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
