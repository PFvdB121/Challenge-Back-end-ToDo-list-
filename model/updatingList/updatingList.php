<?php
	include_once(BASE_URL . 'model/connection/connection.php');
	
	//Hiermee wordt een lijst geüpdate in de database
	function updatingList($name, $id){
		$db = createConnection();
		$sql = "UPDATE lists SET name=:name WHERE id = :id";
		$query = $db->prepare($sql);
		$query->bindParam(':name', $name, PDO::PARAM_STR);
		$query->bindParam(':id', $id, PDO::PARAM_INT);
		$query->execute();

		$db = null;
	}
?>