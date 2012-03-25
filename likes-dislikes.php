<!DOCTYPE html>
<html>

<?php

	$like = $_POST['like'];
	$dislike = $_POST['dislike'];

	//Add to like DB
	if(isset($like) {
		$likes = delimit_input($like);
		var_dump($likes);

	}
	

	//Add to dislike DB
	if(isset($dislike) {
		$dislikes = delimit_input($dislike);
		var_dump($dislikes);
	}

	function delimit_input($items) {
		return explode(' ,', $items);
	}

?>

</html>
