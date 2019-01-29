<?php

namespace app\controllers;

use app\models\Articles;
use yii\web\Controller;

class ArticleController extends Controller
{
    public function actionIndex($id)
    {
        $article = new Articles();
        $article = $article->getOneArticle($id);
        return $this->render('index', compact('article'));
    }


}