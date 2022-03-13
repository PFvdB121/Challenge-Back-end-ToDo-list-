<?php 
	define('BASE_URL', $_SERVER['SERVER_NAME'] . "/.." . "/.." . "/.." . "/");
	
	include BASE_URL . "/controller/getTask/getTask.php";
	
	include BASE_URL . "/controller/getList/getList.php";
	
	include BASE_URL . "/controller/getUserById/getUserById.php";
	
	include_once BASE_URL . "controller/checkUserTask/checkUserTask.php";

	session_start();

	$loggedIN = checkUserTask(test_input($_GET['id']));
	
	if (empty($_SESSION['email']) || !is_numeric($_GET['id']) || !isset($_GET['id'])) {
		$loggedIN = false;
	}

	if (!$loggedIN) {
		header("Location: http://localhost/blok7+8/Challenge-Back-end-ToDo-list-/view/pages/index.php");
	}

	$title="askDeleteTask";

	require "../pageParts/header.php";
?>
	<div>
		<header>
			<h1>Weet u zeker dat u de taak <?=$task["task"]?> wilt verwijderen uit de lijst <?=$list["name"]?></h1>
		</header>
		<form action="http://localhost/blok7+8/Challenge-Back-end-ToDo-list-/controller/deletedTask/deletedTask.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $_GET['id']?>">
			<input type="submit" value="Ja" class="w3-green buttonLink">
		</form>
		<a href="http://localhost/blok7+8/Challenge-Back-end-ToDo-list-/view/pages/index.php" class="w3-red buttonLink">Nee</a>
	</div>
<?php 
	require "../pageParts/footer.php"
?>