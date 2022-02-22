<?php 
	function test_input($data){
		$data = stripslashes($data);
		$data = trim($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	function getList($user){
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

	function register(){
		$db = createConnection();
		$sql = "INSERT INTO `users`(`id`, `first name`, `insertion`, `last name`, `username`, `password`, `role`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7]);"
	}
?>