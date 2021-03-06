<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link rel="icon" href="http://tac-alert01/favicon.ico" type="image/x-icon">
<script type="text/javascript" src="js/modernizr.js"></script>
  <!-- // LOAD MODERNIZR FIRST for legacy browser interaction -->
    <title>TAC's Alert System</title>
<link rel="stylesheet" type="text/css" href="css/jqUI.css">
<link rel="stylesheet" type="text/css" href="Metro-ui/min/metro-bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="Metro-ui/min/iconFont.min.css">
<link rel="stylesheet" type="text/css" href="Metro-ui/min/metro-bootstrap-responsive.min.css">

<style>
html,body {
	font-family: "Segoe UI", Arial, Sans-Serif;
	font-size: 10pt;
	margin: 0px;
	width: 100%;
	height: 100%;
	overflow: hidden;
    background: #DADADA;
    color: #212121;
}
#bodyWrapper{
clear: none;
overflow: visible;
}

@-moz-keyframes spin {
  100% { -moz-transform: rotate(360deg); }
}

@-webkit-keyframes spin {
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  100% { -webkit-transform: rotate(360deg); transform:rotate(360deg); }
}	 

.ajaxloader {
position: absolute;
width: 30px;
height: 30px;
left: 50%;
top: 15%;
margin: 0 0 0 -15px;
border: 8px solid #fff;
border-right-color: transparent;
border-radius: 50%;
box-shadow: 0 0 25px 2px #eee;
-webkit-animation: spin 1s linear infinite;
-moz-animation: spin 1s linear infinite;
-ms-animation: spin 1s linear infinite;
-o-animation: spin 1s linear infinite;
animation: spin 1s linear infinite;

}  

.content{
max-height: 800px;
overflow: auto;
padding: 5px;
}


.foot {
	height: 50px;
	background: #f1f5fb;
	-webkit-box-shadow: inset 0px 4px 13px #CCD9EA;
	box-shadow: inset 0px 4px 13px #CCD9EA;
}

.foot img {
	width: 52px;
	margin-left: 20px;
	float: left;
}

.foot b {
	margin: 10px;
	line-height: 40px;
	font-weight: 200;
}

.foot label {
	color: #333;
	margin-right: 60px;
}

.foot label i {
	color: #555;
	font-weight: normal;
	font-style: normal;
}

/*start Menu*/
#startmenu {
	border-radius: 5px;

	-webkit-box-shadow: inset 0 0 1px #fff;
	box-shadow: inset 0 0 1px #fff;
	background-color: #619bb9;

	background: -webkit-linear-gradient(top, rgba(50, 123, 165, 0.75), rgba(46, 75, 90, 0.75) 50%, rgba(92, 176, 220, 0.75));
	background: -moz-linear-gradient(top, rgba(50, 123, 165, 0.75), rgba(46, 75, 90, 0.75) 50%, rgba(92, 176, 220, 0.75));
	background: -o-linear-gradient(top, rgba(50, 123, 165, 0.75), rgba(46, 75, 90, 0.75) 50%, rgba(92, 176, 220, 0.75));
	background: -ms-linear-gradient(top, rgba(50, 123, 165, 0.75), rgba(46, 75, 90, 0.75) 50%, rgba(92, 176, 220, 0.75));
	background: linear-gradient(top, rgba(50, 123, 165, 0.75), rgba(46, 75, 90, 0.75) 50%, rgba(92, 176, 220, 0.75));
	border: solid 1px #102A3E;
	display: inline-block;
	margin: 100px 0 0 0px;
	overflow: visible;
	position: absolute;
	bottom: 41px;
	left: 0;
}

#applications {
	-webkit-box-shadow: 0 0 1px #fff;
	box-shadow: 0 0 1px #fff;
	border-radius: 3px;
	background: white;
	border: solid 1px #365167;
	display: block;
	float: left;
	list-style: none;
	margin: 7px 0 7px 7px;
	padding: 0;
}

#applications li {
	list-style: none;
}

#applications li a {
	border: solid 1px transparent;
	color: #4b4b4b;
	display: block;
	margin: 3px;
	min-width: 220px;
	padding: 3px;
	text-decoration: none;
}

#applications li a:hover {
	border-radius: 3px;

	-webkit-box-shadow: inset 0 0 1px #fff;
	box-shadow: inset 0 0 1px #fff;
	background-color: #cfe3fd;

	background: -webkit-linear-gradient(top, #dcebfd, #c2dcfd);
	background: -moz-linear-gradient(top, #dcebfd, #c2dcfd);
	background: -o-linear-gradient(top, #dcebfd, #c2dcfd);
	background: -ms-linear-gradient(top, #dcebfd, #c2dcfd);
	background: linear-gradient(top, #dcebfd, #c2dcfd);
	border: solid 1px #7da2ce;
}

#applications li a img {
	border: 0;
	margin: 0 5px 0 0;
	vertical-align: middle;
}

.search form {
	background: #E4F4FC;
	border-top: 2px solid #BEE6FD;
	padding: 10px 0;
	border-radius: 0 0 5px 5px;
	display: block;
	padding: 3px;
	height: 30px;
}

.search input[type=text] {
	background: white;
	border: 1px solid #AAA;
	padding: 3px 5px;
	margin: 0 14px;
	font: italic 12px Calibri,Arial,Sans-Serif;
	color: #999;
	width: 188px;
	position: relative;
	outline: none;
	background: white url(img/search.png) no-repeat scroll 178px center;
}


#sysdir {
	margin: 7px;
	margin-top: -30px;
	float: left;
	display: block;
	padding: 0;
	list-style: none;
}

#sysdir li a {
	border: solid 1px transparent;
	display: block;
	margin: 5px 0;
	position: relative;
	color: #fff;
	text-decoration: none;
	min-width: 120px;
}

#sysdir li a:hover {
	border-radius: 3px;

	-webkit-box-shadow: inset 0 0 1px #fff;
	box-shadow: inset 0 0 1px #fff;
	border: solid 1px #000;
	background-color: #658da0;

	background: -webkit-linear-gradient(center left, rgba(81,115,132,0.55), rgba(121,163,184,0.55) 50%, rgba(81,115,132,0.55));
	background: -moz-linear-gradient(center left, rgba(81,115,132,0.55), rgba(121,163,184,0.55) 50%, rgba(81,115,132,0.55));
	background: -o-linear-gradient(center left, rgba(81,115,132,0.55), rgba(121,163,184,0.55) 50%, rgba(81,115,132,0.55));
	background: -ms-linear-gradient(center left, rgba(81,115,132,0.55), rgba(121,163,184,0.55) 50%, rgba(81,115,132,0.55));
	background: linear-gradient(center left, rgba(81,115,132,0.55), rgba(121,163,184,0.55) 50%, rgba(81,115,132,0.55));
}

#sysdir li a span {
	padding: 5px;
	display: block;
}

#sysdir li a:hover span {
	background: -webkit-linear-gradient(center top, transparent, transparent 49%, rgba(2,37,58,0.5) 50%, rgba(63,111,135,0.5));
	background: -moz-linear-gradient(center top, transparent, transparent 49%, rgba(2,37,58,0.5) 50%, rgba(63,111,135,0.5));
	background: -o-linear-gradient(center top, transparent, transparent 49%, rgba(2,37,58,0.5) 50%, rgba(63,111,135,0.5));
	background: -ms-linear-gradient(center top, transparent, transparent 49%, rgba(2,37,58,0.5) 50%, rgba(63,111,135,0.5));
	background: linear-gradient(center top, transparent, transparent 49%, rgba(2,37,58,0.5) 50%, rgba(63,111,135,0.5));
}

#sysdir li.user {
	text-align: center;
}


/*start Button Buttom*/
#bottom {
	z-index: 1000;
	width: 100%;
	height: 50px;
	background-color: #619bb9;

	background: -webkit-linear-gradient(65deg,rgba(0, 0, 0, 0.6),rgba(0, 0, 0, 0.9),rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.9));
	background: -moz-linear-gradient(65deg,rgba(0, 0, 0, 0.6),rgba(0, 0, 0, 0.9),rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.9));
	background: -o-linear-gradient(65deg,rgba(0, 0, 0, 0.6),rgba(0, 0, 0, 0.9),rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.9));
	background: -ms-linear-gradient(65deg,rgba(0, 0, 0, 0.6),rgba(0, 0, 0, 0.9),rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.9));
	background: linear-gradient(65deg,rgba(0, 0, 0, 0.6),rgba(0, 0, 0, 0.9),rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.9));
	border-top: 1px solid rgba(0, 0, 0, 0.5);

	-webkit-box-shadow: inset 0 1px 0px rgba(255,255,255,0.4);
	box-shadow: inset 0 1px 0px rgba(255,255,255,0.4);
	position: absolute;
	bottom: 0;
}

#bottom .start {
	background: url(img/win8_metro.png) no-repeat;
	width: 45px;
	height: 40px;
	margin-left: 10px;
	float: left;
}

#bottom .taskbar {
	float: left;
	width: 80%;
	height: 100%;
	margin-left: 20px;
}

.taskbar ul {
	list-style: none;
	height: 90%;
	padding: 2px;
	vertical-align: top;
	margin: 2px;
}

.taskbar ul li {
	min-width: 35px;
	background: -webkit-linear-gradient(rgba(225, 225, 225, 0.6),rgba(52,38,66,0.6));
	background: -moz-linear-gradient(rgba(225, 225, 225, 0.6),rgba(52,38,66,0.6));
	background: -o-linear-gradient(rgba(225, 225, 225, 0.6),rgba(52,38,66,0.6));
	background: -ms-linear-gradient(rgba(225, 225, 225, 0.6),rgba(52,38,66,0.6));
	background: linear-gradient(rgba(225, 225, 225, 0.6),rgba(52,38,66,0.6));
	border-radius: 3px;

	-webkit-box-shadow: 0px 0px 3px #222;
	box-shadow: 0px 0px 3px #222;
	padding: 2px 15px 19px 13px;
	border: 1px solid #7B7481;
    height: 42px;
	float: left;
	margin-left: 5px;
	vertical-align: top;
}

.taskbar ul li:hover {
	background: -webkit-linear-gradient(rgba(225, 225, 225, 0.6),rgba(68,80,76,0.6));
	background: -moz-linear-gradient(rgba(225, 225, 225, 0.6),rgba(68,80,76,0.6));
	background: -o-linear-gradient(rgba(225, 225, 225, 0.6),rgba(68,80,76,0.6));
	background: -ms-linear-gradient(rgba(225, 225, 225, 0.6),rgba(68,80,76,0.6));
	background: linear-gradient(rgba(225, 225, 225, 0.6),rgba(68,80,76,0.6));
}

.taskbar ul li img {
display: inline;
box-sizing: content-box;
	min-width: 35px;
	height: 35px;
}

#bottom .datetime {
	width: 80px;
	left: 0;
	float: right;
	height: 100%;
	text-align: center;
	color: #fff;
	padding: 5px;
}

.user .frame {
	padding: 3px 5px 5px 3px;
	height: 48px;
	width: 48px;
	border-radius: 5px;

	-webkit-box-shadow: 0px 0px 13px #333;
	box-shadow: 0px 0px 13px #333;
	border: 1px solid #272848;
	margin: 0 auto;
}

.user .frame-inner {
	background: url("img/isi48.png") no-repeat;
	border: 1px solid #333;
	height: 100%;
	width: 100%;
}

.searchbox{
clear: none;
float: left;
white-space: nowrap !important;
}

#sideBar{
float:right;
}

#Table td{
align: center;
vertical-align: top;
}


.noClear{
    white-space: nowrap !important;
	border: none !important;
}
</style>
</head>
<body class="metro">
<nav class="sidebar bg-darkTeal fg-white span6" id="sideBar">

<ul> 
	<li class="title"><b>TAC-ALERT8</b></li>
<li class="noClear">	
<form action='http://tac-wiki/wiki/index.php/Special:SphinxSearch' id='WikiForm' method='get' name='wSearch' target='_new'>
  <div class="span5 input-control text">
   	<!-- // Wiki Search using Sphinx - taken from legacy TACALERT code -->

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
  <div class="tile bg-emerald bg-hover-lime" id="LoginStatus">
      <div class="tile-content icon">
          <i class="icon-user"></i>
      </div>
      <div class="brand bg-black bg-hover-gray">
          <span class="label fg-white">Logged in as <b id="log-in"></b></span>
      </div>
  </div>  
  <div class="tile bg-steel" id="Preferences">
      <div class="tile-content icon">
          <i class="icon-cog"></i>
      </div>
      <div class="brand bg-black">
          <span class="label fg-white">Settings</span>
      </div>
  </div>
</span>
</nav>

<div id="bodyWrapper" class="span12">

<div class="window active shadow">
    <div class="caption">
        <span class="icon icon-windows"></span>
        <div class="title">TICKET ALERT WINDOW</div>
        <button class="btn-min"></button>
        <button class="btn-max"></button>
        <button class="btn-close"></button>
    </div>
    <div class="content">
        <div id="database">
		<p>DATABASE GOES HERE!</p>
		</div>
    </div>
</div> <!-- //CLOSE Window -->



</div>
<!-- // CLOSE #bodyWrapper -->

<!-- 
//START MENU FROM WIN7 DESIGN

<div id="startmenu">
	<ul id="applications">
	<li>
    <a href="#" data-reveal-id="TicketWindow" data-reveal id="oTicketModal"><img src="css/img/chrome.png" alt="" />New Ticket</a></li>
  <li><a href="#" data-reveal-id="TicketSearch" data-reveal ><img src="css/img/notepad.jpg" alt="" />Search Tickets</a></li>
	<li><a href="#" data-reveal-id="EditTickets" data-reveal ><img src="css/img/firefox-32.png" alt="" />Ticket Editor</a></li>
  <li><a href="http://tac-alert01/"><img src="css/img/ie.png" alt="" />Internet Explorer</a></li>
  <li><a href="http://tac-alert01/"><img src="css/img/VS-logo.png" height=48px width=48px alt="" />Microsoft Visual Studio 2010</a></li>
  <li><a href="http://tac-alert01/"><img src="css/img/paint.jpg" alt="" />Paint</a></li>
		<li class="search">
<form action='http://tac-wiki/wiki/index.php/Special:SphinxSearch' id='WikiForm' method='get' name='wSearch' target='_new'>
<div id="SearchContainer" class="span4">  
  <div class="searchbox">
   <div class="span3">

         <input id='sValue' name='title' type='hidden' value='Special:SphinxSearch'> 
         <input id='search_text' maxlength='150' name='sphinxsearch' placeholder='Search the Wiki' tabindex='1' type='search'> 

        <button name='Search_Wiki' id='search_button' name='fulltext' class="button info"> <i class="icon-search"></i> </button>
      </div>
  </div> </form>
</div>
	    </li>
	</ul>
	<ul id="sysdir">
        <li class="user"><div class="frame">
          <div class="frame-inner">
          </div>
        </div>
      </li>
        <li id='Log-in'></li>
        <li><a href="http://tac-alert01/"><span>Pictures</span></a></li>
        <li><a href="http://tac-alert01/"><span>Music</span></a></li>
        <li><a href="http://tac-alert01/"><span>Computer</span></a></li>
        <li><a href="http://tac-alert01/"><span>Network</span></a></li>
        <li><a href="http://tac-alert01/"><span>Connect to</span></a></li>
    </ul>
</div>
// CLOSE START MENU -->


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


<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.11.2/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/jQuery_Plugins.js"></script>
<script type="text/javascript" src="js/metro.min.js"></script>


<!-- // Compressed version of all related vendor plug-ins used in jQuery -->
<script type="text/javascript" src="js/TACALERT.js"></script>
<script type="text/javascript" src="js/winScripts.js"></script>
<script type="text/javascript" src="js/dataTable.min.js"></script>
</body>
</html>

