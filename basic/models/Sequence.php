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
		 ['value', 'match', 'pattern' => '/^(\d{300,60000})$/', 'message' => 'Длина последовательности от 300 до 60000 символов.'],
		 ['value', 'required', 'message' => 'Длина последовательности минимум 300 симвовлов.']

		];
	}

}