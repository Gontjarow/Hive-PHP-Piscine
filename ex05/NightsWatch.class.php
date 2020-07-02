<?php

class NightsWatch
{
	private $fighters = [];

	public function recruit(&$someone)
	{
		if (array_key_exists('IFighter', class_implements($someone)))
			$this->fighters[] = $someone;
	}

	public function fight()
	{
		foreach ($this->fighters as $fighter)
			$fighter->fight();
	}
}

?>