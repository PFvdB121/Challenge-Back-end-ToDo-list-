<?php 
	include BASE_URL . 'model/gettingUser/gettingUser.php';
	include_once BASE_URL . 'controller/test_input/test_input.php';

	//Informatie over de gebruiker wordt hiermee opgehaald
	function getUser($email, $password){
		return gettingUser(test_input($email), test_input($password));
	}
?>