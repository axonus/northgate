<?
	include "_misc.php";

	$mobilenumber = $_REQUEST["mobilenumber"];
	$strSQL = "SELECT * FROM customers WHERE mobilenumber='$mobilenumber'";
?>
<html>
	<body>
		sdfsdfsf

<?

	if ($results = mysql_query($strSQL)) {
		while ($row = mysql_fetch_array($results)) {
			//pr($row);
			echo "<SCRIPT>location.href='customersummary.php?mobilenumber=$mobilenumber'</SCRIPT>";
//			header("Location: http://www.google.com");
//			exit;
		}
	}

	echo "<SCRIPT>location.href='customerlogin.php?mobilenumber=$mobilenumber'</SCRIPT>";
//header("Location: customerlogin.php?mobilenumber=$mobilenumber");

?>

	</body>
</html>