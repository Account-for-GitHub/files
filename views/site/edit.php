<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */
/* @var $form ActiveForm */

$this->title = 'Страница создания заявки.';
?>
<div class="site-index">

    <br />
    <br />
    <center><h1>Страница создания и редактирования заявки.</h1></center>
    <br />
    <br />

    <div class="body-content">

        <div class="row">
            <div class="col-lg-offset-4 col-lg-4">

                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

                <?= $form->field($model, 'name') ?>
                    <?php if ($model->img != '') { ?>
                        <br />
                        <center><img src="<?= $model->img; ?>" width="200"></center>
                        <br /><br />
                    <?php } ?>
                <?= $form->field($model, 'img')->fileInput(['class' => 'btn-primary', 'style' => 'width:100%; height:30px; border-radius:4px;']); ?>
                <?=
                $form->field($model, 'text')->widget(CKEditor::className(), [
                    'options' => ['rows' => 6],
                    'preset' => 'basic'
                ]);
                ?>

                <?= $form->field($model, 'date_to')->input('text', ['id' => 'datepicker', 'class' => 'form-control', 'readonly' => 'readonly']); ?>        

                <?=
                $form->field($model, 'status')->dropDownList([
                    0 => 'Выберите статус',
                    1 => 'Open',
                    2 => 'Needs offer',
                    3 => 'Offered',
                    4 => 'Approved',
                    5 => 'In progress',
                    6 => 'Ready',
                    7 => 'Verified',
                    8 => 'Closed',
                ]);
                ?>

                <div class="form-group">
                    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
                </div>
                <?php ActiveForm::end(); ?>

            </div>
        </div>

    </div>
</div>
