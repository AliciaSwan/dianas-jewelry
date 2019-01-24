<?php
/**
 * Created by PhpStorm.
 * User: Angélika
 * Date: 23/01/2019
 * Time: 17:33
 */

namespace app\controllers;

use app\models\Articles;
use yii\web\Controller;

class CategoryController extends Controller
{
    public function actionIndex(){
        $articles = new Articles();
        $articles = $articles->getAllArticles();
        return $this->render('index', compact('articles'));
    }

    public function  actionProduct($id){
        $catArticles = new Articles();
        $catArticles = $catArticles->getArticleCategory($id);
        return $this->render('product', compact('catArticles'));
    }

}