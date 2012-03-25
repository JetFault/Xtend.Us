<!DOCTYPE html>

<?php

include("user.php");

session_start();


$phone = $_POST['phone'];
$pass = $_POST['pass'];

if(isset($phone) && isset($pass)) {
	$_SESSION['userid'] = getUserIDbyPhone($phone);
}


if(!isset($_SESSION['userid'])) {
	header( 'Location: http://ruslug.rutgers.edu/~relext/');
	return;
}

$userID = $_SESSION['userid'];


?>

<html>
<body>


</body
</html>
