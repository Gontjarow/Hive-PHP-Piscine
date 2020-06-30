<?php
require_once('Vertex.class.php');

class Vector
{
	// const PROPERTIES = array(
	// 	'_x' => 1,
	// 	'_y' => 1,
	// 	'_z' => 1,
	// 	'_w' => 1,
	// );

	private $_x;
	private $_y;
	private $_z;
	private $_w;

	static $verbose = FALSE;

	static function doc()
	{
		return file_get_contents(__DIR__ .'/'.'Vector.doc.txt');
	}

	function add(Vector $rhs) : Vector
	{
		return new Vector([
			'orig' => new Vertex(['x' => 0, 'y' => 0, 'z' => 0]),
			'dest' => new Vertex([
				'x' => $this->_x + $rhs->_x,
				'y' => $this->_y + $rhs->_y,
				'z' => $this->_z + $rhs->_z,
			])
		]);
	}

	function sub(Vector $rhs) : Vector
	{
		return new Vector([
			'orig' => new Vertex(['x' => 0, 'y' => 0, 'z' => 0]),
			'dest' => new Vertex([
				'x' => $this->_x - $rhs->_x,
				'y' => $this->_y - $rhs->_y,
				'z' => $this->_z - $rhs->_z,
			])
		]);
	}

	function crossProduct(Vector $rhs) : Vector
	{
		return new Vector([
			'orig' => new Vertex(['x' => 0, 'y' => 0, 'z' => 0]),
			'dest' => new Vertex([
				'x' => ($this->_y * $rhs->_z) - ($this->_z * $rhs->_y),
				'y' => ($this->_x * $rhs->_z) - ($this->_z * $rhs->_x),
				'z' => ($this->_x * $rhs->_y) - ($this->_y * $rhs->_x)
			])
		]);
	}
	function scalarProduct($scalar) : Vector
	{
		return new Vector([
			'orig' => new Vertex(['x' => 0, 'y' => 0, 'z' => 0]),
			'dest' => new Vertex([
				'x' => $this->_x * $scalar,
				'y' => $this->_y * $scalar,
				'z' => $this->_z * $scalar
			])
		]);
	}
	function normalize() : Vector
	{
		$mag = sqrt(
			($this->_x * $this->_x) +
			($this->_y * $this->_y) +
			($this->_z * $this->_z));

		return new Vector([
			'orig' => new Vertex(['x' => 0, 'y' => 0, 'z' => 0]),
			'dest' => new Vertex([
				'x' => $this->_x / $mag,
				'y' => $this->_y / $mag,
				'z' => $this->_z / $mag
			])
		]);
	}
	function opposite() : Vector
	{
		return $this->scalarProduct(-1);
	}
	function magnitude() : float
	{
		return sqrt(
			($this->_x * $this->_x) +
			($this->_y * $this->_y) +
			($this->_z * $this->_z));
	}
	function dotProduct(Vector $rhs) : float
	{
		return	($this->_x * $rhs->_x) +
				($this->_y * $rhs->_y) +
				($this->_z * $rhs->_z);
	}
	function cos(Vector $rhs) : float
	{
		//
	}

	// magic

	function __toString()
	{
		return sprintf("Vector( x:%.2f, y:%.2f, z:%.2f w:%.2f )",
			$this->_x, $this->_y, $this->_z, $this->_w);
	}

	function __construct(array $args = array())
	{
		$warn;
		if (!isset($args['orig']))
		{
			$warn = 'orig';
			$args['orig'] = new Vertex(['x' => 0, 'y' => 0, 'z' => 0]);
		}
		if (!isset($args['dest']))
		{
			$warn = $warn ? $warn.' and dest' : 'dest';
			$args['dest'] = new Vertex(['x' => 0, 'y' => 0, 'z' => 0]);
		}
		if (self::$verbose && $warn) echo 'Vector construct: ',$warn,' not defined!', "\n";

		$this->_x = $args['dest']->x - $args['orig']->x;
		$this->_y = $args['dest']->y - $args['orig']->y;
		$this->_z = $args['dest']->z - $args['orig']->z;
		$this->_w = 1.0;

		if (self::$verbose) echo "$this constructed.", "\n";
	}

	function __destruct()
	{
		if (self::$verbose) echo "$this destructed.", "\n";
	}
}

// Vector::$verbose = true;
// Vertex::$verbose = true;
// $test0 = new Vector(['dest' => new Vertex(['x' => 10])]);
// $test1 = new Vector();
// $idk = new Vector(['x' => 1]);
// echo $idk, "\n";

// $idk->z = 2;
// echo $idk->z, "\n";

// $test = $test;
// echo "hmm", "\n";
// $test = new Vector();
// echo $test, "\n";

// echo "-- dest1", "\n";
// $dest1 = new Vertex( array( 'x' => -12.34, 'y' => 23.45, 'z' => -34.56 ) );
// echo "-- vtc1", "\n";
// $vtc1  = new Vector( array( 'dest' => $dest1 ) );
// print ( 'vtc1' . $vtc1."\n");
// echo "-- output", "\n";
// print( 'opposite of $vtc1 is ' . $vtc1->opposite() . PHP_EOL );
// echo "-- end --", "\n";
?>
