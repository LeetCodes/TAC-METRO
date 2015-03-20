<?php require("autologin.php"); ?>
<!DOCTYPE html>
<head>
<html lang="en">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<link rel="icon" href="img/favicon.ico" type="image/x-icon">
<script type="text/javascript" src="js/modernizr.js"></script>
  <!-- // LOAD MODERNIZR FIRST for legacy browser interaction -->
    <title>TAC's Alert System</title>
<link rel="stylesheet" type="text/css" href="css/fontFace.css">
<link rel="stylesheet" type="text/css" href="css/styles.css">

<link rel="stylesheet" type="text/css" href="Metro-ui/min/metro-bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="Metro-ui/min/iconFont.min.css">
<link rel="stylesheet" type="text/css" href="Metro-ui/min/metro-bootstrap-responsive.min.css">

<style>

</style>
</head>
<body class="metro">

<div id="mainWrap" class="grid fluid">
<!-- BEGIN SIDE-BAR -->
<nav class="sidebar bg-darkTeal fg-white span5 container" id="sideBar">

<div class="row">
 <a class="dropdown-toggle fg-white" href="#">
   <div id="userid" class="user-id bg-darker bg-hover-gray">
     <div class="user-id-image"> <i class="icon-user"></i> </div>
     <div class="user-id-name">
	   <b id="log-in" class="first-name"></b>
	 </div>
   </div>
 </a>   
            <ul class="dropdown-menu place-right" data-role="dropdown">
                <li><a href="#" id="TAClogin"> <i class="icon-user-3 on-left"></i> <b class="text-success">Log in</b> </a></li>
                <li><a href="TAClogout.php" id="TAClogout"><b class="text-alert"><i class="icon-cancel on-left"></i> Log out </b> </a></li>
            </ul>
</div>
<ul> 
	<li class="title"><b class="text-center">TAC-ALERT8</b></li>
  <br>
    <li class="noClear">	
  <form action='http://tac-wiki/wiki/index.php/Special:SphinxSearch' id='WikiForm' method='get' name='wSearch' target='_new'>
      <div class="span5 input-control text">
         <input type='hidden' id='sValue' name='title' value='Special:SphinxSearch'> 
         <input type='text' id='search_text' maxlength='150' name='sphinxsearch' placeholder='Search the Wiki' tabindex='1'  > 
        <button name='Search_Wiki' id='search_button' name='fulltext' class="large btn-search"></button>
  </form>
      </div>
    </li>
        <li class="title">Quick Links</li>
		<li id="IntLinks">
            <a class="dropdown-toggle" href="#"><i class="icon-link fg-blue on-right"></i>Internal Links</a>
            <ul class="dropdown-menu" data-role="dropdown">
        <li><a href="http://tac-wiki/wiki/index.php" title="TAC's Wiki knowledgebase" target="_NEW"><i class="icon-wordpress fg-black on-right"></i> TAC Wikibase</a> </li>
		<li><a href="http://tac-alert01/CDRMS.php"> <i class="icon-address-book fg-darkPink on-right"></i> CDRMS Clients</a></li>
        <li ><a href="http://tac-alert01/Attach.php"><i class="icon-upload-2 fg-lightBlue on-right"></i> Attach An Item</a></li>
		<li><a href="http://tac-alert01/attachments.php" title="Attachment File Listing" target="_NEW"><i class="icon-attachment fg-steel on-right"></i>TAC Attachment Listing </a> </li>
        <li><a href="http://tac-alert01/tickadd.php" title="Add a Ticket back into the Queue" target="_NEW"><i class="icon-plus fg-emerald on-right"></i> TAC's Ticket Adder</a> </li>
  
            </ul>
        </li>
		
		<li id="GenRes">
           <a class="dropdown-toggle" href="#"><i class="icon-new-tab fg-amber on-right"></i>General Resources</a>
          <ul class="dropdown-menu" data-role="dropdown">
        <li><a href="http://thesource.isi-info.com"><i class="icon-earth fg-cobalt on-right"></i> The Source</a></li>
        <li><a href="https://isi-info.webex.com/mw0401l/mywebex/default.do?siteurl=isi-info&service=9" title="Start a WebEx Support Session" target="_NEW"><i class="icon-phone fg-lime on-right"></i> WebEx Support Center</a> </li>
        <li><a href="http://badger/EngWiki/Default.aspx"><i class="icon-cone fg-orange on-right"></i> The Engineering Wiki</a></li>
        <li><a href="http://tac-alert01/tbyc.php" title="Ticket Creation Statistics" target="_NEW"><i class="icon-user-2 fg-indigo"></i> Search Tickets by Creator</a> </li>
        <li><a href="http://tac-alert01/search.php" title="Ticket  Search by Client" target="_NEW"><i class="icon-user-3 fg-cyan"></i> Search Tickets by Customer</a> </li>			
		  </ul>
        </li>
</ul>	    

<br>

<span id="StatusBlock" class="two-columns">
<div class="clearfix">
  
  <div class="tile ribbed-darkIndigo bg-hover-indigo" id="Preferences">
      <div class="tile-content icon">
          <i class="icon-cog"></i>
      </div>
      <div class="brand bg-black">
          <span class="label fg-white">Settings</span>
      </div>
  </div> <!-- //CLOSE #Preferences -->
 
<div id="statistics" class="tile bg-darkMagenta fg-white bg-hover-magenta">
   <a href="#" title="Generate Ticket Statistics" >
	<div class="tile-content icon">
          <i class="icon-stats-up"></i>
    </div>
   </a>
      <div class="brand bg-black">
          <span class="label fg-white">Statistics</span>
      </div>
  </div> <!-- //CLOSE #statistics -->


 </div> <!-- //CLOSE .clearfix -->
 
</span> <!--//CLOSE #StatusBlock -->

</nav> <!-- //CLOSE #SideBar -->



<div id="bodyWrapper" class="offset1 span12">

<div id="dbWindow" class="window shadow bd-steel ol-steel">
    <div id="dbCaption" class="caption fg-black ol-black bd-steel bg-steel">
        <span class="icon icon-windows "></span>
        <div class="title">TICKET ALERT WINDOW</div>
        <button class="btn-min"></button>
        <button class="btn-max"></button>
        <button class="btn-close"></button>
    </div>
    <div id="dbContent" class="content">
	<p class="container">
        <div id="database" class="bg-transparent">
		</div>
    </p>
		
    </div>
  <span id="refreshCode" class="code-text text-left"><small class="text-muted">
      Press <button id="RELOAD" class="mini rounded">ESC</button> to refresh.</small>
  </span>
</div> <!-- //CLOSE Window -->

<div class="tileBar grid fluid">
  <div class="span6 row">
  <button id="newTicket" title="Open a New Ticket" class="shortcut fg-white ribbed-black bg-hover-darkTeal">
    <i class="icon-new"></i> 
	  New Ticket
    <small id="ticketCount" class="bg-black fg-white"> </small>
  </button>
  
  <button id="editTicket" title="Edit TAC tickets" class="shortcut fg-white ribbed-gray bg-hover-darkOrange">
    <i class="icon-history"></i>
      Edit Tickets
  </button>
  
  <div id="weatherMan" data-role="live-tile" data-effect="slideDown" data-easing="easeInExpo" class="tile double bg-darkBlue fg-white bg-hover-amber">
    <div class="tile-content icon">
          <i class="icon-sun-3"></i>
    </div>
      <div class="brand bg-black">
          <span class="label fg-white">Weather</span>
      </div>
	  <div class="tile-content image" id="Weather"></div>
  </div> <!-- //CLOSE #weatherMan -->
  
  </div> <!-- //CLOSE .row -->
</div> <!-- //CLOSE #TileBar -->

</div>
<!-- // CLOSE #bodyWrapper -->


<div id="bottom">
	<div class="start"><h2 class="bg-transparent fg-white fg-hover-cyan"><i class="icon-windows on-right-more"></i></h2></div>
  <div class="taskbar">
    <ul>
      <li id="t-explor"><img src="img/Explorer128.png" title="Show / Hide the Ticket Window."><small class="fg-white on-right">Tickets</small> </li>
      <li id="t-calc"><img src="img/cpanel.png" title="Show / Hide the TAC Toolbar."><small class="fg-white on-right">Toolbar</small> </li>
      <li id="t-network"><img src="img/network.png" title="See Logged in Users for today."><small class="fg-white on-right">Users</small> </li>      
	  <li id="t-search"><img src="img/searchPC.png" title="Search for Tickets."><small class="fg-white on-right">Search</small> </li>
    </ul>
  </div>
  <div class="datetime">
  </div>
</div>
<!-- // CLOSE #bottom -->


</div> 
<!-- //END #mainWrapper -->

<!-- 

// SCRIPTS BLOCK FOR LIBRARY INTEGRATION

-->

<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.11.2/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/jQuery_Plugins.js"></script>
<script type="text/javascript" src="js/metro.min.js"></script>
<!-- // Compressed version of all related vendor plug-ins used in jQuery
<script type="text/javascript" src="js/TACALERT.js"></script>
 -->
<script type="text/javascript" src="js/setOpts.js"></script>

<script type="text/javascript" src="js/winScripts.js"></script>
<script type="text/javascript" src="js/dataTable.min.js"></script>

<div id="IPADDRESS" style="color:transparent;background:transparent;"> <?php echo $_SERVER['REMOTE_ADDR']; ?> </div> 
		
</body>
</html>

