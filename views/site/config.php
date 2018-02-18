<?php
/**
 * Created by PhpStorm.
 * User: Aleksei
 * Date: 14.02.2018
 * Time: 14:34
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\grid\GridView;
$script = <<<JS
    function showTestForm() {
      console.log('showTestForm');
      $('#test-form').toggle();
    }
    
    function runTest() {
        console.log('runTest'); 
    }
    
    function runGame() {
        console.log('runGame');
    }
JS;

$this->registerJS($script, 3);
?>
<h2>Настройки</h2>
<div class="row">
    <div class="col-sm-3 text-info">
        <h4>Выбор игры</h4>
        <?= phpversion()?>
    </div>
    <div class="col-sm-5 text-info">
        <h4>Параметры запуска</h4>
    <?= GridView::widget([
        'dataProvider' => $dataProviderConfig,
        'columns' => [
            [
                'attribute' =>'descr',
                'header' => 'Свойство',
                'options' => ['
                    style' =>'text-overflow: ellipsis'
                ]
            ],
            [
                'attribute' =>'val',
                'class' => \kartik\grid\EditableColumn::className(),
                'header' => 'Значение'
            ],
        ]
    ])?>
    </div>
    <div class="col-sm-4 text-info">
        <?php if ($isGameOn) { ?>
            <h2>Игра запущена</h2>
            <?= Html::a('Остановить игру', 'index.php?r=site%2Fstop-game', ['class' => 'btn btn-danger'])?><br>
        <?php } else { ?>
            <div class="row">
                <div class="col-sm-8">
                    <h4>Перед запуском игры проверьте параметры </h4>
                    <?= Html::button('Запустиь игру', ['onclick' => 'runGame()', 'class' => 'btn btn-success'])?>
                    <?= Html::button('Запуск теста', ['onclick' => 'showTestForm()','class' => 'btn btn-default'])?><br>
                </div>
            </div>
            <?php $testForm = ActiveForm::begin(['options' => ['id' => 'test-form', 'style' => 'display:none;']]) ?>
            <div class="row">
                <div class="col-sm-3">
                    <br><br>
                    <p><i>Укажите параметры времени тестового запуска (сек)</i></p>

                </div>
                <div class="col-sm-5">
                    <br>
                    <?= $testForm->field($model, 'tmHint')->label(false)->textInput(['placeholder' => 'до подсказки', 'style' =>'text-overflow: ellipsis']) ?>
                    <?= $testForm->field($model, 'tmAddr')->label(false)->textInput(['placeholder' => 'до адреса', 'style' =>'text-overflow: ellipsis']) ?>
                    <?= $testForm->field($model, 'tmDrop')->label(false)->textInput(['placeholder' => 'до слива', 'style' =>'text-overflow: ellipsis'])  ?>
                    <?= $testForm->field($model, 'tmDelay')->label(false)->textInput(['placeholder' => 'задержка', 'style' =>'text-overflow: ellipsis']) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <p><i>Укажите id команд для теста через запятую</i></p>
                    <?= $testForm->field($model, 'teams')->label(false) ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <?= Html::submitButton('Старт', ['class' => 'btn btn-success'])?>
                        </div>
                        <div class="col-sm-4 text-info">
                            <p><i>Запомнить параметры</i></p>
                        </div>
                        <div class="col-sm-2">
                            <?= $testForm->field($model, 'setDefault')->checkbox(['label' => null]) ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php $testForm->end()?>
        <?php }?>
    </div>
</div>
