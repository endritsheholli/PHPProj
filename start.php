<?php

session_start();

$_SESSION['user_id'] = 1;

$db = new PDO ('mysql:host=localhost;dbname=somstore','root','');

$user = "
	SELECT * FROM customer 
	WHERE id = :user_id
";

$user->execute(['user_id'=>$_SESSION['user_id']]);

$user = $user->fetchObject();

?>