<?php
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
?>
<?= $this->render('_navbartop', [
    
]); ?> 
<?= $this->render('_navbarside',[
    'modelprofile' => $modelprofile,

]); ?> 

<div id="page-wrapper">

            <div class="page-content">

                <!-- begin PAGE TITLE ROW -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title">
                            
                            <ol class="breadcrumb">
                                
                                <?= Html::a(Html::tag('i','',['class' => 'fa fa-dashboard']).' Dashboard',['/admin']) ?>
                                </li>/
                                <li class="active"><i class="fa fa-list-alt"></i> Orders</li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- end PAGE TITLE ROW -->
                <?= $this->render('_flashmessage'); ?>
                <div class="row">
                    <div class="orders-index">
                    <?= GridView::widget([
                                'dataProvider' => $dataProvider,
                                'filterModel' => $searchModel,
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],
                                    'id',

                                    [
                                        'attribute' => 'status',
                                        'label' => 'Status',
                                        'format'=>'raw',
                                        'value' => function ($data) {
                                            if ($data->status == -1) {
                                                $status = 'Stop';
                                            }
                                            if ($data->status == 0) {
                                                $status = 'New';
                                            }
                                            if ($data->status == 1) {
                                                $status = 'Moderation';
                                            }
                                            if ($data->status == 2) {
                                                $status = 'Edit';
                                            }
                                            if ($data->status == 3) {
                                                $status = 'Active';
                                            }
                                            if ($data->status == 4) {
                                                $status = 'In working';
                                            }
                                            if ($data->status == 5) {
                                                $status = 'Сheck Administrator';
                                            }
                                            if ($data->status == 6) {
                                                $status = 'Check';
                                            }
                                            if ($data->status == 7) {
                                                $status = 'Revision';
                                            }
                                            if ($data->status == 8) {
                                                $status = 'Paid';
                                            }
                                            
                                            return $status;
                                            
                                        },
                                        
                                    ],

                                   
                                    [
                                        'attribute' => 'title',
                                        'label' => 'Title',
                                    ],
                                     
                                    

                                    [
                                        'attribute' => 'updated_at',
                                        'label' => 'Date update',
                                        'format' =>  ['date', 'php:H:i d-m-y'],
                                    ],
                                    [
                                        'attribute' => 'srok',
                                        'label' => 'Deadline',
                                        'format' =>  ['date', 'php:d-m-y'],
                                    ],
                                    
                                    
                                    

                                    ['class' => 'yii\grid\ActionColumn'],
                                ],
                            ]); ?>

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   
                    
</div>

                </div>

            </div>
            <!-- /.page-content -->

        </div>

