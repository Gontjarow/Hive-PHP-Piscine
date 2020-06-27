<?php
	include("load_data.php");
	include("query_db.php");
	$products = get_products_by_category($_GET["category"]);
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
			<a id="top-cart" class="button" href="product.php">Cart</a>
		</div>
		<div id="categories" class="big"></div>
		<div id="site-wrapper">
			<!-- content begin -->
			<!-- list specific category, order by name -->
			<table id=category-products> <?php
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
			?> </table>
			<!-- content end -->
		</div>
	</body>
</html>