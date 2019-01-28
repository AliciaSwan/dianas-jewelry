<?php

namespace app\models;
use yii\db\ActiveRecord;


class Order extends ActiveRecord
{

    public static function tableName()
    {
        return 'order';
    }

    public function rules()
    {
        return [
            [['name', 'email', 'adresse', 'phone'], 'required'],
            [['email'], 'email'],
            [['name', 'email', 'adresse', 'phone'], 'string', 'max' => 45],
        ];
    }


    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'email' => 'Email',
            'adresse' => 'Adresse',
            'phone' => 'Phone',
        ];
    }
}
