<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Nite liga';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Nite liga</h1>

        <p class="lead">Нажмите, чтобы создать игру</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Создать игру</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Участники</h2>

                <p>Раздел с общей информацией о командах, участниках, проведённых играх...</p>
                <p><?= Html::a('Перейти', ['players-info'], ['class' => 'btn btn-default']) ?></p>
            </div>
            <div class="col-lg-4">
                <h2>Настройки</h2>

                <p>Выбор и запуск игры, настройка параметров запуска, управоение игровым процессом...</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Перейти</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Регистрация команд</h2>

                <p>Заявки участников, распределение участников по командам, создание команд...</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Перейти</a></p>
            </div>
        </div>

    </div>
</div>
