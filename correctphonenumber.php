<?
	include_once "_misc.php";


	// 1. Find the transaction_items records that have the wrong phone number
	//
	//		input is:
	//
	//						date on receipt
	//						phone number on receipt
	//						transaction number on receipt

		$date					= "20130319";
		$wrongnumber			= "7143131123";
		$transaction_number		= "9836285";

$correctnumber = "3333333333";

		$strSQL = "SELECT * FROM transaction_items WHERE customer_phonenumber='$wrongnumber' AND transaction_date='$date' AND transactionid='$transaction_number'";
		if ($results = mysql_query($strSQL)) {
			while ($row = mysql_fetch_array($results)) {
				pr($row);
				$id = $row[id];

				// clone the record

					// copy content of the record you wish to clone
					$entity = mysql_fetch_array(mysql_query("SELECT * FROM transaction_items WHERE id='$id'"), MYSQL_ASSOC) or die("Could not select original record");

					// set the auto-incremented id's value to blank. If you forget this step, nothing will work because we can't have two records with the same id
					$entity["id"] = "";

// set the phone number to the correct number
$entity["customer_phonenumber"] = $correctnumber;

					// insert cloned copy of the original  record
					$strSQL2 = "INSERT INTO transaction_items (".implode(", ",array_keys($entity)).") VALUES ('".implode("', '",array_values($entity))."')";

					mysql_query($strSQL2);

					// if you want the auto-generated id of the new cloned record, do the following
					$newid = mysql_insert_id();




				echo "$strSQL2<BR>";
//				mysql_query($strSQL2);
			}
		}


	// 2. Copy these records and set the phone number to the correct phone number
	//
	//		input is:
	//
	//						correct phone number


?>


