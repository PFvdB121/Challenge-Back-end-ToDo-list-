<?php
	include BASE_URL . 'model/updatingTask/updatingTask.php';
	include_once BASE_URL . 'controller/test_input/test_input.php';

	//De taak wordt alleen verwijderd als de gebruiker daarvan ook daadwerkelijk in bezit is
	function updateTask($id, $task, $description, $duration, $status)
	{
		if ($_SESSION["id"] == checkUserTask(test_input($id))) {
			updatingTask(test_input($id), test_input($task), test_input($description), test_input($duration), test_input($status));
		}
	}
?>