<?php
	define(PASSWORD, "password");
	
	function add_user($login, $passwd){
		$link = mysqli_connect("localhost:3306", "root", PASSWORD, "rush00");
		if (!$link){
			die('Could not connect: ' . mysqli_connect_error());
		}
		
		$query = "";
	}
?>