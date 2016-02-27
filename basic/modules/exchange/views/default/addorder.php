<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

$this->title = 'Add order';
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
                                <li class="active">Add order</li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- end PAGE TITLE ROW -->
                <?= $this->render('_flashmessage'); ?>
                
                <div class="row">
                    <div class="col-lg-12">

                        <div class="portlet portlet-default">
                            <div class="portlet-body">
                                <?= $this->render('order/_formorder', [
                                       'modelneworder' => $modelneworder,
                                 
                                  ]); ?> 
                            </div>
                            <!-- /.portlet-body -->
                        </div>
                        <!-- /.portlet -->


                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

            </div>
            <!-- /.page-content -->

        </div>
