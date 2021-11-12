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

	function upper(array $match): string
	{
		return strtoupper($match[0]);
	}

	function nupper(string &$string, int $offset, int $n)
	{
		for ($i = 0; $i < $n; ++$i)
		{
			$char = $string[$offset + $i];
			if (ctype_lower($char))
				$string[$offset + $i] = strtoupper($char);
		}
	}

	$file = file_get_contents($argv[1]);

	$rgx_title = '/title="\K.*?(?=")/s';
	$rgx_a_tags = '/<a .*?>(.*?)<\/a>/s';
	$rgx_a_inner = '/(.+?)(?=<)(.+?>)|.+?(?(?=<)|.+)/s';

	$file = preg_replace_callback($rgx_title, "upper", $file);

	preg_match_all($rgx_a_tags, $file, $tag_content, PREG_OFFSET_CAPTURE);

	foreach ($tag_content[1] as $content)
	{
		$base = $content[1];
		preg_match_all($rgx_a_inner, $content[0], $pieces, PREG_OFFSET_CAPTURE);

		$arrstr = $pieces[0][0][0];
		if (strpos($arrstr, "<") == FALSE)
		{
			$offset = $base + $pieces[0][0][1];
			nupper($file, $offset, strlen($arrstr));
		}
		else
		{
			foreach($pieces[1] as $fragment)
			{
				if (!empty($fragment))
				{
					$arrstr = $fragment[0];
					$offset = $base + $fragment[1];
					nupper($file, $offset, strlen($arrstr));
				}
			}
		}
	}
	echo $file;
?>
