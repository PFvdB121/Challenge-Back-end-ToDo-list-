<?php 
	define('BASE_URL', $_SERVER['SERVER_NAME'] . "/.." . "/.." . "/.." . "/");
	include_once BASE_URL . "controller/deleteTask/deleteTask.php";
	include_once BASE_URL . "controller/getTask/getTask.php";
	include_once BASE_URL . "controller/getList/getList.php";
	include_once BASE_URL . "controller/getUserById/getUserById.php";
	include_once BASE_URL. "controller/test_input/test_input.php";
	include_once BASE_URL . "controller/checkUserTask/checkUserTask.php";

	session_start();

	//De taak wordt alleen verwijderd als de gebruiker daarvan ook daadwerkelijk in bezit is
	$_POST['id'] = test_input($_POST['id']);
	
	if (!empty($_SESSION['email']) && is_numeric($_POST['id'])) {
		if ($_SESSION["id"] == checkUserTask(test_input($_POST['id']))) {
			deleteTask(test_input($_POST['id']));
		}
	}

	header("Location: http://localhost/blok7+8/Challenge-Back-end-ToDo-list-/view/pages/index.php");
?>