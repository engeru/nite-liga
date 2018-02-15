<?php
/**
 * Created by PhpStorm.
 * User: Aleksei
 * Date: 13.02.2018
 * Time: 10:09
 */

namespace app\models;


use yii\db\ActiveRecord;

class Players extends ActiveRecord
{
    public static function tableName()
    {
        return 'tblplayer';
    }
}