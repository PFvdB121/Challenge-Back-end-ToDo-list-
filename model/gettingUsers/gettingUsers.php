<?php
	include_once(BASE_URL . 'model/connection/connection.php');
	
	//Hiermee worden alle gebruikers opgehaald uit de database
	function gettingUsers(){
		$db = createConnection();
		$sql = "SELECT * FROM users";
		$query = $db->prepare($sql);
		$query->execute();

		$db = null;

		return $query->fetchAll();
	}
?>