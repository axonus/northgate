<?
	$m = mysql_connect("localhost", "thomas", "vps99");
	echo "m = .$m.<BR>";
	$db = mysql_select_db("thomas_grocery");
?>
<?

/*
	$strSQL = "SELECT * FROM eligible_skus";
	if ($results = mysql_query($strSQL)) {
		while ($row = mysql_fetch_array($results)) {
			$sku = $row[plucode];
			echo "$sku<BR>";
			$newsku = str_pad($sku, 14, "0", STR_PAD_LEFT);
			echo "$newsku<BR>";
			$strSQL = "UPDATE eligible_skus SET plucode='$newsku' WHERE plucode='$sku'";
			echo "$strSQL<BR>";
			mysql_query($strSQL);
		}
	}

exit;
*/


	// Done processing each transaction.
	// Now, see what everyone's total qualified spending is
	// if a threshold has been passed, send a message
	// If 100% has been reached, then send a redemption code

	// 1. Get a list of all customer id's
	$strSQL = "SELECT * FROM customers ORDER BY id";
	if ($results = mysql_query($strSQL)) {
		while ($row = mysql_fetch_array($results)) {
			//pr($row);
			$customerId = $row[id];
			$threshold1Reached = $row[threshold1reached];
			$threshold2Reached = $row[threshold2reached];
			$threshold3Reached = $row[threshold3reached];
			$threshold4Reached = $row[threshold4reached];

$threshold5Reached = $row[threshold5reached];
$threshold6Reached = $row[threshold6reached];
$threshold7Reached = $row[threshold7reached];
$threshold8Reached = $row[threshold8reached];

$threshold9Reached = $row[threshold9reached];
$threshold10Reached = $row[threshold10reached];
$threshold11Reached = $row[threshold11reached];
$threshold12Reached = $row[threshold12reached];


			$totalSpent = computeCustomersTotalEligibleSpending($customerId);
//$totalSpent = 100;
			echo "($threshold1Reached,$threshold2Reached,$threshold3Reached,$threshold4Reached)<BR>";
			echo "customer #$customerId: totalSpent = .$totalSpent.<BR>";

		$goal = 100.0;
		$threshold1 = 25.0;
		$threshold2 = 50.0;
		$threshold3 = 75.0;
		$threshold4 = 100.0;
		$progress = floor((100*$totalSpent)/$goal);
		echo "<BR>progress: ".$progress."%<BR>";

			$boolSendMessageForThreshold1 = false;
			$boolSendMessageForThreshold2 = false;
			$boolSendMessageForThreshold3 = false;
			$boolSendMessageForThreshold4 = false;

			if (! $threshold1Reached) {
				if ($progress >= $threshold1) {
					$boolSendMessageForThreshold1 = true;
					$strSQL = "UPDATE customers SET threshold1reached=1 WHERE id='$customerId'";
					mysql_query($strSQL);
				}
			}

			if (! $threshold2Reached) {
				if ($progress >= $threshold2) {
					$boolSendMessageForThreshold2 = true;
					$strSQL = "UPDATE customers SET threshold2reached=1 WHERE id='$customerId'";
					mysql_query($strSQL);
				}
			}

			if (! $threshold3Reached) {
				if ($progress >= $threshold3) {
					$boolSendMessageForThreshold3 = true;
					$strSQL = "UPDATE customers SET threshold3reached=1 WHERE id='$customerId'";
					mysql_query($strSQL);
				}
			}

			if (! $threshold4Reached) {
				if ($progress >= $threshold4) {
					$boolSendMessageForThreshold4 = true;
					$strSQL = "UPDATE customers SET threshold4reached=1 WHERE id='$customerId'";
					mysql_query($strSQL);
				}
			}

			if ($boolSendMessageForThreshold4) {
				echo "send 100% message<BR>";
				$code = getRedemptionCode($customerId);
				$msg = "Redemption Code: $code (this is a duplicate test msg)";
sendTextMessageToUser($customerId, $msg);
$strSQL = "UPDATE customers SET redemptioncode1='$code' WHERE id='$customerId'";
mysql_query($strSQL);

$ttime = time();
$mnum = getMobileNumberFromUserId($customerId);
$strSQL = "INSERT INTO redemption_codes (customer_id,code) VALUES('$customerId','$code')";
//$strSQL = "INSERT INTO redemption_codes
//					(customer_id,code,dateandtime_issed,dateandtime_senttocustomer,mobilenumber_sentto)
//			VALUES
//					('$customerId','$code','$ttime','$ttime','$mnum')";
mysql_query($strSQL);

			}
			else if ($boolSendMessageForThreshold3) {
				echo "send 75% message<BR>";
sendTextMessageToUser($customerId, "You have reached 75% (this is a duplicate test msg)");
			}
			else if ($boolSendMessageForThreshold2) {
				echo "send 50% message<BR>";
sendTextMessageToUser($customerId, "You have reached 50% (this is a duplicate test msg)");
			}
			else if ($boolSendMessageForThreshold1) {
				echo "send 25% message<BR>";
sendTextMessageToUser($customerId, "You have reached 25% (this is a duplicate test msg)");
			}

echo "<BR><BR><BR>";

		}
	}
?>
<?
////
////
	function sendTextMessageToUser($userId, $msg) {

		// 1. Get mobile number for user
		$mobileNumber = getMobileNumberFromUserId($userId);
echo "mobileNumber = .$mobileNumber.<BR>";
//$mobileNumber = "6503879797";
echo "mobileNumber = .$mobileNumber.<BR>";

sendMsg($msg, $mobileNumber);

/*
		// 2. Create URL string
//		$url = "http://serv.smscpr.com/send_sms.php?username=itzonme&password=ppwq9256j&shortcode=82360&phone=$mobileNumber&message=$msg";
//echo "url = .$url.<BR>";

		// 3. Send the message
//		fopen($url, "r");
*/
	}
////
////
	function sendMsg($msg, $mobileNumber) {
		//echo exec('whoami');
		//echo exec('curl -X POST --header "Content-Type:text/xml" -d \'<message><description>description</description><text>Hello world</text><filters><mobile_phones><mobile_phone>6503879797</mobile_phone></mobile_phones></filters></message>\' http://jon%40frendl.com:8989phph@www.vibescm.com/api/subscription_campaigns/495390/send_alert.xml');
		//echo exec('curl -X POST --header "Content-Type:text/xml" -d \'<message><description>description</description><text>$msg</text><filters><mobile_phones><mobile_phone>6503879797</mobile_phone></mobile_phones></filters></message>\' http://jon%40frendl.com:8989phph@www.vibescm.com/api/subscription_campaigns/495390/send_alert.xml');
		$cmd = 'curl -X POST --header "Content-Type:text/xml" -d \'<message><description>description</description><text>'.$msg.'</text><filters><mobile_phones><mobile_phone>'.$mobileNumber.'</mobile_phone></mobile_phones></filters></message>\' http://jon%40frendl.com:8989phph@www.vibescm.com/api/subscription_campaigns/495390/send_alert.xml';
		echo "cmd = .$cmd.<BR>";
		echo exec($cmd);
	}
////
////
	function getRedemptionCode($customerId) {
		//$time = "".time();
		$seed = time() + $customerId;
		srand($seed);
		$r = rand();
		$r = "".$r;
		$code = substr($r, strlen($r)-6, 6);
		return $code;
	}
////
////
	function getMobileNumberFromUserId($userId) {
		$strSQL = "SELECT * FROM customers WHERE id='$userId'";
		if ($results = mysql_query($strSQL)) {
			if ($row = mysql_fetch_array($results)) {
				//pr($row);
				$mobileNumber = $row[mobilenumber];
			}
		}
		return $mobileNumber;
	}
////
////
	function computeCustomersTotalEligibleSpending($customerId) {

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
				$dateandtime = $row[dateandtime];
				$quantity = $row[quantity];
				$label = $row[label];
				$amount = $row[amount];
				//echo "$dateandtime, $quantity $label, $".$amount."<BR>";
				$totalSpent += $amount;
			}
		}

		echo "<BR>Total Spent: $".$totalSpent."<BR>";

		return $totalSpent;

	}
////
////
?>