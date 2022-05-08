<?php 
	include BASE_URL . 'model/gettingListPartsF/gettingListPartsF.php';
	include_once BASE_URL . 'controller/test_input/test_input.php';
	
	//Alle taken van de bijbehorende lijst worden hiermee opgehaald en gefilterd gebaseerd op status
	function listPartsF($list, $filter){
		return gettingListPartsF(test_input($list), test_input($filter));
	}
?>