<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\exchange\models\Orders4Search */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders4-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'id_translater') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'username') ?>

    <?php // echo $form->field($model, 'lang_from') ?>

    <?php // echo $form->field($model, 'lang_to') ?>

    <?php // echo $form->field($model, 'srok') ?>

    <?php // echo $form->field($model, 'category') ?>

    <?php // echo $form->field($model, 'othercategory') ?>

    <?php // echo $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'text') ?>

    <?php // echo $form->field($model, 'texthiden') ?>

    <?php // echo $form->field($model, 'filename') ?>

    <?php // echo $form->field($model, 'textready') ?>

    <?php // echo $form->field($model, 'filenameready') ?>

    <?php // echo $form->field($model, 'proofreading') ?>

    <?php // echo $form->field($model, 'country') ?>

    <?php // echo $form->field($model, 'cost') ?>

    <?php // echo $form->field($model, 'totalcost') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'monitor') ?>

    <?php // echo $form->field($model, 'nsymbol') ?>

    <?php // echo $form->field($model, 'nword') ?>

    <?php // echo $form->field($model, 'nstring') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'assistant') ?>

    <?php // echo $form->field($model, 'experience') ?>

    <?php // echo $form->field($model, 'level') ?>

    <?php // echo $form->field($model, 'rating') ?>

    <?php // echo $form->field($model, 'commentclient') ?>

    <?php // echo $form->field($model, 'commenttranslate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
