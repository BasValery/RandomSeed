<?php

class Staistic extends ActiveRecord
{
	static public function AddToStatistic($value)
	{
		$instance = new Staistic();
		$record = self::find()->one();

		if($record == NULL)
		{
			$instance->average = $value;
			$instance->count = 1;
			$instance->save();
		}
		else
		{
			$average = $record->average;
			$average /= $record->count;
			$average += $value;
			$record->count++;
			$record-> $average/$count;
			$record->save();
		}
	}
}