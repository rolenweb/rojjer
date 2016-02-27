<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\widgets\ListView;
use yii\helpers\HtmlPurifier;

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
                                <li class="active">Monitoring</li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- end PAGE TITLE ROW -->
                <?= $this->render('_flashmessage'); ?>
                
                <div class="row">
                    

                        
<div class="col-md-12">
                        <div class="order-preview">
                            <div class="title-preview">
                                <h2>
                                    <?= Html::encode($modelorderuser->title) ?>
                                </h2>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="progress monitor-progress">
                                      <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Html::encode($modelmonitor->done) ?>%;">
                                        <?= Html::encode($modelmonitor->done) ?>%
                                      </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                              <div class="col-sm-12 monitor-text">
                                <?= HtmlPurifier::process($modelmonitor->text) ?>
                              </div>
                              <div class="col-sm-12 monitor-text">
                                <?= Html::a(Html::tag('span','Download file',['class' => 'badge green']), '@web/files/orders/'.$modelmonitor->filename) ?>    
                              </div>
                            </div>
                        </div>
                    </div>
                   


                </div>
                <!-- /.row -->

            </div>
            <!-- /.page-content -->

        </div>
