<?php

include("config.php");
include("user.php");
include("sigother.php");
include("notify.php");

require "Services/Twilio.php";

$account_sid = $twilio_sid;
$auth_token = $twilio_token;

$twilNumber = $twilio_number;

$client = new Services_Twilio($account_sid, $auth_token);


$userIDs = getAllUserIDs();

$peoples = array();

foreach($userIDs as $userID) {
	$sigOther = getActiveSigOther($userID);

	$anniversary = getAnniversary($sigID);

	if(isMonthAnniversary($date_arr)) {
		array_push($peoples, $userID);
	}
}

foreach ($peoples as $people) {
	$sigID = getActiveSigOther($people);
	$number = getNumber($people);
	$name = getName($people);


	$sms = $client->account->sms_messages->create(
		$twilNumber,
		$number,
		"Hey $name, it's your anniversary! Go do something that won't get you kicked out of the bed"
	);

	echo "Sent message to $people";
}
?>
