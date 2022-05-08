<?php
	include BASE_URL . 'model/gettingUserById/gettingUserById.php';
	include_once BASE_URL . 'controller/test_input/test_input.php';

	//Informatie over de gebruiker wordt met de id opgehaald
	function getUserById($id){
		return gettingUserById(test_input($id));
	}
?>