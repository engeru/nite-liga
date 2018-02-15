<?php
/**
 * Created by PhpStorm.
 * User: Alexei
 * Date: 13.02.2018
 * Time: 17:28
 */

namespace app\models;

use yii\db\ActiveRecord;

class Games extends ActiveRecord
{
    public static function tableName(){
        return 'tblgame';
    }
}