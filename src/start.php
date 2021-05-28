<?php

$_SESSION['user_id'] = 1;

$db = new PDO ('mysql:host=localhost;dbname=somstore','root','');

$user = $db->prepare("SELECT * FROM customer WHERE id =user_id");
$user->execute(['user_id'=>$_SESSION['user_id']]);
$user = $user->fetchObject();
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;


require __DIR__ . '/../vendor/autoload.php';

$api = new ApiContext(
	new OAuthTokenCredential(
		'AczhsETroNUr_ZBvzSYbvMbzIAKQYjg9hMaYiKCfgikmf0I4hqP1WBgVl8YYoJBLaHBnpyzRbJWny-rL',
		'EMXIzfHZJ9VRRYRBOUF6IWaHva3-mK4bb5QYjEwYyAR_6V9bZoXcP5WyV0Tn6kgpKVdfmcj_gGe2zvhG')
	);

$api->setConfig([
	'mode'=> 'sandbox',
	'http.ConnectionTimeOut' => 30,
	'log.LogEnabled' => false,
	'log.fileName' => '',
	'log.LogLevel' => 'FINE',
	'validation.level' => 'log'
]);
?>