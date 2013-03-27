<? $mobilenumber=isset($_REQUEST['mobilenumber']) && !empty($_REQUEST['mobilenumber']) ? $_REQUEST['mobilenumber'] : ''; ?>
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
	
    <link href="css/base.css?ver=1001" media="screen" rel="stylesheet" type="text/css" />
    <link href="css/login.css?ver=1001" media="screen" rel="stylesheet" type="text/css" />
    <link href="css/summary.css?ver=1001" media="screen" rel="stylesheet" type="text/css" />
	<style>
	</style>
</head>
<body>
<div data-role="page" id="loginPage" class="page-content no-thumb">
	<div data-role="content">
		<div data-role="content" class="content-main" id="content-header">
			<div class="col col1">
				<h2>Con Musica Se Vive Mejor</h2>
				<!--<p>This is description text that can go right here under</p>-->
			</div>
			<div class="col col2">
				<div class="thumbnail thumbnail-player"><img src="img/fpo/thumbnail1.png" alt="" /></div>
			</div>
			<div id="promo-container">
			<iframe id="youtube-promo" class="youtube-player" type="text/html" width="290" src="http://www.youtube.com/embed/R0YmTgruXws?controls=0&autoplay=0&allowfullscreen=1&showinfo=0&showsearch=0&modestbranding=1" frameborder="0"></iframe>
			</div>
		</div>
		<form id="form-login">
			<div data-role="fieldcontain" id="error-messages">
				<span id="error-global">Please complete the form below</span>
				<span id="error-phone-mismatch">Your phone numbers must match</span>
			</div>
			<div data-role="fieldcontain">
				<input type="tel" name="mobilenumber" id="mobilenumber" placeholder="Phone Number" title="Your Phone Number is Required!" value="<?echo $mobilenumber;?>" pattern="\d{10}" maxlength="10" required />
			</div>
			<div data-role="fieldcontain">
				<input type="tel" name="mobilenumber2" id="mobilenumber2" placeholder="Repeat Phone Number" title="Your Phone Number is Required!" value="<?echo $mobilenumber;?>" pattern="\d{10}" maxlength="10" required />
			</div>
			<div data-role="fieldcontain" id="fieldset-phone-type" class="fieldset-radio-checkbox">
				<fieldset data-role="controlgroup">
					<legend>This phone number is a:</legend>
					<input type="radio" name="phone-type-1" id="phone-type-1" value="mobile" checked="checked" />
					<label for="phone-type-1">Cell Phone I can receive texts on</label>
		
					<input type="radio" name="phone-type-1" id="phone-type-2" value="home"  />
					<label for="phone-type-2">Home Phone I can't receive texts on</label>
				</fieldset>
			</div>
			
			<div data-role="fieldcontain" id="fieldset-home" class="fieldset-radio-checkbox">
				<fieldset data-role="controlgroup">
					<input type="checkbox" name="address-type" id="address-type" />
					<label for="address-type">Enter a US mailing address instead of an email.</label>
				</fieldset>
				<fieldset data-role="controlgroup" id="address-email">
					<input type="text" name="email" id="email" placeholder="Email Address" title="The email address you entered is not valid." />
				</fieldset>
				<fieldset data-role="controlgroup" id="address-mailing">
					<input type="text" name="address" id="address" placeholder="Street Address" />
					<input type="text" name="city" id="city" placeholder="City"  autocorrect="off" autocapitalize="off" autocomplete="off" />
					<select name="state" id="state" > 
						<option value="" selected="selected">State</option> 
						<option value="AL">Alabama</option> 
						<option value="AK">Alaska</option> 
						<option value="AZ">Arizona</option> 
						<option value="AR">Arkansas</option> 
						<option value="CA">California</option> 
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
					<input type="text" pattern="[0-9]*" name="zip" id="zip" placeholder="ZIP Code" />

				</fieldset>
			</div>
						
			<div data-role="fieldcontain" id="fieldset-submit">
				<a id="btn-submit">Login</a>
			</div>

		</form>
	</div>
</div>


<script src="js/login.js?ver=1001"></script>
<script src="js/summary.js?ver=1001"></script>
</body>
</html>

