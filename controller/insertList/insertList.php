<?php 
	include BASE_URL . '/model/insertingList/insertingList.php';
	include_once BASE_URL . 'controller/test_input/test_input.php';

	//Er wirdt een lijst toegevoegd
	function insertList($user, $name){
		insertingList(test_input($user), test_input($name));
	}
?>