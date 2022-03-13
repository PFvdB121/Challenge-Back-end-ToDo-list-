<?php
	include_once(BASE_URL . 'model/connection/connection.php');
	
	function gettingLists($user){
		$db = createConnection();
		$sql = "SELECT * FROM lists WHERE user = :user";
		$query = $db->prepare($sql);
		$query->bindParam(':user', $user, PDO::PARAM_INT);
		$query->execute();

		$db = null;

		return $query->fetchAll();
	}
?>