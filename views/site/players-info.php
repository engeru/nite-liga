<?php
/**
* Created by PhpStorm.
 * User: Alexei
* Date: 13.02.2018
* Time: 16:56
*/
use \yii\grid\GridView;

?>
<div class="row">
    <div class="col-sm-4">
        <?= GridView::widget([
            'dataProvider' => $dataProviderPlayers,
            'columns' => [
                [
                    'attribute' => 'vkid',
                    'header' => 'ID'
                ],
                [
                    'header' => 'Имя',
                    'value' => function($model){
                        return $model->fName.' '.$model->lName;
                    }
                ],
                [
                    'attribute' => 'curTeam',
                    'header' => 'ID команды'
                ],
            ]
        ]);?>
    </div>
    <div class="col-sm-8">
        <?= GridView::widget([
            'dataProvider' => $dataProviderGames,
            'columns' => [

            ]
        ]);?>
    </div>
</div>



