<?php
	include("load_data.php");
	include("query_db.php");
	$products = get_products();
	// print_r($products);
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="product.css">
		<title>e-commerce</title>
	</head>
	<body>
		<div id="top-bar">
			<a id="top-logo" href="index.html">Bread house</a>
			<a id="top-login" class="button" href="login.php">Login</a>
			<a id="top-cart" class="button" href="product.php">Cart</a>
		</div>
		<div id="front-banner"></div>
		<div id="site-wrapper">
			<!-- content begin -->
			<div id="product-main">
				<img id="product-img" class="main" src="img/300px-anpan.jpeg" alt="!TODO!" />
				<div id="product-right">
					<h1 id="product-name">!TODO!</h1>
					<h2 id="product-price">!TODO!</h2>
					<p id="product-info">product info</p>
				</div>
			</div>
			<!-- <div id="miniwrap"> -->
				<div id="product-showcase">sdf</div>
				<form id="product-actions">
					<input type="button" value="ADD TO CART" />
					<input type="button" value="BUY NOW" />
				</form>
			<!-- </div> -->
			<!-- content end -->
		</div>
	</body>
</html>