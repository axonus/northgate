<?

	include_once "_misc.php";

// 495390 - musica spanish
// 503097 - music  english

	$cmd = "curl -X GET -u jon@frendl.com:8989phph http://www.vibescm.com/api/subscription_campaigns/495390/subscriptions.xml";
//	$cmd = "curl -X GET -u jon@frendl.com:8989phph http://www.vibescm.com/api/subscription_campaigns/503097/subscriptions.xml";
//	$cmd = 'curl -X POST --header "Content-Type:text/xml" -d \'<message><description>description</description><text>hello</text><filters><mobile_phones><mobile_phone>6503879797</mobile_phone></mobile_phones></filters></message>\' http://jon%40frendl.com:8989phph@www.vibescm.com/api/subscription_campaigns/495390/send_alert.xml';
//	echo "cmd = .$cmd.<BR>";
//	echo exec($cmd);

//	echo "<"."?"."xml version=\"1.0\" encoding=\"ISO-8859-1\""."?".">";
//	echo "<"."?"."xml-stylesheet type=\"text/css\" href=\"subscribers.css\""."?".">";

	$xml = shell_exec($cmd);
//echo $xml;


// <mobile-phone>000000000</mobile-phone>


$j = 0;
$t1 = "<mobile-phone>";
$t2 = "</mobile-phone>";
while ($i = strpos($xml, $t1, $j)) {
	$j = strpos($xml, $t2, $i);
	$s = substr($xml, $i+strlen($t1), (($j-$i)-strlen($t2))+1);
	//echo "$s<BR>";
	if (strlen($s) == 10) {
		$nnn[] = $s;
	}
//	echo "$i, $j<BR>";
}


pr($nnn);



/*
$xml = str_replace("mobile-phone", "mobilephone", $xml);
//echo $xml;

	$arr = XMLtoArray($xml);
//	pr($arr);

	$subscriptions = $arr[SUBSCRIPTIONS];

	$s = "";

	foreach ($subscriptions[SUBSCRIPTION] AS $subscription) {
		pr($subscription);
		$user = $subscription[USER];
		$keys = array_keys($user); 
		$key = $keys[0];
		$u = $user[$key];

		$phone = $u[PHONE];
		$mobilephone = $u[MOBILEPHONE];

		if (is_string($mobilephone) && strlen($mobilephone) == 10) {
			$s .= "<FONT COLOR=GREEN>$mobilephone</FONT><BR>\n";
			$fff[] = ".".$mobilenumber.".";
		}
	}

	pr($fff);

	echo $s;
*/

	exit;

?>
<?

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

<!--
<FORM METHOD=GET ACTION="http://jon%40frendl.com:8989phph@www.vibescm.com/api/subscription_campaigns/495390/subscriptions.xml">
	<INPUT TYPE=SUBMIT>
</FORM>
-->

<?
/*
	function getSubscribersForCampaignId($campaignId) {
		$cmd = 'curl -X POST --header "Content-Type:text/xml" -d \'\' http://jon%40frendl.com:8989phph@www.vibescm.com/api/subscription_campaigns/495390/subscriptions.xml';
		echo "cmd = .$cmd.<BR>";
		echo exec($cmd);
	}
*/
?>
<?
//	include_once "_misc.php";

//$language = "es";
$language = "en";

if ($language == "es") {
	$msg1 = "Bienvenido! Te has suscrito para el evento Exclusivo de Northgate Market para Ver a Reyli en Concierto. Ya hemos acumulado tus primeras compras calificantes.";
	$msg2 = "Estas en Camino para ganar tus Boletos para ver a Reyli! Agrega esta semana comprando Mantequilla CountryCrock 45 oz a $3.99 en Northgate. Valido hasta Abril 9.";
	$msg3 = "Que Bien! Haz alcanzado el 25 % de tus compras para obtener tus dos boletos Gratis! Regresa pronto a Northgate y compra tus productos favoritos de Unilever.";
$msg3 = "Que Bien! Haz alcanzado el 50 % de tus compras para obtener tus dos boletos Gratis! Regresa pronto a Northgate y compra tus productos favoritos de Unilever.";
	$msg4 = "WOW! Realmente Quieres ir al concierto! Haz alcanzado el 75% de tus compras para obtener tus boletos gratis. Regresa pronto a Northgate y Alcanza tu meta.";
		$msg5 = "Solo quedan dos semanas para obtener tus boletos para el Concierto de Reyli! Regresa pronto a Northgate y busca los productos participantes en toda la tienda.";
		$msg6 = "Ultima Semana para Obtener tus boletos para el Concierto de Reyli! Ven a Northgate Ahora y busca los productos participantes. Compra, Gana, Y Disfruta!";
		$msg7 = "Estas en Camino para ganar tus Boletos para ver a Reyli! Agrega esta semana Comprando Mayonesa Best Foods de 48 oz a $5.99 en Northgate. Valido hasta Abril 16.";
		$msg8 = "Estas en Camino para ganar tus Boletos para ver a Reyli! Agrega esta semana Comprando Shampoo  Tresemme  de 32 oz a $3.99 en Northgate. Valido hasta Abril 23.";
		$msg9 = "Estas en Camino para ganar tus Boletos para ver a Reyli! Agrega esta semana Comprando Knorr de Pollo y Tomate por $4.99 en Northgate. Valido hasta Abril 30.";
		$msg10 = "Estas en Camino para ganar tus Boletos para ver a Reyli! Agrega esta semana Comprando Lipton Iced Tea Mix de 53oz. por $3.99 en Northgate. Valido hasta Mayo 5.";
	$msg11 = "Felicidades! Te Llevaste dos boletos para ir a ver Reyli en concierto este 17 de Mayo en el Honda Center. Muestra este codigo a Northgate Financial y obten tus boletos!";

	$email1 = "Gracias por participar en la promoción de Northgate Gonzalez  Market para llevarte 2 boletos Gratis para ver a Reyli en Vivo en el Honda Center el 17 de Mayo. Compra de tus productos favoritos como Knorr, Mayonesa Best Foods, Breyers, Suave, Popsicle, Mantequilla Country Crock y muchos mas. Busca las etiquetas con la imagen de Reyli para identificar los productos participantes dentro de tu tienda Northgate. Tal y como vayas comprando de estos productos, te mandaremos actualizaciones de tus compras durante la promoción. También puedes revisar tu progreso hacia tus boletos gratis ingresando tu número telefónico en nuestro sitio de Internet www.reyli.northgatemarkets.com";
}
else {
	$msg1 = "Welcome!  You have successfully registered for the Northgate Reyli Concert Event and we have recorded your first qualifying purchases.";
	$msg2 = "You are on our way to earning Reyli tickets! Add to your total by Picking up Country Crock Spread 45 oz. this week for $3.99 at Northgate. Good thru April 9th.";
	$msg3 = "Way to Go!  You have reached 25% of the goal to get your Reyli tickets!  Come back to Northgate soon and shop for more great Unilever products.";
$msg3 = "Way to Go! You have reached 50% of the goal to get your Reyli tickets! Come back to Northgate soon and shop for more great Unilever products.";
	$msg4 = "You must really want to see Reyli!  You are now 75% of the way to getting your free tickets.  See you back at your favorite Northgate Market soon.";
		$msg5 = "There are only 2 weeks left to earn your tickets to see Reyli live!  Come back to Northgate soon and look for special qualifying items storewide.";
		$msg6 = "There is only 1 week left to earn your tickets to see Reyli live!  Be sure to look for qualifying products at your favorite Northgate Market. Shop Earn Enjoy!";
		$msg7 = "You are on your way to earning Reyli tickets!  Add to your total by picking up Best Foods Mayonnaise 48oz. this week for $5.99 at Northgate. Good thru April 16th.";
		$msg8 = "You are on your way to earning Reyli tickets!  Add to your total by picking up Tresemme Shampoo and Conditioner 32oz for $4.99 at Northgate. Good thru April 23rd";
		$msg9 = "You are on your way to earning Reyli tickets!  Add to your total by picking up Knorr Bouillon Chicken and Tomato Chicken for $4.99 at Northgate. Good thru April 30th";
		$msg10 = "You are on your way to earning Reyli tickets!  Add to your total by picking up Lipton Iced Tea Mix 53oz/20qts. for $3.99 at Northgate. Good thru May 5th.";
	$msg11 = "Congratulations!  You earned two free tickets to see Reyli on May 17th at the Honda Center. Redeem your code at any Northgate Financial Center.";

	$email1 = "Thank you for participating in the Northgate Gonzalez Market promotion to earn tickets to see Reyli at the Honda Center on May 17th.  Stock up on your favorite Unilever items like Knorr, Best Foods Mayonnaise, Breyers, Popsicle, Suave, Country Crock and many others.  Look for shelf tags on over 350 of your favorite brands throughout the store identifying qualifying items.  As you shop and buy these items, we will send you updates on these qualifying purchases throughout the promotion.  You can also check your status by entering your phone number on our website at www.reyli.northgatemarkets.com";
}


//sendTextMessageToMobileNumber("9498872872", $msg11);
//sendTextMessageToMobileNumber("6503879797", $msg11);
//sendTextMessageToMobileNumber("3109060164", $msg11);
//sendTextMessageToMobileNumber("8184151550", $msg11);



echo "<BR>done<BR>\n";

$customerId = 64;
$mobileNumber = getMobileNumberFromUserId($customerId);
$progressLevel = getProgressLevelFromUserId($customerId);
$lastMessageLevel = getLastMessageLevelFromUserId($customerId);

echo "customerId = .$customerId.<BR>";
echo "mobileNumber = .$mobileNumber.<BR>";
echo "progressLevel = .$progressLevel.<BR>";
echo "lastMessageLevel = .$lastMessageLevel.<BR>";

if ($progressLevel > $lastMessageLevel) {
	echo "we will sent a message<BR>";
	if ($progressLevel == 1) {
		$msgToSend = $msg3;
	}
	else {
		$msgToSend = "";
	}
	echo "msgToSend = .$msgToSend.<BR>";

}
else {
	echo "no message<BR>";
}

		// 1. Get customer's current level_reached		// this is their current progress (eg: 1, 2, 3, 4, 5 for 25%, 50%, 75%, 100%, 125%, etc)
		// 2. Check customer's lastmessage_level_id		// this is the level_id (eg: 1, 2, 3, 4, 5, etc) of the last message sent to the them
		// 3. If current level > last message level then send message for current level

		// 9. update last message level sent to level we just sent

exit;

////
////
	function getLastMessageLevelFromUserId($userId) {
		$strSQL = "SELECT * FROM customers WHERE id='$userId'";
		if ($results = mysql_query($strSQL)) {
			if ($row = mysql_fetch_array($results)) {
				//pr($row);
				$lastMessageLevel = $row[lastmessage_level_id];
			}
		}
		return $lastMessageLevel;
	}
////
////
	function getProgressLevelFromUserId($userId) {
		$strSQL = "SELECT * FROM customers WHERE id='$userId'";
		if ($results = mysql_query($strSQL)) {
			if ($row = mysql_fetch_array($results)) {
				//pr($row);
				$progressLevel = $row[progress_level_id];
			}
		}
		return $progressLevel;
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





/*
sendTextMessageToMobileNumber("6503879797", $msg1);
sendTextMessageToMobileNumber("6503879797", $msg2);
sendTextMessageToMobileNumber("6503879797", $msg3);
sendTextMessageToMobileNumber("6503879797", $msg4);
sendTextMessageToMobileNumber("6503879797", $msg5);
sendTextMessageToMobileNumber("6503879797", $msg6);
sendTextMessageToMobileNumber("6503879797", $msg7);
sendTextMessageToMobileNumber("6503879797", $msg8);
sendTextMessageToMobileNumber("6503879797", $msg9);
sendTextMessageToMobileNumber("6503879797", $msg10);
sendTextMessageToMobileNumber("6503879797", $msg11);
*/



echo $email1;


/*
1.	Initial purchase
2.
3.	Checkpoint 1
4.	Checkpoint 2
5.	General Alert
6.	General Alert
7.	
8.	
9.	
10.
11.	Qualifying

Email Message

50% message: Checkpoint 1:
*/


?>
<?
////
////
	function sendTextMessageToMobileNumber($mobileNumber, $msg) {
		echo "mobileNumber = .$mobileNumber.<BR>";
		sendMsg($msg, $mobileNumber);
	}
////
////
	function sendMsg($msg, $mobileNumber) {
		$cmd = 'curl -X POST --header "Content-Type:text/xml" -d \'<message><description>description</description><text>'.$msg.'</text><filters><mobile_phones><mobile_phone>'.$mobileNumber.'</mobile_phone></mobile_phones></filters></message>\' http://jon%40frendl.com:8989phph@www.vibescm.com/api/subscription_campaigns/495390/send_alert.xml';
		echo "cmd = .$cmd.<BR>";
		echo exec($cmd);
	}
////
////
?>