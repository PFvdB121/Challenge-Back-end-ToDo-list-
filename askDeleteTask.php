<?php 
	include_once 'function.php';

	session_start();

	$loggedIN = true;
	
	if (empty($_SESSION['email']) || !is_numeric($_GET['id']) || !isset($_GET['id'])) {
		$loggedIN = false;
	}

	$task = getTask($_GET['id']);

	$list = getList($task["listID"]);

	$user = getUserById($list["user"]);

	if ($_SESSION["id"] != $user['id']) {
		$loggedIN = false;
	}

	if (!$loggedIN) {
		header("Location: http://localhost/blok7+8/Challenge-Back-end-ToDo-list-/index.php");
	}

	require "header.php";
?>
	<div>
		<header>
			<h1>Weet u zeker dat u de taak <?=$task["task"]?> wilt verwijderen uit de lijst <?=$list["name"]?></h1>
		</header>
		<form action="http://localhost/blok7+8/Challenge-Back-end-ToDo-list-/deletedTask.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $_GET['id']?>">
			<input type="submit" value="Ja" class="w3-green buttonLink">
		</form>
		<a href="http://localhost/blok7+8/Challenge-Back-end-ToDo-list-/index.php" class="w3-red buttonLink">Nee</a>
	</div>
<?php 
	require "footer.php";
?>