<?php

/*

App settings

*/



//App URL (no slash at the end). Ex: http://yougapi.com/products/mobile/store_locator

//$GLOBALS['app_url'] = 'http://yougapi.com/products/mobile/store_locator';

$GLOBALS['app_url'] = 'http://www.northgatemobile.com/store_locator/spanish';



// API full link

//$GLOBALS['api_url'] = 'http://yougapi.com/products/wp/store_locator/wp-content/store_locator_api.php';

$GLOBALS['api_url'] = $GLOBALS['app_url'].'/api/';



//number of stores to display per page

$GLOBALS['nb_display'] = '4';



//distance unit possible values: miles, km

$GLOBALS['distance_unit'] = 'km';



//custom icon to use as a marker - Leave empty to use the default Google Maps icon

$GLOBALS['marker_icon'] = '';



//custom marker for the current position

$GLOBALS['marker_icon_current'] = 'include/graph/icons/marker-current.png';



/*

Optional parameters

*/

$GLOBALS['google_analytics'] = '';



?>