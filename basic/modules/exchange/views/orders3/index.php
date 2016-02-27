<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\exchange\models\Orders3Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders3s';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders3-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Orders3', ['create'], ['class' => 'btn btn-success']) ?>
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
            // 'filename',
            // 'textready:ntext',
            // 'filenameready',
            // 'assist_expir',
            // 'country',
            // 'cost',
            // 'totalcost',
            // 'status',
            // 'commentclient',
            // 'commenttranslate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
