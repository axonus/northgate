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
    <link href="../css/base.css?ver=<?=time();?>" media="screen" rel="stylesheet" type="text/css" />
    <link href="css/analytics.css?ver=<?=time();?>" media="screen" rel="stylesheet" type="text/css" />
    <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <!--global stylesheet end-->
</head>
<body>
	<div id="container-report">
		<h2 id="logo-analytics"></h2>
		<?buildMenu();?>
		<?buildResultsTable();?>
		<h2 id="logo-foundation"></h2>
	</div>
	<?createDebugConsole();?>
</body>
</html>
<?
	$debugArray = array();
	function buildResultsTable(){
		global $function,$queryid;
		if ($function == "runquery") {
			$strSQL = "SELECT * FROM sql_queries WHERE id='$queryid'";
			if ($results = mysql_query($strSQL)) {
				while ($row = mysql_fetch_array($results)) {
					//pr($row);
					//[headers] => 'level','number who have qualified'
					//$headers = explode(",", $row[headers]);
					//pr($headers);
					//$customerId = $row[id];
					runAnalyticsQuery($row[query], explode(",", $row[headers]));
					addItemToConsole('test 2','my value 2');
					addItemToConsole('$strSQL',$row[query]);
				}
			}
		}
		echo "\n";
	}
	
	function buildMenu(){
		include_once "_misc.php";
		$strSQL = "SELECT * FROM sql_queries";
		//echo "<BR>$strSQL<BR>";
		if ($results = mysql_query($strSQL)) {
			$reportListInt = 1;
			echo "\n".'		<ul id="report-list">';
			while ($row = mysql_fetch_array($results)) {
				//$customerId = $row[id];
				buildMenuItem($row[id],$reportListInt,$row[label]);
				$reportListInt +=1;
			}
			echo "\n".'		</ul>';
		}
	}

	function buildMenuItem($rowId, $count, $label) {
		$itemHtml = "";
		$itemHtml .= "\n".'			<li>';
		$itemHtml .= "\n".'				<dl>';
		$itemHtml .= "\n".'					<dt><a href="analytics.php?function=runquery&queryid='.$rowId.'#table">#'.$count.'</a></dt>';
		$itemHtml .= "\n".'					<dd><a href="analytics.php?function=runquery&queryid='.$rowId.'#table">'.$label.'</a></dd>';
		$itemHtml .= "\n".'				</dl>';
		$itemHtml .= "\n".'			</li>';
		echo $itemHtml;
	}

	function addItemToConsole($name,$value) {
		global $debugArray;
		$debugArray[$name] = $value;
	}

	function createDebugConsole(){
		global $debugArray;
		echo("<!-- $debugArray count: ".count($debugArray)."-->"."\n");
		//print_r($debugArray);
		if(count($debugArray)>0){
			include "../include-console.php";
			$consoleHtml = "";
			$consoleHtml .= "\n".'	<div id="console-debug" style="display:none;" class="console">';
			$consoleHtml .= "\n".'		<ul id="console-debug-php">';
			foreach ($debugArray as $key => $value) {
				$consoleHtml .= "\n".'			<li>';
				$consoleHtml .= "\n".'				<span class="console-title">'.$key.'</span>';
				$consoleHtml .= "\n".'				<p class="console-value">'.$value.'</p>';
				$consoleHtml .= "\n".'			</li>';
			}
			$consoleHtml .= "\n".'		</ul>';
			$consoleHtml .= "\n".'	</div>'."\n";
			echo $consoleHtml;
		}
		echo "\n";
	}

	function runAnalyticsQuery($strSQL, $headers) {
		//pr($headers);

		if ($results = mysql_query($strSQL)) {
			$j=0;
			$analyticsTableHtml = "";
			startTable($headers);
			$analyticsTableHtml .= "\n".'			<tbody>';
			while ($row = mysql_fetch_array($results)) {
				//$customerId = $row[id];
				$analyticsTableHtml .= "\n".'				<tr>';
				$i=0;
				foreach ($row AS $element) {
					if (!($i++%2)) {
						$analyticsTableHtml .= "\n"."					<td>".$element."</td>";
					}
				}
				$analyticsTableHtml .= "\n".'				</tr>';
			}
			$analyticsTableHtml .= "\n".'			</tbody>';
			$analyticsTableHtml .= "\n".'		</table>';
			echo $analyticsTableHtml;
		}
	}

	function startTable($headers) {
		$thCount = 0;
		$tableHtml = "";
		$tableHtml .= "\n".'		<a name="table"></a>';
		$tableHtml .= "\n".'		<table border="0">';
		$tableHtml .= "\n".'			<thead>';
		$tableHtml .= "\n".'				<tr class="test">';
		foreach ($headers AS $header) {
			$thCount += 1;
			$tableHtml .= "\n".'					<th class="col'.$thCount.'">'.trim($header, "'").'</th>';
		}
		$tableHtml .= "\n".'				</tr>';
		$tableHtml .= "\n".'			</thead>';
		echo $tableHtml;
	}
?>
