<?php

class Color
{
	const COLOR_VARS = array(
		'red' => 1,
		'green' => 1,
		'blue' => 1
	);

	static $verbose = FALSE;

	public $red;
	public $green;
	public $blue;

	static function doc()
	{
		return file_get_contents(__DIR__ .'/'.'Color.doc.txt');
	}

	function add(Color $rhs)
	{
		$red = min(255, $this->red + $rhs->red);
		$green = min(255, $this->green + $rhs->green);
		$blue = min(255, $this->blue + $rhs->blue);
		return new Color( array(
			'rgb' => $red << 16 | $green << 8 | $blue
		));
	}

	function sub(Color $rhs)
	{
		$red = max(0, $this->red - $rhs->red);
		$green = max(0, $this->green - $rhs->green);
		$blue = max(0, $this->blue - $rhs->blue);
		return new Color( array(
			'rgb' => $red << 16 | $green << 8 | $blue
		));
	}

	function mult($factor)
	{
		$red = max(0, min(255, $this->red * $factor));
		$green = max(0, min(255, $this->green * $factor));
		$blue = max(0, min(255, $this->blue * $factor));
		return new Color( array(
			'rgb' => $red << 16 | $green << 8 | $blue
		));
	}

	function __toString()
	{
		return sprintf("Color( r:%3u, g:%3u, b:%3u )",
			$this->red, $this->green, $this->blue);
	}

	function __construct(array $args = array())
	{
		if (key_exists('rgb', $args))
		{
			$val = $args['rgb'];
			$this->red = ($val >> 16) & 0xFF;
			$this->green = ($val >> 8) & 0xFF;
			$this->blue = $val & 0xFF;
		}
		foreach ($args as $key => $val)
		{
			if (key_exists($key, self::COLOR_VARS))
				$this->$key = $val & 0xFF;
			else if ($key == 'verbose')
				self::$verbose = $val;
		}

		if (self::$verbose) echo "$this constructed.", "\n";
	}

	function __destruct()
	{
		if (self::$verbose) echo "$this destructed.", "\n";
	}
}

?>
