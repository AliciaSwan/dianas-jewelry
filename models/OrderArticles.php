<?php

namespace app\models;

use yii\db\ActiveRecord;

class OrderArticles extends ActiveRecord
{

    public static function tableName()
    {
        return 'order_articles';
    }

    public function rules()
    {
        return [
            [['order_id', 'articles_id', 'name', 'price', 'quantity', 'sum'], 'required'],
            [['order_id', 'articles_id', 'name', 'price', 'quantity', 'sum'], 'string', 'max' => 45],
        ];
    }
}
