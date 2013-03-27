<?
	//$to = "atty4u@gmail.com";
	//$to = "6503879797@txt.att.net";
	//$to = "8184151550@vtext.com";
	$to = "9493752984@txt.att.net";
	$subject = "testing...";
	$message = "I believe I can fly";
	$headers = 'From: thomas@northgatemobile.com' . "\r\n" .
    'Reply-To: thomas@northgatemobile.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
	$b = mail($to, $subject, $message, $headers);
	echo "b = .$b.<BR>";
?>