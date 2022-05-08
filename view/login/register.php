<?php 
	$title = "register";

	define('BASE_URL', $_SERVER['SERVER_NAME'] . "/.." . "/.." . "/.." . "/");

	include '../../controller/register/register.php';

	include '../../controller/getUsers/getUsers.php';

	include '../../controller/getUser/getUser.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$users = getUsers();

		$full = true;

		$error = array();

		foreach ($_POST as $key => $value) {

			if ($key != "insertion" && empty($value)) {

				$error[$key] = "Deze waarde moet ingevuld worden";

				$full = false;

			}

		}
		foreach ($users as $key => $value) {

			if ($value == $_POST['email']) {

				$error['email'] == "Deze emailadres wordt al gebruikt";

				$full = false;

			}

		}

		if (strlen($_POST["password"]) < 8 && !empty($_POST["password"])) {

			$error["password"] = "Wachtwoord moet minimaal uit 8 letters bestaan";

			$full = false;

		}

		if ($full == true) {

			register($_POST["firstName"], $_POST["insertion"], $_POST["lastName"], $_POST["email"], $_POST["password"]);

			$user = getUser($_POST["email"], $_POST["password"]);

			session_start();

			session_unset();

			$_SESSION = $user;

			session_write_close();

			header("Location: http://localhost/blok7+8/Challenge-Back-end-ToDo-list-/view/pages/index.php");

		}

	}

	require '../pageParts/header.php';

?>
	<div class="w3-display-middle w3-white container">

		<header>
			<h1>REGISTREREN</h1>
		</header>

		<form action="<?=test_input($_SERVER['PHP_SELF']) ?>" method="post">

			<div>
				<p>voornaam<span class="w3-text-red">*<?=$error["firstName"];?></span></p>
				<input type="text" name="firstName" value="<?=$_POST['firstName']?>">
			</div>

			<div>
				<p>tussenvoegsel</p>
				<input type="text" name="insertion" value="<?=$_POST['insertion']?>">
			</div>

			<div>
				<p>achternaam<span class="w3-text-red">*<?=$error["lastName"];?></span></p>
				<input type="text" name="lastName" value="<?=$_POST['lastName']?>">
			</div>

			<div>
				<p>emailadres<span class="w3-text-red">*<?=$error["email"];?></span></p>
				<input type="text" name="email" value="<?=$_POST['email']?>">
			</div>

			<div>
				<p>wachtwoord<span class="w3-text-red">*<?=$error["password"];?></span></p>
				<input type="password" name="password" value="<?=$_POST['password']?>">
			</div>

			<input type="submit" value="registreren" name="press">

		</form>
		<a href="login.php">Inloggen</a>

		<footer>&copy; Patrique van den Boom - 2022</footer>

	</div>

<?php 
	require "../pageParts/footer.php"
?>