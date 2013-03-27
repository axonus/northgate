<?
	$language=isset($_REQUEST['language']) && !empty($_REQUEST['language']) ? strtolower($_REQUEST['language']) : 'en';
	$navTextMain = 'Main';
	$navTextVideos = 'Videos';
	$navTextStores = 'Stores';
	$navTextCharity = 'Charity';
	$navTextFacebook = 'Facebook';
	if($language=='es'){
		$navTextMain = 'Inicio';
		$navTextVideos = 'Videos';
		$navTextStores = 'Tiendas';
		$navTextCharity = 'Donativos';
		$navTextFacebook = 'Facebook';
	}
?>

<!DOCTYPE html>
<html>
  <head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link href="css/reset-min.css" media="screen" rel="stylesheet" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	  <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>

	  <link href="css/base.css?ver=1001" media="screen" rel="stylesheet" type="text/css" />
	  <link href="css/nav.css?ver=1001" media="screen" rel="stylesheet" type="text/css" />
	  <style>
	  </style>
	</head>
  <body>
	<div data-role="page" id="page-nav" class="page-nav">
	  <div data-role="content">
		<ul id="nav-main">
		  <li class="first selected" id="nav-main" data-name="main">
			<a>
			  <div class="icon-wrapper">
				<i></i>
			  </div>
			  <span><?=$navTextMain?></span>
			</a>
		  </li>
		  <li id="nav-videos" data-name="videos">
			<a>
			  <div class="icon-wrapper">
				<i></i>
			  </div>
			  <span><?=$navTextVideos?></span>
			</a>
		  </li>
		  <li id="nav-stores" data-name="stores">
			<a>
			  <div class="icon-wrapper">
				<i></i>
			  </div>
			  <span><?=$navTextStores?></span>
			</a>
		  </li>
		  <li id="nav-charity" data-name="charity">
			<a>
			  <div class="icon-wrapper">
				<i></i>
			  </div>
			  <span><?=$navTextCharity?></span>
			</a>
		  </li>
		  <li id="nav-facebook" data-name="facebook">
			<a>
			  <div class="icon-wrapper">
				<i></i>
			  </div>
			  <span><?=$navTextFacebook?></span>
			</a>
		  </li>
		</ul>
	  </div>
	</div>


	<script src="js/nav.js?ver=1001"></script>
  </body>
</html>



<!--
<HEAD>
	<SCRIPT LANGUAGE="javascript">
		function home() {
			document.location.href="callbackhome:whatever";
		}
		function video() {
			document.location.href="callbackvideo:whatever";
		}
		function locator() {
			document.location.href="callbacklocator:whatever";
		}
		function charity() {
			document.location.href="callbackcharity:whatever";
		}
		function facebook() {
			document.location.href="callbackfacebook:whatever";
		}
	</SCRIPT>
</HEAD>

<BODY marginwidth=0 marginheight=0 leftmargin=0 topmargin=0 bottommargin=0 rightmargin=0>
	<TABLE BORDER=0 WIDTH=320 CELLSPACING=0 CELLPADDING=0>
		<TR>
		  <TD BGCOLOR="black">
			<IMG SRC="nav/home.png" WIDTH="64" onClick="javascript:home();">
		  </TD>
		  <TD BGCOLOR="black">
			<IMG SRC="nav/video.png" WIDTH="64" onClick="javascript:video();">
		  </TD>
		  <TD BGCOLOR="black">
			<IMG SRC="nav/locator.png" WIDTH="64" onClick="javascript:locator();">
		  </TD>
		  <TD BGCOLOR="black">
			<IMG SRC="nav/charity.png" WIDTH="64" onClick="javascript:charity();">
		  </TD>
		  <TD BGCOLOR="black">
			<IMG SRC="nav/facebook.png" WIDTH="64" onClick="javascript:facebook();">
		  </TD>
		</TR>
	</TABLE>
</BODY>

-->


