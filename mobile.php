<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		
    <link href="css/reset-min.css" media="screen" rel="stylesheet" type="text/css" />

	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.1/jquery.mobile-1.1.1.min.css" />
	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.1.1/jquery.mobile-1.1.1.min.js"></script>
	
    <link href="css/base.css?ver=1001" media="screen" rel="stylesheet" type="text/css" />
    <link href="css/charity.css?ver=1001" media="screen" rel="stylesheet" type="text/css" />
	<style>
	</style>
</head>
<body>
<style>
#frame-header{
	width:320px;
	height:50px;
	padding:0;
	position:absolute;
	top:0;
	left:0;
}
#frame-content{
	width:320px;
	height:80%;
	padding:0;
	overflow-y:auto;
	position:absolute;
	top:50px;
	left:0;

}
iframe{
	clear:both;
	float:left;	
}
#frame-nav{
	width:320px;
	height:50px;
	padding:0;
	position:absolute;
	bottom:0;
	left:0;
}
</style>
<div data-role="section" id="section-nav" class="page-content">
	<iframe id="frame-header" src="nav.php" frameborder="0" scrolling="no"></iframe>
	<iframe id="frame-content" src="customerlogin.php" frameborder="0" scrolling="yes"></iframe>
	<iframe id="frame-nav" src="nav.php" frameborder="0" scrolling="no"></iframe>
	<script src="js/mobile.js?ver=1001"></script>
</div>
</body>
</html>
