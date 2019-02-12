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
	private $repeated = array();
	
	function __construct(string $sequence)
	{
		$this->sequence = $sequence;
		$this->findValue();
		$this->findDispersion();

		for ($i=2; $i <= 5; $i++) { 
			$this->findRepeated($i);
		}
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

	private function findRepeated($count)
	{
		$temp = $this->sequence;
		$average = 0;

		While(strlen( $temp) > $count){
		$average += substr_count( $temp, substr($temp, 0, $count)); 
		$temp = str_replace($temp,substr($temp, 0, $count), "");
		}

		$average /= (strlen($this->sequence)/$count);

		$this->repeated[$count] = $average;
	}

	public function getExpectedRepeated($count)
	{
		if($count < 0 || $count > 5)
			return;
		return strlen($this->sequence) / pow(10,$count);
	}

	public function getRepeatedMark($count)
	{
		if($count < 0 || $count > 5)
			return;

		$expect = $this->getExpectedRepeated($count);

		return $this->getMark(2, $this->repeated[2], $expect);
	}
	public function getRepeated($count)
	{
		if($count < 0 || $count > 5)
			return;

		return $this->repeated[$count];
	}

}