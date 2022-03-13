<?php 
	include BASE_URL . 'model/gettingLists/gettingLists.php';
	include_once BASE_URL . 'controller/test_input/test_input.php';

	function getLists($user){
		return gettingLists(test_input($user));
	}
?>