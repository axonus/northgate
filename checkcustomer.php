<?
	include "_misc.php";

//ini_set('max_execution_time', 300); //300 seconds = 5 minutes
set_time_limit (60*5);

	function foo($date) {
		$strSQL = "SELECT DISTINCT (customer_phonenumber) FROM transaction_items WHERE transaction_date = '$date'";
		echo $strSQL;
		if ($results = mysql_query($strSQL)) {
			while ($row = mysql_fetch_array($results)) {
				$numbers[] = $row[customer_phonenumber];
			}
		}
		return $numbers;
	}












/*
sendOptInConfirmationTxtMsg("3109949608");

sendOptInConfirmationTxtMsg("7142714781");
sendOptInConfirmationTxtMsg("3108490945");
sendOptInConfirmationTxtMsg("6264291553");
sendOptInConfirmationTxtMsg("7149360106");

sendOptInConfirmationTxtMsg("7144122367");
sendOptInConfirmationTxtMsg("3233653984");
sendOptInConfirmationTxtMsg("3234762833");
sendOptInConfirmationTxtMsg("7143282581");
sendOptInConfirmationTxtMsg("7149200360");

sendOptInConfirmationTxtMsg("7149200509");
sendOptInConfirmationTxtMsg("7605332479");
sendOptInConfirmationTxtMsg("9493554879");
sendOptInConfirmationTxtMsg("7144960643");
sendOptInConfirmationTxtMsg("6197913209");

sendOptInConfirmationTxtMsg("7142252973");
sendOptInConfirmationTxtMsg("7149813955");
sendOptInConfirmationTxtMsg("5626884413");
sendOptInConfirmationTxtMsg("6266798634");
sendOptInConfirmationTxtMsg("8186690500");

sendOptInConfirmationTxtMsg("6266467055");
sendOptInConfirmationTxtMsg("5625893891");


exit;

*/



	$mobilenumber = $_REQUEST["mobilenumber"];
	echo "<BR>mobilenumber: $mobilenumber<BR>";

	if ($mobilenumber == "") {

		// Get lists of number from each day

//			$day1numbers = foo('20130402');
//			$day2numbers = foo('20130403');
			$day3numbers = foo('20130404');

/*
		// Get list of numbers that are in both days (eg: intersection)

			$bothdaynumbers = array_intersect($day1numbers, $day2numbers);
			foreach ($bothdaynumbers AS $number) {
				$foo[] = $number;
			}
			$bothdaynumbers = $foo;

		// Get list of numbers that are in either day (eg: union)

			$eitherdaynumbers = array_union($day1numbers, $day2numbers);
			foreach ($eitherdaynumbers AS $number) {
				$foo[] = $number;
			}
			$eitherdaynumbers = $foo;
//pr($eitherdaynumbers);
*/

		// Dispay the info for the numbers

//			showMobileNumberInfo($day1numbers);
//			showMobileNumberInfo($day2numbers);
//			showMobileNumberInfo($bothdaynumbers);
//showMobileNumberInfo($bothdaynumbers, '20130402');
//showMobileNumberInfo($bothdaynumbers, '20130403');
//showMobileNumberInfo($bothdaynumbers);

//showMobileNumberInfo($day1numbers, '20130402');
//showMobileNumberInfo($day2numbers, '20130403');

//showMobileNumberInfo($eitherdaynumbers);

showMobileNumberInfo($day3numbers, '20130404');

			//showAllMobileNumbers();

	}
	else {
		checkPhoneNumber($mobilenumber);
	}
?>
<?
	function array_union($array1, $array2) {
		return array_unique(array_merge($array1, $array2));
	}
////
////
	function showMobileNumberInfo($arrayOfNumbers, $date="") {

		// Generate SQL statement

			$strSQL = "SELECT * FROM customers";
			if ($arrayOfNumbers) {
				foreach ($arrayOfNumbers AS $number) { $foo[] = "'".$number."'"; }
				$strSQL .= " WHERE mobilenumber IN (".implode(',', $foo).")";
			}
			echo "<BR>strSQL: $strSQL<BR>";

		// Initialize totals

			$totZero			= 0;
			$totNonZero			= 0;
			$totZeroSpent		= 0;
			$totNonZeroSpent	= 0;

		if ($results = mysql_query($strSQL)) {
			$i = 0;
			while ($row = mysql_fetch_array($results)) {
				$phone = $row[mobilenumber];
$total = computePhoneNumberTotal($phone, $date);
				?>
					<?echo ++$i;?> <A HREF="checkcustomer.php?mobilenumber=<?echo $phone;?>"><?echo $phone;?></A> $<? echo $total;?><BR>
				<?

				// Accumulate totals

					if ($total == 0) {
						++$totZero;
						$totZeroSpent += $total;
					}
					else {
						++$totNonZero;
						$totNonZeroSpent += $total;
					}

			}
		}

		?>
			<BR><BR><BR>
			Num Zero: <?echo $totZero;?><BR>
			Num Non-Zero: <?echo $totNonZero;?><BR>
			<BR>
			Zero Spent: $<?echo $totZeroSpent;?><BR>
			Non-Zero Spent: $<?echo $totNonZeroSpent;?><BR>
			<BR><BR>
		<?

	}
////
?>
<?
////
////
	function retrievePhoneNumberTotal($mobilenumber) {
		$strSQL = "SELECT * FROM customers WHERE mobilenumber='$mobilenumber'";
		$id = 0;
		if ($results = mysql_query($strSQL)) {
			while ($row = mysql_fetch_array($results)) {
				$tot = $row[total_eligible_spent];
			}
		}
		return $tot;
	}
////
////
	function computePhoneNumberTotal($mobilenumber, $date) {

		$strSQL = "SELECT plucode,amount FROM transaction_items WHERE customer_phonenumber='$mobilenumber'";
if ($date) {
	$strSQL .= " AND transaction_date='$date'";
}
//echo "<BR>strSQL: $strSQL<BR>";

		if ($results = mysql_query($strSQL)) {
			$tot = 0;
			while ($row = mysql_fetch_array($results)) {
				$plucode	= $row[plucode];
				$amount		= $row[amount];

				$isEligible = codeIsEligible($plucode) ? "YES" : "no";

				if (codeIsEligible($plucode)) {
					$tot += $amount;
				}
				//pr($row);
			}
			return $tot;
		}
	}
////
////
?>
<?
////
/*
	number of new phone numbers
*/

////
//	function showAllMobileNumbers() {
	function showAllMobileNumbers($arrayOfNumbers) {

		$strSQL = "SELECT * FROM customers";
		if ($arrayOfNumbers) {
			//$strSQL .= " WHERE mobilenumber IN (".implode(',', $arrayOfNumbers).")";
			// put phone numbers in quotes
			foreach ($arrayOfNumbers AS $number) {
				$foo[] = "'".$number."'";
			}
			$strSQL .= " WHERE mobilenumber IN (".implode(',', $foo).")";
		}
		echo "<BR>strSQL: $strSQL<BR>";

					//		$strSQL = "SELECT * FROM customers WHERE id<100";
					//		$strSQL = "SELECT * FROM customers WHERE id>210 AND id<240";
					//		$strSQL = "SELECT * FROM customers WHERE id>210";



					//		$strSQL = "SELECT * FROM customers WHERE id<210";
					//		$strSQL = "SELECT * FROM customers WHERE id>210 AND id<2000";
					//		$strSQL = "SELECT * FROM customers WHERE id>=2000 AND id<4000";
					//		$strSQL = "SELECT * FROM customers WHERE id>=4000 AND id<6000";
					//		$strSQL = "SELECT * FROM customers WHERE id>=6000 AND id<8000";
					//		$strSQL = "SELECT * FROM customers WHERE id>=8000 AND id<10000";

					//		$strSQL = "SELECT * FROM customers WHERE id>=0 AND id<10000";
					//		$strSQL = "SELECT * FROM customers WHERE id>=10000";



		echo "<BR>strSQL: $strSQL<BR>";
$totZero = 0;
$totNonZero = 0;

$totZeroSpent = 0;
$totNonZeroSpent = 0;

		if ($results = mysql_query($strSQL)) {
			$i = 0;
			while ($row = mysql_fetch_array($results)) {
				$phone = $row[mobilenumber];
				//echo "$phone<BR>\n";
				?>
					<?echo ++$i;?> <A HREF="checkcustomer.php?mobilenumber=<?echo $phone;?>"><?echo $phone;?></A>
<?// $total = computePhoneNumberTotal($phone);?>
<? $total = retrievePhoneNumberTotal($phone);?>
<?
	$strSQL2 = "UPDATE customers SET total_eligible_spent=$total WHERE mobilenumber='$phone'";
	//echo $strSQL2;
	mysql_query($strSQL2);
?>
$<? echo $total;?><BR>
				<?
if ($total == 0) {
	++$totZero;
	$totZeroSpent += $total;
}
else {
	++$totNonZero;
	$totNonZeroSpent += $total;
}
			}
		}
?>
	<BR><BR><BR>
	Num Zero: <?echo $totZero;?><BR>
	Num Non-Zero: <?echo $totNonZero;?><BR>
	<BR>
	Zero Spent: $<?echo $totZeroSpent;?><BR>
	Non-Zero Spent: $<?echo $totNonZeroSpent;?><BR>
	<BR><BR>
<?

	}
////
////
	function checkPhoneNumber($mobilenumber) {

//		$strSQL = "SELECT * FROM transaction_items WHERE customer_phonenumber='$mobilenumber'";
$strSQL = "SELECT * FROM transaction_items WHERE customer_phonenumber='$mobilenumber' AND media_line_number=1";
echo "<BR>strSQL: $strSQL<BR>";
		if ($results = mysql_query($strSQL)) {
			echo "<TABLE BORDER=1 CELLSPACING=10>\n";
			?>
				<TR>
					<TD><CENTER><B>phone number</B></CENTER></TD>
					<TD><CENTER><B>date</B></CENTER></TD>
					<TD><CENTER><B>time</B></CENTER></TD>
<TD><CENTER><B>transaction id</B></CENTER></TD>
					<TD><CENTER><B>plu code</B></CENTER></TD>
					<TD><CENTER><B>quantity</B></CENTER></TD>
					<TD><CENTER><B>unit price</B></CENTER></TD>
					<TD><CENTER><B>amount</B></CENTER></TD>
					<TD><CENTER><B>eligible code?</B></CENTER></TD>
				</TR>
			<?

$tot = 0;
			while ($row = mysql_fetch_array($results)) {
				$id = $row[id];
				$phone		= $row[customer_phonenumber];
				$date		= $row[transaction_date];
				$time		= $row[transaction_time];
				$plucode	= $row[plucode];
				$quantity	= $row[quantity];
				$unitprice	= $row[unitprice];
				$amount		= $row[amount];
$transactionId		= $row[transactionid];

				$isEligible = codeIsEligible($plucode) ? "YES" : "no";

				echo "<TR>";
					echo "<TD>$phone</TD>";
					echo "<TD>$date</TD>";
					echo "<TD>$time</TD>";
echo "<TD>$transactionId</TD>";
					echo "<TD>$plucode</TD>";
					echo "<TD>$quantity</TD>";
					echo "<TD>$unitprice</TD>";
					echo "<TD>$amount</TD>";
					echo "<TD>$isEligible</TD>";
if (codeIsEligible($plucode)) {
	$tot += $amount;
}
				echo "</TR>\n";


				//pr($row);
			}
			echo "</TABLE>\n";
echo "<BR><BR>Total Eligible: "."$"."$tot<BR><BR>\n";
		}
	}
////
////
?>
<?
////
////
	function codeIsEligible($code) {
		$strSQL = "SELECT * FROM eligible_skus WHERE plucode='$code'";
		if ($results = mysql_query($strSQL)) {
			if ($row = mysql_fetch_array($results)) {
				//$id = $row[id];
				return true;
			}
		}
		return false;
	}
////
////
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
////
////
?>