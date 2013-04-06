<?
//if(isset($_REQUEST['spanish']) && $_REQUEST['spanish']=='true'){
if(1==2){
	//include('spanish/include/webzone.php');
}
else{
	
	include('include/webzone.php');
	
	
	
	$js_on_ready = "detectLocation(); displayHome();";
	
	
	
	include('include/presentation/header.php');
	
	?>
	<link href="stores.css?ver=<?=time()?>" media="screen" rel="stylesheet" type="text/css" />
	<?
	if(isset($_REQUEST['android']) && $_REQUEST['android']=='true'){
	?>
	<style>
	#homePage{
		top:50px;
	}
	#nav-main {
		margin:0;
	}
		#nav-main li {
			list-style-type: none;
		}
	<link href="../css/base.css?ver=<?=time()?>" media="screen" rel="stylesheet" type="text/css" />
	</style>
	<?
	}
	?>
	<?
		include "../include-android-nav.php";
		insertNav($language,'stores',false);
	?>
	<div data-role="page" data-add-back-btn="true" data-theme="b" id="homePage" class="locator-home">
	
		
	
		<?php
	
		include('include/presentation/header_mobile.php');
	
		?>
	
		
	
		<div data-role="content">
	
			
	
			<div id="homeContent"></div>
	
			
	
			<?php
	
			/*
	
			$url = 'http://yougapi.com/products/mobile/store_locator/api/?key=&feed=stores&page_number=1&nb_display=5&address=Montreal%20Canada&lat=&lng=&distance_unit=km';
	
			$data = getDataFromUrl($url);
	
			$data = json_decode($data, true);
	
			print_r($data);
	
			echo '<br><br>';
	
			echo $data['address'];
	
			*/
	
			?>
	
			
	
		</div>
	
		
	
	</div>
	
	
	
	<div data-role="page" data-add-back-btn="true" data-theme="b" id="listPage">
	
		
	
		<?php
	
		include('include/presentation/header_mobile.php');
	
		?>
	
		
	
		<div data-role="content">
	
			<div id="listContent"></div>
	
		</div>
	
		
	
	</div>
	
	
	
	<div data-role="page" data-add-back-btn="false" data-add-home-btn="false" data-theme="b" id="categoriesPage">
	
		
	
		<?php
	
		include('include/presentation/header_mobile.php');
	
		?>
	
		
	
		<div data-role="content">
	
			<div id="categoriesContent"></div>
	
		</div>
	
		
	
	</div>
	
	
	
	<div data-role="page" data-add-back-btn="true" data-theme="b" id="mapPage" style="width:100%; height:100%;">
	
	
	
		<?php
	
		include('include/presentation/header_mobile.php');
	
		?>
	
		
	
		<div data-role="content" style="width:100%; height:100%; padding:0;">
	
			<div style="position:absolute; width:100%; height:100%;">
	
				<div id="map_mobile" style="width:100%; height:100%; padding:0;"></div>
	
			</div>
	
		</div>
	
		
	
	</div>
	
	
	
	<div data-role="page" data-add-back-btn="true" data-theme="b" id="mapDetailPage" style="width:100%; height:100%;">
	
	
	
		<?php
	
		include('include/presentation/header_mobile.php');
	
		?>
	
		
	
		<div data-role="content" style="width:100%; height:100%; padding:0;">
	
			<div style="position:absolute; width:100%; height:100%;">
	
				<div id="map_mobile_detail" style="width:100%; height:100%; padding:0;"></div>
	
			</div>
	
		</div>
	
	
	
	</div>
	
	
	
	<div data-role="page" data-add-back-btn="true" data-theme="b" id="streetviewPage" style="width:100%; height:100%;">
	
	
	
		<?php
	
		include('include/presentation/header_mobile.php');
	
		?>
	
		
	
		<div data-role="content" style="width:100%; height:100%; padding:0;">
	
			<div style="position:absolute; width:100%; height:100%;">
	
				<div id="streetview" style="width:100%; height:100%; padding:0;"></div>
	
			</div>
	
		</div>
	
	
	
	</div>
	
	
	
	<div data-role="page" data-add-back-btn="true" data-theme="b" id="storeDetailPage">
	
	
	
		<?php
	
		$storeDetailPageFlag=1;
	
		include('include/presentation/header_mobile.php');
	
		$storeDetailPageFlag=0;
	
		?>
	
		
	
		<div data-role="content">
	
			
	
			<div id="storeDetailContent"></div>
	
			
	
		</div>
	
	
	
	</div>
	
	
	
	<div data-role="page" data-add-back-btn="true" data-theme="b" id="searchByAddressPage">
	
	
	
		<?php
	
		include('include/presentation/header_mobile.php');
	
		?>
	
		
	
		<div data-role="content">
	
			
	
			<div data-role="fieldcontain">
	
				<label for="search">Search by address:</label>
	
				<input type="search" name="address" id="address" value="" />
	
				<p>
	
				<a href="javascript:" id="searchStoresByAddressBtn" data-role="button" data-theme="a">Search</a>
	
				</p>
	
			</div>
	
			
	
		</div>
	
		
	
	</div>
	
	
	
	<?php
	
	include('include/presentation/footer.php');
	//echo '<script type="text/javascript">var languageVal = "'.$language.'";</script>'."\n";
}
?>

