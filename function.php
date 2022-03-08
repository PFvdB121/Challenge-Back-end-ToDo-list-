<?php 
	include_once 'connection.php';
	function test_input($data){
		$data = stripslashes($data);
		$data = trim($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	function getLists($user){
		$db = createConnection();
		$sql = "SELECT * FROM lists WHERE user = :user";
		$query = $db->prepare($sql);
		$query->bindParam(':user', $user, PDO::PARAM_INT);
		$query->execute();

		$db = null;

		return $query->fetchAll();
	}
	function listParts($list){
		$db = createConnection();
		$sql = "SELECT * FROM tasks WHERE listID = :list";
		$query = $db->prepare($sql);
		$query->bindParam(':list', $list, PDO::PARAM_INT);
		$query->execute();

		$db = null;

		return $query->fetchAll();
	}
	function getUser($email, $password){
		$db = createConnection();
		$sql = "SELECT * FROM users WHERE email = :email AND password = :password";
		$query = $db->prepare($sql);
		$query->bindParam(':password', $password, PDO::PARAM_STR);
		$query->bindParam(':email', $email, PDO::PARAM_STR);
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
	function getNonAdmins(){
		$db = createConnection();
		$sql = "SELECT * FROM users WHERE role = 'standard'";
		$query = $db->prepare($sql);
		$query->execute();

		$db = null;
		
		return $query->fetchAll();
	}

	function insertList($user, $name){
		$db = createConnection();
		$sql = "INSERT INTO lists(user, name) VALUES(:user, :name)";
		$query = $db->prepare($sql);
		$query->bindParam(':user', $user, PDO::PARAM_STR);
		$query->bindParam(':name', $name, PDO::PARAM_INT);
		$query->execute();

		$db = null;
	}

	function updateList($name, $id){
		$db = createConnection();
		$sql = "UPDATE lists SET name=:name WHERE id = :id";
		$query = $db->prepare($sql);
		$query->bindParam(':name', $name, PDO::PARAM_STR);
		$query->bindParam(':id', $id, PDO::PARAM_INT);
		$query->execute();

		$db = null;
	}

	function register($firstName, $insertion, $lastName, $email, $password){
		$db = createConnection();
		$sql = "INSERT INTO users(`first name`, `insertion`, `last name`, `email`, `password`, `role`) VALUES (:firstName, :insertion, :lastName, :email, :password, 'standard')";
		$query = $db->prepare($sql);
		$query->bindParam(':firstName', $firstName, PDO::PARAM_STR);
		$query->bindParam(':insertion', $insertion, PDO::PARAM_STR);
		$query->bindParam(':lastName', $lastName, PDO::PARAM_STR);
		$query->bindParam(':email', $email, PDO::PARAM_STR);
		$query->bindParam(':password', $password, PDO::PARAM_STR);
		$query->execute();
		$db = null;
	}

	function deleteList($id){
		$db = createConnection();
		$sql = "DELETE FROM lists WHERE id = :id";
		$query = $db->prepare($sql);
		$query->bindParam(':id', $id, PDO::PARAM_INT);
		$query->execute();
		$db = null;
	}

	function insertTask($task, $list){
		$db = createConnection();
		$sql = "INSERT INTO tasks(`task`, `listID`) VALUES(:task, :list)";
		$query = $db->prepare($sql);
		$query->bindParam(':task', $task, PDO::PARAM_STR);
		$query->bindParam(':list', $list, PDO::PARAM_INT);
		$query->execute();
		$db = null;
	}
?>