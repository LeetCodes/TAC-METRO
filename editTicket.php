<?php 
			// list out our first-accessed variables for connecting to the database.
$db_host = 'localhost';
$db_user = 'root';
$db_pwd = '';
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

	<div id="pgTitle">
		<h2>Edit a Ticket in Real-time!</h2>
		<sub>Submit a ticket, then click the fields to edit them.</sub>
	</div>
<br>
<div id="divtop">

<form name="Zticket" METHOD="GET" action="tickedit.php" target="new" id="EditForm">
<input type="text" name="TicNum" id="Ticket" placeholder="Ticket Number" MAXLENGTH=6 TABINDEX=1 class='outline' required/> &nbsp;&nbsp;

<button type="submit" id="Lookup"  border="0" class='metro warning btn icon-right'  >Submit <img src="/icons/bullet_go.png" border="0" alt="" /></button> &nbsp;
</form>
</div>

<hr style="border:2px dashed #bbbbbb;">
<script>
$( function() {
	$("button").button();
});
</script>
