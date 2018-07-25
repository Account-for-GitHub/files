<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */
/* @var $form ActiveForm */

$this->title = 'Список заявок.';
?>
<div class="site-index">

    <br />
    <br />
    <center><h1>Список заявок.</h1></center>
    <br />
    <br />

    <div class="body-content">

        <div class="row">
            <div class="col-lg-offset-1 col-lg-10">
                <center>
                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'name',
                            [
                                'attribute' => 'text',
                                'format' => 'html'
                            ],
                            'date_from',
                            'date_to',
                            'status',
                            [
                                'format' => 'raw',
                                'value' => function($model) {
                                    return Html::img(Url::to($model->img), [
                                                'alt' => 'Нет изображения',
                                                'style' => 'width:100px;'
                                    ]);
                                },
                                    ],
                                    ['class' => 'yii\grid\ActionColumn',
                                        'template' => '{view} {update} ',
                                        'buttons' => [
                                            'view' => function ($url, $model) {
                                                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['watch', 'id' => $model->id]);
                                            },
                                                    'update' => function ($url, $model) {
                                                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['edit', 'id' => $model->id]);
                                            }
                                                ]
                                            ]
                                    ]]);
                                    ?>
                </center>

            </div>
        </div>

    </div>
</div>
