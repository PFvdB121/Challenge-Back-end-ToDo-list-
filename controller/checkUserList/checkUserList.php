<?php
	include_once BASE_URL . "controller/getList/getList.php";
	include_once BASE_URL . "controller/getUserById/getUserById.php";
	include_once BASE_URL. "controller/test_input/test_input.php";

	session_start();

	function checkUserList($id){
		$list = getList(test_input($id));

		$user = getUserById($list["user"]);

		if ($_SESSION["id"] == $user['id']) {
			return true;
		}
		else{
			return false;
		}
	}
?>