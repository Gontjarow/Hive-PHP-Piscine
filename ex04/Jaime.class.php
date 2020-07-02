<?php

include_once('Lannister.class.php');

class Jaime extends Lannister
{
	public function sleepWith(&$someone)
	{
		$name = get_class($someone);
		if ($someone instanceof Lannister)
		{
			if ($name == 'Cersei')
				echo "With pleasure, but only in a tower in Winterfell, then.\n";
			else
				echo "Not even if I'm drunk !\n";
		}
		else
			echo "Let's do this.\n";
	}
}

?>
