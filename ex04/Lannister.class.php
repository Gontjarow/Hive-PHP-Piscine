<?php

class Lannister
{
	public function sleepWith(&$someone)
	{
		if ($someone instanceof Lannister)
			echo "Not even if I'm drunk !\n";
		else
			echo "Let's do this.\n";
	}
}

?>
