<?php

class Staistic extends ActiveRecord
{
	static public function AddToStatistic($value)
	{
	
		$record = self::find()->one();

		if($record == NULL)
		{
			$instance->average = $value;
			$instance->count = 1;
			$instance->save();
		}
		else
		{
			$instance = new Staistic();
			$average = $record->average;
			$average /= $record->count;
			$average += $value;
			$record->count++;
			$record-> $average/$count;
			$record->save();
		}
	}
}