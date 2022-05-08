<?php
	include BASE_URL . 'model/gettingList/gettingList.php';
	include_once BASE_URL . 'controller/test_input/test_input.php';

	//De lijst wordt met de id worden opgehaald
	function getList($id){
		return gettingList(test_input($id));
	}
?>