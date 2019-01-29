<?php

namespace app\models;
use yii\db\ActiveRecord;


class OrderArticles extends ActiveRecord
{
    public static function tableName()
    {
        return 'order_articles';
    }
    //связывает табл order  и order_good по id и order_id ( получает id продукта в заказе
    public function getOrder(){
        return $this->hasOne( Order::class, ['id'=> 'order_id']);
    }

    public function rules()
    {
        return [
            [['order_id', 'articles_id'], 'required'],
            [['order_id', 'articles_id', 'price', 'quantity', 'sum'], 'integer'],
            [['name'], 'string', 'max' => 125],
        ];
    }
}