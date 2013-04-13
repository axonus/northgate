<?$function=isset($_REQUEST['function']) && !empty($_REQUEST['function']) ? $_REQUEST['function'] : ''; ?>
<?$queryid=isset($_REQUEST['queryid']) && !empty($_REQUEST['queryid']) ? $_REQUEST['queryid'] : ''; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Northgate Markets Admin: Analytics</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Unica+One' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href="../css/reset-min.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="css/analytics.css" media="screen" rel="stylesheet" type="text/css" />
    <!--global stylesheet end-->
</head>
<body>
<?
	$debugArray = array();
	$debugArray["blueberry"] = "blue";
	$debugArray["banana"] = "yellow";
	$debugArray["apple"] = "red";
	print_r($debugArray);
//	echo($debugArray);
	buildConsole();
	
	buildConsole2();
	
	function buildConsole(){
		global $debugArray;
		$consoleHtml = "";
		foreach($debugArray as $val) {
			//print $val."\n";
			$consoleHtml .= $val."\n";
		}
		echo $consoleHtml;
	}
	function buildConsole2(){
		global $debugArray;
		foreach ($debugArray as $key => $value) {
			echo $key.": ".$value."\n";
		}
	}
?>


</body>
</html>
