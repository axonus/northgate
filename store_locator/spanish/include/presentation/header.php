<? $language=isset($_REQUEST['language']) && !empty($_REQUEST['language']) ? $_REQUEST['language'] : ''; ?>
<!DOCTYPE html> 

<html> 

<head>

	<title>Store Locator</title>

	<meta charset="UTF-8" />

	

	<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">

	
	<? include "../../include-meta-apple.php"; ?>

	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0b1/jquery.mobile-1.0b1.min.css" />

	<link rel="stylesheet" href="<?=$GLOBALS['app_url'];?>/include/css/style.css" />

	

	<script type='text/javascript'> 

	/* <![CDATA[ */

	var App = {

		ajaxurl: "<?=$GLOBALS['app_url']?>", nb_display: <?=$GLOBALS['nb_display']?>, marker_icon: "<?=$GLOBALS['marker_icon']?>", 

		marker_icon_current: "<?=$GLOBALS['marker_icon_current']?>"

	};

	/* ]]> */

	</script>

	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>

	<script src="<?=$GLOBALS['app_url'];?>/include/js/app.js?<?=time();?>"></script>

	

	<script src="http://maps.google.com/maps/api/js?sensor=true"></script>

	<script src="<?=$GLOBALS['app_url'];?>/include/js/map.js?<?=time();?>"></script>

	

	<script src="http://code.jquery.com/mobile/1.0b1/jquery.mobile-1.0b1.min.js"></script>

	

	<script>

	$(document).ready(function() {

		<?php echo $js_on_ready; ?>

	});

	</script>

	

	<?php

	

	if($GLOBALS['google_analytics']!='') {

	?>

	<script type="text/javascript">

	  var _gaq = _gaq || [];

	  _gaq.push(['_setAccount', '<?=$GLOBALS['google_analytics']?>']);

	  _gaq.push(['_setDomainName', '.yougapi.com']);

	  _gaq.push(['_trackPageview']);

	 

	  (function() {

	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;

	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';

	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);

	  })();

	</script>

	<?php

	}

	

	?>

	

</head>



<body>