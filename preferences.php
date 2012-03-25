<!DOCTYPE html>
<html>
<body>

<?php

	include 'debug.php';

	$like = $_POST['like'];
	$dislike = $_POST['dislike'];

	//Add to like DB
	if(isset($like)) {
		$likes = delimit_input($like);

	}
	

	//Add to dislike DB
	if(isset($dislike)) {
		$dislikes = delimit_input($dislike);

	}

	function delimit_input($items) {
		return explode(',', $items);
	}

?>
</body>
</html>
