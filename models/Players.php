<?php
/**
 * Created by PhpStorm.
 * User: Alexei
 * Date: 13.02.2018
 * Time: 16:53
 */

namespace app\models;


class Players extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'tblplayer';
    }

}