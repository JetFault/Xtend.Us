<?php

$connection = new Mongo();

#userID is the ID of master of relationship
#sigID  is the ID of significant other

public function createSigOther($userID, $sigName) {
	/* This should create a new significant other entity.
	 * Add that significant other to the list of significant others.
	 * 
	 * Only allow one active sig other.
	 * */
}

public function addAnniversary($sigID, $month, $day, $year) {
}

public function addLike($userID, $like) {
	$db = $connection->$userID;
	$collection = $db->likes;
	$doc = array($like);
	$collection->insert($doc);
}

public function addDislike($userID, $dislike) {
	$db = $connection->$userID;
	$collection = $db->dislikes;
	$doc = array($dislike);
	$collection->insert($doc);
}

public function getLikes($sigID) {
}

public function getDislikes($sigID) {
}

?>
