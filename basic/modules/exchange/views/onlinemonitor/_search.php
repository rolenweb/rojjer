<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\exchange\models\OnlinemonitorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="onlinemonitor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_order') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'id_translater') ?>

    <?= $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'text') ?>

    <?php // echo $form->field($model, 'done') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'filename') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
