<?php
	define(PASSWORD, "password");
	
	function add_user($login, $passwd){
		$link = mysqli_connect("localhost:3306", "root", PASSWORD, "rush00");
		if (!$link){
			die('Could not connect: ' . mysqli_connect_error());
		}
		$repeat = FALSE;
		$admin = FALSE;
		$query = "SELECT login FROM users";
		$data = mysqli_query($link,$query);
		while ($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
			if ($row['login'] == $login){
				$repeat = TRUE;
				return FALSE;
			}
		}
		mysqli_free_result($data);
		$passwd =  hash('whirlpool', $_POST['passwd']);
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
	function log_in($login, $passwd){
		$link = mysqli_connect("localhost:3306", "root", PASSWORD, "rush00");
		if (!$link){
			die('Could not connect: ' . mysqli_connect_error());
		}
		$query = "SELECT * FROM users WHERE login = '$login'";
		$result = mysqli_query($link, $query);
		$user = mysqli_fetch_array($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		if (hash('whirlpool', $_POST['passwd']) == $user['passwd']){
			
			return TRUE;
		}else{
			return FALSE;
		}

	}

	function update_user_cart($login, $cart){
		$link = mysqli_connect("localhost:3306", "root", PASSWORD, "rush00");
		if (!$link){
			die('Could not connect: ' . mysqli_connect_error());
		}
		$query = "UPDATE `users` SET `cart`= '$cart' WHERE login = '$login'";
		if(mysqli_query($link, $query)){
			echo "Update successfully!";
			return TRUE;
		} else{
			echo "ERROR: Could not able to execute $sql. " . mysqli_connect_error($link);
			return FALSE;
		}
	}
?>