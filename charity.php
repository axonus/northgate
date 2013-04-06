<? $language=isset($_REQUEST['language']) && !empty($_REQUEST['language']) ? $_REQUEST['language'] : ''; ?>
<?
	if ($language == "es") {
		$strPageTextIntro1 = "Esta Promoci"."&oacute;"."n tambi"."&eacute;"."n refleja los valores de Northgate y sus esfuerzos en seguir ayudando a la comunidad Hispana. Northgate esta comprometido en apoyar a las comunidades locales y proveer la m"."&aacute;"."s alta calidad y variedad de productos frescos.";
		$strPageTextIntro2 = "Como parte de esta promoci"."&oacute;"."n, los que atiendan al concierto de Reyli tendr"."&aacute;"."n la oportunidad de ayudar a dos organizaciones de Caridad- Olive Crest provee ayuda y servicios a ni"."&ntilde;"."os abusados y Red Eye, es una organizaci"."&oacute;"."n que promueve la ayuda a ni"."&ntilde;"."os por medio de eventos que recaudan alimento, y ropa para estos peque"."&ntilde;"."os.";
		$strPageTextMoreInfo = "Mas informaci"."&oacute;"."n";
		$strPageTextDonate = "Haz tu donaci"."&oacute;"."n ahora!";

		$strAltTextReynoso = "Fundacion Familia Gonz"."&aacute;"."lez Reynoso";
		$strPageTextReynoso = "La Fundacion Familia Gonz"."&aacute;"."lez Reynoso se cre"."&oacute;"." para continuar nuestra larga historia de retribuir a las comunidades a las que servimos. Cada a"."&ntilde;"."o nuestra fundaci"."&oacute;"."n proporciona alimentos, fondos y otros recursos a nuestras comunidades.";
		$strUrlLearnMoreReynoso = "http://www.northgatemarkets.com/es-mx/about-northgate/familia-gonzalez-reynoso-foundation/";
		$strUrlDonateNowReynoso = "https://www.northgatemarkets.com/es-mx/about-northgate/donation-requests/";
		
		$strAltTextOliveCrest = "Olive Crest";
		$strDescriptionOliveCrest = "Desde 1973, Olive Crest ha transformado la vida de m"."&aacute;"."s de 60,000 familias de ni"."&ntilde;"."os abusados y abandonados.";
		$strUrlLearnMoreOliveCrest = "http://www.olivecrest.org/site/PageServer?pagename=gen_abt_history_mission_values";
		$strUrlDonateNowOliveCrest = "https://secure2.convio.net/oc/site/Donation?ACTION=SHOW_DONATION_OPTIONS&CAMPAIGN_ID=3461";
		
		$strAltTextRedEye = "Red Eye";
		$strPageTextRedEye = "Utiliza tus talentos, creatividad y plataforma de vida para crear un impacto positivo en todos los dem"."&aacute;"."s.";
		$strUrlLearnMoreRedEye = "http://www.redeyeinc.org/about";
		$strUrlDonateNowRedEye = "https://anedot.com/campaigns/c71dc4dec8e/donations/new";
	}
	else{
		$strPageTextIntro1 = "The promotion also backs Northgate's commitment of giving back to the Hispanic community.  Northgate is committed to supporting local neighborhoods and provides high quality fresh foods and a wide assortment of grocery staples to local families.";
		$strPageTextIntro2 = "As a part of this promotion, attendees of the Reyli concert will have the opportunity to support two charitable organizations-- Olive Crest,  which provides support services to at-risk children and families and  Red Eye, which addresses the needs of the underserved with food and clothing drives and special empowerment events.";
		$strPageTextMoreInfo = "Learn More";
		$strPageTextDonate = "Donate Now";

		$strAltTextReynoso = "Familia Gonzalez Reynoso Foundation";
		$strPageTextReynoso = "The Familia Gonzalez Reynoso Foundation was established to continue our long history of giving back to the communities we serve. Each year our foundation provides food, funding and other resources to our neighbors.";
		$strUrlLearnMoreReynoso = "http://www.northgatemarkets.com/en-us/about-northgate/familia-gonzalez-reynoso-foundation/";
		$strUrlDonateNowReynoso = "https://www.northgatemarkets.com/en-us/about-northgate/donation-requests/";

		$strAltTextOliveCrest = "Olive Crest";
		$strDescriptionOliveCrest = "Since 1973, Olive Crest has transformed the lives of over 60,000 abused, neglected, and at risk children and their families";
		$strUrlLearnMoreOliveCrest = "http://www.olivecrest.org/site/PageServer?pagename=gen_abt_history_mission_values";
		$strUrlDonateNowOliveCrest = "https://secure2.convio.net/oc/site/Donation?ACTION=SHOW_DONATION_OPTIONS&CAMPAIGN_ID=3461";
		
		$strAltTextRedEye = "Red Eye";
		$strPageTextRedEye = "Utilize your talents, creativity, and life platform to make a positive impact on others";
		$strUrlLearnMoreRedEye = "http://www.redeyeinc.org/about";
		$strUrlDonateNowRedEye = "https://anedot.com/campaigns/c71dc4dec8e/donations/new";
	}
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		
    <link href="css/reset-min.css" media="screen" rel="stylesheet" type="text/css" />

	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.1/jquery.mobile-1.1.1.min.css" />
	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.1.1/jquery.mobile-1.1.1.min.js"></script>
	<? include "include-meta-apple.php"; ?>

    <link href="css/base.css?ver=1001" media="screen" rel="stylesheet" type="text/css" />
    <link href="css/charity.css?ver=1001" media="screen" rel="stylesheet" type="text/css" />
</head>
<body>
<div data-role="page" id="charityPage" class="page-content">
	<?
		include "include-android-nav.php";
		insertNav($language,'charity',false);
	?>
	<ul id="charity-info">
		<li class="first">
			<span class="charity-intro"><?=$strPageTextIntro1?></span>
			<span class="charity-intro"><?=$strPageTextIntro2?></span>
		</li>
		<li>
			<span class="charity-intro"><?=$strPageTextReynoso?></span>
			<img src="img/logos/charity-reynoso-logo.png" alt="<?=$strAltTextReynoso?>" />
			<a href="<?=$strUrlLearnMoreReynoso?>" target="charity"><?=$strPageTextMoreInfo?></a>
		</li>
		<li>
			<span class="charity-intro"><?=$strDescriptionOliveCrest?></span>
			<img src="img/logos/charity-olive-tree-logo.png" alt="<?=$strAltTextOliveCrest?>" />
			<a href="<?=$strUrlLearnMoreOliveCrest?>" target="charity"><?=$strPageTextMoreInfo?></a>
		</li>
		<li>
			<span class="charity-intro"><?=$strPageTextRedEye?></span>
			<img src="img/logos/charity-redeye-logo.png" alt="<?=$strAltTextRedEye?>" />
			<a href="<?=$strUrlLearnMoreRedEye?>" target="charity"><?=$strPageTextMoreInfo?></a>
		</li>
	</ul>
</div>
<?include "include-analytics.php";?>
</body>
</html>
