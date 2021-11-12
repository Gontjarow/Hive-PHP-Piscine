<?php
	$split = explode(" ", $argv[1]);
	// print_r($split);
	$split = array_filter($split, "strlen");
	$first = array_shift($split);
	$split[] = $first;

	echo implode(" ", $split);
?>