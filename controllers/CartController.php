<?php

namespace app\controllers;

use app\models\Cart;
use app\models\Articles;
use app\models\Order;
use app\models\OrderArticles;
use yii\web\Controller;
use Yii;
use yii\helpers\Url;

class CartController extends Controller
{
    public function actionOpen(){
        $session = Yii::$app->session;
        $session->open();
        $order = new Order();
        if(!$session['cart.totalSum']){
            return Yii::$app->response->redirect(Url::to('/'));
        }
        if($order ->load(Yii::$app->request->post())){
            $order->date = date('Y-m-d H:m:s');
            $order->sum = $session['cart.totalSum'];
            if($order->save()){
                $currentID = $order -> id;
                $this->saveOrderInfo($session['cart'], $currentID);
                Yii::$app->mailer->compose('order-mail', ['session'=>$session, 'order'=>$order])
                    ->setFrom(['alicia-swan@mail.ru' => 'Test Test'])
                    ->setTo( $order->email)
                    ->setSubject('Ваш заказ принят')
                    ->send();
                return $this->render('success', compact( 'session','currentID', 'order'));
            }
        }
        return $this->render('add', compact('session', 'order'));
    }


    // собирает инфо из формы отправки и записывает в табл order_good
    protected function saveOrderInfo($articles, $orderId){

        foreach ($articles as $id=>$product){
            $orderInfo = new OrderArticles();
            $orderInfo->order_id = $orderId;
            $orderInfo->articles_id = $id;
            $orderInfo->name = $product['name'];
            $orderInfo->price = $product['price'];
            $orderInfo->quantity = $product['quantity'];
            $orderInfo->sum = $product['price']* $product['quantity'];
            $orderInfo->save();
        }

    }
    public function actionAdd($id){
        $session = Yii::$app->session;
        $session->open();
        $article = new Articles();
        $article = $article->getOneArticle($id);

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
        $order = new Order();
        if(!$session['cart.totalSum']){
            return Yii::$app->response->redirect(Url::to('/'));
        }
        if($order ->load(Yii::$app->request->post())){
            $order->date = date('Y-m-d H:m:s');
            $order->sum = $session['cart.totalSum'];
            if($order->save()){
                $currentID = $order -> id;
                $this->saveOrderInfo($session['cart'], $currentID);
                Yii::$app->mailer->compose('order-mail', ['session'=>$session, 'order'=>$order])
                    ->setFrom(['alicia-swan@mail.ru' => 'Test Test'])
                    ->setTo( $order->email)
                    ->setSubject('Ваш заказ принят')
                    ->send();
                return $this->render('success', compact( 'session','currentID', 'order'));
            }
        }
        $this->layout = 'empty-layout';
        return $this->render('add', compact( 'session','order'));
    }

}