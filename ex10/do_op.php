<?php
	// print_r($argv);

	if ($argc != 4)
	{
		echo "3 arguments, dummy.\n";
		exit(0);
	}

	$num1 = trim($argv[1]);
	$sign = trim($argv[2]);
	$num2 = trim($argv[3]);

	if (!is_numeric($num1) || !is_numeric($num2))
	{
		echo "This isn't algebra!\n";
		exit(0);
	}

	if ($sign === "+")
		echo $num1 + $num2, "\n";
	else if ($sign === "-")
		echo $num1 - $num2, "\n";
	else if ($sign === "*")
		echo $num1 * $num2, "\n";
	else if ($sign === "/")
		echo $num1 / $num2, "\n";
	else if ($sign === "%")
		echo $num1 % $num2, "\n";
	else if ($sign === "**")
		echo $num1 ** $num2, "\n";
	else
		echo "How's that supposed to work?\n";
?>
