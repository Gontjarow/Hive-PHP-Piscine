<?php
	// print_r($argv);
	// var_dump(filter_var("$argv[1]", FILTER_VALIDATE_URL));
	if ($argc != 2)
	{
		echo "usage: url", "\n";
		exit(0);
	}

	$url = $argv[1];
	if (strpos($url, "http") === FALSE)
	{
		if (strpos($url, "www.") === FALSE)
			$url = "www." . $url;
		$url = "https://" . $url;
	}

	$rgx_ascii_url =
	'/' .
		'(https{0,1}):\/\/' .				// http(s)
		'([[:alnum:]]+\.{1}[[:alnum:]]+' .	// example.com
		'(?(?=\.).[[:alnum:]]+)' .			// www.example(.com)
		'((?(?=\/)\/.*|$)))' .				// /sub/sub/
	'/';

	if (!preg_match($rgx_ascii_url, $url, $url_makeup))
	{
		echo "That's not a URL, dummy.", "\n";
		exit(0);
	}

	print_r($url_makeup);
	// exit(0);

	$html = file_get_contents($url);

	$DOM = new DOMDocument();

	@$DOM->loadHTML($html); // 42 is butt
	// $DOM->saveHTMLFile("received.html");

	$tags = $DOM->getElementsByTagName("img");
	// echo "tag count: ", $tags->length, "\n";

	if($tags->length)
	{
		$folder = substr($url_makeup[2], 4);
		if (file_exists($folder) === FALSE)
			shell_exec("mkdir " . $folder);

		if (file_exists($folder) === FALSE)
		{
			echo "Could not create directory '$folder'\n";
			exit(0);
		}

		foreach ($tags as $img)
		{
			$src = $img->getAttribute("src");

			if ($src[0] == "/")
				$src = $url_makeup[1] . "://" . $url_makeup[2] . $src;

			$img_content = file_get_contents($src);
			if (!$img_content === FALSE)
				file_put_contents($folder . substr($src, strrpos($src, "/")), $img_content);
		}
	}
	else
		echo "No images found!\n";
?>
