<?php
/**
 * Created by PhpStorm.
 * User: Angélika
 * Date: 28/01/2019
 * Time: 14:13
 */

namespace app\models;
use yii\db\ActiveRecord;


class Order extends ActiveRecord
{

    public static function tableName()
    {
        return 'order';
    }
    //связывает табл order  и order_good по id и order_id
    public function getOrderArticles(){
        return $this->hasMany( OrderArticles::class, ['order_id'=> 'id']);
    }
    public function rules()
    {
        return [
            [['name', 'email', 'address', 'phone'], 'required'],
            [['email'], 'email'],
            [['name', 'email', 'address', 'phone'], 'string', 'max' => 45],
        ];
    }


    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'email' => 'Email',
            'address' => 'Address',
            'phone' => 'Phone',
        ];
    }
}