<?php
	define(PASSWORD, "password");
	
	function add_user($login, $passwd){
		echo "hello\n";
		$link = mysqli_connect("localhost:3306", "root", PASSWORD, "rush00");
		if (!$link){
			die('Could not connect: ' . mysqli_connect_error());
		}
		$repeat = FALSE;
		$nb = 0;
		$query = "SELECT login FROM users";
		$data = mysqli_query($link,$query);
		while ($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
			if ($row['login'] == $login){
				$repeat = TRUE;
				return FALSE;
			}
			$nb += 1;
		}
		mysqli_free_result($data);
		$paswd =  hash('whirlpool', $_POST['passwd']);
		$query = "INSERT INTO `users`(`login`, `passwd`) VALUES ('$login','$passwd')";
		if(mysqli_query($link, $query)){
			echo "Records inserted successfully.";
			return TRUE;
		} else{
			echo "ERROR: Could not able to execute $sql. " . mysqli_connect_error($link);
			return FALSE;
		}
		mysqli_close($link);
		

	}
?>