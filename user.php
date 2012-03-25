<?php

$connection = new Mongo();

public function createUser($userID, $userName) {
	$db = $connection->allusers->list;

	$db->insert(array("name"=> $userName,"ID" => $userID);
}


public function getName($userID) {
	$db = $connection->allusers->list;
	$result = $db->find(array('ID' => $userID));

	return $result['name'];
}
public function getNumber($userID) {
	$db = $connection->allusers->list;
	$result = $db->find(array('ID' => $userID));

	return $result['number'];
}

public function setNumber($userID, $number) {

}

public function getUserIDbyPhone($phoneNumber) {
	$db = $connection->allusers->list;
	$result = $db->find(array('number' => $phoneNumber));
	
	return $result['ID'];
}

public function getActiveSigOther($userID) {
}

public function getAllSigOthers($userID) {
	/* This should return a list of sigIDs.
	 * Sorted chronologically from recent to past
	 */
}

public function removeActiveSigOther($userID) {
}


?>
