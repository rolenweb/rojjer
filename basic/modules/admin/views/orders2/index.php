<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\Orders2Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders2s';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders2-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Orders2', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_user',
            'id_translater',
            'created_at',
            'updated_at',
            // 'username',
            // 'lang_from',
            // 'lang_to',
            // 'srok',
            // 'category',
            // 'title',
            // 'text:ntext',
            // 'texthiden:ntext',
            // 'textready:ntext',
            // 'filename',
            // 'assist_expir',
            // 'country',
            // 'cost',
            // 'totalcost',
            // 'status',
            // 'comment',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
