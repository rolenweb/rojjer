<?php
use yii\helpers\Html;


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
                
                
                <div class="row">
                    <div class="col-lg-10 col-lg-offset-1 col-md-12">
                        <div class="portlet portlet-default body-order-ok-portlet">
                            <div class="portlet-body body-order-ok">
                                <div class="cont-order-ok">
                                    <div class="row">
                                        <div class="col-md-12 text-center title-order-ok">
                                            <h1> Thank you for posting your order! </h1>
                                            
                                        </div>
                                       
                                    </div>
                                    
                                    <div class="row margin-top-20">
                                        <div class="col-sm-12 text-center">
                                            
                                            <?= Html::a('Would you like to post the order in other languages?', ['otherorder', 'id' => $modelorder->id], ['class' => 'btn btn-green btn-big-order-ok']) ?>
                                        </div>
                                    </div>
                                    <div class="row margin-top-20">
                                        <div class="col-sm-6 text-left">
                                            <?= Html::a('Post a new order', ['addorder'], ['class' => 'btn btn-green btn-new-order-ok']) ?>
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            <?= Html::a('View order', ['vieworder', 'id' => $modelorder->id], ['class' => 'btn btn-green btn-view-order-ok']) ?>
                                        </div>
                                    </div>
                                    <div class="row margin-top-20">
                                        <div class="col-sm-6 text-left">
                                            <?= Html::a('Find a proofreader', ['addorder'], ['class' => 'btn btn-green btn-find-order-ok']) ?>
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            <?= Html::a('No, Thank you!', ['index'], ['class' => 'btn btn-green btn-no-thanks-order-ok']) ?>                                        
                                        </div>
                                    </div>
                                                                      
                                </div>

                                
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.page-content -->

        </div>
