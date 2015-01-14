<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<link rel="icon" href="http://tac-alert01/favicon.ico" type="image/x-icon">
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
<div id="mainWrap">
<!-- BEGIN SIDE-BAR -->
<nav class="sidebar bg-darkTeal fg-white span6" id="sideBar">

<ul> 
	<li class="title"><b class="text-center">TAC-ALERT8</b></li>
  <br>
    <li class="noClear">	
  <form action='http://tac-wiki/wiki/index.php/Special:SphinxSearch' id='WikiForm' method='get' name='wSearch' target='_new'>
      <div class="span6 input-control text">
         <input id='sValue' name='title' type='hidden' value='Special:SphinxSearch'> 
         <input id='search_text' maxlength='150' name='sphinxsearch' placeholder='Search the Wiki' tabindex='1' type='search'> 
        <button name='Search_Wiki' id='search_button' name='fulltext' class="btn-search"></button>
  </form>
      </div>
    </li>
  <br>
        <li class="title">Quick Links</li>
		<li class="stick bg-crimson"><a href="http://tac-alert01/CDRMS.php"> <i class="icon-rocket on-right"></i> CDRMS Clients</a></li>
        <li class="stick bg-cyan"><a href="http://tac-alert01/Attach.php">Attach An Item</a></li>
        <li><a href="http://tac-alert01/statistics.php">TAC-Alert Statistics</a></li>
        <li><a href="http://thesource.isi-info.com">The Source</a></li>
        <li class="stick bg-amber"><a href="http://badger/EngWiki/Default.aspx">The Engineering Wiki</a></li>
</ul>	    

<br>

<span id="StatusBlock">
  <div class="tile bg-emerald bg-hover-red" id="LoginStatus">
      <div class="tile-content icon">Logged in as <b id="log-in"></b>
          <i class="icon-user"></i>
      </div>
      <div class="brand bg-black">
          <span class="label fg-white">Log Out?</span>
      </div>
  </div>  
  <div class="tile bg-orange bg-hover-lightOrange" id="Preferences">
      <div class="tile-content icon">
          <i class="icon-cog"></i>
      </div>
      <div class="brand bg-black">
          <span class="label fg-white">Settings</span>
      </div>
  </div>
</span>
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
    <div class="content">
        <div id="database">
		</div>
    </div>
</div> <!-- //CLOSE Window -->

<span class="tileBar">
  <div id="weatherMan" data-role="live-tile" data-effect="slideDown" data-easing="easeInExpo" class="tile double bg-darkBlue fg-white bg-hover-amber">
    <div class="tile-content icon">
          <i class="icon-sun-3"></i>
    </div>
      <div class="brand bg-black">
          <span class="label fg-white">Weather</span>
      </div>
	  <div class="tile-content image" id="Weather"></div>
</div> <!-- //CLOSE #weatherMan -->

<div id="statistics" class="tile bg-darkGreen fg-white bg-hover-emerald">
   <a href="http://tac-alert01/statistics.php" title="Generate Ticket Statistics" target="_NEW">
	<div class="tile-content icon">
          <i class="icon-stats-up"></i>
    </div>
   </a>
      <div class="brand bg-black">
          <span class="label fg-white">Statistics</span>
      </div>
  </div> <!-- //CLOSE #statistics -->

<div id="wiki" class="tile bg-darkIndigo fg-white bg-hover-indigo">
   <a href="http://tac-wiki/wiki/index.php" title="TAC's Wiki knowledgebase" target="_NEW">
	<div class="tile-content icon">
          <i class="icon-lab"></i>
    </div>
   </a>
      <div class="brand bg-black">
          <span class="label fg-white">TAC-Wiki</span>
      </div>
  </div> <!-- //CLOSE #wiki -->

</span> <!-- //CLOSE #TileBar -->

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
<!-- // Compressed version of all related vendor plug-ins used in jQuery -->
<script type="text/javascript" src="js/setOpts.js"></script>
<script type="text/javascript" src="js/TACALERT.js"></script>
<script type="text/javascript" src="js/winScripts.js"></script>
<script type="text/javascript" src="js/dataTable.min.js"></script>

  
</body>
</html>

