<?php
	include BASE_URL . 'model/insertingTask/insertingTask.php';
	include_once BASE_URL . 'controller/test_input/test_input.php';
	include_once BASE_URL . 'controller/checkUserList/checkUserList.php';

	//Er wordt een taak toegevoegd
	function insertTask($task, $list){
		if (checkUserList($list)) {
			insertingTask(test_input($task), test_input($list));
		}
	}
?>