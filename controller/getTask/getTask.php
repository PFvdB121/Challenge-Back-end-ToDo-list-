<?php
	include BASE_URL . 'model/gettingTask/gettingTask.php';
	include_once BASE_URL . 'controller/test_input/test_input.php';

	function getTask($id){
		return gettingTask(test_input($id));
	}
?>