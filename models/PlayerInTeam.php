<?php
/**
 * Created by PhpStorm.
 * User: Aleksei
 * Date: 15.02.2018
 * Time: 13:51
 */

namespace app\models;


use yii\db\ActiveRecord;

class PlayerInTeam extends ActiveRecord
{
    public static function tableName()
    {
        return 'PlayerInTeam';
    }
}