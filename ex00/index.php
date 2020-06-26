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

	session_start();
	$_SESSION["login"];
	$_SESSION["passwd"];

	if ($_SERVER["REQUEST_METHOD"] == "GET" && $_GET["submit"])
	{
		$user = sanitize_input($_GET["login"]);
		$pass = sanitize_input($_GET["passwd"]);
		$_SESSION["login"] = $user;
		$_SESSION["passwd"] = $pass;
	}
?>
<html><head>
<style>
	body {
		margin: 0px;
		padding-top: 20px;
		background-color:rgba(240, 181, 255, 0.5);
		font-family: cursive;
	}
	#login-form {
		display: block;
		width: min-content;
		height: min-content;
		margin: 0 auto 10px;
		padding: 50px;
		background-color:rgba(181, 246, 255, 0.5);
		box-shadow: 10px 10px rgba(0, 0, 0, 0.2);
	}
	#login-button {
		width: 80%;
		margin-left: 10%;
		margin-top: 5%;
	}
	#debug {
		display: block;
		overflow: scroll;
		width: 80%;
		height: 50%;
		margin-left: 10%;
		margin-top: 30px;
		padding: 20px;
		background-color: rgba(119, 0, 255, 0.1);
		font-family: monospace;
	}
</style>
</head><body>
<form id="login-form" method="GET" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
	Username: <input id="login" type="text" name="login"<?php insert_value("login"); ?> />
	<br />
	Password: <input id="passwd" type="password" name="passwd"<?php insert_value("passwd"); ?> />
	<input id="login-button" type="submit" name="submit" value="OK">
</form>
</body></html>
