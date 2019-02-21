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

<div class="welcomeMessage">
	Пожалуйста, напишите ниже свою последовательность из случайных цифр от 0 до 9, не короче 300 символов, и получите оценку того, насколько она случайна. Если вы не понимаете, что происходит и зачем это все нужно, посетите раздел <?= Html::a('W.T.F.', ['site/wtf']) ?> <br>
	Узнать средний результат всех пользователей можно в разделе "<?= Html::a('СТАТИСТИКА', ['site/statistic']) ?>"
</div>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'value')->textarea(['rows' => 15, 'id' => 'textSequence', 'type' => 'number' ]) ?>
<?= Html::Button('Отправить', ['class' => 'btn', 'id' => 'btnSender']) ?>
<?php $form::end(); ?>

<div id = "result"></div>