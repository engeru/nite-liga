<?php
/**
 * Created by PhpStorm.
 * User: Aleksei
 * Date: 15.02.2018
 * Time: 13:39
 */

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="row">
    <div class="col-sm-4">
        <?= GridView::widget([
            'dataProvider' => $dataProviderPlayers,
            'columns' => [
                [
                    'attribute' =>'vkid',
                    'header' => 'VK ID'
                ],
                [
                    'value' => function($model){
                        return $model->fName.' '.$model->lName;
                    },
                    'header' => 'Имя'
                ],
                [
                    'attribute' => 'curTeam',
                    'header' => 'Команда',
                ]
            ]
        ])?>
    </div>
    <div class="col-sm-4">
<!--        --><?//= GridView::widget([
//            'dataProvider' => $dataProviderTeams,
//            'columns' => [
//                [
//                    'attribute' =>'vkid',
//                    'header' => 'VK ID'
//                ],
//                [
//                    'value' => function($model){
//                        return $model->fName.' '.$model->lName;
//                    },
//                    'header' => 'Имя'
//                ],
//                [
//                    'attribute' => 'curTeam',
//                    'header' => 'Команда',
//                ]
//            ]
//        ])?>
    </div>
</div>