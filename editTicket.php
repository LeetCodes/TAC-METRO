<?php 
			// list out our first-accessed variables for connecting to the database.
$db_host = 'localhost';
$db_user = 'infortel';
$db_pwd = 'T3lemanagement';
$database = 'dbase';
$table = 'tickets';
$ticket = 'Ticket';
global $TicNum;

	$con = mysql_connect($db_host, $db_user, $db_pwd);
if(!mysql_connect($db_host, $db_user, $db_pwd))   
		die ("Can't connect to database");
			if(!mysql_select_db($database))   
				die ("Can't select database");

?>

	<div id="pgTitle" class="row">
		<h2>Edit a Ticket in Real-time!</h2> <hr style="border:2px dashed #bbbbbb;">
	</div>

<div id="divtop" class="clearfix input-control">

<form name="Zticket" METHOD="GET" action="ticketEdit.php" target="new" id="EditForm">
<div class="input-control text">
<input type="text" name="TicNum" id="Ticket" placeholder="Ticket Number" MAXLENGTH=6 TABINDEX=1 required />
</div>

<button type="submit" id="Lookup"  border="0" class='large primary'> Submit <i class="icon-arrow-right-5 on-right"></i></button>
</form>
</div>
