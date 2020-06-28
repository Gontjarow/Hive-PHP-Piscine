<?php
	include("user_db.php");
	session_start();
	define(PASSWORD, "password");
	echo "<!--", "\nSession ", print_r($_SESSION, TRUE), "-->", "\n";

	if ($_GET['action'] == 'delete_user')
	{
		$user = $_GET['login'];
		if ($user != "root")
		{
			delete_user($user);
		}
	}
	else if ($_GET['action'] == 'clear_cart')
	{
		$user = get_user($_GET['login']);
		$user_session = unserialize($user['cart']);
		$user_session['cart'] = array();
		$user_session['item_nb'] = 0;
		$user_session['total_price'] = 0;
		$serial = serialize($user_session);
		update_user_cart($_GET['login'], $serial);
	}
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="cart.css">
		<title>e-commerce</title>
	</head>
	<body>
		<?php require('page-header.php'); ?>
		<div id="site-wrapper">
			<!-- content begin -->
			<table id=cart-content>
				<tr class="cart-item">
					<td class="name">Username</td>
					<td class="price"></td>
					<td class="count"></td>
					<td class="total"></td>
				</tr>
			<?php
				$link = mysqli_connect("localhost:3306", "root", PASSWORD, "rush00");
				if (!$link)
					die('Could not connect: ' . mysqli_connect_error());
				$query = "SELECT * FROM users";
				$data = mysqli_query($link, $query);
				$data = mysqli_fetch_all($data, MYSQLI_ASSOC);
				// print_r($data);
				// print_r($user);

				foreach ($data as $user)
				{
					echo '<tr class="cart-item">';
					echo '<td class="name">' . $user['login'] . '</td>';
					echo '<td class="price">';
						echo '<a href="/admin.php?action=clear_cart&login=', $user['login'], '"><input type="button" class="button warning" value="Clear cart" /></a>';
					echo '</td>';
					echo '<td class="price">';
						echo '<a href="/admin.php?action=delete_user&login=', $user['login'], '"><input type="button" class="button danger" value="Delete user" /></a>';
					echo '</td>';
					echo "<!--", "\nCart ", print_r($user, TRUE), "-->", "\n";
				}
			?>
			</table>

			<!-- <a id="checkout" href="checkout.php">Checkout</a> -->
			<!-- content end -->
		</div>
	</body>
</html>