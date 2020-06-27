<?php
	include("load_data.php");
	include("query_db.php");
	$product = get_single_product($_GET["id"]);
	print_r($product);
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="product.css">
		<title>e-commerce</title>
	</head>
	<body>
		<div id="top-bar">
			<a id="top-logo" href="index.php">Bread house</a>
			<a id="top-login" class="button" href="login.php">Login</a>
			<a id="top-cart" class="button" href="product.php">Cart</a>
		</div>
		<div id="front-banner"></div>
		<div id="site-wrapper">
			<!-- content begin -->
			<div id="product-main">
				<?php
				echo "<img id=\"product-img\" class=\"main\" src=" . $product["img"] . " />";
				?>

				<div id="product-right">
					<h1 id="product-name"><? echo $product["name"]; ?></h1>
					<h2 id="product-price"><? echo $product["price"]; ?></h2>
					<p id="product-info"><? echo $product["information"]; ?></p>
				</div>
			</div>
				<div id="product-showcase">sdf</div>
				<form id="product-actions">
					<?php
						echo "<a href=\"/product.php?action=add_to_cart&id=" . $product["id"] . "\" ><input type=\"button\" value=\"ADD CART\" /></a>";
					?>

					<!-- <a href="/product.php?action=add_to_cart&id=" ><input type="button" value="ADD CART" /></a> -->
					<!-- <input type="button" value="BUY NOW" /> -->
				</form>
			<!-- content end -->
		</div>
	</body>
</html>