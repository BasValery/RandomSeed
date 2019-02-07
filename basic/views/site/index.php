<?php

/* @var $this yii\web\View */
use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;
use yii\helpers\Html;
$this->title = 'RandomSeed';

?>

<h2>Проект Random Seed</h2>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'value')->textarea(['rows' => 15]) ?>
<?= Html::Button('Отправить', ['class' => 'btn', 'onClick' => 'sendSequence()']) ?>
<?php $form::end(); ?>