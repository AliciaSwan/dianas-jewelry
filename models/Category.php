<?php
/**
 * Created by PhpStorm.
 * User: Angélika
 * Date: 23/01/2019
 * Time: 22:44
 */

namespace app\models;


use yii\db\ActiveRecord;

class Category extends ActiveRecord
{

    public static function tableName()
    {
        return 'category';
    }
    public function getAllCategories(){
        return Category::find()->asArray()->all();
    }
}