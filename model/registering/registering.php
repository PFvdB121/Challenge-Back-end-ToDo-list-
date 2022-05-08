<?php
	include_once BASE_URL . 'model/connection/connection.php';

	//Hiermee worden gebruikers geregistreerd in de database
	function registering($firstName, $insertion, $lastName, $email, $password){
		$db = createConnection();
		$sql = "INSERT INTO users(`first name`, `insertion`, `last name`, `email`, `password`, `role`) VALUES (:firstName, :insertion, :lastName, :email, :password, 'standard')";
		$query = $db->prepare($sql);
		$query->bindParam(':firstName', $firstName, PDO::PARAM_STR);
		$query->bindParam(':insertion', $insertion, PDO::PARAM_STR);
		$query->bindParam(':lastName', $lastName, PDO::PARAM_STR);
		$query->bindParam(':email', $email, PDO::PARAM_STR);
		$query->bindParam(':password', $password, PDO::PARAM_STR);
		$query->execute();
		$db = null;
	}
?>