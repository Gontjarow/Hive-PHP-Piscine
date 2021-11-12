<?php
	if ($argc >= 2)
	{
		$string = $argv[1];
		$string = preg_replace("/\s+/", " ", $string);
		echo trim($string), "\n";
	}
?>
