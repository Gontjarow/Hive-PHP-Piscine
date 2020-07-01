<?php
require_once('Color.class.php');

class Vertex
{
	const PROPERTIES = array(
		'_x' => 1,
		'_y' => 1,
		'_z' => 1,
		'_w' => 1,
		'_color' => 1
	);

	private $_x;
	private $_y;
	private $_z;
	private $_w;
	private $_color;

	static $verbose = FALSE;

	static function doc()
	{
		return file_get_contents(__DIR__ .'/'.'Vertex.doc.txt');
	}

	function __toString()
	{
		if (self::$verbose)
		{
			return sprintf("Vertex( x:%.2f, y:%.2f, z:%.2f w:%.2f, %s )",
				$this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
		}
		else
		{
			return sprintf("Vertex( x:%.2f, y:%.2f, z:%.2f w:%.2f )",
				$this->_x, $this->_y, $this->_z, $this->_w);
		}
	}

	public function __get($key)
	{
		$key = '_' . $key;
		if (key_exists($key, self::PROPERTIES))
			return $this->$key;
	}

	public function __set($key, $val)
	{
		$key = '_' . $key;
		if (key_exists($key, self::PROPERTIES))
			$this->$key = $val;
	}

	function __construct(array $args = array())
	{
		$this->_x = 0.0;
		$this->_y = 0.0;
		$this->_z = 0.0;
		$this->_w = 0.0;
		$this->_color = NULL;

		foreach ($args as $key => $val)
		{
			$key = '_' . $key;
			if (key_exists($key, self::PROPERTIES))
				$this->$key = $val;
			else if ($key == 'verbose')
				self::$verbose = $val;
		}

		$this->color = $this->color ?? new Color(['rgb' => 0xFFFFFF]);

		if (self::$verbose) echo "$this constructed.", "\n";
	}

	function __destruct()
	{
		if (self::$verbose) echo "$this destructed.", "\n";
	}
}

?>
