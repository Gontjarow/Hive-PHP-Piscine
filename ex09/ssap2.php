<?php
	unset($argv[0]);
	$joined = implode(" ", $argv);
	$split = explode(" ", $joined);
	$split = array_filter($split, "strlen");
	$split = array_filter($split, "trim");
	$split = array_values($split);

	// case sensitive
	// characters in alphabetical order
	// then numbers
	// finally all the other characters, all following the ASCII order

	foreach($split as $val)
	{
		if (is_numeric($val))
			$numbers[] = $val;
		else if (ctype_alnum($val))
			$alphabet[] = $val;
		else
			$other[] = $val;
	}

	sort($alphabet, SORT_STRING | SORT_FLAG_CASE);
	rsort($numbers, SORT_NUMERIC);
	sort($other, SORT_STRING);

	// print_r($alphabet);
	// print_r($numbers);
	// print_r($other);

	// $output = array();
	// array_push($output, $alphabet, $numbers, $other);
	// echo $output, "\n";

	foreach ($alphabet as $word)
		echo $word, "\n";
	foreach ($numbers as $word)
		echo $word, "\n";
	foreach ($other as $word)
		echo $word, "\n";
?>