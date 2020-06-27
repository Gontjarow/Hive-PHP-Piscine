<?php
	include("load_data.php");
	include("query_db.php");
	include("database_cart.php");
	$products = get_products();
	session_start();
	if(!isset($_SESSION['cart'])){
		$_SESSION['cart'] = array();
		$_SESSION['item_nb'] = 0;
		$_SESSION['total_price'] = 0;
	}
	if ($_Get['action'] == 'add_to_cart') {
		add_to_cart($_GET['id']);
		$_SESSION['item_nb'] = cal_num($_SESSION['cart']);
		$_SESSION['total_price'] = cal_price($_SESSION['cart']);
	}

?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="category.css">
		<title>e-commerce</title>
	</head>
	<body>
		<div id="top-bar">
			<a id="top-logo" href="index.php">Bread house</a>
			<a id="top-login" class="button" href="login.php">Login</a>
			<a id="top-cart" class="button" href="cart.php">Cart</a>
		</div>
		<div id="front-banner"></div>
		<div id="site-wrapper">
		<!-- content begin -->
			<div id="categories" class="mini">
				<a href="category.php?category=Flat bread" class="button">Flat bread</a>
				<a href="category.php?category=Yeast bread" class="button">Yeast bread</a>
				<a href="category.php?category=Pancake" class="button">Pancake</a>
				<a href="category.php?category=Rye bread" class="button">Rye bread</a>
				<a href="category.php?category=Sweet bread" class="button">Sweet bread</a>
			</div>
			<!-- list all products, random order? -->
			<table id=category-products>
			<?php
				for ($i=0, $max=count($products); $i < $max; $i++)
				{
					if ($i % 5 == 0)
					{
						if ($i != 0)
							echo "<tr>";
						else
							echo "</tr><tr>";
					}
					$url = $products[$i]['img'];
					echo "<td style=\"background-image: url(", $products[$i]["img"] ,")\"><h1 class=\"name\">", $products[$i]["name"], "</h1>";
					echo "<h2 class=\"price\">", $products[$i]["price"], "</h2></td>";
				}
				echo "</tr>";
			?>
			</table>
		</div>
		<!-- content end -->
	</body>
</html>
