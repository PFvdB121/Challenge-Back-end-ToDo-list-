<?php 
	//Er wordt hiermee een connectie gemaakt met de sql database
	function createConnection(){
		try {
			$conn = new PDO("mysql:host=localhost;dbname=todo", "root", "mysql");
			return $conn;
		} catch (PDOException $e) {
			print("Error!: " . $e->getMessage() . "<br>");
		}
	}
?>