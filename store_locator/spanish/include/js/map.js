var Map_param = {};
var map;
var markers = [];
var infoWindow;
var panorama;

function detectLocation() {
	//alert(App.marker_icon);
	if (navigator.geolocation) {
  		navigator.geolocation.getCurrentPosition(detectionSuccess, detectionError, {maximumAge:600000});
	}
}

function detectionSuccess(position) {
	var lat = position.coords.latitude;
	var lng = position.coords.longitude;
	App.lat = lat;
	App.lng = lng;
}

function detectionError(msg) {
	//alert(msg);
}

function init_basic_map2() {
	map = new google.maps.Map(document.getElementById('map_mobile'), {
		//center: new google.maps.LatLng(40, -100),
		zoom: Map_param.zoom,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
	});
	
	infoWindow = new google.maps.InfoWindow();
}

function init_basic_map(dom,lat,lng,marker_text) {
	var latlng = new google.maps.LatLng(
		parseFloat(lat),
		parseFloat(lng)
	);
	
	map = new google.maps.Map(document.getElementById(dom), {
		center: new google.maps.LatLng(lat, lng),
		zoom: Map_param.zoom,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
	});
	
	createMarker(latlng, lat, lng, marker_text);
	infoWindow = new google.maps.InfoWindow();
	
	//resize to make the map load correctly the second time...
	$('#'+dom).animate({width: '100%', height:'100%'}, 
	function() { 
		google.maps.event.trigger(map, 'resize');
		map.setCenter(new google.maps.LatLng(lat, lng));
	});
	
}

function search_locations(criteria) {
	
	$('#map_mobile').html(loading_img);
	//$.mobile.pageLoading();
	
	jQuery.ajax({
		type: 'POST',
		url: App.ajaxurl,
		dataType: 'json',
		url: App.ajaxurl + '/process.php?p=displayStoreListMap',
		data: 'criteria=' + JSON.stringify(criteria),
		success: function(msg) {
			
			init_basic_map2();
			//$.mobile.pageLoading(true);
			
			var locations = msg.locations;
			var markersContent = msg.markersContent;
			var bounds = new google.maps.LatLngBounds();
			
			clearLocations();
			
			var latlng_current = new google.maps.LatLng(
				parseFloat(App.lat),
				parseFloat(App.lng)
			);
			createMarker(latlng_current, App.lat, App.lng, 'Current location', App.marker_icon_current);
			
			for (var i=0; i<locations.length; i++) {
				var name = locations[i]['name'];
				var address = locations[i]['address'];
				var distance = parseFloat(locations[i]['distance']);
				var marker_icon = locations[i]['marker_icon'];
				var latlng = new google.maps.LatLng(
					parseFloat(locations[i]['lat']),
					parseFloat(locations[i]['lng'])
				);
				
				createMarker(latlng, locations[i]['lat'], locations[i]['lng'], markersContent[i], marker_icon);
				
				bounds.extend(latlng);
	       	}
	       	map.fitBounds(bounds);
		}
	});
	
}

function clearLocations() {
	infoWindow.close();
	for (var i = 0; i < markers.length; i++) {
		markers[i].setMap(null);
	}
	markers.length = 0;
}

function createMarker(latlng, lat, lng, html, icon) {
	if(icon===undefined||icon=='') {
		var icon = App.marker_icon;
	}
	var marker = new google.maps.Marker({
		map: map,
		position: latlng,
		icon: icon,
	});
	google.maps.event.addListener(marker, 'click', function() {
		infoWindow.setContent(html);
		infoWindow.open(map, marker);
	});
	markers.push(marker);
}

function displayStreetView(lat,lng, dom) {
	var latlng = new google.maps.LatLng(lat,lng);
	
	var panoramaOptions = {
	  position: latlng,
	  panControl: true,
	  linksControl: true,
	  enableCloseButton: true,
	  disableDoubleClickZoom: true,
	  addressControl: false,
	  visible: true,
	  pov: {
	    heading: 270,
	    pitch: 0,
	    zoom: 1
	  }
	};
	
	$('#'+dom).empty();
	
	$('#'+dom).animate({width: '100%', height:'100%'}, 
	function() { 
		panorama = new google.maps.StreetViewPanorama(document.getElementById(dom),panoramaOptions);
	});
}
