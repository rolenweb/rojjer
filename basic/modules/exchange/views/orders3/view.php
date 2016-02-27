<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\exchange\models\Orders3 */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Orders3s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders3-view">

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
            'id_user',
            'id_translater',
            'created_at',
            'updated_at',
            'username',
            'lang_from',
            'lang_to',
            'srok',
            'category',
            'title',
            'text:ntext',
            'texthiden:ntext',
            'filename',
            'textready:ntext',
            'filenameready',
            'assist_expir',
            'country',
            'cost',
            'totalcost',
            'status',
            'commentclient',
            'commenttranslate',
        ],
    ]) ?>

</div>
