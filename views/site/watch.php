<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */
/* @var $form ActiveForm */

$this->title = 'Просмотр заявки.';
?>
<div class="site-index">

    <br />
    <br />
    <center><h1>Просмотр заявки.</h1></center>
    <br />
    <br />

    <div class="body-content">

        <div class="row">
            <div class="col-lg-offset-2 col-lg-8">
                    
                    <?php if ($model->img != '') { ?>
                        <center><img src="<?= $model->img; ?>" width="200"></center>
                        <br /><br />
                    <?php } ?>

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Название</h3>
                        </div>
                        <div class="panel-body">
                            <?= $model->name; ?>
                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Описание</h3>
                        </div>
                        <div class="panel-body">
                            <?= $model->text; ?>
                        </div>
                    </div>
                        
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Дата создания</h3>
                        </div>
                        <div class="panel-body">
                            <?= $model->date_from; ?>
                        </div>
                    </div>
                        
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Дата завершения</h3>
                        </div>
                        <div class="panel-body">
                            <?= $model->date_to; ?>
                        </div>
                    </div>
                        
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Статус</h3>
                        </div>
                        <div class="panel-body">
                            <?= $model->status; ?>
                        </div>
                    </div>

            </div>
        </div>

    </div>
</div>
