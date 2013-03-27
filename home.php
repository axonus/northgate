
<SCRIPT LANGUAGE="javascript">document.location.href="customerlogin.php";</SCRIPT>

home hello world<BR>
<BR>
<?
	$longitude	= $_REQUEST["longitude"];
	$latitude	= $_REQUEST["latitude"];
	$language	= $_REQUEST["language"];
	$udid		= $_REQUEST["UDID"];

	echo "longitude = .$longitude.<BR>";
	echo "latitude = .$latitude.<BR>";
	echo "language = .$language.<BR>";
	echo "udid = .$udid.<BR>";
?>
