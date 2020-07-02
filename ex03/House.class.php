<?php
abstract class House
{
	public function introduce()
	{
		echo $this->getHouseName() . ' of ' . $this->getHouseSeat() . ' : "' . $this->getHouseMotto() . "\"\n";
	}
}
?>