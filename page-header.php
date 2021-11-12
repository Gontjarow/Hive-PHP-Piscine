<?php include_once("user_db.php"); ?>

<div id="top-bar">
	<a id="top-logo" href="index.php">Bread house</a>
	<?php
		$user = $_SESSION['logged_in'];
		if ($user)
		{
			echo '<a id="top-login" class="button" href="index.php?action=logout">Logout</a>';
			$db_user = get_user($user);
			if ($db_user['admin'])
				echo '<a id="top-admin" class="button" href="admin.php">Admin</a>';
		}
		else
		{
			echo '<a id="top-login" class="button" href="login.php">Login</a>';
		}
	?>
	<a id="top-cart" class="button" href="cart.php">Cart</a>
</div>
<div id="categories" class="big">
	<a href="category.php?category=Flat bread" class="button">Flat bread</a>
	<a href="category.php?category=Yeast bread" class="button">Yeast bread</a>
	<a href="category.php?category=Pancake" class="button">Pancake</a>
	<a href="category.php?category=Rye bread" class="button">Rye bread</a>
	<a href="category.php?category=Sweet bread" class="button">Sweet bread</a>
</div>
