<?php
// connect to localhost and create database:
	$servername = "localhost:3306";
	$username = "root";
	define(PASSWORD, "password");
	$con = mysqli_connect($servername, $username, PASSWORD);
	if (!$con){
		die('Could not connect: ' . mysqli_error());
	}
	$db = "rush00";
	$query = "CREATE DATABASE IF NOT EXISTS $db";
	if (mysqli_query($con, $query)){
		echo "";
	}else{
		$message  = 'Invalid query: '.mysqli_error()."\n";
		$message .= 'Whole query: '.$query;
		die($message);
	}
	mysqli_close($con);

	$con = mysqli_connect("localhost:3306", "root", PASSWORD, "rush00");
	if (!$con){
		die('Could not connect: ' . mysqli_error());
	}
// create product table and load the data:
	$query = "CREATE TABLE IF NOT EXISTS product (
		id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		name VARCHAR(50) NOT NULL,
		information TEXT NOT NULL,
		price INT NOT NULL,
		category VARCHAR(100) NOT NULL,
		origin VARCHAR(100) NOT NULL,
		img VARCHAR(300) NOT NULL);";
	if (mysqli_query($con, $query)){
		echo "";
	}else{
		$message  = 'Invalid query: '.mysqli_error()."\n";
		$message .= 'Whole query: '.$query;
		die($message);
	}

	$query = "INSERT INTO product (id,name,information, price, category, origin, img)
	VALUES (1,'Oatcake','An oatcake is a type of flatbread similar to a cracker or biscuit,or in some versions takes the form of a pancake. They are prepared with oatmeal as the primary ingredient, and sometimes include plain or wholemeal flour as well. Oatcakes are cooked on a griddle (girdle in Scots) or baked in an oven.',1.50,'Flat bread','UK','https://en.wikipedia.org/wiki/Oatcake#/media/File:Oatcakes_(1).jpg')";

	$query = "SET GLOBAL local_infile=1;";
	if (mysqli_query($con, $query)){
		echo "";
	}else{
		$message  = 'Invalid query: '.mysqli_error()."\n";
		$message .= 'Whole query: '.$query;
		die($message);
	}

	$query = "LOAD DATA LOCAL INFILE 'data/product.csv'
	INTO TABLE product
	FIELDS TERMINATED BY ';'
	ENCLOSED BY '\"'
	IGNORE 1 ROWS;";

	if (mysqli_query($con, $query)){
		echo "";
	}else{
		$message  = 'Invalid query: '.mysqli_error()."\n";
		$message .= 'Whole query: '.$query;
		die($message);
	}

	// create category table and load the data:
	$query = "CREATE TABLE IF NOT EXISTS category (
		id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		name VARCHAR(50) NOT NULL,
		information TEXT NOT NULL,
		category_id VARCHAR(100) NOT NULL
	);";
	if (mysqli_query($con, $query)){
		echo "";
	}else{
		$message  = 'Invalid query: '.mysqli_error()."\n";
		$message .= 'Whole query: '.$query;
		die($message);
	}

	$query = "LOAD DATA LOCAL INFILE 'data/category.csv'
	INTO TABLE category
	FIELDS ENCLOSED BY '\"'
	TERMINATED BY ';'
	IGNORE 1 ROWS;";
	if (mysqli_query($con, $query)){
		echo "";
	}else{
		$message  = 'Invalid query: '.mysqli_error()."\n";
		$message .= 'Whole query: '.$query;
		die($message);
	}

	// create origin table and load the data:
	$query = "CREATE TABLE IF NOT EXISTS origin (
		id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		name VARCHAR(50) NOT NULL,
		origin_id VARCHAR(100) NOT NULL
	);";
	if (mysqli_query($con, $query)){
		echo "";
	}else{
		$message  = 'Invalid query: '.mysqli_error()."\n";
		$message .= 'Whole query: '.$query;
		die($message);
	}

	$query = "LOAD DATA LOCAL INFILE 'data/origin.csv'
	INTO TABLE origin
	FIELDS ENCLOSED BY '\"'
	TERMINATED BY ';'
	IGNORE 1 ROWS;";
	if (mysqli_query($con, $query)){
		echo "";
	}else{
		$message  = 'Invalid query: '.mysqli_error()."\n";
		$message .= 'Whole query: '.$query;
		die($message);
	}

	$query = "CREATE TABLE IF NOT EXISTS users (
		id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		login varchar(16) NOT NULL,
		passwd varchar(500) DEFAULT NULL,
		admin BOOLEAN,
		cart TEXT
	);";
	if (mysqli_query($con, $query)){
		echo "";
	}else{
		$message  = 'Invalid query: '.mysqli_error()."\n";
		$message .= 'Whole query: '.$query;
		die($message);
	}

	mysqli_close($con);

?>