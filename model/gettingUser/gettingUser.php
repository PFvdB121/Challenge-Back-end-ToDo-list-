<?php
	include_once BASE_URL . "model/connection/connection.php";
	
	//Hiermee wordt informatie over de gebruiker opgehaald via de email en het wachtwoord
	function gettingUser($email, $password){
		$db = createConnection();
		$sql = "SELECT * FROM users WHERE email = :email AND password = :password";
		$query = $db->prepare($sql);
		$query->bindParam(':password', $password, PDO::PARAM_STR);
		$query->bindParam(':email', $email, PDO::PARAM_STR);
		$query->execute();

		$db = null;

		return $query->fetch();
	}
?>