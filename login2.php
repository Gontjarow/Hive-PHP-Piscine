<?PHP
	header("Content-Type: text/html");
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="login.css">
		<title>e-commerce</title>
	</head>
	<body>
		<div id="top-bar">
			<a id="top-logo" href="index.php">Homepage</a>
			<div class="button" id="top-login">Login</div>
			<div class="button" id="top-cart">Cart</div>
		</div>
		<div id="site-wrapper">
			<form id="login-form" method="POST" action="">
				Username: <input id="login-input" type="text" name="login" />
				<br />
				Password: <input id="passwd-input" type="password" name="passwd" />
				<input id="login-button" type="submit" name="submit" value="OK">
			</form>
		</div>
	</body>
</html>
