<?php

function checkCookieSession() {
	$token = $_COOKIE["token"];
	
	if($token!='' && $_SESSION["session_account_id"]=='') {
		$pos = strpos($token,":");
		if($pos>0) {
			$loginid = substr($token,0,$pos);
			$token = substr($token,($pos+1));
			
			$url = getFavosaurusCallUrl(array('action'=>'checkToken', 'token'=>$token));
			$data = getDataFromUrl($url);
			$data = json_decode($data, true);
			
			if($data['code']==1 && $data['user_id']==$loginid) {
				startUserSession(array('loginid'=>$loginid));
			}
		}
	}
}

function startUserSession($criteria) {
	$_SESSION['session_account_id'] = $criteria['loginid'];
}

?>