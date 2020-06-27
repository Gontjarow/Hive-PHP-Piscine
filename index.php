<?php
	include("load_data.php");
	include("query_db.php");
	$products = get_products();
	session_start();
	if(!isset($_SESSION['cart'])){
		$_SESSION['cart'] = array();
		$_SESSION['item_nb'] = 0;
		$_SESSION['total_price'] = 0;
	}
	if ($_Get['action'] == 'add_to_cart') {

	}
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>e-commerce</title>
	</head>
	<body>
		<div id="top-bar">
			<a id="top-logo" href="index.html">Bread house</a>
			<a id="top-login" class="button" href="login.php">Login</a>
			<a id="top-cart" class="button" href="cart.php">Cart</a>
		</div>
		<div id="front-banner"></div>
		<div id="site-wrapper">
			<div id="categories" class="mini">
				<div class="button">Flat bread</div>
				<div class="button">Yeast bread</div>
				<div class="button">Pancake</div>
				<div class="button">Rye bread</div>
				<div class="button">Sweet bread</div>
			</div>
			asdasdad
			<!-- promos -->
			<!-- products -->
		</div>
	</body>
</html>