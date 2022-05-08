<?php 
	include_once(BASE_URL . 'model/connection/connection.php');
	
	//Alle taken van de bijbehorende lijst worden hiermee opgehaald uit de database, gefilterd op status en op volgorde geplaatst van duur
	function gettingListPartsFO($list, $filter, $order){
		$db = createConnection();
		$sql = "SELECT * FROM tasks WHERE listID = :list AND status = :filter ORDER BY duration " . $order;
		$query = $db->prepare($sql);
		$query->bindParam(':list', $list, PDO::PARAM_INT);
		$query->bindParam(':filter', $filter, PDO::PARAM_STR);
		$query->execute();

		$db = null;

		return $query->fetchAll();
	}
?>