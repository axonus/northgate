<?
	$menuTextStores = "Nuestras Tiendas";
	$menuTextStoresList = "Lista de Tiendas";
	$menuTextStoresMap = "Mapa de Tiendas";
	$menuTextStoresCategories = "Categorias";
	$menuTextSearchByAddress = "Busque por direcci"."&oacute;"."n de tienda";
?>
<ul data-role="listview" data-theme="d" style="margin-bottom:15px;" data-cookie="<?=$_COOKIE["abc"]?>">
	<li data-role="list-divider"><?=$menuTextStores?></li>
	<li><a href="javascript:" id="displayStoresListBtn"><?=$menuTextStoresList?></a></li>
	<li><a href="javascript:" id="displayMapBtn"><?=$menuTextStoresMap?></a></li>
	<!--<li><a href="javascript:" id="displayCategoriesListBtn" test="<?=@$_GET['language']?>"><?=$menuTextStoresCategories?></a></li>-->
	<li><a href="#searchByAddressPage"><?=$menuTextSearchByAddress?></a></li>
</ul>