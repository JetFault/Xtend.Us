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

function getAnniversary($sigID) {
	/* Should return array
	 * day=>
	 * month=>
	 * year=>
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
	return $array;
 */
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
function deleteThings($userID,
function getLikes($usrID,$sigID) {
	$connection = new Mongo();
	$db = $connection->$usrID;
	$collection = $db->$sigID;
	$allLikes = $collection->find(array('type'=> 'like'));
	
	return $allLikes;
}

function getDislikes($sigID) {
	$connection = new Mongo();
	$collection = $connection->$userID->$sigID;
	$allDislikes = $collection->find(array('type' => 'dislike'));
	
	return $allDislikes;
}

?>
