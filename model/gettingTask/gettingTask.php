<?php	
	include_once(BASE_URL . 'model/connection/connection.php');
	
	function gettingTask($id){
		$db = createConnection();
		$sql = "SELECT * FROM tasks WHERE id = :id";
		$query = $db->prepare($sql);
		$query->bindParam(':id', $id, PDO::PARAM_INT);
		$query->execute();
		$db = null;

		return $query->fetch();
	}
?>