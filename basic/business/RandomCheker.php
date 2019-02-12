<?php 

namespace app\business;

/**
 * 
 */
class RandomCheker
{
	public static $expectedValue = 4.5;
	public static $expectedDispersion = 8.3;

	private $sequence;
	private $dispersion;
	private $value;


	 
	
	function __construct(string $sequence)
	{
		$this->sequence = $sequence;
		$this->findValue();
		$this->findDispersion();
	}

	private function findValue()
	{
		$length = strlen($this->sequence);
		$sum = 0;
		for ($i=0; $i < $length; $i++) { 
			$sum+= $this->sequence[$i];
		}
		$this->value = $sum/$length;
	}

	private function findDispersion()
	{
		$length = strlen($this->sequence);
		$sum = 0;
		for ($i=0; $i < $length; $i++) { 
			$sum+= pow($this->sequence[$i] - $this->value, 2);
		}

		$this->dispersion = $sum/$length;
	}

	public function getValue()
	{
		return $this->value;
	}

	public function getDispersion()
	{
		return $this->dispersion;
	}

	public function getValueMark()
	{
		return $this->getMark(1.5, $this->value, self::$expectedValue);	
	}

	public function getDispersionMark()
	{
		return $this->getMark(2, $this->dispersion, self::$expectedDispersion);	
	}

	private function getMark($maxDiff, $estimated, $expected){
		$diff = abs( $expected- $estimated);
		if($diff > $maxDiff)
			return 0;

		if($diff == 0)
			return 100;

		return round(100 - $diff/$maxDiff*100);
	}
}