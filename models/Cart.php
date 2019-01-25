<?php


namespace app\models;


use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{
      public function addToCart($article){
          $_SESSION['cart'][$article->id] =[
              'name'=>$article['name'],
              'price'=>$article['price'],
              'img'=>$article['img'],
          ];
      }
}