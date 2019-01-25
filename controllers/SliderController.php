<?php

namespace app\controllers;
use yii\web\Controller;

class SliderController extends Controller
{
    public function actionIndex(){
        return $this->render('index');
    }

}