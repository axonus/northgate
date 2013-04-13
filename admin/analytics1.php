<?$function=isset($_REQUEST['function']) && !empty($_REQUEST['function']) ? $_REQUEST['function'] : ''; ?>
<?$queryid=isset($_REQUEST['queryid']) && !empty($_REQUEST['queryid']) ? $_REQUEST['queryid'] : ''; ?>
<?
	include_once "_misc.php";

	$strSQL = "SELECT * FROM sql_queries";
	//echo "<BR>$strSQL<BR>";
	if ($results = mysql_query($strSQL)) {
		while ($row = mysql_fetch_array($results)) {
//			pr($row);
			//$customerId = $row[id];
			?>
				<A HREF="analytics1.php?function=runquery&queryid=<?echo $row[id];?>"><?echo $row[label];?></A><BR>
			<?
		}
	}


	if ($function == "runquery") {
		$strSQL = "SELECT * FROM sql_queries WHERE id='$queryid'";
		if ($results = mysql_query($strSQL)) {
			while ($row = mysql_fetch_array($results)) {
//				pr($row);
//    [headers] => 'level','number who have qualified'
//$headers = explode(",", $row[headers]);
//pr($headers);
				//$customerId = $row[id];
				runAnalyticsQuery($row[query], explode(",", $row[headers]));
			}
		}
	}
////
////
	function runAnalyticsQuery($strSQL, $headers) {
		echo "<BR>$strSQL<BR>";
		//pr($headers);
		if ($results = mysql_query($strSQL)) {
			startTable($headers);
$j=0;
			while ($row = mysql_fetch_array($results)) {
				//$customerId = $row[id];
				?><TR BGCOLOR="<?echo $j++%2?"DDFFDD":"FFFFFF";?>"><?
$i=0;
				foreach ($row AS $element) {
if (!($i++%2)) {
					?>
						<TD ALIGN=RIGHT><?echo $element;?></TD>
					<?
}
				}
				?></TR><?
			}
			?></TABLE><?
		}
	}
////
////
	function startTable($headers) {
		?>
			<TABLE BORDER=1>
				<TR BGCOLOR="CCCCCC">
					<?
						foreach ($headers AS $header) {
							?>
								<TD><CENTER><B><?echo trim($header, "'");?></B></CENTER></TD>
							<?
						}
					?>
				</TR>
		<?
	}
////
////
?>