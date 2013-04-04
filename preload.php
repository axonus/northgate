
<body leftmargin="0" topmargin=0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight=0">
	<IMG SRC="img/loading-screen-bg-size-1.jpg" WIDTH=320>
</BODY>

<? $language=isset($_REQUEST['language']) && !empty($_REQUEST['language']) ? $_REQUEST['language'] : ''; ?>
<? $udid=isset($_REQUEST['udid']) && !empty($_REQUEST['udid']) ? $_REQUEST['udid'] : ''; ?>

<meta http-equiv="refresh" content="2;url=preloadstep2.php?language=<?echo $language;?>&udid=<?echo $udid;?>"> 
