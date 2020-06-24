<?php
	while (1)
	{
		print "Enter a number: ";
		$input = fgets(STDIN, 4096);
		$input = trim($input);

		if (feof(STDIN))
			exit(0);

		if (is_numeric($input))
		{
			if ($input % 2)
				print "The number $input is odd\n";
			else
				print "The number $input is even\n";
		}
		else
			print "'$input' is not a number\n";
	}
?>
