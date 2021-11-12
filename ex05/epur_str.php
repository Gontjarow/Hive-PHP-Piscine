<?php
/*unset($argv[0]);	// $argv = array_slice($argv, 1);
$joined = implode(" ", $argv);				// Explode requires a string.
$split = explode(" ", $joined);				// Split by spaces.
print_r($split);
$split = array_filter($split, "strlen");	// Return strings with content.
$split = array_filter($split, "trim");		// Trim those.
print_r($split);

$split = array_values($split);				// Reset indexes
$max = count($split);

// echo "count: $max\n";
// print_r($split);

for ($i = 0; $i < $max;)
{
	echo $split[$i];
	// echo "loop$i";

	if (++$i != $max)
		echo " ";
	else
		break;
}
echo "\n";*/

	$split = explode(" ", $argv[1]);
	$split = array_filter($split, "strlen");
	$split = array_values($split);
	echo implode(" ", $split);
?>
