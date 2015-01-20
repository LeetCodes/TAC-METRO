<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<link rel="icon" href="img/favicon.ico" type="image/x-icon">
<script type="text/javascript" src="js/modernizr.js"></script>
  <!-- // LOAD MODERNIZR FIRST for legacy browser interaction -->
    <title>TAC's Alert System</title>
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
<nav class="sidebar bg-darkTeal fg-white span6 container" id="sideBar">

<ul> 
	<li class="title"><b class="text-center">TAC-ALERT8</b></li>
  <br>
    <li class="noClear">	
  <form action='http://tac-wiki/wiki/index.php/Special:SphinxSearch' id='WikiForm' method='get' name='wSearch' target='_new'>
      <div class="span6 input-control text">
         <input id='sValue' name='title' type='hidden' value='Special:SphinxSearch'> 
         <input id='search_text' maxlength='150' name='sphinxsearch' placeholder='Search the Wiki' tabindex='1' type='search'> 
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
        <li><a href="http://thesource.isi-info.com"><i class="icon-earth fg-cobalt on-right"></i> The Source</a></li>
        <li><a href="http://tac-alert01/tickadd.php" title="Add a Ticket back into the Queue" target="_NEW"><i class="icon-plus fg-green on-right"></i> TAC's Ticket Adder</a> </li>
  
            </ul>
        </li>
		
		<li id="GenRes">
           <a class="dropdown-toggle" href="#"><i class="icon-new-tab fg-amber on-right"></i>General Resources</a>
          <ul class="dropdown-menu" data-role="dropdown">
            <li><a href="https://isi-info.webex.com/mw0401l/mywebex/default.do?siteurl=isi-info&service=9" title="Start a WebEx Support Session" target="_NEW"><i class="icon-phone fg-lime on-right"></i> WebEx Support Center</a> </li>
            <li ><a href="http://badger/EngWiki/Default.aspx"><i class="icon-cone fg-orange on-right"></i> The Engineering Wiki</a></li>
        <li><a href="http://tac-alert01/tbyc.php" title="Ticket Creation Statistics" target="_NEW"><i class="icon-user-2 fg-indigo"></i> Search Tickets by Creator</a> </li>
        <li><a href="http://tac-alert01/search.php" title="Ticket  Search by Client" target="_NEW"><i class="icon-user-3 fg-cyan"></i> Search Tickets by Customer</a> </li>			
		  </ul>
        </li>
</ul>	    

<br>

<span id="StatusBlock" class="two-columns">
<div class="clearfix">
  <div class="tile bg-emerald bg-hover-red" id="LoginStatus">
      <div class="tile-content icon">Logged in as <b id="log-in"></b>
          <i class="icon-user"></i>
      </div>
      <div class="brand bg-black">
          <span class="label fg-white">Log Out?</span>
      </div>
  </div>  <!-- // CLOSE #LoginStatus -->
  
  <div class="tile bg-orange bg-hover-amber" id="Preferences">
      <div class="tile-content icon">
          <i class="icon-cog"></i>
      </div>
      <div class="brand bg-black">
          <span class="label fg-white">Settings</span>
      </div>
  </div> <!-- //CLOSE #Preferences -->
  
</div> <!-- //CLOSE .clearfix -->
<div class="clearfix">
<div id="wiki" class="tile bg-indigo fg-white bg-hover-indigo">
   <a href="http://tac-wiki/wiki/index.php" title="TAC's Wiki knowledgebase" target="_NEW">
	<div class="tile-content icon">
          <i class="icon-lab"></i>
    </div>
   </a>
      <div class="brand bg-black">
          <span class="label fg-white">TAC-Wiki</span>
      </div>
  </div> <!-- //CLOSE #wiki -->
<div id="statistics" class="tile bg-darkGreen fg-white">
   <a href="#" title="Generate Ticket Statistics" target="_NEW">
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

<div id="dbWindow" class="window shadow bd-steel ol-steel ">
    <div id="dbCaption" class="caption fg-white ol-steel bd-steel bg-steel">
        <span class="icon icon-windows "></span>
        <div class="title">TICKET ALERT WINDOW</div>
        <button class="btn-min"></button>
        <button class="btn-max"></button>
        <button class="btn-close"></button>
    </div>
    <div class="content" class="container">
	<p>
        <div id="database" class="bg-white">
		</div>
    </p>
		<p id="refreshCode" class="fg-white code-text text-right"><small>Press <code>ESC</code> to refresh.</small></p>
    </div>
</div> <!-- //CLOSE Window -->

<div class="tileBar row">
  <button id="newTicket" title="Open a New Ticket" class="shortcut fg-white ribbed-black bg-hover-darkTeal">
    <i class="icon-new"></i> 
	  New Ticket
    <small id="ticketCount" class="bg-black fg-white"> </small>
  </button>
  
  <button id="editTicket" title="Edit TAC tickets" class="shortcut fg-white ribbed-gray bg-hover-darkOrange">
    <i class="icon-history"></i>
      Edit Tickets
  </button>
  
  <div id="weatherMan" data-role="live-tile" data-effect="slideDown" data-easing="easeInExpo" class="tile double bg-darkBlue fg-white bg-hover-amber" style="clear:none;float:right;margin-left:5px;">
    <div class="tile-content icon">
          <i class="icon-sun-3"></i>
    </div>
      <div class="brand bg-black">
          <span class="label fg-white">Weather</span>
      </div>
	  <div class="tile-content image" id="Weather"></div>
  </div> <!-- //CLOSE #weatherMan -->
  
  
</div> <!-- //CLOSE #TileBar -->

</div>
<!-- // CLOSE #bodyWrapper -->


<div id="bottom">
	<div class="start"></div>
  <div class="taskbar">
    <ul>
      <li id="t-explor"><img src="css/img/tb-explorer.png"></li>
      <li id="t-calc"><img src="css/img/Calc.png"></li>
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

  
</body>
</html>

