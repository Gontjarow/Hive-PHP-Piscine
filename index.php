<?php
	include("load_data.php");
	include("query_db.php");
	$products = get_products();
	print_r($products);
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>e-commerce</title>
	</head>
	<body>
		<div id="top-bar">
			<a id="top-logo" href="index.html">Bread house</a>
			<div class="button" id="top-login">Login</div>
			<div class="button" id="top-cart">Cart</div>
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