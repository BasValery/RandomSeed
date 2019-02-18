<?php

/* @var $this yii\web\View */
use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;
use yii\helpers\Html;
$this->title = 'RandomSeed';

$this->registerJsFile('@web/js/setSequence.js', ['depends' => 'yii\web\YiiAsset']);
$this->registerCssFile('@web/css/responce.css');
$this->registerCssFile('@web/css/loader.css');
?>

<h2>Проект Random Seed</h2>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'value')->textarea(['rows' => 15, 'id' => 'textSequence', 'type' => 'number' ]) ?>
<?= Html::Button('Отправить', ['class' => 'btn', 'id' => 'btnSender']) ?>
<?php $form::end(); ?>

<div id = "result"></div>