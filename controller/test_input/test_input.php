<?php 

	//Met deze functie wordt er voorkomen dat er exra sql code wordt gebruikt door mogelijke hackers
	function test_input($data){
		$data = stripslashes($data);
		$data = trim($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>