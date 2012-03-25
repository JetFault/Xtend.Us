<?php


function deleteUser


function createUser($userID, $userName) {

	$connection = new Mongo();

	$db = $connection->allusers->list;

	$db->insert(array("name"=> $userName,"ID" => $userID));
}

function getName($userID) {

	$connection = new Mongo();

	$db = $connection->allusers->list;
	echo $userID;
	$result = $db->find();
/*	
	foreach ($result as $ob){
		echo $ob["name"];
	}
 */
	return $result["name"];
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
