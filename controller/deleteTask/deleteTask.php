<?php
	include BASE_URL . 'model/deletingTask/deletingTask.php';
	include_once BASE_URL . 'controller/test_input/test_input.php';
	include_once BASE_URL . "controller/checkUserTask/checkUserTask.php";
	
	function deleteTask($id){
		if ($_SESSION["id"] == checkUserTask($id)) {
			deletingTask(test_input($id));
		}
	}
?>