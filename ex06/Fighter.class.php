<?php

class Fighter
{
	public $name = "default";

	public function __construct(string $name)
	{
		$this->name = $name;
		// echo "constructed new $this->name", "\n";
	}
}

?>
