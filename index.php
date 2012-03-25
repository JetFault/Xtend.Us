<!DOCTYPE html>

<?php

session_start();

if( isset($_SESSION)) {
	echo FUCK THIS;
}
$userID = $_SESSION['userid'];

if(isset($userID)) {
	header( 'Location: http://ruslug.rutgers.edu/~relext/main.php');
	return;
}

?>

<html>
	<link rel="stylesheet" href="../css/style.css">

	<body>
		<form action="main.php" method="post">
			<ul class="forms">
				<li>
				<label for="">Phone Number:</label>
				<input name="phone" id="phone" size="40">
				</li>
				<li>
				<label for="">Password:</label>
				<input name="pass" id="pass" type="password" size="40">
				</li>
				<li>
				<input type="submit"/>
				</li>
			</ul>
		</form>

	<br><br>
<!--
		<form action="preferences.php" method="post">
			<input name="like" type="text" id="like" size="50">
			</br>
			<input name="dislike" type="text" id="dislike" size="50">
			</br>
			<input type="submit"/>
		</form>

-->

	</body>
</html>
