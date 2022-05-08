<?php 
	include BASE_URL . 'model/updatingList/updatingList.php';
	include_once BASE_URL . 'controller/test_input/test_input.php';
	include_once BASE_URL . 'controller/checkUserList/checkUserList.php';

	//De lijst wordt alleen verwijderd als de gebruiker daarvan ook daadwerkelijk in bezit is
	function updateList($name, $id){
		if (checkUserList($id)) {
			updatingList(test_input($name), test_input($id));
		}
	}
?>