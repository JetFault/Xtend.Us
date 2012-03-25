<?php

#userID is the ID of master of relationship
#sigID  is the ID of significant other

function createSigOther($userID, $sigName) {
	/* This should create a new significant other entity.
	 * Add that significant other to the list of significant others.
	 * 
	 * Only allow one active sig other.
	 *
	 * return sigID, mongo gives unique ids
	 * */
}

function addAnniversary($usrID, $sigID, $month, $day, $year) {
	$connection = new Mongo();
	$collection = $connection->$usrID->$sigID;
	$doc = array("type" => "anniversary","month" => $month,"day" => $day,"year" => $year);
	$collection->insert($doc);

}

function getAnniversary($usrID, $sigID) {
	/* Should return array
	 * day=>
	 * month=>
	 * year=>
	 */
	$connection = new Mongo();
	$collection = $connection->$usrID->$sigID;
	$criteria = array('type' => 'anniversary');
	$doc = $collection->find($criteria);
/*	
	foreach($doc as $obj){
		$month = $obj["month"];
		$day = $obj["day"];
		$year = $obj["year"];
	}

	$newarr = array("month" => $month, "day" => $day, "year" => $year);	
 */
/*
	$month=;
	$day=;
	$year=;

	$array = array(
		"month" => $month,
		"day" => $day,
		"year" => $year,
	);
	 */
	return $doc;
 
}

function addLike($userID,$sigusrID, $like) {
	$connection = new Mongo();
	$db = $connection->$userID;
	$collection = $db->$sigusrID;
	$doc = array("type" => "like", "thing"=>$like);
	$collection->insert($doc);
}

function addDislike($userID,$sigusrID, $dislike) {

	$connection = new Mongo();
	$db = $connection->$userID;
	$collection = $db->$sigusrID;
	$doc = array("type"=> "dislike", "thing" => $dislike);
	$collection->insert($doc);
}
function deleteThings($userID,$sigusrID, $thing){
	$connection = new Mongo();
	$db = $connection->$userID->$sigusrID;
	$criteria = array('thing' => $thing);

	$db->remove($criteria);
}

function getLikes($usrID,$sigID) {
	$connection = new Mongo();
	$db = $connection->$usrID;
	$collection = $db->$sigID;
	$allLikes = $collection->find(array('type'=> 'like'));
	
	return $allLikes;
}

function getDislikes($userID, $sigID) {
	$connection = new Mongo();
	$collection = $connection->$userID->$sigID;
	$allDislikes = $collection->find(array('type' => 'dislike'));
	
	return $allDislikes;
}

?>
