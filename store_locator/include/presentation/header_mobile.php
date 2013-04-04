<? $language=isset($_REQUEST['language']) && !empty($_REQUEST['language']) ? $_REQUEST['language'] : ''; ?>
<?
	if ($language == "es") {
		$menuTextStoreLocator = "Localizador de Tiendas";
	}
	else{
		$menuTextStoreLocator = "Store Locator";
	}
?>

<div data-role="header" data-theme="d">



	<div style="padding:5px; margin-bottom:10px;">

		

		<div style="text-align:center;">

		<b><small><?=$menuTextStoreLocator?></small></b>

		</div>

		<?
			$homeUrl = $GLOBALS['app_url'];
			$homeUrl = $homeUrl."/index.php?language=".$language;
			if(isset($_REQUEST['android']) && $_REQUEST['android']=='true'){
				$homeUrl = 'http://www.northgatemobile.com/store_locator/index.php?android=true';
			}
			
		?>

		<div style="position:absolute;right:10px;top:.4em;">

			<a href="<?=$homeUrl?>" rel="external" data-role="button" data-icon="home" data-iconpos="notext" id="btn-locator-home">Home</a>

		</div>

		

	</div>

	

	<?php

	

	if($storeDetailPageFlag==1) {

		echo '<div data-role="navbar" style="padding-top:10px;">';

			echo '<ul>';

				echo '<li><a href="javascript:" id="displayMapDetailBtn" data-theme="c">Map</a></li>';

				echo '<li><a href="javascript:" id="displayStreetviewBtn" data-theme="c">Streetview</a></li>';

			echo '</ul>';

		echo '</div>';	

	}

	

	?>

	

</div>



