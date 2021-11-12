<?php
	function ft_is_sort(array $strings) : bool
	{
		$sorted = $strings;
		sort ($sorted);
		return ($sorted === $strings);
	}
?>
