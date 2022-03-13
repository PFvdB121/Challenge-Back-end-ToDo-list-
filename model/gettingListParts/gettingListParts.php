<?php
	include_once(BASE_URL . 'model/connection/connection.php');
	
	function gettingListParts($list){
		$db = createConnection();
		$sql = "SELECT * FROM tasks WHERE listID = :list";
		$query = $db->prepare($sql);
		$query->bindParam(':list', $list, PDO::PARAM_INT);
		$query->execute();

		$db = null;

		return $query->fetchAll();
	}
?>