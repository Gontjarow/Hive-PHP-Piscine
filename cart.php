<?php
	session_start();
	include("user_db.php");
	$session = $_SESSION;
	define(PASSWORD, "password");
	if ($_GET['login']){
		$_SESSION['logged_in'] = $_GET['login'];
		$user_cart = serialize($_SESSION);
		update_user_cart($_GET['login'], $user_cart);
	}
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="cart.css">
		<title>e-commerce</title>
	</head>
	<body>
	<?php require('page-header.html'); ?>
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
				$link = mysqli_connect("localhost:3306", "root", PASSWORD, "rush00");
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
						echo '<td class="price">'.$item['price'].' €</td>';
						echo '<td class="count">'.$num.'</td>';
						echo '<td class="total">'.$item['price']*$num.' €</td>';
						echo '</tr>';
					}
				}
			?>
				<tr class="cart-item">
					<td class="name">Total</td>
					<td></td>
					<td></td>
					<td class="total">
					<?php echo $session['total_price']." €"; ?></td>
				</tr>
			</table>
			<a id="checkout" href="login.php">Checkout</a>
			<!-- content end -->
		</div>
	</body>
</html>
