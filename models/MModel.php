<?php
/**
 * Created by PhpStorm.
 * User: Alexei
 * Date: 18.02.2018
 * Time: 2:15
 */

namespace app\models;

use yii\db\ActiveRecord;

class MModel extends ActiveRecord
{
    public static function getDb(){
        return Yii::$app->db;
    }
}