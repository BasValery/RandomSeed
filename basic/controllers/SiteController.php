<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;

use app\models\Sequence;

class SiteController extends Controller
{

    public function actionIndex()
    {
    	$model = new Sequence();
        return $this->render('index', compact('model'));
    }

    public function actionTextresiver()
    {
    	$request = Yii::$app->request;
    	return $request->post('text');
    }
 
}
