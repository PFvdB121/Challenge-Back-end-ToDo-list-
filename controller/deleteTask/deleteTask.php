<?php
	include BASE_URL . 'model/deletingTask/deletingTask.php';
	include_once BASE_URL . 'controller/test_input/test_input.php';
	include_once BASE_URL . "controller/checkUserTask/checkUserTask.php";
	
	//De taak wordt alleen verwijderd als de gebruiker daarvan ook daadwerkelijk in bezit is
	function deleteTask($id){
		if ($_SESSION["id"] == checkUserTask($id)) {
			deletingTask(test_input($id));
		}
	}
?>