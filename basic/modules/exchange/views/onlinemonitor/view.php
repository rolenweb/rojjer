<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\exchange\models\Onlinemonitor */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Onlinemonitors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="onlinemonitor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_order',
            'id_user',
            'id_translater',
            'created_at',
            'updated_at',
            'text:ntext',
            'done',
            'status',
            'filename',
        ],
    ]) ?>

</div>
