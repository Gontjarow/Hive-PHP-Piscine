<?php
	$args = "";
	if ($argc > 1)
	{
		unset($argv[0]);
		$args = implode(" ", $argv);
	}

	echo shell_exec("who " . $args);
?>
