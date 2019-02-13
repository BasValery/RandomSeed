<?php 

namespace app\business;

/**
 * 
 */
class RandomCheker
{
	public const expectedValue = 4.5;
	public const expectedDispersion = 8.3;
	private const repeatedSequenceCount = 5;
	private const indicatorsCounts = 7;
	private const repeatedSequenceStartCount = 2;

	private $sequence;
	private $dispersion;
	private $value;
	private $repeated = array();
	
	function __construct(string $sequence)
	{
		$this->sequence = $sequence;
		$this->findValue();
		$this->findDispersion();

		for ($i=self::repeatedSequenceStartCount; $i <= self::repeatedSequenceCount; $i++) { 
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
		return $this->getMark(1.5, $this->value, self::expectedValue);	
	}

	public function getDispersionMark()
	{
		return $this->getMark(2, $this->dispersion, self::expectedDispersion);	
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
		
		$repitationRank = 0;
		$len = strlen($this->sequence);
		$repeatedSequence = str_repeat("0", $count);
		$permutationArray;
		$allPermutations = pow(10, $count);

	

		$this->repeated[$count] =$sequenceDispersion/($allPermutations-1);
	}

	

	public function getRepeatedMark($count)
	{
		
		if($count >= self::repeatedSequenceStartCount 
		&& $count <= self::repeatedSequenceCount)
			return $this->repeated[$count];

	}

	public function getTotalScore()
	{
		$average = 0;
		$average += $this->getValueMark();
		$average += $this->getDispersionMark();
		for ($i=self::repeatedSequenceStartCount; $i <= self::repeatedSequenceCount; $i++){
		$average += $this->getRepeatedMark($i);
		}

		$average/= self::indicatorsCounts;
		return round($average);
	}

}