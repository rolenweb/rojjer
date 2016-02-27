<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\exchange\models\OnlinemonitorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Onlinemonitors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="onlinemonitor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Onlinemonitor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_order',
            'id_user',
            'id_translater',
            'created_at',
            // 'updated_at',
            // 'text:ntext',
            // 'done',
            // 'status',
            // 'filename',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
