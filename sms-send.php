<?php

	require "Services/Twilio.php";
	
	$AccountSid = "AC70f21016166c4ef6adaaf3e6ed90474f";
	$AuthToken = "0485d72a438bfe7ce7585a6521714e63";

	$twilNumber = "+14155992671";

	$client = new Services_Twilio($AccountSid, $AuthToken);

	$people = array(
//		"+15513339452" => "Jerry Reptak",
		"+12019522733" => "Katina Ruzinov"
	);

	foreach ($people as $number => $name) {

		$sms = $client->account->sms_messages->create(
			$twilNumber,
			$number,
			"2330-6148 Hey $name, you are super hot!"
		);

		echo "Sent message to $name";
	}
?>
