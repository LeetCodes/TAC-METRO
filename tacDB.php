<?php
$user="infortel";
$pass="T3lemanagement";

try {
    $dbh = new PDO('mysql:host=localhost;dbname=dbase', $user, $pass, array( PDO::ATTR_PERSISTENT => true) );
	$query = $dbh->prepare('SELECT * from Tickets where Deleted !="X" ORDER BY ticket ASC LIMIT 100 ');
    
	
	if($query->execute() ){
	  if($query->rowCount() > 0){
	  while($row = $query->fetchAll(PDO::FETCH_ASSOC)){
//	  print "<br>". $query->rowCount() ."<br>";
	    print json_encode($row);
	  }
    } else {
	    print "[]";
	  }
      $dbh = null;
	}
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}


?>