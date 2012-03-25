<?php

	include("config.php");

	require "Services/Twilio.php";
	
	$account_sid = $twilio_sid;
	$auth_token = $twilio_token;

	$twilNumber = $twilio_number;
	
	$prepend = "";

	$client = new Services_Twilio($account_sid, $auth_token);

	$people = array(
//		"+3333333333" => "blah",
	);

	foreach ($people as $number => $name) {

		$sms = $client->account->sms_messages->create(
			$twilNumber,
			$number,
			"$prepend Hey $name, you are super hot!"
		);

		echo "Sent message to $name";
	}
?>
