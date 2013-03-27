<?
	include "_misc.php";

	$mobilenumber = $_REQUEST["mobilenumber"];
	$strSQL = "INSERT INTO customers (mobilenumber) VALUES('$mobilenumber')";
	mysql_query($strSQL);

	echo "<SCRIPT>location.href='customersummary.php?mobilenumber=$mobilenumber'</SCRIPT>";

?>