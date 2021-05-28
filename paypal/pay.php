<html>
<head>
	<meta http-equiv="refresh" content="0; url=http://localhost:8080/buki17/index.php" />
</head>
<body>

<form action="http://localhost:8080/buki17/index.php">
    <input type="submit" value="Payment Successful! Go back Home" />
</form>
</body>

<?php

use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;

require '../src/start.php';

if(isset($_GET['approved'])){

	$approved = $_GET['approved'] === 'true';

	if($approved) {


		$payerId = $_GET['PayerID'];

		$paymentId = $db->prepare("
				SELECT payment_id FROM transactions_paypal WHERE hash = :hash
			");

		$paymentId->execute([

				'hash' => $_SESSION['paypal_hash']

			]);

		$paymentId = $paymentId->fetchObject()->payment_id;

		$payment = Payment::get($paymentId, $api);

		$execution = new PaymentExecution();
		$execution->setPayerId($payerId);

		$payment->execute($execution, $api);

		$updateTransaction = $db->prepare("

				UPDATE transactions_paypal SET complete = 1 WHERE payment_id=:payment_id

			");

		$updateTransaction->execute([
			'payment_id' => $paymentId
			]);

		unset($_SESSION['paypal_hash']);

		header('Location: ../index.php');


	} 
	else 
		header('location http://localhost:8080/buki17/');

}

?>