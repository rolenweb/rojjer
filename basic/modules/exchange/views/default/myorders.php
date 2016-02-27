<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

$this->title = 'List of Orders';
//$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_navbartop', [
    'countalertsorder' => $countalertsorder,
    'modelbalanceuser' => $modelbalanceuser,
    'countalertsbalance' => $countalertsbalance,
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
                                <li><i class="fa fa-dashboard"></i> <?= Html::a('Dashboard', ['exchange/index']) ?>
                                </li>
                                <li class="active">Orders</li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- end PAGE TITLE ROW -->
                <?= $this->render('_flashmessage'); ?>
                
                <div class="row">
                    

                        
                                <?= ListView::widget([
                  'dataProvider' => $dataProvider,
                   'itemView' => 'order/_orderitem',
                   'viewParams' => ['modelprofile' => $modelprofile, 'myalerts' => $myalerts],
                    'layout' => '{items}<div class="custom-pager">{pager}</div>',
                    'pager'        => [
                      'firstPageLabel'    => '<i class="fa fa-angle-double-left"></i>',
                      'lastPageLabel'     => '<i class="fa fa-angle-double-right"></i>',
                      'nextPageLabel'     => '<i class="fa fa-angle-right"></i>',
                      'prevPageLabel'     => '<i class="fa fa-angle-left"></i>',
                      'options' =>[
                          'class' => 'pagination page-custom'
                        ],
                      ],
                    'itemOptions' => [
                        'class' => 'singitem',
                      ],

                    'summary' => '',
                    ]);
                ?>
                          


                </div>
                <!-- /.row -->

            </div>
            <!-- /.page-content -->

        </div>
