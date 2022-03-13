<?php 
	include_once(BASE_URL . 'model/connection/connection.php');

	function insertingTask($task, $list){
		$db = createConnection();
		$sql = "INSERT INTO tasks(`task`, `duration`, `status`, `listID`) VALUES(:task, 0, 'nog bezig', :list)";
		$query = $db->prepare($sql);
		$query->bindParam(':task', $task, PDO::PARAM_STR);
		$query->bindParam(':list', $list, PDO::PARAM_INT);
		$query->execute();
		$db = null;
	}
?>