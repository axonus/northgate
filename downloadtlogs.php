<?
	$m = mysql_connect("localhost", "thomas", "vps99");
	echo "m = .$m.<BR>";
	$db = mysql_select_db("thomas_grocery");
?>
<?
//	$str = file_get_contents("http://www.northgatemobile.com/tlogs/tlogsample.csv");
//	echo "<PRE>$str</PRE>";
//	$lines = file("http://www.northgatemobile.com/tlogs/tlogsample.csv", FILE_IGNORE_NEW_LINES);
//	$lines = file("http://www.northgatemobile.com/tlogs/Tlog20130213.csv", FILE_IGNORE_NEW_LINES);
//$lines = file("http://www.northgatemobile.com/tlogs/Tlog20130319.csv", FILE_IGNORE_NEW_LINES);
//$lines = file("http://www.northgatemobile.com/tlogs/TLog20130319.csv", FILE_IGNORE_NEW_LINES);
//$lines = file("http://www.northgatemobile.com/tlogs/TLOG20130326.CSV", FILE_IGNORE_NEW_LINES);
//pr($lines);
//exit;


/*
processLogFile("http://www.northgatemobile.com/tlogs/TLog20130319.csv");

processLogFile("http://www.northgatemobile.com/tlogs/TLOG20130326.CSV");
processLogFile("http://www.northgatemobile.com/tlogs/TLogMissingPhoneNumbers20130327.csv");

processLogFile("http://www.northgatemobile.com/tlogs/TLOG20130327.CSV");
processLogFile("http://www.northgatemobile.com/tlogs/TLogMissingPhoneNumbers20130328.csv");

processLogFile("http://www.northgatemobile.com/tlogs/TLogMissingPhoneNumbers20130328Jons.csv");
*/

//processLogFile("http://www.northgatemobile.com/tlogs/TLOG20130328.CSV");
//processLogFile("http://www.northgatemobile.com/tlogs/TLogMissingPhoneNumbers20130329.csv");


//processLogFile("http://www.northgatemobile.com/tlogs/TLOG20130329.CSV");
//processLogFile("http://www.northgatemobile.com/tlogs/TLogMissingPhoneNumbers20130330.csv");

//processLogFile("http://www.northgatemobile.com/tlogs/TLOG20130330.CSV");
//processLogFile("http://www.northgatemobile.com/tlogs/TLogMissingPhoneNumbers20130331.csv");

//processLogFile("http://www.northgatemobile.com/tlogs/TLOG20130331.CSV");
//processLogFile("http://www.northgatemobile.com/tlogs/TLogMissingPhoneNumbers20130401.csv");

//processLogFile("http://www.northgatemobile.com/tlogs/TLOG20130402.CSV");
//processLogFile("http://www.northgatemobile.com/tlogs/TLOG20130402_1.csv");
//processLogFile("http://www.northgatemobile.com/tlogs/TLOG20130402_2.csv");
//processLogFile("http://www.northgatemobile.com/tlogs/TLOG20130402_3.csv");

//processLogFile("http://www.northgatemobile.com/tlogs/TLOG20130402_1a.csv");
//processLogFile("http://www.northgatemobile.com/tlogs/TLOG20130402_2a.csv");
//processLogFile("http://www.northgatemobile.com/tlogs/TLOG20130402_3a.csv");

//processLogFile("http://www.northgatemobile.com/tlogs/TLOG20130402_1a10000.csv");
//processLogFile("http://www.northgatemobile.com/tlogs/TLOG20130402_1a50000.csv");



//processLogFile("http://www.northgatemobile.com/tlogs/TLOG20130402_1trimmedA.csv");
//processLogFile("http://www.northgatemobile.com/tlogs/TLOG20130402_1trimmedB.csv");
//processLogFile("http://www.northgatemobile.com/tlogs/TLOG20130402_2trimmedA.csv");
//processLogFile("http://www.northgatemobile.com/tlogs/TLOG20130402_2trimmedB.csv");
//processLogFile("http://www.northgatemobile.com/tlogs/TLOG20130402_3trimmedA.csv");
//processLogFile("http://www.northgatemobile.com/tlogs/TLOG20130402_3trimmedB.csv");

//processLogFile("http://www.northgatemobile.com/tlogs/TLOG20130403_trimmed1.csv");
//processLogFile("http://www.northgatemobile.com/tlogs/TLOG20130403_trimmed2.csv");
//processLogFile("http://www.northgatemobile.com/tlogs/TLOG20130403_trimmed3.csv");
//processLogFile("http://www.northgatemobile.com/tlogs/TLOG20130403_trimmed4.csv");

//processLogFile("http://www.northgatemobile.com/tlogs/TLogMissingPhoneNumbers20130404.csv");
//processLogFile("http://www.northgatemobile.com/tlogs/TLOG20130404_trimmed_minusheader1.csv");
//processLogFile("http://www.northgatemobile.com/tlogs/TLOG20130404_trimmed_minusheader2.csv");
//processLogFile("http://www.northgatemobile.com/tlogs/TLOG20130404_trimmed_minusheader3.csv");





echo "hello 1 2 3 4 6 7";

exit;

////
////
	function processLogFile($filename) {

		$lines = file($filename, FILE_IGNORE_NEW_LINES);
		//pr($lines);

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

				$bagger_id		= $cells[19];			// T  (20-1)
					$customerTelephone = $bagger_id;
				$transaction_id	= $cells[20];			// U  (21-1)
				//$date_and_time	= $cells[23];		// X  (24-1)
				$transaction_time	= $cells[23];		// X  (24-1)
				$transaction_date	= $cells[1];		// B  (2-1)

//				echo "<BR>...$transaction_time...<BR>";
				//$transaction_date = substr($transaction_time, 0, 10);
				//$transaction_time = substr($transaction_time, 11, 8);

				$plu_code		= $cells[24];			// Y  (25-1)

				$quantity		= $cells[26];			// AA (27-1)
				$unit_price		= $cells[29];			// AD (29-1)
				$amount			= $cells[30];			// AE (30-1)


				//echo "customerTelephone, transaction_id, date_and_time, plu_code, quantity, unit_price, amount<BR>";
				//echo "$customerTelephone, $transaction_id, $date_and_time, $plu_code, $quantity, $unit_price, $amount<BR>";

//				echo "customerTelephone, transaction_id, transaction_date, transaction_time, plu_code, quantity, unit_price, amount<BR>";
				echo "$customerTelephone, $transaction_id, $transaction_date, $transaction_time, $plu_code, $quantity, $unit_price, $amount<BR>";


				$customerId = getCustomerIdFromMobileNumber($customerTelephone);

				if (!$customerId) {
					createNewCustomerRecordForThisMobileNumber($customerTelephone);
					$customerId = getCustomerIdFromMobileNumber($customerTelephone);
				}

				//$plu_code = str_pad($plu_code, 13, "0", STR_PAD_LEFT);
				//echo "<BR>12345678901234567890<BR>$plu_code<BR><BR>";
				$plu_code = str_pad($plu_code, 14, "0", STR_PAD_LEFT);
//				$plu_code = substr($plu_code, 1, 13);
//				echo "<BR>12345678901234567890<BR>$plu_code<BR><BR>";


				//$strSQL = "	INSERT INTO transaction_items
				//				(customer_phonenumber,customer_id,transactionid,dateandtime,plucode,quantity,unitprice,amount)
				//			VALUES
				//				('$customerTelephone','$customerId','$transaction_id','$date_and_time','$plu_code',$quantity,$unit_price,$amount)";
				$strSQL = "	INSERT INTO transaction_items
								(customer_phonenumber,customer_id,transactionid,transaction_date,transaction_time,plucode,quantity,unitprice,amount)
							VALUES
								('$customerTelephone','$customerId','$transaction_id','$transaction_date','$transaction_time','$plu_code',$quantity,$unit_price,$amount)";
//				echo "$strSQL<BR>";
				mysql_query($strSQL);

echo "<BR>";

			}
			++$i;
		}
	}
////
////


////
////
	function createNewCustomerRecordForThisMobileNumber($mobileNumber) {
		$strSQL = "INSERT INTO customers (mobilenumber) VALUES('$mobileNumber')";
		//echo "$strSQL<BR>";
		mysql_query($strSQL);
	}
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
	function pr($array) {
		?><PRE><?
		print_r($array);
		?></PRE><?
	}
////
////
?>