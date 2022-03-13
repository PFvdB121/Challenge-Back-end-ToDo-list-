<?php
	include_once(BASE_URL . 'model/connection/connection.php');
	
	function gettingNonAdmins(){
		$db = createConnection();
		$sql = "SELECT * FROM users WHERE role = 'standard'";
		$query = $db->prepare($sql);
		$query->execute();

		$db = null;
		
		return $query->fetchAll();
	}
?>