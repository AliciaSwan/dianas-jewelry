<?php

namespace app\controllers;

use app\models\Cart;
use app\models\Articles;
use yii\web\Controller;
use Yii;

class CartController extends Controller
{
    public function actionOpen(){
        $session = Yii::$app->session;
        $session->open();
        return $this->render('add', compact('session'));
    }
    public function actionAdd($id){
        $session = Yii::$app->session;
        $session->open();
        $article = new Articles();
        $article = $article->getOneArticle($id);

//        $id = Yii::$app->request->get('id');
//        $article =  Articles::findOne($id);
//        if(empty($article)) return false;
//        $session = Yii::$app->session;
//        $session->open();



        //$session->remove('cart');
        $cart = new Cart();
        $cart->addToCart($article);
        return true;
    }

    public function actionDelete($id){
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalcCart($id);
        return true;
       // return $this->render('add', compact( 'session'));
    }

}