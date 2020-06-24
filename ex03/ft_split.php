<?php
	function ft_split(string $input) : array
	{
		$words = explode(" ", $input);
		sort($words);
		return $words;
	}
?>
