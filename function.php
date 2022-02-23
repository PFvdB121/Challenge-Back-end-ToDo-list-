<?php 
	function test_input($data){
		$data = stripslashes($data);
		$data = trim($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	function getLists($user){
		$db = createConnection();
		$sql = "SELECT * FROM list WHERE user = :user";
		$query = $db->prepare($sql);
		$query->bindParam(':user', $user);
		$query->execute();

		$db = null;

		return $query->fetchAll();
	}
	function listParts($list){
		$db = createConnection();
		$sql = "SELECT * FROM task WHERE list = :list";
		$query = $db->prepare($sql);
		$query->bindParam(':list', $list);
		$query->execute();

		$db = null;
	}
	function getUser($password, $username){
		$db = createConnection();
		$sql = "SELECT * FROM users WHERE password = :password AND username = :username";
		$query = $db->prepare($sql);
		$query->bindParam(':password', $password);
		$query->bindParam(':username', $username);
		$query->execute();

		$db = null;

		return $query->fetch();
	}
	function getUsers(){
		$db = createConnection();
		$sql = "SELECT * FROM users";
		$query = $db->prepare($sql);
		$query->execute();

		$db = null;

		return $query->fetchAll();
	}
	function getNonAdmins($password, $username){
		$db = createConnection();
		$sql = "SELECT * FROM users WHERE role = 'standard'";
		$query = $db->prepare($sql);
		$query->execute();

		$db = null;
		
		return $query->fetchAll();
	}

	function insertList($user, $name){
		$db = createConnection();
		$sql = "INSERT INTO list(user, name) VALUES(:user, :name)";
		$query = $db->prepare($sql);
		$query->bindParam(':user', $user);
		$query->bindParam(':name', $name);
		$query->execute();

		$db = null;
	}

	function register($firstName, $insertion, $lastName, $username, $password){
		$db = createConnection();
		$sql = "INSERT INTO `users`(`first name`, `insertion`, `last name`, `username`, `password`, `role`) VALUES (:firstName, :insertion, :lastName, :username, 'standard');";
		$query = $db->prepare($sql);
		$query->bindParam(':firstName', $firstName);
		$query->bindParam(':insertion', $insertion);
		$query->bindParam(':lastName', $lastName);
		$query->bindParam(':username', $username);
		$query->bindParam(':password', $password);
		$query->execute();

		$db = null;
	}
?>