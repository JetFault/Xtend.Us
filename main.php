<!DOCTYPE html>

<?php

include("user.php");

session_start();


if(!isset($_SESSION['userid'])) {
	if(!isset($_POST['phone']) || !isset($_POST['pass'])) {
		header('Location: http://ruslug.rutgers.edu/~relext/');
		return;
	}
	
	$phone = $_POST['phone'];

	$_SESSION['userid'] = getUserIDbyPhone($phone);
}


if(!isset($_SESSION['userid']) || strcmp($_SESSION['userid'], "") == 0) {
	header( 'Location: http://ruslug.rutgers.edu/~relext/');
	return;
}

$userID = $_SESSION['userid'];


?>

<html>
<body>



</body
</html>
