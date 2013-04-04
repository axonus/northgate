<? $mobilenumber=isset($_REQUEST['mobilenumber']) && !empty($_REQUEST['mobilenumber']) ? $_REQUEST['mobilenumber'] : ''; ?>
<? $language=isset($_REQUEST['language']) && !empty($_REQUEST['language']) ? $_REQUEST['language'] : ''; ?>
<? $udid=isset($_REQUEST['udid']) && !empty($_REQUEST['udid']) ? $_REQUEST['udid'] : ''; ?>
<?
	setcookie("_udid", $udid, time()+(60*60*24*365));
	setcookie("_language", $language, time()+(60*60*24*365));
	include_once "_misc.php";
	//echo "udid = .$udid.<BR>\n";
	//echo "language = .$language.<BR>\n";
	//exit;

	$copyrightText = "&copy;2013 Northgate Gonz"."&aacute;"."lez Markets. All rights reserved.";
	if ($language == "es") {
		$strEnterMailingAddress = "Direcci"."&oacute;"."n dentro de los EU";
		$strStreetAddress = "Direcci"."&oacute;"."n";
		$strCity = "Ciudad";
		$strState = "Estado";
		$strZipCode = "C"."&oacute;"."digo Postal";
		$strEmailAddress = "Correo Electr"."&oacute;"."nico";
		$strCellPhone = "Numero de Celular - Puedo recibir mensajes de texto";
		$strHomePhone = "Numero telef"."&oacute;"."nico de casa - No puedo recibir mensajes de textos";
		$strPhoneNumber = "Numero de Tel"."&eacute;"."fono";
		$strRepeatPhoneNumber = "Repita su n"."&uacute;"."mero de tel"."&eacute;"."fono";
		$strThisPhoneNumberIs = "Este n"."&uacute;"."mero de tel"."&eacute;"."fono es";
		$strIfNoEmail = "";
		$strPhoneNumbersMustMatch = "N"."&uacute;"."meros de Tel"."&eacute;"."fono deben ser id"."&eacute;"."nticos";
		$strCompleteForm = "Favor de llenar completamente el formulario de Abajo";

		$strTicketDetailsHeader = "Obtener tus dos boletos para ver a Reyli en Vivo es f"."&aacute;"."cil!";
		$strTicketDetailsItem1 = "Registra tu n"."&uacute;"."mero de tel"."&eacute;"."fono y la informaci"."&oacute;"."n requerida abajo.";
		$strTicketDetailsItem2 = "Compra en Northgate y busca las etiquetas con la imagen de Reyli en m"."&aacute;"."s de 350 productos participantes en toda la tienda. Solo compra $100 desde el 2 de Abril hasta el 5 de Mayo para calificar.";
		$strTicketDetailsItem3 = "Dile al cajero/a de Northgate tu numero de tel"."&eacute;"."fono cada vez que pagues- nosotros te acumularemos tus compras autom"."&aacute;"."ticamente.";
		$strTicketDetailsItem4 = "Nosotros te dejaremos saber cuando hayas acumulado $100 para que vengas y recojas tus boletos!";
		$locale = "es_es";
		$loginText = "Entrar";
	}
	else {
		$strEnterMailingAddress = "Enter a US mailing address";
		$strStreetAddress = "Street Address";
		$strCity = "City";
		$strState = "State";
		$strZipCode = "Zip Code";
		$strEmailAddress = "Email Address";
		$strCellPhone = "Cell Phone I can receive texts on";
		$strHomePhone = "Home Phone I can't receive texts on";
		$strPhoneNumber = "Phone Number";
		$strRepeatPhoneNumber = "Repeat Phone Number";
		$strThisPhoneNumberIs = "This phone number is a";
		$strIfNoEmail = "If no email:";
		$strPhoneNumbersMustMatch = "Your phone numbers must match";
		$strCompleteForm = "Please complete the form below";
		
		$strTicketDetailsHeader = "Earning your 2 free Tickets to see Reyli is easy!";
		$strTicketDetailsItem1 = "Register your phone number and required information below.";
		$strTicketDetailsItem2 = "Shop Northgate and look for the easy to spot shelf tags on over 350 participating items all over the store! Just spend $100 from April 2 thru May 5 to qualify.";
		$strTicketDetailsItem3 = "Tell the Northgate Checker your phone number every time you checkout - we'll keep track of your purchases automatically.";
		$strTicketDetailsItem4 = "We'll notify you when you reach $100 to come pick up your tickets.";
		$locale = "en_us";
		$loginText = "Login";
	}

$mobilenumber = getPhoneNumberFromUDID($udid);
//echo "<BR>hi $mobilenumber<BR>";

//$mobilenumber = $udid;



////
////
	function getPhoneNumberFromUDID($udid) {
		if (!$udid) { return ""; }
		$strSQL = "SELECT * FROM customers WHERE udid='$udid'";
		if ($results = mysql_query($strSQL)) {
			if ($row = mysql_fetch_array($results)) {
				$mobilenumber = $row[mobilenumber];
			}
		}
		return $mobilenumber;
	}
////
////


?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!--<meta http-equiv="refresh" content="1;url=http://www.northgatemobile.com/customerlogin.php">-->
    <link href="css/reset-min.css" media="screen" rel="stylesheet" type="text/css" />

	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<? include "include-meta-apple.php"; ?>
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.1/jquery.mobile-1.1.1.min.css" />
	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.1.1/jquery.mobile-1.1.1.min.js"></script>
	
	<link href="css/base.css?ver=<?=time();?>" media="screen" rel="stylesheet" type="text/css" />
    <link href="css/login.css?ver=<?=time();?>" media="screen" rel="stylesheet" type="text/css" />
    <link href="css/summary.css?ver=<?=time();?>" media="screen" rel="stylesheet" type="text/css" />
	<style>
	</style>
</head>
<body>
<div data-role="page" id="loginPage" class="page-content no-thumb">
	<?
		include "include-android-nav.php";
		insertNav($language,'main',true);
	?>
	<div class="imagery"><img src="img/logos/con-musica.jpg" alt="" /></div>
	<div data-role="content">
		<div data-role="content" class="content-main" id="content-header">
			<div class="col col1">
				<ol id="ticket-details">
					<li class="header"><h2><?=$strTicketDetailsHeader?></h2></li>
					<li class="first"><span class="item-number">1)</span><span class="item-text"><?=$strTicketDetailsItem1?></span></li>
					<li><span class="item-number">2)</span><span class="item-text"><?=$strTicketDetailsItem2?></span></li>
					<li><span class="item-number">3)</span><span class="item-text"><?=$strTicketDetailsItem3?></span></li>
					<li><span class="item-number">4)</span><span class="item-text"><?=$strTicketDetailsItem4?></span></li>
				</ol>
			</div>
			<div class="col col2">
				<div class="thumbnail thumbnail-player"><img src="img/fpo/thumbnail1.png" alt="" /></div>
			</div>
			<div id="promo-container">
			<iframe id="youtube-promo" class="youtube-player" type="text/html" width="290" src="http://www.youtube.com/embed/EavMtKBNP54?controls=0&autoplay=0&allowfullscreen=1&showinfo=0&showsearch=0&modestbranding=1&rel=0" frameborder="0"></iframe>
			</div>
		</div>
		<form id="form-login" data-ajax="false">
			<input type="hidden" name="language" value="<?echo $language;?>" />
			<input type="hidden" name="udid" value="<?echo $udid;?>" />
			<div data-role="fieldcontain" id="error-messages">
				<span id="error-global"><?echo $strCompleteForm;?></span>
				<span id="error-phone-mismatch"><?echo $strPhoneNumbersMustMatch;?></span>
			</div>
			<div data-role="fieldcontain">
				<legend><?echo $strPhoneNumber;?></legend>
				<input type="tel" name="mobilenumber" id="mobilenumber" placeholderText2="<?echo $strPhoneNumber;?>" value="<?echo $mobilenumber;?>" pattern="\d{10}" maxlength="10" required />
			</div>
			<div data-role="fieldcontain">
				<legend><?echo $strRepeatPhoneNumber;?></legend>
				<input type="tel" name="mobilenumber2" id="mobilenumber2" placeholderText2="<?echo $strRepeatPhoneNumber;?>" value="<?echo $mobilenumber;?>" pattern="\d{10}" maxlength="10" required />
			</div>
			<div data-role="fieldcontain" id="fieldset-phone-type" class="fieldset-radio-checkbox">
				<fieldset data-role="controlgroup">
					<legend><?echo $strThisPhoneNumberIs;?>:</legend>
					<input type="radio" name="phone-type-1" id="phone-type-1" value="mobile" checked="checked" />
					<label for="phone-type-1"><?echo $strCellPhone;?></label>
					<input type="radio" name="phone-type-1" id="phone-type-2" value="home"  />
					<label for="phone-type-2"><?echo $strHomePhone;?></label>
				</fieldset>
			</div>
			
			<div data-role="fieldcontain" id="fieldset-home" class="fieldset-radio-checkbox">
				<fieldset data-role="controlgroup" id="address-email">
					<legend><?echo $strEmailAddress;?></legend>
					<input type="text" name="email" id="email" placeholderText2="<?echo $strEmailAddress;?>"/>
				</fieldset>
				<legend><?echo $strIfNoEmail;?></legend>
				<fieldset data-role="controlgroup">
					<input type="checkbox" name="address-type" id="address-type" />
					<label for="address-type"><?echo $strEnterMailingAddress;?></label>
				</fieldset>

				<fieldset data-role="controlgroup" id="address-mailing">
					<legend><?echo $strStreetAddress;?></legend>
					<input type="text" name="address" id="address" placeholderText2="<?echo $strStreetAddress;?>" />
					<span class="legend-city"><?echo $strCity;?></span>
					<input type="text" name="city" id="city" placeholderText2="<?echo $strCity;?>"  autocorrect="off" autocapitalize="off" autocomplete="off" />
					<select name="state" id="state" > 
						<option value="" selected="selected"><?echo $strState;?></option> 
						<option value="AL">Alabama</option> 
						<option value="AK">Alaska</option> 
						<option value="AZ">Arizona</option> 
						<option value="AR">Arkansas</option> 
						<option value="CA" selected>California</option> 
						<option value="CO">Colorado</option> 
						<option value="CT">Connecticut</option> 
						<option value="DE">Delaware</option> 
						<option value="DC">District Of Columbia</option> 
						<option value="FL">Florida</option> 
						<option value="GA">Georgia</option> 
						<option value="HI">Hawaii</option> 
						<option value="ID">Idaho</option> 
						<option value="IL">Illinois</option> 
						<option value="IN">Indiana</option> 
						<option value="IA">Iowa</option> 
						<option value="KS">Kansas</option> 
						<option value="KY">Kentucky</option> 
						<option value="LA">Louisiana</option> 
						<option value="ME">Maine</option> 
						<option value="MD">Maryland</option> 
						<option value="MA">Massachusetts</option> 
						<option value="MI">Michigan</option> 
						<option value="MN">Minnesota</option> 
						<option value="MS">Mississippi</option> 
						<option value="MO">Missouri</option> 
						<option value="MT">Montana</option> 
						<option value="NE">Nebraska</option> 
						<option value="NV">Nevada</option> 
						<option value="NH">New Hampshire</option> 
						<option value="NJ">New Jersey</option> 
						<option value="NM">New Mexico</option> 
						<option value="NY">New York</option> 
						<option value="NC">North Carolina</option> 
						<option value="ND">North Dakota</option> 
						<option value="OH">Ohio</option> 
						<option value="OK">Oklahoma</option> 
						<option value="OR">Oregon</option> 
						<option value="PA">Pennsylvania</option> 
						<option value="RI">Rhode Island</option> 
						<option value="SC">South Carolina</option> 
						<option value="SD">South Dakota</option> 
						<option value="TN">Tennessee</option> 
						<option value="TX">Texas</option> 
						<option value="UT">Utah</option> 
						<option value="VT">Vermont</option> 
						<option value="VA">Virginia</option> 
						<option value="WA">Washington</option> 
						<option value="WV">West Virginia</option> 
						<option value="WI">Wisconsin</option> 
						<option value="WY">Wyoming</option>
					</select>
					<span class="legend-zip"><?echo $strZipCode;?></span>
					<input type="text" pattern="[0-9]*" name="zip" id="zip" placeholderText2="<?echo $strZipCode;?>" />

				</fieldset>
			</div>
						
			<div data-role="fieldcontain" id="fieldset-submit">
				<a id="btn-submit"><?=$loginText?></a>
			</div>

		</form>
	</div>
	<div id="login-footer">
		<img src="img/logos/login-northgate-logo.png" alt="Northgate Market" id="logo-northgate" />
		<img src="img/logos/login-unilever-logo.png" alt="Unilever" id="logo-unilever" />
		<span class="copyright"><?=$copyrightText?></span>		 
	</div>
</div>
<script type="text/javascript">var isAndroid = false;</script>
<?
if(isset($_REQUEST['android']) && $_REQUEST['android']=='true'){
?>
<script type="text/javascript">isAndroid = true;</script>
<script src="js/login-android.js?ver=<?=time();?>"></script>
<?
}
else{
?>
<script src="js/login.js?ver=<?=time();?>"></script>
<?}?>
<script src="js/summary.js?ver=<?=time();?>"></script>
<script src="js/videos.js?ver=<?=time();?>"></script>
<?include "include-analytics.php";?>
<?
$summaryPageUrl = "customersummary.php";
?>
<script type="text/javascript">var summaryPageUrl = "<?=$summaryPageUrl?>";</script>

	<link rel="stylesheet" href="app/style/add2home.css">
	<script type="text/javascript">
	var addToHomeConfig = { message:'<?=$locale?>' };
	</script>
	<script type="text/javascript" src="app/src/add2home.js" charset="utf-8"></script>

</body>
</html>

