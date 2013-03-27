<?
	//phpinfo();

	include "_misc.php";

	//GLOBAL $_POST;
	$mobile = $_POST[mobile];
	$email = $_POST[email];
	$password = $_POST[password];

	//print_r($_POST);

	$strSQL = "INSERT INTO customers (phone,email,password) VALUES('$mobile','$email','$password')";
	echo "strSQL = .$strSQL.<BR>";

	$rr = mysql_query($strSQL);
	echo "rr = .$rr.<BR>";

?>

hi

<html>
	<head>
		<title></title>
	</head>
	<body>
	
	</body>
</html>