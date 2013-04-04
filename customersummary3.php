<?
	$_udid = $_COOKIE[_udid];
	$_language = $_COOKIE[_language];
?>
<? $mobilenumber=isset($_REQUEST['mobilenumber']) && !empty($_REQUEST['mobilenumber']) ? $_REQUEST['mobilenumber'] : ''; ?>
<? $language=isset($_REQUEST['language']) && !empty($_REQUEST['language']) ? $_REQUEST['language'] : ''; ?>
<? $udid=isset($_REQUEST['udid']) && !empty($_REQUEST['udid']) ? $_REQUEST['udid'] : ''; ?>
<? $isIframe=isset($_REQUEST['iframe']) && !empty($_REQUEST['iframe']) ? $_REQUEST['iframe'] : ''; ?>
<? $foo=isset($_REQUEST['foo']) && !empty($_REQUEST['foo']) ? $_REQUEST['foo'] : ''; ?>
<?
	$isIframe= "true";
	if ($foo == "true") {
		echo "foo";
		$_amount=isset($_REQUEST['amount']) && !empty($_REQUEST['amount']) ? $_REQUEST['amount'] : '';
//		echo "_amount = .$_amount.<BR>\n";
//		exit;
	}
?>
<?
	if ( ! $udid ) {
		$udid = $_udid;
	}
	if ( ! $language ) {
		$language = $_language;
	}
?>
<?
	if ($language == "es") {
		$strPageHeader = "Que tan cercas estas de llevarte tus dos boletos para ver a Reyli en Concierto el 17 de Mayo en el Honda Center?";
		$strPageTextEarned = "Acumulado";
		$strPageTextAsOf = "Compras a partir de";
		$strPageRemaining = "Restante";
		$strPageListHeader = "Usa esta lista como ejemplo para comprar tus productos favoritos entre mas de 350 productos participantes.";
		$strPageBrandsListHeader = "Busque las etiquetas con la imagen de Reyli en estas marcas participantes";
		$logoutText = "Salir";
	}
	else{
		$strPageHeader = "How close are you to earning two tickets to see Reyli in concert on May 17 at the Honda Center?";
		$strPageTextEarned = "Earned";
		$strPageTextAsOf = "Purchases as of:";
		$strPageRemaining = "Remaining";
		$strPageListHeader = "Here is a sample shopping list of some of the 350 participating products.";
		$strPageBrandsListHeader = "Look for shelf tags on these participating brands";
		$logoutText = "Logout";
	}
?>
<?
//	echo "udid = .$udid.<BR>\n";
//	echo "language = .$language.<BR>\n";
//	echo "mobilenumber = .$mobilenumber.<BR>\n";

//exit;


//	$email=isset($_REQUEST['email']) && !empty($_REQUEST['email']) ? $_REQUEST['email'] : '';
//	echo "email = .$email.<BR>";
//exit;




	include "_misc.php";

	sendOptInConfirmationTxtMsg($mobilenumber);

	// 1. See if there is a record for this phone number.  If not, then create a new one.

	$customerId = getCustomerIdFromMobileNumber($mobilenumber);
	//echo "customerId = .$customerId.<BR>\n";

	if (!$customerId) {
		$strSQL = "INSERT INTO customers
											(mobilenumber,udid)
									VALUES
											('$mobilenumber','$udid')";
		//echo "strSQL = .$strSQL.<BR>\n";
		mysql_query($strSQL);

		$customerId = getCustomerIdFromMobileNumber($mobilenumber);
		//echo "customerId = .$customerId.<BR>\n";
	}

	if (true) {
		// update the record with the values
		$language=isset($_REQUEST['language']) && !empty($_REQUEST['language']) ? $_REQUEST['language'] : '';
		$udid=isset($_REQUEST['udid']) && !empty($_REQUEST['udid']) ? $_REQUEST['udid'] : '';
		$mobilenumber=isset($_REQUEST['mobilenumber']) && !empty($_REQUEST['mobilenumber']) ? $_REQUEST['mobilenumber'] : '';
		$mobilenumber2=isset($_REQUEST['mobilenumber2']) && !empty($_REQUEST['mobilenumber2']) ? $_REQUEST['mobilenumber2'] : '';
		$phonetype1=isset($_REQUEST['phone-type-1']) && !empty($_REQUEST['phone-type-1']) ? $_REQUEST['phone-type-1'] : '';
		$email=isset($_REQUEST['email']) && !empty($_REQUEST['email']) ? $_REQUEST['email'] : '';
		$address=isset($_REQUEST['address']) && !empty($_REQUEST['address']) ? $_REQUEST['address'] : '';
		$city=isset($_REQUEST['city']) && !empty($_REQUEST['city']) ? $_REQUEST['city'] : '';
		$state=isset($_REQUEST['state']) && !empty($_REQUEST['state']) ? $_REQUEST['state'] : '';
		$zip=isset($_REQUEST['zip']) && !empty($_REQUEST['zip']) ? $_REQUEST['zip'] : '';


					/*
						echo "language = .$language.<BR>";
						echo "udid = .$udid.<BR>";
						echo "mobilenumber = .$mobilenumber.<BR>";
						echo "mobilenumber2 = .$mobilenumber2.<BR>";
						echo "phonetype1 = .$phonetype1.<BR>";
						echo "email = .$email.<BR>";
						echo "address = .$address.<BR>";
						echo "city = .$city.<BR>";
						echo "state = .$state.<BR>";
						echo "zip = .$zip.<BR>";
					*/

				//UPDATE customers
				//	(udid,mobilenumber,phonetype,email,address,city,state,zipcode,language)
				//VALUES
				//	('$udid','$mobilenumber','$phonetype1','$email','$address','$city','$state','$zipcode','$language')

/*
$udid = str_replace("'", "", $udid);
$mobilenumber = str_replace("'", "", $mobilenumber);
$phonetype1 = str_replace("'", "", $phonetype1);
$email = str_replace("'", "", $email);
$address = str_replace("'", "", $address);
$city = str_replace("'", "", $city);
$state = str_replace("'", "", $state);
$zipcode = str_replace("'", "", $zipcode);
$language = str_replace("'", "", $language);
*/

$udid = str_replace("\'", "", $udid);
$mobilenumber = str_replace("\'", "", $mobilenumber);
$phonetype1 = str_replace("\'", "", $phonetype1);
$email = str_replace("\'", "", $email);
$address = str_replace("\'", "", $address);
$city = str_replace("\'", "", $city);
$state = str_replace("\'", "", $state);
$zipcode = str_replace("\'", "", $zipcode);
$language = str_replace("\'", "", $language);

					/*
						echo "language = .$language.<BR>";
						echo "udid = .$udid.<BR>";
						echo "mobilenumber = .$mobilenumber.<BR>";
						echo "mobilenumber2 = .$mobilenumber2.<BR>";
						echo "phonetype1 = .$phonetype1.<BR>";
						echo "email = .$email.<BR>";
						echo "address = .$address.<BR>";
						echo "city = .$city.<BR>";
						echo "state = .$state.<BR>";
						echo "zip = .$zip.<BR>";
					*/

/*
$udid
$mobilenumber
$phonetype1
$email
$address
$city
$state
$zipcode
$language
*/

		$strSQL = "
				UPDATE customers SET
					udid='$udid',
					mobilenumber='$mobilenumber',
					phonetype='$phonetype1',
					email='$email',
					address='$address',
					city='$city',
					state='$state',
					zipcode='$zipcode',
					language='$language'
				WHERE
					id='$customerId'
			";
		//echo "<BR>$strSQL<BR>";
		mysql_query($strSQL);
	}
?>
<?
////
////
	function getCustomerIdFromUDID($udid) {
		if (!$udid) { return 0; }
		$strSQL = "SELECT * FROM customers WHERE udid='$udid'";
		if ($results = mysql_query($strSQL)) {
			if ($row = mysql_fetch_array($results)) {
				$id = $row[id];
			}
		}
		return $id;
	}
////
////
?>
<?
	function getCustomerIdFromMobileNumber($mobilenumber) {
		$strSQL = "SELECT * FROM customers WHERE mobilenumber='$mobilenumber'";
		$id = 0;
		if ($results = mysql_query($strSQL)) {
			if ($row = mysql_fetch_array($results)) {
				$id = $row[id];
			}
		}
		return $id;
	}

//	include "_misc.php";

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
//echo $strSQL;

	$totalSpent = 0.00;
	if ($results = mysql_query($strSQL)) {
		echo '<!-- ';
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
			/*
			$year = substr($transaction_date,0,4);
			$month = substr($transaction_date,5,2);
			$day = substr($transaction_date,8,2);
			*/
			$dateandtime = "$month-$day-$year";

			$quantity = $row[quantity];
			$label = $row[label];
			$amount = $row[amount];
			echo "\n$amount";
			$lastAmount = number_format($amount, 2, '.', '');
			//echo "$dateandtime, $quantity $label, $".$amount."<BR>";
			$totalSpent += $amount;
		}
		echo '-->';
	}

//echo "\n<BR>Total Spent: $".$totalSpent."<BR>\n";

$realTotalSpent = $totalSpent;		// because later we mod $totalSpent by $goal so that the progress bar doesn't go past 100


if ($foo) {
	$totalSpent = $_amount;
	$realTotalSpent = $_amount;
}














	$goal = 100.0;

$maxCodes = 3;
//$maxCodes = 1;

$reachedMaxCodes = false;
if ($totalSpent >= ($maxCodes * $goal)) {
	$reachedMaxCodes = true;
	$totalSpent = $goal;	// set the bar to be totally full after 3rd code is reached
}


if ($totalSpent > $goal) {
//	$totalSpent = $goal;
	$totalSpent %= $goal;
}



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
	<? include "include-meta-apple.php"; ?>
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.1/jquery.mobile-1.1.1.min.css" />
	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.1.1/jquery.mobile-1.1.1.min.js"></script>
	
    <link href="css/base.css?ver=<?=time();?>" media="screen" rel="stylesheet" type="text/css" />
    
    <link href="css/summary.css?ver=<?=time();?>" media="screen" rel="stylesheet" type="text/css" />
	<style>
	.iframe-true .iframe-hide{
		display:none;
	}
		.iframe-true #summary-progress{
			*width:500px;
			*height:50px;
			*display:block;
		}
			.iframe-true #summary-progress li{
							
			}
			.iframe-true #summary-progress li#progress-applied{
									
			}
			.iframe-true .progress-applied{
				text-align:left;
			}
			.iframe-true .progress-remaining{
				text-align:right;
			}
	</style>

<!--
	<script language="javascript">
		function myReload() {
			//alert("hi");
		}
		myReload();
	</script>
-->
</head>
<body>
<?
$contentClass = "";
$logoutUrl = "customerlogin.php";
if($isIframe=="true"){
	$contentClass = "iframe-true";
	$logoutUrl = "customerlogin3.php";
}
?>
<div data-role="page" id="summeryPage" class="page-content no-thumb <?=$contentClass?>">
	<?
		if($isIframe!="true"){
			include "include-android-nav.php";
			insertNav($language,'main',false);
		}
		
	?>
	<div data-role="content">
	
	<?
		if($isIframe!="true"){
	?>
		<div data-role="content" class="content-main iframe-hide">
			<div class="col col1">
				<h2>Life is Better with Music</h2>
				<p><?=$strPageHeader?></p>
			</div>
			<div class="col col2">
				<div class="thumbnail thumbnail-player"><img src="img/fpo/thumbnail1.png" alt="" /></div>
			</div>
		</div>
	<?
		}
	?>
		<div data-role="content" class="content-progress">
			<?displayProgressBar($totalSpent, 270,$strPageTextEarned,$strPageRemaining);?>
<!-- Thomas, you can use this span element to show either message and can duplicate it if you need to show 2 blocks of text-->
<?
	if ($foo) {
		$totalSpent = $realTotalSpent;		// because we moded $totalSpent by $goal, earlier, so retrieve real total from storage var

		$maxTotalSpent = $goal * $maxCodes;		// $300 = (3 * $100)

		if ($totalSpent >= $maxTotalSpent) {
			if ($language == "es") {
				?>
					<span class="congrats-text">
						NEED SPANISH: Congratulations, you have reached your maximum amount of tickets for earned tickets.
						Additional purchases will not apply.
					</span>
				<?
			}
			else {
				?>
					<span class="congrats-text">
						Congratulations, you have reached your maximum amount of tickets for earned tickets.
						Additional purchases will not apply.
					</span>
				<?
			}
		}
		else {
			if ($totalSpent >= $goal) {
				$numTicketsPerCode = 2;
				$numCodesEarned = floor($totalSpent / $goal);
				$numTicketsEarned = $numCodesEarned * $numTicketsPerCode;
				$currentAppliedTotal = $totalSpent % $goal;

				if ($language == "es") {
					?>
						<span class="congrats-text">
							NEED SPANISH: You've earned <?echo $numTicketsEarned;?> tickets to see Reyli in Concert on May 17 at the Honda Center.
							You have +$<?echo $currentAppliedTotal;?> toward your next 2 tickets.
						</span>
					<?
				}
				else {
					?>
						<span class="congrats-text">
							You've earned <?echo $numTicketsEarned;?> tickets to see Reyli in Concert on May 17 at the Honda Center.
							You have +$<?echo $currentAppliedTotal;?> toward your next 2 tickets.
						</span>
					<?
				}

			}
		}


	}
?>

	<?
		if($isIframe!="true"){
	?>
			<ul id="summary-transactions" class="iframe-hide">
<!--
				<li id="last-purchase">
					<p class="title">Last Purchase:</p>
					<p class="details">
						<span><?=$dateandtime;?></span>
						<span><?='$'.$lastAmount.' eligible';?></span>
					</p>
				</li>
-->
				<li id="last-purchases-as">
					<p class="title"><?=$strPageTextAsOf?></p>
					<p class="details">
						<span>
							<? echo $dateandtime; ?>
							<?
								if ($reachedMaxCodes) {
									echo " You have reached your maximum redemption of $maxCodes sets of tickets.";
								}
							?>
						</span>
					</p>
				</li>
			</ul>
	<?
		}
	?>

		</div>
	</div>
	<?
		if($isIframe!="true"){
	?>
	<div data-role="content" class="content-brands iframe-hide">
		<p class="title"><?=$strPageListHeader?></p>
		<div class="imagery"><img src="img/shopping-list.png" alt="" /></div>
		<p class="title title-brands"><?=$strPageBrandsListHeader?></p>
		<div class="imagery"><img src="img/shelf-tag.jpg" alt="" /></div>
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
	<?
		}
	?>

	<div data-role="fieldcontain" id="fieldset-submit">
	<?
		if(isset($_REQUEST['android']) && $_REQUEST['android']=='true'){
			$logoutHref = $logoutUrl.'?android=true&language='.$language;
		}
		else{
			$logoutHref = $logoutUrl.'?language='.$language;
		}
	?>
		<a id="btn-logout" href="<?=$logoutHref?>" data-ajax="false"><?=$logoutText?></a>
	</div>
</div>


<script src="js/summary.js?ver=<?=time();?>"></script>
<?include "include-analytics.php";?>
</body>
</html>

<?
function displayProgressBar($totalSpent, $barWidth, $strPageTextEarned, $strPageRemaining) {
	//$totalSpent=isset($_REQUEST['spent']) && !empty($_REQUEST['spent']) ? $_REQUEST['spent'] : $totalSpent;
	$remaining = 100-$totalSpent;
?>
			<ul id="summary-progress">
				<li id="progress-applied" style="width:<?echo $totalSpent;?>%;"></li>
				<li id="progress-labels">
					<span class="progress-amount progress-applied">$<?echo $totalSpent;?></span>
					<span class="progress-amount progress-remaining">$<?echo $remaining;?></span>
					<span class="progress-indicator"><?=$totalSpent;?>%</span>
					<span class="progress-desc progress-applied"><?=$strPageTextEarned?></span>
					<span class="progress-desc progress-remaining"><?=$strPageRemaining?></span>
				</li>
			</ul>
<?
}
?>