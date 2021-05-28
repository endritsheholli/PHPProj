<?php
$currency = '$'; 

$db_username = 'root';
$db_password = '';
$db_name = 'somstore';
$db_host = 'localhost';
$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);


$PayPalMode 			= 'sandbox'; 
$PayPalApiUsername 		= 'paypaluser@somemail.com'; 
$PayPalApiPassword 		= '190798792445'; 
$PayPalApiSignature 	= '797987709709709oipuiou98Eq.Gufar'; 
$PayPalCurrencyCode 	= 'USD'; 
$PayPalReturnURL 		= 'http://localhost/shopping-cart/paypal-express-checkout/process.php'; 
$PayPalCancelURL 		= 'http://localhost/shopping-cart/paypal-express-checkout/cancel_url.html'; 

?>