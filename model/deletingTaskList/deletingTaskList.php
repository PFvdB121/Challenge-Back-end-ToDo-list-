<?php
	include_once(BASE_URL . 'model/connection/connection.php');
	
	//Hiermee worden taken die behoren bij een bepaalde lijst verwijderd uit de database
	function deletingTaskList($list){
		$db = createConnection();
		$sql = "DELETE FROM tasks WHERE listID = :list";
		$query = $db->prepare($sql);
		$query->bindParam(':list', $list, PDO::PARAM_INT);
		$query->execute();
		$db = null;
	}
?>