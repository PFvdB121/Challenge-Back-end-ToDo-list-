<?php
	include_once(BASE_URL . 'model/connection/connection.php');
	
	function gettingUserById($id){
		$db = createConnection();
		$sql = "SELECT * FROM users WHERE id = :id";
		$query = $db->prepare($sql);
		$query->bindParam(':id', $id, PDO::PARAM_INT);
		$query->execute();
		$db = null;

		return $query->fetch();
	}
?>