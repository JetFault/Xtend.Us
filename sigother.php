<?php

$connection = new Mongo();

#userID is the ID of master of relationship
#sigID  is the ID of significant other

public function createSigOther($userID, $sigName) {
	/* This should create a new significant other entity.
	 * Add that significant other to the list of significant others.
	 * 
	 * Only allow one active sig other.
	 *
	 * return sigID, mongo gives unique ids
	 * */
}

public function addAnniversary($sigID, $month, $day, $year) {
}

public function getAnniversary() {
	/* Should return array
	 * day=>
	 * month=>
	 * year=>
	 */

	$month=;
	$day=;
	$year=;

	$array = array(
		"month" => $month,
		"day" => $day,
		"year" => $year,
	);
	return $array;
}

public function addLike($userID,$sigusrID, $like) {
	$db = $connection->$userID;
	$collection = $db->$sigusrID;
	$doc = array("type" => "like", "thing"=>$like);
	$collection->insert($doc);
}

public function addDislike($userID,$sigusrID, $dislike) {
	$db = $connection->$userID;
	$collection = $db->$sigusrID;
	$doc = array("type"=> "dislike", "thing" => $dislike);
	$collection->insert($doc);
}

public function getLikes($sigID) {
	$db = $connection->$userID;
	$collection = $db->$sigID;
	$allLikes = $collection->find(array('type'=> 'like'));
	
	return $allLikes;
}

public function getDislikes($sigID) {
	$collection = $connection->$userID->$sigID;
	$allDislikes = $collection->find(array('type' => 'dislike'));
	
	return $allDislikes;
}

?>
