<?php 
	include BASE_URL . 'model/registering/registering.php';
	include_once BASE_URL . 'controller/test_input/test_input.php';

	function register($firstName, $insertion, $lastName, $email, $password){
		registering(test_input($firstName), test_input($insertion), test_input($lastName), test_input($email), test_input($password));
	}
?>