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
		<!-- content begin -->
			<div id="categories" class="mini">
				<a href="category.php?category=Flat" class="button">Flat bread</a>
				<a href="category.php?category=Yeast" class="button">Yeast bread</a>
				<a href="category.php?category=Pancake" class="button">Pancake</a>
				<a href="category.php?category=Rye" class="button">Rye bread</a>
				<a href="category.php?category=Sweet" class="button">Sweet bread</a>
			</div>
			<!-- list all products, random order? -->
		</div>
		<!-- content end -->
	</body>
</html>
