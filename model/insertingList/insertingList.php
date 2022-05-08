<?php
	include_once(BASE_URL . 'model/connection/connection.php');
	
	//Hiermee wordt een lijst toegevoegd aan de database
	function insertingList($user, $name){
		$db = createConnection();
		$sql = "INSERT INTO lists(user, name) VALUES(:user, :name)";
		$query = $db->prepare($sql);
		$query->bindParam(':user', $user, PDO::PARAM_INT);
		$query->bindParam(':name', $name, PDO::PARAM_STR);
		$query->execute();

		$db = null;
	}
?>