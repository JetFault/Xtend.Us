<?php


function deleteUser($userID){
	$connection = new Mongo();
	$db = $connection->allusers->list;

	$criteria = array('ID' => $userID);

	$db->remove($criteria);
}


function createUser($userID, $userName) {

	$connection = new Mongo();

	$db = $connection->allusers->list;

	$db->insert(array("name"=> $userName,"ID" => $userID));
}

function getName($userID) {

	$connection = new Mongo();

	$db = $connection->allusers->list;
	$criteria = array('ID' => $userID);
	$result = $db->find($criteria);
	
	foreach ($result as $ob){
		$doc = $ob["name"];
	}
	return $doc;
}
function getNumber($userID) {
	$db = $connection->allusers->list;
	$result = $db->find(array('ID' => $userID));

	return $result['number'];
}
function setNumber($userID, $number) {

}

function getUserIDbyPhone($phoneNumber) {
	$db = $connection->allusers->list;
	$result = $db->find(array('number' => $phoneNumber));
	
	return $result['ID'];
}

function getActiveSigOther($userID) {
}

function getAllSigOthers($userID) {
	/* This should return a list of sigIDs.
	 * Sorted chronologically from recent to past
 */

}

function removeActiveSigOther($userID) {
}

 
?>
