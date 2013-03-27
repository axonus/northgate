<?
	function getCustomerIdFromMobileNumber($mobilenumber) {
		$strSQL = "SELECT * FROM customers WHERE mobilenumber='$mobilenumber'";
		$id = 0;
		if ($results = mysql_query($strSQL)) {
			while ($row = mysql_fetch_array($results)) {
				$id = $row[id];
			}
		}
		return $id;
	}

	include "_misc.php";

	$mobilenumber = $_REQUEST["mobilenumber"];
	//echo "<BR>mobilenumber: $mobilenumber<BR>";

	$customerId = getCustomerIdFromMobileNumber($mobilenumber);
	//echo "<BR>customerId: $customerId<BR>";

	$strSQL = "
				SELECT
					*
				FROM
					transaction_items,
					eligible_skus
				WHERE
					transaction_items.customer_id = '$customerId' AND
					transaction_items.plucode = eligible_skus.plucode
				ORDER BY
					transaction_date,
					transaction_time
			";
echo $strSQL;

	$totalSpent = 0.00;
	if ($results = mysql_query($strSQL)) {
		while ($row = mysql_fetch_array($results)) {
			//pr($row);
//			$dateandtime = $row[dateandtime];
// hack to get rid of the time
//$dateandtime = substr($dateandtime, 0, 10);
$transaction_date = $row[transaction_date];
$transaction_time = $row[transaction_time];
$dateandtime = $transaction_date."_".$transaction_time;
$year = substr($transaction_date,0,4);
$month = substr($transaction_date,4,2);
$day = substr($transaction_date,6,2);
$dateandtime = "$month-$day-$year";

			$quantity = $row[quantity];
			$label = $row[label];
			$amount = $row[amount];
			//echo "$dateandtime, $quantity $label, $".$amount."<BR>";
			$totalSpent += $amount;
		}
	}
	//echo "<BR>Total Spent: $".$totalSpent."<BR>";

	$goal = 100.0;

	$progress = floor((100*$totalSpent)/$goal);
	//echo "<BR>Progress: $progress%<BR>";

/*
	$strSQL = "
				SELECT
					*
				FROM
					transaction_items,
					eligible_skus
				WHERE
					transaction_items.customer_id = '$customerId' AND
					transaction_items.plucode = eligible_skus.plucode
				ORDER BY
					dateandtime DESC
			";
*/
	?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		
    <link href="css/reset-min.css" media="screen" rel="stylesheet" type="text/css" />

	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.1/jquery.mobile-1.1.1.min.css" />
	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.1.1/jquery.mobile-1.1.1.min.js"></script>
	
    <link href="css/base.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="css/summary.css" media="screen" rel="stylesheet" type="text/css" />
	<style>
	</style>


	<script language="javascript">
		function myReload() {
			alert("hi");
		}
		myReload();
	</script>
</head>
<body>
<div data-role="page" id="summeryPage" class="page-content no-thumb">
	<div data-role="content">
		<div data-role="content" class="content-main">
			<div class="col col1">
<!--				<h2>Promotion title could go right here</h2>-->
<!--<h2>Con Musica Se Vive Mejor</h2>-->
<h2>Life is Better with Music</h2>
<!--				<p>This is description text that can go right here under</p>-->
<p>Earn Two Tickets To See Reyli In Concert</p>
			</div>
			<div class="col col2">
				<div class="thumbnail thumbnail-player"><img src="img/fpo/thumbnail1.png" alt="" /></div>
			</div>
		</div>
		<div data-role="content" class="content-progress">
			<?displayProgressBar($totalSpent, 270);?>
<!--			<p id="last-trans">Last Purchase: <?echo $dateandtime;?></p>-->

<p id="last-trans">
	Purchases as of:
<?echo $dateandtime;?>
</p>


		</div>
	</div>
	<div data-role="content" class="content-brands">
		<div class="imagery"><img src="img/shopping-list.jpg" alt="" /></div>
		<ul>
			<li><img src="img/logos/AXE.jpg" alt="AXE" /></li>
			<li><img src="img/logos/Bertolli.jpg" alt="Bertolli" /></li>
			<li><img src="img/logos/Best_Foods.jpg" alt="Best Foods" /></li>
			<li><img src="img/logos/Breyers.jpg" alt="Breyers" /></li>
			<li><img src="img/logos/Caress.jpg" alt="Caress" /></li>
			<li><img src="img/logos/Clear.jpg" alt="Clear" /></li>
			<li><img src="img/logos/Country_Crock.jpg" alt="Country Crock" /></li>
			<li><img src="img/logos/Degree.jpg" alt="Degree" /></li>
			<li><img src="img/logos/Dove.jpg" alt="Dove" /></li>
			<li><img src="img/logos/Good_Humor.jpg" alt="Good Humor" /></li>
			<li><img src="img/logos/ICBNB.jpg" alt="ICBNB" /></li>
			<li><img src="img/logos/Imperial.jpg" alt="Imperial" /></li>
			<li><img src="img/logos/Klondike.jpg" alt="Klondike" /></li>
			<li><img src="img/logos/KNORR.jpg" alt="KNORR" /></li>
			<li><img src="img/logos/Lever_2000.jpg" alt="Lever 2000" /></li>
			<li><img src="img/logos/Lipton.jpg" alt="Lipton" /></li>
			<li><img src="img/logos/Magnum.jpg" alt="Magnum" /></li>
			<li><img src="img/logos/Maizena.jpg" alt="Maizena" /></li>
			<li><img src="img/logos/Noxema.jpg" alt="Noxema" /></li>
			<li><img src="img/logos/Ponds.jpg" alt="Ponds" /></li>
			<li><img src="img/logos/Popsicle.jpg" alt="Popsicle" /></li>
			<li><img src="img/logos/Q_Tips.jpg" alt="Q Tips" /></li>
			<li><img src="img/logos/Ragu.jpg" alt="Ragu" /></li>
			<li><img src="img/logos/Simple.jpg" alt="Simple" /></li>
			<li><img src="img/logos/Slim-Fast.jpg" alt="Slim-Fast" /></li>
			<li><img src="img/logos/Suave.jpg" alt="Suave" /></li>
			<li><img src="img/logos/Tresemme.jpg" alt="Tresemme" /></li>
			<li><img src="img/logos/Unilever.gif" alt="Unilever" /></li>
			<li><img src="img/logos/Vaseline.jpg" alt="Vaseline" /></li>
			<li><img src="img/logos/Wish_Bone.jpg" alt="Wish Bone" /></li>
		</ul>
	</div>
</div>


<script src="js/summary.js?ver=1001"></script>
</body>
</html>

<?
function displayProgressBar($totalSpent, $barWidth) {
	//$totalSpent=isset($_REQUEST['spent']) && !empty($_REQUEST['spent']) ? $_REQUEST['spent'] : $totalSpent;
	$remaining = 100-$totalSpent;
?>
			<ul id="summary-progress">
				<li id="progress-applied" style="width:<?echo $totalSpent;?>%;"></li>
				<li id="progress-labels">
					<span class="progress-amount progress-applied">$<?echo $totalSpent;?></span>
					<span class="progress-amount progress-remaining">$<?echo $remaining;?></span>
					<span class="progress-indicator">%</span>
					<span class="progress-desc progress-applied">applied</span>
					<span class="progress-desc progress-remaining">remaining</span>
				</li>
			</ul>

</ul>
<?
}
?>
	
	
	