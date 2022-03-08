<?php 
	$title = "login";
	include_once 'function.php';
	require "header.php";
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$user = getUser($_POST['email'], $_POST['password']);
		if (!empty($user)) {
			session_start();
			session_unset();
			$_SESSION = $user;
			session_write_close();
			header("Location: http://localhost/blok7+8/Challenge-Back-end-ToDo-list-/index.php");
		}
		else{
			$error = "email of wachtwoord is fout";
		}
	}
?>
<div class="w3-display-middle w3-white container">
	<header>
		<h1>INLOGGEN</h1>
	</header>
	<form action="<?=test_input($_SERVER['PHP_SELF']) ?>" method="post">
		<div class="error w3-text-red">
			<p><?=$error?></p>
		</div>
		<div>
			<p>emailadres</p>
			<input type="text" name="email" value="<?=$_POST['email']?>">
		</div>
		<div>
			<p>wachtwoord</p>
			<input type="password" name="password" value="<?=$_POST['password']?>">
		</div>
		<input type="submit" value="inloggen" name="press">
	</form>
	<a href="register.php">Maak een account aan</a>
	<footer>&copy; Patrique van den Boom - 2022</footer>
</div>
<?php 
	require "footer.php";
?>