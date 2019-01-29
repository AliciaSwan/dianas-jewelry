<?php


namespace app\models;
use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{

      public function addToCart($article){
          if (isset($_SESSION['cart'][$article->id])){
              $_SESSION['cart'][$article->id]['quantity']+= 1;
          }else{
              $_SESSION['cart'][$article->id] = [
                  'quantity'=>1,
                  'name'=>$article['name'],
                  'price'=>$article['price'],
                  'img'=>$article['img'],
                  'description'=>$article['description'],
              ];
          }
          $_SESSION['cart.totalQuantity']=isset($_SESSION['cart.totalQuantity'])? $_SESSION['cart.totalQuantity'] + 1 :1;
          $_SESSION['cart.totalSum']=isset($_SESSION['cart.totalSum'])? $_SESSION['cart.totalSum'] + $article->price : $article->price;

      }
      public function recalcCart($id){
          $quantity = $_SESSION['cart'][$id]['quantity'];
          $price = $_SESSION['cart'][$id]['price']*$quantity;
          $_SESSION['cart.totalQuantity'] -= $quantity;
          $_SESSION['cart.totalSum'] -= $price;
          unset($_SESSION['cart'][$id]);
      }
}