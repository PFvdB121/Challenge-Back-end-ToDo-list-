<?php
	include_once(BASE_URL . 'model/connection/connection.php');
	
	function updatingTask($id, $task, $description, $duration, $status){
		$db = createConnection();
		$sql = "UPDATE tasks SET task=:task, description=:description, duration=:duration, status=:status WHERE id=:id";
		$query = $db->prepare($sql);
		$query->bindParam(':id', $id, PDO::PARAM_INT);
		$query->bindParam(':task', $task, PDO::PARAM_STR);
		$query->bindParam(':description', $description, PDO::PARAM_STR);
		$query->bindParam(':duration', $duration, PDO::PARAM_INT);
		$query->bindParam(':status', $status, PDO::PARAM_STR);
		$query->execute();
		$db = null;
	}
?>