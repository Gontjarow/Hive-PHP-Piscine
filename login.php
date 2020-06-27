<?php
	function sanitize_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	function insert_value($key)
	{
		$value = $_SESSION[$key] ?? "";

		if ($value)
			echo " value=\"{$value}\"";
	}

	// session_start();
	$_SESSION["login"];
	$_SESSION["passwd"];

	if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["submit"])
	{
		$user = sanitize_input($_POST["login"]);
		$pass = sanitize_input($_POST["passwd"]);
		$_SESSION["login"] = $user;
		$_SESSION["passwd"] = $pass;
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
			<a id="top-logo" href="index.html">Bread house</a>
			<a id="top-login" class="button" href="login.php">Login</a>
			<a id="top-cart" class="button" href="product.php">Cart</a>
		</div>
		<div id="site-wrapper">
			<form id="login-form" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
				Username: <input id="login-input" type="text" name="login"<?php insert_value("login"); ?> />
				<br />
				Password: <input id="passwd-input" type="password" name="passwd"<?php insert_value("passwd"); ?> />
				<input id="login-button" type="submit" name="submit" value="OK">
			</form>
		</div>
	</body>
</html>
