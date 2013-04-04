<? $language=isset($_REQUEST['language']) && !empty($_REQUEST['language']) ? $_REQUEST['language'] : ''; ?>
<? $udid=isset($_REQUEST['udid']) && !empty($_REQUEST['udid']) ? $_REQUEST['udid'] : ''; ?>


<HEAD>



	<script src="http://code.jquery.com/jquery-latest.min.js"></script>

	<script src="jQuery.html5Loader.js"></script>



	<SCRIPT LANGUAGE=javascript>



		$.html5Loader({

					filesToLoad:        'files.json', // this could be a JSON or simply a javascript object

					onBeforeLoad:       function () {

											//alert("begin");

										},

					onComplete:         function () {

											//alert("done");

//											document.location.href="customerlogin.php";

//											document.location.href="android.php";

											document.location.href="customerlogin.php?android=true&language=<?echo $language;?>&udid=<?echo $udid;?>";

										},

					onElementLoaded:    function ( obj, elm) { },

					onUpdate:           function ( percentage ) {}      

		});



	</SCRIPT>



</HEAD>



<body leftmargin="0" topmargin=0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight=0">

	<IMG SRC="img/loading-screen-bg-size-1.jpg" WIDTH=320>

</BODY>

