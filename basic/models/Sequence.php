<?php 

namespace app\models;

use yii\db\ActiveRecord;
/**
 * 
 */
class Sequence extends ActiveRecord
{
	public function attributeLabels()
	{
		return [
			'value' => 'Последовательность'
		];
	}

	public function rules(){
		return[
		 ['value', 'match', 'pattern' => '/^(\d{300,})$/', 'message' => 'Длина последовательности минимум 300 симвовлов.']
		];
	}

}