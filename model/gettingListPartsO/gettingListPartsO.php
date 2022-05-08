<?php
	include_once(BASE_URL . 'model/connection/connection.php');

	//Alle taken van de bijbehorende lijst worden hiermee opgehaald uit de database en op volgorde geplaatst van duur
	function gettingListPartsO($list, $order){
		$db = createConnection();
		$sql = "SELECT * FROM tasks WHERE listID = :list ORDER BY duration " . $order;
		$query = $db->prepare($sql);
		$query->bindParam(':list', $list, PDO::PARAM_INT);
		$query->execute();

		$db = null;

		return $query->fetchAll();
	}
?>