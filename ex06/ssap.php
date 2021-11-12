<?php
	// echo "original: ", print_r($argv);
	unset($argv[0]);	// $argv = array_slice($argv, 1);
	// echo "after unset: ", print_r($argv);
	$joined = implode(" ", $argv);				// Explode requires a string.
	$split = explode(" ", $joined);				// Split by spaces.
	// echo "exploded: ", print_r($split);
	$split = array_filter($split, "strlen");	// Return strings with content.
	$split = array_filter($split, "trim");		// Trim those.
	// echo "filtered: ", print_r($split);

	$split = array_values($split);				// Reset indexes.
	sort($split);

	foreach ($split as $word)
		echo $word, "\n";
?>