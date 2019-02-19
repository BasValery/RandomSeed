<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\business\RandomCheker;
use app\models\Sequence;
use app\models\Statistic;

class SiteController extends Controller
{
	private static $delay = 30;

    public function actionIndex()
    {
    	$model = new Sequence();
        return $this->render('index', compact('model'));
    }

    public function actionStatistic()
    {
        $average = Statistic::find()->one()->average;

        return $this->render('statistic', compact('average'));
    }

    public function actionTextresiver()
    {
    	set_time_limit (180);
    	$text = Yii::$app->request->post('text');
    	$ip =  Yii::$app->request->userIP;
    	$requestTime = date("Y-m-d H:i:s");  


    	if(!$this->frequencyValidatiton($requestTime, $ip))
    	{
    		$responseError = "Вы отправляете последовательности слишком часто!";
    		return $this->renderAjax('error', compact('responseError'));
    	}

  		if(!$this->uniqueValidatiton($text))
    	{
    		$responseError = "Такая последовательность уже существует";
    		return $this->renderAjax('error', compact('responseError'));
    	}
    	
    	
    	
    	$sequence = new Sequence();
    	$sequence->value = $text;
    	$sequence->request_time = $requestTime;
    	$sequence->ip = $ip;

    	if (!$sequence->validate()) { 
			$responseError = "Некорректная последовательность.";
    		return $this->renderAjax('error', compact('responseError'));
    	}
    	$randomCheker = new RandomCheker($text); 
    	Statistic::AddToStatistic($randomCheker->getTotalScore());
    	$sequence->save();


    	return $this->renderAjax('success', compact('randomCheker'));
    }

    private function uniqueValidatiton($text)
    {
    	$unic = Sequence::find()
    			->where(['value' => $text])
    			->count();
    	if($unic != 0)
    	{
    		
    		return false;
    	}

    	return true;
    }

    private function frequencyValidatiton($requestTime, $ip)
    {
    	$lastTransaction = Sequence::find()
    					->Where(['ip' => $ip])
    					->orderBy(['request_time'  => SORT_DESC])
    					->one();
    	if($lastTransaction == NULL)
    		return true;
    	if(strtotime($requestTime) - strtotime($lastTransaction->request_time) < $this::$delay)
    	{
    		
    		return false;
    	}

    	return true;
    }
 
}
