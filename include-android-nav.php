<?
function insertNav($language,$pageName,$showNav){
	$hrefPrefix = '';
	if($pageName=='stores'){
		$hrefPrefix = '../';
	}
	$cssPathPrefix = '';
	$isAndroid = false;
	$androidValue = "false";
	if($showNav || (isset($_REQUEST['android']) && $_REQUEST['android']=='true') ){
		$isAndroid = true;
		$androidValue = "true";
	}
	if($showNav || $isAndroid){
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
			
		$mainClass = '';
		$videoClass = '';
		$charityClass = '';
		$facebookClass = '';
		$storesClass = '';
		$mainHref = 'href="'.$hrefPrefix.'customerlogin.php?android='.$androidValue.'&language='.$language.'"';
		$videoHref = 'href="'.$hrefPrefix.'video.php?android='.$androidValue.'&language='.$language.'"';
		$charityHref = 'href="'.$hrefPrefix.'charity.php?android='.$androidValue.'&language='.$language.'"';
		$facebookHref = '';
		$facebookHref = 'href="'.$hrefPrefix.'facebook.php?android='.$androidValue.'&language='.$language.'"';;
		$storesHref = 'href="http://www.northgatemobile.com/store_locator/index.php?android='.$androidValue.'&language='.$language.'"';
		//$storesHref = '';

		switch($pageName){
			case 'main':
				$mainClass = 'selected';
				$mainHref = '';
			break;
			case 'video':
				$videoClass = 'selected';
				$videoHref = '';
			break;
			case 'stores':
				$storesClass = 'selected';
				$storesHref = '';
			break;
			case 'charity':
				$charityClass = 'selected';
				$charityHref = '';
			break;
			case 'facebook':
				$facebookClass = 'selected';
				$facebookHref = '';
			break;
			
		}
		if($pageName=='stores'){
			$cssPathPrefix = '../';
		}
	?>
	<div id="page-nav">
		  <link href="<?=$cssPathPrefix?>css/nav.css?ver=1001" media="screen" rel="stylesheet" type="text/css" />
		  <link href="<?=$cssPathPrefix?>css/nav-android.css?ver=1001" media="screen" rel="stylesheet" type="text/css" />
			<ul id="nav-main">
				<li class="first <?=$mainClass?>" id="nav-main" data-name="main"><a <?=$mainHref?> data-ajax="false"><div class="icon-wrapper"><i></i></div><span><?=$navTextMain?></span></a></li>
				<li class="<?=$videoClass?>" id="nav-videos" data-name="videos"><a <?=$videoHref?> data-ajax="false"><div class="icon-wrapper"><i></i></div><span><?=$navTextVideos?></span></a></li>
				<li class="<?=$storesClass?>" id="nav-stores" data-name="stores"><a <?=$storesHref?> data-ajax="false"><div class="icon-wrapper"><i></i></div><span><?=$navTextStores?></span></a></li>
				<li class="<?=$charityClass?>" id="nav-charity" data-name="charity"><a <?=$charityHref?> data-ajax="false"><div class="icon-wrapper"><i></i></div><span><?=$navTextCharity?></span></a></li>
				<li class="<?=$facebookClass?>" id="nav-facebook" data-name="facebook"><a <?=$facebookHref?> data-ajax="false"><div class="icon-wrapper"><i></i></div><span><?=$navTextFacebook?></span></a></li>
			</ul>
	</div>
	<?
	}
	echo '<script type="text/javascript">var languageVal = "'.$language.'";</script>'."\n";
}
?>
