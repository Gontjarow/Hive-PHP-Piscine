<?php
	session_start();
	$session = $_SESSION;
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="cart.css">
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
			
			<table id=cart-content> 
				<tr class="cart-item">
					<td class="name">Name </td>
					
					<td class="price">Item price</td>
					<td class="count">Number of item</td>
					<td class="total">Total price for each item</td>
				</tr>
			<?php


				foreach ($session['cart'] as $item)
				{
					$link = mysqli_connect("localhost:3306", "root", 'password', "rush00");
					if (!$link){
						die('Could not connect: ' . mysqli_connect_error());
					}
					if (is_array($session[cart])) {
						foreach ($session[cart] as $id => $num){
							$query = "SELECT * FROM product WHERE id=$id";
							$data = mysqli_query($link, $query);
							if ($data){
								$item =  mysqli_fetch_array($data, MYSQLI_ASSOC);
							}
							echo '<tr class="cart-item">';
							echo '<td class="name">'. $item['name']. '</td>';
							
							echo '<td class="price">'.$item['price'].'</td>';

							echo '<td class="count">'.$num.'</td>';
							echo '<td class="total">'.$item['price']*$num.' €</td>';
							echo '</tr>';
						}
					}
				}
			?> 
				<tr class="cart-item">
					<td class="name">Total</td>
					<td></td>
					<td></td>
					<td class="total">
					<?php 
					echo $session['total_price']." €";
					?></td>
				</tr>
			</table>
				
			<a id="checkout" href="checkout.php">Checkout</a>
			<!-- content end -->
		</div>
	</body>
</html>