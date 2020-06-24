<?php
	if ($argc != 2)
	{
		echo "usage: url\n";
		exit(0);
	}

	/* Would work if HTML wasn't broken.
	$DOM = new DOMDocument();
	$DOM->load($argv[1]);

	$tags = $DOM->getElementsByTagName("a");
	if(count($tags))
	{
		foreach ($tags as $tag)
		{
			$tag->nodeValue = strtoupper($tag->nodeValue);
			print_r($tag);
		}
		$DOM->saveHTMLFile("test.html");
	}
	else
		echo "No tags found!\n";
	*/

	$file = file_get_contents($argv[1]);

	$file = preg_replace_callback(
		"/<a.*?>\K.*?<|title=\K\".*\"/",
		function ($m)
		{
			return strtoupper($m[0]);
		},
		$file);

	echo $file;
?>
