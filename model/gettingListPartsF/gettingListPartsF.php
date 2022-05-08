<?php
	include_once(BASE_URL . 'model/connection/connection.php');
	
	//Alle taken van de bijbehorende lijst worden hiermee opgehaald uit de database en gefilterd gebaseerd op status
	function gettingListPartsF($list, $filter){
		$db = createConnection();
		$sql = "SELECT * FROM tasks WHERE listID = :list AND status = :filter";
		$query = $db->prepare($sql);
		$query->bindParam(':list', $list, PDO::PARAM_INT);
		$query->bindParam(':filter', $filter, PDO::PARAM_STR);
		$query->execute();

		$db = null;

		return $query->fetchAll();
	}
?>