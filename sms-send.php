<?php

	require "Services/Twilio.php";
	
	$AccountSid = "";
	$AuthToken = "";

	$twilNumber = "";
	
	$prepend = "";

	$client = new Services_Twilio($AccountSid, $AuthToken);

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
