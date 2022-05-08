<?php
	include_once(BASE_URL . 'model/connection/connection.php');
	
	//Hiermee wordt een taak uit de database verwijderd
	function deletingTask($id){
		$db = createConnection();
		$sql = "DELETE FROM tasks WHERE id = :id";
		$query = $db->prepare($sql);
		$query->bindParam(':id', $id, PDO::PARAM_INT);
		$query->execute();
		$db = null;
	}
?>