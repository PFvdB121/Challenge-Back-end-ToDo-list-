<?php
	include_once(BASE_URL . 'model/connection/connection.php');
	
	function gettingUsers(){
		$db = createConnection();
		$sql = "SELECT * FROM users";
		$query = $db->prepare($sql);
		$query->execute();

		$db = null;

		return $query->fetchAll();
	}
?>