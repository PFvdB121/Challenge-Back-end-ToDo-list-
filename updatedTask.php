<?php 
	include_once 'function.php';

	session_start();

	$_POST['id'] = test_input($_POST['id']);
	
	if (!empty($_SESSION['email']) && is_numeric($_POST['id'])) {

		$task = getTask($_POST['id']);

		$list = getList($task["listID"]);

		$user = getUserById($list["user"]);

		if ($_SESSION["id"] == $user['id']) {
			updateTask($_POST['id'], $_POST['task'], $_POST['description'], $_POST['duration'], $_POST['status']);
		}
	}

	header("Location: http://localhost/blok7+8/Challenge-Back-end-ToDo-list-/index.php?taskId=" . $task['id']);
?>