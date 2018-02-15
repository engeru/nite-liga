<?php
/**
 * Created by PhpStorm.
 * User: Aleksei
 * Date: 14.02.2018
 * Time: 16:08
 */

namespace app\models;


use yii\base\Model;

class TestForm extends Model
{
    public $tmHint;
    public $tmAddr;
    public $tmDrop;
    public $tmDelay;
    public $teams;
    public $setDefault;

    public function rules(){
        return [
            [['tmHint', 'tmAddr', 'tmDrop', 'tmDelay'], 'number', 'max' => 600, 'min' => 10],
            [['setDefault'], 'boolean']
        ];
    }

}