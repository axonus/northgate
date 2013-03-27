<?
	include "_misc.php";

	$managerid = $_REQUEST["managerid"];
	$password = $_REQUEST["password"];
	$strSQL = "SELECT * FROM managers WHERE username='$managerid' AND password='$password'";
	//echo "strSQL = .$strSQL.<BR>";

	if ($results = mysql_query($strSQL)) {
		while ($row = mysql_fetch_array($results)) {
			//pr($row);
			//echo "<SCRIPT>document.location.href='validate_redemptioncode.php?managerid=$managerid'</SCRIPT>";
//			exit;
			header("Location: validate_redemptioncode.php?managerid=$managerid");
			exit;
		}
	}

	header("Location: managerlogin.php?managerid=$managerid");
//	echo "<SCRIPT>location.href='managerlogin.php?managerid=$managerid'</SCRIPT>";
	exit;

?>