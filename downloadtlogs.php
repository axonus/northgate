<?
	$m = mysql_connect("localhost", "thomas", "vps99");
	echo "m = .$m.<BR>";
	$db = mysql_select_db("thomas_grocery");

//	phpinfo();
//exit;

?>
<?
/*
//	$fp = fopen("http://www.magnipets.com/tlogs/TLog-2012-02-07.xml", "r");
//	echo "fp = .$fp.<BR>";
	$str = file_get_contents("http://www.magnipets.com/tlogs/TLog-2012-02-07.xml");
//	$str = file_get_contents("http://174.127.102.202/tlogs/TLog-2012-02-07.xml");
//	echo "str = .$str.<BR>";
//	$xml = new SimpleXMLElement($xml_str);
//	echo "xml = .$xml.<BR>";

	$xmlArray = XMLToArray($str);
	//echo "xmlArray = .$xmlArray.<BR>";
	//pr($xmlArray);

processXMLArray($xmlArray);
*/

//	$str = file_get_contents("http://www.northgatemobile.com/tlogs/tlogsample.csv");
//	echo "<PRE>$str</PRE>";
//	$lines = file("http://www.northgatemobile.com/tlogs/tlogsample.csv", FILE_IGNORE_NEW_LINES);
	$lines = file("http://www.northgatemobile.com/tlogs/Tlog20130213.csv", FILE_IGNORE_NEW_LINES);
//pr($lines);

//exit;


	$i = 0;
	foreach ($lines as $line) {
		if ($i == 0) {
			// it's the header line
			$headers = explode(",", $line);
			//pr($headers);
		}
		/*
		else if ($i == 1) {
			//it's the line that contains the transaction id
			// AND the first line item (eg: item purchased)
			$cells = explode(",", $line);
			pr($cells);
		}
		else {
			// it's the rest of the lines items (after the first one)
		}
		*/
		else {

			$cells = explode(",", $line);

/*
			$transaction_id	= $cells[19];		// T  (20-1)
			$date_and_time	= $cells[22];		// W  (23-1)
			$plu_code		= $cells[23];		// X  (24-1)
			$quantity		= $cells[25];		// Z  (26-1)
			$unit_price		= $cells[28];		// AC (29-1)
			$amount			= $cells[29];		// AD (30-1)
*/

$bagger_id		= $cells[19];		// T  (20-1)
$customerTelephone = $bagger_id;

$transaction_id	= $cells[20];		// T  (20-1)
$date_and_time	= $cells[23];		// W  (23-1)
$plu_code		= $cells[24];		// X  (24-1)
$quantity		= $cells[26];		// Z  (26-1)
$unit_price		= $cells[29];		// AC (29-1)
$amount			= $cells[30];		// AD (30-1)


//echo "customerTelephone, transaction_id, date_and_time, plu_code, quantity, unit_price, amount<BR>";
//echo "$customerTelephone, $transaction_id, $date_and_time, $plu_code, $quantity, $unit_price, $amount<BR>";


$customerId = getCustomerIdFromMobileNumber($customerTelephone);

			$strSQL = "	INSERT INTO transaction_items
							(customer_phonenumber,customer_id,transactionid,dateandtime,plucode,quantity,unitprice,amount)
						VALUES
							('$customerTelephone','$customerId','$transaction_id','$date_and_time','$plu_code',$quantity,$unit_price,$amount)";
//			echo "$strSQL<BR>";
//			mysql_query($strSQL);

		}
		++$i;
	}

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

			$totalSpent = computeCustomersTotalEligibleSpending($customerId);
			echo "($threshold1Reached,$threshold2Reached,$threshold3Reached,$threshold4Reached)<BR>";
			echo "customer #$customerId: totalSpent = .$totalSpent.<BR>";

		$goal = 100.0;
		$threshold1 = 25.0;
		$threshold2 = 50.0;
		$threshold3 = 75.0;
		$threshold4 = 100.0;
		$progress = floor((100*$totalSpent)/$goal);
$progress *= 4;
		echo "<BR>progress: ".$progress."%<BR>";

			$boolSendMessageForThreshold1 = false;
			$boolSendMessageForThreshold2 = false;
			$boolSendMessageForThreshold3 = false;
			$boolSendMessageForThreshold4 = false;

			if (! $threshold1Reached) {
				if ($progress > $threshold1) {
					$boolSendMessageForThreshold1 = true;
					$strSQL = "UPDATE customers SET threshold1reached=1 WHERE id='$customerId'";
					mysql_query($strSQL);
				}
			}

			if (! $threshold2Reached) {
				if ($progress > $threshold2) {
					$boolSendMessageForThreshold2 = true;
					$strSQL = "UPDATE customers SET threshold2reached=1 WHERE id='$customerId'";
					mysql_query($strSQL);
				}
			}

			if (! $threshold3Reached) {
				if ($progress > $threshold3) {
					$boolSendMessageForThreshold3 = true;
					$strSQL = "UPDATE customers SET threshold3reached=1 WHERE id='$customerId'";
					mysql_query($strSQL);
				}
			}

			if (! $threshold4Reached) {
				if ($progress > $threshold4) {
					$boolSendMessageForThreshold4 = true;
					$strSQL = "UPDATE customers SET threshold4reached=1 WHERE id='$customerId'";
					mysql_query($strSQL);
				}
			}

			if ($boolSendMessageForThreshold4) {
				echo "send 100% message<BR>";
			}
			else if ($boolSendMessageForThreshold3) {
				echo "send 75% message<BR>";
			}
			else if ($boolSendMessageForThreshold2) {
				echo "send 50% message<BR>";
			}
			else if ($boolSendMessageForThreshold1) {
				echo "send 25% message<BR>";
			}

echo "<BR><BR><BR>";

		}
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
									dateandtime
							";
				/*

					$strSQL = "
								SELECT
									*
								FROM
									transaction_items,
									eligible_skus
								WHERE
									transaction_items.customer_id = '$customerId'
								ORDER BY
									dateandtime
							";
				*/


				//echo $strSQL;

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




////
////
	function getCustomerIdFromMobileNumber($mobileNumber) {
		$strSQL = "SELECT * FROM customers WHERE mobilenumber='$mobileNumber'";
		//echo "<BR>$strSQL<BR>";
		if ($results = mysql_query($strSQL)) {
			if ($row = mysql_fetch_array($results)) {
				//pr($row);
				$customerId = $row[id];
			}
		}
		return $customerId;
	}
////
////

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function processXMLArray($xml) {
	if (count($xml) > 0) {
		$transactionsArray = $xml[TRANSACTIONS];
		echo "transactionsArray = .$transactionsArray.<BR>";
		if (count($transactionsArray) > 0) {
			foreach($transactionsArray as $transaction) {
				processTransaction($transaction);
			}
		}
		else {
			echo "<BR>there were no transaction elements in the xml<BR>";
		}
	}
	else {
		echo "<BR>there were no transaction day elements in the xml<BR>";
	}
}

function processTransaction($transaction) {
	//echo "transaction = .$transaction.<BR>";
	//pr($transaction);

	$customerId	= $transaction[CUSTOMERID];
	$date		= $transaction[DATE];
	$time		= $transaction[TIME];
	$total		= $transaction[TOTAL];
	$itemsArray	= $transaction[ITEMS];

	echo "$customerId,$date,$time,$total<BR>";

	processItemsArray($itemsArray);
}

function processItemsArray($itemsArray) {
	//pr($itemsArray);
	foreach ($itemsArray as $itemArray) {
		//pr($itemArray);
		foreach ($itemArray as $item) {
			//pr($item);
			$sku = $item[SKU];
			$label = $item[LABEL];
			$price = $item[PRICE];
			echo "$sku,$label,$price<BR>";
			$str = "INSERT INTO purchased_items (sku,label,price) VALUES('$sku','$label','$price')";
			echo "<BR>$str<BR>";
			mysql_query($str);
		}
	}
}


function pr($array) {
	?><PRE><?
	print_r($array);
	?></PRE><?
}


/**
 * Convert XML to an Array
 *
 * @param string  $XML
 * @return array
 */
function XMLtoArray($XML)
{
    $xml_parser = xml_parser_create();
    xml_parse_into_struct($xml_parser, $XML, $vals);
    xml_parser_free($xml_parser);
    // wyznaczamy tablice z powtarzajacymi sie tagami na tym samym poziomie
    $_tmp='';
    foreach ($vals as $xml_elem) {
        $x_tag=$xml_elem['tag'];
        $x_level=$xml_elem['level'];
        $x_type=$xml_elem['type'];
        if ($x_level!=1 && $x_type == 'close') {
            if (isset($multi_key[$x_tag][$x_level]))
                $multi_key[$x_tag][$x_level]=1;
            else
                $multi_key[$x_tag][$x_level]=0;
        }
        if ($x_level!=1 && $x_type == 'complete') {
            if ($_tmp==$x_tag)
                $multi_key[$x_tag][$x_level]=1;
            $_tmp=$x_tag;
        }
    }
    // jedziemy po tablicy
    foreach ($vals as $xml_elem) {
        $x_tag=$xml_elem['tag'];
        $x_level=$xml_elem['level'];
        $x_type=$xml_elem['type'];
        if ($x_type == 'open')
            $level[$x_level] = $x_tag;
        $start_level = 1;
        $php_stmt = '$xml_array';
        if ($x_type=='close' && $x_level!=1)
            $multi_key[$x_tag][$x_level]++;
        while ($start_level < $x_level) {
            $php_stmt .= '[$level['.$start_level.']]';
            if (isset($multi_key[$level[$start_level]][$start_level]) && $multi_key[$level[$start_level]][$start_level])
                $php_stmt .= '['.($multi_key[$level[$start_level]][$start_level]-1).']';
            $start_level++;
        }
        $add='';
        if (isset($multi_key[$x_tag][$x_level]) && $multi_key[$x_tag][$x_level] && ($x_type=='open' || $x_type=='complete')) {
            if (!isset($multi_key2[$x_tag][$x_level]))
                $multi_key2[$x_tag][$x_level]=0;
            else
                $multi_key2[$x_tag][$x_level]++;
            $add='['.$multi_key2[$x_tag][$x_level].']';
        }
        if (isset($xml_elem['value']) && trim($xml_elem['value'])!='' && !array_key_exists('attributes', $xml_elem)) {
            if ($x_type == 'open')
                $php_stmt_main=$php_stmt.'[$x_type]'.$add.'[\'content\'] = $xml_elem[\'value\'];';
            else
                $php_stmt_main=$php_stmt.'[$x_tag]'.$add.' = $xml_elem[\'value\'];';
            eval($php_stmt_main);
        }
        if (array_key_exists('attributes', $xml_elem)) {
            if (isset($xml_elem['value'])) {
                $php_stmt_main=$php_stmt.'[$x_tag]'.$add.'[\'content\'] = $xml_elem[\'value\'];';
                eval($php_stmt_main);
            }
            foreach ($xml_elem['attributes'] as $key=>$value) {
                $php_stmt_att=$php_stmt.'[$x_tag]'.$add.'[$key] = $value;';
                eval($php_stmt_att);
            }
        }
    }
    return $xml_array;
}
?>