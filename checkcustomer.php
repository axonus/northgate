<?
	include "_misc.php";

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
		showAllMobileNumbers();
	}
	else {
		checkPhoneNumber($mobilenumber);
	}
?>
<?
////
////
	function getPhoneNumberTotal($mobilenumber) {

		$strSQL = "SELECT plucode,amount FROM transaction_items WHERE customer_phonenumber='$mobilenumber'";
		//echo "<BR>strSQL: $strSQL<BR>";
		if ($results = mysql_query($strSQL)) {
			$tot = 0;
			while ($row = mysql_fetch_array($results)) {
//				$id = $row[id];
//				$phone		= $row[customer_phonenumber];
//				$date		= $row[transaction_date];
//				$time		= $row[transaction_time];
				$plucode	= $row[plucode];
//				$quantity	= $row[quantity];
//				$unitprice	= $row[unitprice];
				$amount		= $row[amount];
//				$transactionId		= $row[transactionid];

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
////
	function showAllMobileNumbers() {
		$strSQL = "SELECT * FROM customers";
//		$strSQL = "SELECT * FROM customers WHERE id<100";
//		$strSQL = "SELECT * FROM customers WHERE id>210 AND id<240";
//		$strSQL = "SELECT * FROM customers WHERE id>210";



//		$strSQL = "SELECT * FROM customers WHERE id<210";
//		$strSQL = "SELECT * FROM customers WHERE id>210 AND id<2000";
//		$strSQL = "SELECT * FROM customers WHERE id>=2000 AND id<4000";
//		$strSQL = "SELECT * FROM customers WHERE id>=4000 AND id<6000";
//		$strSQL = "SELECT * FROM customers WHERE id>=6000 AND id<8000";
//		$strSQL = "SELECT * FROM customers WHERE id>=8000 AND id<10000";



		echo "<BR>strSQL: $strSQL<BR>";
$totZero = 0;
$totNonZero = 0;

$totZeroSpent = 0;
$totNonZeroSpent = 0;

		if ($results = mysql_query($strSQL)) {
			while ($row = mysql_fetch_array($results)) {
				$phone = $row[mobilenumber];
				//echo "$phone<BR>\n";
				?>
					<A HREF="checkcustomer.php?mobilenumber=<?echo $phone;?>"><?echo $phone;?></A>
<?// $total = getPhoneNumberTotal($phone);?>
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

		$strSQL = "SELECT * FROM transaction_items WHERE customer_phonenumber='$mobilenumber'";
		//echo "<BR>strSQL: $strSQL<BR>";
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
echo "<BR><BR>Total Eligible: "."$"."$tot<BR><BR>";
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