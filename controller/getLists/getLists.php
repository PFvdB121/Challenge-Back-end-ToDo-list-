<?php 
	include BASE_URL . 'model/gettingLists/gettingLists.php';
	include_once BASE_URL . 'controller/test_input/test_input.php';

	//De lijsten van de gebruiker worden opgehaald
	function getLists($user){
		return gettingLists(test_input($user));
	}
?>