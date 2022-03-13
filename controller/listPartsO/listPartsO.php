<?php 
	include BASE_URL . 'model/gettingListPartsO/gettingListPartsO.php';
	include_once BASE_URL . 'controller/test_input/test_input.php';
	
	function listPartsO($list, $order){
		return gettingListPartsO(test_input($list), test_input($order));
	}
?>