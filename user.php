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
	$connection = new Mongo();
	$db = $connection->allusers->list;
	$result = $db->find(array('ID' => $userID));

	foreach($result as $ob){
		$doc = $ob["number"];
	}
	return $doc; 
}
function setNumber($userID, $number) {
	$connection = new Mongo();
	$db = $connection->allusers->list;
	$criteria = array('$set' => array("number"=>$number));

	$db->update(array("ID" => $userID), $criteria);

}

function getUserIDbyPhone($phoneNumber) {
	$connection = new Mongo();
	$db = $connection->allusers->list;
	$result = $db->find(array('number' => $phoneNumber));

	$doc ="";

	foreach($result as $ob){
		$doc = $ob["ID"];
	}	
	return $doc;
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


function getAllUserIDs() {

	return $userID_arr;
}
 
?>
