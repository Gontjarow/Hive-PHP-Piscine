<?php
	include("install.php");
	include("query_db.php");
	include("database_cart.php");
	$products = get_products();
	session_start();
	echo "<!--", "\nSession ", print_r($_SESSION, TRUE), "-->", "\n";
	if(!isset($_SESSION['cart'])){
		$_SESSION['cart'] = array();
		$_SESSION['item_nb'] = 0;
		$_SESSION['total_price'] = 0;
	}
	if ($_GET['action'] == 'logout')
	{
		$_SESSION = array();
		// $_SESSION['logged_in'] = "";
		// session_destroy();
	}
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="category.css">
		<title>e-commerce</title>
	</head>
	<body>
	<?php require('page-header.php'); ?>
		<div id="site-wrapper">
		<!-- content begin -->
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
					echo "<td style=\"background-image: url(", $products[$i]["img"] ,")\"><h1 class=\"name\"><a href=\"product.php?id=" . $products[$i]['id'] . "\">", $products[$i]["name"], "</a></h1>";
					echo "<h2 class=\"price\">", $products[$i]["price"], "</h2></td>";
				}
				echo "</tr>";
			?>
			</table>
		</div>
		<!-- content end -->
	</body>
</html>
