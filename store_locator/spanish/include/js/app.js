var loading_img = '<img src="' + App.ajaxurl + '/include/graph/icons/ajax-loader.gif">';
var nb_display = App.nb_display;

function displayHome() {
	$('#homeContent').html(loading_img);
	console.log('languageVal:',languageVal);
	$.ajax({
	  type: 'POST',
	  url: App.ajaxurl + '/process.php?p=displayHome',
	  success: function(msg){
	  	$('#homeContent').html(msg).page();
	  }
	});
}

$('#displayStoresListBtn').live('click', function(event) {
	event.preventDefault();
	$.mobile.changePage("#listPage");
	page_number=1;
	displayStoresList({"feed":"stores", "page_number":page_number, "nb_display":nb_display, "lat":App.lat, "lng":App.lng});
});

$('#displayCategoriesListBtn').live('click', function(event) {
	event.preventDefault();
	$.mobile.changePage("#categoriesPage");
	displayCategoriesList();
});

$('.displayStoresListByCategoryBtn').live('click', function(event) {
	event.preventDefault();
	var category_id = $(this).attr('id');
	$.mobile.changePage("#listPage");
	page_number=1;
	$('#listContent').html('');
	displayStoresList({"feed":"stores", "page_number":page_number, "nb_display":nb_display, "lat":App.lat, "lng":App.lng, "category_id":category_id});
});

$('#displayStoresListNextPreviousBtn').live('click', function(event) {
	event.preventDefault();
	$('#pageNumberReload').html(loading_img);
	var criteria = jQuery('body').data('stores_list_criteria');
	var page_number = $(this).attr('page_number');
	criteria.page_number = page_number;
	displayStoresList(criteria);
});

$('#searchStoresByAddressBtn').live('click', function(event) {
	event.preventDefault();
	var address = $('#address').val();
	var page_number=1;
	$.mobile.changePage("#listPage");
	$('#listContent').html('');
	displayStoresList({"feed":"stores", "page_number":page_number, "nb_display":nb_display, "address":address});
});

$('#searchStoresByNameBtn').live('click', function(event) {
	event.preventDefault();
	var q = $('#q').val();
	var page_number=1;
	/*
	$.mobile.changePage("#mapPage");
	Map_param.zoom=5;
	search_locations({"feed":"stores", "page_number":1, "nb_display":nb_display, "lat":App.lat, "lng":App.lng, "city":App.city, "q":q});
	*/
	$.mobile.changePage("#listPage");
	$('#listContent').html('');
	displayStoresList({"feed":"stores", "page_number":page_number, "nb_display":nb_display, "lat":App.lat, "lng":App.lng, "q":q});
});

$('.displayStoreDetails').live('click', function(event) {
	event.preventDefault();
	var id = $(this).attr('id');
	$.mobile.changePage("#storeDetailPage");
	displayStoreDetails({"feed":"store", "id":id});
});

function displayStoreDetails(criteria) {
	$('#storeDetailContent').html(loading_img);
	$.ajax({
	  type: 'POST',
	  url: App.ajaxurl + '/process.php?p=displayStoreDetails',
	  dataType: 'json',
	  data: 'criteria=' + JSON.stringify(criteria),
	  success: function(msg){
	  	$('#storeDetailContent').html(msg.display);
	  	$('#storeDetailPage').page('destroy').page();
	  	//save store data
	  	App.store_lat = msg.lat;
	  	App.store_lng = msg.lng;
	  	App.marker_content = msg.marker_content;
	  }
	});
}

function displayStoresList(criteria) {
	if($('#listContent').html()=='') $('#listContent').html(loading_img);
	jQuery('body').data('stores_list_criteria', criteria);
	$.ajax({
	  type: 'POST',
	  url: App.ajaxurl + '/process.php?p=displayStoresList',
	  dataType: 'json',
	  data: 'criteria=' + JSON.stringify(criteria),
	  success: function(msg){
	  	$('#listContent').html(msg.display);
	  	$('#listPage').page('destroy').page();
	  }
	});
}

function displayCategoriesList() {
	if($('#categoriesContent').html()=='') $('#categoriesContent').html(loading_img);
	$.ajax({
	  type: 'POST',
	  url: App.ajaxurl + '/process.php?p=displayCategoriesList',
	  success: function(msg){
	  	$('#categoriesContent').html(msg);
	  	$('#categoriesPage').page('destroy').page();
	  }
	});
}

/*
START Maps display
*/

$('#displayMapBtn').live('click', function(event) {
	event.preventDefault();
	$.mobile.changePage("#mapPage");
	Map_param.zoom=5;
	search_locations({"feed":"stores", "page_number":1, "nb_display":nb_display, "lat":App.lat, "lng":App.lng});
});

$('#displayMapDetailBtn').live('click', function(event) {
	event.preventDefault();
	$.mobile.changePage("#mapDetailPage");
	Map_param.zoom=15;
	init_basic_map('map_mobile_detail', App.store_lat, App.store_lng, App.marker_content);
});

$('#displayStreetviewBtn').live('click', function(event) {
	event.preventDefault();
	$.mobile.changePage("#streetviewPage");
	displayStreetView(App.store_lat, App.store_lng, 'streetview');
});