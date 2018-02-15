<?php
/**
 * Created by PhpStorm.
 * User: Alexei
 * Date: 10.02.2018
 * Time: 0:46
 */

namespace app\controllers;

use app\models\Config;
use Yii;
use yii\web\Controller;

class GameEditorController  extends Controller
{
    public $layout = 'main';

    public function actionIndex(){

        return $this->render('index');
    }

    public function actionSave(){

    }

    public function actionEdit(){

    }

}