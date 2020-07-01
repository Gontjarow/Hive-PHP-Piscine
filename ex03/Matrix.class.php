<?php

class Matrix
{
	const IDENTITY = [
		[1.0, 0.0, 0.0, 0.0],
		[0.0, 1.0, 0.0, 0.0],
		[0.0, 0.0, 1.0, 0.0],
		[0.0, 0.0, 0.0, 1.0],
	];

	const RX = 'rx';
	const RY = 'ry';
	const RZ = 'rz';
	const SCALE = 'scale';
	const MATRIX = 'matrix';
	const TRANSLATION = 'translation';
	const PROJECTION = 'projection';
	private const PROJECTION_PARAMS = [
		'fov' => 1,
		'ratio' => 1,
		'near' => 1,
		'far' => 1
	];

	public $matrix = self::IDENTITY;
	public $is_identity = TRUE;

	static $verbose = FALSE;

	static function doc()
	{
		return file_get_contents(__DIR__ .'/'.'Matrix.doc.txt');
	}

	public function mult(Matrix $rhs) : Matrix
	{
		echo "---------- hooooooweeeeee ----------", "\n";
		$matrix = [
			[0.0, 0.0, 0.0, 0.0],
			[0.0, 0.0, 0.0, 0.0],
			[0.0, 0.0, 0.0, 0.0],
			[0.0, 0.0, 0.0, 0.0]
		];

		$y = 0;
		while ($y < 4)
		{
			$x = 0;
			while ($x < 4)
			{
				$matrix[$y][$x] = 0;
				$i = 0;
				while ($i < 4)
				{
					$matrix[$y][$x] += ($this->matrix[$y][$i] * $rhs->matrix[$i][$x]);
					++$i;
				}
				++$x;
			}
			++$y;
		}
		return new Matrix([self::MATRIX => $matrix]);
	}

	private function translation(Vector $vec)
	{
		if ($vec->x || $this->y || $this->z)
			$this->is_identity = FALSE;

		$this->matrix = [
			[1.0, 0.0, 0.0, $vec->x],
			[0.0, 1.0, 0.0, $vec->y],
			[0.0, 0.0, 1.0, $vec->z],
			[0.0, 0.0, 0.0, 1.0]
		];
	}

	private function scaleF(float $f)
	{
		if ($f != 1.0)
			$this->is_identity = FALSE;

		$this->matrix = [
			[$f,  0.0, 0.0, 0.0],
			[0.0, $f,  0.0, 0.0],
			[0.0, 0.0, $f,  0.0],
			[0.0, 0.0, 0.0, 1.0]
		];
	}

	private function scale(float $x, float $y, float $z)
	{
		if ($x != 1.0 || $y != 1.0 || $z != 1.0)
			$this->is_identity = FALSE;

		$this->matrix = [
			[$x,  0.0, 0.0, 0.0],
			[0.0, $y,  0.0, 0.0],
			[0.0, 0.0, $z,  0.0],
			[0.0, 0.0, 0.0, 1.0]
		];
	}

	private function rotate(string $axis, float $radians)
	{
		$this->is_identity = FALSE;
		$cos = cos($radians);
		$sin = sin($radians);
		if ($axis === 'x') $this->matrix = [
			[1.0,  0.0,   0.0, 0.0],
			[0.0, $cos, -$sin, 0.0],
			[0.0, $sin,  $cos, 0.0],
			[0.0,  0.0,   0.0, 1.0]
		];
		else if ($axis === 'y') $this->matrix = [
			[$cos,  0.0, $sin, 0.0],
			[0.0,   1.0,  0.0, 0.0],
			[-$sin, 0.0, $cos, 0.0],
			[0.0,   0.0,  0.0, 1.0]
		];
		else if ($axis === 'z') $this->matrix = [
			[$cos, -$sin, 0.0, 0.0],
			[$sin,  $cos, 0.0, 0.0],
			[ 0.0,   0.0, 1.0, 0.0],
			[ 0.0,   0.0, 0.0, 1.0]
		];
	}

	private function projection(float $fov, float $near, float $far, float $ratio)
	{
		$this->is_identity = FALSE;
		$scale = tan($fov * 0.5 * M_PI / 180) * $near;
		$r = $ratio * $scale;		$l = -$r;
		$t = $scale;				$b = -$t;
		$n = $near;					$f = $far;

		$this->matrix = [
			[2*$n/($r-$l),                 0.0,               0.0,  0.0],
			[0.0,                 2*$n/($t-$b),               0.0,  0.0],
			[($r+$l)/($r-$l),  ($t+$b)/($t-$b),  -($f+$n)/($f-$n), -1.0],
			[0.0,                          0.0,  -2*$f*$n/($f-$n),  0.0]
		];
	}

	// magic

	function __toString()
	{
		return sprintf("M | vtcX | vtcY | vtcZ | vtxO\n-----------------------------\nx | %.2f | %.2f | %.2f | %.2f\ny | %.2f | %.2f | %.2f | %.2f\nz | %.2f | %.2f | %.2f | %.2f\nw | %.2f | %.2f | %.2f | %.2f",
			$this->matrix[0][0], $this->matrix[0][1],$this->matrix[0][2],$this->matrix[0][3],
			$this->matrix[1][0], $this->matrix[1][1],$this->matrix[1][2],$this->matrix[1][3],
			$this->matrix[2][0], $this->matrix[2][1],$this->matrix[2][2],$this->matrix[2][3],
			$this->matrix[3][0], $this->matrix[3][1],$this->matrix[3][2],$this->matrix[3][3]);
	}

	function __construct(array $args = array())
	{
		print_r($args);
		if ($args[self::MATRIX])
		{
			$this->matrix = $args[self::MATRIX];
			if ($this->matrix !== self::IDENTITY)
			{
				$this->is_identity = FALSE;
				$arg = 'matrix';
			}
		}
		// else if (is_array($arg = count($args) ? array_keys($args)[0] : null))
		// {
		// 	echo "aaaaaaaa", "\n";
		// 	$this->matrix = $args[$arg];
		// }
		else if ($arg = $args['preset'])
		{
			if ($arg == self::PROJECTION)
			{
				$args = array_intersect_key($args, self::PROJECTION_PARAMS);
				$fov = $args['fov'] ?? 90;
				$near = $args['near'] ?? 0.1;
				$far = $args['far'] ?? 100.0;
				$ratio = $args['ratio'] ?? 1.33333333; // 640/480
				self::projection($fov, $near, $far, $ratio);
			}
			else if ($arg === self::SCALE)
			{
				if (isset($args['scale']))
					self::scaleF($args['scale']);
			}
			else if ($arg === self::TRANSLATION)
			{
				if (isset($args['vtc']))
					self::translation($args['vtc']);
			}
			else if (is_string($arg) && array_key_exists($arg, array_flip(['rx','ry','rz'])))
			{
				if (isset($args['angle']))
					self::rotate(substr($arg, -1), $args['angle']);
			}

			if (self::$verbose)
			{
				if ($this->is_identity)
					echo 'Matrix IDENTITY constructed.', "\n";
				else
					echo 'Matrix ', strtoupper((string)$arg), ' constructed.', "\n";
			}
		}
		else
		{
			if (self::$verbose) echo 'Matrix IDENTITY constructed.', "\n";
		}
	}

	function __destruct()
	{
		if (self::$verbose) echo 'Matrix instance destructed.', "\n";
	}
}

?>