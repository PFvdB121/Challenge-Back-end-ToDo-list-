<?php
	include BASE_URL . 'model/deletingTaskList/deletingTaskList.php';
	include_once BASE_URL . 'controller/test_input/test_input.php';
	
	function deleteTaskList($list){
		deletingTaskList(test_input($list));
	}
?>