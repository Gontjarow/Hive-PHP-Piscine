<?php
// connect to localhost and create database:
	$con = mysql_connect("localhost", "root", "password");
	if (!$con){
		die('Could not connect: ' . mysql_error());
	}
	$db = "rush00";
	$query = "CREATE DATABASE IF NOT EXISTS $db";
	if (mysql_query($con, $query)){
		echo "";
	}else{
		$message  = 'Invalid query: '.mysql_error()."\n";
		$message .= 'Whole query: '.$query;
		die($message);
	}
	mysql_close($con);
	$con = mysql_connect("localhost", "root", "password", "rush00");
	if (!$con){
		die('Could not connect: ' . mysql_error());
	}

	$query = "CREATE TABLE IF NOT EXISTS product (
		id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		name VARCHAR(50) NOT NULL,
		information TEXT NOT NULL,
		category_id
		origin_id
		img
	);"

?>