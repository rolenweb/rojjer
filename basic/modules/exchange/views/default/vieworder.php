<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

$this->title = 'Order: '.$modelorder->title;
//$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_navbartop',[
    'countalertsorder' => $countalertsorder,
    'countalertsbalance' => $countalertsbalance,
    'modelbalanceuser' => $modelbalanceuser,
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
                                <li><i class="fa fa-dashboard"></i> <?= Html::a('Dashboard', ['index']) ?></li>
<?php
if (Yii::$app->user->identity->type == 'translater') {
?>
                                <li><i class="fa fa-pencil"></i> <?= Html::a('Orders', ['orders']) ?></li>
<?php
}

?>
                                <li><i class="fa fa-pencil"></i> <?= Html::a('My orders', ['myorders', 'id' => Yii::$app->user->identity->id]) ?></li>
                                <li class="active"><?= Html::encode($this->title) ?></li>
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
                                <?= $this->render('_vieworder', [
                                       'modelorder' => $modelorder,
                                       'newmodelzaivki' => $newmodelzaivki,
                                       'listzaivki' => $listzaivki,
                                       'modelcomment' => $modelcomment,
                                       'listcomments' => $listcomments,
                                       'modelbalanceuser' => $modelbalanceuser,
                                       'modelorderready' => $modelorderready,
                                       'modelonlinemonitor' => $modelonlinemonitor,
                                 
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
