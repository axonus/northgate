<?php
header('Content-type: application/xml');
$url = 'https://gdata.youtube.com/feeds/api/users/NorthgateGonzalezMrk/uploads';
//$url = 'http://www.google.com';
$pointer = fopen($url, 'r');
if ($pointer) {
	while (!feof($pointer)) {
		$line = fgets($pointer);
		echo $line;
	}
	fclose($pointer);
}
?>
