<?php



function display_categories_list($categories_list) {

	

	$display .= '<ul data-role="listview" data-theme="d" data-test="BCD">';

	for($i=0; $i<count($categories_list); $i++) {

		$display .= '<li><a href="javascript:" class="displayStoresListByCategoryBtn" id="'.$categories_list[$i]['id'].'">';

		$display .= '<h3>'.$categories_list[$i]['name'].'</h3>';

		$display .= '<span class="ui-li-count"><font color="red"><small>'.$categories_list[$i]['nb'].'</small></font></span>';

		$display .= '</a></li>';

	}

	$display .= '</ul>';

	

	return $display;

}



function display_store_details($store) {

	if($store[0]['name']!='') $display .= '<h2 style="padding-top:0px; margin-top:0px;">'.$store[0]['name'].'</h2>';

	if($store[0]['logo']!='') $display .= '<p><img src="'.$store[0]['logo'].'"></p>';

	if($store[0]['address']!='') $display .= '<p>'.$store[0]['address'].'</p>';

	if($store[0]['url']!='') $display .= '<p>Url: <a href="'.$store[0]['url'].'" target="_blank">'.$store[0]['url'].'</a></p>';

	if($store[0]['tel']!='') $display .= '<p>Tel: '.$store[0]['tel'].'</p>';

	if($store[0]['email']!='') $display .= '<p>Email: '.$store[0]['email'].'</p>';

	if($store[0]['description']!='') $display .= '<p>'.$store[0]['description'].'</p>';

	return $display;

}



function getStoresDisplay($data, $page_number, $nb_display) {

	$nb_stores = $data['nb_stores'];

	$list = $data['list'];

	$current_address = $data['address'];

	

	if($current_address=='') $current_address_display = '&nbsp;';

	else $current_address_display=$current_address;

	

	$display .= '<ul data-role="listview" data-theme="d" data-test="BCD2">';

	$display .= '<li data-role="list-divider" data-theme="a">'.$current_address_display.'<span class="ui-li-count">'.$nb_stores.'</span></li>';

	for($i=0; $i<count($list); $i++) {

		$id = $list[$i]['id'];

		$name = $list[$i]['name'];

		$logo = $list[$i]['logo'];

		$address = $list[$i]['address'];

		$distance = $list[$i]['distance'];

		$created = $list[$i]['created'];

		

		$display .= '<li><a href="javascript:" class="displayStoreDetails" id="'.$id.'">';

		if($logo!='') $display .= '<img src="'.$logo.'" style="margin-top:18px;">';

		$display .= '<h3>'.$name;

		$display .= '</h3>';

		//if($current_address!='') $display .= '<span class="ui-li-count"><font color="red"><small>'.ceil($distance).' '.$GLOBALS['distance_unit'].'</small></font></span>';

		$display .= '<p>'.$address.'</p>';

		if($current_address!='') $display .= '<p><font color="red"><small>'.ceil($distance).' '.$GLOBALS['distance_unit'].'</small></font></p>';

		$display .= '</a></li>';

	}

	$display .= '</ul><br>';

	

	$display .= '<div data-role="controlgroup" data-type="horizontal" data-theme="a" style="text-align:right;" >';

		if($page_number>1) $display .= '<a href="javascript:" id="displayStoresListNextPreviousBtn" page_number="'.($page_number-1).'" data-role="button" data-icon="arrow-l" data-theme="d">Previous</a>';

		$display .= '<a href="javascript:" data-role="button" data-theme="d"><span id="pageNumberReload">'.$page_number.'</span></a>';

		if($nb_stores>($page_number*$nb_display)) $display .= '<a href="javascript:" id="displayStoresListNextPreviousBtn" page_number="'.($page_number+1).'" data-role="button" data-icon="arrow-r" data-theme="d">Next</a>';

	$display .= '</div>';

	

	return $display;

}



?>