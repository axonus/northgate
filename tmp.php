<?
	include_once "_misc.php";

$language = "es";
//$language = "en";

if ($language == "es") {
	$msg1 = "Bienvenido! Te has suscrito para el evento Exclusivo de Northgate Market para Ver a Reyli en Concierto. Ya hemos acumulado tus primeras compras calificantes.";
	$msg2 = "Estas en Camino para ganar tus Boletos para ver a Reyli! Agrega esta semana comprando Mantequilla CountryCrock 45 oz a $3.99 en Northgate. Valido hasta Abril 9.";
	$msg3 = "Que Bien! Haz alcanzado el 25 % de tus compras para obtener tus dos boletos Gratis! Regresa pronto a Northgate y compra tus productos favoritos de Unilever.";
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
sendTextMessageToMobileNumber("8184151550", $msg11);

exit;






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

50% message:
Checkpoint 1:  Way to Go! You have reached 50% of the goal to get your Reyli tickets! Come back to Northgate soon and shop for more great Unilever products.
Que Bien! Haz alcanzado el 50 % de tus compras para obtener tus dos boletos Gratis! Regresa pronto a Northgate y compra tus productos favoritos de Unilever.
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