<!DOCTYPE html>

<?php
session_start();

$userID = $_SESSION['userid'];

$phone = $_POST['phone'];
$pass = $_POST['pass'];

if(isset($phone) && isset($pass)) {
	$_SESSION['userid'] = getUserIDbyPhone($phone);
}

if(!isset($userID)) {
	header( 'Location: http://ruslug.rutgers.edu/~relext/');
	return;
}



?>

<html>
<body>


</body
</html>
