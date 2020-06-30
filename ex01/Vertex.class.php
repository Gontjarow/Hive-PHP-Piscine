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
		return sprintf("Vertex( x:%.2f, y:%.2f, z:%.2f w:%.2f, %s )",
			$this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
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
		$this->_w = 1.0;
		$this->_color = NULL;

		if (self::$verbose && !isset($args['x'], $args['y'], $args['z']))
			echo 'Vector construct: x, y, z not fully defined!', "\n";

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

// Vertex::$verbose = true;
// $idk = new Vertex(['x' => 1]);
// echo $idk, "\n";

// $idk->z = 2;
// echo $idk->z, "\n";
// echo "color:", $idk->color, "\n";

// $test = new Color(['rgb' => 0xFFAABB, 'verbose' => TRUE]);
// $test = $test;
// echo "hmm", "\n";
// $test = new Vertex();
// echo $test, "\n";
?>
