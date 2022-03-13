<?php 
	include BASE_URL . 'model/gettingListPartsFO/gettingListPartsFO.php';
	include_once BASE_URL . 'controller/test_input/test_input.php';
	
	function listPartsFO($list, $filter, $order){
		return gettingListPartsFO(test_input($list), test_input($filter), test_input($order));
	}
?>