<?php	
	include_once(BASE_URL . 'model/connection/connection.php');
	
	//Hiermee wordt een taak opgehaald uit de database
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