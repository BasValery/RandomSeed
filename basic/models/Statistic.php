<?php
namespace app\models;

use yii\db\ActiveRecord;
/**
 * 
 */
class Statistic extends ActiveRecord
{
	static public function AddToStatistic($value)
	{
	
		$record = self::find()->one();

		if($record == NULL)
		{
			$instance = new Statistic();
			$instance->average = $value;
			$instance->count = 1;
			$instance->save();
		}
		else
		{	
			$average = $record->average;
			$count = $record->count;
			$average *= $count;
			$average += $value;
			$count++;
			$average /=$count;


			$record->count = $count;
			$record->average = $average;
			$record->save();
		}
	}
}