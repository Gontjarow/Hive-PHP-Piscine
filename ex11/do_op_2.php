<?php
	if ($argc != 2)
	{
		echo "Incorrect Parameters\n";
		exit(0);
	}

	$numbers = preg_split("/(?<!^)[\+\-\*\/\%](?!\d)/", $argv[1]);
	$numbers = array_filter($numbers, "strlen");
	$numbers = array_values($numbers);

	$operator = preg_split("/(\+|\-)*\d*/", $argv[1]);
	$operator = array_filter($operator, "strlen");
	$operator = implode("", $operator);

	$num1 = trim($numbers[0]);
	$sign = trim($operator);
	$num2 = trim($numbers[1]);

	$operator = preg_match_all("/\*{2}|[\+\-\*\/\%]/", $sign);

	if (!is_numeric($num1) || $operator != 1 || !is_numeric($num2))
	{
		echo "Syntax Error\n";
		exit(0);
	}

	if ($sign === "+")
		echo $num1 + $num2, "\n";
	else if ($sign === "-")
		echo $num1 - $num2, "\n";
	else if ($sign === "*")
		echo $num1 * $num2, "\n";
	else if ($sign === "/")
		echo @($num1 / $num2), "\n";
	else if ($sign === "%")
		echo $num1 % $num2, "\n";
	else if ($sign === "**")
		echo $num1 ** $num2, "\n";
	else
		echo "Syntax Error\n";
?>
