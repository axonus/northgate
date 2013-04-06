<?php
session_start();
include_once('config.php');
include_once('functions/functions.php');
include_once('functions/app_display.php');
include_once('functions/app_functions.php');
include_once('functions/login_functions.php');

//echo $_COOKIE["token"];
//echo '<br><br>';

//Start session if a token cookie is found
checkCookieSession();

//include_once('class/Facebook.class.php');
?>