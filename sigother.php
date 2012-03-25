<?php

$connection = new Mongo();

		public function addLike($userID, $like) {
			$db = $connection->$userID;
			$collection = $db->likes;
			$doc = array($like);
			$collection->insert($doc);
		}

		public function addDislike($userID, $dislike) {
			$db = $connection->$userID;
			$collection = $db->dislikes;
			$doc = array($dislike);
			$collection->insert($doc);
		}

		public function getLikes($userID) {
			return $this->likes;
		}
		
		public function getDislikes($userID) {
			return $this->dislikes;
		}

?>
