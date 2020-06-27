<?php

	function get_products(){
		$link = mysqli_connect("localhost:3306", "root", "password", "rush00");
		if (!$link){
			die('Could not connect: ' . mysqli_connect_error());
		}
		$query = "SELECT * FROM product ORDER BY id ASC";
		$data = mysqli_query($link,$query);
		while ($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
			$products[] = $row;
		}
		mysqli_free_result($data);
		mysqli_close($link);
		return($products);
	}

	function get_single_product($id){
		$link = mysqli_connect("localhost:3306", "root", "password", "rush00");
		if (!$link){
			die('Could not connect: ' . mysqli_connect_error());
		}
		$query = "SELECT * FROM category ORDER BY id ASC";
		$data = mysqli_query($link,$query);
		$item = mysqli_fetch_array($data, MYSQLI_ASSOC);
		mysqli_free_result($data);
		mysqli_close($link);
		return($item);
	}

	function get_categories(){
		$link = mysqli_connect("localhost:3306", "root", "password", "rush00");
		if (!$link){
			die('Could not connect: ' . mysqli_connect_error());
		}
		$query = "SELECT * FROM category ORDER BY id ASC";
		$data = mysqli_query($link,$query);
		while ($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
			$categories[] = $row;
		}
		mysqli_free_result($data);
		mysqli_close($link);
		return($categories);
	}

	function get_products_by_category($cat){
		$link = mysqli_connect("localhost:3306", "root", "password", "rush00");
		if (!$link){
			die('Could not connect: ' . mysqli_connect_error());
		}
		$query = "SELECT * FROM product WHERE category = $cat ORDER BY id ASC";
		$data = mysqli_query($link,$query);
		while ($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
			$products[] = $row;
		}
		mysqli_free_result($data);
		mysqli_close($link);
		return($products);
	}

	function get_products_by_origin($origin){
		$link = mysqli_connect("localhost:3306", "root", "password", "rush00");
		if (!$link){
			die('Could not connect: ' . mysqli_connect_error());
		}
		$query = "SELECT * FROM product WHERE origin = $origin ORDER BY id ASC";
		$data = mysqli_query($link,$query);
		while ($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
			$products[] = $row;
		}
		mysqli_free_result($data);
		mysqli_close($link);
		echo "GOOD";
		return($products);
	}

?>