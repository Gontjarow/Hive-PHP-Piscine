<?php

class UnholyFactory
{
	private $absorbed = [];

	public function absorb(&$something)
	{
		if ($something instanceof Fighter)
		{
			$name = $something->name;
			$names = array_column($this->absorbed, 'name');
			if (array_search($name, $names) !== FALSE)
			{
				echo '(Factory already absorbed a fighter of type ',$name,')', "\n";
			}
			else
			{
				$this->absorbed[] = $something;
				echo '(Factory absorbed a fighter of type ',$name,')', "\n";
			}
		}
		else
		{
			echo '(Factory can\'t absorb this, it\'s not a fighter)', "\n";
		}
		// print_r($this->absorbed);
	}

	public function fabricate($request)
	{
		// echo "\n\n\n", "\n";
		// print_r($this->absorbed);

		$units = array_column($this->absorbed, 'name');
		// print_r($units);
		if (($index = array_search($request, $units)) !== FALSE)
		{
			$name = $this->absorbed[$index]->name;
			echo '(Factory fabricates a fighter of type ',$name,')', "\n";
			return $this->absorbed[$index];
		}
		else
		{
			echo '(Factory hasn\'t absorbed any fighter of type ',strtolower($request),')', "\n";
			return NULL;
		}
	}
}

?>