<? $language=isset($_REQUEST['language']) && !empty($_REQUEST['language']) ? $_REQUEST['language'] : ''; ?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>		
    <link href="css/reset-min.css" media="screen" rel="stylesheet" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<? include "include-meta-apple.php"; ?>
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.1/jquery.mobile-1.1.1.min.css" />
	<link href="css/base.css?ver=1001" media="screen" rel="stylesheet" type="text/css" />
<style>
body{
	background:url(../img/bg-noisyWood2.jpg?ver=1001) left top repeat;
}
#facebookPage{
	
}
#facebookPage #facebook-content{
	padding:0px;
	text-align:center;
}
#facebookPage #facebook-content .fb-like-box{
	background:#fff;	
	margin:0 auto;
}

</style>
</head>
<body>
<div data-role="page" id="facebookPage" class="page-content">
	<?
		include "include-android-nav.php";
		insertNav($language,'facebook',false);
	?>
	<div id="facebook-content">
		<div class="fb-like-box" data-href="http://www.facebook.com/NorthgateGonzalezMarkets" data-width="320" data-show-faces="true" data-stream="true" data-header="false"></div>
	</div>
</div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=168463053234864";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<?include "include-analytics.php";?>
</body>
</html>
