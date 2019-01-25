<?php

namespace app\controllers;

use app\models\Articles;
use yii\web\Controller;

class ArticleController extends Controller
{
    public function actionIndex($name)
    {
        $article = new Articles();
        $article = $article->getOneArticle($name);
        return $this->render('index', compact('article'));
    }

}