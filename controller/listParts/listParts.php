<?php 
	include BASE_URL . 'model/gettingListParts/gettingListParts.php';
	include_once BASE_URL . 'controller/test_input/test_input.php';
	
	function listParts($list){
		return gettingListParts(test_input($list));
	}
?>