<?php
	include BASE_URL . 'model/deletingList/deletingList.php';
	include_once BASE_URL . 'controller/test_input/test_input.php';
	include_once BASE_URL . 'controller/checkUserList/checkUserList.php';
	
	function deleteList($id){
		if (checkUserList($id)) {
			deletingList(test_input($id));
		}
	}
?>