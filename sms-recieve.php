<?php
	
include("config.php");
include("user.php");
include("sigother.php");

	require("Services/Twilio.php");

	$account_sid = $twilio_sid;
	$auth_token = $twilio_token;

	$text = $_POST['Body'];
	$from = $_POST['From'];

	session_start();

	//Get Session


	//userID session doesn't exist
	if(!isset($_SESSION['userid']) || !strlen($_SESSION['userid'])) {
		$useridDB = getuserIDbyPhone($from);

		//New user, ask them for name
		if(!strlen($useridDB)) {
			$_SESSION['userid'] = "newuser";
			$sms_msg = "Hi! Looks like you're new to Relationship Extender, the {Boy,Girl}friend Management System of the future.
				Please tell us your name so we can get you to stop sleeping on the couch ;)";
			respond($sms_msg);
			return;
		}


		$_SESSION['userid'] = $useridDB;
	}

	$userID = $_SESSION['userid'];

	//User responded with a name, add them to DB
	if(strcmp($userID, "newuser") == 0) {
		$uniqID = uniqid("usr_");
		createUser($uniqID, $text);
		setNumber($uniqID, $from);
		$_SESSION['userid'] = $uniqID;

		$sms_msg = print_help();
		respond($sms_msg);
		return;
	}

	$msg_arr = explode(' ', strtolower(trim($text)));
	$cmd = $msg_arr[0];

	switch($cmd) {
	case "help":
		$sms_msg = print_help();
		break;
	case "date":
		$sms_msg = add_sig_other($msg_arr[1]);
		break;
	case "breakup":
		$sms_msg = del_sig_other();
		break;
	case "like":
		$sms_msg = add_like(array_shift($msg_arr));
		break;
	case "hate":
		$sms_msg = add_hate(array_shift($msg_arr));
		break;
	default:
		$sms_msg = "Not a command! Send a text with \"help\" for more info!";
	}

	if(!isset($sms_msg) || strcmp($sms_msg, "") == 0) {
		return;
	}
	else {
		respond($sms_msg);
		return;
	}


	function print_help() {
		$mesg = "date <name>: Add a significant other\r\nbreakup: Breakup\r\nlike <foo>,...: Add a like\r\nhate <bar>,...: Add a hate";
		return $mesg;
	}

	function add_sig_other($sig_other) {
		$mesg = '';

		//Check if another significant other exists
		if(getActiveSigOther($userID)) {
			$mesg = "Sorry we don't support polygamy :(\r\nIt's totally NOT because we were too lazy to code this ;)";
			return $mesg;
		}

		//Add significant other. All other operations would use this significant other.
		createSigOther($userID, $sig_other);

		// Maybe add dry spell time [FEATURE]
		$mesg = "Yay!! I'm proud of you! :) Tell me more about them! What do they like and hate?!";
		return $mesg;
	}

	function del_sig_other($sig_other) {
		//Check if significant other exists
		if(!getActiveSigOther($userID)) { //Does not exist
			$mesg = "You need to be dating someone before you breakup with them! Plus with me you won't be doing this!";
			return $mesg;
		}
		
		removeActiveSigOther($userID);

		$mesg = "Awww, sorry :( You must have not been using/listening to me much!";
		return $mesg;
	}

	function add_like($arr_likes) {
		//Check if significant other exists

		$sigID = getActiveSigOther($userID);

		if(!$sigID) { //Does not exist
			$mesg = "You need to be in a relationship (right hand doesn't count)!";
			return $mesg;
		}
		
		//Add to like DB for current sig other

		foreach($arr_likes as $like) {
			addLike($userID,$sigID,$like);
		}

		$mesg = "";
		return $mesg;
	}

	function add_hate($arr_hates) {
		$sigID = getActiveSigOther($userID);

		if(!$sigID) { //Does not exist
			$mesg = "You need to be in a relationship (right hand doesn't count)!";
			return $mesg;
		}
		
		//Add to dislike DB for current sig other
		foreach($arr_hates as $hate) {
			addDislike($userID,$sigID,$hate);
		}

		$mesg = "";
		return $mesg;
	}


	function respond($sms_mesg) {
		header("content-type: text/xml");
		echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
		$sms_twiml = '<Sms>' . $sms_mesg . '</Sms>';
		echo '<Response>';
		echo $sms_twiml;
		echo '</Response>';
	}

?>

