<?php
	include ("user_db.php");
	function sanitize_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	// session_start();
	$_SESSION["login"];
	$_SESSION["passwd"];

	if ($_POST["register"]){
		$login = sanitize_input($_POST["login"]);
		$passwd = sanitize_input($_POST["passwd"]);
		if (add_user($login, $passwd)){
			echo "success\n";
		}else{
			echo ' alert("Give another username!")';
		}
		// print_r($newuser);
	}
	if ($_POST["submit"]){
		$login = sanitize_input($_POST["login"]);
		$passwd = sanitize_input($_POST["passwd"]);
		// if (log_in($login, $passwd)){
		// 	header("Location: /checkout.php");
		// }else{
		// 	echo ' alert("Wrong username or password!")';
		// }
	}
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="login.css">
		<title>e-commerce</title>
	</head>
	<body>
		<div id="top-bar">
			<a id="top-logo" href="index.php">Bread house</a>
			<a id="top-login" class="button" href="login.php">Login</a>
			<a id="top-cart" class="button" href="product.php">Cart</a>
		</div>
		<div id="site-wrapper">
			<form id="login-form" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
				Username: <input id="login-input" type="text" name="login"/>
				<br />
				Password: <input id="passwd-input" type="password" name="passwd"/>
				<input id="login-button" type="submit" name="submit" value="Log in">
				<input id="login-button" type="submit" name="register" value="Create new user">
			</form>
		</div>
	</body>
</html>
