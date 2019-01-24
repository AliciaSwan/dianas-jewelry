<?php
/**
 * Created by PhpStorm.
 * User: Angélika
 * Date: 23/01/2019
 * Time: 17:49
 */

namespace app\models;

use yii\db\ActiveRecord;
use Yii;

class Articles extends ActiveRecord
{
    public static function tableName()
    {
        return 'articles';
    }
    public function getAllArticles(){
        $articles = Yii::$app->cache->get('articles');
        if(!$articles) {
            $articles = Articles::find()->asArray()->all();
            Yii::$app->cache->set('articles', $articles, 60);
        }
        return $articles;
    }
     public function getArticleCategory($id){
        $catArticles = Articles::find()->where(['category-name' => $id])->asArray()->all();
        return $catArticles;
     }


}