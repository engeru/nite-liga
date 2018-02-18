<?php
/**
 * Created by PhpStorm.
 * User: Aleksei
 * Date: 14.02.2018
 * Time: 14:26
 */

namespace app\models;


use yii\db\ActiveRecord;

class Config extends ActiveRecord
{
    public function rules(){
        return [
        ];
    }
    public static function getArg($arg){
        return Config::find()->select(['val'])->where(['arg' => $arg])->column()[0];
    }
}