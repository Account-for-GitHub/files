<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

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
            <div class="col-lg-offset-4 col-lg-4">

                    <?php $form = ActiveForm::begin(['options'=>['enctype' => 'multipart/form-data']]); ?>

                    <?= $form->field($model, 'name') ?>
                    <?= $form->field($model, 'img')->fileInput(['class'=>'btn-primary', 'style'=>'width:100%; height:30px; border-radius:4px;']); ?>
                    <?= $form->field($model, 'text')->textarea(); ?>
                    <?= $form->field($model, 'date_to') ?>
                    <?= $form->field($model, 'status')->dropDownList([
                        0=>'Выберите статус',
                        1=>'Open',
                        2=>'Needs offer',
                        3=>'Offered',
                        4=>'Approved',
                        5=>'In progress',
                        6=>'Ready',
                        7=>'Verified',
                        8=>'Closed',
                    ]); ?>

                    <div class="form-group">
                        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>

            </div>
        </div>

    </div>
</div>
