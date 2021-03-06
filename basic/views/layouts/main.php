<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url; 
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="google-site-verification" content="C6yN-Hg0pR0rhbHFJn-iWM_5QnnrRAKArqmtMhlw1kM" />
    <meta name="description" content="Сервис для оценки случайности последовательностей сгенерированных человеком" >
    <meta name="keywords" content="случайные числа, генератор случайных чисел, статистика, исследование">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>



<div class="wrap">
<div class="titleTop">
	<h1>
		Random Seed
	</h1>
</div>
    <?php
    NavBar::begin([
        'options' => [

            'class' => 'navbar mynav navbar-default',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav '],
        'items' => [
            ['label' => 'ГЛАВНАЯ', 'url' => [ Url::toRoute('site/index')]],
            ['label' => 'СТАТИСТИКА', 'url' => [Url::toRoute('site/statistic')]],
            ['label' => 'W.T.F.', 'url' => [Url::toRoute('site/wtf')]]
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
      
        <?= $content ?>
    </div>
</div>
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Random Seed 2019</p>

        <p class="pull-right">Telegram: <?php echo Html::a('@ValeryBas', 'https://t.me/ValeryBas') ?></p>
    </div>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
