<?php
	include_once(BASE_URL . 'model/connection/connection.php');
	
	function deletingList($id){
		$db = createConnection();
		$sql = "DELETE FROM lists WHERE id = :id";
		$query = $db->prepare($sql);
		$query->bindParam(':id', $id, PDO::PARAM_INT);
		$query->execute();
		$db = null;
	}
?>