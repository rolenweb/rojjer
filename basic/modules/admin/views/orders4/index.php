<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\Orders4Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders4s';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders4-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Orders4', ['create'], ['class' => 'btn btn-success']) ?>
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
            // 'othercategory',
            // 'title',
            // 'text:ntext',
            // 'texthiden:ntext',
            // 'filename',
            // 'textready:ntext',
            // 'filenameready',
            // 'proofreading',
            // 'country',
            // 'cost',
            // 'totalcost',
            // 'status',
            // 'monitor',
            // 'nsymbol',
            // 'nword',
            // 'nstring',
            // 'type',
            // 'assistant',
            // 'experience',
            // 'level',
            // 'rating',
            // 'commentclient',
            // 'commenttranslate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
