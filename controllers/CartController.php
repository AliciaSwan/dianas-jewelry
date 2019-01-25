<?php

namespace app\controllers;

use app\models\Cart;
use app\models\Articles;
use yii\web\Controller;
use Yii;

class CartController extends Controller
{
    public function actionAdd($name){
        $article = new Articles();
        $article = $article->getOneArticle($name);
        $session = Yii::$app->session;
        $session->open();
        //$session->remove('cart');
        $cart = new Cart();
        $cart->addToCart($article);
        return $this->render('add', compact('article', 'session'));
    }

}